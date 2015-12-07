<?php
require_once "include.php";

class Menu extends DB{
  private $restaurant_id;
  private $item;
  private $detail;
  private $image;
  private $price;
  private $db;
  private $created_at;
  private $updated_at;
  private $deleted_at;

  function __construct($id){
    $tableName = 'menu';
    $this->restaurant_id = $id;
    parent::__construct($tableName);
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

  public function addMenuItem($data){

    $filename  = basename($_FILES['image']['name']);
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $new       = "menu_".$this->restaurant_id."_".$this->randStrGen(32).'.'.$extension;

    $sourcePath = $_FILES['image']['tmp_name'];       // Storing source path of the file in a variable
    $targetPath = $_SERVER['DOCUMENT_ROOT']."/assets/images/uploads/".$new; // Target path where file is to be stored
    move_uploaded_file($sourcePath,$targetPath) ;

    $data['image'] = "/assets/images/uploads/".$new;

    $this->item = $data['item'];
    $this->details = $data['detail'];
    $data['restaurant_id'] = $this->restaurant_id;
    $this->price = $data['price'];
    $this->created_at = $data['created_at'] = date('Y-m-d H:i:s');
    $this->updated_at = $data['updated_at'] = date('Y-m-d H:i:s');

    $id = $this->create($data);
    $result['status'] = "success";
    $result['success_text'] = "item added";
    $result['id'] = $id;
    $result['menu'] = $this->find('id',$id);

    return json_encode($result);
    
  }

  public function deleteMenuItem($data){
    if($this->update('id',$data,['deleted_at'=>date('Y-m-d H:i:s')]))
    {
      $result['status'] = "success";
      $result['success_text'] = "item deleted";
    }
    else
    {
      $result['status'] = "error";
      $result['error_text'] = "item not deleted";
    }
    return json_encode($result);
  }
  public function editMenuItem($data){

    $menu_id = $data['menu_id'];
    unset($data['menu_id']);

    if($_FILES['image']['size'] > 0)
    {
      $filename  = basename($_FILES['image']['name']);
      $extension = pathinfo($filename, PATHINFO_EXTENSION);
      $new       = "menu_".$this->restaurant_id."_".$this->randStrGen(32).'.'.$extension;

      $sourcePath = $_FILES['image']['tmp_name'];       // Storing source path of the file in a variable
      $targetPath = $_SERVER['DOCUMENT_ROOT']."/assets/images/uploads/".$new; // Target path where file is to be stored
      move_uploaded_file($sourcePath,$targetPath) ;

      $data['image'] = "/assets/images/uploads/".$new;
    }
    $this->item = $data['item'];
    $this->details = $data['detail'];
    $this->price = $data['price'];

    $this->updated_at = $data['updated_at'] = date('Y-m-d H:i:s');

    $this->update('id', $menu_id, $data);

    $result['status'] = "success";
    $result['success_text'] = "item edited";
    $result['menu'] = $this->find('id',$menu_id);

    return json_encode($result);

  }

  //  public function viewMenuItem(){

  //    return $this->selectAll();
    
  // }
}
?>