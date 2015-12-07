<?php

require_once "include.php";

class Review extends DB{

	private $user_id;
	private $restaurant_id;
	private $content;
	private $rating;
	private $created_at;
	private $updated_at;
	private $deleted_at;

	function __construct() {

		$tableName = 'review';
		parent::__construct($tableName);

	}

	public function addReview($data){

		$this->content = $data['content'];
		$this->rating = $data['rating'];
		$this->created_at = $data['created_at'] = date('Y-m-d H:i:s');
		$this->updated_at = $data['updated_at'] = date('Y-m-d H:i:s');

		return $this->create($data);
	}

	public function deleteReview($column,$value){

		return $this->delete($column,$value);
	}

	public function showReview($data)
	{
		$sql = "SELECT * FROM `review` INNER JOIN `users` ON `users`.`id` = `review`.`user_id` WHERE `review`.`restaurant_id`='".$data."';";
		$result = $this->execSQL($sql);
		$data = [];
		while($row = mysqli_fetch_object($result))
		{
			array_push($data,(array) $row);
		}
		return $data;
	}
}

?>