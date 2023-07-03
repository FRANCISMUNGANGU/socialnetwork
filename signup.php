<!DOCTYPE html>
<html>
    <head>
        <title>Sign up page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
<body>
<header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
        Social Network
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          
        </ul>

        <div class="text-end">
          <a type="button" class="btn btn-warning" href="index.php">Log-in</a>
        </div>
      </div>
    </div>
  </header>
  <div class="container">
    <div class="row">
        <div class="col mt-2">
            <img src="Communicate.net.png" style="width:200px;" class="rounded-circle mx-auto d-block"/>
        </div>
        <form method = "POST" action = "lib/signup.php">
            <p style="color:red;">

                <?php
                    echo $_GET['msg'];
                ?>
            </p>
            <p style="color:green;">

                <?php
                    echo $_GET['success'];
                ?>
            </p>
        <div class="mb-3">
            <label for="Email" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email"/>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="phonenumber" class="form-label">Phone number</label>
            <input type="number" name="phone" class="form-control" id="name" placeholder="07xxxxxxxx">
        </div>
        <div class="mb-3">
            <label for="Password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="email" placeholder="xxxxxx"/>
         </div>
         <div class="mb-3">
            <label for="Password" class="form-label">Confirm your Password</label>
            <input type="password" name="cpassword" class="form-control" id="email" placeholder="xxxxxx"/>
         </div>
        <button type="submit" class="btn btn-primary">Create account</button>
    </form>
</div>
</div>
</body>
</html>