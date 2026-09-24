// Filter the server-rendered cards without waiting for offscreen lazy images.
(() => {
    const section = document.getElementById('rs-popular-courses');
    if (!section) return;
    const buttons = section.querySelectorAll('button[data-filter]');
    const cards = section.querySelectorAll('.je-home-course');
    const status = document.getElementById('home-course-status');
    buttons.forEach(button => button.addEventListener('click', () => {
        const group = button.dataset.filter.replace(/^\./, '');
        let count = 0;
        cards.forEach(card => {
            card.hidden = group !== '*' && !card.dataset.groups.split(' ').includes(group);
            if (!card.hidden) count++;
        });
        buttons.forEach(item => {
            item.classList.toggle('active', item === button);
            item.setAttribute('aria-pressed', String(item === button));
        });
        status.textContent = `${count} courses shown: ${button.textContent.trim()}.`;
    }));
})();
