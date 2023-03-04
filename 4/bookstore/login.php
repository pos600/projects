<?php

$login = 0;
$invalid = 0;
$missing = 0;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'connect.php';

    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="SELECT * FROM `registration` where username='$username'";  
    $result=mysqli_query($con, $sql);

    while($row = $result->fetch_assoc()){
        $hashed_password = $row["password"];
        $verify = password_verify($password, $hashed_password);

        if ($verify){
            if($result){
                $num=mysqli_num_rows($result);
                if($num>0){
                    $login=1;
                    session_start();
                    $_SESSION['username']=$username;
                    header('location:index.php');
                }else{
                    $invalid=1;
                }
            }else{
                $missing=1;
            }
        } else{
            $invalid=1;
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
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.rtl.min.css" 
            integrity="sha384-WJUUqfoMmnfkBLne5uxXj+na/c7sesSJ32gI7GfCk4zO4GthUKhSEGyvQ839BC51" crossorigin="anonymous">

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" 
            integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" 
            crossorigin="anonymous" referrerpolicy="no-referrer" />
            <!-- <link rel="stylesheet" href="style.css"> -->
            <title>LOGIN</title>
        </head>
        <body class="p-3 m-0 border-0 bd-example">

<?php
if($login){
    echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Welcome back!</strong> Login successful.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}elseif($invalid){
    echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Woops!</strong> Credentials not found.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}elseif($missing){
    echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Woops!</strong> Account does not exist!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}

?>
            <div class="container mt-2">
                <nav class="navbar table navbar-light justify-content-between fs-3 mb-5 mt-3" style="" >
                <div class="logo fw-bold">.nito{}</div>
                    <h1 class="text-center"><i class="fa-solid fa-person"></i>LOGIN</h1>
                <div>
                    <i class="fa-solid fa-book"> Bookmark</i>
                </div>
                </nav>
                <form action="login.php" method="post">
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
                    <button type="submit" class="btn btn-dark w-100 mb-2 mt-3">Login</button>
                    <a href="sign.php" class="btn btn-dark w-100">Signup</a>
                </form>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        </body>
    </html>