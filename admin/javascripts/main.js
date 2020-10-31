$(document).ready(function(){
    console.log("present");
        $('#regbtn').click(function(){
          var name=$('#regname').val();
          var email=$('#regemail').val();
          var password=$('#regpass').val();
          $.ajax({
            method: "POST",
            url: "register.php",
            data: { name: name, email:email, password:password   }
          })
          .done(function( msg ) {
            if(msg=='present')
            {
              $('#reg_msg').html("<br><p style='color:red; font:large'> Email already registered </p>");
            }
            if(msg=='inserted')
            {
              $('#reg_msg').html("<br><p style='color:green; font:large'> Thank You for Registrating </p>");
            }
           }); 
      });
      $('#loginbtn').click(function(){
        var email=$('#login_email').val();
        var password=$('#login_pass').val();
        console.log(email);
        console.log(password);
        $.ajax({
          method: "POST",
          url: "login.php",
          data: { email:email, password:password   }
        })
        .done(function( msg ) {
          if(msg=='present')
          {
            window.location.href='product.php';
          }
          if(msg=='wrong')
          {
            $('#log_msg').html("<br><p style='color:red; font:large'> Enter correct login details </p>");
          }
         });  
    });

});
