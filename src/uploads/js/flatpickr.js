//
// flatpickr.js
// Theme module
//

import flatpickr from 'flatpickr';

const toggles = document.querySelectorAll('[data-flatpickr]');

toggles.forEach(toggle => {
  const options = toggle.dataset.flatpickr ? JSON.parse(toggle.dataset.flatpickr) : {};

  flatpickr(toggle, options);
});
