<?php
require_once 'connection.php';

class Calendar
{
    function get_schedule()
    {
        $sql = "SELECT tbl_schedule.schedule_id as id, tbl_course.course_name as title, concat(tbl_schedule.date,' ',tbl_schedule.start_time) as start, concat(tbl_schedule.date,' ',tbl_schedule.end_time) as end FROM tbl_schedule
            INNER JOIN  tbl_course ON  tbl_course.course_id=tbl_schedule.course ";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }
}
?>
