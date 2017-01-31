<?php
require_once 'connection.php';

class Calendar
{
    function get_schedule()
    {
        $sql = "SELECT tbl_schedule.schedule_id as id, 
concat(tbl_course_category.course_category_name,' - ',tbl_course.course_name) as title, 
concat(tbl_schedule.date,' ',tbl_schedule.start_time) as start, 
concat(tbl_schedule.date,' ',tbl_schedule.end_time) as end 
FROM tbl_schedule
INNER JOIN  tbl_course 
ON tbl_course.course_id=tbl_schedule.course
INNER JOIN tbl_course_category 
ON tbl_course.course_category=tbl_course_category.course_category_id";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }
    function delete_Schedule_by_id($schedule_id)
    {
        $sql = "DELETE FROM tbl_schedule WHERE schedule_id='$schedule_id' ";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }
    function update_Schedule_by_id($schedule_id, $date, $start_time, $end_time)
    {
        $sql = "UPDATE tbl_schedule SET date='$date', start_time='$start_time', end_time='$end_time' WHERE schedule_id='$schedule_id' ";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }
    public function add_Schedule($subject,$date,$start_time,$end_time){
       $sql="INSERT INTO tbl_schedule VALUES('NULL', '$subject','$date','$start_time','$end_time', '')"; 
       $object = new Connection();
       $result = $object->query($sql);
       return $result;       
    }
    public function get_all_schedules()
    {
       $sql= "SELECT tbl_course.course_id, tbl_course.course_name, tbl_course_category.course_category_name FROM tbl_course INNER JOIN tbl_course_category ON tbl_course.course_category = tbl_course_category.course_category_id ORDER by tbl_course_category.course_category_name ASC";
       $object = new Connection();
       $results = $object->query($sql);
       return $results; 
    }
}
?>
