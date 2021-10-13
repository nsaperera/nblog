<?php
//session_start();

include_once("application/model/DB.php");

class usdmast{
    public $usd_id;
    public $usdnam;
    public $usdpsw;
    public $usdemail;
    public $usdfnam;
    public $usdlnam;
    public $msg_error;

    public function getLogin(){        
        $DBH = new DB();

        $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $STH = $DBH->prepare("SELECT usdid,usdfnam,usdpsw,usdadmin FROM usdmast WHERE usdnam = :usdnam");
        $STH->bindParam(':usdnam', $this->usdnam, PDO::PARAM_STR);
        $STH->execute();

        $STH->setFetchMode(PDO::FETCH_ASSOC);

        while($row = $STH->fetch()) {
            if($row['usdpsw']==$this->usdpsw){
               // session_start();
                $_SESSION["username"] = $row['usdfnam'];
                $_SESSION["userid"] = $row['usdid'];
                $_SESSION["useradmin"] = $row['usdadmin'];
                //print_r($_SESSION);
            }
            else {
               // session_start();
                $_SESSION["msg_error"] = "Invalid user Name or Password";
            }
        }

        $DBH = null;



    }
    public function saveUser(){        
        $dbcon = new DB();

        $sql = "SELECT * from usdmast WHERE 
                usdnam = '".$this->usdnam."' or 
                usdemail = '".$this->usdemail."'
        ";
        $rsl = $dbcon->query($sql);
        if ($rsl->rowCount () > 0) {
            return "Already have this UserName or Email ID";
        }else{
            $sql = "INSERT INTO usdmast (usdnam, usdfnam, usdlnam, usdemail, usdpsw, usdadmin) VALUES (
                    '".$this->usdnam."', '".$this->usdfnam."', '".$this->usdlnam."', 
                    '".$this->usdemail."', '".$this->usdpsw."','user') 
            ";
            $rsl = $dbcon->query($sql);
        }
        $dbcon = null;
        return "Successfully Saved!!!";
    }
    public function delUser(){        
        $dbcon = new DB();

        $sql = "DELETE FROM usdmast WHERE usdid = '".$this->usd_id."'";
        $rsl = $dbcon->query($sql);
        return "OK";
    }
    public function getUsers(){
            
        $sql = "select * from usdmast order by usdid";
        
        $dbcon = new DB();
        $result = $dbcon->query($sql);
		$list = new ArrayObject();
		if (!is_bool($result) && $result->rowCount() > 0) {
			while ($row = $result->fetch()) {
				$obj = new usdmast();

                $obj->usd_id = $row["usdid"];
                $obj->usdnam = $row["usdnam"];
                $obj->usdfnam = $row["usdfnam"];
                $obj->usdlnam = $row["usdlnam"];
                $obj->usdemail = $row["usdemail"];
                $obj->useadmin = $row["usdadmin"];

                $list[$obj->usd_id] = $obj;
            }
        }
        return $list;
    }
}

