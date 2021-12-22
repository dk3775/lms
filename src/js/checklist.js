//
// checklist.js
// Dashkit module
//

import { Sortable } from '@shopify/draggable';

const checklists = document.querySelectorAll('.checklist');

if (checklists) {
  new Sortable(checklists, {
    draggable: '.form-check',
    handle: '.form-check-label',
    mirror: {
      constrainDimensions: true
    }
  });
}