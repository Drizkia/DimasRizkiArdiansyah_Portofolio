<!DOCTYPE html>
<html>
<head>
    <title>Add Experience</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen">
    <div class="container mx-auto px-6 py-8 max-w-4xl">

        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold">Add New Experience</h1>
            <a href="/admin/experiences" class="bg-gray-700 hover:bg-gray-600 px-4 py-2 rounded-lg">← Back</a>
        </div>

        <div id="progressContainer" class="hidden mb-6">
            <div class="flex justify-between text-sm text-gray-300 mb-1">
                <span>Uploading company image...</span>
                <span id="progressPercent">0%</span>
            </div>
            <div class="w-full bg-gray-700 rounded-full h-2">
                <div id="progressBar" class="bg-blue-500 h-2 rounded-full transition-all duration-300" style="width: 0%"></div>
            </div>
        </div>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded-lg mb-6">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-gray-800 rounded-xl p-6">
            <form id="experienceForm" action="/admin/experiences" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-300 mb-2">Company/Instansi</label>
                        <input type="text" name="instansi" required 
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white"
                            placeholder="e.g., Google, Microsoft">
                    </div>

                    <div>
                        <label class="block text-gray-300 mb-2">Position</label>
                        <input type="text" name="posisi" required
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white"
                            placeholder="e.g., Software Engineer, Web Developer">
                    </div>

                    <div>
                        <label class="block text-gray-300 mb-2">Start Date</label>
                        <input type="date" name="tanggal_mulai" required
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white">
                    </div>

                    <div>
                        <label class="block text-gray-300 mb-2">End Date (kosongkan jika masih bekerja)</label>
                        <input type="date" name="tanggal_selesai"
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white">
                    </div>

                    <div>
                        <label class="block text-gray-300 mb-2">Employment Type</label>
                        <select name="tipe" required class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white">
                            <option value="fulltime">Full Time</option>
                            <option value="parttime">Part Time</option>
                            <option value="intern">Internship</option>
                            <option value="freelance">Freelance</option>
                            <option value="volunteer">Volunteer</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-300 mb-2">Current Status</label>
                        <select name="is_active" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white">
                            <option value="1">Currently Working</option>
                            <option value="0">Past Experience</option>
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-gray-300 mb-2">Company Logo (optional)</label>
                        <input type="file" name="gambar" accept="image/*" id="gambarInput"
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white">
                        <p class="text-sm text-gray-400 mt-1">Recommended: Square aspect ratio, max 2MB</p>
                    </div>
                </div>

                <div class="mt-6">
                    <label class="block text-gray-300 mb-2">Description</label>
                    <textarea name="deskripsi" required rows="5"
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white"
                            placeholder="Describe your role, responsibilities, and achievements..."></textarea>
                </div>

                <div class="mt-6">
                    <label class="block text-gray-300 mb-2">Skills Used</label>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                        @foreach($skills as $skill)
                            <label class="flex items-center gap-2 p-2 bg-gray-700 rounded hover:bg-gray-600 cursor-pointer">
                                <input type="checkbox" name="skills[]" value="{{ $skill->id_skill }}">
                                <span>{{ $skill->nama }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="mt-8 flex items-center">
                    <button type="submit" id="submitBtn" class="bg-blue-500 hover:bg-blue-600 px-6 py-3 rounded-lg font-semibold transition-all duration-300 flex items-center">
                        <span id="btnText">Save Experience</span>
                        <div id="loadingSpinner" class="hidden ml-2">
                            <div class="animate-spin rounded-full h-4 w-4 border-b-2 border-white"></div>
                        </div>
                    </button>

                    <button type="button" id="cancelBtn" class="hidden ml-4 bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let uploadInProgress = false;
        let progressInterval;

        document.getElementById('experienceForm').addEventListener('submit', function(e) {
            const fileInput = document.getElementById('gambarInput');
            const submitBtn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            const loadingSpinner = document.getElementById('loadingSpinner');
            const progressContainer = document.getElementById('progressContainer');
            const progressBar = document.getElementById('progressBar');
            const progressPercent = document.getElementById('progressPercent');
            const cancelBtn = document.getElementById('cancelBtn');

            if (fileInput.files.length > 0) {
                e.preventDefault();

                if (uploadInProgress) return;

                uploadInProgress = true;

                submitBtn.disabled = true;
                submitBtn.classList.add('opacity-50', 'cursor-not-allowed', 'bg-blue-400');
                btnText.textContent = 'Uploading...';
                loadingSpinner.classList.remove('hidden');
                progressContainer.classList.remove('hidden');
                cancelBtn.classList.remove('hidden');

                let progress = 0;
                progressInterval = setInterval(() => {
                    progress += Math.random() * 10;
                    if (progress >= 90) {
                        progress = 90;
                        clearInterval(progressInterval);
                    }
                    progressBar.style.width = progress + '%';
                    progressPercent.textContent = Math.round(progress) + '%';
                }, 200);

                const formData = new FormData(this);

                fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    }
                })
                .then(response => {
                    clearInterval(progressInterval);
                    
                    if (response.ok) {
                        progressBar.style.width = '100%';
                        progressPercent.textContent = '100%';
                        progressBar.classList.add('bg-green-500');
                        btnText.textContent = 'Success!';

                        setTimeout(() => {
                            window.location.href = '/admin/experiences';
                        }, 800);
                    } else {
                        throw new Error('Upload failed');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    clearInterval(progressInterval);

                    progressBar.classList.add('bg-red-500');
                    progressPercent.textContent = 'Failed!';
                    btnText.textContent = 'Failed - Try Again';

                    setTimeout(() => {
                        resetUploadUI();
                    }, 2000);
                });

                cancelBtn.onclick = function() {
                    clearInterval(progressInterval);
                    resetUploadUI();
                };
            }
        });

        function resetUploadUI() {
            const submitBtn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            const loadingSpinner = document.getElementById('loadingSpinner');
            const progressContainer = document.getElementById('progressContainer');
            const progressBar = document.getElementById('progressBar');
            const progressPercent = document.getElementById('progressPercent');
            const cancelBtn = document.getElementById('cancelBtn');

            uploadInProgress = false;
            
            submitBtn.disabled = false;
            submitBtn.classList.remove('opacity-50', 'cursor-not-allowed', 'bg-blue-400');
            btnText.textContent = 'Save Experience';
            loadingSpinner.classList.add('hidden');
            progressContainer.classList.add('hidden');
            cancelBtn.classList.add('hidden');
            
            progressBar.style.width = '0%';
            progressBar.classList.remove('bg-green-500', 'bg-red-500');
            progressBar.classList.add('bg-blue-500');
            progressPercent.textContent = '0%';
        }

        document.getElementById('gambarInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                if (file.size > 2 * 1024 * 1024) {
                    alert('File size must be less than 2MB');
                    this.value = '';
                    return;
                }
                
                const validTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg', 'image/webp'];
                if (!validTypes.includes(file.type)) {
                    alert('Please select a valid image file (JPEG, PNG, GIF, WebP)');
                    this.value = '';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    console.log('Company logo selected:', file.name, 'Size:', (file.size / 1024).toFixed(2) + 'KB');
                };
                reader.readAsDataURL(file);
            }
        });

        const endDateInput = document.querySelector('input[name="tanggal_selesai"]');
        const isActiveSelect = document.querySelector('select[name="is_active"]');
        
        endDateInput.addEventListener('change', function() {
            if (!this.value) {
                isActiveSelect.value = '1';
            } else {
                const endDate = new Date(this.value);
                const today = new Date();
                
                if (endDate > today) {
                    isActiveSelect.value = '1';
                } else {
                    isActiveSelect.value = '0';
                }
            }
        });

        document.querySelectorAll('input[name="skills[]"]').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const label = this.parentElement;
                if (this.checked) {
                    label.classList.add('bg-blue-600', 'border', 'border-blue-400');
                    label.classList.remove('bg-gray-700');
                } else {
                    label.classList.remove('bg-blue-600', 'border', 'border-blue-400');
                    label.classList.add('bg-gray-700');
                }
            });
        });

        const startDateInput = document.querySelector('input[name="tanggal_mulai"]');
        if (!startDateInput.value) {
            const today = new Date().toISOString().split('T')[0];
            startDateInput.value = today;
        }
    </script>
</body>
</html>