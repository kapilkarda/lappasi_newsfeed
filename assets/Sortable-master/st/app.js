(function () {
	'use strict';

	var byId = function (id) { return document.getElementById(id); },

	console = window.console;
	if (!console.log) {
		console.log = function () {
			alert([].join.apply(arguments, ' '));
		};
	}

	Sortable.create(byId('foo'), {
		group: "words",
		animation: 150,
		store: {
			get: function (sortable) {
				var order = localStorage.getItem(sortable.options.group);
				return order ? order.split('|') : [];
			},
			set: function (sortable) {
				var order = sortable.toArray();
				localStorage.setItem(sortable.options.group, order.join('|'));
			}
		},
		onAdd: function (evt){ console.log('onAdd.foo:', [evt.item, evt.from]); },
		onUpdate: function (evt){ console.log('onUpdate.foo:', [evt.item, evt.from]); },
		onRemove: function (evt){ console.log('onRemove.foo:', [evt.item, evt.from]); },
		onStart:function(evt){ console.log('onStart.foo:', [evt.item, evt.from]);},
		onSort:function(evt){ console.log('onStart.foo:', [evt.item, evt.from]);},
		onEnd: function(evt){ console.log('onEnd.foo:', [evt.item, evt.from]);}
	});
	
})();



