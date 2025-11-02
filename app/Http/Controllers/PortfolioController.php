<?php

namespace App\Http\Controllers;

use App\Models\Experient;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        // Get data dari database
        $experiences = Experient::where('is_active', true)
                            ->with('skills')
                            ->orderBy('tanggal_mulai', 'desc')
                            ->get();
        
        $projects = Project::with('skills')->get();
        $skills = Skill::all();
        
        // Kirim data ke view main.blade.php
        return view('main', compact('experiences', 'projects', 'skills'));
    }
}