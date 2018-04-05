<!doctype html>
<html>
    <head>
      <link rel="stylesheet" type="text/css"href="css/chatGUI.css">
      <script src="js/chatGUI.js"></script>
    </head>
    <body>
<div class="chat-sidebar" id="chatWindow">
  <div id="chatTitle">
    Chat
  </div>
  <div id="innerDiv">

              <?php
                $currentUserID = $_SESSION['userID'];

                $instructorIDNums = DLfetchAllInstructorIDs($con);
                $studentIDnums = DLfetchAllStudentIDs($con);
                $noStudents = true;
                $noInstructors = true;
                ?>
                <h4 class="sidebar-heading"><p class="glyphicon glyphicon-apple"></p>Instructors</h4>
                <?php
                foreach ($instructorIDNums as $instID){
                  if($instID['instructorId'] != $currentUserID){
                    $noInstructors = false;
                    $instructorName = utilInstructorFirst($con, $instID['instructorId']) . " " . utilInstructorLast($con, $instID['instructorId']);
                    $instructorID = $instID['instructorId'];
                    $instructorAvatar = utilGetAvatarInstructor($con, $instructorID);
                    if (utilCheckAvatar($instructorAvatar) == false){
                      $instructorAvatar = "Resources\Default.png";
                    }

                    $element = '<div class="sidebar-name">';
                    $element = $element . '<a href="javascript:register_popup(\'' . $instructorID . '\',\'' . $instructorName . '\' );">';
                    $element = $element . '<img id="chatImg" width="30" height="30" src="' . $instructorAvatar . '" />';
                    $element = $element . '<span> ' . $instructorName . '</span></a></div>';
                    echo $element;
                  }
                }
                if($noInstructors == true){
                  echo"No Instructors available";
                }
                ?>
                <h4 class="sidebar-heading"><p class="glyphicon glyphicon-leaf"></p>Students</h4>
                <?php
                foreach ($studentIDnums as $stuID){
                  if($stuID['studentId'] != $currentUserID){
                    $noStudents = false;
                    $studentName = utilStudentFirst($con, $stuID['studentId']) . " " . utilStudentLast($con, $stuID['studentId']);
                    $studentID = $stuID['studentId'];
                    $studentAvatar = utilGetAvatarStudent($con, $studentID);
                    if (utilCheckAvatar($studentAvatar) == false){
                      $studentAvatar = "Resources\Default.png";
                    }
                    $element = '<div class="sidebar-name">';
                    $element = $element . '<a href="javascript:register_popup(\'' . $studentID . '\',\'' . $studentName . '\' );">';
                    $element = $element . '<img id="chatImg" width="30" height="30" src="' . $studentAvatar . '" />';
                    $element = $element . '<span> ' . $studentName . '</span></a></div>';
                    echo $element;
                  }
                }
                if($noStudents == true){
                  echo"No Students available";
                }
                ?>
              </div>
        </div>
    </body>
</html>
