import Swiper from "swiper";
import "swiper/css";
import { Autoplay, Pagination } from "swiper/modules";

document.addEventListener("DOMContentLoaded", () => {
    // -------------------------------
    // 🟡 Fade-in เมื่อ scroll (tour cards)
    // -------------------------------
    const tourCardObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove(
                        "opacity-0",
                        "translate-y-12",
                        "scale-95"
                    );
                    entry.target.classList.add(
                        "opacity-100",
                        "translate-y-0",
                        "scale-100"
                    );
                }
            });
        },
        { threshold: 0.1, rootMargin: "0px 0px -100px 0px" }
    );

    document.querySelectorAll(".tour-card").forEach((card) => {
        tourCardObserver.observe(card);
    });

    // -------------------------------
    // 🟢 3D Tilt Effect
    // -------------------------------
    document.querySelectorAll(".tour-card").forEach((card) => {
        card.addEventListener("mousemove", (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            const rotateX = (y - centerY) / 20;
            const rotateY = (centerX - x) / 20;
            card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.02)`;
        });

        card.addEventListener("mouseleave", () => {
            card.style.transform = "";
        });
    });

    // -------------------------------
    // 🟣 Swiper
    // -------------------------------
    const swiperEl = document.querySelector(".mySwiper");
    if (swiperEl) {
        const slideCount = swiperEl.querySelectorAll(".swiper-slide").length;
        const enableLoop = slideCount > 1;

        const swiper = new Swiper(".mySwiper", {
            modules: [Autoplay, Pagination],
            effect: "slide",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 1.15,
            loop: enableLoop,
            spaceBetween: 12,
            speed: 650,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                dynamicBullets: true,
            },
            watchSlidesProgress: true,
            on: {
                setTranslate(swiper) {
                    swiper.slides.forEach((slide) => {
                        const progress = slide.progress;
                        const scale =
                            1 - Math.min(Math.abs(progress * 0.15), 0.15);
                        const rotate = progress * 8;
                        const translateX = progress * 25;
                        slide.style.transform = `translateX(${translateX}px) scale(${scale}) rotateY(${rotate}deg)`;
                        slide.style.transition = "transform 0.45s ease-out";
                    });
                },
                setTransition(swiper, transition) {
                    swiper.slides.forEach((slide) => {
                        slide.style.transitionDuration = `${transition}ms`;
                    });
                },
            },
        });

        // GPU Boost
        swiperEl.querySelectorAll("img").forEach((img) => {
            img.setAttribute("loading", "lazy");
            img.style.willChange = "transform";
            img.style.transform = "translateZ(0)";
        });
    }

    // -------------------------------
    // 🔵 Fade-up Animation (ทั่วไป)
    // -------------------------------
    const fadeElements = document.querySelectorAll(".fade-up");
    const fadeUpObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove(
                        "opacity-0",
                        "translate-y-10",
                        "invisible"
                    );
                    entry.target.classList.add("opacity-100", "translate-y-0");
                } else {
                    entry.target.classList.add(
                        "opacity-0",
                        "translate-y-10",
                        "invisible"
                    );
                    entry.target.classList.remove(
                        "opacity-100",
                        "translate-y-0"
                    );
                }
            });
        },
        { threshold: 0.1, rootMargin: "0px 0px -10% 0px" }
    );

    fadeElements.forEach((el) => {
        el.classList.add(
            "opacity-0",
            "translate-y-10",
            "transition-all",
            "duration-700",
            "ease-out",
            "invisible"
        );
        fadeUpObserver.observe(el);
    });
});
