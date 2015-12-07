<?php

require_once 'include.php';

class Restaurant extends DB
{
	// status 1:approved 2:blocked 3:pending_approval
	private $owner_id;
	private $name;
	private $address1;
	private $address2;
	private $city;
	private $state;
	private $zipcode;
	private $phone;
	private $image;
	private $pos_lat;
	private $pos_lon;
	private $rating;
	private $review_count;
	private $status;
	private $db;
	private $created_at;
	private $updated_at;
	private $deleted_at;


	function __construct(){

		$tableName = 'restaurant'; 
		parent::__construct ($tableName);
	}

	private function randStrGen($len){
	    $result = "";
	    $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
	    $charArray = str_split($chars);
	    for($i = 0; $i < $len; $i++){
		    $randItem = array_rand($charArray);
		    $result .= "".$charArray[$randItem];
	    }
	    return $result;
	}

	public function createRestaurant($data){

		if($this->isExists('name',$data['name']))
        {
            $result['status'] = "error";
            $result['error_text'] = "Restaurant already exist.";
        }
        else
        {
            $filename  = basename($_FILES['image']['name']);
			$extension = pathinfo($filename, PATHINFO_EXTENSION);
			$new       = $this->randStrGen(32).'.'.$extension;

			$sourcePath = $_FILES['image']['tmp_name'];       // Storing source path of the file in a variable
			$targetPath = $_SERVER['DOCUMENT_ROOT']."/assets/images/uploads/".$new; // Target path where file is to be stored
			move_uploaded_file($sourcePath,$targetPath) ; 

			$session = new Session();
			$this->owner_id = $data['owner_id'] = (int) $session->get_session_data('id');
			$this->name = $data['name'];
			$this->address1 = $data['address1'];
			$this->address2 = $data['address2'];
			$this->city = $data['city'];
			$this->state = $data['state'];
			$this->zipcode = $data['zipcode'];
			$this->phone = $data['phone'];
			$this->status = $data['status'] = 3;

			$this->image = $data['image'] = "/assets/images/uploads/".$new;
			$this->pos_lat = $data['pos_lat'];
			$this->pos_lon = $data['pos_lon'];
			$this->rating = $data['rating'] = 0;
			$this->review_count = $data['review_count'] = 0;
			$this->created_at = $data['created_at'] = date('Y-m-d H:i:s');
			$this->updated_at = $data['updated_at'] = date('Y-m-d H:i:s');

			$id = $this->create($data);

            $result['status'] = "success";
            $result['success_text'] = "Restaurant created.";
            $result['id'] = $id;
        }


        return json_encode($result);
	}

	public function editRestaurant($data){

		$restaurant_id = $data['restaurant_id'];
    	unset($data['restaurant_id']);

		if($_FILES['image']['size'] > 0)
	    {
	      $filename  = basename($_FILES['image']['name']);
	      $extension = pathinfo($filename, PATHINFO_EXTENSION);
	      $new       = $this->randStrGen(32).'.'.$extension;

	      $sourcePath = $_FILES['image']['tmp_name'];       // Storing source path of the file in a variable
	      $targetPath = $_SERVER['DOCUMENT_ROOT']."/assets/images/uploads/".$new; // Target path where file is to be stored
	      move_uploaded_file($sourcePath,$targetPath) ;

	      $data['image'] = "/assets/images/uploads/".$new;
	    }
	    $data['updated_at'] = date('Y-m-d H:i:s');
	    $this->update('id',$restaurant_id,$data);

	    $result['status'] = "success";
	    $result['success_text'] = "Restaurant edited";
	    return json_encode($result);
	}

	public function deleteRestaurant($data){
		if($this->update('id', $data,['deleted_at'=> date('Y-m-d H:i:s')]))
		{
			$result['status'] = "success";
	    	$result['success_text'] = "Restaurant deleted";
		}
		return json_encode($result);

	}

	public function search($data)
	{
		$sql = "SELECT * FROM `restaurant` WHERE (`name` LIKE '%$data%' OR `address1` LIKE '%$data%' OR `address2` LIKE '%$data%' OR `city` LIKE '%$data%' OR  `state` LIKE '%$data%' OR `zipcode` LIKE '%$data%' OR `phone` LIKE '%$data%') AND `deleted_at` IS NULL;";
		$result = $this->execSQL($sql);
		$data = [];
		while($row = mysqli_fetch_object($result))
		{
			array_push($data,(array) $row);
		}
		return $data;
	}

	public function listRestaurant() {

		return $this->selectAll("withDeleted");

	}

	public function viewRestaurant($id) {

		$data['restaurant']=$this->find('id', $id);
		$menu = new Menu();
		$data['menu']= $menu->find('restaurant_id', $id);
		return $data;

	}

}

?>