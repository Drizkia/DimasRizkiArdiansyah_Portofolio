<!DOCTYPE html>
<html>
<head>
    <title>Manage Skills</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-900 text-white min-h-screen">
    <div class="container mx-auto px-6 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold">Manage Skills</h1>
            <div class="flex gap-4">
                <a href="/admin/dashboard" class="bg-gray-700 hover:bg-gray-600 px-4 py-2 rounded-lg">← Dashboard</a>
                <a href="/admin/skills/create" class="bg-green-500 hover:bg-green-600 px-4 py-2 rounded-lg">+ Add Skill</a>
            </div>
        </div>

        <div class="bg-gray-800 rounded-xl p-6">
            @if($skills->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($skills as $skill)
                <div class="bg-gray-700/50 rounded-lg p-4 border border-gray-600 text-center">
                    <div class="mb-3">
                        @if($skill->gambar)
                            <img src="{{ asset('storage/skills' . $skill->gambar) }}"
                                alt="{{ $skill->nama }}"
                                class="w-12 h-12 object-contain mx-auto">

                            {{-- <img src="{{ Storage::disk('cloudinary')->url($skill->gambar) }}"
                                alt="{{ $skill->nama }}"
                                class="w-12 h-12 object-contain mx-auto"> --}}
                        @else
                        <div class="w-12 h-12 bg-gray-600 rounded-full flex items-center justify-center mx-auto text-xl">
                            {{ $skill->tipe == 'hard' ? '🔧' : '💡' }}
                        </div>
                        @endif
                    </div>

                    <h3 class="font-semibold text-lg mb-1">{{ $skill->nama }}</h3>
                    <span class="text-sm px-2 py-1 rounded-full 
                                {{ $skill->tipe == 'hard' ? 'bg-blue-500 text-white' : 'bg-green-500 text-white' }}">
                        {{ $skill->tipe == 'hard' ? 'Hard Skill' : 'Soft Skill' }}
                    </span>
                    <div class="flex gap-2 mt-3">
                        <a href="/admin/skills/{{ $skill->id_skill }}/edit" 
                            class="flex-1 bg-blue-500 hover:bg-blue-600 py-1 rounded text-sm">Edit</a>
                        <form action="/admin/skills/{{ $skill->id_skill }}" method="POST" class="flex-1">
                            @csrf @method('DELETE')
                            <button type="submit" class="w-full bg-red-500 hover:bg-red-600 py-1 rounded text-sm"
                                    onclick="return confirm('Delete this skill?')">Delete</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-12">
                <p class="text-gray-400 text-lg">No skills yet.</p>
                <a href="/admin/skills/create" class="inline-block mt-4 bg-green-500 hover:bg-green-600 px-6 py-2 rounded-lg">
                    Add First Skill
                </a>
            </div>
            @endif
        </div>
    </div>
</body>
</html>