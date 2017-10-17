<?php
	class Tweet{
		protected $data;
		public function from($from){
			$data['from']=$from;
			return $this;
		}
		public function withStatus($status){
			$data['status']=$status;
			return $this;
		}
		public function inReplyToId($id){
			$data['id']=$id;
			return $this;
		}
		public function send(){
			return $id;
		}

	}

	$tweet=new Tweet;
	$id=$tweet->from("@rasmus")->withStatus('PHP 6 released')->send();
?>