<?php
session_start();

use helpers\ValidateApi;
use models\JobModel;
use models\JsonParse;
use models\UserModel;
use router\Router;
use Twilio\Rest\Client;

include 'vendor/autoload.php';
include 'autoloader.php';

myAutoloder();
header('Content-Type: application/json');

/*
*
*   Created By: Cj Tañedo copyright 2022
*
*/







?>
