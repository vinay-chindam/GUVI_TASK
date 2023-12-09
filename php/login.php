<?php
session_start();
login();

function login(){
    $mysqli = new mysqli('localhost','root','','data');
    if($mysqli->connent_errno != 0){
        echo $mysqli->connect_error;
        exit();
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password)){
        echo "Please fill all the fields!!";
        exit;
    }

    $stmt = $mysqli->prepare("SELECT username FROM user WHERE username = ? and password = ?");
    $stmt->bind_param("si",$username,$password);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if($mysqli->affected_rows == 0){
        echo "Incorrect Username or Password!";
        exit();
    }
    else{
        echo "Logged In Successfully!";
        $_SESSION['login'] = true;
        $_SESSION['id'] = $data['id'];
        header("Location: https://127.0.0.1/GUVI Task/profile.php");
        exit();
    }
}
?>