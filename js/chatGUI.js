

//this function can remove a array element.
Array.remove = function(array, from, to) {
    var rest = array.slice((to || from) + 1 || array.length);
    array.length = from < 0 ? array.length + from : from;
    return array.push.apply(array, rest);
};


//this variable represents the total number of popups can be displayed according to the viewport width
var total_popups = 0;

//arrays of popups ids
var popups = [];

//this is used to close a popup
function close_popup(id)
{
    for(var iii = 0; iii < popups.length; iii++)
    {
        if(id == popups[iii])
        {
            Array.remove(popups, iii);

            document.getElementById(id).style.display = "none";

            calculate_popups();

            return;
        }
    }
}

//displays the popups. Displays based on the maximum number of popups that can be displayed on the current viewport width
function display_popups()
{
    var right = 220;

    var iii = 0;
    for(iii; iii < total_popups; iii++)
    {
        if(popups[iii] != undefined)
        {
            var element = document.getElementById(popups[iii]);
            element.style.right = right + "px";
            right = right + 320;
            element.style.display = "block";
        }
    }

    for(var jjj = iii; jjj < popups.length; jjj++)
    {
        var element = document.getElementById(popups[jjj]);
        element.style.display = "none";
    }
}

//creates markup for a new popup. Adds the id to popups array.
function register_popup(id, name)
{

    for(var iii = 0; iii < popups.length; iii++)
    {
        //already registered. Bring it to front.
        if(id == popups[iii])
        {
            Array.remove(popups, iii);

            popups.unshift(id);

            calculate_popups();


            return;
        }
    }

    var element = '<div class="popup-box chat-popup" id="'+ id +'">';
    element = element + '<div class="popup-head">';
    element = element + '<div class="popup-head-left">'+ name +'</div>';
    element = element + '<div class="popup-head-right"><a href="javascript:close_popup(\''+ id +'\');">&#10005;</a></div>';
    element = element + '<div style="clear: both"></div></div><div class="popup-messages" id="messages' + id +'"></div>';
    element = element + '<div id="write" style="text-align:left;"><textarea class="text-bar" id="message' + id + '" rows="1" placeholder="Enter message here" onkeyup="process(event, message' + id + ', ' + id +')"></textarea></div></div>';


    document.getElementsByTagName("body")[0].innerHTML = document.getElementsByTagName("body")[0].innerHTML + element;

    popups.unshift(id);

    calculate_popups();
    showmessages(id);
    //auto scroll to bottom
    scrollToBottom(id);
}

//calculate the total number of popups suitable and then populate the toatal_popups variable.
function calculate_popups()
{
    var width = window.innerWidth;
    if(width < 540)
    {
        total_popups = 0;
    }
    else
    {
        width = width - 200;
        //320 is width of a single popup box
        total_popups = parseInt(width/320);
    }

    display_popups();

}

//recalculate when window is loaded and also when window is resized.
window.addEventListener("resize", calculate_popups);
window.addEventListener("load", calculate_popups);




function showmessages(id){
   //Send an XMLHttpRequest to the 'show-message.php' file
   var param_id = encodeURIComponent(id);
   if(window.XMLHttpRequest){
      xmlhttp = new XMLHttpRequest();
      xmlhttp.open("POST","../Chat/show-messages.php",false);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.send("recipientId=" + param_id);
   }
   else{
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      xmlhttp.open("POST","../Chat/show-messages.php",false);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.send("recipientId=" + param_id);
   }
   var elementName = "messages" + id
   //Replace the content of the messages with the response from the 'show-messages.php' file
   document.getElementById(elementName).innerHTML = xmlhttp.responseText;
   //Repeat the function each 30 seconds

   //scrollToBottom(id);
   setTimeout(function() {
    showmessages(id);
}, 1000)
}

function send(recipientId, message){
   //Send an XMLHttpRequest to the 'send.php' file with all the required informations
   //change this to post*************************
   var param_id = encodeURIComponent(recipientId);
   var param_message = encodeURIComponent(message);

   //var url = 'send.php?message=' + document.getElementById('message').value + '&name=' + document.getElementById('name').value;
   if(window.XMLHttpRequest){
      xmlhttp = new XMLHttpRequest();
      xmlhttp.open("POST","../Chat/send.php",false);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.send("recipientId=" + param_id + "&message=" + param_message);
   }
   else{
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      xmlhttp.open("POST","../Chat/send.php",false);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.send("recipientId=" + param_id + "&message=" + param_message);
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
      //error = 'Don`t forget the message!';
      alert("Must insert message");
      break;
   case 4:
      //error = 'The message is too long!';
      alert("Message is too long");
      break;
   case 5:
      error = 'The database is down!';
      break;
   case 6:
      error = 'The database is down!';
      break;
   case 7:
      //alert("Success");
      //scrollToBottom(recipientId);
      break;
   }

}

function process(e, fieldID, id) {
  fieldID = $(fieldID).get(0);//Chris is a wizard
    var code = (e.keyCode ? e.keyCode : e.which);

    if (code == 13) {

      var message = document.getElementById(fieldID.id).value;
      var inputArea = "document.getElementById(\'" + fieldID.id + "\').value";
        //alert(fieldID.id + " ,  " + id);
        scrollToBottom(id);
        send(id, message);
        $('#' + fieldID.id).val('');

    }
  }

  function scrollToBottom(id){

    $("#messages" + id).scrollTop($("#messages" + id)[0].scrollHeight);

  }
