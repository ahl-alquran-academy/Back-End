<?php

ini_set("display_errors", 1);
include_once("Resources/config/Database.php");
include_once("Resources/classes/Sheikh.php");

$db = new Database();
$connection = $db->connect();
$sheikh = new Sheikh($connection);

//...check token here...//
//include_once("token-login.php");
//...check token here...//

//start session
session_start();
if (isset($_SESSION['adminName'])) {
    //realy logged in -> go to dashboard.
    header("Location: pages/home.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //recieve input data.
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $pass  = $_POST['password'];
    if (!empty($email) && !empty($pass)) {
        //check email
        $sheikh->email = $email;

        $admin = $sheikh->check_email();
        if (!empty($admin)) {
            //check pass
            if (password_verify($pass, $admin['password'])) {
                $_SESSION['adminName'] = $admin['firstName'];
                $_SESSION['admin']  = $admin;
                header("Location:pages/home.php");
                exit();
            } else {
                echo '<p 
            style="
            color: red;
            position: absolute;
            z-index: 100;
            top: 2%;
            left: 38%;
            background: #fff;
            padding: 5px;
            width: 23%;
            text-align: center;
            font-weight: bold;
            border-radius: 11px;
            ">Invalid Login</p>';
            }
        } else {
            echo '<p 
            style="
            color: red;
            position: absolute;
            z-index: 100;
            top: 2%;
            left: 38%;
            background: #fff;
            padding: 5px;
            width: 23%;
            text-align: center;
            font-weight: bold;
            border-radius: 11px;
            ">Invalid Login</p>';
        }
    } else {
        echo '<p 
            style="
            color: red;
            position: absolute;
            z-index: 100;
            top: 2%;
            left: 38%;
            background: #fff;
            padding: 5px;
            width: 23%;
            text-align: center;
            font-weight: bold;
            border-radius: 11px;
            ">Invalid Login</p>';
    }
}
?>


<!DOCTYPE html>
<html>

<?php
include_once("Resources/includes/head.php");
?>

<body>
    <div id="wrapper">
        <div class="main-content">
            <div class="header">
                <h1 style="color: #3897f0;margin-bottom: 20px;" dir="rtl">تسجيل الدخول</h1>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="l-part">
                    <input id="emailid" type="email" name="email" autofocus dir="rtl" placeholder="أدخل الأيميل"
                        class="input-1" required />
                    <div class="overlap-text">
                        <input id="password" type="password" name="password" dir="rtl" placeholder="كلمة المرور"
                            class="input-2" required />
                        <a href="#">نسيت؟</a>
                    </div>
                    <input type="submit" id="submitBtn" value="دخول" class="btn" />
                </div>
            </form>
        </div>
        <div dir="rtl" class="error_message hidden">
            خطا في تسجيل الدخول
        </div>
    </div>
    <script src="Resources/js/login.js"></script>
    <?php
    include_once("Resources/includes/scriptfiles.php");
    ?>