function add_request() {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.open("GET", "Add request.php", true);
    xhttp.send();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("pp").innerHTML = xhttp.responseText;
            document.getElementById("btn_add_request").style.display = "none";
        }
    };
}

function edit(value) {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.open("GET", "Add request.php?id=" + value, true);
    xhttp.send();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("pp").innerHTML = xhttp.responseText;
            document.getElementById("btn_add_request").style.display = "block";
        }
    };
}

function info_user() {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.open("GET", "info_users.php", true);
    xhttp.send();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("pp").innerHTML = xhttp.responseText;
            document.getElementById("pp").style.overflow = "hidden";
            document.getElementById("pp").style.height = "auto";
            document.getElementById("btn_add_request").style.display = "block";
        }
    };
}

function user_delivery(value) {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.open("GET", "user_delivery.php?id_request=" + value, true);
    xhttp.send();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("pp").innerHTML = xhttp.responseText;
            document.getElementById("btn_add_request").style.display = "block";
        }
    };
}

function delivery_request() {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.open("GET", "delivery_requests.php", true);
    xhttp.send();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("pp").innerHTML = xhttp.responseText;
            document.getElementById("btn_add_request").style.display = "block";
        }
    };
}

function statistics() {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.open("GET", "statistics.php", true);
    xhttp.send();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("pp").innerHTML = xhttp.responseText;
            document.getElementById("btn_add_request").style.display = "block";
        }
    };
}

function show_request() {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.open("GET", "show_request.php", true);
    xhttp.send();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("pp").innerHTML = xhttp.responseText;
            document.getElementById("btn_add_request").style.display = "block";
        }
    };
}

function My_delivery() {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.open("GET", "My_delivery.php", true);
    xhttp.send();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("pp").innerHTML = xhttp.responseText;
            document.getElementById("btn_add_request").style.display = "block";
        }
    };
}

function testAdd() {
    var de = document.getElementById("dest").value;
    var arr = document.getElementById("arrival").value;
    document.getElementById("done").disabled = false;
    if (de.length > 3 && arr.length > 3) {
        document.getElementById("done").disabled = false;
    } else {
        document.getElementById("done").disabled = true;
    }
}

function testCode() {
    var fn = document.getElementById("fn").value;
    var ln = document.getElementById("ln").value;
    var phone = document.getElementById("phone").value;
    var address = document.getElementById("address").value;
    var date = document.getElementById("date").value;
    if (fn.length > 2 && ln.length > 2 && phone.length == 10 && address.length > 2 && date != "") {
        document.getElementById("add").disabled = false;
    } else {
        document.getElementById("add").disabled = true;
    }
}

function showpass() {
    var pass = document.getElementById("password");
    var eye = document.getElementById("eye");
    if (pass.type === "password") {
        pass.type = "text";
        eye.classList.remove("glyphicon-eye-open");
        eye.classList.add("glyphicon-eye-close");
    } else {
        pass.type = "password";
        eye.classList.add("glyphicon-eye-open");
        eye.classList.remove("glyphicon-eye-close");
    }
}

function show_password() {
    var pass = document.getElementById("pass");
    if (pass.type === "password") {
        pass.type = "text";
    } else
        pass.type = "password";
}

function show_users() {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.open("GET", "management.php?show_users", true);
    xhttp.send();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("show_users").innerHTML = xhttp.responseText;
            document.getElementById("users").style.backgroundColor = "#418ff8";
            document.getElementById("users").style.color = "#fff";
            document.querySelector(".bi-people-fill").style.color = "#fff";
        }
    };
}