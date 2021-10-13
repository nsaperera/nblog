<?php 
include("config.php");
session_start();
?>
<?php
//include_once("application/model/blogs.php");
include_once("application/model/usdmast.php");

class UserManageController
{
    public $action;
    public $view;
    
    public function invoke($view)
    {

        if(!isset($_SESSION["useradmin"]) || $_SESSION["useradmin"]!="admin") {
            $_SESSION["msg_error"] = "You are not an Admin";
            header("Location: index.php");
            exit();
        }
        
        if(isset($_GET["option"]) && $_GET["option"]=="DelUserId"){
            $obj = new usdmast();
            $obj->usd_id = $_GET["id"];
            $obj->delUser();
            echo "OK";
            exit();
        }
        
        $obj = new usdmast();
        $data["users"] = $obj->getUsers();
        
        switch ($this->view) {
            default:

			case "usrmng":
                include 'application/view/view_usermanage.php';
                break;
        }
    }
}