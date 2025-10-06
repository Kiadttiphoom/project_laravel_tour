import Swiper from "swiper/bundle";
import "swiper/css/bundle";

window.addEventListener("load", () => {
  const swiperContainer = document.querySelector(".mySwiper");
  if (!swiperContainer) return;

  const slideCount = swiperContainer.querySelectorAll(".swiper-slide").length;
  const enableLoop = slideCount > 1;

  new Swiper(".mySwiper", {
    loop: enableLoop,
    effect: "fade",
    fadeEffect: { crossFade: true },
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      dynamicBullets: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    speed: 1200,
    lazy: { loadPrevNext: true, loadOnTransitionStart: true },
    preloadImages: false, // 👈 สำคัญมาก ป้องกันการโหลดพร้อมกันทั้งหมด
  });
});
