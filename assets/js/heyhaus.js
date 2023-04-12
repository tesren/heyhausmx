const element = document.getElementById('regiones_s');

if(element){
    const choices = new Choices(element, {
        placeholder: true,
        placeholderValue: 'Escribe uno varios lugares',
        searchPlaceholderValue: null,
        prependValue: null,
        appendValue: null,
        renderSelectedChoices: 'auto',
        loadingText: 'Cargando...',
        noResultsText: 'No hay Resultados',
        noChoicesText: 'No hay mas lugares',
        itemSelectText: 'Press to select',
        uniqueItemText: 'Only unique values can be added',
        customAddItemText: 'Only values matching specific conditions can be added',
    
        classNames: {
          containerOuter: 'choices rounded-1',
          containerInner: 'choices__inner',
          input: 'choices__input',
          inputCloned: 'choices__input--cloned',
          list: 'choices__list',
          listItems: 'choices__list--multiple',
          listSingle: 'choices__list--single',
          listDropdown: 'choices__list--dropdown',
          item: 'choices__item',
          itemSelectable: 'choices__item--selectable',
          itemDisabled: 'choices__item--disabled',
          itemChoice: 'choices__item--choice',
          placeholder: 'choices__placeholder',
          group: 'choices__group',
          groupHeading: 'choices__heading',
          button: 'choices__button',
          activeState: 'is-active',
          focusState: 'is-focused',
          openState: 'is-open',
          disabledState: 'is-disabled',
          highlightedState: 'is-highlighted',
          selectedState: 'is-selected',
          flippedState: 'is-flipped',
          loadingState: 'is-loading',
          noResults: 'has-no-results',
          noChoices: 'has-no-choices'
        },
    
    });
}

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