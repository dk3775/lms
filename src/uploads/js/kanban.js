//
// kanban.js
// Dashkit module
//

import { Sortable } from '@shopify/draggable';

const categories = document.querySelectorAll('.kanban-category');
const links = document.querySelectorAll('.kanban-add-link');
const forms = document.querySelectorAll('.kanban-add-form');

function toggleItems(el) {
  const parent = el.closest('.kanban-add');
  const card = parent.querySelector('.card');
  const link = parent.querySelector('.kanban-add-link');
  const form = parent.querySelector('.kanban-add-form');

  link.classList.toggle('d-none');
  form.classList.toggle('d-none');

  if (card && card.classList.contains('card-sm')) {
    if (card.classList.contains('card-flush')) {
      card.classList.remove('card-flush');
    } else {
      card.classList.add('card-flush');
    }
  }
}

if (categories) {
  new Sortable(categories, {
    draggable: '.kanban-item',
    mirror: {
      constrainDimensions: true
    }
  });
}

links.forEach(link => {
  link.addEventListener('click', () => {
    toggleItems(link);
  });
});

forms.forEach(form => {
  form.addEventListener('reset', function() {
    toggleItems(form);
  });

  form.addEventListener('submit', function(e) {
    e.preventDefault();
  });
});

