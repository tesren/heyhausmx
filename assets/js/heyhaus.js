let featuredListings = document.getElementById('featured-listings');

if(featuredListings){
  featuredListings= new Splide( '#featured-listings', {
    perPage: 3,
    loop: true,
    padding: '15px',
    pagination: false,
    breakpoints: {
      640: {
        perPage: 2,
      },
      480: {
        perPage: 1,
      },
    },
  } );
  
  featuredListings.mount();
}

let regionGallery = document.getElementById('region-gallery');

if(regionGallery){
  regionGallery= new Splide( '#region-gallery', {
    perPage: 2,
    loop: true,
    pagination: true,
    breakpoints: {
      480: {
        perPage: 1,
      },
    },
  } );
  
  regionGallery.mount();
}

var fourthListItem = document.querySelector('#menu-item-49 a');
fourthListItem.classList.remove('link-dark');
fourthListItem.classList.remove('nav-link');
fourthListItem.classList.add('btn');
fourthListItem.classList.add('btn-blue');
fourthListItem.parentElement.classList.add('align-self-center');

