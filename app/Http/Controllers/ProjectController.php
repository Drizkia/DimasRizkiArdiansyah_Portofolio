<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('skills')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $skills = \App\Models\Skill::all();
        return view('admin.projects.create', compact('skills'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required|in:website,other',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'link' => $request->link,
        ];

        // ✅ CLOUDINARY UPLOAD - SIMPLE & AMAN
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('portfolio/projects', 'cloudinary');
            $data['gambar'] = $path; // Simpan path
        }

        $project = Project::create($data);
        
        // Sync skills
        if ($request->has('skills')) {
            $project->skills()->sync($request->skills);
        }

        return redirect()->route('projects.index')->with('success', 'Project created successfully');
    }

    public function edit(Project $project)
    {
        $skills = \App\Models\Skill::all();
        return view('admin.projects.edit', compact('project', 'skills'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required|in:website,other',
            'gambar' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'link' => $request->link,
        ];

        // ✅ CLOUDINARY UPLOAD - SIMPLE & AMAN
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($project->gambar) {
                Storage::disk('cloudinary')->delete($project->gambar);
            }
            
            $path = $request->file('gambar')->store('portfolio/projects', 'cloudinary');
            $data['gambar'] = $path;
        }

        $project->update($data);
        
        // Sync skills
        if ($request->has('skills')) {
            $project->skills()->sync($request->skills);
        }

        return redirect()->route('projects.index')->with('success', 'Project updated successfully');
    }

    public function destroy(Project $project)
    {
        // ✅ Hapus gambar dari Cloudinary - SIMPLE & AMAN
        if ($project->gambar) {
            Storage::disk('cloudinary')->delete($project->gambar);
        }
        
        $project->skills()->detach();
        $project->delete();
        
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully');
    }
}