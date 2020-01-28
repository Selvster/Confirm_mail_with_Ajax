$(document).ready(function(){
    var path = "ajax_php/";
    // Register
    var email,username;
    $(document).on('click','.register_submit',function(){
        var first_name = $('.register_f_name').val(),
            last_name = $('.register_l_name').val(),
            password = $('.register_password').val(),
            confirm_password = $('.register_c_password').val(),
            errors = [],
            page = 0;
            email = $('.register_email').val();
            username = $('.register_username').val();
        var rules = {
          'register_username' : {
                'name' : 'Username',
                'value' : username,
                'min_length' : 8,
                'max_length' : 16
          },
          'register_f_name' : {
                'name' : 'First Name',
                'value' : first_name,
                'min_length' : 3,
                'max_length' : 9 
          },
          'register_l_name' : {
                'name' : 'Last Name',  
                'value' : last_name,
                'min_length' : 3,
                'max_length' : 9 
          },
          'register_email' : {
                'name' : 'Email',
                'value' : email 
          },
          'register_password' : {
                'name' : 'Password',
                'value' : password,
                'min_length' : 10
          },
          'register_c_password' : {
                'name' : 'Confirm Password',
                'value' : confirm_password,
                'like' : 'register_password'
          }
        };
        //Submiting Validation
        for(var element in rules){
            var defs = rules[element];
            if(defs['value'] == ""){
                errors.push(defs['name'] + " is required.");
            }else{
                for(var i in defs){
                    //Fetch Validations
                    if(i == 'min_length'){
                        if(defs['value'].length <= defs['min_length']){
                            errors.push(defs['name'] + ' must be more than ' + defs['min_length'] + " characters.");
                        }
                    }
                    if(i == 'max_length'){
                        if(defs['value'].length >= defs['max_length']){
                            errors.push(defs['name'] + ' must be less than ' + defs['max_length'] + " characters.");
                        }
                    }
                    if(i == 'like'){
                        if(defs['value'] != rules[defs['like']]['value']){
                            errors.push(defs['name'] + ' must match ' + rules[defs['like']]['name']);
                        }
                    }
                }
            }
        }
        //Errors
        //Create Alert Div if found
        if(errors.length != 0){
            if($('.register_modal_body').find('.alert').length == 0){
                $('<div class="alert alert-danger"></div>').hide().insertAfter('.part_1');
            }else{ //Empty errors
                $('.register_modal_body .alert-danger').text('');
            }
            //Fetch Errors
            for(var w = 0 ; w < errors.length ; w++){
                $('.register_modal_body .alert-danger').append("<b>"+errors[w]+"</b>" + "<br>");
            }
            $('.register_modal_body .alert-danger').show('slow');
        }else{ //No Errors
            //remove alerts if found
            $('.register_modal_body .alert-danger').hide('slow',function(){$(this).remove();});
            //Add Button Second Class to access, remove main
            $(this).addClass('check_code');
            $(this).removeClass('register_submit');
            //Upload User
            $.ajax({
                'type' : "POST",
                'url'  : path+"upload_user.php",
                'data' : {username : username , email : email , first_name : first_name , last_name : last_name , password : password}
            });
            //Send Confirmation
            $.ajax({
                'type' : "POST",
                'url'  : path+"send_mail.php",
                'data' : {email : email , name : first_name+" "+last_name}
            });
            //Change Content
            $('.part_1').fadeOut('slow',function(){
                $(this).remove();
                //Edit Breadcrumb Items
                $('.breadcrumb-item:eq(0)').removeClass('active');
                $('.breadcrumb-item:eq(1)').addClass('active');
                //Draw Content
                $('<div class="part_2"> <h6>Confirm Your Email ...</h6> <p>We have send you an email with confirmation code , Check your inbox</p><div class="row"> <div class="col-12"> <input type="text" placeholder="Confirmation Code" class="form-control inputs confirm_code"> </div></div></div>').hide().insertAfter('.breadcrumb').fadeIn('slow');
            });
        }
    });
    $(document).on('click','.check_code',function(){
        var Code = $('.confirm_code').val();
        //Check Code
        $.ajax({
            'type' : "POST",
            'url'  : path+"check_code.php",
            'data' : {code : Code , email : email},
            'success' : function(data){
                if(data != "wrong"){
                    //Remove Button
                    $('.check_code').hide('slow',function(){$(this).remove();});
                    //Remove alert if found
                    $('.modal-body .alert').hide('slow',function(){$(this).remove();});
                    //Change Content
                    $('.part_2').fadeOut('slow',function(){
                        $(this).remove();
                        //Edit Breadcrumb Items
                        $('.breadcrumb-item:eq(1)').removeClass('active');
                        $('.breadcrumb-item:eq(2)').addClass('active');
                        //Draw
                        $('<div class="alert alert-success">You have Registered Successfully !</div>').hide().insertAfter('.breadcrumb').show('slow');
                    });                    
                }else{
                    if($('.modal-body .alert').length == 0){
                        $('<div class="alert alert-danger">Wrong Code</div>').hide().insertAfter('.part_2').show('slow');
                    }
                }
            }
        });
    });
});

