<?php
class View extends DB{
    public static $view = "";
    public static $content = array();
    
    public static function load($layoutName,$viewName){
        $ech = serialize(Mubeccel::$activeController);
        $ech = explode("Controller" , explode(':"', $ech)[1])[0];
        $viewFile = APPS_PATH . $ech . "/views/{$viewName}.php";
        $layoutFile = LAYOUTS_PATH . "{$layoutName}.php";
        if(file_exists($layoutFile)){
            
            if(file_exists($viewFile)){
                self::$view = $viewFile;
                require_once $layoutFile;
            }
            else{
                Mubeccel::notFound("View");
            }

        }
        else{
            Mubeccel::notFound("Layout");
        }
    }
    public static function render(){
        require_once self::$view;
        return;
    }
}
?>