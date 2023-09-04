<?php

$connection = require_once './connection.php';
$connection->addNote($_POST);

header('Location: index.php');
