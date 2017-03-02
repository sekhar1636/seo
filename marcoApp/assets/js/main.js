var containerEl = document.querySelector('.container');

var mixer = mixitup(containerEl, {
	load: {
        sort: 'age:desc name:asc',
    },
	multifilter: {
	    enable: true
	},
    pagination: {
        limit: 25
    }
});  