<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
      <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- <link href="css/custom.css" type="text/css" rel="stylesheet"> -->
    <style type="text/css">
        .Wrapper{ display: flex;align-items: center;justify-content: center; height: 100vh; }
.UserContainer{ width:80%; max-width:400px; height:auto; background: #e0e0e0; padding: 30px; color: #fff; font-size: 22px; font-weight: 300; letter-spacing: 0.08rem; border-radius:20px; z-index: 10;
    box-shadow:0 0 10px rgba(10,45,80,.5); position: relative;}
    label{font-size: 14px; color: black;}
    </style>
    <title>Login</title>
  </head>
<body>
    <div class="Wrapper">
    <section class="UserContainer p-0">
        <div class="row align-items-center">            
        <div class="col-md-12 pl-lg-0 ">
        <div class=" pl-4 pr-4 p-3">
            <form method="post" action="/login/save">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                 <div>
                    <h3 style="text-align:center; color:black; " >Login</h3>
                 </div>
                 <div class="mb-4 ">
                    <label>Email</label>
                    <div>
                       <input required  type="text" class="form-control" name="us_email" minlength="1">
                    </div>
                 </div> 
                 <div class="mb-4 ">
                    <label>Password</label>
                    <div>
                       <input required  type="password" class="form-control" id="us_password" name="us_password" minlength="1" maxlength="125">
                    </div>
                </div> 
                <div class="mb-2 text-center">
                 <button type="submit" class="btn btn-info ">Login</button>
                </div>
                <div class="mb-2 text-right"><a href="/" style="font-size: 14px;">Not a User?</a></div>
             </form>
            </div>
        </div>
    </div>
</section>
</div>
</body>
</html>