<?php
  //$config_use_sessions = TRUE;  
  //session_start();

  //ini_set('session.cache_limiter','public');
 // session_cache_limiter(false);

?>
<script type="text/javascript" src="smartmenus/c_config.js"></script>
<script type="text/javascript" src="smartmenus/c_smartmenus.js"></script>
<script type="text/javascript" src="js/clock.js"></script>


<style>
.body {
	width:100%;
	margin:0px auto;
	padding:0px;
	#background:#fff;
	color:#000;
}

.mmTABLE {
	border-width: 0px 0px 1px 0px;
	border-spacing: 0px;	
	border-style: solid;
	border-color:#cccccc;
	
}

#footer {
   position:absolute;
   bottom:0;
   #width:100%;
   #height:60px;   /* Height of the footer */
   #background:#6cf;
}

#cent {
   position:50% 50%;
#   bottom:50%;
 #  top:50%;
   #width:100%;
   #height:60px;   /* Height of the footer */
   #background:#6cf;
}

</style>


<table width=90% class="mmTABLE" align="center">
<tr><td>
<!-- Sample menu definition -->
<ul id="Menu1" class="MM">
  <li><a href="index.php">All Blogs</a></li> 
  <li><a href="javascript://">User</a>

    <ul>      
    <li><a href="javascript:popupLogin()">Login</a></li> 
    <?php 
      if(!isset($_SESSION["userid"])) echo "<li><a href=\"userregistration.php\">Registration</a></li> ";
    ?>
    
    

    <?php 
      if(isset($_SESSION["userid"])) {
        echo "<li><a href=\"createblog.php\">Create Blog</a></li>";
        echo "<li><a href=\"index.php?userid=".$_SESSION["userid"]."\">My Blogs</a></li>";
      }
    ?>
    </ul>
  </li>

  <li><a href="javascript://">Admin</a>
    <ul>      
    <li><a href="javascript:popupLogin()">Login</a></li> 
    <?php 
      if(isset($_SESSION["useradmin"]) && $_SESSION["useradmin"]=="admin") {
        echo "<li><a href=\"usermanage.php\">User Management</a></li>";
        echo "<li><a href=\"userregistration.php\">Create User&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li> ";
      }
      ?>
    
    </ul>
  </li>
  
  <?php if(isset($_SESSION["userid"])) echo "<li class=\"NOSEPARATOR\"><a href=\"index.php?Logout\">Logout</a></li>"?>
  
</ul>
<!-- Please leave at least one new line or white space symbol after the closing </ul>
     tag of the root ul element of the menu tree. This will allow the browsers to init
     the menu tree as soon as it is loaded and not wait for the page load event. -->
<!-- =============================================================================== -->
<!-- ================= YOU DO NOT NEED ANYTHING BELOW THIS COMMENT ================= -->
<!-- =============================================================================== -->
</td>
<td><input type="text" class="ip2" id="search" name="search"/> <input type="button" class="button_sm button4" onclick="getSearch()" value="SEARCH"></td>
<?php
  $str = "";
  if(isset($_SESSION["useradmin"]) && $_SESSION["useradmin"]=="admin") $str="Admin:";
  if(isset($_SESSION["username"])) echo "<td align=\"right\"><font size=\"2\">Hi $str ".$_SESSION["username"]." 
                                                <a href=\"index.php?Logout\">Logout</a></font></td>";
  else echo "<td align=\"right\"><font size=\"2\"><a href=\"javascript://\" onclick=\"popupLogin()\">Login</a></font></td>";
?>
<!--<td align="right"><font size="2">Hi Nilanga</font></td>-->
<!--<td align="right"><font size="2"><a href="javascript://" onclick="popupLogin()">Login</a></font></td>-->
<td align="right" width="100"><font size="2"><div id="ClockShow"></div></font></td>
</tr></table>


<?php //echo print_r($_SESSION);?>


