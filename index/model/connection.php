<?php
class dbconnect
{
    public function query($sql){
        mysql_connect('localhost','root','123') or die("Connection error ". mysql_error());
        mysql_select_db('ims') or die("Database error ". mysql_error());
        $results = mysql_query($sql);
        return $results;
    }
}
?>
