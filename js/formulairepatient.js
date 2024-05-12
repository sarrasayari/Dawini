$(function() {
    $("#submit").click(function(e) {
      e.preventDefault();
      
      var datedaujourdhui = $("#datedaujourdhui").val();
      var fname = $("#fname").val();
      var lname = $("#lname").val();
      var email = $("#email").val();
      var telephone = $("#telephone").val();
      var age = $("#age").val();
      var price = $("#price").val();
      var lieu_naissance = $("#lieu_naissance").val();
      var date_naissance = $("date_naissance").val();
      var genre = $("input[name='gender']:checked").val();
      var ville = $("select[name='ville']").val();
  
      var formData = {
        datedaujourdhui: datedaujourdhui,
        fname: fname,
        lname: lname,
        email: email,
        password: password,
        telephone: telephone,
        age: age,
        price: price,
        lieu_naissance: lieu_naissance,
        date_naissance: date_naissance,
        genre: genre,
        ville: ville
      };
  
      $.ajax({
        url: "php/insertion_patient.php",
        type: "POST",
        dataType: "json",
        data: formData,
        success: function(response) {
          if (response.success) {
            $.growl.notice({ message: "OK !" });
          } else {
            $.growl.error({ message: "Erreur !" });
          }
        },
        error: function(xhr, textStatus, errorThrown) {
          $.growl.error({ message: "Erreur !" });
          console.log(xhr.responseText);
        }
      });
    });
  });
  