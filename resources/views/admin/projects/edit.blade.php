<!DOCTYPE html>
<html>
<head>
    <title>Edit Project</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-900 text-white min-h-screen">
    <div class="container mx-auto px-6 py-8 max-w-4xl">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold">Edit Project</h1>
            <a href="/admin/projects" class="bg-gray-700 hover:bg-gray-600 px-4 py-2 rounded-lg">← Back</a>
        </div>

        <div class="bg-gray-800 rounded-xl p-6">
            <form action="/admin/projects/{{ $project->id_project }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-gray-300 mb-2">Project Title</label>
                        <input type="text" name="judul" value="{{ $project->judul }}" required 
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white">
                    </div>

                    <div>
                        <label class="block text-gray-300 mb-2">Category</label>
                        <select name="kategori" required class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white">
                            <option value="website" {{ $project->kategori == 'website' ? 'selected' : '' }}>Website</option>
                            <option value="other" {{ $project->kategori == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-300 mb-2">Demo Link</label>
                        <input type="url" name="link" value="{{ $project->link }}"
                                class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white"
                                placeholder="https://example.com">
                    </div>

                    @if($project->gambar)
                        <div class="md:col-span-2">
                            <label class="block text-gray-300 mb-2">Current Image</label>
                            <img src="{{ asset('storage/projects' . $project->gambar) }}" 
                                alt="{{ $project->judul }}"
                                class="w-48 h-32 object-cover rounded-lg border border-gray-600">

                            {{-- <img src="{{ Storage::disk('cloudinary')->url($project->gambar) }}" 
                                alt="{{ $project->judul }}"
                                class="w-48 h-32 object-cover rounded-lg border border-gray-600"> --}}
                        </div>
                    @endif

                    <div class="md:col-span-2">
                        <label class="block text-gray-300 mb-2">New Image</label>
                        <input type="file" name="gambar" accept="image/*"
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white">
                    </div>
                </div>

                <div class="mt-6">
                    <label class="block text-gray-300 mb-2">Description</label>
                    <textarea name="deskripsi" required rows="5"
                        class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white">{{ $project->deskripsi }}</textarea>
                </div>

                <div class="mt-6">
                    <label class="block text-gray-300 mb-2">Tech Stack</label>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                        @foreach($skills as $skill)
                        <label class="flex items-center gap-2 p-2 bg-gray-700 rounded hover:bg-gray-600">
                            <input type="checkbox" name="skills[]" value="{{ $skill->id_skill }}"
                                    {{ $project->skills->contains($skill->id_skill) ? 'checked' : '' }}>
                            <span>{{ $skill->nama }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>

                <div class="mt-8 flex gap-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 px-6 py-3 rounded-lg font-semibold">
                        Update Project
                    </button>
                    <a href="/admin/projects" class="bg-gray-600 hover:bg-gray-700 px-6 py-3 rounded-lg font-semibold">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>