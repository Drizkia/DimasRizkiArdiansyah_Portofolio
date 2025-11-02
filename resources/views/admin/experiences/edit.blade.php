<!DOCTYPE html>
<html>
<head>
    <title>Edit Experience</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-900 text-white min-h-screen">
    <div class="container mx-auto px-6 py-8 max-w-4xl">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold">Edit Experience</h1>
            <a href="/admin/experiences" class="bg-gray-700 hover:bg-gray-600 px-4 py-2 rounded-lg">← Back</a>
        </div>

        <div class="bg-gray-800 rounded-xl p-6">
            <form action="/admin/experiences/{{ $experience->id_experient }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-300 mb-2">Company/Instansi</label>
                        <input type="text" name="instansi" value="{{ $experience->instansi }}" required 
                                class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white">
                    </div>

                    <div>
                        <label class="block text-gray-300 mb-2">Position</label>
                        <input type="text" name="posisi" value="{{ $experience->posisi }}" required
                                class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white">
                    </div>

                    <div>
                        <label class="block text-gray-300 mb-2">Start Date</label>
                        <input type="date" name="tanggal_mulai" value="{{ $experience->tanggal_mulai }}" required
                                class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white">
                    </div>

                    <div>
                        <label class="block text-gray-300 mb-2">End Date</label>
                        <input type="date" name="tanggal_selesai" value="{{ $experience->tanggal_selesai }}"
                                class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white">
                    </div>

                    <div>
                        <label class="block text-gray-300 mb-2">Type</label>
                        <select name="tipe" required class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white">
                            <option value="fulltime" {{ $experience->tipe == 'fulltime' ? 'selected' : '' }}>Full Time</option>
                            <option value="parttime" {{ $experience->tipe == 'parttime' ? 'selected' : '' }}>Part Time</option>
                            <option value="intern" {{ $experience->tipe == 'intern' ? 'selected' : '' }}>Internship</option>
                            <option value="freelance" {{ $experience->tipe == 'freelance' ? 'selected' : '' }}>Freelance</option>
                            <option value="volunteer" {{ $experience->tipe == 'volunteer' ? 'selected' : '' }}>Volunteer</option>
                        </select>
                    </div>

                    <div>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="is_active" value="1" {{ $experience->is_active ? 'checked' : '' }}>
                            <span class="text-gray-300">Active</span>
                        </label>
                    </div>

                    @if($experience->gambar)
                    <div class="md:col-span-2">
                        <label class="block text-gray-300 mb-2">Current Image</label>

                        <img src="{{ asset('storage/experiences/' . $experience->gambar) }}" 
                            alt="{{ $experience->instansi }}"
                            class="w-32 h-32 object-cover rounded-lg border border-gray-600">

                        {{-- <img src="{{ Storage::disk('cloudinary')->url($experience->gambar) }}" 
                            alt="{{ $experience->instansi }}"
                            class="w-32 h-32 object-cover rounded-lg border border-gray-600"> --}}
                    </div>
                    @endif

                    <div class="md:col-span-2">
                        <label class="block text-gray-300 mb-2">New Image (optional)</label>
                        <input type="file" name="gambar" accept="image/*"
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white">
                    </div>
                </div>

                <div class="mt-6">
                    <label class="block text-gray-300 mb-2">Description</label>
                    <textarea name="deskripsi" required rows="5"
                        class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white">{{ $experience->deskripsi }}</textarea>
                </div>

                <div class="mt-6">
                    <label class="block text-gray-300 mb-2">Skills Used</label>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                        @foreach($skills as $skill)
                        <label class="flex items-center gap-2 p-2 bg-gray-700 rounded hover:bg-gray-600">
                            <input type="checkbox" name="skills[]" value="{{ $skill->id_skill }}"
                                {{ $experience->skills->contains($skill->id_skill) ? 'checked' : '' }}>
                            <span>{{ $skill->nama }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>

                <div class="mt-8 flex gap-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 px-6 py-3 rounded-lg font-semibold">
                        Update Experience
                    </button>
                    <a href="/admin/experiences" class="bg-gray-600 hover:bg-gray-700 px-6 py-3 rounded-lg font-semibold">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>