function newsDiv(course){
  popNews(course);
  document.getElementById('pageName').innerHTML = name;
  document.getElementById('newsDiv').setAttribute("class", "showDiv");
  document.getElementById('changePassword').setAttribute("class", "hideDiv");
  document.getElementById('landingPage').setAttribute("class", "hideDiv");
  document.getElementById('addContent').setAttribute("class", "hideDiv");
  document.getElementById('uploadAvatar').setAttribute("class", "hideDiv");
  document.getElementById('createTicket').setAttribute("class", "hideDiv");
  document.getElementById('contentDiv').setAttribute("class", "hideDiv");
  var len = document.getElementById('newsText').clientHeight;
  var len2 = len + 200;
  document.getElementById('landingPage').style.height = len2 + "px";
  document.getElementById('outputContainer').style.height = len2 + "px";
}
function contentDiv(name){
  popContent(name);
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

function popContent(course){
  function retrieveContent(course, topic){
  $.ajax({
      type: 'POST',
      url: 'ContentPull.php',
      data: {givenPath : "'Content\\" + course + "\\" + topic + "'"},
      cache: false,
      success: function (data) {
        //Do Nothin
      },
      error: function (xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + thrownError);
          return false;
      }
  }); // end ajax call
}
}

function popNews(course){
  $.ajax({
      //pass by POST directory by directory
      type: 'POST',
      url: 'getTheNews.php',
      data: {directory : course},
      cache: false,
      success: function (data) {
        //on success parse JSON array into JS array
        var data = JSON.parse(data);
        var output = "<br><div id='newsText' class='w3-container' id='we-shrink'><h5 class='w3-opacity'><span class='fa fa-calendar fa-fw w3-margin-right'></span><b>News</b></h5><br><br><p>";
        for (var i = 0; i < data.length; i++){
          output = output + data[i];
        }
        var output = output + "</p><hr></div>";
        document.getElementById('newsDiv').innerHTML = output;
      },
      error: function (xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + thrownError);
          return false;
      }
  }); // end ajax call
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
  //ajax call to populate a subdirectory based on drop down without refreshing page
  $.ajax({
      //pass by POST directory by directory
      type: 'POST',
      url: 'getSubDirs.php',
      data: {directory : directory},
      cache: false,
      success: function (data) {
        //on success parse JSON array into JS array
        var data = JSON.parse(data);
        //get length and assign subDir to select var
        len = data.length;
        select = document.getElementById('subDir');
        //reset select's options so no appending occurs
        select.options.length = 0;
        for (var i = 0; i < len; i++){
          //add options for every returned item in array
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
  //ajax call to insert a ticket without reloading the page
  $.ajax({
      //pass ticket description by POST as desc
      type: 'POST',
      url: 'insertTicketFunction.php',
      data: {desc : description},
      cache: false,
      success: function (data) {
        //on success call snackbar for user feedback
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
