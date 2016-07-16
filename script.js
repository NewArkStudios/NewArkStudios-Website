	// create the module and name it App
	var App = angular.module('App', ['ngRoute']);

	// configure our routes
	App.config(function($routeProvider,$locationProvider) {
		$routeProvider

			// route for the home page
			.when('/', {
				templateUrl : 'pages/home.html',
				controller  : 'mainController'
			})

			// route for the about page
			.when('/team', {
				templateUrl : 'pages/team.html',
				controller  : 'teamController'
			})

            // route for the contact page
			.when('/games', {
				templateUrl : 'pages/games.html',
				controller  : 'gamesController'
			})

			// route for the contact page
			.when('/update', {
				templateUrl : 'pages/update.html',
				controller  : 'updateController'
			})

            // route for the home page
			.when('/forum', {
				templateUrl : 'pages/forum.html',
				controller  : 'forumController'
			})

            // route for the home page
			.when('/contact', {
				templateUrl : 'pages/contact.html',
				controller  : 'contactController'
			})

		// use the HTML5 History API , initalize url retrieval patterns
        // Normally used for clean urls without # but that causes problems
        //    $locationProvider.html5Mode(true);
	});


// Code for Controllers ***********************************************************


	// create the controller and inject Angular's $scope retrieve location
	App.controller('mainController', function($scope, $location) {
		// create a message to display in our view
		$scope.message = 'Everyone come and see how good I look!';
		$scope.isActive = function(viewLocation) {
		    return viewLocation === $location.path();
		};

	});

	App.controller('teamController', function($scope) {
		$scope.message = 'Look! I am an about page.';

	});

	App.controller('gamesController', function($scope) {
		$scope.message = 'Games Page controller test';
	});

    App.controller('updateController', function($scope) {
		$scope.message = 'Update Controller test';
	});

    App.controller('forumController', function($scope) {
		$scope.message = 'Forum controller test';
	});

    App.controller('contactController', function($scope) {
		$scope.message = 'Contact us! JK. This is just a demo.';
	});
   
