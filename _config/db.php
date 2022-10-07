<?php
use src\classes\DatabaseConnect;
global $db;
//connction and handling connection errors
$instance = DatabaseConnect::getInstance();
$db = $instance->getConnection();