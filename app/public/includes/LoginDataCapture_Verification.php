<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    session_start();
    $signedInUserName = htmlspecialchars($_POST['login_username']);
    $signedInUserPass = htmlspecialchars($_POST['login_pass']);

    

    try{
        require_once 'db_connect.php';
        /**@var PDO $pdo */
        $loginquery = "SELECT UserName, UserPassword FROM users WHERE UserName = :username;";
        $stmt = $pdo->prepare($loginquery);
        $stmt->bindParam(":username", $signedInUserName);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($signedInUserPass, $user['UserPassword'])){
            session_regenerate_id(true);

            //Save data in sessions

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['UserName'];
            $_SESSION['userpass'] = $user['UserPassword'];
            header('Location: ../index.php');
            die();
        }
        else{
            $_SESSION["error"] = "Invalid UserName or Password";
            header("Location: ../index.php");
        }
        $stmt = null;
        $pdo = null;
        die();

    }catch(PDOException $e){
        die("InValid Login Information: ". $e->getMessage());
        
    }
}