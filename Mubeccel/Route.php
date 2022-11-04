<?php

Mubeccel::get("/", "home", "index");

Mubeccel::get("/home/index", "home", "index");

Mubeccel::get("/contact", "home", "contact");

Mubeccel::get("/about", "home", "about");

Mubeccel::get("/doc", "wiki", "index");

Mubeccel::get("/doc/([0-9]+)", "wiki", "doc");

Mubeccel::get("/download", "home", "download");

?>