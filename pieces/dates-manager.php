 <?php
    $datesql=mysqli_query($con, "select * from boardDates");
    while($datesData[]=mysqli_fetch_array($datesql));
?>
    <div class="left-50">
      <label>Start of Academic Year (MM/DD/YYYY): </label>
      <input type="input" required pattern="\d{1,2}/\d{1,2}/\d{4}" value="<?php print $datesData[0][2]; ?>" name="yearStart" />
      </br>

      <label>End of Academic Year (MM/DD/YYYY): </label>
      <input type="input" required pattern="\d{1,2}/\d{1,2}/\d{4}" value="<?php print $datesData[1][2]; ?>" name="yearEnd" />

      </br>

      <label>Start of Finals (MM/DD/YYYY): </label>
      <input type="input"  required pattern="\d{1,2}/\d{1,2}/\d{4}"value="<?php print $datesData[2][2]; ?>" name="finalStart" />
    </div>

    <div class="right-50">
      <label>Start of Current Quarter (MM/DD/YYYY): </label>
      <input type="input"  required pattern="\d{1,2}/\d{1,2}/\d{4}" value="<?php print $datesData[3][2]; ?>" name="termStart" />
      <br/>

      <label>End of Current Quater (MM/DD/YYYY): </label>
      <input type="input"  required pattern="\d{1,2}/\d{1,2}/\d{4}" value="<?php print $datesData[4][2]; ?>" name="termEnd" />
      <br/>

      <input type="submit" value="Update" />

    </div>
