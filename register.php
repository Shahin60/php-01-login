<?php
$conn =  mysqli_connect('localhost', 'root', '', 'phpshahin');

if (!$conn) {
    echo 'now';
}

// user_firstname
// user_lastname
// user_email
// user_password

$msg_firstname = $msg_lastname = $msg_email = $msg_password = $msg_confirm_password = '';

if (isset($_POST['submit'])) {
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $confirm_password = $_POST['confirm_password'];

    $md5_user_password  = md5($user_password);

    if (empty($user_firstname)) {
        $msg_firstname = 'fil up this filed';
    }
    if (empty($user_lastname)) {
        $msg_lastname = 'fil up this filed';
    }
    if (empty($user_email)) {
        $msg_email = 'fil up this filed';
    }
    if (empty($user_password)) {
        $msg_password = 'fil up this filed';
    }
    if (empty($confirm_password)) {
        $msg_confirm_password = 'fil up this filed';
    }
    if (!empty($user_firstname) && !empty($user_lastname) && !empty($user_email) && !empty($user_password) && !empty($confirm_password)) {
        if ($user_password === $confirm_password) {
            $sql = " INSERT INTO user_information (user_firstname, user_lastname, user_email, user_password) VALUES ('$user_firstname', '$user_lastname' ,'$user_email' , '$md5_user_password')";
            if (mysqli_query($conn, $sql) == TRUE) {
                header("location:login.php");
            } else {
                echo 'error';
            }
        } else {
            echo ' password dunt match';
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
        <div class=" m-auto w-50 mt-3 ">
            <h5 class=" text-center bg-secondary p-1 text-white"> register now</h5>
            <div class="form-control">
                <form class="from-control" action="register.php" method="POST">
                    <div class="from">
                        <label class="form-label">Firs tname</label>
                        <input class="form-control" type="text" name="user_firstname" value="<?php if (isset($_POST['submit'])) {
                                                                                                    echo $user_firstname;
                                                                                                } ?>" id="">
                        <?php if (isset($_POST['submit'])) {
                            echo "<span class=' text-danger'>$msg_firstname </span>";
                        } ?>
                    </div>
                    <div class="from">
                        <label class="form-label">Last name</label>
                        <input class="form-control" type="text" name="user_lastname" value="<?php if (isset($_POST['submit'])) {
                                                                                                echo $user_lastname;
                                                                                            } ?>" id="">
                        <?php if (isset($_POST['submit'])) {
                            echo " <span class=' text-danger'>$msg_lastname </span>";
                        } ?>
                    </div>
                    <div class="from">
                        <label class="form-label">Email</label>
                        <input class="form-control" type="email" name="user_email" value="<?php if (isset($_POST['submit'])) {
                                                                                                echo $user_email;
                                                                                            } ?>" id="">
                        <?php if (isset($_POST['submit'])) {
                            echo " <span class=' text-danger'>$msg_email </span>";
                        } ?>
                    </div>
                    <div class="from">
                        <label class="form-label">Password</label>
                        <input class="form-control" type="password" name="user_password" id="">
                        <?php if (isset($_POST['submit'])) {
                            echo " <span class=' text-danger'>$msg_password </span>";
                        } ?>
                    </div>
                    <div class="from">
                        <label class="form-label">confirm Password</label>
                        <input class="form-control" type="password" name="confirm_password" id="">
                        <?php if (isset($_POST['submit'])) {
                            echo " <span class=' text-danger'>$msg_confirm_password </span>";
                        } ?>
                    </div>
                    <div class="button w-50 m-auto mt-2">
                        <input class=" btn btn-secondary w-75" type="submit" value="submit" name="submit">
                    </div>
            </div>
            </form>
            <h6> login now <a href="login.php"> login</a> </h6>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>