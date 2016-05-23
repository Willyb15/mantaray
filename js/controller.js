var mantaApp = angular.module('mantaApp', []);
mantaApp.controller('mantaController', function($scope, $http) {

        $scope.follow = function(username, followMethod){

        $http.post('follow_process.php', {
            poster: username,
            followMethod: followMethod
        }).then(function successCallback(response){
            console.log(response.data);
        }, function errorCallback(response){
            console.log(response);
        });     

    };


    // new funcion where we process UP and DOWN at once
    $scope.processVote = function(element, vote) {
        // console.log("Clicked on upvote");
        // console.dir(element.target.parentElement.children[0].innerHTML="clicked");

        console.log(vote);
        $http.post('vote_process.php', {
            voteDirection: vote,
            idOfPost: element.target.parentElement.id
        }).then(function successCallback(response) {
            // console.dir(element.target.nextElementSibling.innerHTML);
            if (vote == 1) {
                if (response.data == 'notLoggedIn') {
                   element.target.parentElement.children[0].innerHTML = "Login to Vote!";
                    // document.getElementsByClassName("login-to-vote").innerHTML = "Login To Vote";
                } else {
                    element.target.nextElementSibling.innerHTML = response.data;
                }
            } else if (vote == -1) {
                if (response.data == 'notLoggedIn') {
                     element.target.parentElement.children[0].innerHTML= "Login to Vote!";
                } else {
                    element.target.previousElementSibling.innerHTML = response.data;
                }
            }


        }, function errorCallback(response) {
            console.log(response);
        });
    };
});