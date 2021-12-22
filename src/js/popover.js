//
// popover.js
// Theme module
//

import { Popover } from 'bootstrap';

const popovers = document.querySelectorAll('[data-toggle="popover"]');

popovers.forEach(popover => {
  new Popover(popover);
});