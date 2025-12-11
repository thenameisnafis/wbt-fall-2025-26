document.addEventListener("DOMContentLoaded", () => {

    /* ===== SMOOTH SCROLL ===== */
    const navLinks = document.querySelectorAll(".nav-links a");

    navLinks.forEach(link => {
        link.addEventListener("click", (e) => {
            e.preventDefault();
            const targetId = link.getAttribute("href");
            if (document.querySelector(targetId)) {
                document.querySelector(targetId).scrollIntoView({
                    behavior: "smooth",
                    block: "start"
                });
            } else {
                window.location.href = targetId;
            }
        });
    });

    /* ===== ACTIVE LINK ON SCROLL ===== */
    const sections = document.querySelectorAll("section, main, header");

    window.addEventListener("scroll", () => {
        let scrollPos = window.scrollY + 120;
        sections.forEach(section => {
            const id = section.getAttribute("id");
            if (!id) return;
            const top = section.offsetTop;
            const height = section.offsetHeight;
            const link = document.querySelector(`.nav-links a[href="#${id}"]`);
            if (scrollPos >= top && scrollPos < top + height) {
                if (link) link.classList.add("active");
            } else {
                if (link) link.classList.remove("active");
            }
        });
    });

    /* ===== FADE-IN ANIMATION ===== */
    const faders = document.querySelectorAll(".fade-in");
    const appearOptions = { threshold: 0.2, rootMargin: "0px 0px -50px 0px" };
    const appearOnScroll = new IntersectionObserver((entries, appearOnScroll) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            entry.target.classList.add("visible");
            appearOnScroll.unobserve(entry.target);
        });
    }, appearOptions);

    faders.forEach(fader => {
        appearOnScroll.observe(fader);
    });

});
