var dirTema = document.querySelector("meta[name='theme_path']").getAttribute('content');

require.config({
	baseUrl: '/',
    urlArgs: "v=001",
    waitSeconds : 60,
	shim: {
		'jq_ui' : {
			deps : ['jquery'],
		},
		'bxSlider' : {
			deps : ['jquery'],
		},
		'elevateZoom' : {
			deps : ['jquery'],
		},
		"noty" : {
			deps : ['jquery'],
		},
		"easing" : {
			deps : ['jquery']
		},
		"fitvids" : {
			deps : ['jquery']
		},
		"bootstrap" : {
			deps : ['jquery']
		}
	},

	paths: {
		// LIBRARY
		jquery 			: dirTema+'/assets/js/lib/jquery.min',
		bxSlider		: dirTema+'/assets/js/lib/jquery.bxslider.min',
		elevateZoom		: dirTema+'/assets/js/lib/jquery.elevatezoom',
		bootstrap		: dirTema+'/assets/js/lib/bootstrap-collapse',
		easing			: dirTema+'/assets/js/plugins/jquery.easing.1.3',
		fitvids			: dirTema+'/assets/js/plugins/jquery.fitvids',

		// MAIN LIBRARY
		router          : 'js/router',
		cart			: 'js/shop_cart',
		jq_ui			: 'js/jquery-ui',
		noty			: 'js/jquery.noty',

		// CONTROLLER
		home            : dirTema+'/assets/js/pages/home',
		main            : dirTema+'/assets/js/pages/default',
		produk          : dirTema+'/assets/js/pages/produk',
	}
});
require([
	'router',
	'main',
	'cart'
], function(router,main,cart)
{
	// HOME
	router.define('/','home@run');
	router.define('home', 'home@run');

	// PRODUK
	router.define('produk/*', 'produk@run');
	
	router.run();
	main.run();
	cart.run();
});