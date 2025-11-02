<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-900 text-white min-h-screen">
    <header class="bg-gray-800 border-b border-gray-700">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold">Admin Dashboard</h1>
                <div class="flex gap-4 items-center">
                    <span class="text-gray-400">Welcome, Admin!</span>
                    <a href="/" class="bg-gray-700 hover:bg-gray-600 px-4 py-2 rounded-lg transition duration-200">
                        🌐 View Site
                    </a>
                    <a href="/admin/logout" class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg transition duration-200">
                        🚪 Logout
                    </a>
                </div>
            </div>
        </div>
    </header>

    <div class="container mx-auto px-6 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 hover:border-blue-500 transition duration-200">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-300">Projects</h3>
                    <div class="text-2xl">🚀</div>
                </div>
                <div class="text-3xl font-bold text-white mb-2">{{ $projectsCount }}</div>
                <p class="text-gray-400 text-sm">Total projects</p>
                <a href="/admin/projects" class="block mt-4 bg-blue-500 hover:bg-blue-600 text-white text-center py-2 rounded-lg transition duration-200">
                    Manage Projects
                </a>
            </div>

            <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 hover:border-green-500 transition duration-200">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-300">Experiences</h3>
                    <div class="text-2xl">💼</div>
                </div>
                <div class="text-3xl font-bold text-white mb-2">{{ $experiencesCount }}</div>
                <p class="text-gray-400 text-sm">Work experiences</p>
                <a href="/admin/experiences" class="block mt-4 bg-green-500 hover:bg-green-600 text-white text-center py-2 rounded-lg transition duration-200">
                    Manage Experiences
                </a>
            </div>

            <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 hover:border-yellow-500 transition duration-200">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-300">Skills</h3>
                    <div class="text-2xl">🔧</div>
                </div>
                <div class="text-3xl font-bold text-white mb-2">{{ $skillsCount }}</div>
                <div class="flex justify-between text-sm text-gray-400">
                    <span>Hard: {{ $hardSkillsCount }}</span>
                    <span>Soft: {{ $softSkillsCount }}</span>
                </div>
                <a href="/admin/skills" class="block mt-4 bg-yellow-500 hover:bg-yellow-600 text-white text-center py-2 rounded-lg transition duration-200">
                    Manage Skills
                </a>
            </div>

            <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 hover:border-purple-500 transition duration-200">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-300">Quick Actions</h3>
                    <div class="text-2xl">⚡</div>
                </div>
                <div class="space-y-3">
                    <a href="/admin/projects/create" class="block w-full bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg text-center transition duration-200">
                        + New Project
                    </a>
                    <a href="/admin/experiences/create" class="block w-full bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg text-center transition duration-200">
                        + New Experience
                    </a>
                    <a href="/admin/skills/create" class="block w-full bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg text-center transition duration-200">
                        + New Skill
                    </a>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="bg-gray-800 rounded-xl p-6 border border-gray-700">
                <h3 class="text-xl font-semibold mb-4 flex items-center gap-2">
                    <span>📁</span>
                    Recent Projects
                </h3>
                <div class="space-y-4">
                    @foreach($latestProjects as $project)
                    <div class="flex items-center justify-between p-3 bg-gray-700/50 rounded-lg">
                        <div>
                            <h4 class="font-semibold text-white">{{ $project->judul }}</h4>
                            <p class="text-sm text-gray-400">{{ $project->kategori }}</p>
                        </div>
                        <div class="flex gap-2">
                            <a href="/admin/projects/{{ $project->id_project }}/edit" class="text-blue-400 hover:text-blue-300">
                                ✏️
                            </a>
                            <a href="/admin/projects/{{ $project->id_project }}" class="text-green-400 hover:text-green-300">
                                👁️
                            </a>
                        </div>
                    </div>
                    @endforeach
                    
                    @if($latestProjects->isEmpty())
                    <p class="text-gray-400 text-center py-4">No projects yet</p>
                    @endif
                </div>
                <a href="/admin/projects" class="block mt-4 text-center text-blue-400 hover:text-blue-300">
                    View All Projects →
                </a>
            </div>

            <div class="bg-gray-800 rounded-xl p-6 border border-gray-700">
                <h3 class="text-xl font-semibold mb-4 flex items-center gap-2">
                    <span>💼</span>
                    Recent Experiences
                </h3>
                <div class="space-y-4">
                    @foreach($latestExperiences as $experience)
                    <div class="flex items-center justify-between p-3 bg-gray-700/50 rounded-lg">
                        <div>
                            <h4 class="font-semibold text-white">{{ $experience->posisi }}</h4>
                            <p class="text-sm text-gray-400">{{ $experience->instansi }}</p>
                        </div>
                        <div class="flex gap-2">
                            <a href="/admin/experiences/{{ $experience->id_experient }}/edit" class="text-blue-400 hover:text-blue-300">
                                ✏️
                            </a>
                            <a href="/admin/experiences/{{ $experience->id_experient }}" class="text-green-400 hover:text-green-300">
                                👁️
                            </a>
                        </div>
                    </div>
                    @endforeach
                    
                    @if($latestExperiences->isEmpty())
                    <p class="text-gray-400 text-center py-4">No experiences yet</p>
                    @endif
                </div>
                <a href="/admin/experiences" class="block mt-4 text-center text-green-400 hover:text-green-300">
                    View All Experiences →
                </a>
            </div>
        </div>
    </div>
</body>
</html>