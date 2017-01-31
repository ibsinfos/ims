<?php

require_once 'connection.php';

class Schedules{
     public function addSchedule($subject,$date,$start_time,$end_time){
       $sql="INSERT INTO tbl_schedule VALUES('NULL','$subject','$date','$start_time','$end_time')"; 
       $object = new Connection();
       $result = $object->query($sql);
       return $result;
       
    }
    public function getCourse(){
        $sql = "SELECT tbl_course.course_name,";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }
     public function getAllSchedules(){
         $date=date('Y-m-d');
        $sql = "SELECT * FROM tbl_schedule INNER JOIN tbl_course ON tbl_schedule.course= tbl_course.course_id INNER JOIN tbl_course_category ON tbl_course_category.course_category_id=tbl_course.course_category WHERE tbl_schedule.date>='$date' ";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }

    public function getSchedules($start_date,$end_date){
        $sql = "SELECT * FROM tbl_schedule WHERE date BETWEEN '$start_date' AND '$end_date'";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }

    public function getScheduleById($schedule_id){
        $sql = "SELECT tbl_course.course_name FROM tbl_course INNER JOIN tbl_schedule ON tbl_course.course_id = tbl_schedule.course WHERE schedule_id='$schedule_id'";
        $object = new Connection();
        $result = $object->query($sql);
        return mysql_fetch_array($result);
       
    }
    public function scheduleToday($date){
        $sql ="SELECT * FROM tbl_schedule INNER JOIN tbl_course ON tbl_schedule.course=tbl_course.course_id WHERE date='$date'ORDER BY schedule_id DESC LIMIT 1";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }
    public function availableResources(){
        $sql ="SELECT name,resource_category,count(resource_id)AS count FROM tbl_resources INNER JOIN tbl_resource_category ON tbl_resource_category.resource_category_id=tbl_resources.category WHERE availability='1' GROUP BY category";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }
    public function transcriptRequests(){
        $sql ="SELECT * FROM tbl_transcripts INNER JOIN tbl_students ON tbl_transcripts.student_id=tbl_students.student_id INNER JOIN tbl_course ON tbl_course.course_id=tbl_transcripts.course WHERE tbl_transcripts.status='pending' ORDER BY requested_on DESC LIMIT 1";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }

    public function AlltranscriptRequests(){
        $sql ="SELECT * FROM tbl_transcripts INNER JOIN tbl_students ON tbl_transcripts.student_id=tbl_students.student_id INNER JOIN tbl_course ON tbl_course.course_id=tbl_transcripts.course  ORDER BY requested_on DESC";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }
}

?>
