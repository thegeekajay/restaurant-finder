<?php

require_once "include.php";
require_once "restaurant.php";

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

		$this->user_id = $data['user_id'];
		$this->restaurant_id = $data['restaurant_id'];
		$this->content = $data['content'];
		$this->rating = $data['rating'];
		$this->created_at = $data['created_at'] = date('Y-m-d H:i:s');
		$this->updated_at = $data['updated_at'] = date('Y-m-d H:i:s');

		if($this->create($data))
		{
			$restaurants = new Restaurant();
			$restaurant = $restaurants->find('id',$this->restaurant_id);
			$review_count = intval($restaurant['review_count']);
			$rating = $review_count*intval($restaurant['rating'])+intval($this->rating);
			$review_count +=1;
			$rating/=$review_count;
			$restaurants->update('id',$this->restaurant_id,['rating'=>$rating,'review_count'=>$review_count]);

			$result['status'] = "success";
			$result['success_text'] = "review added";
		}
		else
		{
			$result['status'] = "error";
			$result['error_text'] = "review not added";
		}
		return json_encode($result);
		

	}

	public function deleteReview($column,$value){

		// return $this->delete($column,$value);
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