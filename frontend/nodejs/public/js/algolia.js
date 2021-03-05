/* global instantsearch algoliasearch */

const search = instantsearch({
    indexName: 'instant_search',
    searchClient: algoliasearch('latency', '6be0576ff61c053d5f9a3225e2a90f76'),
});

search.addWidget(
    instantsearch.widgets.searchBox({
        container: '#searchbox',
        placeholder: 'Search for products',
    })
);

/******** Clear refinements Start ******/
// 1. Create a render function
const renderClearRefinements = (renderOptions, isFirstRender) => {
    const { hasRefinements, refine } = renderOptions;
    document.querySelector('#clear-refinements').innerHTML = `
    <button ${!hasRefinements ? 'disabled' : ''} id="clear-result" class="btn btn-primary">Clear refinements</button>`;
    const button = document.querySelector('#clear-result');
    button.addEventListener('click', () => {
        refine();
    });
};
const customClearRefinements = instantsearch.connectors.connectClearRefinements(
    renderClearRefinements
);
search.addWidgets([
    customClearRefinements({
        container: document.querySelector('#clear-refinements'),
    })
]);

/******** Clear refinements End ******/

search.addWidget(
    instantsearch.widgets.refinementList({
        container: '#brand-list',
        attribute: 'brand',
    })
);

search.addWidget(
    instantsearch.widgets.ratingMenu({
        container: '#rating-menu',
        attribute: 'rating',
    })
);

search.addWidget(
    instantsearch.widgets.stats({
        container: '#stats',
    })
);

search.addWidget(
    instantsearch.widgets.poweredBy({
        container: '#powered-by',
    })
);

search.addWidget(
    instantsearch.widgets.toggleRefinement({
        container: '#toggle-refinement',
        attribute: 'free_shipping',
        templates: {
            labelText: 'Free shipping',
        },
    })
);

search.addWidget(
    instantsearch.widgets.sortBy({
        container: '#sort-by',
        cssClasses: {
            root: 'iq-algolia-sort'
        },
        items: [
            { label: 'Featured', value: 'instant_search' },
            { label: 'Price (asc)', value: 'instant_search_price_asc' },
            { label: 'Price (desc)', value: 'instant_search_price_desc' },
        ],
    })
);

search.addWidget(
    instantsearch.widgets.numericMenu({
        container: '#numeric-menu',
        attribute: 'price',
        items: [
            { label: 'All' },
            { label: 'Less than 500$', end: 500 },
            { label: 'Between 500$ - 1000$', start: 500, end: 1000 },
            { label: 'More than 1000$', start: 1000 },
        ],
    })
);

/************ Create Product Item Custom Widget Start *************/
const renderHits = (renderOptions, isFirstRender) => {
    const { hits, widgetParams } = renderOptions;

    widgetParams.container.innerHTML = `
<div class="ais-Hits iq-product">
    <ul class="ais-Hits-list iq-product-list">
      ${hits
        .map(
            (item, index) =>
                `<li key="${index}" class="ais-Hits-item iq-product-item iq-card">
                  <div class="text-center">
                  <a href="">
                      <div class="h-56 d-flex align-items-center justify-content-center bg-white iq-border-radius-15">
                        <img src="${item.image}" align="left" alt="${instantsearch.highlight({ attribute: 'image', hit: item })}" />
                      </div>
                  </a>
                  <div class="card-body">
                      <div class="text-justify">
                        <a href="javascript:void(0)">${instantsearch.highlight({ attribute: 'name', hit: item }).substring(0,20)}</a>
                        <p class="font-size-12 mb-0">${instantsearch.highlight({ attribute: 'description', hit: item }).substring(0,40)}</p>
                        <div class="ratting">
                            <ul class="ratting-item d-flex p-0 m-0">
                                <li class="full"><i class="ri-star-fill"></i></li>
                                <li class="full"><i class="ri-star-fill"></i></li>
                                <li class="full"><i class="ri-star-fill"></i></li>
                                <li class="full"><i class="ri-star-fill"></i></li>
                                <li class="full"><i class="ri-star-line"></i></li>
                            </ul>
                        </div>
                      </div>
                      <div class="iq-product-action my-2">
                          <button type="button" class="btn btn-primary iq-waves-effect text-uppercase btn-sm addToCart" id="${item.objectID}">
                            <i class="fas fa-cart-plus mr-0"></i>
                          </button>
                          <button type="button" class="btn btn-primary iq-waves-effect text-uppercase btn-sm addToWish" id="${item.objectID}">
                            <i class="far fa-heart mr-0"></i>
                          </button>
                          <p class="font-size-16 font-weight-bold float-right">${item.price}</p>
                      </div>
                  </div>
                </div>
            </li>`
        )
        .join('')}
    </ul>
    </div>
  `;
    $(document).on('click','.addToCart',function (e) {
        let id = $(this).attr('id')
        let item = hits.find(product => id === product.objectID)
        addToCart(item)
    })

    $(document).on('click','.addToWish',function (e) {
        let id = $(this).attr('id')
        let item = hits.find(product => id === product.objectID)
        addToWish(item)
    })
};
const customHits = instantsearch.connectors.connectHits(renderHits);
search.addWidgets([
    customHits({
        container: document.querySelector('#hits')
    })
]);
/************ Create Product Item Custom Widget End *************/

search.addWidget(
    instantsearch.widgets.pagination({
        container: '#pagination',
    })
);

search.start();
