import './bootstrap';
import Swiper from 'swiper';
import 'swiper/css';
import { EffectCoverflow, Autoplay, Pagination } from 'swiper/modules';

// ✅ Desktop: ยังใช้ 3D tilt effect เดิมได้
document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.tour-card');

    cards.forEach(card => {
        // Hover 3D effect (เฉพาะจอใหญ่)
        if (window.innerWidth >= 768) {
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                const rotateX = (y - centerY) / 20;
                const rotateY = (centerX - x) / 20;
                card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.02)`;
            });
            card.addEventListener('mouseleave', () => {
                card.style.transform = '';
            });
        }
    });

    // ✅ Mobile: ใช้ Swiper slide
    if (window.innerWidth < 768 && document.querySelector('.mySwiper')) {
        new Swiper('.mySwiper', {
            modules: [EffectCoverflow, Autoplay, Pagination],
            effect: 'coverflow',
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            loop: true,
            spaceBetween: 20,
            coverflowEffect: {
                rotate: 20,
                stretch: 0,
                depth: 150,
                modifier: 1,
                slideShadows: true,
            },
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    }
});
