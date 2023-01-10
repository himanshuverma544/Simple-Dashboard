document.addEventListener("DOMContentLoaded", function() {

  /* Setting up the uploaded image in the image container */

  function readURL(input)
  {
    if(input.files && input.files[0]) {
      let reader = new FileReader();
      reader.readAsDataURL(input.files[0]);
      reader.onload = function(event) {
        document.querySelector(".avatar").setAttribute("src", event.target.result);
      }         
    }
  }

  document.querySelector('#input-image').addEventListener("change", function() {
    readURL(this);
  });

});