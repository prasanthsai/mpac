<?php
$title = "Post a photo";
include "header.php";

    if ( isset( $_GET['share'] ) ){
      $r34 = mysql_fetch_object( mysql_query("SELECT * FROM `mpac`.`attachments` WHERE `a_id` LIKE '".$_GET['share']."' "));
      $fnam = $r34->a_link;
      if( mysql_query("INSERT INTO `mpac`.`attachments` (`a_owner`,`a_wall`,`a_link`) VALUES( '".$_SESSION['id']."','".$_SESSION['id']."', '".$fnam."' ) " ) ){
                $row = mysql_fetch_object( mysql_query("SELECT * FROM `mpac`.`attachments` WHERE `a_link` LIKE '".$fnam."' AND `a_owner` = '".$_SESSION['id']."'"));
                header("Location:sharephoto.php?q=".$row->a_id);
      }
    }

    if( isset( $_GET['friend'] ) ){
      $friend = 1;
    }

    if( isset($_POST['submit2']) ){
      $allowedExts = array("gif", "jpeg", "jpg", "png");
      $temp = explode(".", $_FILES["file"]["name"]);
      $extension = end($temp);
      if ((($_FILES["file"]["type"] == "image/gif")
          || ($_FILES["file"]["type"] == "image/jpeg")
          || ($_FILES["file"]["type"] == "image/jpg")
          || ($_FILES["file"]["type"] == "image/pjpeg")
          || ($_FILES["file"]["type"] == "image/x-png")
          || ($_FILES["file"]["type"] == "image/png"))
          && ($_FILES["file"]["size"] < 20000000)
          && in_array($extension, $allowedExts)){
        if ($_FILES["file"]["error"] > 0){
          echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
        }
        else{
          $fnam = $user->u_id.md5(time()).".".$extension;
          if( isset($_POST['tofrnd']) ) $tofrnd = $_POST['tofrnd'];
          else $tofrnd = $_SESSION['id'];
            if ( move_uploaded_file($_FILES["file"]["tmp_name"],"images/".$fnam) )
              if( mysql_query("INSERT INTO `mpac`.`attachments` (`a_owner`,`a_wall`,`a_link`) VALUES( '".$_SESSION['id']."','".$tofrnd."', '".$fnam."' ) " ) ){
                $row = mysql_fetch_object( mysql_query("SELECT * FROM `mpac`.`attachments` WHERE `a_link` LIKE '".$fnam."' AND `a_owner` = '".$_SESSION['id']."'"));
                header("Location:sharephoto.php?q=".$row->a_id);
              } 
              else
                $error2 =  "Invalid file, Please try again!";
                
        }
      }
      else{
        $error2 =  "Invalid file, Please try again!";
      }
    }


$qu134 = "SELECT `u_id` AS id,`first_name` AS name from `mpac`.`users` WHERE (`u_id` IN (SELECT `u_requester` FROM `mpac`.`relationships` WHERE `u_acceptor` = '".$_SESSION['id']."' AND `approval` = '1') OR `u_id` IN (SELECT `u_acceptor` FROM `mpac`.`relationships` WHERE `u_requester` = '".$_SESSION['id']."' AND `approval` = '1') ) ";
$res134 = mysql_query($qu134);


?>


<div class="row">
  <div class="small-12 columns">
    <div class="row">
<br><br>
      <div class="small-8 columns">
      <h4> Please Upload to post on your <?php if (isset($friend) ) echo "friends";  ?>  Timeline </h4>
		
		
          <form action="" method="POST" enctype="multipart/form-data" >
<?php
if( isset($friend) ){
?>
  <div class="row">
    <div class="large-10 columns">
      <label>Select friend
        <select name="tofrnd">
<?php
while( $xy = mysql_fetch_object($res134) ) {
    echo" <option value=\"".$xy->id."\">".$xy->name."</option>";
}


?>
        </select>
      </label>
    </div>
  </div>
  <?php } ?>  


          <div class="row">
<br><br>
              <div class="small-8 columns text-right">
                <input type="file"  name="file" id="file" />
              </div>
              <div class="small-4 columns">
                <input type="submit"  name="submit2" value="Upload" />
              </div>
            </div>
          </form>
      </div>
    </div>
<!--    <div class="row">
      <div class="small-8 large-centered columns text-center">
        <div class="small-6 columns ">
        <h4><small style='color:#C40505;'  > <?php if( isset($error2)) echo $error2; ?>  </small> </h4>
        </div>
        <div class="small-6 columns text-right">
          <a href="home.php" class="button " style="height:40px;line-height:8px;" > Proceed to share</a>
        </div>
      </div>
    </div>-->
  </div>
</div>

<?php



include "footer.php";
?>
