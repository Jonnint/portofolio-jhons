import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    // 1. Hide Loading Screen
    const loadingScreen = document.getElementById('loadingScreen');
    if (loadingScreen) {
        window.addEventListener('load', () => {
            setTimeout(() => {
                loadingScreen.style.opacity = '0';
                setTimeout(() => {
                    loadingScreen.style.visibility = 'hidden';
                }, 800);
            }, 500);
        });
        // Fallback if load event doesn't trigger
        setTimeout(() => {
            loadingScreen.style.opacity = '0';
            setTimeout(() => {
                loadingScreen.style.visibility = 'hidden';
            }, 800);
        }, 3000);
    }

    // 2. Initialize AOS (Animate on Scroll)
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            mirror: false,
        });
    }

    // 3. Lenis Smooth Scrolling (Disabled to restore fast, native, hardware-accelerated scroll performance)
    /*
    if (typeof Lenis !== 'undefined') {
        const lenis = new Lenis({
            duration: 1.2,
            easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
            smoothWheel: true,
        });

        function raf(time) {
            lenis.raf(time);
            requestAnimationFrame(raf);
        }
        requestAnimationFrame(raf);

        lenis.on('scroll', () => {
            // Optimized
        });
    }
    */

    // 4. Custom Cursor (Optimized for GPU acceleration)
    const cursorDot = document.querySelector('.custom-cursor-dot');
    const cursorOutline = document.querySelector('.custom-cursor-outline');

    if (cursorDot && cursorOutline) {
        let posX = 0, posY = 0;
        let mouseX = 0, mouseY = 0;
        let isHovering = false;
        let cursorVisible = false;

        // Set initial state
        cursorDot.style.opacity = '0';
        cursorOutline.style.opacity = '0';
        cursorDot.style.transition = 'opacity 0.3s ease, border-color 0.3s ease';
        cursorOutline.style.transition = 'opacity 0.3s ease, border-color 0.3s ease';

        // Follow mouse movement
        document.addEventListener('mousemove', (e) => {
            mouseX = e.clientX;
            mouseY = e.clientY;
            
            if (!cursorVisible) {
                cursorDot.style.opacity = '1';
                cursorOutline.style.opacity = '1';
                cursorVisible = true;
            }
        });

        document.addEventListener('mouseleave', () => {
            cursorDot.style.opacity = '0';
            cursorOutline.style.opacity = '0';
            cursorVisible = false;
        });

        // Animate outer ring with GPU-accelerated translate3d transform instead of left/top
        function animateCursor() {
            posX += (mouseX - posX) * 0.15;
            posY += (mouseY - posY) * 0.15;

            // Offset transforms to center elements
            cursorDot.style.transform = `translate3d(${mouseX - 4}px, ${mouseY - 4}px, 0) ${isHovering ? 'scale(1.5)' : 'scale(1)'}`;
            cursorOutline.style.transform = `translate3d(${posX - 20}px, ${posY - 20}px, 0) ${isHovering ? 'scale(1.3)' : 'scale(1)'}`;

            requestAnimationFrame(animateCursor);
        }
        animateCursor();

        // Scale up on hover of links, buttons, and interactive cards
        const hoverables = document.querySelectorAll('a, button, .lightbox-trigger, input, textarea, label, [role="button"]');
        hoverables.forEach((el) => {
            el.addEventListener('mouseenter', () => {
                isHovering = true;
                cursorOutline.style.borderColor = '#22d3ee';
            });
            el.addEventListener('mouseleave', () => {
                isHovering = false;
                cursorOutline.style.borderColor = 'rgba(34, 211, 238, 0.4)';
            });
        });
    }

    // 5. Scroll Progress Bar & Sticky Navbar (Throttled with requestAnimationFrame)
    const scrollProgressBar = document.querySelector('.scroll-progress-bar');
    const navbar = document.getElementById('navbar');
    const sections = document.querySelectorAll('section');
    const navLinks = document.querySelectorAll('.nav-link');

    let scrollTicker = false;
    window.addEventListener('scroll', () => {
        if (!scrollTicker) {
            window.requestAnimationFrame(() => {
                const scrollTop = window.scrollY;
                const docHeight = document.documentElement.scrollHeight - window.innerHeight;
                const scrollPercent = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;

                // Update progress bar
                if (scrollProgressBar) {
                    scrollProgressBar.style.width = `${scrollPercent}%`;
                }

                // Toggle sticky navbar blur class
                if (navbar) {
                    if (scrollTop > 50) {
                        navbar.classList.add('navbar-scrolled');
                    } else {
                        navbar.classList.remove('navbar-scrolled');
                    }
                }
                scrollTicker = false;
            });
            scrollTicker = true;
        }
    });

    // 5b. Active link indicator on scroll using IntersectionObserver (Highly Optimized)
    if (sections.length > 0 && navLinks.length > 0) {
        const observerOptions = {
            root: null,
            rootMargin: '-20% 0px -60% 0px',
            threshold: 0
        };

        const sectionObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const currentSection = entry.target.getAttribute('id');
                    navLinks.forEach((link) => {
                        link.classList.remove('text-white', 'active');
                        link.classList.add('text-gray-400');
                        if (link.getAttribute('href') === `#${currentSection}`) {
                            link.classList.remove('text-gray-400');
                            link.classList.add('text-white', 'active');
                        }
                    });
                }
            });
        }, observerOptions);

        sections.forEach((section) => {
            sectionObserver.observe(section);
        });
    }

    // 6. Typing Profession Animation
    const typingSpan = document.getElementById('typing-profession');
    if (typingSpan) {
        const professions = ['Web Developer', 'SMK Student', 'Fullstack Programmer', 'PPLG Student'];
        let wordIndex = 0;
        let charIndex = 0;
        let isDeleting = false;

        function type() {
            const currentWord = professions[wordIndex];
            if (isDeleting) {
                typingSpan.textContent = currentWord.substring(0, charIndex - 1);
                charIndex--;
            } else {
                typingSpan.textContent = currentWord.substring(0, charIndex + 1);
                charIndex++;
            }

            let typeSpeed = isDeleting ? 50 : 100;

            if (!isDeleting && charIndex === currentWord.length) {
                typeSpeed = 1500; // Pause at end of word
                isDeleting = true;
            } else if (isDeleting && charIndex === 0) {
                isDeleting = false;
                wordIndex = (wordIndex + 1) % professions.length;
                typeSpeed = 500; // Pause before typing next word
            }

            setTimeout(type, typeSpeed);
        }
        type();
    }

    // 7. Stat Counters Animation
    const counters = document.querySelectorAll('.counter');
    if (counters.length > 0) {
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseInt(counter.getAttribute('data-target'));
                    let count = 0;
                    const speed = 2000 / target; // total duration 2s
                    
                    const updateCount = () => {
                        if (count < target) {
                            count++;
                            counter.textContent = count;
                            setTimeout(updateCount, speed);
                        } else {
                            counter.textContent = target;
                        }
                    };
                    updateCount();
                    observer.unobserve(counter);
                }
            });
        }, { threshold: 0.5 });

        counters.forEach(counter => observer.observe(counter));
    }

    // 8. Skill Progress Bars Animation
    const progressBars = document.querySelectorAll('.skill-progress-bar');
    if (progressBars.length > 0) {
        const skillObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const bar = entry.target;
                    const percent = bar.getAttribute('data-percent');
                    bar.style.width = `${percent}%`;
                    observer.unobserve(bar);
                }
            });
        }, { threshold: 0.2 });

        progressBars.forEach(bar => skillObserver.observe(bar));
    }

    // 9. Portfolio Filter
    const filterButtons = document.querySelectorAll('.filter-btn');
    const projectItems = document.querySelectorAll('.project-item');

    filterButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            // Remove active classes
            filterButtons.forEach(b => {
                b.classList.remove('bg-cyan-500', 'text-black');
                b.classList.add('border', 'border-gray-800', 'text-gray-400');
            });
            // Add active to current
            btn.classList.remove('border', 'border-gray-800', 'text-gray-400');
            btn.classList.add('bg-cyan-500', 'text-black');

            const filterValue = btn.getAttribute('data-filter');

            projectItems.forEach(item => {
                if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                    item.style.display = 'block';
                    setTimeout(() => { item.style.opacity = '1'; }, 50);
                } else {
                    item.style.opacity = '0';
                    setTimeout(() => { item.style.display = 'none'; }, 300);
                }
            });
        });
    });

    // 10. Portfolio Detail Modal
    const projectModal = document.getElementById('projectModal');
    const modalImage = document.getElementById('modalImage');
    const modalTitle = document.getElementById('modalTitle');
    const modalCategory = document.getElementById('modalCategory');
    const modalDesc = document.getElementById('modalDesc');
    const modalTech = document.getElementById('modalTech');
    const modalGithub = document.getElementById('modalGithub');
    const modalDemo = document.getElementById('modalDemo');
    const closeModalBtn = document.getElementById('closeModalBtn');

    document.querySelectorAll('.view-detail-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            modalImage.src = btn.getAttribute('data-image');
            modalTitle.textContent = btn.getAttribute('data-title');
            modalCategory.textContent = btn.getAttribute('data-category');
            modalDesc.textContent = btn.getAttribute('data-desc');
            
            // Render technologies tags
            modalTech.innerHTML = '';
            const techs = btn.getAttribute('data-tech').split(',');
            techs.forEach(t => {
                const tag = document.createElement('span');
                tag.className = 'px-3 py-1 rounded bg-gray-900 border border-gray-800 text-xs font-mono text-cyan-400';
                tag.textContent = t.trim();
                modalTech.appendChild(tag);
            });

            // Set links
            const github = btn.getAttribute('data-github');
            const demo = btn.getAttribute('data-demo');
            
            if (github && github !== '#') {
                modalGithub.href = github;
                modalGithub.style.display = 'flex';
            } else {
                modalGithub.style.display = 'none';
            }

            if (demo && demo !== '#') {
                modalDemo.href = demo;
                modalDemo.style.display = 'flex';
            } else {
                modalDemo.style.display = 'none';
            }

            projectModal.classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Lock scrolling
        });
    });

    if (closeModalBtn) {
        closeModalBtn.addEventListener('click', () => {
            projectModal.classList.add('hidden');
            document.body.style.overflow = ''; // Unlock scrolling
        });
    }

    if (projectModal) {
        projectModal.addEventListener('click', (e) => {
            if (e.target === projectModal) {
                projectModal.classList.add('hidden');
                document.body.style.overflow = '';
            }
        });
    }

    // 11. Lightbox Gallery
    const lightbox = document.getElementById('lightbox');
    const lightboxImage = document.getElementById('lightboxImage');
    const lightboxTitle = document.getElementById('lightboxTitle');
    const closeLightboxBtn = document.getElementById('closeLightboxBtn');

    document.querySelectorAll('.lightbox-trigger').forEach(trigger => {
        trigger.addEventListener('click', () => {
            lightboxImage.src = trigger.getAttribute('data-src');
            lightboxTitle.textContent = trigger.getAttribute('data-title');
            lightbox.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        });
    });

    if (closeLightboxBtn) {
        closeLightboxBtn.addEventListener('click', () => {
            lightbox.classList.add('hidden');
            document.body.style.overflow = '';
        });
    }

    if (lightbox) {
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) {
                lightbox.classList.add('hidden');
                document.body.style.overflow = '';
            }
        });
    }

    // 12. Mobile Menu Toggle
    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    const line1 = document.getElementById('line1');
    const line2 = document.getElementById('line2');
    const line3 = document.getElementById('line3');

    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', () => {
            const open = mobileMenu.classList.contains('translate-x-full');
            if (open) {
                mobileMenu.classList.remove('translate-x-full');
                line1.style.transform = 'rotate(45deg) translate(5px, 6px)';
                line2.style.opacity = '0';
                line3.style.transform = 'rotate(-45deg) translate(5px, -6px)';
            } else {
                mobileMenu.classList.add('translate-x-full');
                line1.style.transform = 'none';
                line2.style.opacity = '1';
                line3.style.transform = 'none';
            }
        });

        // Close mobile menu on nav link click
        document.querySelectorAll('.mobile-nav-link').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('translate-x-full');
                line1.style.transform = 'none';
                line2.style.opacity = '1';
                line3.style.transform = 'none';
            });
        });
    }

    // 13. Toast Notifications
    function showToast(message, type = 'success') {
        const container = document.getElementById('toastContainer');
        if (!container) return;

        const toast = document.createElement('div');
        toast.className = `p-4 rounded-xl border bg-[#0b0f19]/90 backdrop-blur-md text-sm font-semibold flex items-center gap-3 shadow-lg pointer-events-auto transform translate-y-2 opacity-0 transition-all duration-300 ${
            type === 'success' 
                ? 'border-cyan-500/20 text-cyan-400' 
                : 'border-red-500/20 text-red-400'
        }`;

        const icon = document.createElement('i');
        icon.className = type === 'success' ? 'fas fa-check-circle' : 'fas fa-exclamation-circle';
        
        const text = document.createElement('span');
        text.textContent = message;

        toast.appendChild(icon);
        toast.appendChild(text);
        container.appendChild(toast);

        // Animate In
        setTimeout(() => {
            toast.classList.remove('translate-y-2', 'opacity-0');
        }, 50);

        // Remove after 4 seconds
        setTimeout(() => {
            toast.classList.add('opacity-0', 'translate-y-2');
            setTimeout(() => {
                toast.remove();
            }, 300);
        }, 4000);
    }

    // 14. Contact Form Submission (AJAX)
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const submitBtn = contactForm.querySelector('button[type="submit"]');
            const originalHtml = submitBtn.innerHTML;
            
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner animate-spin"></i> Sending...';

            const formData = new FormData(contactForm);
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            try {
                const response = await fetch('/contact', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                const result = await response.json();

                if (result.success) {
                    showToast(result.message, 'success');
                    contactForm.reset();
                } else {
                    const errorMsg = Object.values(result.errors || {}).flat().join('\n') || 'Terjadi kesalahan.';
                    showToast(errorMsg, 'error');
                }
            } catch (err) {
                showToast('Gagal menghubungkan ke server.', 'error');
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalHtml;
            }
        });
    }

    // 15. Guestbook Photo Upload Preview & AJAX Submission
    const cPhotoInput = document.getElementById('c_photo_input');
    const photoPreview = document.getElementById('photoPreview');
    const photoPlaceholder = document.getElementById('photoPlaceholder');

    if (cPhotoInput) {
        cPhotoInput.addEventListener('change', function () {
            const file = this.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function (e) {
                if (photoPreview && photoPlaceholder) {
                    photoPreview.src = e.target.result;
                    photoPreview.classList.remove('hidden');
                    photoPlaceholder.classList.add('hidden');
                }
            };
            reader.readAsDataURL(file);
        });
    }

    const guestbookForm = document.getElementById('guestbookForm');
    if (guestbookForm) {
        guestbookForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const submitBtn = guestbookForm.querySelector('button[type="submit"]');
            const originalHtml = submitBtn.innerHTML;

            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner animate-spin"></i> Submitting...';

            const formData = new FormData(guestbookForm);
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            try {
                const response = await fetch('/guestbook', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                const result = await response.json();

                if (result.success) {
                    showToast(result.message, 'success');
                    guestbookForm.reset();
                    if (photoPreview && photoPlaceholder) {
                        photoPreview.classList.add('hidden');
                        photoPreview.src = '';
                        photoPlaceholder.classList.remove('hidden');
                    }
                } else {
                    const errorMsg = Object.values(result.errors || {}).flat().join('\n') || 'Gagal mengirim komentar.';
                    showToast(errorMsg, 'error');
                }
            } catch (err) {
                showToast('Gagal terhubung ke server.', 'error');
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalHtml;
            }
        });
    }

    // 16. Secret Admin Redirect
    let adminClicks = 0;
    const secretAdmin = document.getElementById('secretAdmin');
    if (secretAdmin) {
        secretAdmin.addEventListener('click', () => {
            adminClicks++;
            if (adminClicks === 5) {
                showToast('Redirecting to Admin Portal...', 'success');
                setTimeout(() => {
                    window.location.href = '/admin';
                }, 1000);
            }
        });
    }

    // 17. GSAP Premium Background Flow / Floating Objects
    if (typeof gsap !== 'undefined') {
        // Floating micro-cards inside the Hero Image Container
        gsap.to('.float-animation', {
            y: -15,
            duration: 3,
            repeat: -1,
            yoyo: true,
            ease: 'power1.inOut',
            stagger: {
                each: 0.5,
                from: 'random'
            }
        });
    }
});
