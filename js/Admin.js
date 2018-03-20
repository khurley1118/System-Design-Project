function addCourse() {
  document.getElementById('addCourse').setAttribute("class", "showDiv");
  document.getElementById('editCourse').setAttribute("class", "hideDiv");
  document.getElementById('removeCourse').setAttribute("class", "hideDiv");
  document.getElementById('addAccount').setAttribute("class", "hideDiv");
  document.getElementById('editAccount').setAttribute("class", "hideDiv");
  document.getElementById('resetPassword').setAttribute("class", "hideDiv");
  document.getElementById('viewTickets').setAttribute("class", "hideDiv");
  document.getElementById('landingPage').setAttribute("class", "hideDiv");
}
function editCourse() {
  document.getElementById('addCourse').setAttribute("class", "hideDiv");
  document.getElementById('editCourse').setAttribute("class", "showDiv");
  document.getElementById('removeCourse').setAttribute("class", "hideDiv");
  document.getElementById('addAccount').setAttribute("class", "hideDiv");
  document.getElementById('editAccount').setAttribute("class", "hideDiv");
  document.getElementById('resetPassword').setAttribute("class", "hideDiv");
  document.getElementById('viewTickets').setAttribute("class", "hideDiv");
  document.getElementById('landingPage').setAttribute("class", "hideDiv");
}
function removeCourse() {
  document.getElementById('addCourse').setAttribute("class", "hideDiv");
  document.getElementById('editCourse').setAttribute("class", "hideDiv");
  document.getElementById('removeCourse').setAttribute("class", "showDiv");
  document.getElementById('addAccount').setAttribute("class", "hideDiv");
  document.getElementById('editAccount').setAttribute("class", "hideDiv");
  document.getElementById('resetPassword').setAttribute("class", "hideDiv");
  document.getElementById('viewTickets').setAttribute("class", "hideDiv");
  document.getElementById('landingPage').setAttribute("class", "hideDiv");
}
function addAccount() {
  document.getElementById('addCourse').setAttribute("class", "hideDiv");
  document.getElementById('editCourse').setAttribute("class", "hideDiv");
  document.getElementById('removeCourse').setAttribute("class", "hideDiv");
  document.getElementById('addAccount').setAttribute("class", "showDiv");
  document.getElementById('editAccount').setAttribute("class", "hideDiv");
  document.getElementById('resetPassword').setAttribute("class", "hideDiv");
  document.getElementById('viewTickets').setAttribute("class", "hideDiv");
  document.getElementById('landingPage').setAttribute("class", "hideDiv");
}
function resetPassword() {
  document.getElementById('addCourse').setAttribute("class", "hideDiv");
  document.getElementById('editCourse').setAttribute("class", "hideDiv");
  document.getElementById('removeCourse').setAttribute("class", "hideDiv");
  document.getElementById('addAccount').setAttribute("class", "hideDiv");
  document.getElementById('editAccount').setAttribute("class", "hideDiv");
  document.getElementById('resetPassword').setAttribute("class", "showDiv");
  document.getElementById('viewTickets').setAttribute("class", "hideDiv");
  document.getElementById('landingPage').setAttribute("class", "hideDiv");
}
function editAccount() {
  document.getElementById('addCourse').setAttribute("class", "hideDiv");
  document.getElementById('editCourse').setAttribute("class", "hideDiv");
  document.getElementById('removeCourse').setAttribute("class", "hideDiv");
  document.getElementById('addAccount').setAttribute("class", "hideDiv");
  document.getElementById('editAccount').setAttribute("class", "showDiv");
  document.getElementById('resetPassword').setAttribute("class", "hideDiv");
  document.getElementById('viewTickets').setAttribute("class", "hideDiv");
  document.getElementById('landingPage').setAttribute("class", "hideDiv");
}
function viewTickets() {
  document.getElementById('addCourse').setAttribute("class", "hideDiv");
  document.getElementById('editCourse').setAttribute("class", "hideDiv");
  document.getElementById('removeCourse').setAttribute("class", "hideDiv");
  document.getElementById('addAccount').setAttribute("class", "hideDiv");
  document.getElementById('editAccount').setAttribute("class", "hideDiv");
  document.getElementById('resetPassword').setAttribute("class", "hideDiv");
  document.getElementById('viewTickets').setAttribute("class", "showDiv");
  document.getElementById('landingPage').setAttribute("class", "hideDiv");
}
function myFunction() {
    // Get the snackbar DIV
	var x = document.getElementById("AdmiralSnackbar");
    // Add the "show" class to DIV
    x.className = "show";
    // After 3 seconds, remove the show class from DIV
    setTimeout(function() {
        x.className = x.className.replace("show", "");
    }, 3000);
}
