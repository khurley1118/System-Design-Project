function setCourses() {
    document.getElementById('coursesContent').setAttribute("class", "showDiv");
    document.getElementById('accountsContent').setAttribute("class", "hideDiv");
    document.getElementById('searchAccount').setAttribute("class", "hideDiv");
    document.getElementById('addAccount').setAttribute("class", "hideDiv");
    document.getElementById('changePassword').setAttribute("class", "hideDiv");
}
function setAccounts() {
    document.getElementById('coursesContent').setAttribute("class", "hideDiv");
    document.getElementById('accountsContent').setAttribute("class", "showDiv");
    document.getElementById('removeCourse').setAttribute("class", "hideDiv");
    document.getElementById('addCourse').setAttribute("class", "hideDiv");
    document.getElementById('showCourses').setAttribute("class", "hideDiv");
}
function addCourse() {
    document.getElementById('removeCourse').setAttribute("class", "hideDiv");
    document.getElementById('addCourse').setAttribute("class", "showDiv");
    document.getElementById('showCourses').setAttribute("class", "hideDiv");
}
function removeCourse() {
    document.getElementById('addCourse').setAttribute("class", "hideDiv");
    document.getElementById('showCourses').setAttribute("class", "hideDiv");
    document.getElementById('removeCourse').setAttribute("class", "showDiv");
}
function showAllCrs() {
    document.getElementById('addCourse').setAttribute("class", "hideDiv");
    document.getElementById('removeCourse').setAttribute("class", "hideDiv");
    document.getElementById('showCourses').setAttribute("class", "showDiv");
}
function addAccount(){
    document.getElementById('searchAccount').setAttribute("class", "hideDiv");
    document.getElementById('addAccount').setAttribute("class", "showDiv");
    document.getElementById('changePassword').setAttribute("class", "hideDiv");
}
function searchAccount(){
    document.getElementById('addAccount').setAttribute("class", "hideDiv");
    document.getElementById('changePassword').setAttribute("class", "hideDiv");
    document.getElementById('searchAccount').setAttribute("class", "showDiv");
}
function changePassword() {
    document.getElementById('addAccount').setAttribute("class", "hideDiv");
    document.getElementById('searchAccount').setAttribute("class", "hideDiv");
    document.getElementById('changePassword').setAttribute("class", "showDiv");
}

function resTicket(ticketID) {

  if (ticketID != 0){
    $.ajax({
        type: 'POST',
        url: 'setResolvedFunction.php',
        data: {ticket : ticketID},
        cache: false,
        success: function (dataArray) {
           document.getElementById('AdmiralSnackbar').innerHTML = 'Ticket has been set to resolved!';
          myFunction();
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + thrownError);
            return false;
        }
    }); // end ajax call
  } else {
    alert("Please select a ticket to resolve first!");
  }
}

function retrieveTicket(ticketID) {
  $.ajax({
      type: 'POST',
      url: 'getTicketsFunction.php',
      data: {ticket : ticketID},
      cache: false,
      success: function (dataArray) {
        var data = JSON.parse(dataArray);
        var name = data[0];
        var description = data[1];
        var status = data[2];
        document.getElementById('ticketDisplay').value = description;
        document.getElementById('status').value = status;
        document.getElementById('subBy').value = name;
      },
      error: function (xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + thrownError);
          return false;
      }
  }); // end ajax call

  function limitText(limitField, limitNum) {
      if (limitField.value.length > limitNum) {
          limitField.value = limitField.value.substring(0, limitNum);
      }
  }
}

function retrieveCourse(courseID){
  $.ajax({
      type: 'POST',
      url: 'getCourseInfo.php',
      data: {idNum : courseID},
      cache: false,
      success: function (dataArray) {
        var data = JSON.parse(dataArray);
        var courseDesc = data[0];
        var instructor = data[1];
        if(instructor != null){
          document.getElementById('selectInstructorOps').value = instructor;
        }
        else{
          document.getElementById('selectInstructorOps').value = 1;
        }
        document.getElementById('courseDescInput').value = courseDesc;

      },
      error: function (xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + thrownError);
          return false;
      }
  }); // end ajax call
}

function editACourse(){
  var courseId = document.getElementById('coursesList').options[document.getElementById("coursesList").selectedIndex].value;
  var instructorId = document.getElementById('selectInstructorOps').options[document.getElementById("selectInstructorOps").selectedIndex].value;
  var corDesc = document.getElementById('courseDescInput').value;
  $.ajax({
      type: 'POST',
      url: 'adminEditCourse.php',
      data: {instId : instructorId, corId : courseId, corDesc : corDesc},
      cache: false,
      success: function (data) {
        var data = JSON.parse(data);
        document.getElementById('AdmiralSnackbar').innerHTML = data;
        myFunction();
        retrieveCourse(courseId);
      },
      error: function (xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + thrownError);
          return false;
      }
  }); // end ajax call

  }
  function getUserInfoAdmin(){
    var useriD = document.getElementById('userIdAddRemove').value;
    var userType = document.getElementById('userTypeAddRemove').value;
    //alert(courseId + " " + instructorId + " " + corDesc);
    $.ajax({
        type: 'POST',
        url: 'getUserInfo.php',
        data: {getUserID : userId, userType : userType},
        cache: false,
        success: function (dataArray) {
          alert(data);
          var data = JSON.parse(data);
          document.getElementById('AdmiralSnackbar').innerHTML = data;
          myFunction();
          retrieveCourse(courseId);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + thrownError);
            return false;
        }
    }); // end ajax call

    }
