document.addEventListener('DOMContentLoaded', function () {
	const mobileBreakpoint = window.matchMedia('(max-width: 921px)');
	const menuToggle = document.querySelector('.area-menu-toggle');
	const nav = document.querySelector('.area-primary-nav');
	const track = document.querySelector('.area-mobile-menu-track');
	const rootPanel = document.querySelector('.area-menu-panel-root');

	if (!menuToggle || !nav || !track || !rootPanel) {
		return;
	}

	let panelDepth = 0;
	let mobilePrepared = false;

	function resetMenu() {
		panelDepth = 0;
		track.style.transform = 'translateX(0)';

		track.querySelectorAll('.area-menu-panel-sub').forEach(function (panel) {
			panel.remove();
		});
	}

	function removeTriggers() {
		document.querySelectorAll('.area-submenu-trigger').forEach(function (trigger) {
			trigger.remove();
		});

		document.querySelectorAll('[data-mobile-prepared="true"]').forEach(function (item) {
			delete item.dataset.mobilePrepared;
		});

		mobilePrepared = false;
		resetMenu();
	}

	function openSubmenu(item) {
		const submenu = item.querySelector(':scope > .sub-menu');
		const link = item.querySelector(':scope > a');

		if (!submenu || !link) {
			return;
		}

		const panel = document.createElement('div');
		panel.className = 'area-menu-panel area-menu-panel-sub';

		const header = document.createElement('div');
		header.className = 'area-menu-panel-header';

		const backButton = document.createElement('button');
		backButton.type = 'button';
		backButton.className = 'area-menu-back';
		backButton.innerHTML = '<span aria-hidden="true">‹</span> Back';

		const title = document.createElement('strong');
		title.className = 'area-menu-panel-title';
		title.textContent = link.textContent.trim();

		header.append(backButton, title);

		const clonedMenu = submenu.cloneNode(true);
		clonedMenu.classList.add('area-mobile-submenu');

		const parentItem = document.createElement('li');
		parentItem.className = 'area-mobile-parent-link';

		const parentLink = link.cloneNode(true);
		parentLink.textContent = `View ${link.textContent.trim()}`;

		parentItem.appendChild(parentLink);
		clonedMenu.prepend(parentItem);

		panel.append(header, clonedMenu);
		track.appendChild(panel);

		panelDepth += 1;
		track.style.transform = `translateX(-${panelDepth * 100}%)`;

		backButton.addEventListener('click', function () {
			panelDepth -= 1;
			track.style.transform = `translateX(-${panelDepth * 100}%)`;

			window.setTimeout(function () {
				panel.remove();
			}, 260);
		});

		preparePanel(panel);
	}

	function preparePanel(panel) {
		if (!mobileBreakpoint.matches) {
			return;
		}

		panel.querySelectorAll('.menu-item-has-children').forEach(function (item) {
			const link = item.querySelector(':scope > a');

			if (!link || item.dataset.mobilePrepared === 'true') {
				return;
			}

			item.dataset.mobilePrepared = 'true';

			const trigger = document.createElement('button');
			trigger.type = 'button';
			trigger.className = 'area-submenu-trigger';
			trigger.setAttribute(
				'aria-label',
				`Open submenu for ${link.textContent.trim()}`
			);
			trigger.innerHTML = '<span aria-hidden="true">›</span>';

			item.appendChild(trigger);

			function openItemSubmenu(event) {
				event.preventDefault();
				event.stopPropagation();
				openSubmenu(item);
			}

			link.addEventListener('click', openItemSubmenu);
			trigger.addEventListener('click', openItemSubmenu);
		});
	}

	function initialiseMobileMenu() {
		if (!mobileBreakpoint.matches || mobilePrepared) {
			return;
		}

		preparePanel(rootPanel);
		mobilePrepared = true;
	}

	menuToggle.addEventListener('click', function () {
		const isOpen = nav.classList.toggle('is-open');

		menuToggle.setAttribute('aria-expanded', String(isOpen));

		if (isOpen) {
			initialiseMobileMenu();
		} else {
			resetMenu();
		}
	});

	mobileBreakpoint.addEventListener('change', function (event) {
		if (event.matches) {
			initialiseMobileMenu();
		} else {
			nav.classList.remove('is-open');
			menuToggle.setAttribute('aria-expanded', 'false');
			removeTriggers();
		}
	});

	initialiseMobileMenu();
});