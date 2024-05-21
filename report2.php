<?php
$target=$_COOKIE['theID'];

$conn=mysqli_connect("localhost", "root", "", "test1");
if(!$conn){
  echo "Connection Failed!";
}
$query="SELECT * FROM img_storage where id='$target' AND imagetype='poster';";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0){
  while($row=mysqli_fetch_assoc($result)){
    $posterImage=$row['img_name'];
  }
}


$sql="SELECT * FROM testdata where id='$target';";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
  while($row=mysqli_fetch_assoc($result)){
    
    
 
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="report.css" />
  </head>
  <body>
    
    <header>
      <div class="header">
        <h2 class="school">School of Sciences</h2>
        <p class="university-name">
          CHRIST (Deemed to be University), Delhi NCR
        </p>
      </div>
    </header>
    <h1 class="title">Activity Report</h1>
    <div class="section">
      <h2>General Information</h2>
      <table>
        <tr>
          <th>Type of Activity</th>
          <th class="data" name="typeOfActivity"><?php echo $row['actType']?></th>
        </tr>
        <tr>
          <td>Title of the Activity</td>
          <td class="data" name="activityTitle"><?php echo $row['actTitle']?></td>
        </tr>
        <tr>
          <td>Date /s</td>
          <td class="data" name="activityDate"><?php echo $row['actDate']?></td>
        </tr>
        <tr>
          <td>Time/s</td>
          <td class="data" name="activityTime"><?php echo $row['actTimeStart'];
          echo "-"; 
          echo $row['actTimeEnd']?></td>
        </tr>
        <tr>
          <td>Venue</td>
          <td class="data" name="activityVenue"><?php echo $row['actVenue']?></td>
        </tr>
        <tr>
          <td>Collaboration/Sponsor(if any)</td>
          <td class="data" name="activityCollaboration"><?php echo $row['actSponsor']?></td>
        </tr>
      </table>
      <?php
 }
}
?>  
<div class="form_section" id="speaker_section">
  <h2>Speaker/Guest/Presenter Details</h2>
    <?php
        $query="SELECT * FROM speakers where id='$target';";
        $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result)>0){
          while($row=mysqli_fetch_assoc($result)){
            $actSpeakerName=$row['actSpeakerName'];
            $actSpeakerPosition=$row['actSpeakerPosition'];
            $actSpeakerOrganization=$row['actSpeakerOrganization'];
            
            echo "<table border='1px solid black'>";
            echo "<tr>";
            echo "<th>Name</th>";
            echo "<th class='data' name='speakername'>$actSpeakerName</th>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Title/Position</td>";
            echo "<td class='data' name='speakerPosition'>$actSpeakerPosition</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Organization/s</td>";
            echo "<td class='data' name='speakerOrganization'>$actSpeakerOrganization</td>";
            echo "</tr>";
            
            echo "</table>";
            echo "<br>";
          }
        }
        ?>
</div>
      
      <?php
      $query="SELECT * FROM testdata where id='$target';";
      $result=mysqli_query($conn,$query);
      if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){

        
      ?>

      <h2>Participant Profile</h2>
      <table>
        <tr>
          <th>Type of Participants</th>
          <th class="data" name="participantType"><?php echo $row['actParticipantsType']?></th>
        </tr>
        <tr>
          <td>No. of Participants</td>
          <td class="data" name="participantCount"><?php echo $row['actParticipantsNo']?></td>
        </tr>
        <tr>
          <td>Teacher</td>
          <td class="data" name="teacherCount"><?php echo $row['actTeacherParticipantsNo']?></td>
        </tr>
        <tr>
          <td>Student</td>
          <td class="data" name="studentCount"><?php echo $row['actStudentParticipantsNo']?></td>
        </tr>
        <tr>
          <td class="data">Male = <?php echo $row['actMaleParticipantsNo']?></td>
          <td class="data">Female = <?php echo $row['actFemaleParticipantsNo']?></td>
        </tr>
      </table>

      <h2>Synopsis of the activity</h2>
      <table>
        <tr>
          <th>Highlight of the activity</th>
          <th class="data" name="highlight"><?php echo $row['actHighlights']?></th>
        </tr>
        <tr>
          <td>Key Takeways</td>
          <td class="data" name="keyTakeaways"><?php echo $row['actKeyTakeaways']?></td>
        </tr>
        <tr>
          <td>Summary of activity</td>
          <td class="data" name="summary"><?php echo $row['actSummary']?></td>
        </tr>
        <tr>
          <td>Follow-up plan, if any</td>
          <td class="data" name="followUpPlan"><?php echo $row['actPlan']?></td>
        </tr>
      </table>

      <h2>Rapporteur</h2>
      <table>
        <tr>
          <th>Name/s of Rapporteur</th>
          <th class="data" name="rapporteurName"><?php echo $row['actRapporteurName']?></th>
        </tr>
        <tr>
          <td>Email:</td>
          <td class="data" name="rapporteurContact"><?php echo $row['actRapporteurEmail'];
          // echo ", ";
          // echo "+91";
          //  echo $row['actRapporteurContact']
          ?></td>
        </tr>
      </table>
    </div>
    <br /><br />

    <header>
      <div class="header">
        <h2 class="school">School of Sciences</h2>
        <p class="university-name">
          CHRIST (Deemed to be University), Delhi NCR
        </p>
      </div>
    </header>

    <div class="section" id="descreportsection">
      <h2 class="actTitle"><?php echo $row['actTitle']?></h2>
      <h2 class='actTitle'>"<?php echo $row['actSpeakerPresentationTitle']?>"</h2>
      <h2 class="descReport">Descriptive Report</h2>
      <p class="desc" name="description">
        <?php echo $row['actDescReport']?>
      </p>
<?php
  }
}
?>
      <?php
      $query="SELECT * FROM img_storage where id='$target' and imagetype='speaker';";
      
      $result=mysqli_query($conn,$query);
      if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
         $speakerImage=$row['img_name'];
         
          echo "<img src='Photos/$speakerImage' class='speakProfile'>";
          
        }
      }
      ?>
    </div>
    <br /><br />

    <header>
      <div class="header">
        <h2 class="school">School of Sciences</h2>
        <p class="university-name">
          CHRIST (Deemed to be University), Delhi NCR
        </p>
      </div>
    </header>

    <div class="section">
      <?php
      $query="SELECT * from testdata where id='$target';";
      $result=mysqli_query($conn,$query);
      if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
          
        
      ?>
      <h2 class="actTitle"><?php echo $row['actTitle']?></h2>
      <h2 class='actTitle'>"<?php echo $row['actSpeakerPresentationTitle']?>"</h2>
      <?php
        }
      }
      ?>
      
      <h2 class="descReport">Photograph</h2>
  <?php
    $query="SELECT * FROM img_storage where id='$target' and imagetype='geotag';";
    $i=1;
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
      while($row=mysqli_fetch_assoc($result)){
        $geoImage=$row['img_name'];
       
        echo "<img src='Photos/$geoImage' class='geoTag$i'>";
        $i=$i+1;
      }
    }
  
      
        ?>
    </div>

    <br /><br />
    <div class="section">
    <?php
    $query="SELECT * FROM img_storage where id='$target' and imagetype='attendance';";
    $i=1;
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
      while($row=mysqli_fetch_assoc($result)){
       $attendanceImage=$row['img_name'];
        echo "<img src='Photos/$attendanceImage' class='attSheet$i'>";
        $i=$i+1;
      }
    }
  
      
        ?>
    </div>

    <br /><br />
    <header>
      <div class="header">
        <h2 class="school">School of Sciences</h2>
        <p class="university-name">
          CHRIST (Deemed to be University), Delhi NCR
        </p>
      </div>
    </header>
    
    <div class="section">
      <?php
      $query="SELECT * FROM testdata where id='$target';";
      $result=mysqli_query($conn,$query);
      if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
          
        
      ?>
      <h2 class='actTitle'><?php echo $row['actTitle']?></h2>
      <h2 class='actTitle'>"<?php echo $row['actSpeakerPresentationTitle']?>"</h2>
      <?php
        }
      }
      ?>
   
      
      
      <h2 class="descReport">Poster of the event</h2>
      <img
        class="poster"
        src="Photos/<?php echo $posterImage; ?>"
        alt="" />
    </div>

    <br /><br />

    <header>
      <div class="header">
        <h2 class="school">School of Sciences</h2>
        <p class="university-name">
          CHRIST (Deemed to be University), Delhi NCR
        </p>
      </div>
    </header>

    <div class="section">
      <?php
      $query="SELECT * FROM testdata where id='$target';";
      $result=mysqli_query($conn,$query);
      if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){

        
      ?>
      <h2 class="actTitle"><?php echo $row['actTitle']; ?></h2>
      <h2 class='actTitle'>"<?php echo $row['actSpeakerPresentationTitle']?>"</h2>
      <?php
      }
    }
      ?>
      
      <h2 class="descReport">Feedback Report</h2>
      <?php
 
$query="SELECT * FROM img_storage where id='$target' and imagetype='form';";
$result=mysqli_query($conn,$query);
$i=1;
if(mysqli_num_rows($result)>0){
  while($row=mysqli_fetch_assoc($result)){
    
  
?>
  <?php
       $formImage=$row['img_name'];
        echo "<img src='Photos/$formImage' class='feedReport$i'>";
        ?>
    </div>
<?php
$i=$i+1;
}
}
?>
    <br /><br />
    <div class="section">
      <p class="actTaken">Action Taken</p>
      <p class="actTakenDesc">
        As per the feedback given by the students more such interactive topics
        can be considered for future events. More student interaction should be
        there during the sessions. Relevant videos must be included.
      </p>
      <div class="ac-hod-main">
        <div class="ac-hod">
          <?php
          $query="SELECT * FROM img_storage where id='$target' and imagetype='signature';";
          $result=mysqli_query($conn,$query);
          $i=1;
          if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
              $signImage=$row['img_name'];
              echo "<div>";
               echo "<img src='Photos/$signImage' class='image-fitter$i'>";
              echo "</div>";
              $i++;
            }
          }
          ?>
          <div class="ac-title">Academic Coordinator</div>
          <div class="hod-title">HOD</div>
          
          <div class="ac-sign">Name & Signature</div>
          <div class="hod-sign">Name & Signature</div>
        
      </div>
    </div>
    <?php
    mysqli_close($conn);
    ?>

    
  </body>
  
</html>