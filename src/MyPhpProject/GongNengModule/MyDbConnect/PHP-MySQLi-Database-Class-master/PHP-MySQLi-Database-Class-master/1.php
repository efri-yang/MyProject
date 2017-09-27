<?php 
header("Content-type:text/html;charset=utf-8");
	include("MysqliDb.php");

	// $db = new MysqliDb ('localhost', 'root', 'yyh', 'sampdb');
	

	$db = new MysqliDb (Array (
                'host' => 'localhost',
                'username' => 'root', 
                'password' => 'yyh',
                'db'=> 'sampdb'
            ));
 	
 // 	$mysqli = new mysqli ('localhost', 'root', 'yyh', 'sampdb');
	// $db = new MysqliDb ($mysqli);

	// $cols = Array ("last_name", "first_name", "state");
	// $cols = Array ("student_id", "sex", "name");
 //    $user=$db->get('student',15,$cols);
    // $db->where ("student_id",1);
    // $db->orderBy("student_id","asc");
    // $db->orderBy("score","desc");
    // $result1=$db->get('score');

    // $db->orderBy('userGroup', 'ASC', array('student_id', 'score'));


	// $result=$db->where('student_id', 1, '>')->get('student');//获取多条
	// 
	// 
	$db->join("grade_event","grade_event.event_id=score.event_id","inner");
	$db->join("student","score.student_id=student.student_id","inner");
	$result=$db->get("score",null,"student.student_id,grade_event.event_id,score");

   
    

    print_r($result);


?>