var mantaApp = angular.module('mantaApp', []);
mantaApp.controller('mantaController', function($scope, $http){
	// $scope.message = "hello World";
	$scope.upVote = function(element){
		// console.log('Clicked on upvote');
		// console.log('element');
		$http.post('../vote_process.php', {
			voteDirection:1,
			idOfPost: element.target.parentElement.id
		}).then(function successCallback(response){
			console.log(response.data);
			// console.log(element.target.parentElement.id);
			// console.log(voteDirection);
		}, function errorCallback(response){
			console.log(response);
		});
	};
});