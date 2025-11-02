<!DOCTYPE html>
<html>
<head>
    <title>Manage Experiences</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-900 text-white min-h-screen">
    <div class="container mx-auto px-6 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold">Manage Experiences</h1>
            <div class="flex gap-4">
                <a href="/admin/dashboard" class="bg-gray-700 hover:bg-gray-600 px-4 py-2 rounded-lg">← Dashboard</a>
                <a href="/admin/experiences/create" class="bg-green-500 hover:bg-green-600 px-4 py-2 rounded-lg">+ Add Experience</a>
            </div>
        </div>

        <div class="bg-gray-800 rounded-xl p-6">
            @if($experiences->count() > 0)
            <div class="space-y-4">
                @foreach($experiences as $experience)
                <div class="flex items-center justify-between p-4 bg-gray-700/50 rounded-lg border border-gray-600">
                    <div class="flex-1">
                        <h3 class="text-xl font-semibold">{{ $experience->posisi }}</h3>
                        <p class="text-gray-400">{{ $experience->instansi }}</p>
                        <p class="text-sm text-gray-500">
                            {{ $experience->tanggal_mulai }} - 
                            {{ $experience->tanggal_selesai ?? 'Present' }} • 
                            {{ $experience->tipe }}
                        </p>
                    </div>
                    <div class="flex gap-2">
                        <a href="/admin/experiences/{{ $experience->id_experient }}/edit" 
                            class="bg-blue-500 hover:bg-blue-600 px-3 py-1 rounded">Edit</a>
                        <form action="/admin/experiences/{{ $experience->id_experient }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded" 
                                    onclick="return confirm('Delete this experience?')">Delete</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-12">
                <p class="text-gray-400 text-lg">No experiences yet.</p>
                <a href="/admin/experiences/create" class="inline-block mt-4 bg-green-500 hover:bg-green-600 px-6 py-2 rounded-lg">
                    Add First Experience
                </a>
            </div>
            @endif
        </div>
    </div>
</body>
</html>