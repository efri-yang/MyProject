<?php
	namespace Article;

	class Comment { 
			function __construct(){
				echo "Article/Comment".'<br/>';
			}
	}
	

	namespace MessageBoard;

	class Comment {

		function __construct(){
				echo "MessageBoard/Comment".'<br/>';
			}
	}
	$comment = new Comment();
	$comment = new \Article\Comment();
?>