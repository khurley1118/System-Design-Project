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
  //ajax call to reserve a ticket without refreshing the page
  if (ticketID != 0){
    $.ajax({
        //pass by POST ticketID by ticket
        type: 'POST',
        url: 'setResolvedFunction.php',
        data: {ticket : ticketID},
        cache: false,
        success: function (dataArray) {
          //on success call snackbar for user feedback
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
  //ajax call for retrieving a specific ticket without refreshing the page
  $.ajax({
      //send by POST ticketID by ticket
      type: 'POST',
      url: 'getTicketsFunction.php',
      data: {ticket : ticketID},
      cache: false,
      success: function (dataArray) {
        //on success parse JSON array into JS array, assign value to elements for display
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
