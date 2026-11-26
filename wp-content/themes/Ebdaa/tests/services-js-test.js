const fs = require('fs');
const vm = require('vm');
const assert = require('assert');

function makeElement(id, attrs, flags) {
	flags = flags || {};
	const classes = new Set();
	return {
		id: id,
		innerHTML: '',
		textContent: '',
		offsetTop: 0,
		offsetWidth: 1,
		style: {},
		attrs: attrs || {},
		isPill: !!flags.isPill,
		isCard: !!flags.isCard,
		listeners: {},
		classList: {
			add: (name) => classes.add(name),
			remove: (name) => classes.delete(name),
			contains: (name) => classes.has(name),
			toggle: (name, force) => {
				const on = force === undefined ? !classes.has(name) : !!force;
				on ? classes.add(name) : classes.delete(name);
				return on;
			},
			values: classes,
		},
		getAttribute(name) { return this.attrs[name] === undefined ? '' : this.attrs[name]; },
		addEventListener(type, fn) { (this.listeners[type] = this.listeners[type] || []).push(fn); },
		closest(selector) {
			if (selector.indexOf('#pills a') >= 0 && this.isPill) return this;
			if (selector.indexOf('a.pc') >= 0 && this.isCard) return this;
			if (selector.indexOf('a[href^="#"]') >= 0 && /^#/.test(this.getAttribute('href'))) return this;
			return null;
		},
		scrollIntoView() {},
	};
}

const byId = {};
['hb', 'ht', 'hp', 'hc', 'pb', 'pt', 'ch', 'plans', 'pills', 'hd', 'bg', 'mn'].forEach((id) => {
	byId[id] = makeElement(id);
});

byId.pills.children = [
	makeElement('pill-realestate', { 'data-k': 'realestate', href: '/service/realestate' }, { isPill: true }),
	makeElement('pill-law', { 'data-k': 'law', href: '/service/law' }, { isPill: true }),
];

const cards = [
	makeElement('card-realestate', { 'data-k': 'realestate', href: '/service/realestate' }, { isCard: true }),
	makeElement('card-law', { 'data-k': 'law', href: '/service/law' }, { isCard: true }),
];

const docListeners = {}, winListeners = {}, pushed = [], replaced = [];

const document = {
	title: '',
	addEventListener(type, fn) { (docListeners[type] = docListeners[type] || []).push(fn); },
	getElementById(id) { return byId[id] || null; },
	querySelector(selector) { return byId[selector.replace('#', '')] || (selector === '.hero' ? makeElement('hero') : null); },
	querySelectorAll(selector) {
		if (selector === '#pills a') return byId.pills.children;
		if (selector === 'a.pc') return cards;
		return [];
	},
};

const sandbox = {
	document,
	console,
	scrollY: 0,
	innerWidth: 1000,
	innerHeight: 800,
	location: { pathname: '/service/realestate', hash: '' },
	history: {
		pushState(state, title, url) { pushed.push(url); },
		replaceState(state, title, url) { replaced.push(url); },
	},
	matchMedia() { return { matches: false }; },
	addEventListener(type, fn) { (winListeners[type] = winListeners[type] || []).push(fn); },
};
sandbox.window = sandbox;
sandbox.BE_SERVICES = {
	options: { included_feature: 'دومين واستضافة مجاناً لأول سنة', currency_label: 'ج.م' },
	services: [
		{
			slug: 'realestate', url: '/service/realestate', n: 'العقارات', p: '7,000',
			b: '🏙️ باقات المواقع العقارية', t: 'موقعك العقاري الاحترافي', d: 'اعرض وحداتك',
			c: ['دومين مجاني', 'فلاتر بحث'],
			pl: [
				{ name: 'وسيط عقاري', price: '7,000', featured: false, badge: 'الأكثر طلباً', features: ['دومين واستضافة مجاناً لأول سنة', 'عرض حتى 50 وحدة'], cta_label: 'اطلب الباقة', cta_url: '' },
				{ name: 'شركة عقارية', price: '13,000', featured: true, badge: 'الأكثر طلباً', features: ['وحدات غير محدودة'], cta_label: 'اطلب الباقة', cta_url: '' },
			],
			faq: [],
		},
		{
			slug: 'law', url: '/service/law', n: 'المحاماة', p: '4,500',
			b: '⚖️ باقات مواقع المحاماة', t: 'موقع مكتبك القانوني', d: 'حضور رقمي',
			c: ['دومين مجاني'],
			pl: [{ name: 'محامٍ فردي', price: '4,500', featured: true, badge: 'الأكثر طلباً', features: ['حتى 6 صفحات'], cta_label: 'اطلب الباقة', cta_url: '' }],
			faq: [],
		},
	],
};

vm.runInNewContext(fs.readFileSync(__dirname + '/../assets/js/services.js', 'utf8'), sandbox, { filename: 'services.js' });

function fire(listeners, type, event) {
	(listeners[type] || []).forEach((fn) => fn(event));
}

assert.strictEqual(byId.hb.textContent, '🏙️ باقات المواقع العقارية', 'initial render hydrates the badge from JSON');
assert.ok(byId.ht.innerHTML.indexOf('7,000') !== -1, 'initial render hydrates the starting price');
assert.ok(byId.plans.innerHTML.indexOf('وسيط عقاري') !== -1, 'initial render hydrates the packages');
assert.ok(byId.plans.innerHTML.indexOf('دومين واستضافة مجاناً لأول سنة') !== -1, 'included feature is rendered as the first package item');
assert.ok(byId.pills.children[0].classList.contains('on'), 'the active pill is marked');
assert.strictEqual(document.title, 'باقات العقارات تبدأ من 7,000 جنيه | إبداع', 'document title follows the service price');

const clickEvent = { target: byId.pills.children[1], prevented: false, preventDefault() { this.prevented = true; } };
fire(docListeners, 'click', clickEvent);
assert.strictEqual(clickEvent.prevented, true, 'filter clicks are intercepted for in-page switching');
assert.strictEqual(pushed[pushed.length - 1], '/service/law', 'pushState updates the URL to the service permalink');
assert.strictEqual(byId.hb.textContent, '⚖️ باقات مواقع المحاماة', 'filter click swaps the hero badge');
assert.ok(byId.plans.innerHTML.indexOf('محامٍ فردي') !== -1, 'filter click swaps the packages');
assert.ok(byId.pills.children[1].classList.contains('on'), 'filter click marks the new active pill');
assert.ok(cards[1].classList.contains('cur'), 'filter click marks the matching section card');

sandbox.location.pathname = '/service/realestate';
fire(winListeners, 'popstate', {});
assert.strictEqual(byId.hb.textContent, '🏙️ باقات المواقع العقارية', 'Back button restores the previous service');

sandbox.location.pathname = '/page-services';
sandbox.location.hash = '#law';
fire(winListeners, 'hashchange', {});
assert.strictEqual(byId.hb.textContent, '⚖️ باقات مواقع المحاماة', 'legacy #slug links still select a service');
assert.strictEqual(replaced[replaced.length - 1], '/service/law', 'legacy hash links are normalised to the permalink');

console.log('All services JavaScript tests passed.');
