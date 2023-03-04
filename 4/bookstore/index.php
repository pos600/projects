<?php

    session_start();
    $current_user = $_SESSION['username'];

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.rtl.min.css" 
    integrity="sha384-WJUUqfoMmnfkBLne5uxXj+na/c7sesSJ32gI7GfCk4zO4GthUKhSEGyvQ839BC51" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" 
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://kit.fontawesome.com/d8a6bce116.css" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <title>Welcome page</title>
  </head>
  <body> 
    <!-- to do: styles -->

    <div class="container mt-2">

    <nav class="navbar table navbar-light justify-content-between fs-3 mb-5 mt-3" style="" >

        <div class="logo fw-bold">.nito{}</div>

            <i class="fa-solid fa-book"> Bookmark</i>
            <div class="logoutBtn">
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </nav>
        
        <?php

            if(isset($_GET['msg'])){
                $msg = $_GET['msg'];
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                '.$msg.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }

        ?>

        <a href="home.php" class="btn btn-dark mb-3">Add New Book</a>
        <table class="table table-hover text-center">
            <thead class="table-dark">
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Author</th>
                <th scope="col">Book Title</th>
                <th scope="col">Publish Date</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php
                include "connect.php";
                    $sql = "SELECT * FROM `books`";
                    $result = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        if($row['user_username'] === $current_user){
                        ?>
                            <tr>
                                <td><?php echo $row['id']  ?></td>
                                <td><?php echo $row['author']  ?></td>
                                <td><?php echo $row['title']  ?></td>
                                <td><?php echo $row['publish_date']  ?></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $row['id'] ?>" 
                                    class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                                    <a href="delete.php?id=<?php echo $row['id'] ?>" 
                                    class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
                                </td>
                            </tr>

                        <?php
                    }
                }
                ?>
            </tbody>
            </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/d8a6bce116.js" crossorigin="anonymous"></script>
  </body>
</html>