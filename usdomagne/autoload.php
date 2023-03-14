<?php

// Appeler les models

require './models/User.php';
require './models/Player.php';

// Appeler les managers

require './managers/AbstractManager.php';
require './managers/UserManager.php';
require './managers/PlayerManager.php';

// Appeler les controllers

require './controllers/AbstractController.php';
require './controllers/PageController.php';
require './controllers/UserController.php';
require './controllers/PlayerController.php';

// Appeler le router

require "./services/Router.php";




?>