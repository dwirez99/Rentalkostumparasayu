<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rental Cosplay | Register</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

<style>
     body {
        background-image: url('images/bg.jpg');
        background-size: cover;
         background-position: center;
     }
     
</style>
</head>
<body>

<section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5">
                <form action="" method="post">
                    @csrf
              <h3 class="mb-5 text-center">Register</h3>
              @if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </ul>
</div>
@endif

@if (session('status'))
<div class="alert alert-success alert-dismissible fade show">
{{ session('message') }} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

              <div class="form-outline mb-4">
                <label class="form-label" for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control form-control-lg" required>
                
              </div>
  
              <div class="form-outline mb-4">
                <label class="form-label" for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control form-control-lg" required>
                
              </div>
  
              <div class="form-outline mb-4"> 
                <input type="checkbox" class="form-check-input" id="show-password"> Show Password
            </div>
            <div class="form-outline mb-4">
                <label for="phone" class="form-label">Phone</label>
                <input type="number" name="phone" id="phone" class="form-control" required>
            </div>
            <div class="form-outline mb-4">
                <label for="address" class="form-label">Address</label>
                <textarea name="address" id="address" class="form-control" rows="4" required></textarea>
            </div>
            <div class="form-outline mb-4">
                <button type="submit" class="btn btn-primary form-control">Register</button>
            </div>
            <div class="text-center form-outline mb-4">
                Already have account ? <a href="login" style="text-decoration:none">Login</a>
            </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#show-password').click(function() {
                if ($(this).is(':checked')) {
                    $('#password').attr('type', 'text');
                } else {
                    $('#password').attr('type', 'password');
                }
            });
        });
    </script>
</body>
</html>