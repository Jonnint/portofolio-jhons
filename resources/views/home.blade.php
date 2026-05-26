<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $profile->name ?? 'Developer' }} | Professional Portfolio</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- AOS Animation CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#0b0f19] text-gray-200 overflow-x-hidden font-['Outfit',_sans-serif]">

    <!-- Optimized Background Grid Layer (Fixed & composited to prevent paint-on-scroll lag) -->
    <div id="bg-grid" class="fixed inset-0 z-[-1] pointer-events-none"></div>

    <!-- Custom Cursor -->
    <div class="custom-cursor-dot hidden md:block"></div>
    <div class="custom-cursor-outline hidden md:block"></div>

    <!-- Scroll Progress Bar -->
    <div class="scroll-progress-bar"></div>

    <!-- Loading Screen -->
    <div class="loading-screen" id="loadingScreen">
        <div class="loader-content text-center">
            <div class="loader-spinner"></div>
            <h2 class="text-2xl font-bold tracking-wider text-cyan-400 mt-4 animate-pulse uppercase">Loading Jhon...</h2>
            <p class="text-xs text-gray-500 mt-2 font-mono">Initializing premium assets...</p>
        </div>
    </div>

    <!-- Sticky Navbar -->
    <header class="fixed top-0 left-0 w-full z-50 transition-all duration-300" id="navbar">
        <nav class="container mx-auto px-6 py-4 flex items-center justify-between">
            <div class="text-2xl font-extrabold tracking-tight text-white flex items-center">
                <span class="bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent">{{ $profile->name ?? 'Jhons' }}</span>
                <span class="text-cyan-400">.</span>
            </div>
            
            <ul class="hidden md:flex items-center space-x-8 text-sm font-medium text-gray-400">
                <li><a href="#home" class="nav-link text-white transition-colors duration-300">Home</a></li>
                <li><a href="#about" class="nav-link hover:text-white transition-colors duration-300">About</a></li>
                <li><a href="#skills" class="nav-link hover:text-white transition-colors duration-300">Skills</a></li>
                <li><a href="#project" class="nav-link hover:text-white transition-colors duration-300">Galeri</a></li>
                <li><a href="#contact" class="nav-link hover:text-white transition-colors duration-300">Contact</a></li>
                <li><a href="#guestbook" class="nav-link hover:text-white transition-colors duration-300">Guestbook</a></li>
            </ul>

            <div class="hidden md:block">
                <a href="#contact" class="px-6 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider text-white border border-cyan-500/30 bg-cyan-950/20 hover:bg-cyan-500 hover:text-black hover:shadow-[0_0_20px_rgba(6,182,212,0.4)] transition-all duration-300">Let's Talk</a>
            </div>

            <!-- Hamburger menu button -->
            <button class="md:hidden text-white focus:outline-none z-50" id="menuBtn">
                <div class="w-6 h-0.5 bg-white mb-1.5 transition-all duration-300" id="line1"></div>
                <div class="w-6 h-0.5 bg-white mb-1.5 transition-all duration-300" id="line2"></div>
                <div class="w-6 h-0.5 bg-white transition-all duration-300" id="line3"></div>
            </button>
        </nav>

        <!-- Mobile Menu Overlay -->
        <div class="fixed inset-0 bg-[#0b0f19]/95 backdrop-blur-lg flex flex-col justify-center items-center text-2xl space-y-6 z-40 transform translate-x-full transition-transform duration-300 ease-in-out md:hidden" id="mobileMenu">
            <a href="#home" class="mobile-nav-link text-gray-400 hover:text-cyan-400 transition-colors">Home</a>
            <a href="#about" class="mobile-nav-link text-gray-400 hover:text-cyan-400 transition-colors">About</a>
            <a href="#skills" class="mobile-nav-link text-gray-400 hover:text-cyan-400 transition-colors">Skills</a>
            <a href="#project" class="mobile-nav-link text-gray-400 hover:text-cyan-400 transition-colors">Galeri</a>
            <a href="#contact" class="mobile-nav-link text-gray-400 hover:text-cyan-400 transition-colors">Contact</a>
            <a href="#guestbook" class="mobile-nav-link text-gray-400 hover:text-cyan-400 transition-colors">Guestbook</a>
        </div>
    </header>

    <!-- Main Container -->
    <main class="relative z-10">

        <!-- Ambient Glow Elements (Optimized: static & GPU composited to prevent paint lag) -->
        <div class="absolute top-[10%] left-[5%] w-[400px] h-[400px] bg-cyan-600/10 rounded-full blur-[120px] pointer-events-none" style="will-change: transform;"></div>
        <div class="absolute top-[40%] right-[5%] w-[500px] h-[500px] bg-blue-600/10 rounded-full blur-[140px] pointer-events-none" style="will-change: transform;"></div>
        <div class="absolute bottom-[15%] left-[10%] w-[450px] h-[450px] bg-purple-600/10 rounded-full blur-[130px] pointer-events-none" style="will-change: transform;"></div>

        <!-- 1. Hero Section -->
        <section id="home" class="min-h-screen flex items-center pt-20 sm:pt-24 pb-12 relative overflow-hidden">
            <div class="container mx-auto px-4 sm:px-6 grid grid-cols-1 md:grid-cols-12 gap-8 md:gap-12 items-center">
                <div class="md:col-span-7 z-10 text-center md:text-left">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-cyan-500/10 border border-cyan-500/20 text-cyan-400 text-xs font-semibold tracking-wider uppercase mb-4 sm:mb-6" data-aos="fade-right">
                        <span class="w-2 h-2 rounded-full bg-cyan-400 animate-ping"></span>
                        👋 Haloo Semuanya
                    </div>
                    
                    <h1 class="text-3xl sm:text-5xl md:text-6xl font-black text-white tracking-tight mb-3 sm:mb-4 leading-tight" data-aos="fade-up" data-aos-delay="100">
                        Saya <span class="bg-gradient-to-r from-cyan-400 via-blue-400 to-purple-500 bg-clip-text text-transparent">{{ $profile->name ?? 'Jonni' }}</span>
                    </h1>
                    
                    <h2 class="text-lg sm:text-2xl md:text-3xl font-bold text-gray-400 mb-4 sm:mb-6" data-aos="fade-up" data-aos-delay="200">
                        Sebagai <span class="text-cyan-400 font-mono tracking-wide" id="typing-profession"></span>
                    </h2>
                    
                    <p class="text-sm sm:text-base md:text-lg text-gray-400 leading-relaxed mb-6 sm:mb-8 max-w-xl mx-auto md:mx-0" data-aos="fade-up" data-aos-delay="300">
                        {{ $profile->description ?? 'Saya merupakan pelajar SMK jurusan Pengembangan Perangkat Lunak dan Gim (PPLG) yang memiliki ketertarikan pada bidang pengembangan web.' }}
                    </p>

                    <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center md:justify-start items-center mb-6 sm:mb-8" data-aos="fade-up" data-aos-delay="400">
                        <a href="#contact" class="w-full sm:w-auto text-center px-6 sm:px-8 py-3 sm:py-3.5 rounded-full text-sm font-extrabold uppercase tracking-wider text-black bg-cyan-400 hover:bg-cyan-300 hover:shadow-[0_0_30px_rgba(34,211,238,0.5)] transition-all duration-300">
                            Hire Me <i class="fas fa-arrow-right ml-2 text-xs"></i>
                        </a>
                        <a href="{{ $profile->cv_path ?? '#' }}" class="w-full sm:w-auto text-center px-6 sm:px-8 py-3 sm:py-3.5 rounded-full text-sm font-extrabold uppercase tracking-wider text-white border border-gray-700 hover:border-cyan-400 hover:text-cyan-400 hover:bg-cyan-500/5 transition-all duration-300">
                            <i class="fas fa-download mr-2"></i> Download CV
                        </a>
                    </div>

                    <!-- Hero Stats -->
                    <div class="grid grid-cols-2 gap-3 sm:gap-4 max-w-xs sm:max-w-sm mx-auto md:mx-0 border-t border-gray-800/80 pt-6 sm:pt-8" data-aos="fade-up" data-aos-delay="500">
                        <div>
                            <div class="text-2xl sm:text-3xl font-black text-white flex items-center justify-center md:justify-start gap-1">
                                <span class="counter" data-target="{{ $profile->completed_projects ?? 5 }}">0</span><span>+</span>
                            </div>
                            <div class="text-[10px] sm:text-xs text-gray-500 uppercase tracking-wider mt-1">Projek Selesai</div>
                        </div>
                        <div>
                            <div class="text-2xl sm:text-3xl font-black text-white flex items-center justify-center md:justify-start gap-1">
                                <span class="counter" data-target="{{ $profile->experience_years ?? 1 }}">0</span><span>+</span>
                            </div>
                            <div class="text-[10px] sm:text-xs text-gray-500 uppercase tracking-wider mt-1">Tahun Pengalaman</div>
                        </div>
                    </div>

                    <!-- Social Icons -->
                    <div class="flex gap-3 sm:gap-4 justify-center md:justify-start mt-6 sm:mt-8" data-aos="fade-up" data-aos-delay="600">
                        @foreach($socials as $social)
                            <a href="{{ $social->url }}" target="_blank" aria-label="{{ $social->name }}" 
                               class="w-10 h-10 rounded-full border border-gray-800 flex items-center justify-center text-gray-400 hover:text-cyan-400 hover:border-cyan-400 hover:bg-cyan-500/5 hover:scale-110 hover:shadow-[0_0_15px_rgba(6,182,212,0.2)] transition-all duration-300">
                                <i class="{{ $social->icon }}"></i>
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Floating Image Container -->
                <div class="md:col-span-5 flex justify-center z-10" data-aos="zoom-in" data-aos-delay="200">
                    <div class="relative w-60 h-60 sm:w-72 sm:h-72 md:w-80 md:h-80 lg:w-96 lg:h-96 group">
                        <!-- Floating Background Glow Orbs -->
                        <div class="absolute -inset-1 bg-gradient-to-r from-cyan-500 to-blue-600 rounded-2xl blur opacity-30 group-hover:opacity-50 transition duration-1000 group-hover:duration-200 animate-pulse"></div>
                        
                        <div class="relative w-full h-full rounded-2xl overflow-hidden border border-gray-800 bg-[#0d1321] p-3 sm:p-4 flex items-center justify-center">
                            <img src="{{ asset('assets/img/image.png') }}" alt="{{ $profile->name ?? 'Profile image' }}" class="w-full h-full object-cover rounded-xl transition-all duration-500 group-hover:scale-105 pointer-events-none">
                            
                            <!-- Micro-cards: hidden on small mobile to prevent overflow -->
                            <div class="hidden sm:flex absolute top-8 -left-6 bg-[#0f172a]/80 backdrop-blur-md border border-gray-800 rounded-xl px-4 py-2 items-center gap-2 text-xs font-bold text-white shadow-lg pointer-events-none float-animation">
                                <i class="fas fa-code text-cyan-400"></i>
                                <span>Clean Code</span>
                            </div>
                            
                            <div class="hidden sm:flex absolute bottom-16 -right-6 bg-[#0f172a]/80 backdrop-blur-md border border-gray-800 rounded-xl px-4 py-2 items-center gap-2 text-xs font-bold text-white shadow-lg pointer-events-none float-animation" style="animation-delay: -2s;">
                                <i class="fas fa-mobile-alt text-cyan-400"></i>
                                <span>Responsive</span>
                            </div>
                            
                            <div class="hidden sm:flex absolute -bottom-4 left-10 bg-[#0f172a]/80 backdrop-blur-md border border-gray-800 rounded-xl px-4 py-2 items-center gap-2 text-xs font-bold text-white shadow-lg pointer-events-none float-animation" style="animation-delay: -4s;">
                                <i class="fas fa-rocket text-cyan-400"></i>
                                <span>Fast Loading</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Scroll Indicator -->
            <div class="absolute bottom-4 sm:bottom-8 left-1/2 transform -translate-x-1/2 flex flex-col items-center opacity-60">
                <span class="text-[10px] sm:text-xs uppercase tracking-widest font-mono text-gray-500 mb-2">Scroll Down</span>
                <div class="w-5 h-8 border-2 border-gray-700 rounded-full flex justify-center p-1">
                    <div class="w-1.5 h-1.5 bg-cyan-400 rounded-full animate-bounce"></div>
                </div>
            </div>
        </section>

        <!-- 2. About Section -->
        <section id="about" class="py-16 sm:py-24 border-t border-gray-900 bg-[#070b13]/60 relative">
            <div class="container mx-auto px-4 sm:px-6">
                <div class="text-center max-w-xl mx-auto mb-10 sm:mb-16">
                    <h2 class="text-xs uppercase tracking-widest text-cyan-400 font-bold mb-2">My Biography</h2>
                    <p class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-white">Tentang Saya</p>
                    <div class="w-12 h-1 bg-cyan-400 mx-auto mt-4 rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                    <div class="lg:col-span-5 flex justify-center" data-aos="fade-right">
                        <div class="relative w-56 h-56 sm:w-64 sm:h-64 md:w-80 md:h-80 rounded-2xl overflow-hidden border border-gray-800 p-2 bg-[#0d1321]/60">
                            <img src="{{ asset('assets/img/image.png') }}" alt="About profile" class="w-full h-full object-cover rounded-xl grayscale hover:grayscale-0 transition-all duration-700">
                        </div>
                    </div>

                    <div class="lg:col-span-7" data-aos="fade-left">
                        <div class="text-gray-400 space-y-4 sm:space-y-6 leading-relaxed">
                            <p class="text-base sm:text-lg text-white font-medium">
                                Saya sedang mendalami bidang pengembangan web, baik dari sisi front-end maupun back-end.
                            </p>
                            <p class="text-sm sm:text-base">
                                {{ $profile->about_details ?? 'Saya merupakan pelajar SMK jurusan PPLG yang memiliki hasrat tinggi untuk terus belajar dan beradaptasi dengan tren teknologi modern.' }}
                            </p>
                        </div>

                        <!-- Highlights Cards -->
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-4 mt-6 sm:mt-8">
                            <div class="p-3 sm:p-4 rounded-xl border border-gray-800 bg-[#0b0f19]/80 backdrop-blur-md flex items-start gap-3 group hover:border-cyan-400/30 transition-all duration-300">
                                <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-lg bg-cyan-500/10 border border-cyan-500/20 flex items-center justify-center text-cyan-400 shrink-0">
                                    <i class="fas fa-graduation-cap text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="text-white text-sm font-bold">Jurusan</h4>
                                    <p class="text-xs text-gray-500 mt-1 leading-snug">{{ $profile->education ?? 'PPLG' }}</p>
                                </div>
                            </div>
                            
                            <div class="p-3 sm:p-4 rounded-xl border border-gray-800 bg-[#0b0f19]/80 backdrop-blur-md flex items-start gap-3 group hover:border-cyan-400/30 transition-all duration-300">
                                <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-lg bg-cyan-500/10 border border-cyan-500/20 flex items-center justify-center text-cyan-400 shrink-0">
                                    <i class="fas fa-map-marker-alt text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="text-white text-sm font-bold">Lokasi</h4>
                                    <p class="text-xs text-gray-500 mt-1 leading-snug">{{ $profile->location ?? 'Depok, Indonesia' }}</p>
                                </div>
                            </div>

                            <div class="p-3 sm:p-4 rounded-xl border border-gray-800 bg-[#0b0f19]/80 backdrop-blur-md flex items-start gap-3 group hover:border-cyan-400/30 transition-all duration-300">
                                <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-lg bg-cyan-500/10 border border-cyan-500/20 flex items-center justify-center text-cyan-400 shrink-0">
                                    <i class="fas fa-briefcase text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="text-white text-sm font-bold">Pengalaman</h4>
                                    <p class="text-xs text-gray-500 mt-1 leading-snug">{{ $profile->experience_years ?? 1 }} Tahun Web Dev</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 3. Skills Section -->
        <section id="skills" class="py-16 sm:py-24 border-t border-gray-900 relative">
            <div class="container mx-auto px-4 sm:px-6">
                <div class="text-center max-w-xl mx-auto mb-10 sm:mb-16">
                    <h2 class="text-xs uppercase tracking-widest text-cyan-400 font-bold mb-2">Expertise</h2>
                    <p class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-white">Skills & Tech Stack</p>
                    <div class="w-12 h-1 bg-cyan-400 mx-auto mt-4 rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8">
                    @foreach($skills as $category => $items)
                        <div class="p-4 sm:p-6 rounded-2xl border border-gray-800 bg-[#070b13]/40 backdrop-blur-sm hover:border-cyan-400/20 transition-all duration-500" data-aos="fade-up">
                            <h3 class="text-lg font-bold text-white mb-6 border-b border-gray-800 pb-3 flex items-center justify-between">
                                <span>{{ $category }}</span>
                                <span class="w-1.5 h-1.5 rounded-full bg-cyan-400"></span>
                            </h3>
                            <div class="space-y-5">
                                @foreach($items as $skill)
                                    <div>
                                        <div class="flex justify-between items-center text-xs font-semibold text-gray-400 mb-1.5">
                                            <span class="flex items-center gap-2">
                                                @if($skill->icon)
                                                    <i class="{{ $skill->icon }} text-cyan-400 text-sm"></i>
                                                @endif
                                                {{ $skill->name }}
                                            </span>
                                            <span>{{ $skill->percentage }}%</span>
                                        </div>
                                        <div class="h-1.5 w-full bg-gray-900 rounded-full overflow-hidden">
                                            <div class="skill-progress-bar h-full bg-gradient-to-r from-cyan-400 to-blue-500 rounded-full" style="width: 0%;" data-percent="{{ $skill->percentage }}"></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- 4. Portfolio Section -->
        <section id="project" class="py-16 sm:py-24 border-t border-gray-900 bg-[#070b13]/60 relative">
            <div class="container mx-auto px-4 sm:px-6">
                <div class="text-center max-w-xl mx-auto mb-8 sm:mb-12">
                    <h2 class="text-xs uppercase tracking-widest text-cyan-400 font-bold mb-2">My Works</h2>
                    <p class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-white">Galeri Projek</p>
                    <div class="w-12 h-1 bg-cyan-400 mx-auto mt-4 rounded-full"></div>
                </div>

                <!-- Filters -->
                <div class="flex flex-wrap justify-center gap-2 sm:gap-3 mb-8 sm:mb-12" data-aos="fade-up">
                    <button class="filter-btn px-4 sm:px-6 py-2 rounded-full text-[10px] sm:text-xs font-bold uppercase tracking-wider bg-cyan-500 text-black shadow-[0_0_15px_rgba(6,182,212,0.3)] transition-all duration-300" data-filter="all">All</button>
                    @foreach($portfolios->pluck('category')->unique() as $cat)
                        <button class="filter-btn px-4 sm:px-6 py-2 rounded-full text-[10px] sm:text-xs font-bold uppercase tracking-wider border border-gray-800 text-gray-400 hover:border-cyan-400 hover:text-cyan-400 transition-all duration-300" data-filter="{{ Str::slug($cat) }}">{{ $cat }}</button>
                    @endforeach
                </div>

                <!-- Portfolios Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8">
                    @foreach($portfolios as $project)
                        <div class="project-item group rounded-2xl overflow-hidden border border-gray-800 bg-[#0b0f19]/80 backdrop-blur-md hover:border-cyan-500/30 hover:shadow-[0_0_30px_rgba(6,182,212,0.15)] transition-all duration-500" data-category="{{ Str::slug($project->category) }}" data-aos="fade-up">
                            <div class="relative overflow-hidden aspect-video">
                                <img src="{{ asset($project->thumbnail) }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                <div class="absolute inset-0 bg-gradient-to-t from-[#0b0f19] via-transparent to-transparent opacity-60"></div>
                            </div>
                            <div class="p-6">
                                <span class="px-2.5 py-1 rounded-md bg-cyan-500/10 border border-cyan-500/20 text-cyan-400 text-[10px] font-bold uppercase tracking-widest">{{ $project->category }}</span>
                                <h3 class="text-xl font-bold text-white mt-3 mb-2 group-hover:text-cyan-400 transition-colors">{{ $project->title }}</h3>
                                <p class="text-xs text-gray-500 line-clamp-2 leading-relaxed mb-4">{{ $project->description }}</p>
                                
                                <div class="flex flex-wrap gap-1.5 mb-6">
                                    @foreach(explode(',', $project->technologies) as $tech)
                                        <span class="px-2 py-0.5 rounded bg-gray-900/60 text-gray-400 font-mono text-[10px]">{{ trim($tech) }}</span>
                                    @endforeach
                                </div>

                                <div class="flex items-center gap-3">
                                    <button class="view-detail-btn flex-1 text-center py-2 rounded-lg text-xs font-bold uppercase tracking-wide text-black bg-cyan-400 hover:bg-cyan-300 transition-colors" 
                                            data-title="{{ $project->title }}" 
                                            data-desc="{{ $project->description }}" 
                                            data-image="{{ asset($project->thumbnail) }}" 
                                            data-tech="{{ $project->technologies }}" 
                                            data-github="{{ $project->github_url }}" 
                                            data-demo="{{ $project->demo_url }}">
                                        View Details
                                    </button>
                                    @if($project->github_url)
                                        <a href="{{ $project->github_url }}" target="_blank" class="w-9 h-9 rounded-lg border border-gray-800 flex items-center justify-center text-gray-400 hover:text-white hover:border-white transition-colors" title="GitHub Source">
                                            <i class="fab fa-github"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Project Detail Modal -->
        <div id="projectModal" class="fixed inset-0 z-50 flex items-center justify-center p-3 sm:p-4 bg-black/90 backdrop-blur-sm hidden">
            <div class="bg-[#0b0f19] border border-gray-800 rounded-2xl max-w-2xl w-full max-h-[85vh] sm:max-h-[90vh] overflow-y-auto p-4 sm:p-6 md:p-8 relative">
                <button class="absolute top-3 right-3 sm:top-4 sm:right-4 text-gray-400 hover:text-white focus:outline-none z-10" id="closeModalBtn">
                    <i class="fas fa-times text-lg sm:text-xl"></i>
                </button>
                <div id="modalContent" class="space-y-4 sm:space-y-6">
                    <img id="modalImage" src="" alt="Project mockup" class="w-full aspect-video object-cover rounded-lg sm:rounded-xl border border-gray-800">
                    <div>
                        <h3 id="modalTitle" class="text-lg sm:text-2xl font-black text-white"></h3>
                        <p id="modalCategory" class="text-xs text-cyan-400 font-mono mt-1"></p>
                    </div>
                    <p id="modalDesc" class="text-gray-400 leading-relaxed text-xs sm:text-sm"></p>
                    <div>
                        <h4 class="text-xs uppercase tracking-widest text-gray-500 font-bold mb-2">Technologies Used</h4>
                        <div id="modalTech" class="flex flex-wrap gap-1.5 sm:gap-2"></div>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 border-t border-gray-800 pt-4 sm:pt-6">
                        <a id="modalGithub" href="" target="_blank" class="flex-1 text-center py-2.5 sm:py-3 rounded-xl text-xs font-bold uppercase tracking-wide border border-gray-700 hover:border-white text-white transition-colors flex items-center justify-center gap-2">
                            <i class="fab fa-github"></i> View GitHub
                        </a>
                        <a id="modalDemo" href="" target="_blank" class="flex-1 text-center py-2.5 sm:py-3 rounded-xl text-xs font-bold uppercase tracking-wide bg-cyan-400 hover:bg-cyan-300 text-black transition-colors flex items-center justify-center gap-2">
                            <i class="fas fa-external-link-alt"></i> Live Demo
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- 5. Gallery Section -->
        <section class="py-16 sm:py-24 border-t border-gray-900 relative">
            <div class="container mx-auto px-4 sm:px-6">
                <div class="text-center max-w-xl mx-auto mb-10 sm:mb-16">
                    <h2 class="text-xs uppercase tracking-widest text-cyan-400 font-bold mb-2">Moments</h2>
                    <p class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-white">Galeri Kegiatan</p>
                    <div class="w-12 h-1 bg-cyan-400 mx-auto mt-4 rounded-full"></div>
                </div>

                <!-- Masonry Gallery -->
                <div class="columns-1 sm:columns-2 lg:columns-3 gap-4 sm:gap-6 space-y-4 sm:space-y-6">
                    @foreach($galleries as $gallery)
                        <div class="break-inside-avoid rounded-xl overflow-hidden border border-gray-800 bg-[#070b13]/40 p-1.5 sm:p-2 group cursor-pointer lightbox-trigger" data-src="{{ asset($gallery->image_path) }}" data-title="{{ $gallery->title ?? 'Kegiatan' }}" data-aos="fade-up">
                            <div class="relative overflow-hidden rounded-lg">
                                <img src="{{ asset($gallery->image_path) }}" alt="{{ $gallery->title }}" class="w-full h-auto object-cover group-hover:scale-105 transition-transform duration-700">
                                <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-3 sm:p-4">
                                    <span class="text-xs text-cyan-400 font-mono">{{ $gallery->category ?? 'Kegiatan' }}</span>
                                    <h4 class="text-white text-sm font-bold mt-1">{{ $gallery->title ?? '' }}</h4>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Lightbox Overlay -->
        <div id="lightbox" class="fixed inset-0 z-50 flex flex-col items-center justify-center p-4 bg-black/95 backdrop-blur-sm hidden">
            <button class="absolute top-4 right-4 text-gray-400 hover:text-white focus:outline-none" id="closeLightboxBtn">
                <i class="fas fa-times text-2xl"></i>
            </button>
            <img id="lightboxImage" src="" alt="Enlarged view" class="max-w-full max-h-[80vh] object-contain rounded-lg border border-gray-800">
            <h4 id="lightboxTitle" class="text-white font-bold mt-4 text-center text-lg"></h4>
        </div>

        <!-- 6. Contact Section -->
        <section id="contact" class="py-16 sm:py-24 border-t border-gray-900 bg-[#070b13]/60 relative">
            <div class="container mx-auto px-4 sm:px-6">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">
                    <div class="lg:col-span-5" data-aos="fade-right">
                        <h2 class="text-xs uppercase tracking-widest text-cyan-400 font-bold mb-2">Get In Touch</h2>
                        <p class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-white mb-4 sm:mb-6">Hubungi Saya</p>
                        <p class="text-sm sm:text-base text-gray-400 mb-6 sm:mb-8 max-w-sm leading-relaxed">Punya proyek menarik atau sekadar ingin menyapa? Silakan hubungi saya melalui form atau kontak di bawah ini.</p>
                        
                        <div class="space-y-6">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-xl bg-cyan-500/10 border border-cyan-500/20 flex items-center justify-center text-cyan-400 shrink-0">
                                    <i class="fas fa-envelope text-lg"></i>
                                </div>
                                <div>
                                    <h4 class="text-white text-sm font-bold">Email</h4>
                                    <p class="text-gray-400 text-sm mt-1">jonni.nicorna.t@gmail.com</p>
                                    <a href="mailto:jonni.nicorna.t@gmail.com" class="text-xs text-cyan-400 hover:underline mt-1 inline-block">Send Email</a>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-xl bg-cyan-500/10 border border-cyan-500/20 flex items-center justify-center text-cyan-400 shrink-0">
                                    <i class="fab fa-whatsapp text-lg"></i>
                                </div>
                                <div>
                                    <h4 class="text-white text-sm font-bold">WhatsApp</h4>
                                    <p class="text-gray-400 text-sm mt-1">0895-1255-2179</p>
                                    <a href="https://wa.me/6289512552179" target="_blank" class="text-xs text-cyan-400 hover:underline mt-1 inline-block">Send Message</a>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-xl bg-cyan-500/10 border border-cyan-500/20 flex items-center justify-center text-cyan-400 shrink-0">
                                    <i class="fas fa-map-marker-alt text-lg"></i>
                                </div>
                                <div>
                                    <h4 class="text-white text-sm font-bold">Lokasi</h4>
                                    <p class="text-gray-400 text-sm mt-1">{{ $profile->location ?? 'Indonesia, Depok' }}</p>
                                    <a href="#" class="text-xs text-cyan-400 hover:underline mt-1 inline-block">View on Map</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-7" data-aos="fade-left">
                        <form id="contactForm" class="p-4 sm:p-6 md:p-8 rounded-2xl border border-gray-800 bg-[#0b0f19]/80 backdrop-blur-md space-y-4 sm:space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="relative">
                                    <input type="text" id="c_name" name="name" required placeholder=" " 
                                           class="w-full px-4 py-3.5 rounded-xl border border-gray-800 bg-[#070b13] focus:border-cyan-400 focus:outline-none text-sm transition-colors text-white peer">
                                    <label for="c_name" class="absolute left-4 top-3.5 text-gray-500 text-sm transition-all duration-300 pointer-events-none peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-cyan-400 -translate-y-6 scale-75 origin-[0_0] bg-[#0b0f19] px-1">Nama Anda</label>
                                </div>
                                <div class="relative">
                                    <input type="email" id="c_email" name="email" required placeholder=" "
                                           class="w-full px-4 py-3.5 rounded-xl border border-gray-800 bg-[#070b13] focus:border-cyan-400 focus:outline-none text-sm transition-colors text-white peer">
                                    <label for="c_email" class="absolute left-4 top-3.5 text-gray-500 text-sm transition-all duration-300 pointer-events-none peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-cyan-400 -translate-y-6 scale-75 origin-[0_0] bg-[#0b0f19] px-1">Email Anda</label>
                                </div>
                            </div>
                            <div class="relative">
                                <input type="text" id="c_subject" name="subject" required placeholder=" "
                                       class="w-full px-4 py-3.5 rounded-xl border border-gray-800 bg-[#070b13] focus:border-cyan-400 focus:outline-none text-sm transition-colors text-white peer">
                                <label for="c_subject" class="absolute left-4 top-3.5 text-gray-500 text-sm transition-all duration-300 pointer-events-none peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-cyan-400 -translate-y-6 scale-75 origin-[0_0] bg-[#0b0f19] px-1">Subjek</label>
                            </div>
                            <div class="relative">
                                <textarea id="c_message" name="message" rows="5" required placeholder=" "
                                          class="w-full px-4 py-3.5 rounded-xl border border-gray-800 bg-[#070b13] focus:border-cyan-400 focus:outline-none text-sm transition-colors text-white peer"></textarea>
                                <label for="c_message" class="absolute left-4 top-3.5 text-gray-500 text-sm transition-all duration-300 pointer-events-none peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-cyan-400 -translate-y-6 scale-75 origin-[0_0] bg-[#0b0f19] px-1">Pesan Anda</label>
                            </div>
                            
                            <button type="submit" class="w-full py-4 rounded-xl text-sm font-extrabold uppercase tracking-widest text-black bg-cyan-400 hover:bg-cyan-300 hover:shadow-[0_0_20px_rgba(6,182,212,0.3)] transition-all duration-300 flex items-center justify-center gap-2">
                                <span>Kirim Pesan</span>
                                <i class="fas fa-paper-plane text-xs"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- 7. Guestbook Section -->
        <section id="guestbook" class="py-16 sm:py-24 border-t border-gray-900 relative">
            <div class="container mx-auto px-4 sm:px-6">
                <div class="text-center max-w-xl mx-auto mb-10 sm:mb-16">
                    <h2 class="text-xs uppercase tracking-widest text-cyan-400 font-bold mb-2">Testimonials</h2>
                    <p class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-white">Buku Tamu</p>
                    <div class="w-12 h-1 bg-cyan-400 mx-auto mt-4 rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">
                    <!-- Guestbook Comments Feed -->
                    <div class="lg:col-span-7 space-y-4 sm:space-y-6" data-aos="fade-right">
                        <div class="space-y-3 sm:space-y-4" id="commentList">
                            @forelse($comments as $comment)
                                <div class="p-4 sm:p-6 rounded-2xl border border-gray-800 bg-[#0b0f19]/40 backdrop-blur-sm flex items-start gap-3 sm:gap-4 hover:border-gray-700/50 transition-colors duration-300">
                                    @if($comment->photo)
                                        <img src="{{ asset($comment->photo) }}" alt="{{ $comment->name }}" class="w-10 h-10 sm:w-12 sm:h-12 rounded-full object-cover border border-cyan-400/20 shrink-0">
                                    @else
                                        <!-- Default Letter Avatar -->
                                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center font-bold text-white text-xs sm:text-sm uppercase shrink-0">
                                            {{ substr($comment->name, 0, 2) }}
                                        </div>
                                    @endif
                                    <div class="min-w-0 flex-1">
                                        <div class="flex items-center gap-2 flex-wrap">
                                            <strong class="text-white text-sm font-semibold">{{ $comment->name }}</strong>
                                            <span class="text-gray-600 text-[10px] font-mono">{{ $comment->created_at->diffForHumans() }}</span>
                                        </div>
                                        <p class="text-gray-400 text-xs sm:text-sm mt-1.5 sm:mt-2 leading-relaxed break-words">{{ $comment->message }}</p>
                                    </div>
                                </div>
                            @empty
                                <div class="p-6 sm:p-8 rounded-2xl border border-dashed border-gray-800 text-center text-gray-500 text-sm">
                                    Belum ada komentar disetujui. Jadilah yang pertama berkomentar!
                                </div>
                            @endforelse
                        </div>

                        <!-- Pagination -->
                        @if($comments->hasPages())
                        <div class="mt-6 sm:mt-8 flex items-center justify-between">
                            @if($comments->onFirstPage())
                                <span class="px-6 py-2 rounded-full text-xs font-bold uppercase tracking-wider text-gray-600 border border-gray-800 bg-gray-900/20 cursor-not-allowed">
                                    ← Previous
                                </span>
                            @else
                                <a href="{{ $comments->previousPageUrl() }}#guestbook" class="px-6 py-2 rounded-full text-xs font-bold uppercase tracking-wider text-white border border-gray-700 hover:border-cyan-400 hover:text-cyan-400 hover:bg-cyan-500/5 transition-all duration-300">
                                    ← Previous
                                </a>
                            @endif

                            <span class="text-xs text-gray-500 font-mono">
                                Showing {{ $comments->firstItem() }} to {{ $comments->lastItem() }} of {{ $comments->total() }} results
                            </span>

                            @if($comments->hasMorePages())
                                <a href="{{ $comments->nextPageUrl() }}#guestbook" class="px-6 py-2 rounded-full text-xs font-bold uppercase tracking-wider text-white border border-gray-700 hover:border-cyan-400 hover:text-cyan-400 hover:bg-cyan-500/5 transition-all duration-300">
                                    Next →
                                </a>
                            @else
                                <span class="px-6 py-2 rounded-full text-xs font-bold uppercase tracking-wider text-gray-600 border border-gray-800 bg-gray-900/20 cursor-not-allowed">
                                    Next →
                                </span>
                            @endif
                        </div>
                        @endif
                    </div>

                    <!-- Comment Form -->
                    <div class="lg:col-span-5" data-aos="fade-left">
                        <form id="guestbookForm" enctype="multipart/form-data" class="p-4 sm:p-6 md:p-8 rounded-2xl border border-gray-800 bg-[#0b0f19]/80 backdrop-blur-md space-y-4 sm:space-y-6">
                            <h3 class="text-base sm:text-lg font-bold text-white border-b border-gray-800 pb-3">Tulis Komentar</h3>
                            
                            <div class="flex flex-col items-center gap-3 sm:gap-4 py-2">
                                <div class="relative w-16 h-16 sm:w-20 sm:h-20 rounded-full overflow-hidden border-2 border-gray-800 bg-gray-950 flex items-center justify-center">
                                    <img id="photoPreview" src="" alt="Avatar preview" class="w-full h-full object-cover hidden">
                                    <span id="photoPlaceholder" class="text-gray-600 text-xl sm:text-2xl">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>
                                <div class="file-upload w-full">
                                    <input type="file" name="c_photo" id="c_photo_input" class="hidden" accept="image/*">
                                    <label for="c_photo_input" class="cursor-pointer block text-center py-2.5 rounded-xl border border-dashed border-gray-800 hover:border-cyan-400 hover:bg-cyan-500/5 text-xs text-gray-400 font-semibold transition-all">
                                        <i class="fas fa-image mr-2 text-cyan-400"></i> Choose Photo
                                    </label>
                                </div>
                            </div>

                            <div class="relative">
                                <input type="text" id="g_name" name="c_name" required placeholder=" " 
                                       class="w-full px-4 py-3 sm:py-3.5 rounded-xl border border-gray-800 bg-[#070b13] focus:border-cyan-400 focus:outline-none text-sm transition-colors text-white peer">
                                <label for="g_name" class="absolute left-4 top-3 sm:top-3.5 text-gray-500 text-sm transition-all duration-300 pointer-events-none peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-cyan-400 -translate-y-6 scale-75 origin-[0_0] bg-[#0b0f19] px-1">Nama Anda</label>
                            </div>

                            <div class="relative">
                                <textarea id="g_message" name="c_message" rows="4" required placeholder=" "
                                          class="w-full px-4 py-3 sm:py-3.5 rounded-xl border border-gray-800 bg-[#070b13] focus:border-cyan-400 focus:outline-none text-sm transition-colors text-white peer"></textarea>
                                <label for="g_message" class="absolute left-4 top-3 sm:top-3.5 text-gray-500 text-sm transition-all duration-300 pointer-events-none peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-cyan-400 -translate-y-6 scale-75 origin-[0_0] bg-[#0b0f19] px-1">Pesan / Komentar</label>
                            </div>

                            <button type="submit" class="w-full py-3 sm:py-3.5 rounded-xl text-sm font-extrabold uppercase tracking-wide text-black bg-cyan-400 hover:bg-cyan-300 transition-all flex items-center justify-center gap-2">
                                <span>Kirim Komentar</span>
                                <i class="fas fa-check-circle text-xs"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="border-t border-gray-900/80 py-6 sm:py-8 bg-[#070b13]">
        <div class="container mx-auto px-4 sm:px-6 flex flex-col sm:flex-row items-center justify-between gap-3 sm:gap-4 text-center">
            <span class="text-[10px] sm:text-xs text-gray-500">&copy; {{ date('Y') }} {{ $profile->name ?? 'Jhons' }}. All rights reserved.</span>
            <span id="secretAdmin" style="cursor:default" class="text-[10px] sm:text-xs text-gray-800 select-none hover:text-cyan-950 transition-colors">© Secret Login</span>
        </div>
    </footer>

    <!-- Toast Notifications Container -->
    <div id="toastContainer" class="fixed bottom-4 right-4 left-4 sm:left-auto sm:right-6 sm:bottom-6 z-50 flex flex-col gap-2 pointer-events-none"></div>

    <!-- GSAP & AOS CDN Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
</body>
</html>
