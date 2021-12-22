//
// dropdowns.js
// Dashkit module
//

const selectors = '.dropup, .dropright, .dropdown, .dropleft';
const dropdowns = document.querySelectorAll(selectors);

let currentTarget = undefined;

// Enable nested dropdowns
dropdowns.forEach(dropdown => {
  dropdown.addEventListener('mousedown', (e) => {
    e.stopPropagation();

    if (e.target.dataset.toggle && e.target.dataset.toggle === 'dropdown') {
      currentTarget = e.currentTarget;
    }
  });

  dropdown.addEventListener('hide.bs.dropdown', (e) => {
    e.stopPropagation();

    const parentDropdown = currentTarget ? currentTarget.parentElement.closest(selectors) : undefined;

    if (parentDropdown && parentDropdown === dropdown) {
      e.preventDefault();
    }

    currentTarget = undefined;
  });
});