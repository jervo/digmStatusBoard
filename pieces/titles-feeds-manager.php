 <?php
    $infosql=mysqli_query($con, "select * from statusBoardInfo");
    while($infoData[]=mysqli_fetch_array($infosql));
?>


                <div class="left-50">
                    <label>DIGM Reel Title:</label>
                    <input type="input" value="<?php print $infoData[0]['sectionTitle']; ?>" name="reelTitle" />

                    <br/>

                    <label>DIGM Jobs Title:</label>
                    <input type="input" value="<?php print $infoData[1]['sectionTitle']; ?>" name="digmJobTitle" />

                    </br>

                    <label>DIGM Jobs Feed URL:</label>
                    <input type="input" value="<?php print $infoData[1]['url']; ?>" name="digmJobURL" />

                    </br>

                    <label>DIGM Events Title:</label>
                    <input type="input" value="<?php print $infoData[2]['sectionTitle']; ?>" name="digmEventTitle" />

                    </br>

                    <label>Vimeo Album:</label>
                    <input type="input" value="<?php print $infoData[5]['sectionTitle']; ?>" name="videoAlbumURL" />

                    </br>

                </div>

                <div class="right-50">
                    <label>DIGM Events Feed URL:</label>
                    <input type="input" value="<?php print $infoData[2]['url']; ?>" name="digmEventURL" />

                    </br>

                    <label>Featured Events Title:</label>
                    <input type="input" value="<?php print $infoData[3]['sectionTitle']; ?>" name="featuredTitle" />

                    </br>

                    <label>Featured Events Feed URL:</label>
                    <input type="input" value="<?php print $infoData[3]['url']; ?>" name="featuredURL" />

                    </br>


                    <label>Lab Title:</label>
                    <input type="input" value="<?php print $infoData[4]['sectionTitle']; ?>" name="labTitle" />

                    </br>
                </div>

                <input type="submit" value="Update" />
