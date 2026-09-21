/* Extend the existing theme's menu without replacing its click/animation behavior. */
jQuery(function ($) {
    'use strict';
    var toggle = document.querySelector('.rs-menu-toggle');
    var menu = document.getElementById('main-navigation');
    if (!toggle || !menu) return;

    var parents = Array.from(menu.querySelectorAll('.rs-menu-parent'));
    var closes = Array.from(menu.querySelectorAll('.sub-menu-close'));
    parents.forEach(function (control, index) {
        var list = control.parentElement.querySelector(':scope > ul');
        var link = control.parentElement.querySelector(':scope > a');
        if (!list) return;
        list.id = list.id || 'navigation-submenu-' + index;
        control.setAttribute('role', 'button');
        control.setAttribute('tabindex', '0');
        control.setAttribute('aria-controls', list.id);
        control.setAttribute('aria-label', (link ? link.textContent.trim() : 'Navigation') + ' submenu');
    });
    closes.forEach(function (control) {
        control.setAttribute('role', 'button');
        control.setAttribute('tabindex', '0');
        control.setAttribute('aria-label', 'Close submenu');
    });
    function sync() {
        var expanded = toggle.classList.contains('rs-menu-toggle-open');
        toggle.setAttribute('aria-expanded', String(expanded));
        toggle.setAttribute('aria-label', expanded ? 'Close navigation menu' : 'Open navigation menu');
        parents.forEach(function (control) {
            var list = document.getElementById(control.getAttribute('aria-controls'));
            if (list) control.setAttribute('aria-expanded', String(list.classList.contains('visible')));
        });
    }
    [toggle].concat(parents, closes).forEach(function (control) {
        control.addEventListener('keydown', function (event) {
            if (event.key === 'Enter' || event.key === ' ') {
                event.preventDefault();
                control.click();
            }
        });
    });
    menu.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' && toggle.classList.contains('rs-menu-toggle-open')) {
            event.preventDefault();
            toggle.click();
            toggle.focus();
        }
    });
    new MutationObserver(sync).observe(menu, {attributes: true, attributeFilter: ['class'], subtree: true});
    new MutationObserver(sync).observe(toggle, {attributes: true, attributeFilter: ['class']});
    sync();
});
