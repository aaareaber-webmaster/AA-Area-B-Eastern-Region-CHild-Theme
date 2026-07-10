document.addEventListener('DOMContentLoaded', function () {
	const toggle = document.querySelector('.area-menu-toggle');
	const nav = document.querySelector('.area-primary-nav');

	if (!toggle || !nav) {
		return;
	}

	toggle.addEventListener('click', function () {
		const isOpen = nav.classList.toggle('is-open');
		toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
	});
});