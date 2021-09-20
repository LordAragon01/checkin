$(function(){

    let form = $('.formlist');
    //var pathname = window.location.pathname; // Returns path only (/path/example.html)
    var url = window.location.href;     // Returns full URL (https://example.com/path/example.html)
    //var origin   = window.location.origin;   // Returns base URL (https://example.com)
    
    let urlsend = url + "send/method.php";

    let input = form.find('input');
    //Habilita Button when value in input
    
    input.focus(function(){

        form.find('button').prop('disabled', false);

    });

    //Method Post for Submit

    form.on('submit', function(e){

        e.preventDefault();
      
        var form_data = $(this).serializeArray();
        var inputs = $(this).find('input').val();
        
        var validation = $.isNumeric(inputs);

        if(validation === false){

            //Send Data for BD
            $.post(urlsend, form_data, function(response){

                responseThis(response);

            }, "json");


        }else{

            var title = $('.listtitleconf');

            title.removeClass('btn-success');
            title.addClass('btn-danger');
            title.text("Favor informar apenas Produtos");

            //console.log("Favor informar apenas os Produtos");

            title.fadeIn(1400);
            title.delay(400).fadeOut(1400);

        }
    
        

    });


    //Response with Success or Error and List Render
    function responseThis(response){

        var title = $('.listtitleconf');
        let inputs = form.find('input');

        if(response.success){

            console.log("Enviado com Success");

            inputs.val('');

            title.addClass('activetitle');

            if(title.hasClass('btn-danger')){

                title.removeClass('btn-danger');
                title.addClass('btn-success');
                title.text("Formulário Enviado com Sucesso");
            }

            title.fadeIn(1400);
            title.delay(400).fadeOut(1400);


        }else{

            //title.addClass('activetitle');
            title.removeClass('btn-success');
            title.addClass('btn-danger');
            title.text("Erro ao Enviar Formulário");


        }


    }


});