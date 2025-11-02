<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::all();
        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_skill' => 'required',
            'tipe' => 'required|in:hard,soft',
            'gambar' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    $data = [
        'nama' => $request->nama_skill, // ✅ SIMPAN sebagai 'nama' di database
        'tipe' => $request->tipe,
    ];

    // Handle file upload jika ada
    if ($request->hasFile('gambar')) {
        $gambar = $request->file('gambar');
        $filename = time() . '_' . $gambar->getClientOriginalName();
        $path = $gambar->storeAs('skills', $filename, 'public');
        $data['gambar'] = $filename;
    }

    Skill::create($data);
    return redirect()->route('skills.index')->with('success', 'Skill created successfully');
    }

    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'nama_skill' => 'required',
            'tipe' => 'required|in:hard,soft'
        ]);

        $skill->update($request->all());
        return redirect()->route('skills.index')->with('success', 'Skill updated successfully');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('skills.index')->with('success', 'Skill deleted successfully');
    }
}