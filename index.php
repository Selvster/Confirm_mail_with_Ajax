<html>
    <head>
        <title>Confirm Mail</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>
    <body style='background-color:#e0e0e0;'>
    <div class="container">
        <button class='btn btn-primary btn-lg register' data-toggle="modal" data-target="#Register_modal">Register</button>
         <!-- Register Modal -->
         <div class="modal fade" id="Register_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Make Your account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body register_modal_body">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active">Enter Your Data</li>
                  <li class="breadcrumb-item">Confirm Email</li>
                  <li class="breadcrumb-item">Complete Shopping !</li>
                </ol>
              </nav>
              <div class='part_1'>
              <h6>Complete Your Data ..</h6>
                <div class='row'>
                  <div class="col-6">
                    <input type='text' class='inputs register_username form-control' placeholder='Username'> 
                  </div>
                  <div class="col-6">
                    <input type='email' class='inputs register_email form-control' placeholder='Email'> 
                  </div>
                </div>
                <div class='row'>
                  <div class="col-6">
                    <input type='text' class='inputs register_f_name form-control' placeholder='First Name'> 
                  </div>
                  <div class="col-6">
                    <input type='text' class='inputs register_l_name form-control' placeholder='Last Name'> 
                  </div>
                </div>
                <div class='row'>
                  <div class="col-6">
                    <input type='password' class='inputs register_password form-control' placeholder='Password'> 
                  </div>
                  <div class="col-6">
                    <input type='password' class='inputs register_c_password form-control' placeholder='Confirm Password'> 
                  </div>
                </div>
              </div>           
                <button class='btn btn-primary btn-block register_submit inputs'>Next <i class="fas fa-arrow-right"></i></button>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src='ajax.js'></script>
    </body>
</html>