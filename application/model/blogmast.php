<?php
include_once("application/model/DB.php");

class blogmast{
    public $blog_id;
    public $blog_usdid;
    public $blog_header;
    public $blog_des;
    public $blog_createddt;
    public $blog_views;
    public $blog_category;
    public $blog_comment;
    public $blog_comid;

    //public $usdid;
    public function saveBlog(){        
        $dbcon = new DB();
        
        $sql = "INSERT INTO myblogs (blog_usdid, blog_header, blog_des, blog_createddt, blog_views, blog_category) VALUES 
                ('".$this->blog_usdid."', '".$this->blog_header."', '".$this->blog_des."', NOW(), 
                '0', '".$this->blog_category."') 
        ";
        $rsl = $dbcon->query($sql);
        
        $sql = "select blog_id from myblogs where blog_usdid='".$this->blog_usdid."' order by blog_id DESC LIMIT 1";

        $rsl = $dbcon->query($sql);
        $row = $rsl->fetch();

        $dbcon = null;
        return $row["blog_id"];
    }
    public function saveComment(){        
        $dbcon = new DB();
        
        $sql = "INSERT INTO comments (comblogid, comusdid, comddt, comdes) VALUES (
            '".$this->blog_id."', '".$_SESSION["userid"]."', NOW(), '".$this->blog_des."') 
        ";
        $rsl = $dbcon->query($sql);
        
        $dbcon = null;


        $str = "<div class='post-user'>
                    <b>".$_SESSION["username"]."</b>
                    &nbsp;&nbsp; ".date("Y-m-d H:i:s")." >> 
                    ".$this->blog_des." &nbsp;&nbsp;
                                                
                    <input type=\"button\" onclick=\"delComment(".$this->blog_id.",this)\" value=\"Delete\">
                    <!--<input type=\"button\" onclick=\"ediComment(".$this->blog_id.",this)\" value=\"Edit\">-->

                </div>";


        return $str;
    }
    public function editBlog(){        
        $dbcon = new DB();
        $str="";
        if($_SESSION["useradmin"]!="admin") $str = " AND
        blog_usdid='".$_SESSION["userid"]."'";
        $sql = "UPDATE myblogs SET 
                blog_header = '".$this->blog_header."', 
                blog_des = '".$this->blog_des."', 
                blog_category = '".$this->blog_category."'
                WHERE 
                blog_id = '".$this->blog_id."' $str
        ";
        echo $sql;
        $rsl = $dbcon->query($sql);
        $dbcon = null;
        return $this->blog_id;        
    }
    public function delBlog(){
        $dbcon = new DB();
        $str="";
        if($_SESSION["useradmin"]!="admin") $str = " and  blog_usdid='".$_SESSION["userid"]."'";

        $sql = "DELETE FROM myblogs WHERE blog_id='".$this->blog_id."' $str";
        $rsl = $dbcon->query($sql);
    }
    public function delCommentbyID(){
        $dbcon = new DB();
        $str="";
        if($_SESSION["useradmin"]!="admin") $str = " and comusdid='".$_SESSION["userid"]."'";

        $sql = "DELETE FROM comments WHERE comid='".$this->blog_comid."' $str";
        
        $rsl = $dbcon->query($sql);
        $dbcon = null;
        return "OK";
    }
    public function getBlogs($seloption){
        $selsql = "";        
        if($seloption!="all" && $seloption>=0) $selsql = "WHERE blog_usdid='$seloption'";
            
        $sql = "select *,DATE_FORMAT(blog_createddt,'%Y %b %d') AS ddt from myblogs 
                left join blogcategory on blog_category=cat_id 
                left join usdmast on blog_usdid=usdid $selsql order by blog_id DESC";


        $sql = "select blog_id,blog_usdid,blog_header,blog_des,blog_views,blog_category,
                cat_des,usdfnam,usdlnam,count(comblogid) totcom, DATE_FORMAT(blog_createddt,'%Y %b %d') AS ddt from myblogs 
                left join blogcategory on blog_category=cat_id 
                left join usdmast on blog_usdid=usdid
                left join comments on blog_id=comblogid $selsql group by blog_id  order by blog_id DESC";
        $dbcon = new DB();
        $result = $dbcon->query($sql);
		$list = new ArrayObject();
		if (!is_bool($result) && $result->rowCount() > 0) {
			while ($row = $result->fetch()) {
				$obj = new blogmast();                

                $obj->blog_id     = $row["blog_id"];
                $obj->blog_usdid  = $row["blog_usdid"];
                $obj->blog_header = $row["blog_header"];
                $obj->blog_des    = $row["blog_des"];
                $obj->blog_createddt = $row["ddt"];
                $obj->blog_views  = $row["blog_views"];
                $obj->blog_category = $row["blog_category"];
                
                $obj->blog_catdes = $row["cat_des"];
                $obj->blog_usdfnam = $row["usdfnam"];
                $obj->blog_usdlnam = $row["usdlnam"];                
                $obj->blog_totcom = $row["totcom"];  

                if (!file_exists('uploads/'.$obj->blog_id.".jpg")) $obj->blog_image = 'uploads/noimage.jpg';
                else $obj->blog_image = 'uploads/'.$obj->blog_id.".jpg";

                $obj->blog_comment = new ArrayObject();
                $obj->blog_comment = $this->getComments($obj->blog_id);

                $list[$obj->blog_id] = $obj;
            }
        }
        $dbcon = null;
        return $list;
    }
    public function getComments($blog_id){
        $sql = "select *,DATE_FORMAT(comddt,'%b %d') AS ddt from comments 
        left join usdmast on comusdid = usdid
        WHERE 
        comblogid = '$blog_id' order by comid DESC";
        //echo  "<pre>$sql</pre>";
        $dbcon = new DB();
        $result = $dbcon->query($sql);
        $list = new ArrayObject();
        if (!is_bool($result) && $result->rowCount() > 0) {
            while ($row = $result->fetch()) {
                $comm = new blogmast();
                $comm->comid = $row["comid"];
                $comm->usdid = $row["comusdid"];
                $comm->usdfnam = $row["usdfnam"];
                $comm->ddt = $row["comddt"];
                $comm->des = $row["comdes"];
                $list[$comm->comid] = $comm;
            }
        }
        $dbcon = null;
        return $list;
    }
    public function getSearch($txtSearch){
        $selsql = "";        
        $selsql = "WHERE blog_header like '%$txtSearch%' || blog_des like '%$txtSearch%' ";
            
        $sql = "select *,DATE_FORMAT(blog_createddt,'%Y %b %d') AS ddt from myblogs 
                left join blogcategory on blog_category=cat_id 
                left join usdmast on blog_usdid=usdid $selsql order by blog_id DESC";
        //echo $sql;
        $dbcon = new DB();
        $result = $dbcon->query($sql);
		$list = new ArrayObject();
		if (!is_bool($result) && $result->rowCount() > 0) {
			while ($row = $result->fetch()) {
				$obj = new blogmast();

                $obj->blog_id     = $row["blog_id"];
                $obj->blog_usdid  = $row["blog_usdid"];
                $obj->blog_header = $row["blog_header"];
                $obj->blog_des    = $row["blog_des"];
                $obj->blog_createddt = $row["ddt"];
                $obj->blog_views  = $row["blog_views"];
                $obj->blog_category = $row["blog_category"];
                
                $obj->blog_catdes = $row["cat_des"];
                $obj->blog_usdfnam = $row["usdfnam"];
                $obj->blog_usdlnam = $row["usdlnam"];

                if (!file_exists('uploads/'.$obj->blog_id.".jpg")) $obj->blog_image = 'uploads/noimage.jpg';
                else $obj->blog_image = 'uploads/'.$obj->blog_id.".jpg";


                $list[$obj->blog_id] = $obj;
            }
        }
        $dbcon = null;
        return $list;
    }
    public function getBlogFromID(){
        $this->blog_header = "";
        $this->blog_des = "";
        $this->blog_category = "";

        $dbcon = new DB();
        $sql = "select * from myblogs where blog_id='".$this->blog_id."'";
        //echo $sql;
        $rsl = $dbcon->query($sql);
        if (!is_bool($rsl) && $rsl->rowCount() > 0) {
            $row = $rsl->fetch();
            $this->blog_header = $row["blog_header"];
            $this->blog_des = $row["blog_des"];
            $this->blog_category = $row["blog_category"];
        }      

        $dbcon = null;
        //return $this;
    }
}