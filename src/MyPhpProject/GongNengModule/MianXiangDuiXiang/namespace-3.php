<?php
	namespace School\Parents;
    class Man{
        function __construct(){
            echo 'Listen to teachers!<br/>';
        }
    }
    namespace School\Teacher;
    class Person{
        function __construct(){
            echo 'Please study!<br/>';
        }
    }
    namespace School\Student;
    class Person{
        function __construct(){
            echo 'I want to play!<br/>';
        }
    }
    new Person();                   //输出I want to play!
  
  
?>