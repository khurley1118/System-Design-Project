<html>
<head>
<style>
.message {
   overflow:hidden;
   width:498px;
   margin-bottom:5px;
   border:1px solid #999;
}
.messagehead {
   overflow:hidden;
   background:#FFC;
   width:500px;
}
.messagecontent {
   overflow:hidden;
   width:496px;
}
</style>
</head>

<body>
<div id="chat" style="width:500px;margin:0 auto;overflow:hidden;">
//This div will contain the messages
<div id="messages"></div> 
//This div will contain an eventual error message
<div id="error" style="width:500px;text-align:center;color:red;"></div>
//This div contains the forms and the send button
<div id="write" style="text-align:center;"><textarea id="message" cols="50" rows="5"></textarea><br/>Name:<input type="text" id="name"/><input type="button" value="Send" onClick="send();"/></div>
</div>

<script type="text/javascript">
//This function will display the messages
function showmessages(){
   //Send an XMLHttpRequest to the 'show-message.php' file
   if(window.XMLHttpRequest){
      xmlhttp = new XMLHttpRequest();
      xmlhttp.open("GET","show-messages.php",false);
      xmlhttp.send(null);
   }
   else{
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      xmlhttp.open("GET","showmessages.php",false);
      xmlhttp.send();
   }
   //Replace the content of the messages with the response from the 'show-messages.php' file
   document.getElementById('messages').innerHTML = xmlhttp.responseText;
   //Repeat the function each 30 seconds
   setTimeout('showmessages()',3000);
}
//Start the showmessages() function
showmessages();
//This function will submit the message
function send(){
   //Send an XMLHttpRequest to the 'send.php' file with all the required informations
   var sendto = 'send.php?message=' + document.getElementById('message').value + '&name=' + document.getElementById('name').value;
   if(window.XMLHttpRequest){
      xmlhttp = new XMLHttpRequest();
      xmlhttp.open("GET",sendto,false);
      xmlhttp.send(null);
   }
   else{
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      xmlhttp.open("GET",sendto,false);
      xmlhttp.send();
   }
   var error = '';
   //If an error occurs the 'send.php' file send`s the number of the error and based on that number a message is displayed
   switch(parseInt(xmlhttp.responseText)){
   case 1:
      error = 'The database is down!';
      break;
   case 2:
      error = 'The database is down!';
      break;
   case 3:
      error = 'Don`t forget the message!';
      break;
   case 4:
      error = 'The message is too long!';
      break;
   case 5:
      error = 'Don`t forget the name!';
      break;
   case 6:
      error = 'The name is too long!';
      break;
   case 7:
      error = 'This name is already used by somebody else!';
      break;
   case 8:
      error = 'The database is down!';
   }
   if(error == ''){
      document.getElementById('error').innerHTML = '';
      showmessages();
   }
   else{
      document.getElementById('error').innerHTML = error;
   }
}
</script>

</body>
</html>
