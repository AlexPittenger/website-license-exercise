<?php

if (!isset($_SESSION['userID'])){
    $action='LoginForm';
    $params = array();
}else{    
    $queryString = $_SERVER['QUERY_STRING'];

    $params = array();
    $parsedQueryString = explode('&', $queryString);

    if ($queryString){

        foreach($parsedQueryString AS $parameter){
            list($variable, $value) = explode('=', $parameter);
            $params[$variable] = $value;
        }

        $action = $params['action'];
    }else{
        $action = 'Main';
    }
    
    $db = getDB();
    
}


$controllerClassName = $action;

$controllerFile = "Controller/$className.php";

if (file_exists($controllerFile)) {

    require_once($controllerFile);   
    
    $controller = new $className;
    $controller->main($params);
} else {
    die("The page was not found.");
}

