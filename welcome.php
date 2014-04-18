<?php
$title = "Welcome";
include "subheader.php";
$months = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");

if( isset($_GET['q']) ){
  if( $_GET['q']  == '1'){
?>

<br><br>

<div class="row">
  <div class="small-8 large-centered columns">
    <h3> Hello <?=$user->first_name?> <?=$user->last_name?> </h3>
    <h5> You are in the Process of Registration... Please Fill the following details to Continue. </h5>

<br>
<br>
<br>
<br>
    <div class="row">
      <div class="small-6 large-centered columns text-center">
        <h4> Please Upload your profile picture </h4>
        <img class="" src="images/<?=$user->display_pic?>" style="height:200px;width:180px;">
          <form action="upload_file.php" method="POST">
            <div class="row">
              <div class="small-8 columns">
                <input type="file"  name="upfile" />
              </div>
              <div class="small-4 columns">
                <input type="submit"  name="submit2" value="Upload" />
              </div>
            </div>
          </form>
      </div>
    </div>
    <div class="row">
      <a href="#">
    </div>
  </div>
</div>
<?php
    die();
  }
}


if( isset( $_POST['submit'] ) ){
  if( empty( $_POST['gender'] ) or empty( $_POST['contact'] ) ){
    $error = "One or More required details are not filled";
  }
  else{
    $result = mysql_query("UPDATE `mpac`.`users` SET 
            `gender` = '".$_POST['gender']."', 
            `contact_no` = '".$_POST['contact']."', 
            `date_of_birth` = '".$_POST['date']."-".$_POST['month']."-".$_POST['year']."', 
            `school_name` = '".$_POST['school']."',
            `college_name` = '".$_POST['college']."',
            `works_at` = '".$_POST['works']."',
            `lives_at` = '".$_POST['location']."',
            `school_name_o` = '".$_POST['schoolo']."',
            `college_name_o` = '".$_POST['collegeo']."',
            `works_at_o` = '".$_POST['workso']."',
            `lives_at_o` = '".$_POST['locationo']."'
          WHERE `u_id` = '".$_SESSION['id']."' LIMIT 1 ");
    if( $result ) header("Location:welcome.php?q=1");
    else $error = "Something went wrong! Please Check back later";
  }
}

if ( $user->gender != NULL and $user->display_pic != "default.jpg" ){
  header("Location:home.php");
}
else if( $user->gender != NULL ){
  header("Location:welcome.php?q=1");
}


?>
<br><br>

<div class="row">
  <div class="small-8 large-centered columns">
    <h3> Hello <?=$user->first_name?> <?=$user->last_name?>  !!</h3>
    <h5> You are in the Process of Registration... Please Fill the following details to Continue. </h5>


    <div class="row">
      <div class="small-8 large-centered columns">
<br>
<br>
<br>
<br>
        <form method="POST">


  <div class="row">
    <div class="large-6 columns">
      <label> Gender </label>
      <input type="radio" name="gender" value="M" id="genderm"><label for="genderm">Male</label>
      <input type="radio" name="gender" value="F" id="genderf"><label for="genderf">Female</label>
    </div>
    <div class="large-6 columns">
      <label>Phone number 
        <input type="text" name="contact" placeholder="Example: 7418000630" />
      </label>
    </div>
  </div>
  <div class="row">
    <div class="large-4 columns">
      <label>Date Of Birth
        <select name="date"  >
          <?php
          for ( $i=01; $i<=31; $i++ ) echo "<option value='".$i."'>".$i."</option>";
          ?>
        </select>
      </label>
    </div>
    <div class="large-4 columns">
      <label>&nbsp; 
        <select name="month" >
          <?php
          foreach( $months as $month ) echo "<option value='".$month."'>".$month."</option>";
          ?>
        </select>
      </label>
    </div>
    <div class="large-4 columns">
      <label>&nbsp; 
        <select name="year"  >
          <?php
          for ( $i=1970; $i<=2014; $i++ ) echo "<option value='".$i."'>".$i."</option>";
          ?>
        </select>
      </label>
    </div>
  </div> <br>
  <div class="row">
    <div class="large-6 columns">
      <div class="row collapse">
        <label>School Name </label>
          <div class="small-9 columns">
            <input type="text" name="school" placeholder="School Name" />
          </div>
          <div class="small-3 columns">
            <select name="schoolo">
              <option value="0"> Public </option>
              <option value="1"> Friends </option>
              <option value="2"> Only Me </option>
            </select>
          </div>
      </div>
    </div>
    <div class="large-6 columns">
      <div class="row collapse">
        <label>College/University Name</label>
        <div class="small-9 columns">
          <input type="text" name="college" placeholder="College Name" />
        </div>
        <div class="small-3 columns">
          <select name="collegeo">
            <option value="0"> Public </option>
            <option value="1"> Friends </option>
            <option value="2"> Only Me </option>
          </select>
        </div>
      </div>
    </div>
  </div><br>
  <div class="row">
    <div class="large-6 columns">
      <div class="row collapse">
        <label>Works at</label>
        <div class="small-9 columns">
          <input type="text" name="works" placeholder="Works At" />
        </div>
        <div class="small-3 columns">
          <select name="workso">
            <option value="0"> Public </option>
            <option value="1"> Friends </option>
            <option value="2"> Only Me </option>
          </select>
        </div>
      </div>
    </div>
    <div class="large-6 columns">
      <div class="row collapse">
        <label>Location</label>
        <div class="small-9 columns">
          <input type="text" name="location" placeholder="Current City" />
        </div>
        <div class="small-3 columns">
          <select name="locationo">
            <option value="0"> Public </option>
            <option value="1"> Friends </option>
            <option value="2"> Only Me </option>
          </select>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
        <br>
    <div class="large-6 columns">
        <h4><small style='color:#C40505;'  > <?php if( isset($error)) echo $error; ?>  </small> </h>
    </div>
    <div class="large-6 columns">
        <input type="submit" name="submit" style="height:40px;line-height:8px;" class="button right"  />
    </div>
  </div>


        </form>
      </div>
    </div>



  </div>
</div>

<?php
include "footer.php";
?>
