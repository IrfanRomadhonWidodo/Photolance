const slides = document.querySelectorAll('.slide');
const heroText = document.getElementById('hero-text');
const heroSubtext = document.getElementById('hero-subtext');
const menuBtn = document.getElementById('menu-btn');
const sidebar = document.getElementById('sidebar');
const closeBtn = document.getElementById('close-btn');
let index = 0;

const messages = [
    { text: "Abadikan Momen Berharga Anda", subtext: "Layanan fotografi profesional untuk setiap kebutuhan" },
    { text: "Hasil Jepretan Premium", subtext: "Tim fotografer profesional siap mengabadikan momen spesial" },
    { text: "Layanan Foto Terbaik", subtext: "Pilihan paket dan fotografer sesuai kebutuhan Anda" }
];

function changeSlide() {
    slides.forEach(slide => slide.classList.remove('active'));
    slides[index].classList.add('active');
    heroText.textContent = messages[index].text;
    heroSubtext.textContent = messages[index].subtext;
    index = (index + 1) % slides.length;
}

setInterval(changeSlide, 4000);

// Toggle sidebar menu
menuBtn.addEventListener('click', () => {
    sidebar.classList.remove('-translate-x-full');
});

closeBtn.addEventListener('click', () => {
    sidebar.classList.add('-translate-x-full');
});
