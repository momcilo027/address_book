<?php
require_once('database.php');


if(empty($_GET['id'])){
  header('Location: home.php');
} else {
  $id = $_GET['id'];
  $connection = connection();
  $sql = "SELECT * FROM contacts WHERE id = '$id'";
  $result = $connection->query($sql);
  $row = mysqli_fetch_assoc($result);
  if(isset($_POST['update'])){
    update($id);
    header('Location: home.php');
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>AddressBook</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" href="css/fontawesome-free-5.13.0-web/css/all.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
  <body>

    <div class="options text-center pt-4 pb-4">
      <div class="">
        <div class="optbtn mb-2">
          <a name="add" class="" data-toggle="collapse" href="#contact" role="button" aria-expanded="false" aria-controls="contact">
            ADD NEW CONTACT
          </a>
        </div>
        <div class="optbtn mb-3">
          <a name="src" data-toggle="collapse" href="#search" role="button" aria-expanded="false" aria-controls="search">
            SEARCH MENU
          </a>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="container info">
        <div class="row d-flex justify-content-center">
          <div class="col col-12">
            <div class="collapse drpbox text-center mt-0" id="contact">
              <div class="card card-body drpbox mt-0">
                <form class="" action="" method="post">
                  <div class="row">
                    <div class="col col-3">
                      <label for="first_name">First Name</label>
                      <input type="text" name="first_name" value="">
                    </div>
                    <div class="col col-3">
                      <label for="last_name">Last Name</label>
                      <input type="text" name="last_name" value="">
                    </div>
                    <div class="col col-3">
                      <label for="email">E-mail</label>
                      <input type="email" name="email" value="">
                    </div>
                    <div class="col col-3">
                      <label for="phone">Phone Number</label>
                      <input type="text" name="phone" value="">
                    </div>
                  </div>
                  <button class="btn savebtn mt-4" type="submit" name="save">Save Contact</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="row d-flex justify-content-center">
          <div class="col col-12">
            <div class="collapse drpbox text-center" id="search">
              <div class="card card-body drpbox mt-0">
                <form class="" action="" method="post">
                  <div class="row">
                    <div class="col col-3">
                      <label for="first_name">First Name</label>
                      <input type="text" name="first_name" value="">
                    </div>
                    <div class="col col-3">
                      <label for="last_name">Last Name</label>
                      <input type="text" name="last_name" value="">
                    </div>
                    <div class="col col-3">
                      <label for="email">E-mail</label>
                      <input type="email" name="email" value="">
                    </div>
                    <div class="col col-3">
                      <label for="phone">Phone Number</label>
                      <input type="text" name="phone" value="">
                    </div>
                  </div>
                  <button class="btn savebtn mt-4" type="submit" name="search">Search</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row text-center ml-1 mr-1  d-flex justify-content-center">
          <div class="col col-12 hpos">
            <h1 class="pb-3">ADDRESS BOOK</h1>
          </div>
          <div class="col col-6">
            <div class="container-fluid">
              <div class="row pb-5 text-center">
                <div class="col col-12 update">
                  <form class="pt-3" action="" method="post">
                    <label>First Name</label><br>
                    <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>"> <br>
                    <label>Last Name</label> <br>
                    <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>"> <br>
                    <label>Phone Number</label> <br>
                    <input type="text" name="phone" value="<?php echo $row['phone']; ?>"> <br>
                    <label>E-mail</label> <br>
                    <input type="email" name="email" value="<?php echo $row['email']; ?>" class="mt-1"> <br>
                    <button class="btn savebtn_rev mt-3" type="submit" name="update">UPDATE</button>
                    <br>
                    <a class="btn savebtn_rev mt-1" href="home.php">RETURN</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </body>
</html>
