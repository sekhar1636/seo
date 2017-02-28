var containerEl = document.querySelector('.container');

var mixer = mixitup(containerEl, {
    animation: {
        effects: 'fade scale stagger(50ms)' // Set a 'stagger' effect for the loading animation
    },
    load: {
        sort: 'age:desc name:asc',
    }
});  