<?php

namespace App\Http\Controllers;

use App\Models\Experient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExperienceController extends Controller  // ✅ Nama class harus sama dengan nama file
{
    public function index()  // ✅ Method index harus ada
    {
        $experiences = Experient::with('skills')->get();
        return view('admin.experiences.index', compact('experiences'));
    }

    public function create()
    {
        $skills = \App\Models\Skill::all();
        return view('admin.experiences.create', compact('skills'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'instansi' => 'required',
            'posisi' => 'required',
            'deskripsi' => 'required',
            'tanggal_mulai' => 'required|date',
            'tipe' => 'required|in:fulltime,parttime,intern,freelance,volunteer',
            'gambar' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        // Handle file upload
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $filename = time() . '_' . $gambar->getClientOriginalName();
            $path = $gambar->storeAs('experiences', $filename, 'public');
            $data['gambar'] = $filename;
        }

        $experience = Experient::create($data);
        
        if ($request->has('skills')) {
            $experience->skills()->sync($request->skills);
        }

        return redirect()->route('experiences.index')->with('success', 'Experience created successfully');
    }

    public function edit(Experient $experience)
    {
        $skills = \App\Models\Skill::all();
        return view('admin.experiences.edit', compact('experience', 'skills'));
    }

    public function update(Request $request, Experient $experience)
    {
        $request->validate([
            'instansi' => 'required',
            'posisi' => 'required',
            'deskripsi' => 'required',
            'tanggal_mulai' => 'required|date',
            'tipe' => 'required|in:fulltime,parttime,intern,freelance,volunteer',
            'gambar' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        // Handle file upload
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($experience->gambar) {
                Storage::disk('public')->delete('experiences/' . $experience->gambar);
            }
            
            $gambar = $request->file('gambar');
            $filename = time() . '_' . $gambar->getClientOriginalName();
            $path = $gambar->storeAs('experiences', $filename, 'public');
            $data['gambar'] = $filename;
        }

        $experience->update($data);
        
        if ($request->has('skills')) {
            $experience->skills()->sync($request->skills);
        }

        return redirect()->route('experiences.index')->with('success', 'Experience updated successfully');
    }

    public function destroy(Experient $experience)
    {
        // Hapus gambar
        if ($experience->gambar) {
            Storage::disk('public')->delete('experiences/' . $experience->gambar);
        }
        
        $experience->skills()->detach();
        $experience->delete();
        return redirect()->route('experiences.index')->with('success', 'Experience deleted successfully');
    }
}