<!doctype html>
<html>
    <head>
      <link rel="stylesheet" type="text/css"href="css/chatGUI.css">
      <script src="js/chatGUI.js"></script>
    </head>
    <body>
<div class="chat-sidebar">
              <?php
                $currentUserID = $_SESSION['userID'];

                $studentIDnums = DLfetchAllStudentIDs($con);

                foreach ($studentIDnums as $stuID){
                  //make the names dynamic with the id num
                  if($stuID['studentId'] != $currentUserID){

                    $studentName = utilStudentFirst($con, $stuID['studentId']) . " " . utilStudentLast($con, $stuID['studentId']);
                    $studentID = $stuID['studentId'];

                    $element = '<div class="sidebar-name">';
                    $element = $element . '<a href="javascript:register_popup(\'' . $studentID . '\',\'' . $studentName . '\' );">';
                    $element = $element . '<img width="30" height="30" src="Resources/th.jpeg" />';
                    $element = $element . '<span> ' . $studentName . '</span></a></div>';
                    echo $element;
                  }
                }
                ?>
        </div>
    </body>
</html>
