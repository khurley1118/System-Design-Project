function changePassword() {
  document.getElementById('changePassword').setAttribute("class", "showDiv");
  document.getElementById('landingPage').setAttribute("class", "hideDiv");
  document.getElementById('addContent').setAttribute("class", "hideDiv");
}

function landingPage() {
  document.getElementById('landingPage').setAttribute("class", "showDiv");
  document.getElementById('changePassword').setAttribute("class", "hideDiv");
  document.getElementById('addContent').setAttribute("class", "hideDiv");
}

function addContent() {
  document.getElementById('addContent').setAttribute("class", "showDiv");
  document.getElementById('landingPage').setAttribute("class", "hideDiv");
  document.getElementById('changePassword').setAttribute("class", "hideDiv");
}
