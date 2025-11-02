<!DOCTYPE html>
<html>
<head>
    <title>Edit Skill</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-900 text-white min-h-screen">
    <div class="container mx-auto px-6 py-8 max-w-2xl">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold">Edit Skill</h1>
            <a href="/admin/skills" class="bg-gray-700 hover:bg-gray-600 px-4 py-2 rounded-lg">← Back</a>
        </div>

        <div class="bg-gray-800 rounded-xl p-6">
            <form action="/admin/skills/{{ $skill->id_skill }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="space-y-6">
                    <div>
                        <label class="block text-gray-300 mb-2">Skill Name</label>
                        <input type="text" name="nama_skill" value="{{ $skill->nama_skill }}" required 
                                class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white">
                    </div>

                    <div>
                        <label class="block text-gray-300 mb-2">Skill Type</label>
                        <select name="tipe" required class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white">
                            <option value="hard" {{ $skill->tipe == 'hard' ? 'selected' : '' }}>Hard Skill</option>
                            <option value="soft" {{ $skill->tipe == 'soft' ? 'selected' : '' }}>Soft Skill</option>
                        </select>
                    </div>

                    @if($skill->gambar)
                    <div>
                        <label class="block text-gray-300 mb-2">Current Image</label>
                        <img src="{{ asset('storage/skills' . $skill->gambar) }}" 
                            alt="{{ $skill->nama }}"
                            class="w-16 h-16 object-contain border border-gray-600 rounded-lg">

                        {{-- <img src="{{ Storage::disk('cloudinary')->url($skill->gambar) }}" 
                            alt="{{ $skill->nama }}"
                            class="w-16 h-16 object-contain border border-gray-600 rounded-lg"> --}}
                    </div>
                    @endif

                    <div>
                        <label class="block text-gray-300 mb-2">New Image</label>
                        <input type="file" name="gambar" accept="image/*"
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white">
                    </div>
                </div>

                <div class="mt-8 flex gap-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 px-6 py-3 rounded-lg font-semibold">
                        Update Skill
                    </button>
                    <a href="/admin/skills" class="bg-gray-600 hover:bg-gray-700 px-6 py-3 rounded-lg font-semibold">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>