var $ = function (s, c) { return (c || document).querySelector(s) },
	$$ = function (s, c) { return [].slice.call((c || document).querySelectorAll(s)) };

var beData = window.BE_SERVICES || { services: [], options: {} };
var SV = {}, KEYS = [];

(beData.services || []).forEach(function (service) {
	SV[service.slug] = service;
	KEYS.push(service.slug);
});

var OPT = beData.options || {};

function fmt(value) {
	return typeof value === 'number' ? value.toLocaleString('en-US') : String(value);
}

function esc(value) {
	return String(value == null ? '' : value).replace(/[&<>"]/g, function (char) {
		return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;' }[char];
	});
}

function pathOf(url) {
	return String(url).replace(/^https?:\/\/[^/]+/, '').replace(/\/$/, '');
}

if (typeof addEventListener === 'function') {
	addEventListener('scroll', function () {
		var header = $('#hd');
		if (header) header.classList.toggle('s', scrollY > 30);
	}, { passive: true });
}

var burger = $('#bg'), menu = $('#mn');
if (burger && menu) {
	burger.onclick = function () { menu.classList.toggle('open') };
	$$('#mn a').forEach(function (link) {
		link.addEventListener('click', function () { menu.classList.remove('open') });
	});
}

if (typeof IntersectionObserver !== 'undefined') {
	var observer = new IntersectionObserver(function (entries) {
		entries.forEach(function (entry) {
			if (entry.isIntersecting) {
				entry.target.classList.add('in');
				observer.unobserve(entry.target);
			}
		});
	}, { threshold: 0.15 });
	$$('.rv').forEach(function (element) { observer.observe(element) });
}

var sections = $$('main [id]'), navLinks = $$('#mn a[href^="#"]');
if (typeof addEventListener === 'function') {
	addEventListener('scroll', function () {
		var y = scrollY + 140, current = sections[0];
		sections.forEach(function (section) { if (section.offsetTop <= y) current = section });
		navLinks.forEach(function (link) {
			link.classList.toggle('on', current && link.getAttribute('href') === '#' + current.id);
		});
	}, { passive: true });
}

if (typeof matchMedia === 'function' && matchMedia('(pointer:fine)').matches && $('.hero')) {
	$('.hero').addEventListener('mousemove', function (event) {
		var x = event.clientX / innerWidth - 0.5, y = event.clientY / innerHeight - 0.5;
		var person = $('.person'), brush = $('.brush');
		if (person) person.style.translate = x * -14 + 'px ' + y * -10 + 'px';
		if (brush) brush.style.translate = x * 26 + 'px ' + y * 18 + 'px';
		$$('.fc').forEach(function (element, index) {
			element.style.translate = x * (index ? 30 : -30) + 'px ' + y * 24 + 'px';
		});
	});
}

$$('.q button').forEach(function (button) {
	button.onclick = function () {
		var question = button.parentNode, wasOpen = question.classList.contains('open');
		$$('.q').forEach(function (item) { item.classList.remove('open') });
		if (!wasOpen) question.classList.add('open');
	};
});

if ($('#pills') && !$$('#pills a').length) {
	$('#pills').innerHTML = KEYS.map(function (key) {
		return '<a href="' + esc(SV[key].url) + '" data-k="' + esc(key) + '">' + esc(SV[key].n) + '</a>';
	}).join('');
}

function render(slug) {
	var service = SV[slug];
	if (!service) return;

	$('#hb').textContent = service.b;
	$('#ht').innerHTML = esc(service.t) + ' <span>يبدأ من <em>' + fmt(service.p) + '</em> جنيه</span>';
	$('#hp').innerHTML = esc(service.d) + ' <b style="color:#fff">والاستضافة والدومين علينا</b> لأول سنة.';
	$('#hc').innerHTML = (service.c || []).map(function (chip) { return '<span>' + esc(chip) + '</span>' }).join('');
	$('#pb').textContent = fmt(service.p);
	$('#pt').textContent = 'اختر باقة ' + service.n + ' المناسبة لك';
	$('#ch').textContent = 'جاهز تبدأ بـ ' + fmt(service.p) + ' جنيه؟';

	$('#plans').innerHTML = (service.pl || []).map(function (plan) {
		var badge = plan.featured ? '<em>' + esc(plan.badge) + '</em>' : '';
		var features = (plan.features || []).map(function (feature) { return '<li>' + esc(feature) + '</li>' }).join('');
		return '<div class="plan sw' + (plan.featured ? ' ft' : '') + ' in">' + badge +
			'<h3>' + esc(plan.name) + '</h3><div class="pr">يبدأ من <b>' + fmt(plan.price) + '</b> ' + esc(OPT.currency_label || 'ج.م') + '</div><ul>' +
			features + '</ul><a class="btn ' + (plan.featured ? 'pri' : 'out') + '" href="' + esc(plan.cta_url || '#contact') + '">' + esc(plan.cta_label) + '</a></div>';
	}).join('');

	$$('a.pc').forEach(function (card) { card.classList.toggle('cur', card.getAttribute('data-k') === slug) });
	$$('#pills a').forEach(function (pill) { pill.classList.toggle('on', pill.getAttribute('data-k') === slug) });
	$$('#hb,#ht,#hp,#hc').forEach(function (element) {
		element.classList.remove('sw');
		void element.offsetWidth;
		element.classList.add('sw');
	});

	document.title = 'باقات ' + service.n + ' تبدأ من ' + fmt(service.p) + ' جنيه | إبداع';
}

function currentSlug() {
	var path = (location.pathname || '').replace(/\/$/, '');
	for (var index = 0; index < KEYS.length; index++) {
		var permalink = pathOf(SV[KEYS[index]].url);
		if (permalink && permalink === path) return KEYS[index];
	}
	var hash = (location.hash || '').slice(1);
	return SV[hash] ? hash : (KEYS[0] || '');
}

document.addEventListener('click', function (event) {
	var target = event.target;
	var filter = target && target.closest ? target.closest('#pills a, a.pc') : null;
	if (filter) {
		var slug = filter.getAttribute('data-k');
		if (SV[slug]) {
			event.preventDefault();
			render(slug);
			if (history.pushState) history.pushState({ be_service: slug }, '', SV[slug].url);
		}
		return;
	}

	var anchor = target && target.closest ? target.closest('a[href^="#"]') : null;
	if (!anchor) return;
	var id = anchor.getAttribute('href').slice(1);
	if (SV[id]) return;
	var element = id && document.getElementById ? document.getElementById(id) : null;
	if (element && element.scrollIntoView) {
		event.preventDefault();
		element.scrollIntoView({ behavior: 'smooth' });
	}
});

if (typeof addEventListener === 'function') {
	addEventListener('popstate', function () { render(currentSlug()) });
	addEventListener('hashchange', function () {
		var hash = (location.hash || '').slice(1);
		if (SV[hash]) {
			render(hash);
			if (history.replaceState) history.replaceState({ be_service: hash }, '', SV[hash].url);
		}
	});
}

render(currentSlug());
