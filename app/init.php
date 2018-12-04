<?php 

session_start();
ob_start();
//Include classess files.
function loadClasses($className){
    require __DIR__ . "/classes/" . strtolower($className) . ".php";
}
spl_autoload_register('loadClasses');

$config = require __DIR__ . '/config.php';

//Database Connection
try {
    $db = new PDO('mysql:host='.$config['db']['host'] . ';dbname=' . $config['db']['name'],$config['db']['user'],$config['db']['pass']);
}   catch (PDOException $e) { 
    die($e->getMessage());
}

//Include helper
foreach (glob(__DIR__ ."/helper/*.php") as $helperFile ) {
    require $helperFile;    
}