<?php 
include("config.php");
session_start();
?>
<?php
//include_once("application/model/blogs.php");
include_once("application/model/usdmast.php");
include_once("application/model/blogmast.php");

class IndexController
{
    public $action;
    public $view;
    public $obj;

    
    public function invoke($view)
    {
        //print_r($_POST);
        if(!isset($this->view)) $this->view = $view;
        if(isset($_POST["login"])){
            //print_r($_POST);
            $usd = new usdmast();
            $usd->usdnam = $_POST["username"];
            $usd->usdpsw = $_POST["password"];
            $usd->getLogin();
            $view = "home";
            header("Location: index.php");
            exit();
        }
        if(isset($_GET["deleteid"])){
            if(isset($_SESSION["userid"])){
                $obj = new blogmast();
                $obj->blog_id = $_GET["deleteid"];
                $obj->delBlog();
            }else $_SESSION["msg_error"] = "Error on Delete";

            $view = "home";
        }
        if(isset($_GET["saveComment"])){
            if(isset($_SESSION["userid"])){
                $obj = new blogmast();
                $obj->blog_id  = $_GET["saveComment"];
                $obj->blog_des = $_GET["comdes"];
                $msg = $obj->saveComment();
            }else $msg = "Login befor post a Comment";
            echo $msg;
            exit();
        }
        if(isset($_GET["delCommentid"])){
            if(isset($_SESSION["userid"])){
                $obj = new blogmast();
                $obj->blog_comid = $_GET["delCommentid"];
                $msg = $obj->delCommentbyID();
            }else $msg = "User Error on Delete";
            echo $msg;
            exit();
           // $view = "home";
        }

        if(isset($_GET["Logout"])) {
            // session_start();
             session_unset();
             session_destroy();
             //unset($_SESSION);
             //$this->$view = "home";
             header("Location: index.php");
             exit();
        }
        if(isset($_GET["search"])) $this->view="search";


        if($this->view=="home"){
            $obj = new blogmast();
            $seloption = "all";
            if(isset($_GET["userid"]) && isset($_SESSION["userid"])) $seloption = $_SESSION["userid"];
            $data["blogs"] = $obj->getBlogs($seloption);
        }
        if($this->view=="search"){
            $obj = new blogmast();
            $txtSearch = $_GET["search"];
            $data["blogs"] = $obj->getSearch($txtSearch);
        }
        
        switch ($this->view) {
            default:

			case "home":                
                include 'application/view/view_index.php';
                break;
        }



    }
}