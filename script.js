document.addEventListener("DOMContentLoaded", () => {
  const prefersReduced = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  const isTouch = window.matchMedia("(pointer: coarse)").matches;

  /* ---------------- PRELOADER ---------------- */
  const preloader = document.getElementById("preloader");
  const loaderCount = document.getElementById("loaderCount");
  const loaderBar = document.getElementById("loaderBar");

  function enterSite() {
    if (!preloader) return;
    let progress = 0;

    const timer = setInterval(() => {
      progress += Math.floor(Math.random() * 7) + 3;
      progress = Math.min(progress, 100);
      loaderCount.textContent = String(progress).padStart(2, "0");
      loaderBar.style.width = `${progress}%`;

      if (progress >= 100) {
        clearInterval(timer);
        setTimeout(() => {
          preloader.style.clipPath = "inset(0 0 100% 0)";
          document.body.classList.add("loaded");
          setTimeout(() => preloader.remove(), 1100);
          initAnimations();
        }, prefersReduced ? 0 : 350);
      }
    }, prefersReduced ? 5 : 35);
  }

  /* ---------------- CURSOR ---------------- */
  const cursor = document.getElementById("cursor");
  const cursorText = cursor?.querySelector(".cursor-text");
  let mouseX = window.innerWidth / 2;
  let mouseY = window.innerHeight / 2;
  let currentX = mouseX;
  let currentY = mouseY;

  if (cursor && !isTouch && !prefersReduced) {
    window.addEventListener("mousemove", e => {
      mouseX = e.clientX;
      mouseY = e.clientY;
    });

    const follow = () => {
      currentX += (mouseX - currentX) * 0.16;
      currentY += (mouseY - currentY) * 0.16;
      cursor.style.left = `${currentX}px`;
      cursor.style.top = `${currentY}px`;
      requestAnimationFrame(follow);
    };
    follow();

    document.querySelectorAll("[data-cursor]").forEach(el => {
      el.addEventListener("mouseenter", () => {
        cursor.classList.add("active");
        cursorText.textContent = el.dataset.cursor;
      });
      el.addEventListener("mouseleave", () => cursor.classList.remove("active"));
    });
  }

  /* ---------------- MENU ---------------- */
  const openMenu = document.getElementById("openMenu");
  const closeMenu = document.getElementById("closeMenu");
  const menuOverlay = document.getElementById("menuOverlay");
  const menuItems = document.querySelectorAll(".menu-item");
  const menuPreview = document.getElementById("menuPreview");
  const menuPreviewImage = document.getElementById("menuPreviewImage");

  const menuToggleLabel = openMenu.querySelector("span:last-child");

  const setMenu = open => {
    menuOverlay.classList.toggle("active", open);
    menuOverlay.setAttribute("aria-hidden", String(!open));
    openMenu.setAttribute("aria-expanded", String(open));
    openMenu.setAttribute("aria-label", open ? "Tutup menu" : "Buka menu");
    if (menuToggleLabel) menuToggleLabel.textContent = open ? "Tutup" : "Menu";
    document.body.classList.toggle("menu-open", open);
  };

  openMenu.addEventListener("click", () => setMenu(true));
  closeMenu.addEventListener("click", () => setMenu(false));

  document.addEventListener("keydown", e => {
    if (e.key === "Escape") setMenu(false);
  });

  menuItems.forEach(item => {
    item.addEventListener("click", () => setMenu(false));

    if (!isTouch) {
      item.addEventListener("mouseenter", () => {
        const src = item.dataset.preview;
        if (src) {
          menuPreviewImage.src = src;
          menuPreview.classList.add("visible");
        }
      });
      item.addEventListener("mouseleave", () => menuPreview.classList.remove("visible"));
    }
  });

  /* ---------------- MAGNETIC BUTTONS ---------------- */
  if (!isTouch && !prefersReduced) {
    document.querySelectorAll(".magnetic").forEach(el => {
      el.addEventListener("mousemove", e => {
        const r = el.getBoundingClientRect();
        const x = (e.clientX - r.left - r.width / 2) * 0.16;
        const y = (e.clientY - r.top - r.height / 2) * 0.16;
        el.style.transform = `translate(${x}px, ${y}px)`;
      });
      el.addEventListener("mouseleave", () => {
        el.style.transform = "";
      });
    });
  }

  /* ---------------- GSAP MOTION ---------------- */
  function initAnimations() {
    if (prefersReduced || typeof gsap === "undefined") {
      document.querySelectorAll(".reveal").forEach(el => {
        el.style.opacity = 1;
        el.style.transform = "none";
      });
      return;
    }

    gsap.registerPlugin(ScrollTrigger);

    // Hero atmosphere
    gsap.to(".hero-image", {
      scale: 1,
      ease: "none",
      scrollTrigger: {
        trigger: ".hero",
        start: "top top",
        end: "bottom top",
        scrub: 1
      }
    });

    gsap.to(".hero-title", {
      yPercent: -22,
      opacity: .25,
      ease: "none",
      scrollTrigger: {
        trigger: ".hero",
        start: "top top",
        end: "bottom top",
        scrub: 1
      }
    });

    // Generic reveals
    gsap.utils.toArray(".reveal").forEach(el => {
      gsap.to(el, {
        opacity: 1,
        y: 0,
        duration: 1.15,
        ease: "power3.out",
        scrollTrigger: {
          trigger: el,
          start: "top 82%",
          once: true
        }
      });
    });

    // Image parallax
    gsap.utils.toArray(".image-frame img, .experience-image img").forEach(img => {
      gsap.to(img, {
        yPercent: -7,
        ease: "none",
        scrollTrigger: {
          trigger: img.closest(".image-frame, .experience-card"),
          start: "top bottom",
          end: "bottom top",
          scrub: 1
        }
      });
    });

    // Manifesto typography
    gsap.from(".manifesto h2", {
      y: 100,
      opacity: 0,
      duration: 1.2,
      ease: "power3.out",
      scrollTrigger: {
        trigger: ".manifesto",
        start: "top 65%"
      }
    });

    gsap.to(".manifesto h2", {
      xPercent: -8,
      ease: "none",
      scrollTrigger: {
        trigger: ".manifesto",
        start: "top bottom",
        end: "bottom top",
        scrub: 1
      }
    });

    // Horizontal desktop experience (re-evaluates on resize/rotation, not just on load)
    const track = document.querySelector(".experience-track");
    if (track) {
      const mm = gsap.matchMedia();
      mm.add("(min-width: 901px)", () => {
        const distance = () => track.scrollWidth - window.innerWidth;

        gsap.to(track, {
          x: () => -distance(),
          ease: "none",
          scrollTrigger: {
            trigger: ".experience",
            start: "top top",
            end: () => `+=${distance()}`,
            pin: true,
            scrub: 1,
            invalidateOnRefresh: true
          }
        });

        // cleanup returned so matchMedia reverts cleanly when crossing back under 901px
        return () => gsap.set(track, { clearProps: "transform" });
      });
    }

    // Nature image drift
    gsap.to(".nature > img", {
      yPercent: -10,
      ease: "none",
      scrollTrigger: {
        trigger: ".nature",
        start: "top bottom",
        end: "bottom top",
        scrub: 1
      }
    });

    // Refresh after images settle
    window.addEventListener("load", () => ScrollTrigger.refresh());
    setTimeout(() => ScrollTrigger.refresh(), 1000);
  }

  enterSite();
});
