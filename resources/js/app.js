import './bootstrap';

const storageKey = 'bishal-theme';

function getRoot() {
	return document.documentElement;
}

function setTheme(theme) {
	const root = getRoot();
	root.dataset.theme = theme;
	root.classList.toggle('dark', theme === 'dark');

	document.querySelectorAll('[data-theme-toggle]').forEach((button) => {
		button.setAttribute('aria-pressed', theme === 'dark' ? 'true' : 'false');
	});
}

function initTheme() {
	const storedTheme = window.localStorage.getItem(storageKey);
	const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
	const theme = storedTheme || (prefersDark ? 'dark' : 'dark');

	setTheme(theme);

	document.querySelectorAll('[data-theme-toggle]').forEach((button) => {
		button.addEventListener('click', () => {
			const nextTheme = getRoot().classList.contains('dark') ? 'light' : 'dark';
			window.localStorage.setItem(storageKey, nextTheme);
			setTheme(nextTheme);
		});
	});
}

function initReveal() {
	const elements = document.querySelectorAll('[data-reveal], .fade-in');

	if (!elements.length) {
		return;
	}

	const observer = new IntersectionObserver((entries) => {
		entries.forEach((entry) => {
			if (entry.isIntersecting) {
				entry.target.classList.add('is-visible');
				observer.unobserve(entry.target);
			}
		});
	}, {
		threshold: 0.18,
		rootMargin: '0px 0px -10% 0px',
	});

	elements.forEach((element) => observer.observe(element));
}

function initProgress() {
	const progress = document.querySelector('[data-reading-progress]');

	if (!progress) {
		return;
	}

	const updateProgress = () => {
		const scrollTop = window.scrollY || document.documentElement.scrollTop;
		const total = document.documentElement.scrollHeight - window.innerHeight;
		const percentage = total > 0 ? (scrollTop / total) * 100 : 0;

		progress.style.width = `${Math.min(100, Math.max(0, percentage))}%`;
	};

	window.addEventListener('scroll', updateProgress, { passive: true });
	updateProgress();
}

function initParallax() {
	const parallaxItems = document.querySelectorAll('[data-parallax]');

	if (!parallaxItems.length) {
		return;
	}

	let ticking = false;

	const update = () => {
		const scrollY = window.scrollY;

		parallaxItems.forEach((item) => {
			const speed = Number.parseFloat(item.dataset.speed || '0.05');
			item.style.transform = `translate3d(0, ${scrollY * speed * -1}px, 0)`;
		});

		ticking = false;
	};

	window.addEventListener('scroll', () => {
		if (!ticking) {
			window.requestAnimationFrame(update);
			ticking = true;
		}
	}, { passive: true });

	update();
}

function initCursor() {
	const dot = document.querySelector('[data-custom-cursor]');
	const ring = document.querySelector('[data-custom-cursor-ring]');

	if (!dot || !ring || window.matchMedia('(pointer: coarse)').matches) {
		return;
	}

	let targetX = window.innerWidth / 2;
	let targetY = window.innerHeight / 2;
	let ringX = targetX;
	let ringY = targetY;

	const move = () => {
		ringX += (targetX - ringX) * 0.14;
		ringY += (targetY - ringY) * 0.14;

		dot.style.transform = `translate3d(${targetX}px, ${targetY}px, 0) translate(-50%, -50%)`;
		ring.style.transform = `translate3d(${ringX}px, ${ringY}px, 0) translate(-50%, -50%)`;

		window.requestAnimationFrame(move);
	};

	window.addEventListener('mousemove', (event) => {
		targetX = event.clientX;
		targetY = event.clientY;
	}, { passive: true });

	document.querySelectorAll('a, button, input, textarea, select').forEach((element) => {
		element.addEventListener('mouseenter', () => getRoot().classList.add('cursor-active'));
		element.addEventListener('mouseleave', () => getRoot().classList.remove('cursor-active'));
	});

	move();
}

function renderSearchResults(container, items) {
	if (!items.length) {
		container.innerHTML = '<p class="px-3 py-4 text-sm text-[#b8ab9b]">No matching stories yet.</p>';
		return;
	}

	container.innerHTML = items.map((item) => `
		<a href="${item.url}" class="block rounded-[1.25rem] border border-white/8 bg-white/3 p-4 transition hover:-translate-y-0.5 hover:border-[#c8622a]/50 hover:bg-white/6">
			<div class="flex gap-3">
				<img src="${item.thumbnail}" alt="${item.title}" class="h-16 w-16 shrink-0 rounded-xl object-cover">
				<div class="min-w-0">
					<p class="text-[0.7rem] font-semibold uppercase tracking-[0.28em] text-[#f0a85a]">${item.category || 'Story'} · ${item.reading_time} min</p>
					<h4 class="mt-1 line-clamp-2 font-display text-base leading-snug text-[#f5f0e8]">${item.title}</h4>
					<p class="mt-1 line-clamp-2 text-sm leading-6 text-[#b8ab9b]">${item.excerpt}</p>
				</div>
			</div>
		</a>
	`).join('');
}

function initSearch() {
	const input = document.querySelector('[data-site-search]');
	const results = document.querySelector('[data-live-search-results]');

	if (!input || !results) {
		return;
	}

	let timer;

	const hideResults = () => {
		results.hidden = true;
		results.innerHTML = '';
	};

	input.addEventListener('input', () => {
		window.clearTimeout(timer);
		const term = input.value.trim();

		if (!term) {
			hideResults();
			return;
		}

		timer = window.setTimeout(async () => {
			try {
				const response = await fetch(`/search?q=${encodeURIComponent(term)}`, {
					headers: { Accept: 'application/json' },
				});
				const payload = await response.json();
				renderSearchResults(results, payload.results || []);
				results.hidden = false;
			} catch (error) {
				results.innerHTML = '<p class="px-3 py-4 text-sm text-[#f0a85a]">Search is unavailable right now.</p>';
				results.hidden = false;
			}
		}, 180);
	});

	document.addEventListener('click', (event) => {
		if (!results.contains(event.target) && event.target !== input) {
			hideResults();
		}
	});
}

function initNavigation() {
	const toggle = document.querySelector('[data-nav-toggle]');
	const panel = document.querySelector('[data-nav-panel]');

	if (!toggle || !panel) {
		return;
	}

	toggle.addEventListener('click', () => {
		panel.hidden = !panel.hidden;
		toggle.setAttribute('aria-expanded', panel.hidden ? 'false' : 'true');
	});
}

function initAnchors() {
	document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
		anchor.addEventListener('click', (event) => {
			const targetId = anchor.getAttribute('href');
			const target = targetId ? document.querySelector(targetId) : null;

			if (target) {
				event.preventDefault();
				target.scrollIntoView({ behavior: 'smooth', block: 'start' });
			}
		});
	});
}

document.addEventListener('DOMContentLoaded', () => {
	initTheme();
	initReveal();
	initProgress();
	initParallax();
	initCursor();
	initSearch();
	initNavigation();
	initAnchors();
});
