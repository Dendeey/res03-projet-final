<?php

// Appeler les models

require './models/User.php';

// Appeler les managers

require './managers/AbstractManager.php';
require './managers/UserManager.php';

// Appeler les controllers

require './controllers/AbstractController.php';
require './controllers/PageController.php';
require './controllers/UserController.php';

// Appeler le router

require "./services/Router.php";




?>