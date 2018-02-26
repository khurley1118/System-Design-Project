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
function showTicket(showTicket){
  if (showTicket == 202034) {
    document.getElementById('ticketDisplay').innerHTML = "Ticket #202034: This ticket sucks";
  } else if (showTicket == 632534) {
    document.getElementById('ticketDisplay').innerHTML = "Ticket #202034: Look ma, im a ticket";
  } else if (showTicket == 126362) {
    document.getElementById('ticketDisplay').innerHTML = "Ticket #202034: Why did i make 3 of these";
  } else {
    document.getElementById('ticketDisplay').innerHTML = "No ticket found";
  }
}
