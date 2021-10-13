<?php

    include_once("application/controller/IndexController.php");
    $controller = new IndexController();
    $controller->invoke("home");
	
?>