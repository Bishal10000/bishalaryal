document.addEventListener('DOMContentLoaded', () => {
    const animatedElements = document.querySelectorAll('.fade-up');
    const heroHeadlines = document.querySelectorAll('[data-split-words]');

    const observeFadeUps = (elements = animatedElements) => {
        const targets = Array.from(elements).filter((element) => element && !element.dataset.observed);

        if (!('IntersectionObserver' in window)) {
            targets.forEach((element) => element.classList.add('is-visible'));
            return;
        }

        const observer = new IntersectionObserver((entries, observerInstance) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observerInstance.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.18,
            rootMargin: '0px 0px -60px 0px',
        });

        targets.forEach((element) => {
            element.dataset.observed = 'true';
            observer.observe(element);
        });
    };

    const splitWords = (element) => {
        const text = element.textContent.trim();
        const words = text.split(/\s+/);
        element.innerHTML = words
            .map((word, index) => `<span class="hero-word" style="--word-index:${index}">${word}</span>`)
            .join(' ');
        element.dataset.splitted = 'true';
    };

    heroHeadlines.forEach((element) => {
        if (!element.dataset.splitted) {
            splitWords(element);
        }
    });

    observeFadeUps(animatedElements);
    window.observeFadeUps = (elements) => observeFadeUps(elements);
});
