
document.addEventListener('DOMContentLoaded', function() {
    const container = document.querySelector('.overflow-x-auto');
    const cards = document.querySelectorAll('.snap-start');
    const cardWidth = cards[0].offsetWidth + 16; // Card width + gap
    let animationFrame;
    let scrollPosition = 0;
    const scrollSpeed = 1.5; // Kecepatan scroll dalam piksel per frame
    
    // Sembunyikan tombol navigasi
    const leftButton = document.querySelector('.absolute.left-0');
    const rightButton = document.querySelector('.absolute.right-0');
    
    if (leftButton) leftButton.style.display = 'none';
    if (rightButton) rightButton.style.display = 'none';
    
    // Duplikasi semua kartu untuk efek rotasi tak terbatas
    function setupInfiniteRotation() {
        // Clone semua kartu asli dan tambahkan ke container
        for (let i = 0; i < cards.length; i++) {
            const clone = cards[i].cloneNode(true);
            container.appendChild(clone);
        }
    }
    
    // Fungsi untuk scroll kontinu seperti roda
    function smoothScroll() {
        // Tambah posisi scroll
        scrollPosition += scrollSpeed;
        
        // Cek apakah perlu reset posisi
        // Kita reset saat mencapai posisi kartu pertama dari set kartu yang diduplikasi
        if (scrollPosition >= cardWidth * cards.length) {
            // Reset posisi ke awal tanpa animasi
            scrollPosition = 0;
            container.scrollLeft = 0;
        } else {
            // Update posisi scroll
            container.scrollLeft = scrollPosition;
        }
        
        // Lanjutkan animasi
        animationFrame = requestAnimationFrame(smoothScroll);
    }
    
    // Setup dan mulai animasi
    function startRotation() {
        // Bersihkan animasi sebelumnya jika ada
        if (animationFrame) {
            cancelAnimationFrame(animationFrame);
        }
        
        // Reset posisi scroll saat memulai
        scrollPosition = container.scrollLeft;
        
        // Mulai animasi scroll mulus
        animationFrame = requestAnimationFrame(smoothScroll);
    }
    
    // Inisialisasi
    setupInfiniteRotation();
    startRotation();
});
