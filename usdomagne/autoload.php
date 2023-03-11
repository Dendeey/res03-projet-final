<?php

// Appeler les abstracts

require './controllers/AbstractController.php';
require './managers/AbstractManager.php';


// Appeler les controllers

require './controllers/PageController.php';
require './controllers/UserController.php';


// Appeler les managers

require './managers/UserManager.php';


// Appeler les models

require './models/User.php';


// Appeler le router

require "./services/Router.php";




?>