<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $Username = $_POST['username'];
    $EmailAddress = $_POST['email'];
    $Password = $_POST['pass'];

    try{
        require_once 'db_connect.php';

        //Inserting data in to db

        $query = 'INSERT INTO users (UserName, Email, UserPassword) VALUES (:usernames, :email, :passwords);';

        //Hashing Password
        $hashedPass = password_hash($Password, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':usernames', $Username);
        $stmt->bindParam(':email', $EmailAddress);
        $stmt->bindParam(':passwords', $hashedPass);

        $stmt->execute();
        $stmt = null;
        $pdo = null;
        header('Location: ../index.php');
        die();

    }catch(PDOException $e)
    {
        // header('Location: ../index.php');
        die("Query Failed: " . $e->getMessage());
    }
}
else{
        header('Location: ../index.php');
    }