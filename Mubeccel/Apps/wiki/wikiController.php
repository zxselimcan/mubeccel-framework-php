<?php
class wikiController{

    public function index(){
        View::$content["name"] = htmlentities(" ");
        return View::load("main", "index");
    }


    public function doc($page){
        preg_match('!\d+!', $page, $match);
        $page = $match[0];

        View::$content['oncekiSayfa'] = ( $page > 1 ) 
        ? '<a href="/doc/'.(( (int) $page ) - 1).'">Önceki Sayfa</a>': "";
        View::$content['sonrakiSayfa'] = ($page < 5 ) 
        ? '<a href="/doc/'.(( (int) $page ) + 1).'">Sonraki Sayfa</a>': "";

        return View::load("post", $page);
    }
}
?>