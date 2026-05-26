<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\Portfolio;
use App\Models\Gallery;
use App\Models\Social;
use App\Models\Guestbook;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed Admin User for Filament
        User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Admin Jhons',
                'password' => Hash::make('password'),
            ]
        );

        // 2. Seed Profile
        Profile::updateOrCreate(
            ['name' => 'Jonni'],
            [
                'title' => 'Saya Jonni',
                'subtitle' => 'Web Developer',
                'description' => 'Saya merupakan pelajar SMK jurusan Pengembangan Perangkat Lunak dan Gim (PPLG) yang memiliki ketertarikan pada bidang pengembangan web. Saya mempelajari perancangan dan pengembangan aplikasi berbasis web dengan menggunakan JavaScript dan PHP, mencakup logika pemrograman, pengolahan data, serta pembuatan antarmuka pengguna.',
                'about_details' => 'Saya merupakan pelajar SMK jurusan Pengembangan Perangkat Lunak dan Gim (PPLG) yang sedang mendalami bidang pengembangan web, baik dari sisi front-end maupun back-end. Selama kurang lebih satu tahun, saya mempelajari dasar hingga penerapan pengembangan website, mulai dari membangun tampilan antarmuka hingga mengelola logika aplikasi dan data. Proses belajar ini saya jalani melalui pembelajaran di sekolah serta praktik secara mandiri. Di waktu luang, saya sering menghabiskan waktu untuk menulis kode dan mengembangkan proyek kecil sebagai latihan. Bahkan ketika sedang bersantai, seperti saat berada di warung kopi, saya terbiasa membawa laptop untuk mencoba ide atau bereksperimen dengan kode.',
                'avatar' => 'assets/img/image.png',
                'cv_path' => '#',
                'experience_years' => 1,
                'completed_projects' => 5,
                'education' => 'Pengembangan Perangkat Lunak dan Gim (PPLG)',
                'location' => 'Indonesia, Depok',
            ]
        );

        // 3. Seed Socials
        $socials = [
            [
                'name' => 'WhatsApp',
                'url' => 'https://wa.me/6289512552179',
                'icon' => 'fab fa-whatsapp',
                'is_active' => true,
            ],
            [
                'name' => 'LinkedIn',
                'url' => '#',
                'icon' => 'fab fa-linkedin-in',
                'is_active' => true,
            ],
            [
                'name' => 'GitHub',
                'url' => 'https://github.com',
                'icon' => 'fab fa-github',
                'is_active' => true,
            ],
            [
                'name' => 'Instagram',
                'url' => '#',
                'icon' => 'fab fa-instagram',
                'is_active' => true,
            ],
        ];
        foreach ($socials as $social) {
            Social::updateOrCreate(['name' => $social['name']], $social);
        }

        // 4. Seed Skills
        $skills = [
            // Frontend
            ['name' => 'HTML5', 'category' => 'Frontend Development', 'percentage' => 95, 'icon' => 'fab fa-html5'],
            ['name' => 'CSS3', 'category' => 'Frontend Development', 'percentage' => 90, 'icon' => 'fab fa-css3-alt'],
            ['name' => 'JavaScript', 'category' => 'Frontend Development', 'percentage' => 75, 'icon' => 'fab fa-js-square'],
            // Backend
            ['name' => 'PHP', 'category' => 'Backend Development', 'percentage' => 90, 'icon' => 'fab fa-php'],
            ['name' => 'Node.js', 'category' => 'Backend Development', 'percentage' => 75, 'icon' => 'fab fa-node-js'],
            // Database
            ['name' => 'MySQL', 'category' => 'Database Management', 'percentage' => 70, 'icon' => 'fas fa-database'],
            ['name' => 'phpMyAdmin', 'category' => 'Database Management', 'percentage' => 90, 'icon' => 'fas fa-database'],
            // DevOps & Tools
            ['name' => 'Git', 'category' => 'DevOps & Tools', 'percentage' => 70, 'icon' => 'fab fa-git-alt'],
            ['name' => 'Laragon', 'category' => 'DevOps & Tools', 'percentage' => 70, 'icon' => 'fas fa-server'],
            ['name' => 'VS Code', 'category' => 'DevOps & Tools', 'percentage' => 95, 'icon' => 'fas fa-code'],
            // Design
            ['name' => 'Figma', 'category' => 'UI/UX Design', 'percentage' => 85, 'icon' => 'fab fa-figma'],
        ];
        foreach ($skills as $skill) {
            Skill::updateOrCreate(['name' => $skill['name']], $skill);
        }

        // 5. Seed Portfolios
        $portfolios = [
            [
                'title' => 'Web Kasir PPLG',
                'description' => 'Mengembangkan website kasir dinamis dengan fitur CRUD transaksi lengkap, cetak struk PDF, manajemen stok barang, dan laporan penjualan periodik.',
                'category' => 'Web Development',
                'thumbnail' => 'assets/img/ser1.png',
                'technologies' => 'PHP, MySQL, Bootstrap',
                'github_url' => 'https://github.com',
                'demo_url' => '#',
                'featured' => true,
            ],
            [
                'title' => 'E-Commerce Gadget Store',
                'description' => 'Membangun antarmuka e-commerce modern dengan keranjang belanja interaktif berbasis client-side, filter pencarian dinamis, dan landing page premium.',
                'category' => 'Front-End',
                'thumbnail' => 'assets/img/ser2.png',
                'technologies' => 'HTML5, CSS3, JavaScript',
                'github_url' => 'https://github.com',
                'demo_url' => '#',
                'featured' => true,
            ],
            [
                'title' => 'Old Portfolio Web',
                'description' => 'Website portofolio interaktif lama yang menampilkan data diri, daftar keahlian, galeri kegiatan, serta guestbook interaktif untuk pengunjung.',
                'category' => 'Web Development',
                'thumbnail' => 'assets/img/ser3.png',
                'technologies' => 'PHP, MySQL, CSS Grid',
                'github_url' => 'https://github.com',
                'demo_url' => '#',
                'featured' => false,
            ],
        ];
        foreach ($portfolios as $portfolio) {
            Portfolio::updateOrCreate(['title' => $portfolio['title']], $portfolio);
        }

        // 6. Seed Galleries
        $galleries = [
            ['title' => 'Admin Panel Project', 'image_path' => 'assets/img/ser1.png', 'category' => 'Coding'],
            ['title' => 'Product Catalog Page', 'image_path' => 'assets/img/ser2.png', 'category' => 'Design'],
            ['title' => 'Guestbook Form Section', 'image_path' => 'assets/img/ser3.png', 'category' => 'Coding'],
            ['title' => 'Collaboration and Learning', 'image_path' => 'assets/img/tim1.jpeg', 'category' => 'Team'],
            ['title' => 'SMK PPLG Team Meeting', 'image_path' => 'assets/img/tim2.jpeg', 'category' => 'Team'],
            ['title' => 'SMK PPLG Workshop Session', 'image_path' => 'assets/img/tim3.jpeg', 'category' => 'Team'],
        ];
        foreach ($galleries as $gallery) {
            Gallery::updateOrCreate(['image_path' => $gallery['image_path']], $gallery);
        }

        // 7. Seed Guestbooks
        $guestbooks = [
            [
                'name' => 'Radit',
                'message' => 'PUSINGGG!',
                'photo' => 'uploads/6971850ec18a4.jpeg',
                'is_approved' => true,
            ],
            [
                'name' => 'Fizwan',
                'message' => 'gacor!',
                'photo' => 'uploads/697186ab054d9.jpeg',
                'is_approved' => true,
            ],
            [
                'name' => 'Radit',
                'message' => 'anjaiii',
                'photo' => 'uploads/69718782962ed.jpeg',
                'is_approved' => true,
            ],
        ];
        foreach ($guestbooks as $gb) {
            Guestbook::updateOrCreate(['name' => $gb['name'], 'message' => $gb['message']], $gb);
        }
    }
}
