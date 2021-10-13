function chgColor(tbRow, txtColor){ 
	tbRow.style.backgroundColor = txtColor;
}
function popupBlock(){
	var popup = document.createElement("div");
	popup.id="testpop1";
    //
    popup.style = "opacity: 0.2; position:absolute; width:100%; height:100%; top:0; left:0; text-align:center; border-radius: 10px;  box-shadow: 0px 0px 10px 0px black;";
    //popup.innerHTML="<div><a href='#' onClick='closepp();'>X</a></div> <br>HELLO sdvd wrhr hrh"
    popup.style.opacity = 0.2;
    document.body.appendChild(popup)
}
function popupLogin(){
    //var todayDate = new Date().toISOString().slice(0, 10);
    //console.log(todayDate);
	popupBlock();
	var popup = document.createElement("div");
	popup.id="divLogin";
    
    popup.style = "position:absolute; width:40%; height:40%; top:10%; left:30%; text-align:center; border-radius: 10px; background:rgb(240,240,240); box-shadow: 0px 0px 10px 0px black;";
    var str = "<h1>User Login</h1><br>";
    //str += "<div name=\"divkey\" style=\"width:90%;\" class='myLayersClassv'>";
    str += "<form action=\"index.php\" name=\"frm1\" id=\"frm1\" onsubmit=\"return validateForm()\" method=\"POST\">";
    str += "<table border=0 width=\"90%\" align=\"center\" cellpadding=\"3\" cellspacing=\"0\">";
    str += "<tr>";
    str += "    <td class=\"lbl\" width=35% align=\"right\">User Name: </td>";
    str += "    <td><input type=\"text\" name=\"username\" id=\"username\" onKeydown=\"return enter(event,'password','username')\"  size=25 value=''></td>";
    str += "</tr>";
    str += "<tr>";
    str += "    <td class=\"lbl\" width=50 align=\"right\">Password: </td>";
    str += "    <td><input type=\"password\" name=\"password\" id=\"password\" onKeydown=\"return enter(event,'','username')\" size=25></td>";
    str += "</tr>"; 
    str += "</table><br>";
    str +="<button name='login' class=\"button button2\">LOGIN</button>";
   // str +="<input type=button name='close' class=\"button button3\" onClick='alert('\OK\')return closepp('divLogin');' value='CLOSE'></input>";
    str += "<input type=\"button\" class=\"button button3\" onClick=\"closepp('divLogin');\" value=\"CLOSE\">";
    str += "</form>";
    
   // str += "</div>";

    
    popup.innerHTML = str;
    document.body.appendChild(popup)
    document.getElementById("username").focus();

}
function validateForm(){
    //form validation here **************
    return true;

}
function enter(e, nextfield, prvfield) {
	evt = e || window.event;

	if(evt && evt.keyCode == 13){
		var fld = document.getElementById(nextfield);
		if (fld!=null) fld.focus();
		return false; 
	}else if(evt && evt.keyCode == 38){
		var fld = document.getElementById(prvfield);
 		if (fld!=null) fld.focus();
		return false; 
	}else {return true; } 
}
function closepp(id){
	//alert("OK")
	var popup = document.getElementById(id);
	popup.remove(popup)
	var popup1 = document.getElementById("testpop1");
	popup1.remove(popup1)
    return false;
}
function delLine(lineID,idthis){    
    var url = "usermanage.php?option=DelUserId&id="+lineID;
    var rsl = $.ajax({
        url: url,
        async:false
    });
    //alert(rsl.responseText)
    var rsl1 = rsl.responseText;
    if(rsl1=="OK"){
        var row = idthis.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }
}
function getSearch(){
    var txtSearch = document.getElementById("search").value;
    window.location.replace("index.php?search="+txtSearch);
}
function delComment(comid,obj){
    var url = "index.php?delCommentid="+comid;
    //alert(url)
    var rsl = $.ajax({
        url: url,
        async:false
    });
    //alert(rsl.responseText)
    var rsl1 = rsl.responseText;
    if(rsl1=="OK"){
        var row = obj.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }
}
function popupComment(blogid){
    //alert(blogid)
    //var todayDate = new Date().toISOString().slice(0, 10);
    //console.log(todayDate);
	popupBlock();
	var popup = document.createElement("div");
	popup.id="divCom";
   // var sctop = document.documentElement.scrollTop;
    //alert(sctop)
    popup.style = "position:absolute; width:40%; top:10%; height:50%; top:10%; left:30%; text-align:center; border-radius: 10px; background:rgb(240,240,240); box-shadow: 0px 0px 10px 0px black;";
    var str = "<h1>Add New Comment</h1><br>";
    //str += "<div name=\"divkey\" style=\"width:90%;\" class='myLayersClassv'>";
   //str += "<form action=\"index.php\" name=\"frm1\" id=\"frm1\" onsubmit=\"return validateForm()\" method=\"POST\">";
    str += "<table border=0 width=\"90%\" align=\"center\" cellpadding=\"3\" cellspacing=\"0\">";
    str += "<tr>";
    str += "    <td class=\"lbl\" width=35% align=\"right\">Comment: </td>";
    str += "    <td><textarea id=\"comdes\" name=\"comdes\" rows=\"4\" cols=\"50\"></textarea>";
    str += "    <input type=hidden id='blog_id' value='"+blogid+"'></td>"
    str += "</tr>";
    str += "</table><br>";
    str +="<button name='saveCom' class=\"button button2\" onclick='saveComment()'>SAVE</button>";
   // str +="<input type=button name='close' class=\"button button3\" onClick='alert('\OK\')return closepp('divLogin');' value='CLOSE'></input>";
    str += "<input type=\"button\" class=\"button button3\" onClick=\"closepp('divCom');\" value=\"CLOSE\">";
    //str += "</form>";
    
   // str += "</div>";

    
    popup.innerHTML = str;
    document.body.appendChild(popup)
    document.getElementById("comdes").focus();
    //$(window).scrollTop(0);
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function popupComment(blogid){
    //alert(blogid)
    //var todayDate = new Date().toISOString().slice(0, 10);
    //console.log(todayDate);
	popupBlock();
	var popup = document.createElement("div");
	popup.id="divCom";
   // var sctop = document.documentElement.scrollTop;
    //alert(sctop)
    popup.style = "position:absolute; width:40%; top:10%; height:50%; top:10%; left:30%; text-align:center; border-radius: 10px; background:rgb(240,240,240); box-shadow: 0px 0px 10px 0px black;";
    var str = "<h1>Add New Comment</h1><br>";
    //str += "<div name=\"divkey\" style=\"width:90%;\" class='myLayersClassv'>";
   //str += "<form action=\"index.php\" name=\"frm1\" id=\"frm1\" onsubmit=\"return validateForm()\" method=\"POST\">";
    str += "<table border=0 width=\"90%\" align=\"center\" cellpadding=\"3\" cellspacing=\"0\">";
    str += "<tr>";
    str += "    <td class=\"lbl\" width=35% align=\"right\">Comment: </td>";
    str += "    <td><textarea id=\"comdes\" name=\"comdes\" rows=\"4\" cols=\"50\"></textarea>";
    str += "    <input type=hidden id='blog_id' value='"+blogid+"'></td>"
    str += "</tr>";
    str += "</table><br>";
    str +="<button name='saveCom' class=\"button button2\" onclick='saveComment()'>SAVE</button>";
   // str +="<input type=button name='close' class=\"button button3\" onClick='alert('\OK\')return closepp('divLogin');' value='CLOSE'></input>";
    str += "<input type=\"button\" class=\"button button3\" onClick=\"closepp('divCom');\" value=\"CLOSE\">";
    //str += "</form>";
    
   // str += "</div>";

    
    popup.innerHTML = str;
    document.body.appendChild(popup)
    document.getElementById("comdes").focus();
    //$(window).scrollTop(0);
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function saveComment(){
    var blogid = document.getElementById("blog_id").value;
    var comdes = document.getElementById("comdes").value;
    //alert(blogid)

    var url = "index.php?saveComment="+blogid+"&comdes="+comdes;
    //alert(url)
    var rsl = $.ajax({
        url: url,
        async:false
    });
    //alert(rsl.responseText)
    var rsl1 = rsl.responseText;
    if(rsl1=="Login befor post a Comment")
        alert(rsl1)
    else {
        var tbl = document.getElementById("tblCom_"+blogid);
        
        var row = tbl.insertRow(0);
        var cell1 = row.insertCell(0);
        cell1.innerHTML = rsl1; 


        //var row = obj.parentNode.parentNode;
        //row.parentNode.removeChild(row);
    }
    closepp('divCom');
}