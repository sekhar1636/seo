var containerEl = document.querySelector('.container');

var mixer = mixitup(containerEl, {
	load: {
        sort: 'last-name:asc',
    },
	multifilter: {
	    enable: true
	},
    pagination: {
        limit: 40
    }
});