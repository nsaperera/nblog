<?php

    include_once("application/controller/UserController.php");
    $controller = new UserController();
    $controller->invoke("usrreg");
	
?>