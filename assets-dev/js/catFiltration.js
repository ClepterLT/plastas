'use strict'

function redirectToCat(e) {
  const slug = e.target.value;

  if(slug === 'all') {
    location.href = `/products`;
  } else {
    location.href = `/products_categories/${slug}`;
  }
  
}

function filterByCatInit() {
 const catDropdown = document.querySelector('#product-cats');

 if(catDropdown) {
  catDropdown.addEventListener('change', redirectToCat);
 }
}

export default filterByCatInit;