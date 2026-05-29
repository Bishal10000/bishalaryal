document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelector('.site-header');
    const progressBar = document.querySelector('.reading-progress__bar');
    const mobileToggle = document.querySelector('[data-mobile-menu-toggle]');
    const mobileOverlay = document.querySelector('[data-mobile-menu-overlay]');
    const mobileLinks = document.querySelectorAll('[data-mobile-menu-overlay] a');
    const body = document.body;
    const root = document.documentElement;
    const finePointer = window.matchMedia('(pointer: fine)').matches && window.innerWidth >= 1024;

    const updateHeaderState = () => {
        if (!header) return;
        header.classList.toggle('is-scrolled', window.scrollY > 80);
    };

    const updateProgress = () => {
        if (!progressBar) return;
        const scrollTop = window.scrollY || root.scrollTop || 0;
        const scrollHeight = root.scrollHeight - window.innerHeight;
        const progress = scrollHeight > 0 ? (scrollTop / scrollHeight) * 100 : 0;
        progressBar.style.width = `${Math.min(100, Math.max(0, progress))}%`;
    };

    const setMenuState = (isOpen) => {
        if (!mobileToggle || !mobileOverlay) return;
        body.classList.toggle('menu-open', isOpen);
        root.classList.toggle('no-scroll', isOpen);
        mobileToggle.setAttribute('aria-expanded', String(isOpen));
    };

    const closeMenu = () => setMenuState(false);

    if (mobileToggle && mobileOverlay) {
        mobileToggle.addEventListener('click', () => {
            setMenuState(!body.classList.contains('menu-open'));
        });

        mobileOverlay.addEventListener('click', (event) => {
            if (event.target === mobileOverlay || event.target.matches('[data-mobile-menu-close]')) {
                closeMenu();
            }
        });

        mobileLinks.forEach((link) => link.addEventListener('click', closeMenu));
        window.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') closeMenu();
        });
    }

    if (finePointer) {
        root.classList.add('has-custom-cursor');
        const cursor = document.querySelector('.custom-cursor');
        const cursorRing = document.querySelector('.custom-cursor-ring');

        if (cursor && cursorRing) {
            let targetX = window.innerWidth / 2;
            let targetY = window.innerHeight / 2;
            let ringX = targetX;
            let ringY = targetY;

            const render = () => {
                ringX += (targetX - ringX) * 0.14;
                ringY += (targetY - ringY) * 0.14;

                cursor.style.transform = `translate(${targetX}px, ${targetY}px) translate(-50%, -50%)`;
                cursorRing.style.transform = `translate(${ringX}px, ${ringY}px) translate(-50%, -50%)`;
                requestAnimationFrame(render);
            };

            render();

            window.addEventListener('pointermove', (event) => {
                targetX = event.clientX;
                targetY = event.clientY;
            });
        }
    }

    const filterBar = document.querySelector('[data-filter-bar]');
    const filterPills = filterBar ? Array.from(filterBar.querySelectorAll('[data-filter-pill]')) : [];
    const searchInput = document.querySelector('[data-article-search]');
    const cards = Array.from(document.querySelectorAll('[data-article-card]'));
    const loadMoreButton = document.querySelector('[data-load-more-button]');
    const emptyState = document.querySelector('[data-articles-empty]');
    const loadMoreStep = 6;
    const state = {
        category: 'all',
        query: '',
        visibleCount: loadMoreStep,
    };

    const matchesCurrentFilters = (card) => {
        const category = (card.dataset.category || '').toLowerCase();
        const searchText = (card.dataset.search || '').toLowerCase();
        const categoryMatch = state.category === 'all' || category === state.category;
        const searchMatch = !state.query || searchText.includes(state.query);
        return categoryMatch && searchMatch;
    };

    const applyFilters = () => {
        let visibleCount = 0;

        cards.forEach((card, index) => {
            const isLoaded = index < state.visibleCount || !card.classList.contains('is-load-hidden');
            const shouldShow = isLoaded && matchesCurrentFilters(card);
            card.style.display = shouldShow ? '' : 'none';
            if (shouldShow) {
                visibleCount += 1;
            }
        });

        if (loadMoreButton) {
            const remainingHidden = cards.slice(state.visibleCount).some((card) => matchesCurrentFilters(card));
            loadMoreButton.style.display = remainingHidden ? 'inline-flex' : 'none';
        }

        if (emptyState) {
            emptyState.style.display = visibleCount === 0 ? 'block' : 'none';
        }

        if (window.observeFadeUps) {
            window.observeFadeUps(cards.filter((card) => card.style.display !== 'none'));
        }
    };

    if (filterPills.length || searchInput || loadMoreButton) {
        filterPills.forEach((pill) => {
            pill.addEventListener('click', () => {
                filterPills.forEach((item) => item.classList.remove('is-active'));
                pill.classList.add('is-active');
                state.category = (pill.dataset.filterPill || 'all').toLowerCase();
                applyFilters();
            });
        });

        if (searchInput) {
            searchInput.addEventListener('input', (event) => {
                state.query = event.target.value.trim().toLowerCase();
                applyFilters();
            });
        }

        if (loadMoreButton) {
            loadMoreButton.addEventListener('click', () => {
                state.visibleCount = Math.min(cards.length, state.visibleCount + loadMoreStep);
                cards.forEach((card, index) => {
                    if (index < state.visibleCount) {
                        card.classList.remove('is-load-hidden');
                    }
                });
                applyFilters();
            });
        }

        applyFilters();
    }

    updateHeaderState();
    updateProgress();

    window.addEventListener('scroll', () => {
        updateHeaderState();
        updateProgress();
    }, { passive: true });

    window.addEventListener('resize', () => {
        updateHeaderState();
        updateProgress();
    });
});
