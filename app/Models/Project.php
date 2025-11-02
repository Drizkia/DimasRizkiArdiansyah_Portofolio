<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // 🔧 WAJIB
    protected $table = 'project';
    protected $primaryKey = 'id_project';
    public $timestamps = false;
    
    // ✅ OPSIONAL
    protected $fillable = ['judul', 'gambar', 'deskripsi', 'kategori', 'link'];

    // 🔗 RELATIONSHIP ke skills
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'project_skill', 'project_id', 'skill_id');
    }

    // 🎁 HELPER: Buat URL lengkap untuk gambar
    public function getGambarUrlAttribute()
    {
        return asset('storage/projects/' . $this->gambar);
    }

    // 🎁 HELPER: Convert kategori ke label
    public function getKategoriLabelAttribute()
    {
        $labels = [
            'website' => 'Website',
            'other' => 'Lainnya'
        ];
        
        return $labels[$this->kategori] ?? $this->kategori;
    }
}