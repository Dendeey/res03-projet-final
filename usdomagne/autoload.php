<?php

// Appeler les models

require './models/User.php';
require './models/Player.php';
require './models/Referee.php';
require './models/Office.php';
require './models/Staff.php';
require './models/Media.php';
require './models/Post.php';
require './models/RandomStringGenerator.php';
require './models/Uploader.php';


// Appeler les managers

require './managers/AbstractManager.php';
require './managers/UserManager.php';
require './managers/PlayerManager.php';
require './managers/RefereeManager.php';
require './managers/MediaManager.php';
require './managers/OfficeManager.php';
require './managers/StaffManager.php';
require './managers/PostManager.php';

// Appeler les controllers

require './controllers/AbstractController.php';
require './controllers/PageController.php';
require './controllers/UserController.php';
require './controllers/PlayerController.php';
require './controllers/RefereeController.php';
require './controllers/MediaController.php';
require './controllers/OfficeController.php';
require './controllers/StaffController.php';
require './controllers/PostController.php';

// Appeler le router

require "./services/Router.php";




?>