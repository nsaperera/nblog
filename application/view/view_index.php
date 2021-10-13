<?php //include("config.php") ?>

<html>
    <head>
    <title>My Blogs</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel='stylesheet' href='css/ncss.css' />

    <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->
    <!--<link rel="stylesheet" href="css/mystyle.css">-->

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/myjs.js"></script>
    
    </head>
<body onload="showClock()">

<?php include 'menu-data.php';//echo print_r($_SESSION);?>

<h1>All Blogs</h1>

<?php
    foreach ($data["blogs"] as $blogs):
?>

<div class="post-container"> 
    <table border=0 width="100%">
        <tr>
            <td style="vertical-align:top" width="550">
                <div class="post-thumb"><img width="550" src="<?php echo $blogs->blog_image?>" /></div>
            </td>
            <td style="vertical-align:top">
                <div width="100%">
                    <br>
                        <table border=0 width="100%">
                            <tr>
                                <td class="post-title" style="vertical-align: bottom;"><?php echo $blogs->blog_header;?></td>
                                
                                <?php
                                    if(isset($_SESSION["userid"])){
                                        if($blogs->blog_usdid==$_SESSION["userid"] || $_SESSION["useradmin"]=="admin"){
                                            echo "<td width=\"5%\"  style=\"vertical-align:top\">
                                                    <input class=\"button_sm button2\" onClick=\"window.location.replace('createblog.php?blogid=".$blogs->blog_id."')\" type=\"button\" value=\"Edit\">        
                                                    </td>";
                                            echo "<td width=\"5%\"  style=\"vertical-align:top\">
                                            <input class=\"button_sm button3\" onClick=\"window.location.replace('index.php?deleteid=".$blogs->blog_id."')\" type=\"button\" value=\"Delete\">
                                                </td>";
                                           
                                        }
                                    }
                                ?>
                                
                            </tr>
                        </table>
                    
                    <p><?php echo $blogs->blog_des?></p>
                </div>
                <hr>
                <div class="post-user">
                    <b><?php echo $blogs->blog_usdfnam." ".$blogs->blog_usdlnam?></b>
                    &nbsp;&nbsp;<?php echo $blogs->blog_createddt?>
                </div>
                <div>Category 1</div>
                <br>
                <?php echo $blogs->blog_views?> viwes &nbsp;&nbsp;&nbsp; <?php echo $blogs->blog_totcom?> comments
                <br><br>
                <u>Comments:</u> <a href="javascript:popupComment(<?php echo $blogs->blog_id?>)">Add New</a>
                <table id="tblCom_<?php echo $blogs->blog_id?>">
                    <tr>
                        <td>
                        <?php
                            foreach ($blogs->blog_comment as $comm):
                        ?>
                            <tr>
                                <td>
                                    <div class="post-user">
                                    <b><?php echo $comm->usdfnam?></b>
                                        &nbsp;&nbsp;<?php echo $comm->ddt?> >> 
                                        <?php echo $comm->des?> &nbsp;&nbsp;
                                        <?php
                                            if(isset($_SESSION["userid"])){
                                                if($comm->usdid==$_SESSION["userid"] || $_SESSION["useradmin"]=="admin"){
                                                    echo "<input type=\"button\" onclick=\"delComment(".$comm->comid.",this)\" value=\"Delete\"> ";
                                                    //echo "<input type=\"button\" onclick=\"ediComment(".$comm->comid.",this)\" value=\"Edit\"> ";
                                                }
                                            }
                                        ?>        
                                                            
                                    </div>
                                </td>
                            </tr>
                            <?php
                                endforeach
                            ?>
                        </td>
                    </tr>
                </table>
            </td>
            <td width="20">&nbsp;</td>
        </tr>
    </table>
    
    
    
</div>
<br>
<?php
    endforeach
?>
</body>
</html>
<?php
      if(isset($_SESSION["msg_error"])){
        echo "<script>alert('Invalid Username or Password')</script>";
        //session_unset($_SESSION["msg_error"]);
        unset ($_SESSION["msg_error"]);
      }
    ?>