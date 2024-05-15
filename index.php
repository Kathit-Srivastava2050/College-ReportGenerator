<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automatic Report Generator</title>
    <link rel="stylesheet" href="indexStyling.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">

</head>

<body>
    <div class="header">
        <div class="sidebar" id="sidebar">
            <div id="sidebarTop">
                <header>Options</header>
                <i class="bi bi-list" id="sidebaropen"></i>

            </div>
            <ul>
                <li><span><i class="bi bi-person-fill"></i>DashBoard</span></li>
                <li><span id="ChangeTheme"><i class="bi bi-palette-fill"></i>Change Theme</span>
                    <div id="ThemesList">
                        <h5>Original Theme </h5>
                        <span>
                            <input type="radio" id="OriginalBox" name="Theme" checked>
                            <label for="OriginalBox" class="toggleButton"></label>
                        </span>

                        <h5>Dark Theme </h5>
                        <span>
                            <input type="radio" id="DarkBox" name="Theme">
                            <label for="DarkBox" class="toggleButton"></label>
                        </span>

                        <h5>Light Theme </h5>
                        <span>
                            <input type="radio" id="LightBox" name="Theme">
                            <label for="LightBox" class="toggleButton"></label>
                        </span>

                    </div>
                </li>
                <li><span><i class="bi bi-clock-fill"></i><a href='history.php'>History</a></span></li>
                <li><span><i class="bi bi-key-fill"></i><a href="changePassword.php">Change Password</a></span></li>
            </ul>
        </div>
        <div class="left-header"><img src="logochrist.jpg" class="logo" id="open"></div>
        <div class="right-header">
            <h1>Report Generator CHRIST (Deemed to be University) Delhi NCR</h1>
            <h2>School of Sciences</h2>
        </div>

    </div>
    <form action="#" method="POST" enctype="multipart/form-data" onsubmit="return validateForm();">
        <div class="grid_container">

            <div class="form_section">
                <h1>General Information</h1>
                <label for="actType">Type of Activity:</label>
                <input type="text" name="actType" id="actType" class="actType" onblur="changeBackgroundColor('actType')" required /><br /><br />

                <label for="actTitle">Title of the Activity:</label>
                <input type="text" name="actTitle" id="actTitle" class="actTitle" onblur="changeBackgroundColor('actTitle')" required /><br /><br />

                <label for="actDate">Date of the Activity:</label>
                <input type="text" name="actDate" id="actDate" class="actDate" onblur="changeBackgroundColor('actDate')" required /><br /><br />

                <label for="actTimeStart">Start Time of the Activity (from):</label>
                <input type="time" name="actTimeStart" id="actTimeStart" class="actTimeStart" onblur="changeBackgroundColor('actTimeStart')" required />

                <label for="actTimeEnd">To:</label>
                <input type="time" name="actTimeEnd" id="actTimeEnd" class="actTimeEnd" onblur="changeBackgroundColor('actTimeEnd')" required /><br /><br />

                <label for="actVenue">Venue of the Activity:</label>
                <input type="text" name="actVenue" id="actVenue" class="actVenue" onblur="changeBackgroundColor('actVenue')" required /><br /><br />

                <label for="actSponsor">Sponsor/Collaboration (if any):</label>
                <input type="text" name="actSponsor" id="actSponsor" class="actSponsor" onblur="changeBackgroundColor('actSponsor')" required /><br /><br />
            </div>


            <div class="form_section" id="speaker_section">
                <h1>Speaker/Guest/Presenter Details</h1>
                <div id="enterSpeaker">
                    <label for="numberspeaker">Number of Speakers: (Range: 1-10)</label>
                    <input type="number" id="numberspeaker" name="numberspeaker" onblur="changeBackgroundColor('numberspeaker')" required>
                    <button id="speakerbtn" onclick="countSpeaker();">Continue</button>
                </div>

            </div>


            <div class="form_section">
                <h1>Participants Profile</h1>
                <label for="actParticipantsType">Type of Participants:</label>
                <input type="text" name="actParticipantsType" id="actParticipantsType" class="actParticipantsType" onblur="changeBackgroundColor('actParticipantsType')" required /><br /><br />

                <label for="actParticipantsNo">Number of Participants:</label>
                <input type="number" name="actParticipantsNo" id="actParticipantsNo" class="actParticipantsNo" onblur="changeBackgroundColor('actParticipantsNo')" required /><br /><br />

                <label for="actTeacherParticipantsNo">Teacher:</label>
                <input type="number" name="actTeacherParticipantsNo" id="actTeacherParticipantsNo" class="actTeacherParticipantsNo" onblur="changeBackgroundColor('actTeacherParticipantsNo')" oninput="calculateSum();" required /><br /><br />
                <p id="error1" style="display: none">*The Amount of Teachers cannot be more than the amount of Total Participants*</p>
                <label for="actStudentParticipantsNo">Student:</label>
                <input type="number" name="actStudentParticipantsNo" id="actStudentParticipantsNo" class="actStudentParticipantsNo" onblur="changeBackgroundColor('actStudentParticipantsNo')" required readonly value="0" /><br /><br />

                <label for="actMaleParticipantsNo">Male:</label>
                <input type="number" name="actMaleParticipantsNo" id="actMaleParticipantsNo" class="actMaleParticipantsNo" onblur="changeBackgroundColor('actMaleParticipantsNo')" oninput="calculateGender();" required /><br /><br />
                <p id="error2" style="display: none">*The Amount of Male Students cannot be more than the amount of Total Students*</p>
                <label for="actFemaleParticipantsNo">Female:</label>
                <input type="number" name="actFemaleParticipantsNo" id="actFemaleParticipantsNo" class="actFemaleParticipantsNo" onblur="changeBackgroundColor('actFemaleParticipantsNo')" required readonly value="0" /><br /><br />
            </div>


            <div class="form_section">
                <h1>Synopsis of the Activity (Description)</h1>
                <label for="actHighlights" class="highlight-label">Highlights of the Activity:</label>
                <textarea name="actHighlights" id="actHighlights" class="actHighlights" autosize="true" onblur="changeBackgroundColor('actHighlights')" required></textarea><br /><br />
                <label for="actKeyTakeaways" class="highlight-label">Key Takeaways: required</label>
                <textarea name="actKeyTakeaways" id="actKeyTakeaways" class="actKeyTakeaways" autosize="true" onblur="changeBackgroundColor('actKeyTakeaways')" required></textarea><br /><br />

                <label for="actSummary" class="highlight-label">Summary of the Activity:</label>
                <textarea name="actSummary" id="actSummary" class="actSummary" autosize="true" onblur="changeBackgroundColor('actSummary')" required></textarea><br /><br />

                <label for="actPlan" class="highlight-label" required>Follow-up Plan, if any:</label>
                <textarea name="actPlan" id="actPlan" class="actPlan" autosize="true" onblur="changeBackgroundColor('actPlan')" required></textarea><br /><br />
            </div>


            <div class="form_section">
                <h1>Rapporteur</h1>
                <label for="actRapporteurName">Name of Rapporteur:</label>
                <input type="text" name="actRapporteurName" id="actRapporteurName" class="actRapporteurName" onblur="changeBackgroundColor('actRapporteurName')" required></textarea><br />
                <br /><br />

                <label for="actRapporteurEmail">Rapporteur Email:</label>
                <input type="email" name="actRapporteurEmail" id="actRapporteurEmail" class="actRapporteurEmail" onblur="changeBackgroundColor('actRapporteurEmail')" required /><br /><br />

                <label for="actRapporteurContact">Rapporteur Phone No.:</label>
                <input type="number" name="actRapporteurContact" id="actRapporteurContact" class="actRapporteurContact" onblur="changeBackgroundColor('actRapporteurContact')" required /><br /><br />
            </div>


            <div class="form_section" id="imageupload">
                <h1>Descriptive Report</h1>
                <label for="actDescReport">Enter Description:</label>
                <textarea name="actDescReport" id="actDescReport" class="actDescReport" onblur="changeBackgroundColor('actDescReport')" required></textarea><br /><br />
                <div id="speakerimageupload">
                    <div id="enterNum">

                    </div>
                </div>
                <div id="attendimageupload">
                    <div id="enterNum2">
                        <label for="actnumattend">Number of attendance sheets (limit: 10)</label>
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
                <input type="file" name="formimage2" id="formimage2" required /><br /><br />
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



            <input type="submit" value="Submit" name="submit" />
            <input type="reset" value="Reset" />

        </div>

        <div class="footer" id="footer">
            <div id="Credits">
                <h3 id="CreditsHeading">Made By: </h3>
                <ul>
                    <li>Kathit Srivastava 2BCA-B</li>
                    <li>KR Varun 2BCA-B</li>
                    <li>Aditya Sebastian 4BCA-A</li>
                    <li>Anmol Garg 4BCA-A</li>
                </ul>
            </div>
        </div>
        </div>
    </form>
    <script>
        var loop_check = true;
        var flag1 = true;
        var flag2 = true;

        function countSpeaker() {

            event.returnValue = false;

            if (document.getElementById("numberspeaker").value <= 10 && document.getElementById("numberspeaker").value >=
                1 && loop_check == true) {
                var numberspeaker = document.getElementById("numberspeaker").value;
                document.cookie = "countspeaker=" + numberspeaker;
                var speaker_section = document.getElementById("speaker_section");
                var h2 = document.createElement("h2");
                h2.textContent = "Upload Speaker Images";
                document.getElementById("speakerimageupload").appendChild(h2);
                var main_label = document.createElement("label");
                main_label.for = "actSpeakerPresentationTitle";
                main_label.textContent = "Enter Speaker Presentation Title: ";
                speaker_section.appendChild(main_label);
                var presentation = document.createElement("input");
                presentation.type = 'text';
                presentation.name = 'actSpeakerPresentationTitle';
                presentation.id = "presentation";
                presentation.addEventListener('blur', function() {
                    changeBackgroundColor('presentation');
                });
                speaker_section.appendChild(presentation);
                var breaker = document.createElement("br");
                speaker_section.appendChild(breaker);
                speaker_section.appendChild(document.createElement("br"));

                for (let i = 1; i <= numberspeaker; i++) {
                    (function(index) {
                        var label1 = document.createElement("label");
                        label1.for = `actSpeakerName${index}`;
                        label1.textContent = `Enter Speaker Name ${index}:`;
                        var input1 = document.createElement("input");
                        input1.type = "text";
                        input1.required = "true";
                        input1.name = `actSpeakerName${index}`;
                        input1.id = `speakerInput_${index}`;
                        input1.addEventListener('blur', function() {
                            changeBackgroundColor(`speakerInput_${index}`);
                        });

                        var label2 = document.createElement("label");
                        label2.for = `actSpeakerPosition${index}`;
                        label2.textContent = `Enter Speaker Position ${index}:`;
                        var input2 = document.createElement("input");
                        input2.type = "text";
                        input2.required = "true";
                        input2.name = `actSpeakerPosition${index}`;
                        input2.id = `speakerInput_Position_${index}`;
                        input2.addEventListener('blur', function() {
                            changeBackgroundColor(`speakerInput_Position_${index}`);
                        });

                        var label3 = document.createElement("label");
                        label3.for = `actSpeakerOrganization${index}`;
                        label3.textContent = `Enter Speaker Organization ${index}:`;
                        var input3 = document.createElement("input");
                        input3.type = "text";
                        input3.required = "true";
                        input3.name = `actSpeakerOrganization${index}`;
                        input3.id = `speakerInput_Organization_${index}`;
                        input3.addEventListener('blur', function() {
                            changeBackgroundColor(`speakerInput_Organization_${index}`);
                        });

                        speaker_section.appendChild(label1);
                        speaker_section.appendChild(input1);
                        speaker_section.appendChild(document.createElement("br"));
                        speaker_section.appendChild(label2);
                        speaker_section.appendChild(input2);
                        speaker_section.appendChild(document.createElement("br"));
                        speaker_section.appendChild(label3);
                        speaker_section.appendChild(input3);
                        speaker_section.appendChild(document.createElement("br"));
                    })(i);


                    speaker_section.appendChild(document.createElement("br"));
                    var input = document.createElement("input");
                    input.type = "file";
                    input.required = "true";


                    input.name = `numspeaker${i}`;
                    document.getElementById("speakerimageupload").appendChild(input);
                    document.getElementById("speakerimageupload").appendChild(document.createElement("br"));
                }




                loop_check = false;
                numspeaker = 0;
                document.getElementById("enterSpeaker").style.display = "none";
            }
        }




        var img_loop_check = true;

        function add_attendance_images() {
            event.returnValue = false;
            if (document.getElementById("numattend").value <= 10 && document.getElementById("numattend").value >= 1 &&
                img_loop_check) {

                document.getElementById("enterNum2").style.display = "none";
                var h2 = document.createElement("h2");
                h2.textContent = "Upload Attendance Sheets";
                document.getElementById("attendimageupload").appendChild(h2);
                var numattend = document.getElementById("numattend");
                document.cookie = "countAttend=" + numattend.value;

                for (let i = 0; i < numattend.value; i++) {
                    var input = document.createElement("input");
                    input.type = "file";
                    input.required = "true";
                    input.name = `numattend${i}`;
                    document.getElementById("attendimageupload").appendChild(input);
                    document.getElementById("attendimageupload").appendChild(document.createElement("br"));

                }
                img_loop_check = false;
            } else {
                document.getElementById("numattend").classList.add("error");
            }

        }
        document.getElementById("actRapporteurContact").addEventListener("keydown", function(event) {

            if (event.keyCode === 38 || event.keyCode === 40) {
                event.preventDefault();
            }
            var value = event.target.value;

            value = value.replace(/[^\d]/g, '');
            event.target.value = value;
        });

        function changeBackgroundColor(inputId) {
            var inputField = document.getElementById(inputId);
            var inputValue = inputField.value.trim();

            if (inputValue !== "") {
                inputField.style.backgroundColor = "lightblue";
            } else {
                inputField.style.backgroundColor = "";
            }
        }
        var themelistdisplay = false;
        document.addEventListener('DOMContentLoaded', function() {
            var sidebar = document.getElementById('sidebar');
            var openIcon = document.getElementById('open');
            var sidebarOpenIcon = document.getElementById('sidebaropen');
            var sidebarVisible = false;

            document.body.addEventListener("keydown", function(event) {
                if (event.key === "Escape" && sidebarVisible) {
                    toggleSidebar();
                    isSidebarOpen = false;
                }
            });

            openIcon.addEventListener('click', function() {
                toggleSidebar();
                if (themelistdisplay) {
                    ShowThemesList();
                }
            });

            sidebarOpenIcon.addEventListener('click', function() {
                toggleSidebar();
                if (themelistdisplay) {
                    ShowThemesList();
                }
            });

            function toggleSidebar() {
                if (!sidebarVisible) {
                    sidebar.style.left = "0vw";
                    sidebarVisible = true;
                } else {
                    sidebar.style.left = "-20vw";
                    sidebarVisible = false;
                }
            }
        });

        var counter = document.getElementById("actParticipantsNo");
        counter.addEventListener("input", calculateSum);


        var teacher = document.getElementById("actTeacherParticipantsNo");
        var maleCount = document.getElementById("actMaleParticipantsNo");
        teacher.addEventListener("input", function() {
            if (teacher.value !== "") {
                maleCount.disabled = false;
            } else {
                maleCount.disabled = true;
            }
        });

        function calculateSum() {
            /*console.log("Debugging and Function kicking in right now");*/
            var total = document.getElementById("actParticipantsNo").value;
            var teacher = document.getElementById("actTeacherParticipantsNo").value;
            var student = document.getElementById("actStudentParticipantsNo");
            var error1 = document.getElementById("error1");

            if (parseInt(teacher) > parseInt(total)) {
                error1.style.display = "block";
                error1.style.color = "red";
                flag1 = false;
            } else {
                error1.style.display = "none";
                student.value = parseInt(total - teacher);
                flag1 = true;

            }
            calculateGender();
        }

        function calculateGender() {

            document.getElementById("actMaleParticipantsNo").disabled = false;
            var male = document.getElementById("actMaleParticipantsNo").value;
            var student = document.getElementById("actStudentParticipantsNo").value;
            var female = document.getElementById("actFemaleParticipantsNo");
            var error2 = document.getElementById("error2");
            if (parseInt(male) > parseInt(student)) {
                error2.style.display = "block";
                error2.style.color = "red";
                flag2 = false;
            } else {
                error2.style.display = "none";
                female.value = parseInt(student - male);
                flag2 = true;
            }





        }

        function validateForm() {
            if (flag1 == true && flag2 == true) {
                return true;
            } else {
                return false;
            }
        }

        function ShowThemesList() {
            const changeTheme = document.getElementById("ThemesList");
            if (!themelistdisplay) {
                changeTheme.classList.add("show");
                themelistdisplay = true;
            } else {
                changeTheme.classList.remove("show");
                themelistdisplay = false;
            }
        }
        document.getElementById("ChangeTheme").addEventListener("click", ShowThemesList);

        const original = document.getElementById("OriginalBox");
        const dark = document.getElementById("DarkBox");
        const light = document.getElementById("LightBox");

        function changeTheme() {
            if (dark.checked) {
                document.body.classList.add('dark-theme');
                document.body.classList.remove('light-theme');
            } else if (light.checked) {
                document.body.classList.add('light-theme');
                document.body.classList.remove('dark-theme');
            } else {
                document.body.classList.remove('dark-theme');
                document.body.classList.remove('light-theme');
            }
        }

        dark.addEventListener("change", changeTheme);
        original.addEventListener("change", changeTheme);
        light.addEventListener("change", changeTheme);
    </script>

    <?php
    global $globalspeaker;
    global $globalattend;
    if (isset($_COOKIE['countspeaker'])) {
        // Access the value of the cookie
        $cookie_value = $_COOKIE['countspeaker'];
        $globalspeaker = $_COOKIE['countspeaker'];
    }
    if (isset($_COOKIE['countAttend'])) {
        // Access the value of the cookie
        $cookie_value = $_COOKIE['countAttend'];
        $globalattend = $_COOKIE['countAttend'];
    }




    if ($_SERVER["REQUEST_METHOD"] == "POST") {




        session_start();

        $lifeSpan = ini_get('session.gc_maxlifetime');
        $elapsedTime = time();
        $startTime = $_SESSION['activity'];
        if (isset($_SESSION['user_id']) && isset($_SESSION['user_name']) && isset($_SESSION['activity']) && $elapsedTime - $startTime < $lifeSpan - 60) {

            // Database connection details
            $servername = "127.0.0.1:3306";
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
            function sanitizeInput($data)
            {
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
            $actSpeakerPresentationTitle = sanitizeInput($_POST['actSpeakerPresentationTitle']);
            $actDescReport = sanitizeInput($_POST["actDescReport"]);
            $sql = "SELECT * FROM testdata;";
            $result = mysqli_query($conn, $sql);
            $countvalue = mysqli_num_rows($result);
            $countvalue++;

            $_SESSION['rowcounter'] = $countvalue;

            // Insert data into the database
            $sql = "INSERT INTO testdata
            (actType, actTitle, actDate, actTimeStart, actTimeEnd, actVenue, actSponsor, 
             actParticipantsType, actParticipantsNo, actTeacherParticipantsNo, actStudentParticipantsNo, 
             actMaleParticipantsNo, actFemaleParticipantsNo, actHighlights, actKeyTakeaways, actSummary, 
             actPlan, actRapporteurName, actRapporteurEmail, actRapporteurContact, actDescReport, actSpeakerPresentationTitle)
            VALUES 
            ('$actType', '$actTitle', '$actDate', '$actTimeStart', '$actTimeEnd', '$actVenue', '$actSponsor', 
             '$actParticipantsType', '$actParticipantsNo', '$actTeacherParticipantsNo', '$actStudentParticipantsNo', 
             '$actMaleParticipantsNo', '$actFemaleParticipantsNo', '$actHighlights', '$actKeyTakeaways', '$actSummary', 
             '$actPlan', '$actRapporteurName', '$actRapporteurEmail', '$actRapporteurContact', '$actDescReport','$actSpeakerPresentationTitle');";
            for ($i = 1; $i <= $globalspeaker; $i++) {
                $filename = $_FILES["numspeaker$i"]['name'];
                $tempname = $_FILES["numspeaker$i"]['tmp_name'];
                $directory = 'Photos/' . $filename;
                move_uploaded_file($tempname, $directory);
                $eventname = $actTitle;
                $type = "speaker";
                $query = "INSERT INTO img_storage 
                (id, event_name, img_name, imagetype) VALUES ('$countvalue','$eventname', '$filename', '$type');";
                mysqli_query($conn, $query);
            }
            for ($i = 1; $i <= $globalspeaker; $i++) {
                $actSpeakerName = sanitizeInput($_POST["actSpeakerName$i"]);
                $actSpeakerPosition = sanitizeInput($_POST["actSpeakerPosition$i"]);
                $actSpeakerOrganization = sanitizeInput($_POST["actSpeakerOrganization$i"]);

                $eventname = $_POST['actTitle'];
                $query = "INSERT INTO speakers
                (id, event_name, actSpeakerName, actSpeakerPosition, actSpeakerOrganization) VALUES ('$countvalue','$eventname', '$actSpeakerName', '$actSpeakerPosition', '$actSpeakerOrganization');";
                mysqli_query($conn, $query);
            }
            for ($i = 0; $i < $globalattend; $i++) {
                $filename = $_FILES["numattend$i"]['name'];
                $tempname = $_FILES["numattend$i"]['tmp_name'];
                $directory = 'Photos/' . $filename;
                move_uploaded_file($tempname, $directory);
                $eventname = $_POST['actTitle'];
                $type = "attendance";
                $query = "INSERT INTO img_storage 
                (id, event_name, img_name, imagetype) VALUES ('$countvalue','$eventname', '$filename', '$type');";
                mysqli_query($conn, $query);
            }

            $eventname = $_POST['actTitle'];
            $filename = $_FILES['actGeoTagImg1']['name'];
            $tempname = $_FILES['actGeoTagImg1']['tmp_name'];
            $directory = 'Photos/' . $filename;
            move_uploaded_file($tempname, $directory);
            $type = "geotag";
            $random = "INSERT INTO img_storage
                 (id, event_name, img_name, imagetype) VALUES ('$countvalue','$eventname', '$filename', '$type' );";
            mysqli_query($conn, $random);


            $filename = $_FILES['actGeoTagImg2']['name'];
            $tempname = $_FILES['actGeoTagImg2']['tmp_name'];
            $directory = 'Photos/' . $filename;
            move_uploaded_file($tempname, $directory);
            $type = "geotag";
            $random = "INSERT INTO img_storage
                 (id, event_name, img_name, imagetype) VALUES ('$countvalue','$eventname','$filename', '$type' );";
            mysqli_query($conn, $random);


            $filename = $_FILES['actNorImg1']['name'];
            $tempname = $_FILES['actNorImg1']['tmp_name'];
            $directory = 'Photos/' . $filename;
            move_uploaded_file($tempname, $directory);
            $type = "normal";
            $random = "INSERT INTO img_storage
    (id, event_name, img_name, imagetype) VALUES ('$countvalue','$eventname', '$filename', '$type' );";
            mysqli_query($conn, $random);



            $filename = $_FILES['actNorImg2']['name'];
            $tempname = $_FILES['actNorImg2']['tmp_name'];
            $directory = 'Photos/' . $filename;
            move_uploaded_file($tempname, $directory);
            $type = "normal";
            $random = "INSERT INTO img_storage
    (id, event_name, img_name, imagetype) VALUES ('$countvalue','$eventname', '$filename', '$type' );";
            mysqli_query($conn, $random);



            $filename = $_FILES['poster']['name'];
            $tempname = $_FILES['poster']['tmp_name'];
            $directory = 'Photos/' . $filename;
            move_uploaded_file($tempname, $directory);
            $type = "poster";
            $random = "INSERT INTO img_storage
    (id, event_name, img_name, imagetype) VALUES ('$countvalue','$eventname', '$filename', '$type' );";
            mysqli_query($conn, $random);


            $filename = $_FILES['formimage1']['name'];
            $tempname = $_FILES['formimage1']['tmp_name'];
            $directory = 'Photos/' . $filename;
            move_uploaded_file($tempname, $directory);
            $type = "form";
            $random = "INSERT INTO img_storage
    (id, event_name, img_name, imagetype) VALUES ('$countvalue','$eventname', '$filename', '$type' );";
            mysqli_query($conn, $random);



            $filename = $_FILES['formimage2']['name'];
            $tempname = $_FILES['formimage2']['tmp_name'];
            $directory = 'Photos/' . $filename;
            move_uploaded_file($tempname, $directory);
            $type = "form";
            $random = "INSERT INTO img_storage
    (id, event_name, img_name, imagetype) VALUES ('$countvalue','$eventname', '$filename', '$type' );";
            mysqli_query($conn, $random);



            $filename = $_FILES['formimage3']['name'];
            $tempname = $_FILES['formimage3']['tmp_name'];
            $directory = 'Photos/' . $filename;
            move_uploaded_file($tempname, $directory);
            $type = "form";
            $random = "INSERT INTO img_storage
    (id, event_name, img_name, imagetype) VALUES ('$countvalue','$eventname', '$filename', '$type' );";
            mysqli_query($conn, $random);



            $filename = $_FILES['formimage4']['name'];
            $tempname = $_FILES['formimage4']['tmp_name'];
            $directory = 'Photos/' . $filename;
            move_uploaded_file($tempname, $directory);
            $type = "form";
            $random = "INSERT INTO img_storage
    (id, event_name, img_name, imagetype) VALUES ('$countvalue','$eventname', '$filename', '$type' );";
            mysqli_query($conn, $random);



            $filename = $_FILES['formimage5']['name'];
            $tempname = $_FILES['formimage5']['tmp_name'];
            $directory = 'Photos/' . $filename;
            move_uploaded_file($tempname, $directory);
            $type = "form";
            $random = "INSERT INTO img_storage
    (id, event_name, img_name, imagetype) VALUES ('$countvalue','$eventname', '$filename', '$type' );";
            mysqli_query($conn, $random);



            $filename = $_FILES['signimage1']['name'];
            $tempname = $_FILES['signimage1']['tmp_name'];
            $directory = 'Photos/' . $filename;
            move_uploaded_file($tempname, $directory);
            $type = "signature";
            $random = "INSERT INTO img_storage
    (id, event_name, img_name, imagetype) VALUES ('$countvalue','$eventname', '$filename', '$type' );";
            mysqli_query($conn, $random);



            $filename = $_FILES['signimage2']['name'];
            $tempname = $_FILES['signimage2']['tmp_name'];
            $directory = 'Photos/' . $filename;
            move_uploaded_file($tempname, $directory);
            $type = "signature";
            $random = "INSERT INTO img_storage
    (id, event_name, img_name, imagetype) VALUES ('$countvalue','$eventname', '$filename', '$type' );";
            mysqli_query($conn, $random);



            $storename = $_SESSION['user_name'];
            $storeid = $_SESSION['user_id'];
            $currentDate = date('Y-m-d');
            $sqlQuery = "INSERT INTO transactions
        (user_id, username, eventname, date_of_generation) VALUES ('$storeid','$storename','$eventname','$currentDate');";
            mysqli_query($conn, $sqlQuery);
            if ($conn->query($sql) === TRUE) {
                echo "Form data has been successfully inserted into the database.";
                header("Location:report.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        } else {
            header("Location:Redirect.php");
        }
    }





    ?>

</body>

</html>