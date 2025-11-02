<!DOCTYPE html>
<html lang="en" class=" scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> - Dimas Portofolio - </title>
    <link rel="icon" type="image/png" href="logo/vitamin-d.png">
    <script src="porto.js"></script>
    <link rel="stylesheet" href="porto.css">
    @vite('resources/css/app.css')
    <style>
        * {
            font-family: 'Lexend Deca', sans-serif;
            scroll-behavior: smooth;
        }

        @keyframes glow {
            0%, 100% {
                color: #fff;
                text-shadow: 0 0 0.75rem #ffea00, 0 0 3.125rem #ffea00, 0 0 6.25rem #ffea00;
            }
            10%, 90% {
                color: #000000;
                text-shadow: none;
            }
        }

        .glow-text {
            animation: glow 4s ease-in-out infinite;
        }

        .glow-delay-1 { animation-delay: 0.2s; }
        .glow-delay-2 { animation-delay: 0.4s; }
        .glow-delay-3 { animation-delay: 0.6s; }
        .glow-delay-4 { animation-delay: 0.8s; }
        .glow-delay-5 { animation-delay: 0.9s; }
        .glow-delay-6 { animation-delay: 1.0s; }

        @keyframes nameGradient {
            0% { background: linear-gradient(to right, #ffea00, #ffea00); }
            25% { background: linear-gradient(to right, #f2ff00, #f2ff00); }
            50% { background: linear-gradient(to right, #9dff00, #9dff00); }
            75% { background: linear-gradient(to right, #77ff00, #77ff00); }
            100% { background: linear-gradient(to right, #ffb700, #ffb700); }
        }

        .name-gradient {
            animation: nameGradient 5s linear infinite alternate;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        html {
            scroll-snap-type: y mandatory;
        }

        section {
            scroll-snap-align: start;
        }

        @keyframes name {
            0% {
                background-color: #ffea00;
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }
            25% {
                background-color: #f2ff00;
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }
            50% {
                background-color: #9dff00;
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }
            75% {
                background-color: #77ff00;
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }
            100% {
                background-color: #ffb700;
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }
        }
    </style>
</head>

<body class="bg-gray-900">
    <header class="inset-x-0 top-0 z-50 sticky">
        <nav aria-label="Global" class="flex items-center justify-between p-6 lg:px-8">
            <div class="flex lg:flex-1">
                <a href="#x" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <img src="Logoo/fire.png" alt="" class="h-auto w-10" />
                </a>
            </div>
                <div class="flex lg:hidden">
                    <button type="button" command="show-modal" commandfor="mobile-menu" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-200">
                        <span class="sr-only">Open main menu</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
                            <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
                <div class="hidden lg:flex lg:gap-x-12 border border-white rounded-md p-4 bg-white/20 backdrop-blur-md shadow-lg">
                    <a href="#a" class="text-sm/6 font-semibold text-white">About</a>
                    <a href="#b" class="text-sm/6 font-semibold text-white">Experience</a>
                    <a href="#c" class="text-sm/6 font-semibold text-white">Project</a>
                    <a href="#d" class="text-sm/6 font-semibold text-white">Skill</a>
                    <a href="#e" class="text-sm/6 font-semibold text-white">Contact</a>
                </div>
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    <a href="#x" class="-m-1.5 p-1.5">
                        <img src="Logoo/fire.png" alt="" class="h-auto w-10" />
                    </a>
                </div>
        </nav>

        <el-dialog>
        <dialog id="mobile-menu" class="backdrop:bg-transparent lg:hidden">
            <div tabindex="0" class="fixed inset-0 focus:outline-none">
                <el-dialog-panel class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-gray-900 p-6 sm:max-w-sm sm:ring-1 sm:ring-gray-100/10">
                    <div class="flex items-center justify-between">
                        <a href="#" class="-m-1.5 p-1.5">
                            <span class="sr-only">Your Company</span>
                            <img src="Logoo/fire.png" alt="" class="h-8 w-auto" />
                        </a>

                        <button type="button" command="close" commandfor="mobile-menu" class="-m-2.5 rounded-md p-2.5 text-gray-200">
                            <span class="sr-only">Close menu</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
                                <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>

                    <div class="mt-6 flow-root">
                        <div class="-my-6 divide-y divide-white/10">
                            <div class="space-y-2 py-6">
                                <a href="#a" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-white hover:bg-white/5">About</a>
                                <a href="#b" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-white hover:bg-white/5">Exprtience</a>
                                <a href="#c" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-white hover:bg-white/5">Project</a>
                                <a href="#d" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-white hover:bg-white/5">Skill</a>
                                <a href="#e" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-white hover:bg-white/5">Contact</a>
                            </div>
                        </div>
                    </div>
                </el-dialog-panel>
            </div>
        </dialog>
        </el-dialog>
    </header>

    <section id="x" class="h-screen snap-start text-white text-4xl font-bold">
        <div class="relative isolate px-6 lg:px-8">
            <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
                <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                </div>
                <div class="text-center">
                    <h1 class="text-5xl font-semibold tracking-tight text-balance text-white sm:text-7xl">
                        <span class=" glow-text">W</span>
                        <span class="glow-text glow-delay-1">E</span>
                        <span class="glow-text glow-delay-2">L</span>
                        <span class="glow-text glow-delay-3">C</span>
                        <span class="glow-text glow-delay-4">O</span>
                        <span class="glow-text glow-delay-5">M</span>
                        <span class="glow-text glow-delay-6">E</span>
                    </h1>
                    <p class="mt-8 text-lg font-medium text-pretty text-gray-400 sm:text-xl/8">
                        Welcome to my digital portfolio<br>Web Developer & Student<br>
                    </p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <a href="#a"><img src="Logoo/play.png" alt="" class="h-8 w-auto invert"/></a>
                    </div>

                    <div class="mt-6 opacity-30 hover:opacity-100 transition duration-500">
                        <button onclick="showAdminLogin()" class="text-gray-400 text-sm hover:text-white transition duration-200">
                            🔐 Admin
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="adminModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
        <div class="bg-gray-800 rounded-xl p-8 max-w-md w-full mx-4 border border-gray-700">
            <h3 class="text-2xl font-bold text-white mb-4">Admin Login</h3>
            <form id="adminLoginForm">
                <input type="password" 
                        id="adminPassword" 
                        placeholder="Enter admin password"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white mb-4 focus:outline-none focus:border-blue-500">
                <div class="flex gap-3">
                    <button type="submit" class="flex-1 bg-blue-500 hover:bg-blue-600 text-white py-3 rounded-lg font-semibold transition duration-200">
                        Login
                    </button>
                    <button type="button" onclick="hideAdminLogin()" class="flex-1 bg-gray-600 hover:bg-gray-700 text-white py-3 rounded-lg font-semibold transition duration-200">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showAdminLogin() {
            document.getElementById('adminModal').classList.remove('hidden');
            document.getElementById('adminModal').classList.add('flex');
        }

        function hideAdminLogin() {
            document.getElementById('adminModal').classList.add('hidden');
            document.getElementById('adminModal').classList.remove('flex');
        }

        document.getElementById('adminLoginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const password = document.getElementById('adminPassword').value;
            
            const formData = new FormData();
            formData.append('password', password);
            formData.append('_token', '{{ csrf_token() }}');

            fetch('/admin/login', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = '/admin/dashboard';
                } else {
                    alert('Password salah!');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error: ' + error);
            });
        });
    </script>

    {{-- ABOUT --}}
    <section id="a" class="min-h-screen text-white py-25">
        <div class="container mx-auto px-6">
            <h1 class="text-4xl font-bold text-center mb-12">ABOUT</h1>
            
            <div class="flex flex-col lg:flex-row items-center justify-center gap-12 max-w-6xl mx-auto">
                <div class="flex-1 text-center lg:text-left">
                    <h1 class="text-4xl lg:text-5xl font-bold mb-6">
                        Hi, I am <span class="bg-linear-to-r from-yellow-400 to-green-400 bg-clip-text text-transparent animate-gradient">Dimas Rizki Ardiansyah</span>
                    </h1>
                    <h2 class="text-2xl lg:text-3xl text-gray-300 mb-4">
                        I am <span class="text-blue-400 font-semibold">Informatics Engineering</span> student
                    </h2>
                    <p class="text-xl text-gray-400 mb-8">
                        Universitas Pembangunan Nasional "Veteran" Yogyakarta
                    </p>

                    <div class="bg-gray-800/50 backdrop-blur-sm rounded-xl p-6 border border-gray-700 max-w-md mx-auto lg:mx-0">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="bg-blue-500/20 rounded-full w-12 h-12 flex items-center justify-center">
                                <span class="text-2xl">🌐</span>
                            </div>
                            <div>
                                <h4 class="text-xl font-semibold text-white">Web Development</h4>
                                <p class="text-gray-400 text-sm">Full Stack Developer Laravel</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex-1 flex justify-center relative">
                    <div class="relative">
                        <img src="{{ asset('imgg/Dimas_Rizki.png') }}" 
                                alt="Dimas Rizki Ardiansyah"
                                class="w-72 h-auto rounded-2xl relative z-10">
                    <div class="absolute bottom-0 left-0 right-0 h-16 bg-linear-to-t from-gray-900 to-transparent rounded-b-2xl z-20"></div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- EXPERIENCE --}}
    <section id="b" class="min-h-screen snap-start py-25 text-white">
        <h1 class="text-4xl font-bold text-center mb-12">EXPERIENCE</h1>
        <div class="max-w-6xl mx-auto px-6">
            <div class="space-y-8">
                @foreach($experiences as $experience)
                    <div class="relative pl-8 border-l-2 border-yellow-400">
                        <div class="absolute -left-2 mt-6 w-4 h-4 bg-yellow-400 rounded-full z-10"></div>
                            <div class="bg-gray-800/50 backdrop-blur-sm rounded-xl p-6 hover:bg-gray-800/70 transition duration-300 flex flex-col lg:flex-row gap-6">
                                @if($experience->gambar)
                                    <div class="lg:w-1/4 shrink-0">
                                        <img src="{{ asset('storage/experiences/'. $experience->gambar) }}" 
                                            alt="{{ $experience->instansi }}"
                                            class="w-full h-40 lg:h-48 object-cover rounded-lg shadow-lg">
                                        {{-- <img src="{{ Storage::disk('cloudinary')->url($experience->gambar) }}" 
                                            alt="{{ $experience->instansi }}"
                                            class="w-full h-40 lg:h-48 object-cover rounded-lg shadow-lg"> --}}
                                    </div>
                                @endif

                            <div class="flex-1">
                                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-4">
                                    <div>
                                        <h3 class="text-2xl font-bold text-white">{{ $experience->posisi }}</h3>
                                        <p class="text-xl text-yellow-400">{{ $experience->instansi }}</p>
                                    </div>
                                    <div class="mt-2 lg:mt-0 text-right">
                                        <span class="inline-block bg-yellow-500 text-gray-900 text-sm font-semibold px-3 py-1 rounded-full">
                                            {{ $experience->tipe_label }}
                                        </span>
                                    </div>
                                </div>

                                <div class="flex items-center text-gray-300 mb-3">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="font-medium">
                                        {{ $experience->tanggal_mulai->format('M Y') }} - 
                                        @if($experience->sedang_bekerja)
                                            Present
                                        @else
                                            {{ $experience->tanggal_selesai->format('M Y') }}
                                        @endif
                                        • {{ $experience->durasi }}
                                    </span>
                                </div>

                                <p class="text-gray-300 text-lg leading-relaxed mb-4">
                                    {{ $experience->deskripsi }}
                                </p>

                                @if($experience->skills->count() > 0)
                                    <div class="mt-4">
                                        <h4 class="text-sm font-semibold text-gray-400 mb-2">Skills Used:</h4>
                                        <div class="flex flex-wrap gap-2">
                                            @foreach($experience->skills as $skill)
                                                <span class="bg-gray-700 text-gray-300 text-xs px-3 py-1 rounded-full">
                                                    {{ $skill->nama }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- PROJECT --}}
    <section id="c" class="min-h-screen text-white py-25 bg-gray-800/30">
        <div class="container mx-auto px-6">
            <h1 class="text-4xl font-bold text-center mb-4">PROJECT</h1>
            <p class="text-gray-400 text-center mb-12 text-lg">Beberapa project yang telah saya kerjakan</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($projects as $project)
                <div class="bg-gray-800/50 backdrop-blur-sm rounded-xl overflow-hidden hover:transform hover:scale-105 hover:shadow-2xl transition-all duration-300 border border-gray-700">

                    <img src="{{ asset('storage/projects/' . $project->gambar) }}" 
                        alt="{{ $project->judul }}"
                        class="w-full h-48 object-cover">

                    {{-- <img src="{{ Storage::disk('cloudinary')->url($project->gambar) }}" 
                        alt="{{ $project->judul }}"
                        class="w-full h-48 object-cover"> --}}

                    <div class="absolute top-4 right-4">
                        <span class="bg-yellow-500 text-gray-900 text-xs font-bold px-3 py-1 rounded-full">
                            {{ $project->kategori_label }}
                        </span>
                    </div>
                </div>

                <div class="p-6">
                    <h3 class="text-xl font-bold text-white mb-3">{{ $project->judul }}</h3>
                    <p class="text-gray-300 text-sm leading-relaxed mb-4 line-clamp-3">
                        {{ $project->deskripsi }}
                    </p>

                    @if($project->skills->count() > 0)
                        <div class="mb-4">
                            <h4 class="text-xs font-semibold text-gray-400 mb-2">Tech Stack:</h4>
                            <div class="flex flex-wrap gap-1.5">
                                @foreach($project->skills as $skill)
                                <span class="bg-gray-700 text-gray-300 text-xs px-2.5 py-1.5 rounded-full border border-gray-600 hover:bg-gray-600 transition duration-200 flex items-center gap-1.5">
                                    @if($skill->gambar)

                                        <img src="{{ asset('storage/skills/' . $skill->gambar) }}" 
                                                alt="{{ $skill->nama }}"
                                                class="w-3 h-3 object-contain">

                                        {{-- <img src="{{ Storage::disk('cloudinary')->url($skill->gambar) }}" 
                                                alt="{{ $skill->nama }}"
                                                class="w-3 h-3 object-contain"> --}}
                                    @endif
                                    <span>{{ $skill->nama }}</span>
                                </span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="flex gap-3">
                        @if($project->link)
                            <a href="{{ $project->link }}" 
                                target="_blank"
                                class="flex-1 bg-blue-500 hover:bg-blue-600 text-white text-center py-2 px-4 rounded-lg text-sm font-semibold transition duration-200 flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z"/>
                                    <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z"/>
                                </svg>
                                Live Demo
                            </a>
                        @else
                            <button class="flex-1 bg-gray-600 text-gray-400 text-center py-2 px-4 rounded-lg text-sm font-semibold cursor-not-allowed flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                                No Demo
                            </button>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- SKILL --}}
    <section id="d" class="min-h-screen text-white py-25">
        <div class="container mx-auto px-6">
            <h1 class="text-4xl font-bold text-center mb-4">SKILL</h1>
            <p class="text-gray-400 text-center mb-12 text-lg">Kemampuan dan keahlian yang saya kuasai</p>
            
            <div class="mb-16">
                <h2 class="text-2xl font-bold text-center mb-8 text-blue-400 flex items-center justify-center gap-3">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                    Hard Skills
                </h2>
                
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-6">
                    @php
                        $hardSkills = $skills->where('tipe', 'hard');
                    @endphp
                    
                    @foreach($hardSkills as $skill)
                        <div class="bg-gray-800/50 backdrop-blur-sm rounded-xl p-4 text-center hover:bg-gray-700/50 transition duration-300 border border-gray-700 group hover:border-blue-400">
                            @if($skill->gambar)

                                <img src="{{ asset('storage/skills/' . $skill->gambar) }}"  
                                alt="{{ $skill->nama }}"
                                class="w-12 h-12 object-contain filter group-hover:brightness-110 transition duration-300">

                                {{-- <div class="bg-blue-500/10 rounded-full w-20 h-20 mx-auto mb-3 flex items-center justify-center group-hover:bg-blue-500/20 transition duration-300 p-2">
                                    <img src="{{ Storage::disk('cloudinary')->url($skill->gambar) }}"  
                                            alt="{{ $skill->nama }}"
                                            class="w-12 h-12 object-contain filter group-hover:brightness-110 transition duration-300"> --}}
                                {{-- </div> --}}
                            @else
                                <div class="bg-blue-500/20 rounded-full w-20 h-20 mx-auto mb-3 flex items-center justify-center group-hover:bg-blue-500/30 transition duration-300">
                                    <span class="text-2xl">
                                        @switch($skill->nama)
                                            @case('Laravel') 🔥 @break
                                            @case('PHP') 🐘 @break
                                            @case('JavaScript') 📜 @break
                                            @case('React.js') ⚛️ @break
                                            @case('Vue.js') 🖖 @break
                                            @case('Tailwind CSS') 🎨 @break
                                            @case('MySQL') 🗄️ @break
                                            @case('Git') 📦 @break
                                            @case('REST API') 🔌 @break
                                            @case('Node.js') 📡 @break
                                            @case('Python') 🐍 @break
                                            @case('Java') ☕ @break
                                            @case('C++') ⚙️ @break
                                            @case('HTML') 📄 @break
                                            @case('CSS') 🎯 @break
                                            @default 💼
                                        @endswitch
                                    </span>
                                </div>
                            @endif
                            
                            <h3 class="font-semibold text-white text-sm mb-1">{{ $skill->nama }}</h3>
                            <span class="text-xs text-blue-400 font-medium">Hard Skill</span>
                        </div>
                    @endforeach

                    @if($hardSkills->count() == 0)
                        <div class="col-span-full text-center py-8">
                            <div class="text-4xl mb-2">🔧</div>
                            <p class="text-gray-400">No hard skills added yet</p>
                        </div>
                    @endif
                </div>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-center mb-8 text-green-400 flex items-center justify-center gap-3">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    Soft Skills
                </h2>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-6">
                    @php
                        $softSkills = $skills->where('tipe', 'soft');
                    @endphp
                    
                    @foreach($softSkills as $skill)
                        <div class="bg-gray-800/50 backdrop-blur-sm rounded-xl p-4 text-center hover:bg-gray-700/50 transition duration-300 border border-gray-700 group hover:border-green-400">
                            <div class="bg-green-500/20 rounded-full w-20 h-20 mx-auto mb-3 flex items-center justify-center group-hover:bg-green-500/30 transition duration-300">
                                <span class="text-3xl">💡</span> <!-- Default icon aja -->
                            </div>
                            
                            <h3 class="font-semibold text-white text-sm mb-1">{{ $skill->nama }}</h3>
                            <span class="text-xs text-green-400 font-medium">Soft Skill</span>
                        </div>
                    @endforeach
                </div>

                @if($softSkills->count() == 0)
                    <div class="col-span-full text-center py-8">
                        <div class="text-4xl mb-2">💭</div>
                        <p class="text-gray-400">No soft skills added yet</p>
                    </div>
                @endif
            </div>
        </div>

        <div class="text-center mt-12">
            <div class="inline-grid grid-cols-2 gap-8 bg-gray-800/50 rounded-xl px-8 py-6">
                <div class="text-center">
                    <div class="text-3xl text-blue-400 font-bold">{{ $hardSkills->count() }}</div>
                    <div class="text-gray-300 text-sm">Hard Skills</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl text-green-400 font-bold">{{ $softSkills->count() }}</div>
                    <div class="text-gray-300 text-sm">Soft Skills</div>
                </div>
            </div>
        </div>
    </section>

    {{-- CONTACT --}}
    <section id="e" class="min-h-screen text-white py-25 bg-gray-800/20">
        <div class="container mx-auto px-6">
            <h1 class="text-4xl font-bold text-center mb-4">CONTACT</h1>
            <p class="text-gray-400 text-center mb-12 text-lg">Jangan ragu untuk menghubungi saya</p>
            
            <div class="max-w-4xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                    <a href="https://wa.me/+6281325814635" 
                        target="_blank"
                        class="bg-gray-800/50 backdrop-blur-sm rounded-xl p-6 hover:bg-green-500/20 hover:border-green-400 transition duration-300 border border-gray-700 group">
                        <div class="text-center">
                            <div class="bg-green-500/20 rounded-full w-16 h-16 mx-auto mb-4 flex items-center justify-center group-hover:bg-green-500/30 transition duration-300">
                                <img src="{{ asset('logo/whatsapp.png') }}" alt="WhatsApp" class="w-8 h-8 invert">
                            </div>
                            <h3 class="font-bold text-white text-lg mb-2">WhatsApp</h3>
                            <p class="text-gray-300 text-sm mb-3">+62 813-2581-4635</p>
                            <span class="text-green-400 text-xs font-semibold">Click to Chat</span>
                        </div>
                    </a>

                    <a href="https://www.instagram.com/drzkyyy__/profilecard/?igsh=MWt5aThodHR4d3Iydg==" 
                        target="_blank"
                        class="bg-gray-800/50 backdrop-blur-sm rounded-xl p-6 hover:bg-pink-500/20 hover:border-pink-400 transition duration-300 border border-gray-700 group">
                        <div class="text-center">
                            <div class="bg-pink-500/20 rounded-full w-16 h-16 mx-auto mb-4 flex items-center justify-center group-hover:bg-pink-500/30 transition duration-300">
                                <img src="{{ asset('logo/instagram.png') }}" alt="Instagram" class="w-8 h-8 invert">
                            </div>
                            <h3 class="font-bold text-white text-lg mb-2">Instagram</h3>
                            <p class="text-gray-300 text-sm mb-3">@drzkyyy__</p>
                            <span class="text-pink-400 text-xs font-semibold">Follow Me</span>
                        </div>
                    </a>

                    <a href="https://github.com/Drizkia" 
                        target="_blank"
                        class="bg-gray-800/50 backdrop-blur-sm rounded-xl p-6 hover:bg-gray-500/20 hover:border-gray-400 transition duration-300 border border-gray-700 group">
                        <div class="text-center">
                            <div class="bg-gray-500/20 rounded-full w-16 h-16 mx-auto mb-4 flex items-center justify-center group-hover:bg-gray-500/30 transition duration-300">
                                <img src="{{ asset('logo/github.png') }}" alt="GitHub" class="w-8 h-8 invert">
                            </div>
                            <h3 class="font-bold text-white text-lg mb-2">GitHub</h3>
                            <p class="text-gray-300 text-sm mb-3">Drizkia</p>
                            <span class="text-gray-400 text-xs font-semibold">See My Code</span>
                        </div>
                    </a>

                    <a href="https://www.linkedin.com/in/dimas-rizki-ardiansyah-28580233b/" 
                        target="_blank"
                        class="bg-gray-800/50 backdrop-blur-sm rounded-xl p-6 hover:bg-blue-500/20 hover:border-blue-400 transition duration-300 border border-gray-700 group">
                        <div class="text-center">
                            <div class="bg-blue-500/20 rounded-full w-16 h-16 mx-auto mb-4 flex items-center justify-center group-hover:bg-blue-500/30 transition duration-300">
                                <img src="{{ asset('logo/linkedin.png') }}" alt="LinkedIn" class="w-8 h-8 invert">
                            </div>
                            <h3 class="font-bold text-white text-lg mb-2">LinkedIn</h3>
                            <p class="text-gray-300 text-sm mb-3">Dimas Rizki Ardiansyah</p>
                            <span class="text-blue-400 text-xs font-semibold">Connect</span>
                        </div>
                    </a>

                    <div href="https://discord.gg/AZt2vjPD" 
                        target="_blank"
                        class="bg-gray-800/50 backdrop-blur-sm rounded-xl p-6 hover:bg-indigo-500/20 hover:border-indigo-400 transition duration-300 border border-gray-700 group">
                        <div class="text-center">
                            <div class="bg-indigo-500/20 rounded-full w-16 h-16 mx-auto mb-4 flex items-center justify-center group-hover:bg-indigo-500/30 transition duration-300">
                                <img src="{{ asset('logo/discord.png') }}" alt="Discord" class="w-8 h-8 invert">
                            </div>
                            <h3 class="font-bold text-white text-lg mb-2">Discord</h3>
                            <p class="text-gray-300 text-sm mb-3">xaxaaaa_</p>
                            <span class="text-indigo-400 text-xs font-semibold">Let's Talk</span>
                        </div>
                    </div>

                    <div class="bg-gray-800/50 backdrop-blur-sm rounded-xl p-6 border border-gray-700">
                        <div class="text-center">
                            <div class="bg-red-500/20 rounded-full w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                                <img src="{{ asset('logo/gmail.png') }}" alt="Email" class="w-8 h-8 invert">
                            </div>
                            <h3 class="font-bold text-white text-lg mb-2">Email</h3>
                            <p class="text-gray-300 text-sm mb-3">dimasrizkia477@gmail.com</p>
                            <span class="text-red-400 text-xs font-semibold">Available</span>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-800/30 rounded-xl p-8 border border-gray-700">
                    <div class="text-center">
                        <h3 class="text-2xl font-bold text-white mb-4">Mari Berkolaborasi! 🚀</h3>
                        <p class="text-gray-300 mb-6 max-w-2xl mx-auto">
                            Tertarik dengan project saya? Ingin berdiskusi tentang peluang kolaborasi? 
                            <br>Jangan ragu untuk menghubungi saya!
                        </p>
                    </div>
                </div>

                <div class="text-center mt-12">
                    <p class="text-gray-400 text-sm">
                        &copy; 2024 Dimas Rizki Ardiansyah.
                    </p>
                    <p class="text-gray-500 text-xs mt-2">
                        Made with Laravel, Tailwind CSS, JavaScript
                    </p>
                </div>
            </div>
        </div>
    </section>

</body>
</html>