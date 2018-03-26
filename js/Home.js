function newsDiv(name){
  document.cookie = "pageName=" + name +";"
  document.getElementById('pageName').innerHTML = name;
  document.getElementById('newsDiv').setAttribute("class", "showDiv");
  document.getElementById('changePassword').setAttribute("class", "hideDiv");
  document.getElementById('landingPage').setAttribute("class", "hideDiv");
  document.getElementById('addContent').setAttribute("class", "hideDiv");
  document.getElementById('uploadAvatar').setAttribute("class", "hideDiv");
  document.getElementById('createTicket').setAttribute("class", "hideDiv");
  document.getElementById('contentDiv').setAttribute("class", "hideDiv");
  document.getElementById('landingPage').style.height = "400px";
  document.getElementById('outputContainer').style.height = "450px";
}
function contentDiv(name){
  document.cookie = "pageName=" + name +";"
  document.getElementById('pageName').innerHTML = name;
  document.getElementById('contentDiv').setAttribute("class", "showDiv");
  document.getElementById('changePassword').setAttribute("class", "hideDiv");
  document.getElementById('landingPage').setAttribute("class", "hideDiv");
  document.getElementById('addContent').setAttribute("class", "hideDiv");
  document.getElementById('uploadAvatar').setAttribute("class", "hideDiv");
  document.getElementById('createTicket').setAttribute("class", "hideDiv");
  document.getElementById('newsDiv').setAttribute("class", "hideDiv");
  document.getElementById('landingPage').style.height = "400px";
  document.getElementById('outputContainer').style.height = "450px";
}
function changePassword() {
  document.getElementById('changePassword').setAttribute("class", "showDiv");
  document.getElementById('landingPage').setAttribute("class", "hideDiv");
  document.getElementById('addContent').setAttribute("class", "hideDiv");
  document.getElementById('uploadAvatar').setAttribute("class", "hideDiv");
  document.getElementById('createTicket').setAttribute("class", "hideDiv");
  document.getElementById('newsDiv').setAttribute("class", "hideDiv");
    document.getElementById('contentDiv').setAttribute("class", "hideDiv");
  document.getElementById('landingPage').style.height = "400px";
  document.getElementById('outputContainer').style.height = "450px";
}
function landingPage() {
  document.getElementById('landingPage').setAttribute("class", "showDiv");
  document.getElementById('changePassword').setAttribute("class", "hideDiv");
  document.getElementById('addContent').setAttribute("class", "hideDiv");
  document.getElementById('uploadAvatar').setAttribute("class", "hideDiv");
  document.getElementById('createTicket').setAttribute("class", "hideDiv");
  document.getElementById('newsDiv').setAttribute("class", "hideDiv");
    document.getElementById('contentDiv').setAttribute("class", "hideDiv");
  document.getElementById('landingPage').style.height = "";
  document.getElementById('outputContainer').style.height = "570px";
}
function addContent() {
  document.getElementById('addContent').setAttribute("class", "showDiv");
  document.getElementById('landingPage').setAttribute("class", "hideDiv");
  document.getElementById('changePassword').setAttribute("class", "hideDiv");
  document.getElementById('uploadAvatar').setAttribute("class", "hideDiv");
  document.getElementById('createTicket').setAttribute("class", "hideDiv");
  document.getElementById('newsDiv').setAttribute("class", "hideDiv");
    document.getElementById('contentDiv').setAttribute("class", "hideDiv");
  document.getElementById('landingPage').style.height = "400px";
  document.getElementById('outputContainer').style.height = "535px";
}
function uploadAvatar() {
  document.getElementById('uploadAvatar').setAttribute("class", "showDiv");
  document.getElementById('addContent').setAttribute("class", "hideDiv");
  document.getElementById('landingPage').setAttribute("class", "hideDiv");
  document.getElementById('changePassword').setAttribute("class", "hideDiv");
  document.getElementById('createTicket').setAttribute("class", "hideDiv");
  document.getElementById('newsDiv').setAttribute("class", "hideDiv");
    document.getElementById('contentDiv').setAttribute("class", "hideDiv");
  document.getElementById('landingPage').style.height = "400px";
  document.getElementById('outputContainer').style.height = "550px";
}
function createTicket(){
  document.getElementById('createTicket').setAttribute("class", "showDiv");
  document.getElementById('uploadAvatar').setAttribute("class", "hideDiv");
  document.getElementById('addContent').setAttribute("class", "hideDiv");
  document.getElementById('landingPage').setAttribute("class", "hideDiv");
  document.getElementById('changePassword').setAttribute("class", "hideDiv");
  document.getElementById('newsDiv').setAttribute("class", "hideDiv");
    document.getElementById('contentDiv').setAttribute("class", "hideDiv");
  document.getElementById('landingPage').style.height = "400px";
  document.getElementById('outputContainer').style.height = "550px";
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

function popSubDir(directory){
  $.ajax({
      type: 'POST',
      url: 'getSubDirs.php',
      data: {directory : directory},
      cache: false,
      success: function (data) {
        var data = JSON.parse(data);
        len = data.length;
        select = document.getElementById('subDir');
        select.options.length = 0;
        for (var i = 0; i < len; i++){
          option = document.createElement('option');
          option.value = data[i];
          option.text = data[i];
          select.add( option );
        }
      },
      error: function (xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + thrownError);
          return false;
      }
  }); // end ajax call
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
