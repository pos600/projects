<?php
    include "connect.php";
    $id = $_GET['id'];

    session_start();
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }

    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $author = $_POST['author'];
        $publish_date = $_POST['publish_date'];

      $sql = "UPDATE `books` SET `title`='$title',`author`='$author',`publish_date`='$publish_date' WHERE id=$id";
      $result = mysqli_query($con, $sql);

      if($result){
        header("Location: index.php?msg=Book updated successfully.");
      }else{
        echo "Failed: " .mysqli_error($con);
      }
    }
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

    <link rel="stylesheet" href="style.css">
    <title>Welcome page</title>
  </head>
  <body> 
    <!-- to do: styles -->
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="" >
      Book Store
    </nav>

    <div class="container">

      <div class="text-center mb-4">
        <h3>Edit Book Information</h3>
        <p class="text-muted">Click update to save changes.</p>
      </div>

      <?php
        $sql = "SELECT * FROM `books` WHERE id = $id LIMIT 1";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
      ?>

      <div class="container d-flex justify-content-center">
        <form action="" method="post" style="width:50vw; min-width:300px;">

          <div class="row mb-3">
            <div class="col">
              <label class="form-label">Author: </label>
              <input type="text" class="form-control" name="author"
              value="<?php echo $row['author'] ?>">
            </div>
            <div class="col">
              <label class="form-label">Date Published</label>
              <input type="text" class="form-control" name="publish_date"
              value="<?php echo $row['publish_date'] ?>">
            </div>
          </div>

          <div class="mb-3">

              <label class="form-label">Book Title: </label>
              <input type="text" class="form-control" name="title"
              value="<?php echo $row['title'] ?>">

          </div>

          <div>
            <button type="submit" class="btn btn-dark w-100 mb-2 mt-3" name="submit">Update</button>
            <a href="index.php" class="btn btn-danger w-100">Cancel</a>
          </div>

        </form>
      </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>