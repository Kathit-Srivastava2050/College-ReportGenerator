<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automatic Report Generator</title>

    <style>
        body{
            margin: 0;
            padding: 0;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
           
        }
        .grid_container {
            
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            justify-content: center;
            align-items: center;
            margin-left: 5%;
            margin-right: 5%;
            margin-bottom: 5%;
            margin-top: 150px;
           
            background-color: rgb(23, 57, 85);
            border: groove 5px grey;
            padding: 10px;
        }

        .form_section {
            grid-column: span 1;
            border: groove 3px black;
            margin: 5%;
            height: 500px;
            box-shadow: 5px 5px 5px 2px rgba(71, 70, 70, 0.6);
            
            background-color: rgb(230, 230, 230);
            padding: 1.5%;
            
        }
        .header{
            height: 150px;
            margin: 0;
            display: flex;
            
            left: 0;
            right: 0;
            top: 0;
            margin-bottom: 0;
            position: fixed;
            width: 100%;
            background-color: white;
            z-index: 999;
        }
        .left-header{
            height: 100%;
            display: flex;
            flex: 1;
            
            align-items: center;
            justify-content: center;
            background-color: rgb(23, 57, 85);

        }
        .right-header{
            height: 100%;
            display: flex;
            flex: 5;
            
            align-items: center;
            justify-content: center;
            background-color: rgb(0, 162, 255);
            color: darkblue;

        }
        .logo{
            height: 85%;
        }
        input[type=text]{
            border-radius: 5px;
            background-color: white;
            border-style: solid;
            border-width: 0.5px;
            border-color: grey;
            
        }
        input[type=email]{
            border-radius: 5px;
            background-color: white;
            border-style: solid;
            border-width: 0.5px;
            border-color: grey;
        }
        input[type=number]{
            border-radius: 5px;
            background-color: white;
            border-style: solid;
            border-width: 0.5px;
            border-color: grey;
        }
       
        input[type=file]::file-selector-button{
            background-color: darkblue;
            font-weight: bold;
            color: white;
            border: none;
            border-radius: 7px;
            
        }
        input[type=file]{
            background-color: red;
            color: white;
            font-weight: bold;
            border-radius: 5px;
        }
        .highlight-label{
            display: block;
        }
        textarea{
            resize: none;
            margin-left: 25%;
            height: auto;
        }
        input[type=submit]{
            background-color: rgb(8, 176, 8);
            font-weight: bold;
            color: white;
            border: none;
            height: 200%;

        }
        input[type=reset]{
            background-color: rgb(205, 13, 13);
            color: white;
            font-weight: bold;
            border: none;
            height: 200%;
        }
        #imageupload{
           overflow: scroll;
        }
        .error{
            background-color: beige;
            border-color: red;
        }
        #speaker_section{
            overflow: scroll;
            padding: auto;
        }

    </style>
</head>

<body>
    <div class="header">
        <div class="left-header"><img src="logochrist.jpg" class="logo"></div>
        <div class="right-header"><h1>Report Generator Christ University</h1></div>
    </div>
    <form action="#" method="POST" enctype="multipart/form-data">
    <div class="grid_container">
       
        <div class="form_section">
            <h1>General Information</h1>
            <label for="actType">Type of Activity:</label>
            <input type="text" name="actType" id="actType" class="actType" required /><br /><br />

            <label for="actTitle">Title of the Activity:</label>
            <input type="text" name="actTitle" id="actTitle" class="actTitle" required /><br /><br />

            <label for="actDate">Date of the Activity:</label>
            <input type="text" name="actDate" id="actDate" class="actDate" required/><br /><br />

            <label for="actTimeStart">Start Time of the Activity (from):</label>
            <input type="time" name="actTimeStart" id="actTimeStart" class="actTimeStart" required/>

            <label for="actTimeEnd">To:</label>
            <input type="time" name="actTimeEnd" id="actTimeEnd" class="actTimeEnd" required /><br /><br />

            <label for="actVenue">Venue of the Activity:</label>
            <input type="text" name="actVenue" id="actVenue" class="actVenue" required/><br /><br />
            
            <label for="actSponsor">Sponsor/Collaboration (if any):</label>
            <input type="text" name="actSponsor" id="actSponsor" class="actSponsor" required/><br /><br />
        </div>

     
        <div class="form_section" id="speaker_section">
        <h1>Speaker/Guest/Presenter Details</h1>
            <div id="enterSpeaker">
            <label for="numberspeaker">Enter the Number of Speakers: (Range: 1-10)</label>
           <input type="number" id="numberspeaker" name="numberspeaker" required>
           <button id="speakerbtn" onclick="countSpeaker();">Continue</button>
            </div>
            
        </div>

    
        <div class="form_section">
            <h1>Participants Profile</h1>
            <label for="actParticipantsType">Type of Participants:</label>
            <input type="text" name="actParticipantsType" id="actParticipantsType" class="actParticipantsType" required /><br /><br />

            <label for="actParticipantsNo">Number of Participants:</label>
            <input type="text" name="actParticipantsNo" id="actParticipantsNo" class="actParticipantsNo" required /><br /><br />

            <label for="actTeacherParticipantsNo">Teacher:</label>
            <input type="text" name="actTeacherParticipantsNo" id="actTeacherParticipantsNo"
                class="actTeacherParticipantsNo" required/><br /><br />

            <label for="actStudentParticipantsNo">Student:</label>
            <input type="text" name="actStudentParticipantsNo" id="actStudentParticipantsNo"
                class="actStudentParticipantsNo" required/><br /><br />

            <label for="actMaleParticipantsNo">Male:</label>
            <input type="text" name="actMaleParticipantsNo" id="actMaleParticipantsNo" class="actMaleParticipantsNo" required/><br /><br />

            <label for="actFemaleParticipantsNo">Female:</label>
            <input type="text" name="actFemaleParticipantsNo" id="actFemaleParticipantsNo"
                class="actFemaleParticipantsNo" required /><br /><br />
        </div>

     
        <div class="form_section">
            <h1>Synopsis of the Activity (Description)</h1>
            <label for="actHighlights" class="highlight-label">Highlights of the Activity:</label>
            <textarea name="actHighlights" id="actHighlights" class="actHighlights" autosize="true" required></textarea><br /><br />
            <label for="actKeyTakeaways" class="highlight-label">Key Takeaways: required</label>
            <textarea name="actKeyTakeaways" id="actKeyTakeaways" class="actKeyTakeaways" autosize="true" required></textarea><br /><br />

            <label for="actSummary" class="highlight-label">Summary of the Activity:</label>
            <textarea name="actSummary" id="actSummary" class="actSummary" autosize="true" required></textarea><br /><br />

            <label for="actPlan" class="highlight-label" required>Follow-up Plan, if any:</label>
            <textarea name="actPlan" id="actPlan" class="actPlan" autosize="true" required></textarea><br /><br />
        </div>

      
        <div class="form_section">
            <h1>Rapporteur</h1>
            <label for="actRapporteurName">Name of Rapporteur:</label>
            <input type="text" name="actRapporteurName" id="actRapporteurName" class="actRapporteurName" required/><br /><br />

            <label for="actRapporteurEmail">Rapporteur Email:</label>
            <input type="email" name="actRapporteurEmail" id="actRapporteurEmail" class="actRapporteurEmail" required /><br /><br />

            <label for="actRapporteurContact">Rapporteur Phone No.:</label>
            <input type="number" name="actRapporteurContact" id="actRapporteurContact"
                class="actRapporteurContact" required /><br /><br />
        </div>

       
        <div class="form_section" id="imageupload">
            <h1>Descriptive Report</h1>
            <label for="actDescReport" >Enter Description:</label>
            <textarea name="actDescReport" id="actDescReport" class="actDescReport" required></textarea><br /><br />
            <div id="speakerimageupload">
                <div id="enterNum">
                
            </div>
    </div>
            <div id="attendimageupload">
                <div id="enterNum2">
                <label for="actnumattend">Enter the number of attendance sheets (limit: 10)</label>
                <input type="number" id="numattend" name="actnumattend" required>
                <button class="btn" onclick="add_attendance_images();" id="btn2">continue</button>
                </div>
            </div>
            
            <br>
            <br>

            <label for="actGeoTagImg1">Upload Geo Tag Image 1:</label>
            <input type="file" name="actGeoTagImg1" id="actGeoTagImg1" required /><br /><br />

            <label for="actGeoTagImg2">Upload Geo Tag Image 2:</label>
            <input type="file" name="actGeoTagImg2" id="actGeoTagImg2" required /><br /><br />

            <label for="actNorImg1">Upload Normal Image 1:</label>
            <input type="file" name="actNorImg1" id="actNorImg1" required /><br /><br />

            <label for="actNorImg2">Upload Normal Image 2:</label>
            <input type="file" name="actNorImg2" id="actNorImg2" required /><br /><br />
            <label for="poster">Upload Poster Image:</label>
            <input type="file" name="poster" id="poster" required /><br /><br />
            <label for="formimage1">Upload Google Form Image 1:</label>
            <input type="file" name="formimage1" id="formimage1" required /><br /><br />
            <label for="formimage2">Upload Google Form Image 2:</label>
            <input type="file" name="formimage2" id="formimage2"  required/><br /><br />
            <label for="formimage3">Upload Google Form Image 3:</label>
            <input type="file" name="formimage3" id="formimage3" required /><br /><br />
            <label for="formimage4">Upload Google Form Image 4:</label>
            <input type="file" name="formimage4" id="formimage4" required /><br /><br />
            <label for="formimage5">Upload Google Form Image 5:</label>
            <input type="file" name="formimage5" id="formimage5" required /><br /><br />
            <label for="signimage1">Upload Academic Coordinator Signature Image :</label>
            <input type="file" name="signimage1" id="signimage1" required /><br /><br />
            <label for="signimage2">Upload Head of Department Signature Image :</label>
            <input type="file" name="signimage2" id="signimage2" required /><br /><br />
            
        </div>

      
       
            <input type="submit" value="Submit" name="submit"/>
            <input type="reset" value="Reset" />
        
    </div>

    </div>
</form>
<script>
    var loop_check=true;
    function countSpeaker(){
        
        event.returnValue=false;

        if(document.getElementById("numberspeaker").value<=10&&document.getElementById("numberspeaker").value>=1&&loop_check==true){
                var numberspeaker=document.getElementById("numberspeaker").value;
                document.cookie="countspeaker="+numberspeaker;
                var speaker_section=document.getElementById("speaker_section");
                var h2=document.createElement("h2");
                h2.textContent="Upload Speaker Images";
                document.getElementById("speakerimageupload").appendChild(h2);
                var main_label=document.createElement("label");
                main_label.for="actSpeakerPresentationTitle";
                main_label.textContent="Enter Speaker Presentation Title: ";
                speaker_section.appendChild(main_label);
                var presentation=document.createElement("input");
                presentation.type='text';
                presentation.name='actSpeakerPresentationTitle';
                speaker_section.appendChild(presentation);
                var breaker=document.createElement("br");
                speaker_section.appendChild(breaker);
                speaker_section.appendChild(document.createElement("br"));
                for(let i=1; i<=numberspeaker; i++){
                    var label1=document.createElement("label");
                    label1.for=`actSpeakerName${i}`;
                    label1.textContent=`Enter Speaker Name ${i}:`;
                    var input1=document.createElement("input");
                    input1.type="text";
                    input1.required="true";
                    input1.name=`actSpeakerName${i}`;
                    
                    
                    
                    var label2=document.createElement("label");
                    label2.for=`actSpeakerPosition${i}`;
                    label2.textContent=`Enter Speaker Position ${i}:`;
                    var input2=document.createElement("input");
                    input2.type="text";
                    input2.required="true";
                    input2.name=`actSpeakerPosition${i}`;
                    
                    
                    var label3=document.createElement("label");
                    label3.for=`actSpeakerOrganization${i}`;
                    label3.textContent=`Enter Speaker Organization ${i}:`;
                    var input3=document.createElement("input");
                    input3.type="text";
                    input3.required="true";
                    input3.name=`actSpeakerOrganization${i}`;
                    
                    
                    
                    
                    speaker_section.appendChild(label1);
                    speaker_section.appendChild(input1);
                    speaker_section.appendChild(document.createElement("br"));
                    speaker_section.appendChild(label2);
                    speaker_section.appendChild(input2);
                    speaker_section.appendChild(document.createElement("br"));
                    speaker_section.appendChild(label3);
                    speaker_section.appendChild(input3);
                    speaker_section.appendChild(document.createElement("br"));
                    
                    
                    speaker_section.appendChild(document.createElement("br"));
                    var input=document.createElement("input");
                    input.type="file";
                    input.required="true";
            
                    input.name=`numspeaker${i}`;
                    document.getElementById("speakerimageupload").appendChild(input);
                    document.getElementById("speakerimageupload").appendChild(document.createElement("br"));

    
                    
                }
                loop_check=false;
                numspeaker=0;
                document.getElementById("enterSpeaker").style.display="none";
                
        }
    }
    var img_loop_check=true;
    function add_attendance_images(){
        event.returnValue=false;
        if(document.getElementById("numattend").value<=10 && document.getElementById("numattend").value>=1 && img_loop_check){
            
            document.getElementById("enterNum2").style.display="none";
            var h2=document.createElement("h2");
            h2.textContent="Upload Attendance Sheets";
            document.getElementById("attendimageupload").appendChild(h2);
            var numattend=document.getElementById("numattend");
            document.cookie="countAttend="+numattend.value;
       
            for(let i=0; i<numattend.value; i++){
            var input=document.createElement("input");
            input.type="file";
            input.required="true";
            input.name=`numattend${i}`;
            document.getElementById("attendimageupload").appendChild(input);
            document.getElementById("attendimageupload").appendChild(document.createElement("br"));
        
             }
             img_loop_check=false;
        }
        else{
            document.getElementById("numattend").classList.add("error");
        }
       
    }
   
    

</script>

<?php
global $globalspeaker;
global $globalattend;
if(isset($_COOKIE['countspeaker'])) {
    // Access the value of the cookie
    $cookie_value = $_COOKIE['countspeaker'];
    $globalspeaker = $_COOKIE['countspeaker'];
    
} 
if(isset($_COOKIE['countAttend'])) {
    // Access the value of the cookie
    $cookie_value = $_COOKIE['countAttend'];
    $globalattend = $_COOKIE['countAttend'];
    
} 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    session_start();
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test1";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Function to sanitize input data
    function sanitizeInput($data) {
        global $conn;
        return $conn->real_escape_string($data);
    }

    // Sanitize and retrieve form data
    $actType = sanitizeInput($_POST["actType"]);
    $actTitle = sanitizeInput($_POST["actTitle"]);
    $actDate = sanitizeInput($_POST["actDate"]);
    $actTimeStart = sanitizeInput($_POST["actTimeStart"]);
    $actTimeEnd = sanitizeInput($_POST["actTimeEnd"]);
    $actVenue = sanitizeInput($_POST["actVenue"]);
    $actSponsor = sanitizeInput($_POST["actSponsor"]);
    
    

    $actParticipantsType = sanitizeInput($_POST["actParticipantsType"]);
    $actParticipantsNo = sanitizeInput($_POST["actParticipantsNo"]);
    $actTeacherParticipantsNo = sanitizeInput($_POST["actTeacherParticipantsNo"]);
    $actStudentParticipantsNo = sanitizeInput($_POST["actStudentParticipantsNo"]);
    $actMaleParticipantsNo = sanitizeInput($_POST["actMaleParticipantsNo"]);
    $actFemaleParticipantsNo = sanitizeInput($_POST["actFemaleParticipantsNo"]);

    $actHighlights = sanitizeInput($_POST["actHighlights"]);
    $actKeyTakeaways = sanitizeInput($_POST["actKeyTakeaways"]);
    $actSummary = sanitizeInput($_POST["actSummary"]);
    $actPlan = sanitizeInput($_POST["actPlan"]);

    $actRapporteurName = sanitizeInput($_POST["actRapporteurName"]);
    $actRapporteurEmail = sanitizeInput($_POST["actRapporteurEmail"]);
    $actRapporteurContact = sanitizeInput($_POST["actRapporteurContact"]);
    $actSpeakerPresentationTitle=sanitizeInput($_POST['actSpeakerPresentationTitle']);
    $actDescReport = sanitizeInput($_POST["actDescReport"]);

    
    
    $sql="SELECT * FROM testdata;";
    $result=mysqli_query($conn,$sql);
    $j=1;
    function removeIntegers($string) {
        return preg_replace('/\d+/', '', $string);
      }
      
      
      
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            if(removeIntegers($row['actTitle'])==$actTitle){
                    $j++;
            }
        }
    }
    
    $_SESSION['title']="$actTitle$j";

    // Insert data into the database
    $sql = "INSERT INTO testdata
            (actType, actTitle, actDate, actTimeStart, actTimeEnd, actVenue, actSponsor, 
             actParticipantsType, actParticipantsNo, actTeacherParticipantsNo, actStudentParticipantsNo, 
             actMaleParticipantsNo, actFemaleParticipantsNo, actHighlights, actKeyTakeaways, actSummary, 
             actPlan, actRapporteurName, actRapporteurEmail, actRapporteurContact, actDescReport, actSpeakerPresentationTitle)
            VALUES 
            ('$actType', '$actTitle$j', '$actDate', '$actTimeStart', '$actTimeEnd', '$actVenue', '$actSponsor', 
             '$actParticipantsType', '$actParticipantsNo', '$actTeacherParticipantsNo', '$actStudentParticipantsNo', 
             '$actMaleParticipantsNo', '$actFemaleParticipantsNo', '$actHighlights', '$actKeyTakeaways', '$actSummary', 
             '$actPlan', '$actRapporteurName', '$actRapporteurEmail', '$actRapporteurContact', '$actDescReport','$actSpeakerPresentationTitle');";
    for($i=1; $i<=$globalspeaker; $i++){
        $image1 = addslashes(file_get_contents($_FILES["numspeaker$i"]['tmp_name']));
        $imgProp1 = getimagesize($_FILES["numspeaker$i"]['tmp_name']);
        $eventname=$_POST['actTitle'];
        $type="speaker";
        $query="INSERT INTO img_storage 
                (event_name, image_data, datatype, imagetype) VALUES ('$eventname$j', '$image1', '{$imgProp1['mime']}', '$type');";
        mysqli_query($conn, $query);
    }
    for($i=1; $i<=$globalspeaker; $i++){
        $actSpeakerName=sanitizeInput($_POST["actSpeakerName$i"]);
        $actSpeakerPosition=sanitizeInput($_POST["actSpeakerPosition$i"]);
        $actSpeakerOrganization=sanitizeInput($_POST["actSpeakerOrganization$i"]);
        
        $eventname=$_POST['actTitle'];
        $query="INSERT INTO speakers
                (event_name, actSpeakerName, actSpeakerPosition, actSpeakerOrganization) VALUES ('$eventname$j', '$actSpeakerName', '$actSpeakerPosition', '$actSpeakerOrganization');";
        mysqli_query($conn, $query);

    }
    for($i=0; $i<$globalattend; $i++){
        $image1 = addslashes(file_get_contents($_FILES["numattend$i"]['tmp_name']));
        $imgProp1 = getimagesize($_FILES["numattend$i"]['tmp_name']);
        $eventname=$_POST['actTitle'];
        $type="attendance";
        $query="INSERT INTO img_storage 
                (event_name, image_data, datatype, imagetype) VALUES ('$eventname$j', '$image1', '{$imgProp1['mime']}', '$type');";
        mysqli_query($conn, $query);
    }
    
        $eventname=$_POST['actTitle'];
        $image1 = addslashes(file_get_contents($_FILES['actGeoTagImg1']['tmp_name']));
        $imgProp1 = getimagesize($_FILES['actGeoTagImg1']['tmp_name']);
        $type="geotag";
        $random="INSERT INTO img_storage
                 (event_name, image_data, datatype, imagetype) VALUES ('$eventname$j', '$image1', '{$imgProp1['mime']}', '$type' );";
        mysqli_query($conn, $random);
    $image2 = addslashes(file_get_contents($_FILES['actGeoTagImg2']['tmp_name']));
    $imgProp2 = getimagesize($_FILES['actGeoTagImg2']['tmp_name']);
    $type="geotag";
    $random="INSERT INTO img_storage
                 (event_name, image_data, datatype, imagetype) VALUES ('$eventname$j', '$image2', '{$imgProp2['mime']}', '$type' );";
        mysqli_query($conn, $random);
    $image3 = addslashes(file_get_contents($_FILES['actNorImg1']['tmp_name']));
    $imgProp3 = getimagesize($_FILES['actNorImg1']['tmp_name']);
    $type="normal";
    $random="INSERT INTO img_storage
    (event_name, image_data, datatype, imagetype) VALUES ('$eventname$j', '$image3', '{$imgProp3['mime']}', '$type' );";
    mysqli_query($conn, $random);
    $image4 = addslashes(file_get_contents($_FILES['actNorImg2']['tmp_name']));
    $imgProp4 = getimagesize($_FILES['actNorImg2']['tmp_name']);
    $type="normal";
    $random="INSERT INTO img_storage
    (event_name, image_data, datatype, imagetype) VALUES ('$eventname$j', '$image4', '{$imgProp4['mime']}', '$type' );";
    mysqli_query($conn, $random);
    $image4 = addslashes(file_get_contents($_FILES['poster']['tmp_name']));
    $imgProp4 = getimagesize($_FILES['poster']['tmp_name']);
    $type="poster";
    $random="INSERT INTO img_storage
    (event_name, image_data, datatype, imagetype) VALUES ('$eventname$j', '$image4', '{$imgProp4['mime']}', '$type' );";
    mysqli_query($conn, $random);
    $form1 = addslashes(file_get_contents($_FILES['formimage1']['tmp_name']));
    $imgProp4 = getimagesize($_FILES['formimage1']['tmp_name']);
    $type="form";
    $random="INSERT INTO img_storage
    (event_name, image_data, datatype, imagetype) VALUES ('$eventname$j', '$form1', '{$imgProp4['mime']}', '$type' );";
    mysqli_query($conn, $random);
    $form2 = addslashes(file_get_contents($_FILES['formimage2']['tmp_name']));
    $imgProp4 = getimagesize($_FILES['formimage2']['tmp_name']);
    $type="form";
    $random="INSERT INTO img_storage
    (event_name, image_data, datatype, imagetype) VALUES ('$eventname$j', '$form2', '{$imgProp4['mime']}', '$type' );";
    mysqli_query($conn, $random);
    $form3 = addslashes(file_get_contents($_FILES['formimage3']['tmp_name']));
    $imgProp4 = getimagesize($_FILES['formimage3']['tmp_name']);
    $type="form";
    $random="INSERT INTO img_storage
    (event_name, image_data, datatype, imagetype) VALUES ('$eventname$j', '$form3', '{$imgProp4['mime']}', '$type' );";
    mysqli_query($conn, $random);
    $form4 = addslashes(file_get_contents($_FILES['formimage4']['tmp_name']));
    $imgProp4 = getimagesize($_FILES['formimage4']['tmp_name']);
    $type="form";
    $random="INSERT INTO img_storage
    (event_name, image_data, datatype, imagetype) VALUES ('$eventname$j', '$form4', '{$imgProp4['mime']}', '$type' );";
    mysqli_query($conn, $random);
    $form5 = addslashes(file_get_contents($_FILES['formimage5']['tmp_name']));
    $imgProp4 = getimagesize($_FILES['formimage5']['tmp_name']);
    $type="form";
    $random="INSERT INTO img_storage
    (event_name, image_data, datatype, imagetype) VALUES ('$eventname$j', '$form5', '{$imgProp4['mime']}', '$type' );";
    mysqli_query($conn, $random);
    $sign1= addslashes(file_get_contents($_FILES['signimage1']['tmp_name']));
    $sign1Prop= getimagesize($_FILES['signimage1']['tmp_name']);
    $type="signature";
    $random="INSERT INTO img_storage
    (event_name, image_data, datatype, imagetype) VALUES ('$eventname$j', '$sign1', '{$sign1Prop['mime']}', '$type' );";
    mysqli_query($conn, $random);
    $sign2= addslashes(file_get_contents($_FILES['signimage2']['tmp_name']));
    $sign2Prop= getimagesize($_FILES['signimage2']['tmp_name']);
    $type="signature";
    $random="INSERT INTO img_storage
    (event_name, image_data, datatype, imagetype) VALUES ('$eventname$j', '$sign2', '{$sign2Prop['mime']}', '$type' );";
    mysqli_query($conn, $random);
    
    
    if ($conn->query($sql) === TRUE) {
        echo "Form data has been successfully inserted into the database.";
        header("location: report.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}


?>

</body>

</html>