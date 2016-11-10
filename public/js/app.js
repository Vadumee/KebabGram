
$( document ).ready(function() {

    pathArray = location.href.split( '/' );
    protocol = pathArray[0];
    host = pathArray[2];
    url = protocol + '//' + host;

    let tasty_point;
    let request;
    $('.up').click(function (request) {
        request = $.ajax({
          url: "/json/vote/like",
          data: {idKebab: pathArray[pathArray.length-1]},
          method: "GET",
          dataType: "json"
        });
        afficheTastyPoint(request);
    });
    $('.down').click(function (request) {
        request = $.ajax({
          url: "/json/vote/hate",
          data: {idKebab: pathArray[pathArray.length-1]},
          method: "GET",
          dataType: "json"
        });
        afficheTastyPoint(request);
    });


    function afficheTastyPoint(request) {
        request.done(function( msg ) {
            console.log(msg);
          if (msg.redirection!==undefined) {
              window.location.replace(url+"" + msg.redirection);
          }
          else {
            $(".kebab_tasty_points").text(msg.tasty_point);
            console.log(msg.user);
          }
        });
        request.fail(function( jqXHR, textStatus ,error ) {
            console.log(jqXHR);
            alert("Une erreur c'est produite")
        });
    }


});
