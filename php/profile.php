<?php
require 'login.php';
if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    $stmt = $mysqli->prepare("SELECT * FROM user WHERE id = ?");
    $stmt->bind_param("si",$id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    echo $data;
    exit();
}
else{
    header('Location: index.html');
}
?>