<?php
$letters = array(
  '0' => 'A',
  '1' => 'B',
  '2' => 'C',
  '3' => 'D',
  '4' => 'E',
  '5' => 'F',
  '6' => 'G',
  '7' => 'H',
  '8' => 'I',
  '9' => 'J',
  '10' => 'K',
  '11' => 'L',
  '12' => 'M',
  '13' => 'N',
  '14' => 'O',
  '15' => 'P',
  '16' => 'Q',
  '17' => 'R',
  '18' => 'S',
  '19' => 'T',
  '20' => 'U',
  '21' => 'V',
  '22' => 'W',
  '23' => 'X',
  '24' => 'Y',
  '25' => 'Z',
);
function connection(){
  $host = "localhost";
  $user = "root";
  $pw = "";
  $dbname = "address_book";
  $message = "";
  $connection = mysqli_connect($host, $user, $pw, $dbname);
  if($connection){
    $message = "Connected";
  } else {
    die("Connection closed! ".mysqli_connect_error());
  }
  return $connection;
}
function insert(){
  $connection = connection();
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $sql = "INSERT INTO contacts(first_name, last_name, phone, email) VALUES('".$first_name."', '".$last_name."', '".$phone."', '".$email."')";
  if($connection->query($sql)){
    $message = "Informations are inserted";
  }else{
    echo "Error : " . $connection->error;
  }
}
function del_from_deleted($id){
  $connection = connection();
  $sql = "DELETE FROM deleted WHERE id = '$id'";
  $connection->query($sql);
  return (mysqli_affected_rows($connection) == 1) ? true : false;
}
function recover($id){
  $connection = connection();
  $sql = "SELECT * FROM deleted WHERE id='".$id."';";
  $result = $connection->query($sql);
  $row = mysqli_fetch_assoc($result);
  $first_name = $row['first_name'];
  $last_name = $row['last_name'];
  $phone = $row['phone'];
  $email = $row['email'];
  $sql = "INSERT INTO contacts(first_name, last_name, phone, email) VALUES('".$first_name."', '".$last_name."', '".$phone."', '".$email."')";
  if($connection->query($sql)){
    $message = "Informations are inserted";
  }else{
    echo "Error : " . $connection->error;
  }
  del_from_deleted($id);
}
function del_starts_with($letter){
  $connection = connection();
  $sql = "SELECT * FROM deleted WHERE last_name LIKE '".$letter."%';";
  $result = $connection->query($sql);
  return $result;
}
function starts_with($letter){
  $connection = connection();
  $sql = "SELECT * FROM contacts WHERE last_name LIKE '".$letter."%';";
  $result = $connection->query($sql);
  return $result;
}
function not_empty($letter){
  $info = starts_with($letter);
  foreach ($info as $key => $value) {
    if($value !== 0){
      return true;
    } else {
      return false;
    }
  }
}
function del_not_empty($letter){
  $info = del_starts_with($letter);
  foreach ($info as $key => $value) {
    if($value !== 0){
      return true;
    } else {
      return false;
    }
  }
}
function delete($id){
  $connection = connection();
  $sql = "DELETE FROM contacts WHERE id = '$id'";
  $connection->query($sql);
  return (mysqli_affected_rows($connection) == 1) ? true : false;
}
function update($id){
  $connection = connection();
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $sql = "UPDATE contacts SET first_name = '".$first_name."', last_name = '".$last_name."', phone = '".$phone."', email = '".$email."' WHERE id = '".$id."'";
  $connection->query($sql);
  return (mysqli_affected_rows($connection) == 1) ? true : false;
}
function firstname_p(){
  $connection = connection();
  $first_name = $_POST['first_name'];
  $sql = "CALL p_firstname('".$first_name."')";
  $result = $connection->query($sql);
  return $result;
}
function lastname_p(){
  $connection = connection();
  $last_name = $_POST['last_name'];
  $sql = "CALL p_lastname('".$last_name."')";
  $result = $connection->query($sql);
  return $result;
}
function phone_p(){
  $connection = connection();
  $phone = $_POST['phone'];
  $sql = "CALL p_phone('".$phone."')";
  $result = $connection->query($sql);
  return $result;
}
function email_p(){
  $connection = connection();
  $email = $_POST['email'];
  $sql = "CALL p_email('".$email."')";
  $result = $connection->query($sql);
  return $result;
}
function del_firstname_p(){
  $connection = connection();
  $first_name = $_POST['first_name'];
  $sql = "CALL del_fn_p('".$first_name."')";
  $result = $connection->query($sql);
  return $result;
}
function del_lastname_p(){
  $connection = connection();
  $last_name = $_POST['last_name'];
  $sql = "CALL del_ln_p('".$last_name."')";
  $result = $connection->query($sql);
  return $result;
}
function del_phone_p(){
  $connection = connection();
  $phone = $_POST['phone'];
  $sql = "CALL del_phone_p('".$phone."')";
  $result = $connection->query($sql);
  return $result;
}
function del_email_p(){
  $connection = connection();
  $email = $_POST['email'];
  $sql = "CALL del_email_p('".$email."')";
  $result = $connection->query($sql);
  return $result;
}
