function changePassword() {
  document.getElementById('changePassword').setAttribute("class", "showDiv");
  document.getElementById('landingPage').setAttribute("class", "hideDiv");
  document.getElementById('addContent').setAttribute("class", "hideDiv");
  document.getElementById('landingPage').style.height = "400px";
  document.getElementById('we-shrink').style.height = "0px";
}

function landingPage() {
  document.getElementById('landingPage').setAttribute("class", "showDiv");
  document.getElementById('changePassword').setAttribute("class", "hideDiv");
  document.getElementById('addContent').setAttribute("class", "hideDiv");
  document.getElementById('landingPage').style.height = "";
  document.getElementById('we-shrink').style.height = "";
}


function addContent() {
  document.getElementById('addContent').setAttribute("class", "showDiv");
  document.getElementById('landingPage').setAttribute("class", "hideDiv");
  document.getElementById('changePassword').setAttribute("class", "hideDiv");
  document.getElementById('landingPage').style.height = "400px";
  document.getElementById('we-shrink').style.height = "0px";
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
