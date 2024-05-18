$(function()
{
  $("#connexion").click(function(e)
  {
    e.preventDefault();

    if ($("#email").val() == ""  || $("#email").val() == "")
    {
      $.growl.error({ message: "Erreur !" });
    }
    else
      {
        $.ajax
        ({
          url: "php/administrateur.php",
          type: "POST",
          dataType: "json",
          data: {email: $("#email").val(), password: $("#password").val()},
          success: function(response)
          {
            if (response.success)
            {
              window.location.href = response.redirect;
            }
            else
            {
              $.growl.error({ message: "Mot de passe incorrecte !" });
            }
          },
          error: function(xhr, textStatus, errorThrown)
          {
            $.growl.error({ message: "Erreur !" });
            console.log(xhr.responseText);
          }
        });
      }
  });
});

////////////////////////////////////////////////////////////////

let tabs = document.querySelectorAll(".tab-link:not(.desactive)");

tabs.forEach((tab) => {
  tab.addEventListener("click", () => {
    unSelectAll();
    tab.classList.add("active");
    let ref = tab.getAttribute("data-ref");
    document
      .querySelector(`.tab-body[data-id="${ref}"]`)
      .classList.add("active");
  });
});

function unSelectAll() {
  tabs.forEach((tab) => {
    tab.classList.remove("active");
  });
  let tabbodies = document.querySelectorAll(".tab-body");
  tabbodies.forEach((tab) => {
    tab.classList.remove("active");
  });
}

document.querySelector(".tab-link.active").click();