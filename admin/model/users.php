<?php
require_once 'connection.php';
class Users{
    public function addUserLogin($user_name,$password,$user_role,$email){
        $sql ="INSERT INTO tbl_user_login_account 
            VALUES('NULL','$user_name','$password','$user_role','$email','0','0','0')";
        $db = new Connection();
        $res = $db ->query($sql);
        return $res;
        
    }
    public function addEmpDetails($title,$fname,$lname,$dob,$gender,$email,$phone,$nic,$address,$prof_image,$user_role,$login_acc_id){
        $sql = "INSERT INTO tbl_employees(employee_id,title,first_name,last_name,dob,gender,prof_image,designation,phone,address,nic,login_acc_id) 
            VALUES('NULL','$title','$fname','$lname','$dob','$gender','$prof_image','$user_role','$phone','$address','$nic','$login_acc_id')";
        
        $db = new Connection();
        $reults = $db->query($sql);
        return $reults;
        
        }
    
    public function getLastLoginID(){
        $sql= "SELECT login_acc_id FROM tbl_user_login_account ORDER BY login_acc_id DESC LIMIT 1";
        $db = new Connection();
        $result = $db->query($sql);
        return mysql_fetch_array($result);
    }
     public function getUserById($user_id){
        $sql = "SELECT * FROM tbl_employees INNER JOIN 
            tbl_user_login_account ON 
            tbl_employees.login_acc_id= tbl_user_login_account.login_acc_id 
            WHERE user_name='$user_id'";
        $obj = new Connection();
        $result = $obj->query($sql);
        return mysql_fetch_array($result);;
    }
    public function getEmployeeByID($employee_id){
        $sql = "SELECT * FROM tbl_employees INNER JOIN 
            tbl_user_login_account ON 
            tbl_employees.login_acc_id= tbl_user_login_account.login_acc_id 
            WHERE employee_id='$employee_id'";
        $obj = new Connection();
        $result = $obj->query($sql);
        return $result;
    }
    public function getEmployeeUserRoles(){
        $sql ="SELECT * FROM user_role WHERE user_role!='student' AND user_role!='lecturer' AND user_role!='parent'";
        $db = new Connection();
        $result = $db->query($sql);
        return $result;
        
    }

    public function editUsers($fname,$lname,$dob,$gender,$address,$phone,$email,$nic,$user_name,$password,$prof_image,$login){
    $sql1 = "UPDATE tbl_employees SET first_name='$fname',last_name='$lname',dob='$dob',gender='$gender',prof_image='$prof_image',phone='$phone',address='$address',nic='$nic' WHERE login_acc_id='$login'"; 
    $db = new Connection();
    $result = $db->query($sql1);
    $sql2="UPDATE tbl_user_login_account
        SET user_name='$user_name',password='$password',
        email='$email' WHERE tbl_user_login_account.login_acc_id='$login'";
    $db = new Connection();
    $results = $db ->query($sql2);
    return $results;
    }
    public function getUsersByCategory(){
        $sql ="SELECT user_role.user_role,COUNT(employee_id) AS users FROM tbl_employees INNER JOIN user_role ON tbl_employees.designation = user_role.user_role_id GROUP BY tbl_employees.designation ";
        $db = new Connection();
    $results = $db ->query($sql);
    return $results;
    }

    public function getUsersByRole($user_role){
        $sql = "SELECT * FROM tbl_employees WHERE designation='$user_role'";
     $db = new Connection();
    $results = $db ->query($sql);
    return $results;
        
    }
    public function deleteemployee($employee_id){
        $sql="DELETE FROM tbl_employees WHERE employee_id='$employee_id'";
        $db= new Connection();
        $result = $db->query($sql);
        return $result;
        
    }
    public function updateCourseAdmissonFee($new_admission_fee){
        $sql="UPDATE tbl_course_payment_scheme SET amount='$new_admission_fee'";
        $db= new Connection();
        $result = $db->query($sql);
        return $result;
    }
    public function UpdatePaymentDate($payment_date){
        $sql="UPDATE tbl_payment_dates SET payment_date='$payment_date'";
        $db= new Connection();
        $result = $db->query($sql);
        return $result;
    }
    public function deleteAllCourses(){
        $sql="UPDATE tbl_students SET course=''";
        $db= new Connection();
        $result = $db->query($sql);
        return $result;
    }
    public function getAllpendingFaq(){
        $sql ="SELECT * FROM tbl_faq WHERE done='0'";
        $db= new Connection();
        $result = $db->query($sql);
        return $result;
    }
    public function getFaQById($faq_id){
        $sql="SELECT * FROM tbl_faq WHERE id_faq='$faq_id'";
        $db= new Connection();
        $result = $db->query($sql);
        return mysql_fetch_array($result);
        
    }
    public function updateFaq($faq_id,$faq_answer,$done){
        $sql ="UPDATE tbl_faq SET answer='$faq_answer',done='$done' WHERE id_faq='$faq_id'";
        $db= new Connection();
        $result = $db->query($sql);
        return $result;
    }
    public function delete_faq($faq_id){
        $sql="DELETE FROM tbl_faq WHERE id_faq='$faq_id'";
        $db= new Connection();
        $result = $db->query($sql);
        return $result;
        
    }
    function chk_available_user($user_name)
    {
        $sql = "SELECT * FROM tbl_user_login_account WHERE user_name='".$user_name."'";
        $db = new Connection();
        $results = $db->query($sql);
        $count = mysql_num_rows($results);
        if($count > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }    
}
?>
