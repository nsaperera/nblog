<html>
    <head>
    <title>My Blogs</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel='stylesheet' href='css/ncss.css' />
    <link rel="stylesheet" href="css/mystyle.css">

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/myjs.js"></script>
    
    </head>
<body onload="showClock()">

<?php include 'menu-data.php';//echo print_r($_SESSION);?>
<?php //print_r($_SESSION)?>
<h1>All Users</h1>


<table id='lintbl' border='5' width='100%' align='center' cellpadding='5' cellspacing='0' 
								style='font-size:14px; border-collapse: collapse;'>
							<tr class='lbl'>
							<th width='5px' align='center'>ID</th>
							<th width='20%' align='center'>LOGIN NAME</th>
							<th width='20%' align='center'>NAME</th>
							<th width='20%' align='center'>EMAIL</th>
							<th width='20%' align='center'>USER TYPE</th>
                            <th width='10%' align='center'>ACTION</th></tr>
<?php
//print_r($_SESSION);
    foreach ($data["users"] as $user):

echo "<tr class='a1' onmouseover=\"chgColor(this, '#FFA07A');\" onmouseout=\"chgColor(this, '#EEEEEE');\">
        <td align='center'>".$user->usd_id."</td>
        <td>".$user->usdnam."</td>
        <td align='left'>".$user->usdfnam . " " .$user->usdlnam."</td>
        <td>".$user->usdemail." </td>
        <td>".$user->useadmin." </td>
        <td align='right'>
            <!--<button class='button_sm button2' onClick=\"return popEditNew(".$user->usd_id.",this)\">EDIT</button>-->
            <button class='button_sm button3' onClick=\"delLine(".$user->usd_id.",this)\">DELETE</button></td></tr>";

    endforeach

?>
</table>