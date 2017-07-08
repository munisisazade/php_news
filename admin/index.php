<?php
    $mysqli = new mysqli("localhost","php_user","RkZmUpHmZwAekaLn","php_news_usta");
    $mysqli->set_charset("utf8");
    session_start();
    if(isset($_SESSION['session_id']) ){
        header("Location: dashboard.php");
    }
    if(isset($_POST['login'])){
        $email = check_input($_POST['email']);
        $password = md5(check_input($_POST['password']));
        $query = "SELECT * FROM `users` WHERE `email`='".$email."' AND `password`='".$password."'";
        $result = $mysqli->query($query);
//        var_dump($result);
        $countQuery = $result->num_rows;
        if($countQuery == 1){
            foreach ($result as $key) {
                $_SESSION['session_id'] = $key['id'];
                header("Location: dashboard.php");
            }
        }
        else{
            $formerror = "<b class='text-danger text-center'>You do not input email or password!</b>";
        }
    }
    function check_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = strip_tags($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<?php include("adminheader.php"); ?>
<div class="container">


    <div class="card card-container">
        <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
        <p id="profile-name" class="profile-name-card"></p>
        <form class="form-signin" method="post" action="">
            <span id="reauth-email" class="reauth-email"> <?php echo $formerror; ?></span>
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <div id="remember" class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block btn-signin" name="login" type="submit">Sign in</button>
        </form><!-- /form -->
        <a href="#" class="forgot-password">
            Forgot the password?
        </a>
    </div><!-- /card-container -->

</div> <!-- /container -->
<?php include("footer.php"); ?>