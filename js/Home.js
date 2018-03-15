function changePassword() {
  document.getElementById('changePassword').setAttribute("class", "showDiv");
  document.getElementById('landingPage').setAttribute("class", "hideDiv");
  document.getElementById('addContent').setAttribute("class", "hideDiv");
  document.getElementById('uploadAvatar').setAttribute("class", "hideDiv");
  document.getElementById('createTicket').setAttribute("class", "hideDiv");
  document.getElementById('landingPage').style.height = "400px";
  document.getElementById('we-shrink').style.height = "0px";
}
function landingPage() {
  document.getElementById('landingPage').setAttribute("class", "showDiv");
  document.getElementById('changePassword').setAttribute("class", "hideDiv");
  document.getElementById('addContent').setAttribute("class", "hideDiv");
  document.getElementById('uploadAvatar').setAttribute("class", "hideDiv");
  document.getElementById('createTicket').setAttribute("class", "hideDiv");
  document.getElementById('landingPage').style.height = "";
  document.getElementById('we-shrink').style.height = "";
}
function addContent() {
  document.getElementById('addContent').setAttribute("class", "showDiv");
  document.getElementById('landingPage').setAttribute("class", "hideDiv");
  document.getElementById('changePassword').setAttribute("class", "hideDiv");
  document.getElementById('uploadAvatar').setAttribute("class", "hideDiv");
  document.getElementById('createTicket').setAttribute("class", "hideDiv");
  document.getElementById('landingPage').style.height = "400px";
  document.getElementById('we-shrink').style.height = "0px";
}
function uploadAvatar() {
  document.getElementById('uploadAvatar').setAttribute("class", "showDiv");
  document.getElementById('addContent').setAttribute("class", "hideDiv");
  document.getElementById('landingPage').setAttribute("class", "hideDiv");
  document.getElementById('changePassword').setAttribute("class", "hideDiv");
  document.getElementById('createTicket').setAttribute("class", "hideDiv");
  document.getElementById('landingPage').style.height = "400px";
  document.getElementById('we-shrink').style.height = "0px";
}
function createTicket(){
  document.getElementById('createTicket').setAttribute("class", "showDiv");
  document.getElementById('uploadAvatar').setAttribute("class", "hideDiv");
  document.getElementById('addContent').setAttribute("class", "hideDiv");
  document.getElementById('landingPage').setAttribute("class", "hideDiv");
  document.getElementById('changePassword').setAttribute("class", "hideDiv");
  document.getElementById('landingPage').style.height = "400px";
  document.getElementById('we-shrink').style.height = "0px";
}
function logOut(){
  if (confirm('Are you sure you want to log out?')) {
    window.location.href = "logOut.php";
  } else {
      // Do nothing!
  }
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

function insTicket(description){
  $.ajax({
      type: 'POST',
      url: 'insertTicketFunction.php',
      data: {desc : description},
      cache: false,
      success: function (data) {
        document.getElementById('AdmiralSnackbar').innerHTML = 'Ticket has been created!';
        document.getElementById('textInput').value = "";
        myFunction();
      },
      error: function (xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + thrownError);
          return false;
      }
  }); // end ajax call
}

function uploadAvatar(idNum, path){
  $.ajax(
      type: 'POST',
      url:  'uploadAvatar.php',
      data: {id : idNum, path : path},
      cache: false,
      success: function (data) {
        // var data = JSON.parse(dataArray);
        // var name = data[0];
        // var description = data[1];
        // var status = data[2];
        document.getElementById('AdmiralSnackbar').innerHTML = "Avatar uploaded successfully";
        document.getElementById('avatarFile').innerHTML = "";
        myFunction();
      },
      error: function(xhr, ajaxOptions, thrownError) {
        alert(xhr.status + "\n" + thrownError);
        return false;
      }
  );
}
