function addCourse() {
  document.getElementById('addCourse').setAttribute("class", "showDiv");
  document.getElementById('editCourse').setAttribute("class", "hideDiv");
  document.getElementById('removeCourse').setAttribute("class", "hideDiv");
  document.getElementById('addAccount').setAttribute("class", "hideDiv");
  document.getElementById('editAccount').setAttribute("class", "hideDiv");
  document.getElementById('resetPassword').setAttribute("class", "hideDiv");
  document.getElementById('viewTickets').setAttribute("class", "hideDiv");
  document.getElementById('landingPage').setAttribute("class", "hideDiv");
  document.getElementById('addRemoveStudent').setAttribute("class", "hideDiv");
  document.getElementById('outputContainer').style.height = "454px";
}
function addRemoveStudent() {
  document.getElementById('addRemoveStudent').setAttribute("class", "showDiv");
  document.getElementById('addCourse').setAttribute("class", "hideDiv");
  document.getElementById('editCourse').setAttribute("class", "hideDiv");
  document.getElementById('removeCourse').setAttribute("class", "hideDiv");
  document.getElementById('addAccount').setAttribute("class", "hideDiv");
  document.getElementById('editAccount').setAttribute("class", "hideDiv");
  document.getElementById('resetPassword').setAttribute("class", "hideDiv");
  document.getElementById('viewTickets').setAttribute("class", "hideDiv");
  document.getElementById('landingPage').setAttribute("class", "hideDiv");
  document.getElementById('outputContainer').style.height = "300px";
}
function editCourse() {
  document.getElementById('addCourse').setAttribute("class", "hideDiv");
  document.getElementById('addRemoveStudent').setAttribute("class", "hideDiv");
  document.getElementById('editCourse').setAttribute("class", "showDiv");
  document.getElementById('removeCourse').setAttribute("class", "hideDiv");
  document.getElementById('addAccount').setAttribute("class", "hideDiv");
  document.getElementById('editAccount').setAttribute("class", "hideDiv");
  document.getElementById('resetPassword').setAttribute("class", "hideDiv");
  document.getElementById('viewTickets').setAttribute("class", "hideDiv");
  document.getElementById('landingPage').setAttribute("class", "hideDiv");
  document.getElementById('outputContainer').style.height = "700px";
}
function removeCourse() {
  document.getElementById('addCourse').setAttribute("class", "hideDiv");
  document.getElementById('addRemoveStudent').setAttribute("class", "hideDiv");
  document.getElementById('editCourse').setAttribute("class", "hideDiv");
  document.getElementById('removeCourse').setAttribute("class", "showDiv");
  document.getElementById('addAccount').setAttribute("class", "hideDiv");
  document.getElementById('editAccount').setAttribute("class", "hideDiv");
  document.getElementById('resetPassword').setAttribute("class", "hideDiv");
  document.getElementById('viewTickets').setAttribute("class", "hideDiv");
  document.getElementById('landingPage').setAttribute("class", "hideDiv");
  document.getElementById('outputContainer').style.height = "420px";
}
function addAccount() {
  document.getElementById('addCourse').setAttribute("class", "hideDiv");
  document.getElementById('addRemoveStudent').setAttribute("class", "hideDiv");
  document.getElementById('editCourse').setAttribute("class", "hideDiv");
  document.getElementById('removeCourse').setAttribute("class", "hideDiv");
  document.getElementById('addAccount').setAttribute("class", "showDiv");
  document.getElementById('editAccount').setAttribute("class", "hideDiv");
  document.getElementById('resetPassword').setAttribute("class", "hideDiv");
  document.getElementById('viewTickets').setAttribute("class", "hideDiv");
  document.getElementById('landingPage').setAttribute("class", "hideDiv");
  document.getElementById('outputContainer').style.height = "650px";
}
function resetPassword() {
  document.getElementById('addCourse').setAttribute("class", "hideDiv");
  document.getElementById('editCourse').setAttribute("class", "hideDiv");
  document.getElementById('addRemoveStudent').setAttribute("class", "hideDiv");
  document.getElementById('removeCourse').setAttribute("class", "hideDiv");
  document.getElementById('addAccount').setAttribute("class", "hideDiv");
  document.getElementById('editAccount').setAttribute("class", "hideDiv");
  document.getElementById('resetPassword').setAttribute("class", "showDiv");
  document.getElementById('viewTickets').setAttribute("class", "hideDiv");
  document.getElementById('landingPage').setAttribute("class", "hideDiv");
  document.getElementById('outputContainer').style.height = "550px";

}
function editAccount() {
  document.getElementById('addCourse').setAttribute("class", "hideDiv");
  document.getElementById('addRemoveStudent').setAttribute("class", "hideDiv");
  document.getElementById('editCourse').setAttribute("class", "hideDiv");
  document.getElementById('removeCourse').setAttribute("class", "hideDiv");
  document.getElementById('addAccount').setAttribute("class", "hideDiv");
  document.getElementById('editAccount').setAttribute("class", "showDiv");
  document.getElementById('resetPassword').setAttribute("class", "hideDiv");
  document.getElementById('viewTickets').setAttribute("class", "hideDiv");
  document.getElementById('landingPage').setAttribute("class", "hideDiv");
  document.getElementById('outputContainer').style.height = "650px";
}
function viewTickets() {
  document.getElementById('addCourse').setAttribute("class", "hideDiv");
  document.getElementById('addRemoveStudent').setAttribute("class", "hideDiv");
  document.getElementById('editCourse').setAttribute("class", "hideDiv");
  document.getElementById('removeCourse').setAttribute("class", "hideDiv");
  document.getElementById('addAccount').setAttribute("class", "hideDiv");
  document.getElementById('editAccount').setAttribute("class", "hideDiv");
  document.getElementById('resetPassword').setAttribute("class", "hideDiv");
  document.getElementById('viewTickets').setAttribute("class", "showDiv");
  document.getElementById('landingPage').setAttribute("class", "hideDiv");
  document.getElementById('outputContainer').style.height = "660px";
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
