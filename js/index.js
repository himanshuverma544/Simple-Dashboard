document.addEventListener("DOMContentLoaded", function() {

  setTimeout(function() {
    console.log()
    document.getElementById("msg_positive").style.display = "none";
    var messageNegative = document.getElementsByClassName("msg_negative");
    for(let i = 0; i < messageNegative.length; i++) {
      messageNegative[i].style.display = "none";
    }
  }, 3000); // 3000 milliseconds = 3 seconds
  
});