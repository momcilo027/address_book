<?php
require_once('database.php');
if(isset($_POST['save'])){
  insert();
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
        <div class="row text-center ml-1 mr-1">
          <div class="col col-12 hpos">
            <h1 class="pb-3">ADDRESS BOOK</h1>
          </div>
          <div class="col col-6 actv_1">
            <a href="home.php">active</a>
          </div>
          <div class="col col-6 dltd_1">
            <a href="deleted.php">deleted</a>
          </div>
          <div class="maincnt text-left pl-5 pr-5 pb-3 pt-3">
            <table class="tbl">
              <?php if(isset($_POST['search'])): ?>
                <?php if(!empty($_POST['first_name'])){
                  $data = firstname_p();
                }elseif(!empty($_POST['last_name'])){
                  $data = lastname_p();
                }elseif(!empty($_POST['phone'])){
                  $data = phone_p();
                }elseif(!empty($_POST['email'])){
                  $data = email_p();
                }
                ?>
                <?php foreach($data as $row => $value): ?>
                  <tbody>
                    <tr>
                      <td><?php echo $value['last_name']." ".$value['first_name']; ?></td>
                      <td><?php echo $value['phone']; ?></td>
                      <td><?php echo $value['email']; ?></td>
                      <td>
                        <a class="edit" href="update.php?id=<?php echo $value['id']; ?>">edit</i></a> |
                        <a class="remove" href="delete.php?id=<?php echo $value['id']; ?>">delete</i></a>
                      </td>
                    </tr>
                  </tbody>
                <?php endforeach; ?>
              <?php else: ?>
                <?php foreach($letters as $letter): ?>
                  <?php if(not_empty($letter)): ?>
                    <thead>
                      <tr>
                        <th>#<?php echo $letter; ?></th>
                      </tr>
                    </thead>
                    <?php $data = starts_with($letter);?>
                    <?php foreach($data as $row => $value): ?>
                      <tbody>
                        <tr>
                          <td><?php echo $value['last_name']." ".$value['first_name']; ?></td>
                          <td><?php echo $value['phone']; ?></td>
                          <td><?php echo $value['email']; ?></td>
                          <td>
                            <a class="edit" href="update.php?id=<?php echo $value['id']; ?>">edit</i></a> |
                            <a class="remove" href="delete.php?id=<?php echo $value['id']; ?>">delete</i></a>
                          </td>
                        </tr>
                      </tbody>
                    <?php endforeach; ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              <?php endif; ?>
            </table>
          </div>
        </div>
      </div>
    </div>


    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </body>
</html>
