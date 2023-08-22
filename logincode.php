<?php
session_start();
include 'db_conn.php';
if(isset($_POST['uname']) && isset($_POST['password'])) {

    function validation($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $users = validation($_POST['uname']);
    $pass = validation($_POST['password']);

    if(empty($users)) {
        header("Location: login.php?error=Username is required");
        exit();
    } else if(empty($pass)) {
        header("Location: login.php?error=Password is required");
        exit();
    } else {


        $sql = "SELECT * FROM user WHERE username='$users' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result)) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $users && $row['password'] === $pass){
                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['ID'] = $row['ID'];
                header("Location: chat.php");
                exit(); 

            }
        } else{
            header("Location: login.php?error=Incorect username or password");
            exit();
        }

    }
} else {
    header("Location: login.php?error=Incorect username or password");
    exit();
}
echo "if you see this there is something wrong in your username, dont forget the uppercase letters or undercase letters";
?>