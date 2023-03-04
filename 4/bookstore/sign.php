<?php

$success = 0;
$user = 0;
$invalid = 0;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'connect.php';

    $username=$_POST['username'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql="Select * from `registration` where username='$username'";

    $result=mysqli_query($con, $sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            $user=1;
        }else{
            if($password === $cpassword){
            $sql="insert into `registration`(username, password) 
                values('$username', '$hashed_password')";
            $result=mysqli_query($con, $sql);
            if($result){
                    $success=1;
                    header('location: login.php');
            }
                }else{
                    $invalid = 1;
                }
            
        }
    }

}

?>


<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
            <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
            <!-- <link rel="stylesheet" href="style.css"> -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.rtl.min.css" 
            integrity="sha384-WJUUqfoMmnfkBLne5uxXj+na/c7sesSJ32gI7GfCk4zO4GthUKhSEGyvQ839BC51" crossorigin="anonymous">

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" 
            integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" 
            crossorigin="anonymous" referrerpolicy="no-referrer" />
            <title>SIGNUP</title>
        </head>
        <body class="p-3 m-0 border-0 bd-example">


<?php

if($user){
    echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Woops!</strong> User already existing, please try again.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}elseif($success){
    echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Congratulations!</strong> Account registration successful.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}elseif($invalid){
    echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Oops!</strong> Password mismatch.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}

?>

            <div class="container mt-2">
            <nav class="navbar table navbar-light justify-content-between fs-3 mb-5 mt-3" style="" >

            <div class="logo fw-bold">.nito{}</div>

            <h1 class="text-center"><i class="fa-solid fa-person"></i>SIGN UP</h1>

            <div>
            <i class="fa-solid fa-book"> Bookmark</i>
            </div>
            </nav>

                <form action="sign.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" class="form-control" id="username" name="username"
                            placeholder="Enter your username here">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Enter your password here">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Confirm Password:</label>
                        <input type="password" class="form-control" id="cpassword" name="cpassword"
                            placeholder="Retype your password">
                    </div>

                    <button type="submit" class="btn btn-dark w-100 mb-2 mt-3">Sign up</button>
                    <a href="login.php" class="btn btn-dark w-100">Already have an account? Login</a>
                </form>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        </body>
    </html>