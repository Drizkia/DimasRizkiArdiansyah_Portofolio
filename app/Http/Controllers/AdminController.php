<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $password = 'wellwellwell';

    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        if ($request->password === $this->password) {
            session(['admin_logged_in' => true]);
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false], 401);
        }
    }

public function dashboard()
{
    if (!session('admin_logged_in')) {
        return redirect()->route('admin.login');
    }

    // Data untuk dashboard
    $projectsCount = \App\Models\Project::count();
    $experiencesCount = \App\Models\Experient::count();
    $skillsCount = \App\Models\Skill::count();
    
    // Latest entries - PAKAI ID UNTUK ORDER (karena tidak ada created_at)
    $latestProjects = \App\Models\Project::with('skills')
                        ->orderBy('id_project', 'desc')
                        ->take(3)
                        ->get();
    
    $latestExperiences = \App\Models\Experient::with('skills')
                          ->orderBy('id_experient', 'desc')
                          ->take(3)
                          ->get();
    
    // Skills by type
    $hardSkillsCount = \App\Models\Skill::where('tipe', 'hard')->count();
    $softSkillsCount = \App\Models\Skill::where('tipe', 'soft')->count();

    return view('admin.dashboard', compact(
        'projectsCount', 
        'experiencesCount', 
        'skillsCount',
        'latestProjects',
        'latestExperiences',
        'hardSkillsCount',
        'softSkillsCount'
    ));
}

    public function logout()
    {
        session()->forget('admin_logged_in');
        return redirect('/');
    }
}