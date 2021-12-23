//
// demo.js
// Theme module
//

import { Popover, Collapse } from 'bootstrap';

const popover = document.querySelector('#popoverDemo');
const form = document.querySelector('#demoForm');
const topnav = document.querySelector('#topnav');
const topbar = document.querySelector('#topbar');
const sidebar = document.querySelector('#sidebar');
const sidebarSmall = document.querySelector('#sidebarSmall');
const sidebarUser = document.querySelector('#sidebarUser');
const sidebarUserSmall = document.querySelector('#sidebarSmallUser');
const sidebarSizeContainer = document.querySelector('#sidebarSizeContainer')
const navPositionToggle = document.querySelectorAll('input[name="navPosition"]');
const containers = document.querySelectorAll('[class^="container"]');
const stylesheetLight = document.querySelector('#stylesheetLight');
const stylesheetDark = document.querySelector('#stylesheetDark');

const config = {
  showPopover: (localStorage.getItem('dashkitShowPopover')) ? localStorage.getItem('dashkitShowPopover') : true,
  colorScheme: (localStorage.getItem('dashkitColorScheme')) ? localStorage.getItem('dashkitColorScheme') : 'light',
  navPosition: (localStorage.getItem('dashkitNavPosition')) ? localStorage.getItem('dashkitNavPosition') : 'sidenav',
  navColor: (localStorage.getItem('dashkitNavColor')) ? localStorage.getItem('dashkitNavColor') : 'default',
  sidebarSize: (localStorage.getItem('dashkitSidebarSize')) ? localStorage.getItem('dashkitSidebarSize') : 'base'
}

const sidebarSizeCollapse = new Collapse(sidebarSizeContainer);

function togglePopover() {
  if (popover) {
    const showPopover = JSON.parse(config.showPopover) && config.sidebarSize === 'base';
    const demoPopover = new Popover(popover, {
      boundary: 'viewport',
      container: 'body',
      offset: '50px',
      placement: 'top',
      template: `
        <div class="popover popover-lg popover-dark d-none d-md-block" role="tooltip">
          <div class="popover-arrow"></div>
          <h3 class="popover-header"></h3>
          <div class="popover-body"></div>
        </div>`,
       trigger: 'manual'
    });

    // Show popover on load
    if (showPopover) {
      demoPopover.show();
    }

    // Hide popover on click
    popover.addEventListener('click', function() {
      if (showPopover) {
        demoPopover.hide();
      }

      localStorage.setItem('dashkitShowPopover', false);
    });
  }
}

function parseUrl() {
  const search = window.location.search.substring(1);
  const params = search.split('&');

  for (let i = 0; i < params.length; i++) {
    const arr = params[i].split('=');
    const prop = arr[0];
    const val = arr[1];

    if (prop == 'colorScheme' || prop == 'navPosition' || prop == 'navColor' || prop == 'sidebarSize') {

      // Save to localStorage
      localStorage.setItem('dashkit' + prop.charAt(0).toUpperCase() + prop.slice(1), val);

      // Update local variables
      config[prop] = val;
    }
  }
}

function toggleColorScheme(colorScheme) {
  if (colorScheme == 'light') {
    stylesheetLight.disabled = false;
    stylesheetDark.disabled = true;

    colorScheme = 'light';
  } else if (colorScheme == 'dark') {
    stylesheetLight.disabled = true;
    stylesheetDark.disabled = false;

    colorScheme = 'dark';
  }
}

function toggleNavPosition(navPosition) {
  if (topnav && topbar && sidebar && sidebarSmall && sidebarUser && sidebarUserSmall) {
    if (navPosition == 'topnav') {
      hideNode(topbar);
      hideNode(sidebar);
      hideNode(sidebarSmall);

      for (let i = 0; i < containers.length; i++) {
        containers[i].classList.remove('container-fluid');
        containers[i].classList.add('container');
      }
    } else if (navPosition == 'combo') {
      hideNode(topnav);
      hideNode(sidebarUser);
      hideNode(sidebarUserSmall);

      for (let i = 0; i < containers.length; i++) {
        containers[i].classList.remove('container');
        containers[i].classList.add('container-fluid');
      }
    } else if (navPosition == 'sidenav') {
      hideNode(topnav);
      hideNode(topbar);

      for (let i = 0; i < containers.length; i++) {
        containers[i].classList.remove('container');
        containers[i].classList.add('container-fluid');
      }
    }
  }
}

function toggleNavColor(navColor) {
  if (sidebar && sidebarSmall && topnav) {
    if (navColor == 'default') {

      // Sidebar
      sidebar.classList.add('navbar-light');

      // Sidebar small
      sidebarSmall.classList.add('navbar-light');

      // Topnav
      topnav.classList.add('navbar-light');

    } else if (navColor == 'inverted') {

      // Sidebar
      sidebar.classList.add('navbar-dark');

      // Sidebar small
      sidebarSmall.classList.add('navbar-dark');

      // Topnav
      topnav.classList.add('navbar-dark');

    } else if (navColor == 'vibrant') {

      // Sidebar
      sidebar.classList.add('navbar-dark', 'navbar-vibrant');

      // Sidebar small
      sidebarSmall.classList.add('navbar-dark', 'navbar-vibrant');

      // Sidebar small
      topnav.classList.add('navbar-dark', 'navbar-vibrant');
    }
  }
}

function toggleSidebarSize(sidebarSize) {
  if (sidebarSize == 'base') {
    hideNode(sidebarSmall);
  } else if (sidebarSize == 'small') {
    hideNode(sidebar);
  }
}

function toggleFormControls(form, colorScheme, navPosition, navColor, sidebarSize) {
  form.querySelector('[name="colorScheme"][value="' + colorScheme + '"]').checked = true;
  form.querySelector('[name="navPosition"][value="' + navPosition + '"]').checked = true;
  form.querySelector('[name="navColor"][value="' + navColor + '"]').checked = true;
  form.querySelector('[name="sidebarSize"][value="' + sidebarSize + '"]').checked = true;
}

function toggleSidebarSizeContainer(navPosition) {
  if (navPosition == 'topnav') {
    sidebarSizeCollapse.hide();
  } else {
    sidebarSizeCollapse.show();
  }
}

function submitForm(form) {
  const colorScheme = form.querySelector('[name="colorScheme"]:checked').value;
  const navPosition = form.querySelector('[name="navPosition"]:checked').value;
  const navColor = form.querySelector('[name="navColor"]:checked').value;
  const sidebarSize = form.querySelector('[name="sidebarSize"]:checked').value;

  // Save data to localStorage
  localStorage.setItem('dashkitColorScheme', colorScheme);
  localStorage.setItem('dashkitNavPosition', navPosition);
  localStorage.setItem('dashkitNavColor', navColor);
  localStorage.setItem('dashkitSidebarSize', sidebarSize);

  // Reload page
  window.location = window.location.pathname;
}

function hideNode(node) {
  node && node.setAttribute('style', 'display: none !important');
}

//
// Events
//

// Toggle popover
togglePopover();

// Parse url
parseUrl();

// Toggle color scheme
toggleColorScheme(config.colorScheme);

// Toggle nav position
toggleNavPosition(config.navPosition);

// Toggle sidebar color
toggleNavColor(config.navColor);

// Toggle sidebar size
toggleSidebarSize(config.sidebarSize);

// Toggle form controls
toggleFormControls(form, config.colorScheme, config.navPosition, config.navColor, config.sidebarSize);

// Toggle sidebarSize container
toggleSidebarSizeContainer(config.navPosition);

// Enable body
document.body.style.display = 'block';

if (form) {

  // Form submitted
  form.addEventListener('submit', function(e) {
    e.preventDefault();

    submitForm(form);
  });

  // Nav position changed
  navPositionToggle.forEach(function(toggle) {
    toggle.parentElement.addEventListener('click', function() {
      const navPosition = toggle.value;

      toggleSidebarSizeContainer(navPosition);
    });
  });
}
