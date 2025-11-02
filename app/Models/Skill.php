<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skill';
    protected $primaryKey = 'id_skill';
    public $timestamps = false;
    
    protected $fillable = ['nama', 'tipe', 'gambar'];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_skill', 'skill_id', 'project_id');
    }

    public function experiences()
    {
        return $this->belongsToMany(Experient::class, 'experient_skill', 'skill_id', 'experient_id');
    }

    public function getTipeLabelAttribute()
    {
        return $this->tipe == 'hard' ? 'Hard Skill' : 'Soft Skill';
    }

    // 🎁 HELPER UNTUK GAMBAR
    public function getGambarUrlAttribute()
    {
        if ($this->gambar && $this->tipe == 'hard') {
            return asset('storage/skills/' . $this->gambar);
        }
        return null;
    }
}