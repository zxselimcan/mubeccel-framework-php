<?php

class Mubeccel {
    public $RequestUrl;
    public $RequestMethod = DEFAULT_METHOD;
    public $Controller = DEFAULT_CONTROLLER;
    public $Action = DEFAULT_ACTION;
    public $Param = DEFAULT_PARAM;
    public static $routes;
    public static $route_method;
    public static $activeController;
    
    public function __construct($req_uri,$req_method){
        $this->checkDebug();
        $this->RequestUrl = $this->clearRequest($req_uri);
        $this->RequestMethod = $this->setRequestMethod($req_method);
        list( $this->Controller, $this->Action, $this->Param) = $this->parseUrl();
        $this->route();
        $this->start();
    }

    public function checkDebug(){
        if( DEBUG_MODE == FALSE){
            error_reporting(0);
            ini_set('display_errors', 0);
        }
        elseif( DEBUG_MODE == TRUE )
        {
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
        }
    }

    public static function get($url, $controller, $action ){
        if( $_SERVER['REQUEST_METHOD'] == "GET"){
            self::$routes[] = [$url, $controller, $action ];
        }
    }

    public static function post($url, $controller, $action ){
        if( $_SERVER['REQUEST_METHOD'] == "POST"){
            self::$routes[] = [$url, $controller, $action ];
        }
    }

    public function clearRequest($req_uri){
        return  preg_replace("/[^a-zA-Z0-9\/-]/", "", $req_uri);
    }

    public function setRequestMethod($req_method){
        $method = ( in_array($req_method, ALLOWED_METHODS) ) ? $req_method : DEFAULT_METHOD;
        return $method;
    }

    public static function notFound( $object ){
        echo "<center><h1>" . $object . " Not Found !</h1></center>";
        http_response_code(404);
        die();
    }

    public static function error( $message ){
        echo "<center><h1>" . $message . " !</h1></center>";
        http_response_code(404);
        die();
    }

    public function parseUrl(){
        if( $this->RequestUrl == "/"){
            return [ DEFAULT_CONTROLLER, DEFAULT_ACTION, DEFAULT_PARAM ];
        }
        else{
            $reqUrl = explode("/", $this->RequestUrl);
            array_shift($reqUrl);
            $reqArrayLength = count($reqUrl);
            $controllerPath = APPS_PATH . $reqUrl[0] . "/".$reqUrl[0]."Controller.php";
            
            if( $reqArrayLength == 1){
                if (file_exists($controllerPath)) {
                    include_once $controllerPath;
                    if( method_exists($reqUrl[0] . "Controller", DEFAULT_ACTION ) ){
                        return [ $reqUrl[0], DEFAULT_ACTION, DEFAULT_PARAM ];
                    }
                    else{
                        return [ DEFAULT_CONTROLLER, DEFAULT_ACTION, DEFAULT_PARAM ];
                    }
                }
                else{
                    return [ DEFAULT_CONTROLLER, DEFAULT_ACTION, DEFAULT_PARAM ];
                }
            }
            elseif( $reqArrayLength == 2 ){
                $reqUrl[1] = ( $reqUrl[1] == "" ) ? DEFAULT_ACTION : $reqUrl[1]; 
                if( file_exists($controllerPath) ){
                    include_once $controllerPath;
                    if( method_exists($reqUrl[0] . "Controller", $reqUrl[1] ) ){
                        return [ $reqUrl[0], $reqUrl[1], DEFAULT_PARAM];
                    }
                    elseif( method_exists($reqUrl[0] . "Controller", DEFAULT_ACTION ) ) {
                        return [ $reqUrl[0], DEFAULT_ACTION, $reqUrl[1] ];
                    }
                    else {
                        return [ DEFAULT_CONTROLLER, DEFAULT_ACTION, DEFAULT_PARAM ];
                    }
                }
                else{
                    $controllerPath = APPS_PATH . DEFAULT_CONTROLLER . "/".DEFAULT_CONTROLLER."Controller.php";
                    if( file_exists($controllerPath) ){
                        include_once $controllerPath; 
                        return [ DEFAULT_CONTROLLER, $reqUrl[0], $reqUrl[1]];
                    }
                    else{
                        return [ DEFAULT_CONTROLLER, DEFAULT_ACTION, DEFAULT_PARAM ];
                    }
                }
            }
            elseif( $reqArrayLength == 3){
                $controllerPath = APPS_PATH . $reqUrl[0] . "/".$reqUrl[0]."Controller.php";
                if( file_exists($controllerPath) ){
                    include_once $controllerPath;
                    if( method_exists($reqUrl[0] . "Controller", $reqUrl[1] ) ){
                        return [ $reqUrl[0], $reqUrl[1], $reqUrl[2]];
                    }
                    else{
                        return [ DEFAULT_CONTROLLER, DEFAULT_ACTION, DEFAULT_PARAM ];
                    }
                }
                else{
                    return [ DEFAULT_CONTROLLER, DEFAULT_ACTION, DEFAULT_PARAM ];
                }
            }
            elseif( $reqArrayLength > 3){
                self::error("Critical Error");
            }
        }
    }

    public function route(){
        foreach(self::$routes as $route){
            if( preg_match( "~^" . $route[0] . "$~", $this->RequestUrl) ){
                $this->Controller   = $route[1];
                $this->Action       = $route[2];
                return;
            }
        }
    }

    public function start(){
        $controllerPath = APPS_PATH . $this->Controller . "/" . $this->Controller . "Controller.php";
        if(file_exists($controllerPath)){
            require_once $controllerPath;
            $this->Controller .= "Controller";
            $controller = new $this->Controller;
            if(method_exists($controller, $this->Action)){
                self::$activeController = $controller;
                return call_user_func([$controller, $this->Action], $this->Param);
            }
            else{
                self::notFound("Action");
            }
        }
        else{
            self::notFound("Controller");
        }
    }
}
?>