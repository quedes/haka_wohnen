function checkForm() {
  var isValid = true;

  if (!validEmail(document.getElementById("emailInput").value)) {
    var elem = document.getElementById("email_error_msg");
    elem.style.display = "block";
    elem.className = elem.className.replace("hide","show");
    isValid = false;
  } else {
    var elem = document.getElementById("email_error_msg");
    elem.style.display = "none";
    elem.className = elem.className.replace("show","hide");
  }

  if (document.getElementById("subjectInput").value == "") {
    var elem = document.getElementById("subject_error_msg");
    elem.style.display = "block";
    elem.className = elem.className.replace("hide","show");
    isValid = false;
  } else {
    var elem = document.getElementById("subject_error_msg");
    elem.style.display = "none";
    elem.className = elem.className.replace("show","hide");
  }

  if (document.getElementById("kontakt_msg").value == "") {
    var elem = document.getElementById("msg_error_msg");
    elem.style.display = "block";
    elem.className = elem.className.replace("hide","show");
    isValid = false;
  } else {
    var elem = document.getElementById("msg_error_msg");
    elem.style.display = "none";
    elem.className = elem.className.replace("show","hide");
  }
  return isValid;
}

function validEmail(email) {
  var strReg = "^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$";
  var regex = new RegExp(strReg);
  return regex.test(email);
}


function initOnSubmit() {
  var form = document.getElementById("kontakt_form");
  form.onsubmit = function() { return checkForm(); };
}
if (document.readyState === "complete") {
  initOnSubmit();
} else
if (window.addEventListener) { // W3C standard
  window.addEventListener('load', initOnSubmit, false); // NB **not** 'onload'
} else if (window.attachEvent) { // Microsoft
  window.attachEvent('onload', initOnSubmit);
}
