function addCourse() {
  $('addCourse').setAttribute("class", "showDiv");
  $('editCourse').setAttribute("class", "hideDiv");
  $('removeCourse').setAttribute("class", "hideDiv");
  $('addAccount').setAttribute("class", "hideDiv");
  $('editAccount').setAttribute("class", "hideDiv");
  $('resetPassword').setAttribute("class", "hideDiv");
  $('viewTickets').setAttribute("class", "hideDiv");
  $('landingPage').setAttribute("class", "hideDiv");
}
function editCourse() {
  $('addCourse').setAttribute("class", "hideDiv");
  $('editCourse').setAttribute("class", "showDiv");
  $('removeCourse').setAttribute("class", "hideDiv");
  $('addAccount').setAttribute("class", "hideDiv");
  $('editAccount').setAttribute("class", "hideDiv");
  $('resetPassword').setAttribute("class", "hideDiv");
  $('viewTickets').setAttribute("class", "hideDiv");
  $('landingPage').setAttribute("class", "hideDiv");
}
function removeCourse() {
  $('addCourse').setAttribute("class", "hideDiv");
  $('editCourse').setAttribute("class", "hideDiv");
  $('removeCourse').setAttribute("class", "showDiv");
  $('addAccount').setAttribute("class", "hideDiv");
  $('editAccount').setAttribute("class", "hideDiv");
  $('resetPassword').setAttribute("class", "hideDiv");
  $('viewTickets').setAttribute("class", "hideDiv");
  $('landingPage').setAttribute("class", "hideDiv");
}
function addAccount() {
  $('addCourse').setAttribute("class", "hideDiv");
  $('editCourse').setAttribute("class", "hideDiv");
  $('removeCourse').setAttribute("class", "hideDiv");
  $('addAccount').setAttribute("class", "showDiv");
  $('editAccount').setAttribute("class", "hideDiv");
  $('resetPassword').setAttribute("class", "hideDiv");
  $('viewTickets').setAttribute("class", "hideDiv");
  $('landingPage').setAttribute("class", "hideDiv");
}
function resetPassword() {
  $('addCourse').setAttribute("class", "hideDiv");
  $('editCourse').setAttribute("class", "hideDiv");
  $('removeCourse').setAttribute("class", "hideDiv");
  $('addAccount').setAttribute("class", "hideDiv");
  $('editAccount').setAttribute("class", "hideDiv");
  $('resetPassword').setAttribute("class", "showDiv");
  $('viewTickets').setAttribute("class", "hideDiv");
  $('landingPage').setAttribute("class", "hideDiv");
}
function editAccount() {
  $('addCourse').setAttribute("class", "hideDiv");
  $('editCourse').setAttribute("class", "hideDiv");
  $('removeCourse').setAttribute("class", "hideDiv");
  $('addAccount').setAttribute("class", "hideDiv");
  $('editAccount').setAttribute("class", "showDiv");
  $('resetPassword').setAttribute("class", "hideDiv");
  $('viewTickets').setAttribute("class", "hideDiv");
  $('landingPage').setAttribute("class", "hideDiv");
}
function viewTickets() {
  $('addCourse').setAttribute("class", "hideDiv");
  $('editCourse').setAttribute("class", "hideDiv");
  $('removeCourse').setAttribute("class", "hideDiv");
  $('addAccount').setAttribute("class", "hideDiv");
  $('editAccount').setAttribute("class", "hideDiv");
  $('resetPassword').setAttribute("class", "hideDiv");
  $('viewTickets').setAttribute("class", "showDiv");
  $('landingPage').setAttribute("class", "hideDiv");
}
function myFunction() {
    // Get the snackbar DIV
	var x = $("AdmiralSnackbar");
    // Add the "show" class to DIV
    x.className = "show";
    // After 3 seconds, remove the show class from DIV
    setTimeout(function() {
        x.className = x.className.replace("show", "");
    }, 3000);
}
