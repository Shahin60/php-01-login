<?php
// user_firstname
// user_lastname
// user_email
// user_password
session_start();
$conn =  mysqli_connect('localhost', 'root', '', 'phpshahin');

if (!$conn) {
    echo 'now';
}

$emt_email = $emt_password = '';

if (isset($_POST['submit'])) {
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    $password = md5($user_password);

    if (empty($user_email)) {
        $emt_email = " file up this filed";
    }
    if (empty($user_password)) {
        $emt_password = " file up this filed";
    }
    if (!empty($user_email) && !empty($user_password)) {

        $sql = "SELECT * FROM user_information WHERE  user_email ='$user_email' AND user_password = '$password'";

      $mysql = $conn->query($sql);

       if ($mysql->num_rows > 0) {
        $_SESSION['login'] = 'login successful';
        header('location:des.php');
       } 
       else{
        echo " login filed";
       }
      
    }
}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>shahin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>


    <div class="container">
        <div class=" m-auto w-50 mt-5 ">
            <h5 class="text-center bg-secondary p-1 text-white">Login page</h5>
            <div class="login form-control">
                <form class="from-control " action="login.php" method="POST">
                    <div class="from">
                        <label class="form-label">Email</label>
                        <input class="form-control" type="email" name="user_email"
                            value=" <?php if (isset($_POST['submit'])) {
                                        echo  $user_email;
                                    } ?>" id="">

                        <?php if (isset($_POST['submit'])) {
                            echo "<span class='text-danger'> $emt_email </span>";
                        } ?>
                    </div>
                    <div class="from">
                        <label class="form-label">Password</label>
                        <input class="form-control" type="password" name="user_password" value="<?php if (isset($_POST['submit'])) {
                                                                                                    echo $user_password;
                                                                                                } ?>" id="">
                        <?php if (isset($_POST['submit'])) {
                            echo "<span class='text-danger'>  $emt_password </span>";
                        } ?>
                    </div>
                    <div class="button w-50 m-auto mt-2">
                        <input class=" btn btn-secondary w-75" type="submit" value="submit" name="submit">
                    </div>

            </div>
            </form>
            <h6> create account <a href="register.php"> register now</a> </h6>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>