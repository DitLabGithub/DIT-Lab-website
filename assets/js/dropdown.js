document.addEventListener('DOMContentLoaded', () => {
  const parents = document.querySelectorAll('#primary-menu .menu-item-has-children');

  parents.forEach(item => {
    item.querySelector(':scope > a').addEventListener('click', e => {
      e.preventDefault();
      item.classList.toggle('is-open');
    });
  });

  document.addEventListener('click', e => {
    if (!e.target.closest('#primary-menu .menu-item-has-children')) {
      parents.forEach(p => p.classList.remove('is-open'));
    }
  });
});