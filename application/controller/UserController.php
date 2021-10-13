<?php 
include("config.php");
session_start();
?>
<?php
//include_once("application/model/blogs.php");
include_once("application/model/usdmast.php");

class UserController
{
    public $action;
    public $view;

    
    public function invoke($view)
    {
        if(isset($_POST["userSubmit"])){
            $usd = new usdmast();
            $usd->usdnam = $_POST["usdnam"];
            $usd->usdfnam = $_POST["usdfnam"];
            $usd->usdlnam = $_POST["usdlnam"];
            $usd->usdemail = $_POST["usdemail"];
            $usd->usdpsw = $_POST["password1"];
            $_SESSION["msg_error"] = $usd->saveUser();
            $this->view="usrreg";
        }

        switch ($this->view) {
            default:

			case "usrreg":
                include 'application/view/view_userregistration.php';
                break;
        }

    }

}
