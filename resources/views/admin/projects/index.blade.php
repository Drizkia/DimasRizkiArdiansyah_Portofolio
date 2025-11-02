<!DOCTYPE html>
<html>
<head>
    <title>Manage Projects</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-900 text-white min-h-screen">
    <div class="container mx-auto px-6 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold">Manage Projects</h1>
            <div class="flex gap-4">
                <a href="/admin/dashboard" class="bg-gray-700 hover:bg-gray-600 px-4 py-2 rounded-lg">← Dashboard</a>
                <a href="/admin/projects/create" class="bg-green-500 hover:bg-green-600 px-4 py-2 rounded-lg">+ Add Project</a>
            </div>
        </div>

        <div class="bg-gray-800 rounded-xl p-6">
            @if($projects->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($projects as $project)
                <div class="bg-gray-700/50 rounded-lg p-4 border border-gray-600">
                    @if($project->gambar)
                        <img src="{{ asset('storage/projects/' . $project->gambar) }}" 
                            alt="{{ $project->judul }}"
                            class="w-full h-40 object-cover rounded-lg mb-4">

                        {{-- <img src="{{ Storage::disk('cloudinary')->url($project->gambar) }}" 
                            alt="{{ $project->judul }}"
                            class="w-full h-40 object-cover rounded-lg mb-4"> --}}
                    @endif

                    <h3 class="text-xl font-semibold mb-2">{{ $project->judul }}</h3>
                    <p class="text-gray-400 text-sm mb-2 line-clamp-2">{{ $project->deskripsi }}</p>
                    <div class="flex justify-between items-center text-sm text-gray-500 mb-3">
                        <span class="bg-yellow-500 text-gray-900 px-2 py-1 rounded text-xs">{{ $project->kategori }}</span>
                        @if($project->link)
                        <a href="{{ $project->link }}" target="_blank" class="text-blue-400 hover:text-blue-300">Live Demo</a>
                        @endif
                    </div>

                    @if($project->skills->count() > 0)
                        <div class="mb-3">
                            <div class="flex flex-wrap gap-1">
                                @foreach($project->skills as $skill)
                                    <span class="bg-gray-600 text-gray-300 text-xs px-2 py-1 rounded">
                                        {{ $skill->nama }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="flex gap-2">
                        <a href="/admin/projects/{{ $project->id_project }}/edit" 
                            class="flex-1 bg-blue-500 hover:bg-blue-600 text-center py-2 rounded text-sm">Edit</a>
                        <form action="/admin/projects/{{ $project->id_project }}" method="POST" class="flex-1">
                            @csrf @method('DELETE')
                            <button type="submit" class="w-full bg-red-500 hover:bg-red-600 py-2 rounded text-sm"
                                    onclick="return confirm('Delete this project?')">Delete</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-12">
                <p class="text-gray-400 text-lg">No projects yet.</p>
                <a href="/admin/projects/create" class="inline-block mt-4 bg-green-500 hover:bg-green-600 px-6 py-2 rounded-lg">
                    Add First Project
                </a>
            </div>
            @endif
        </div>
    </div>
</body>
</html>