<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experient extends Model
{
    // 🔧 WAJIB: Kasih tau Laravel nama table & primary key kamu
    protected $table = 'experient';           // Nama table di database
    protected $primaryKey = 'id_experient';   // Primary key custom
    public $timestamps = false;

    // ✅ OPSIONAL: Field yang boleh diisi massal (buat form input nanti)
    protected $fillable = [
        'instansi', 'posisi', 'deskripsi', 'gambar',
        'tanggal_mulai', 'tanggal_selesai', 'tipe', 'is_active'
    ];

    // ✅ OPSIONAL: Convert tipe data otomatis
    protected $casts = [
        'tanggal_mulai' => 'date',      // Auto convert string ke Date object
        'tanggal_selesai' => 'date',    // Auto convert string ke Date object  
        'is_active' => 'boolean'        // Auto convert 0/1 ke true/false
    ];

    // 🔗 RELATIONSHIP: Hubungan ke table skills
    public function skills()
    {
        // belongsToMany = many-to-many relationship
        // 'experient_skill' = nama junction table
        // 'experient_id' = foreign key di junction table  
        // 'skill_id' = foreign key lainnya di junction table
        return $this->belongsToMany(Skill::class, 'experient_skill', 'experient_id', 'skill_id');
    }

    // 🎁 HELPER METHODS (bikin custom function buat view)

    public function getGambarUrlAttribute()
    {
        if ($this->gambar) {
            return asset('storage/experiences/' . $this->gambar);
        }
        return null; // Kalau tidak ada gambar
    }

    // Hitung durasi kerja
    public function getDurasiAttribute()
    {
        $start = $this->tanggal_mulai;
        $end = $this->tanggal_selesai ?? now(); // Kalau null, pakai tanggal sekarang
        
        $years = $start->diffInYears($end);
        $months = $start->diffInMonths($end) % 12;
        
        if ($years > 0 && $months > 0) {
            return "$years tahun $months bulan";
        } elseif ($years > 0) {
            return "$years tahun";
        } else {
            return "$months bulan";
        }
    }

    // Cek apakah masih bekerja di tempat ini
    public function getSedangBekerjaAttribute()
    {
        return is_null($this->tanggal_selesai);
    }

    // Convert tipe ke label yang lebih bagus
    public function getTipeLabelAttribute()
    {
        $labels = [
            'fulltime' => 'Full Time',
            'parttime' => 'Part Time', 
            'intern' => 'Internship',
            'freelance' => 'Freelance',
            'volunteer' => 'Volunteer'
        ];
        
        return $labels[$this->tipe] ?? $this->tipe;
    }
}