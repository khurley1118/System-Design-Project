function changePassword() {
    document.getElementById('outputContainer').innerHTML = "<div id='changePassword'";
    var f = document.createElement("form");
    f.setAttribute('method', "post");
    f.setAttribute('action', "changePassword.php");
    f.required = "required";

    //create input element
    var i = document.createElement("input");
    i.type = "text";
    i.name = "oldPW";
    i.id = "oldPW";
    i.placeholder = "Password";
    i.required = "required";

    var b = document.createElement("input");
    b.type = "text";
    b.name = "newPW";
    b.id = "newPW";
    b.placeholder = "New Password";
    b.required = "required";

    var d = document.createElement("input");
    d.type = "text";
    d.name = "confPW";
    d.id = "confPW";
    d.placeholder = "Confirm Password";
    d.required = "required";

    //create a button
    var s = document.createElement("input");
    s.type = "submit";
    s.value = "Submit";

    // add all elements to the form
    f.appendChild(i);
    f.appendChild(b);
    f.appendChild(d);
    f.appendChild(s);

    // add the form inside the body
    $("body").append(f); //using jQuery or
    document.getElementById('outputContainer').appendChild(f);

    var html = document.getElementById('outputContainer');
    html.insertAdjacentHTML('beforeend', '</div>');
}

function addContent() {
    document.getElementById('outputContainer').innerHTML = "<div id='changePassword'";
    var f = document.createElement("form");
    f.setAttribute('method', "post");
    f.setAttribute('action', "addContent.php");

    //create input element
    var i = document.createElement("input");
    i.type = "text";
    i.name = "desc";
    i.id = "desc";
    i.placeholder = "Description";
    i.required = "required";

    var b = document.createElement("INPUT");
    b.type = "file";
    b.name = "fileName";
    b.id = "fileId";
    b.required = "required";

    var d = document.createElement("select");
    d.type = "option";
    d.name = "contType";
    d.id = "contType";
    d.placeholder = "Content Type";
    d.appendChild(new Option("Text", "Text"));
    d.appendChild(new Option("Audio", "Audio"));
    d.appendChild(new Option("Video", "Video"));

    //Need to dynamically pull back folders
    var r = document.createElement("select");
    r.type = "option";
    r.name = "folderList";
    r.id = "folderList";
    r.appendChild(new Option("System Project", "SysProj"));
    r.appendChild(new Option("QA Testing", "QA"));
    r.appendChild(new Option("Documents", "Documents"));


    var s = document.createElement("input");
    s.type = "submit";
    s.value = "Add Content";

    // add all elements to the form
    f.appendChild(d);
    f.appendChild(r);
    f.appendChild(i);
    f.appendChild(b);
    f.appendChild(s);

    // add the form inside the body
    $("body").append(f); //using jQuery or
    document.getElementById('outputContainer').appendChild(f);

    var html = document.getElementById('outputContainer');
    html.insertAdjacentHTML('beforeend', '</div>');
}

function addFolder() {
    document.getElementById('outputContainer').innerHTML = "<div id='changePassword'";
    var f = document.createElement("form");
    f.setAttribute('method', "post");
    f.setAttribute('action', "addFolder.php");

    //create input element
    var i = document.createElement("input");
    i.type = "text";
    i.name = "desc";
    i.id = "desc";
    i.placeholder = "Topic Name";
    i.required = "required";

    var s = document.createElement("input");
    s.type = "submit";
    s.value = "Add Topic";

    // add all elements to the form
    f.appendChild(i);
    f.appendChild(s);


    // add the form inside the body
    $("body").append(f); //using jQuery or
    document.getElementById('outputContainer').appendChild(f);

    var html = document.getElementById('outputContainer');
    html.insertAdjacentHTML('beforeend', '</div>');
}

function myFunction() {
    // Get the snackbar DIV
    var x = document.getElementById("AdmiralSnackbar")

    // Add the "show" class to DIV
    x.className = "show";

    // After 3 seconds, remove the show class from DIV
    setTimeout(function() {
        x.className = x.className.replace("show", "");
    }, 3000);
}
