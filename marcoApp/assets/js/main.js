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