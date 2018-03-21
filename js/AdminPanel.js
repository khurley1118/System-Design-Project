// function setCourses() {
//     $('coursesContent').setAttribute("class", "showDiv");
//     $('accountsContent').setAttribute("class", "hideDiv");
//     $('searchAccount').setAttribute("class", "hideDiv");
//     $('addAccount').setAttribute("class", "hideDiv");
//     $('changePassword').setAttribute("class", "hideDiv");
// }
// function setAccounts() {
//     $('coursesContent').setAttribute("class", "hideDiv");
//     $('accountsContent').setAttribute("class", "showDiv");
//     $('removeCourse').setAttribute("class", "hideDiv");
//     $('addCourse').setAttribute("class", "hideDiv");
//     $('showCourses').setAttribute("class", "hideDiv");
// }
// function addCourse() {
//     $('removeCourse').setAttribute("class", "hideDiv");
//     $('addCourse').setAttribute("class", "showDiv");
//     $('showCourses').setAttribute("class", "hideDiv");
// }
// function removeCourse() {
//     $('addCourse').setAttribute("class", "hideDiv");
//     $('showCourses').setAttribute("class", "hideDiv");
//     $('removeCourse').setAttribute("class", "showDiv");
// }
// function showAllCrs() {
//     $('addCourse').setAttribute("class", "hideDiv");
//     $('removeCourse').setAttribute("class", "hideDiv");
//     $('showCourses').setAttribute("class", "showDiv");
// }
// function addAccount(){
//     $('searchAccount').setAttribute("class", "hideDiv");
//     $('addAccount').setAttribute("class", "showDiv");
//     $('changePassword').setAttribute("class", "hideDiv");
// }
// function searchAccount(){
//     $('addAccount').setAttribute("class", "hideDiv");
//     $('changePassword').setAttribute("class", "hideDiv");
//     $('searchAccount').setAttribute("class", "showDiv");
// }
// function changePassword() {
//     $('addAccount').setAttribute("class", "hideDiv");
//     $('searchAccount').setAttribute("class", "hideDiv");
//     $('changePassword').setAttribute("class", "showDiv");
// }

function resTicket(ticketID) {

  if (ticketID != 0){
    $.ajax({
        type: 'POST',
        url: 'setResolvedFunction.php',
        data: {ticket : ticketID},
        cache: false,
        success: function (dataArray) {
          $('AdmiralSnackbar').innerHTML = 'Ticket has been set to resolved!';
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
        $('ticketDisplay').value = description;
        $('status').value = status;
        $('subBy').value = name;
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
