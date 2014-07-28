<?php
session_start();

$_SESSION['user_id'] = 1; // TODO: Should be GETed after login.

?>

<!DOCTYPE html>
<html ng-app="testJSON">
<head>
	<title>Angular & PHP & MySQL</title>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-beta.13/angular.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
	<script src="app.js"></script>
</head>
<body ng-controller="getData" class="container">
	
	<div class="row">

		<header>
			<h1>Your Color OnDemand Boards</h1>
		</header>

		<p ng-if="errorMessage">Oops! There was a problem retrieving your data.</p>

		<div  ng-repeat="board in boards" style="display: inline-block; padding: 1em; width: 256px; margin: 1em; background-color: #f2f2f2; border: 1px solid #ccc; box-shadow: 2px 2px 5px 0px #ccc;">
			<h3>{{ board.name }}</h3>
			<i>Created: {{ board.dateCreated }}</i><br />
			<a href="" ng-hide="showDescription" ng-click="showDescription = !showDescription">Show Description &darr;</a>
			<a href="" ng-hide="!showDescription" ng-click="showDescription = !showDescription">Hide Description &uarr;</a>
			<p ng-show="showDescription">{{ board.description }}</p>
			<p style="vertical-align: sub">{{ board.boardId }}</p>
		</div>

	</div>

	<div ng-if="showSave === true" style="padding: 1em; position: fixed; top: 50%; left: 25%; width: 50%; max-height: 512px; margin-top: -256px; background-color: #fff; border: 1px solid #ccc; box-shadow: 2px 2px 5px 0px #ccc;">
		
		<div style="display: inline-block; vertical-align: top; width: 50%">
			<form ng-submit="addTask(board)" id="add-board-form" novalidate>
				<fieldset>
					<legend>Board Info:</legend>
					<input ng-model="board.name" type="text" placeholder="Board Name" style="display: block; width: 100%; margin-bottom: 1em;"/>
					<textarea ng-model="board.description" placeholder="Board Description" style="display: block; width: 100%; height: 128px;"></textarea>
				</fieldset>
			</form>
		</div>

		<div style="display: inline-block; vertical-align: top; width: 45%;">
			<div style="margin: 1em; border: 1px solid #ccc; min-height: 256px; padding: 1em;">
				<h3 style="text-align: center;">{{ board.name }}</h3>
				<p style="text-align: center">{{ board.description }}</p>
			</div>
		</div>

		<div style="margin-top: 1em;">
			<button ng-if="showSave === true" type="submit" form="add-board-form" class="btn btn-success">Save</button>
			<button ng-if="showSave === true" ng-click="cancel()" class="btn btn-default">Cancel</button>
		</div>

	</div>

	<button ng-hide="showSave === true" ng-click="showSave = true" class="btn btn-primary">Add</button>

</body>
</html>