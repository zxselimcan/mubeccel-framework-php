<?php
class homeController
{
    public function index()
    {
        return View::load("main", "index");
    }

    public function about(){
        return View::load("post", "about");
    }


}
?>