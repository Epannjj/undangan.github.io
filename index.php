<?php
// Mengambil nama tamu dari URL (Contoh: index.php?to=Budi+Santoso)
$namaTamu = isset($_GET['to']) ? htmlspecialchars($_GET['to']) : 'Tamu Undangan';
?>
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Wedding of Nama & Pasangan</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts: Cormorant Garamond & Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- GSAP (GreenSock Animation Library) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <!-- GSAP Core -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<!-- GSAP ScrollTrigger Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .font-serif-custom {
            font-family: 'Cormorant Garamond', serif;
        }
        /* Efek custom glassmorphism */
        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
    </style>

</head>
<body class="bg-stone-900 text-stone-800 antialiased overflow-x-hidden">

    <!-- 1. COVER / WELCOME SCREEN (Fullscreen Overlay) -->
    <section id="cover-section" class="fixed inset-0 z-50 flex flex-col items-center justify-center bg-stone-950 text-stone-100 text-center px-6 transition-transform duration-1000">
        <div class="absolute inset-0 opacity-30 bg-cover bg-center" style="background-image: url('assets/images/hero-bg.jpg');"></div>
        <div class="relative z-10 max-w-md mx-auto">
            <p class="text-sm tracking-widest uppercase text-amber-200 mb-3">The Wedding Of</p>
            <h1 class="font-serif-custom text-5xl md:text-6xl italic mb-6">Mempelai & Pasangan</h1>
            <p class="text-stone-300 text-sm mb-2">Kepada Yth. Bapak/Ibu/Saudara/i:</p>
            <div class="bg-stone-900/80 border border-amber-500/30 rounded-lg py-3 px-6 mb-8 text-amber-100 font-medium text-lg tracking-wide">
                <?php echo $namaTamu; ?>
            </div>
            <button id="open-invitation" class="bg-amber-600 hover:bg-amber-500 text-stone-950 font-semibold px-8 py-3 rounded-full shadow-lg transform transition hover:scale-105 flex items-center justify-center mx-auto gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                </svg>
                Buka Undangan
            </button>
        </div>
    </section>

    <!-- AUDIO BACKGROUND (Hidden) -->
    <audio id="bg-music" loop>
        <source src="assets/audio/backsound.mp3" type="audio/mpeg">
    </audio>

    <!-- FLOATING MUSIC CONTROL BUTTON -->
    <button id="music-control" class="fixed bottom-6 right-6 z-45 bg-amber-600 text-white p-3 rounded-full shadow-xl hidden animate-spin-slow">
        🎵
    </button>

    <!-- 2. MAIN CONTENT (Hidden initially, revealed after opening cover) -->
    <div id="main-content" class="opacity-0 transition-opacity duration-1000">
        
        <!-- Hero Section -->
        <header class="min-h-screen flex flex-col items-center justify-center text-center px-6 relative bg-stone-900 text-stone-100">
            <div class="absolute inset-0 opacity-40 bg-cover bg-center" style="background-image: url('assets/images/hero-bg.jpg');"></div>
            <div class="relative z-10 max-w-2xl mx-auto py-20">
                <p class="text-amber-200 tracking-widest uppercase mb-4 text-sm">Save The Date</p>
                <h1 class="font-serif-custom text-6xl md:text-7xl italic mb-6">Nama & Pasangan</h1>
                <p class="text-stone-300 text-base mb-8">Minggu, 25 Desember 2026</p>
                
                <!-- Countdown Timer -->
                <div id="countdown" class="grid grid-cols-4 gap-3 max-w-md mx-auto text-stone-900">
                    <div class="glass-card p-3 rounded-lg"><span id="days" class="text-2xl font-bold block">00</span><span class="text-xs uppercase">Hari</span></div>
                    <div class="glass-card p-3 rounded-lg"><span id="hours" class="text-2xl font-bold block">00</span><span class="text-xs uppercase">Jam</span></div>
                    <div class="glass-card p-3 rounded-lg"><span id="minutes" class="text-2xl font-bold block">00</span><span class="text-xs uppercase">Menit</span></div>
                    <div class="glass-card p-3 rounded-lg"><span id="seconds" class="text-2xl font-bold block">00</span><span class="text-xs uppercase">Detik</span></div>
                </div>
            </div>
        </header>

        <!-- Bride & Groom Section -->
<section class="py-24 px-6 bg-stone-950 text-stone-200 text-center overflow-hidden">
    <div class="max-w-4xl mx-auto">
        <h2 class="reveal-title font-serif-custom text-4xl italic text-amber-200 mb-6">Assalamu'alaikum Wr. Wb.</h2>
        <p class="reveal-title text-stone-400 max-w-xl mx-auto mb-16 text-sm md:text-base">
            Tanpa mengurangi rasa hormat, kami mengundang Bapak/Ibu/Saudara/i sekalian untuk menghadiri acara pernikahan kami.
        </p>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <!-- Mempelai Pria -->
            <div class="profile-card space-y-4 opacity-0">
                <div class="w-48 h-48 mx-auto rounded-full overflow-hidden border-2 border-amber-500/50 shadow-xl">
                    <img src="assets/images/groom.jpg" alt="Groom" class="w-full h-full object-cover">
                </div>
                <h3 class="font-serif-custom text-3xl italic text-amber-100">Nama Pria</h3>
                <p class="text-xs text-stone-400">Putra dari Bpk. ... & Ibu ...</p>
            </div>

            <!-- Mempelai Wanita -->
            <div class="profile-card space-y-4 opacity-0">
                <div class="w-48 h-48 mx-auto rounded-full overflow-hidden border-2 border-amber-500/50 shadow-xl">
                    <img src="assets/images/bride.jpg" alt="Bride" class="w-full h-full object-cover">
                </div>
                <h3 class="font-serif-custom text-3xl italic text-amber-100">Nama Wanita</h3>
                <p class="text-xs text-stone-400">Putri dari Bpk. ... & Ibu ...</p>
            </div>
        </div>
    </div>
</section>
<!-- RSVP & Buku Tamu Section -->
<section id="rsvp" class="py-24 px-6 bg-stone-900 text-stone-200">
    <div class="max-w-2xl mx-auto">
        <div class="text-center mb-12">
            <h2 class="font-serif-custom text-4xl italic text-amber-200 mb-3">RSVP & Ucapan</h2>
            <p class="text-stone-400 text-sm">Berikan konfirmasi kehadiran dan doa restu Anda untuk kami.</p>
        </div>

        <!-- Form RSVP -->
        <form id="rsvp-form" class="glass-card p-6 md:p-8 rounded-2xl shadow-xl space-y-6 text-stone-800">
            <div>
                <label class="block text-sm font-medium mb-2">Nama Lengkap</label>
                <input type="text" id="guest-name" name="name" required class="w-full px-4 py-3 rounded-lg border border-stone-300 focus:ring-2 focus:ring-amber-500 focus:outline-none" placeholder="Masukkan nama Anda">
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">Konfirmasi Kehadiran</label>
                <select id="guest-status" name="status" class="w-full px-4 py-3 rounded-lg border border-stone-300 focus:ring-2 focus:ring-amber-500 focus:outline-none">
                    <option value="Hadir">Hadir (Datang)</option>
                    <option value="Tidak Hadir">Berhalangan Hadir</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">Ucapan & Doa Restu</label>
                <textarea id="guest-message" name="message" rows="4" required class="w-full px-4 py-3 rounded-lg border border-stone-300 focus:ring-2 focus:ring-amber-500 focus:outline-none" placeholder="Tuliskan ucapan atau doa..."></textarea>
            </div>

            <button type="submit" id="submit-btn" class="w-full bg-amber-600 hover:bg-amber-500 text-white font-semibold py-3 rounded-lg shadow-md transition duration-300">
                Kirim Ucapan & Konfirmasi
            </button>
        </form>

        <!-- Daftar Ucapan Tamu (Live Feed) -->
        <div class="mt-16">
            <h3 class="font-serif-custom text-2xl italic text-amber-100 mb-6 text-center">Ucapan & Doa Tamu</h3>
            <div id="comments-container" class="space-y-4 max-h-96 overflow-y-auto pr-2">
                <!-- Data ucapan akan dimuat di sini secara dinamis -->
                <div class="glass-card p-4 rounded-xl text-stone-800">
                    <div class="flex justify-between items-center mb-1">
                        <h4 class="font-semibold text-amber-900">Budi Santoso</h4>
                        <span class="text-xs bg-emerald-100 text-emerald-800 px-2 py-0.5 rounded-full">Hadir</span>
                    </div>
                    <p class="text-sm text-stone-600">Selamat berbahagia! Semoga menjadi keluarga yang sakinah, mawaddah, warahmah.</p>
                </div>
            </div>
        </div>
    </div>
</section>
    </div>

    <!-- JAVASCRIPT ANIMASI & INTERAKSI -->
    <script>
        const openBtn = document.getElementById('open-invitation');
        const coverSection = document.getElementById('cover-section');
        const mainContent = document.getElementById('main-content');
        const bgMusic = document.getElementById('bg-music');
        const musicControl = document.getElementById('music-control');
        let isPlaying = false;

        // Tombol Buka Undangan diklik
        openBtn.addEventListener('click', () => {
            // Animasi GSAP untuk membuka/menghilangkan cover
            gsap.to(coverSection, {
                y: '-100%',
                duration: 1.2,
                ease: 'power4.inOut',
                onComplete: () => {
                    coverSection.style.display = 'none';
                    mainContent.classList.remove('opacity-0');
                    musicControl.classList.remove('hidden');
                    
                    // Mainkan Musik
                    bgMusic.play();
                    isPlaying = true;
                    
                    // Trigger animasi awal pada konten utama
                    gsap.from("header h1", { y: 50, opacity: 0, duration: 1, delay: 0.3 });
                }
            });
        });

        // Kontrol Musik (Play/Pause Manual)
        musicControl.addEventListener('click', () => {
            if (isPlaying) {
                bgMusic.pause();
                musicControl.textContent = '🔇';
                isPlaying = false;
            } else {
                bgMusic.play();
                musicControl.textContent = '🎵';
                isPlaying = true;
            }
        });

        // Countdown Timer Logic
        const weddingDate = new Date("Dec 25, 2026 09:00:00").getTime();
        const timer = setInterval(() => {
            const now = new Date().getTime();
            const distance = weddingDate - now;

            document.getElementById("days").innerText = Math.floor(distance / (1000 * 60 * 60 * 24));
            document.getElementById("hours").innerText = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            document.getElementById("minutes").innerText = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            document.getElementById("seconds").innerText = Math.floor((distance % (1000 * 60)) / 1000);

            if (distance < 0) {
                clearInterval(timer);
                document.getElementById("countdown").innerHTML = "<p class='col-span-4 text-amber-200 font-semibold'>Acara Telah Berlangsung</p>";
            }
        }, 1000);
        const rsvpForm = document.getElementById('rsvp-form');
const commentsContainer = document.getElementById('comments-container');

rsvpForm.addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(rsvpForm);
    const submitBtn = document.getElementById('submit-btn');
    submitBtn.disabled = true;
    submitBtn.textContent = 'Mengirim...';

    // Kirim data via Fetch API ke PHP
    fetch('process-rsvp.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if(data.status === 'success') {
            // Ambil nilai input untuk langsung ditampilkan secara instan
            const name = document.getElementById('guest-name').value;
            const status = document.getElementById('guest-status').value;
            const message = document.getElementById('guest-message').value;

            // Buat elemen HTML baru untuk komentar
            const badgeClass = status === 'Hadir' ? 'bg-emerald-100 text-emerald-800' : 'bg-rose-100 text-rose-800';
            const newCard = document.createElement('div');
            newCard.className = 'glass-card p-4 rounded-xl text-stone-800 opacity-0 transform translate-y-4';
            newCard.innerHTML = `
                <div class="flex justify-between items-center mb-1">
                    <h4 class="font-semibold text-amber-900">${name}</h4>
                    <span class="text-xs ${badgeClass} px-2 py-0.5 rounded-full">${status}</span>
                </div>
                <p class="text-sm text-stone-600">${message}</p>
            `;

            // Masukkan ke bagian atas daftar komentar
            commentsContainer.prepend(newCard);

            // Animasi GSAP agar card baru muncul dengan mulus
            gsap.to(newCard, { opacity: 1, y: 0, duration: 0.6, ease: 'power2.out' });

            // Reset form
            rsvpForm.reset();
        } else {
            alert('Terjadi kesalahan, silakan coba lagi.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    })
    .finally(() => {
        submitBtn.disabled = false;
        submitBtn.textContent = 'Kirim Ucapan & Konfirmasi';
    });
});
        // Daftarkan plugin ScrollTrigger ke GSAP
gsap.registerPlugin(ScrollTrigger);

// 1. Animasi untuk Judul & Paragraf Pengantar
gsap.utils.toArray('.reveal-title').forEach((element) => {
    gsap.fromTo(element, 
        { y: 50, opacity: 0 }, 
        {
            y: 0,
            opacity: 1,
            duration: 1,
            ease: 'power3.out',
            scrollTrigger: {
                trigger: element,
                start: 'top 85%', // Animasi mulai saat bagian atas elemen mencapai 85% tinggi layar dari atas
                toggleActions: 'play none none reverse' // Animasi dimainkan saat scroll turun, di-reverse saat scroll naik
            }
        }
    );
});

// 2. Animasi untuk Kartu Mempelai (Muncul bergantian / Stagger)
gsap.fromTo('.profile-card', 
    { y: 80, opacity: 0 },
    {
        y: 0,
        opacity: 1,
        duration: 1.2,
        stagger: 0.3, // Memberi jeda waktu 0.3 detik antara card pertama dan kedua
        ease: 'power4.out',
        scrollTrigger: {
            trigger: '.profile-card',
            start: 'top 80%',
            toggleActions: 'play none none none'
        }
    }
);
gsap.to('.ornament-flower', {
    y: -100, // Bergerak ke atas sejauh 100px saat di-scroll
    ease: 'none',
    scrollTrigger: {
        trigger: 'body',
        start: 'top top',
        end: 'bottom bottom',
        scrub: true // Animasi mengikuti kecepatan scroll pengguna
    }
});
    </script>
</body>
<footer class="bg-stone-950 text-stone-400 text-center py-6 mt-12">
    <p class="text-sm">&copy; 2026 Nama & Pasangan. ChiwaWebDesign.</p>
</footer>
</html>