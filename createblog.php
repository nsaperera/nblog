<?php

    include_once("application/controller/BlogController.php");
    $controller = new BlogController();
    $controller->invoke("newblog");
	
?>