function checkForm() {
  var isValid = true;

  if (!validEmail(document.getElementById("emailInput").value)) {
    document.getElementById("email_error_msg").style.display = "block";
    isValid = false;
  } else {
    document.getElementById("email_error_msg").style.display = "none";
  }

  if (document.getElementById("subjectInput").value == "") {
    document.getElementById("subject_error_msg").style.display = "block";
    isValid = false;
  } else {
    document.getElementById("subject_error_msg").style.display = "none";
  }

  if (document.getElementById("kontakt_msg").value == "") {
    document.getElementById("msg_error_msg").style.display = "block";
    isValid = false;
  } else {
    document.getElementById("msg_error_msg").style.display = "none";
  }
  return isValid;
}

function validEmail(email) {
  var strReg = "^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$";
  var regex = new RegExp(strReg);
  return regex.test(email);
}
