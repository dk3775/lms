//
// autosize.js
// Dashkit module
//

import autosize from 'autosize';

const toggles = document.querySelectorAll('[data-autosize]');

toggles.forEach(toggle => {
  autosize(toggle);
});
