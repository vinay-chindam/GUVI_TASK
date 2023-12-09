<?php
session_start();
register();

function register(){
    $mysqli = new mysqli('localhost','root','','data');
    if($mysqli->connent_errno != 0){
        echo $mysqli->connect_error;
        exit();
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($name) || empty($email) || empty($gender) || empty($dob) || empty($username) || empty($password)){
        echo "Please fill all the fields!!";
        exit;
    }

    $stmt = $mysqli->prepare("SELECT username FROM user WHERE username = ?");
    $stmt->bind_param("si",$username);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if($mysqli->affected_rows == 0){
        $stmt = $mysqli->prepare("INSERT INTO user VALUES(?,?,?,?,?,?,?)");
        $stmt->bind_param("si",'',$name,$email,$gender,$dob,$username,$password);
        $stmt->execute();
        echo "Registered Successfully";
        exit();
    }
    else{
        echo "Username has already taken!";
        exit();
    }

}
?>