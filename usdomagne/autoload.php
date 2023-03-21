<?php

// Appeler les models

require './models/User.php';
require './models/Player.php';
require './models/Media.php';
require './models/Referee.php';
require './models/MediaUpload.php';
require './models/RandomStringGenerator.php';
require './models/Uploader.php';


// Appeler les managers

require './managers/AbstractManager.php';
require './managers/UserManager.php';
require './managers/PlayerManager.php';
require './managers/RefereeManager.php';
require './managers/MediaManager.php';

// Appeler les controllers

require './controllers/AbstractController.php';
require './controllers/PageController.php';
require './controllers/UserController.php';
require './controllers/PlayerController.php';
require './controllers/RefereeController.php';
require './controllers/MediaController.php';

// Appeler le router

require "./services/Router.php";




?>