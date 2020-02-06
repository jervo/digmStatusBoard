 <?php
    $facultysql=mysqli_query($con, "select * from facultyInfo");
    while($facultyData[]=mysqli_fetch_array($facultysql));


?>



<?php
//print_r($facultyData);
foreach ($facultyData as $faculty) :
  if($faculty[0]) {?>

  <div class="faculty-input">
      <form action="forms/faculty-update.php" method="post">
      <h4><?php print $faculty[1]; ?></h4>
      <label>Name: </label>
      <input type="input" value="<?php print $faculty[1]; ?>" name="name-<?php echo $faculty[0]; ?>" />
      </br>
      <label>Title: </label>
      <input type="input" value="<?php print $faculty[2]; ?>" name="title-<?php echo $faculty[0]; ?>" />
      </br>
      <label>Office: </label>
      <input type="input" value="<?php print $faculty[3]; ?>" name="office-<?php echo $faculty[0]; ?>" />
      </br>
      <label>Email: </label>
      <input type="input" value="<?php print $faculty[4]; ?>" name="email-<?php echo $faculty[0]; ?>" />
      </br>
      <label>Phone: </label>
      <input type="input" value="<?php print $faculty[5]; ?>" name="phone-<?php echo $faculty[0]; ?>" />
      </br>
      <label>Office Hours: </label>
      <input type="input" value="<?php print $faculty[6]; ?>" name="officeHours-<?php echo $faculty[0]; ?>" />
      </br>
      <label>Image Name a/imgs/avatar/: </label>
      <input type="input" value="<?php print $faculty[7]; ?>" name="image-<?php echo $faculty[0]; ?>" />
      </br>
      <label>Featured?
        <input type="checkbox" value="Yes" <?php if($faculty[8] == "Yes") echo "checked"; ?> name="featured-<?php echo $faculty[0]; ?>" />
      </label>
      </br>
      <input type="submit" value="Update">
      </form>

      <form action="forms/deleteFaculty.php" method="post">
          <input type="hidden" name="id"
                 value="<?php echo $faculty[0]; ?>" />
          <input class="faculty-detele" type="submit" value="&times; Delete Faculty" />
      </form>
  </div>

<?php
  }
endforeach;
?>






<form action="forms/addFaculty.php" method="post">
<div class="faculty-input faculty-add">
    <h4>Add Faculty</h4>
    <label>Name: </label>
    <input type="input" name="faculty-add-name" />
    </br>
    <label>Title: </label>
    <input type="input" name="faculty-add-title" />
    </br>
    <label>Office: </label>
    <input type="input" name="faculty-add-office" />
    </br>
    <label>Email: </label>
    <input type="input"  name="faculty-add-email" />
    </br>
    <label>Phone: </label>
    <input type="input" name="faculty-add-phone" />
    </br>
    <label>Office Hours: </label>
    <input type="input"  name="faculty-add-hours" />
    </br>
    <label>Image Name a/imgs/avatar/: </label>
    <input type="input" name="faculty-add-image" />
    </br>
    <input type="submit" value="Add Faculty"/>
</div>
</form>
