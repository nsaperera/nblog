<?php 
include("config.php");
session_start();
?>
<?php
//include_once("application/model/blogs.php");
include_once("application/model/blogmast.php");

class BlogController
{
    public $action;
    public $view;

    public function invoke($view)
    {
        //print_r($_POST);
        //print_r($_SESSION);
        if(isset($_POST["saveBlog"])){
            if(isset($_SESSION["userid"])){
                
                if(isset($_GET["blogid"])) $str = "?blogid=".$_GET["blogid"];
                
                if(isset($_FILES)) {
                    $check = getimagesize($_FILES["customFile"]["tmp_name"]);
                    if($check !== false)  $uploadOk = 1;
                    else {
                        
                        $_SESSION["msg_error"] = "Please upload Valid Image";
                        header("Location: createblog.php$str");
                        exit();
                    }
                }
                
                $blog = new blogmast();
                $blog->blog_usdid   = $_SESSION["userid"];
                $blog->blog_header  = str_replace("'","`",$_POST["blog_header"]);
                $blog->blog_des     = str_replace("'","`",$_POST["blog_des"]);
                $blog->blog_category = $_POST["blog_cat"];
                
                if(isset($_GET["blogid"])){
                     //$blog = new blogmast();
                     $blog->blog_id = $_GET["blogid"];
                     $id = $blog->editBlog();
                    
                }else {
                    $id = $blog->saveBlog();
                }
                //die($id);
                $this->file_Upload($id);

                header("Location: index.php");
                exit();

            }else $_SESSION["msg_error"] = "Please login befor Post a blog";


            $this->view="newblog";
        }

        

        switch ($this->view) {
            default:

			case "newblog":
                if(isset($_GET["blogid"]) && isset($_SESSION["userid"])){
                    $blog = new blogmast();
                    $blog->blog_id = $_GET["blogid"];
                    $blog->getBlogFromID();
                    //echo "*************".$blog->blog_des;
                }
                include 'application/view/view_createblog.php';
                break;
        }

    }
    function file_Upload($file_name){
        $name = $_FILES["customFile"]["name"];
        $tmp  = explode('.', $name);
        $ext  = end($tmp);
    
        //$ext = end((explode(".", $name))); # extra () to prevent notice
        //echo $ext;
    
        $target_dir = "uploads/";
        $target_file = $target_dir . $file_name.".jpg";
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
        /*
        if ($_FILES["customFile"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        */
    
        if (move_uploaded_file($_FILES["customFile"]["tmp_name"], $target_file)) {
            //echo "The file ". htmlspecialchars( basename( $_FILES["customFile"]["name"])). " has been uploaded.";
          } else {
            $_SESSION["msg_error"] = "Sorry, there was an error uploading your file.";
          }
    }

}