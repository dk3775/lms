//
// wizard.js
// Dashkit module
//

import { Tab } from 'bootstrap';

const toggles = document.querySelectorAll('[data-toggle="wizard"]');

toggles.forEach(toggle => {
  toggle.addEventListener('click', function(e) {
    e.preventDefault();

    // Toggle new tab
    const tab = new Tab(toggle);

    tab.show();

    // Remove active state
    toggle.classList.remove('active');
  });
});
