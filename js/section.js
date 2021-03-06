$(function(){

    let content = $('.content');
    let defaults = content.html();
    let template = 'section/section.php';
    let firstpage = $('.firstpage');

    //content.load(template + ' #firstpage');

    function hrefResponse(href){

        content.html(defaults).delay(400).fadeOut(100, function(){

            content.load(template + " #" + href, function(response, status, jqXHR){

                //console.log(response, status, jqXHR)

            });

       }).fadeIn();

    }

    //Menu navigation
    $('body').on('click', '.itemload', function(e){

        let href = $(this).attr('href');


        e.preventDefault();

        switch(href){

            case 'firstpage':

                content.fadeOut(100);
                firstpage.delay(800).fadeIn(200);
                
            break;

            case 'secondpage':
                
               firstpage.fadeOut(100);
               hrefResponse(href);

            break;

            case 'thirdpage':

                  firstpage.hide();
                  hrefResponse(href);

            break;

        }
    

    });//end


    //Change row for Update
    $('body').on('click','.update', function(e){

        e.preventDefault();

        var currentRow=$(this).closest("tr"); 

        let arrtd = [];

          // get current row TD
        currentRow.each(function(){

            var price_value=currentRow.find("td:eq(3)");
            var form_value=currentRow.find("td:eq(4)");

            var obj = {};

            obj.price = price_value;
            obj.form = form_value;

            arrtd.push(obj);

            if(!price_value.hasClass('deactivetd') && !form_value.hasClass('activetd')){

                price_value.addClass('deactivetd');
                form_value.addClass('activetd');

            }else{

                price_value.removeClass('deactivetd');
                form_value.removeClass('activetd');

            }
            //console.log(price_value);

        });


    });//end


    //Checkbox item

    $('body').on('click', '.check', function(e){

        e.preventDefault();

        let check = $(this);
        let checkbox = check.closest('tr');

        let arrtd = [];

        checkbox.each(function(e){

            var check_td = checkbox.find('td:eq(5)');

            var obj = {};

            obj.check = check_td;

            arrtd.push(obj);

            var check_p = check_td.find(check);

            e = check_p.find('p');

            var checking = e.find('b');


            if(!checking.hasClass('activecheck')){

                checking.removeClass('activecheckdanger');
                checking.addClass('activecheck');

            }else{

               var confirmcheck = confirm('Retirar o Checking ?');

               if(confirmcheck === true){

                checking.removeClass('activecheck');
                checking.css('background', '#069');

               }

                 return;


            }


        });


    });//end

    
    //Total de checkbox
    $('body').on('click', '.verification', function(e){

        e.preventDefault();

        let checkbox = $('body').find('.check');
        var elemntscheck = checkbox.find('b');

        let arrcheck = [];

        let eachcheck =  $.each(elemntscheck, function(i, e){

            //console.log(i, e);
            return arrcheck.push(e);

       });

       let itemclass = $('.activecheck').length;

       if(itemclass === eachcheck.length){

            alert('Todos os Produtos com Check-in');

       }else{

            alert('Um ou mais Produtos n??o tem Check-in');

            //eachcheck.addClass('activecheckdanger');
            eachcheck.css('background-color', '#AA292F');

            if(eachcheck.hasClass('activecheck') === false){

                //eachcheck.removeClass('activecheck');
                eachcheck.addClass('activecheckdanger');
                eachcheck.css('background', '#AA292F');

            }

       }


    });//end


    //Update a Price
    $('body').on('submit', '.formprice', function(e){

        e.preventDefault();

        var url = window.location.href;  
        let urlupdate = url + "send/update.php";

        let formprice = $(this);
        let price = formprice.find('.price').val();
        let idproduct = formprice.find('.idproduct').val();
        //let dataprice = formprice.serialize();

        let validation = $.isNumeric(price);

        if(!price){

            alert('Favor Informar o Pre??o');


        }else if(validation === false || price.length > 6){

            alert('Favor Informar apenas N??meros e at?? 6 caracteres para o Pre??o');

        }else{

            alert('Pre??o Atualizado com Sucesso');

            $.post(urlupdate, {price: price, idproduct: idproduct}, function(response){

                responseFormprice(response);


            }, "json");

            setTimeout(function(){

                var page = 'secondpage';
    
                hrefResponse(page);
        
            }, 1000);
       
        }
        

    });//end

    function responseFormprice(response){

        if(response.success){

            console.log('Enviado com Sucesso');
            

        }else{

            console.log('Falha ao Enviar');


        }


    }

    //Delete Product
    $('body').on('click', '.delete', function(e){

        e.preventDefault();

        var url = window.location.href;  
        let urldelete = url + "send/delete.php";

        var infoid = $(this);
        var idproduct = infoid.attr('href');

        var confirmdelete = confirm('Confirma a Exclus??o ?');

        if(confirmdelete === true){

            $.get(urldelete, {idproduct: idproduct}, function(response){

                responseFormprice(response);
    
            }, "json"); 
    
            setTimeout(function(){
    
                var page = 'secondpage';
    
                hrefResponse(page);
        
            }, 1200);

        }

        return;

    });//end

});