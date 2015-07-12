<?php



include ('database_connection.php');
if (isset($_POST['formsubmitted'])) {
    $error = array();//Declare An Array to store any error message  
    if (empty($_POST['name'])) {//if no name has been supplied 
        $error[] = 'Please Enter a name ';//add to array "error"
      } else {
        $name = $_POST['name'];//else assign it a variable
      }

      if (empty($_POST['e-mail'])) {
        $error[] = 'Please Enter your E-mail ';
      } else {


        if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['e-mail'])) {
           //regular expression for email validation
          $Email = $_POST['e-mail'];
        } else {
         $error[] = 'Your E-Mail Address is invalid  ';
       }


     }
     $type=$_POST['type'];


     if (empty($_POST['Password'])) {
      $error[] = 'Please Enter Your Password ';
    } else {
      $Password = $_POST['Password'];
    }


    if (empty($error)) //send to Database if there's no error '

    { // If everything's OK...

        // Make sure the email address is available:
    $query_verify_email = "SELECT * FROM members  WHERE Email ='$Email'";
    $result_verify_email = mysqli_query($dbc, $query_verify_email);
        if (!$result_verify_email) {//if the Query Failed ,similar to if($result_verify_email==false)
          echo ' Database Error Occured ';
        }

        if (mysqli_num_rows($result_verify_email) == 0) { // IF no previous user is using this email .


            // Create a unique  activation code:
          $activation = md5(uniqid(rand(), true));
          $salt=rand()%101;
          $Password.=$salt;
          $Password=MD5($Password);

          $query_insert_user = "INSERT INTO `members` ( `Username`, `Email`, `password`,`salt`,`type`) VALUES ( '$name', '$Email', '$Password','$salt','$type')";


          $result_insert_user = mysqli_query($dbc, $query_insert_user);
          if (!$result_insert_user) {
            echo 'Query Failed ';
          }

            if (mysqli_affected_rows($dbc) == 1) { //If the Insert Query was successfull.


                // Send the email:
           //   $message = " To activate your account, please click on this link:\n\n";
           //   $message .= WEBSITE_URL . '/activate.php?email=' . urlencode($Email) . "&key=$activation";
            //  mail($Email, 'Registration Confirmation', $message, 'From: resourcepen@gmail.com');









                // Flush the buffered output.


                // Finish the page:
              echo '<div class="alert alert-dismissable alert-success">
              <button type="button" class="close" data-dismiss="alert">×</button>Thank you for
              registering!You can now start using your account! </div>';


            } else { // If it did not run OK.
              echo '<div class="alert alert-dismissable alert-danger">
              <button type="button" class="close" data-dismiss="alert">×</button>You could not be registered due to a system
              error. We apologize for any
              inconvenience.</div>';
            }

        } else { // The email address is not available.
          echo '<div class="alert alert-dismissable alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>That email
          address has already been registered.
        </div>';
      }

    } else {//If the "error" array contains error msg , display them



    echo '<div class="alert alert-dismissable alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button> <ol>';
    foreach ($error as $key => $values) {

      echo '	<li>'.$values.'</li>';



    }
    echo '</ol></div>';

  }
  
    mysqli_close($dbc);//Close the DB Connection

} // End of the main Submit conditional.



?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Registration Form</title>


  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <?php include('header.php'); ?>

  <div class="row">

    <div class="col-md-3"></div>
    <div class="col-md-6">
      <br>
      <br>

      <form action="register.php" method="post" class="form-horizontal">
        <fieldset>
          <legend><center><u><b>Sign-Up</b></u></legend></center>
          <br>
          <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Name:</label>
            <div class="col-lg-8">
              <div class="input-group">
                <input type="text" class="form-control" id="name" name="name" size="235" placeholder="Enter your Username .">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span></div>
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail" class="col-lg-2 control-label">E-mail:</label>
              <div class="col-lg-8">
                <div class="input-group">

                  <input type="text" class="form-control" id="e-mail" name="e-mail" size="235" placeholder="Enter Email">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span></div>
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword" class="col-lg-2 control-label">Password:</label>
                <div class="col-lg-8">
                  <div class="input-group">
                    <input type="password" class="form-control" id="Password" name="Password" size="25" placeholder="Enter Password">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-certificate"></span></span></div>

                  </div>
                </div>

                <div class="form-group">
                  <label for="select" class=" col-lg-2 control-label">Select Type:</label>
                  <div class="col-lg-8">
                    <select class="form-control" id="select" name="type">
                      <option value="partner">Partner</option>
                      <option value="admin">Admin</option>
                      <option value="const">Constructor</option>
                      <option value="commu">Community</option>
                      <option value="donor">Donor</option>
                    </select>
                  </div>
                </div>
                <center>
                  <br>
                  <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-refresh"></span>&nbspReset</button>&nbsp&nbsp&nbsp
                  <input type="hidden" name="formsubmitted" value="TRUE" />
                  <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-log-in"></span>&nbsp&nbspRegister</button></center>
                  <br>
                  <br>
                </div>
              </div>
            </fieldset>
          </form>
        </div>


        <div class="col-md-3"></div>

      </div>
      <br><br>


      <?php include('footer.php'); ?>
    </body>
    </html>
