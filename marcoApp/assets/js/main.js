var containerEl = document.querySelector('.actorContainer');

var mixer = mixitup(containerEl, {
    controls: {
        toggleLogic: 'and'
    },
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

//https://www.kunkalabs.com/mixitup-multifilter/docs/get-started/
//https://github.com/patrickkunka/mixitup/issues/283