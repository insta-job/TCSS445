$(document).ready(function() {
  $("#password2").keyup(validate);
  $('#phone').keyup(validate);
  $('#email').keyup(validate);
});

function validate() {

  //check password
  var password1 = $("#password1").val();
  var password2 = $("#password2").val();
  var phone = $('#phone').val();
  var email = $('#email').val();
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

  //check if two email matches when type not when submit
    if (password1 != password2) {
        document.getElementById('password1').style.borderColor = "red";
        document.getElementById('password2').style.borderColor = "red";
        document.getElementById('label1').style.color = "red";
        document.getElementById('label2').style.color = "red";
        $(document).ready(function(){
          $("#password1").tooltip();
        });
        document.getElementById('password1').onkeyup = function(event) {
          if (this.value.length === 0) {
              document.getElementById('password1').style.borderBottom = " 1px solid #fff";
              document.getElementById('label1').style.color = "#fff";
              $('#password1').tooltip('disable');

          }
        }
        document.getElementById('password2').onkeyup = function(event) {
          if (this.value.length === 0) {
              document.getElementById('password2').style.borderBottom = " 1px solid #fff";
              document.getElementById('label2').style.color = "#fff";
            }
        }
    } else {
      document.getElementById('password1').style.borderBottom = " 1px solid #fff";
      document.getElementById('label1').style.color = "#fff";
      document.getElementById('password2').style.borderBottom = " 1px solid #fff";
      document.getElementById('label2').style.color = "#fff";
    }
    ///check for phone
    if (phone.toString().length < 10) {
      document.getElementById('phone').style.borderColor = "red";
      document.getElementById('label3').style.color = "red";
      $(document).ready(function(){
        $("#phone").tooltip();
      });
      if (phone.toString().length === 0) {
        document.getElementById('phone').style.borderBottom = " 1px solid #fff";
        document.getElementById('label3').style.color = "#fff";
        $('#phone').tooltip('disable');

      }
    } else {
      document.getElementById('phone').style.borderBottom = " 1px solid #fff";
      document.getElementById('label3').style.color = "#fff";
      $('#phone').tooltip('disable');

    }
    //check for email
    if (!(re.test(email))) {
      document.getElementById('email').style.borderColor = "red";
      document.getElementById('label4').style.color = "red";
      $(document).ready(function(){
        $("#email").tooltip();
      });
      if (email.length === 0) {
        document.getElementById('email').style.borderBottom = " 1px solid #fff";
        document.getElementById('label4').style.color = "#fff";
        $('#email').tooltip('disable');
      }
    } else {
      document.getElementById('email').style.borderBottom = " 1px solid #fff";
      document.getElementById('label4').style.color = "#fff";
      $('#email').tooltip('disable');

    }

}
