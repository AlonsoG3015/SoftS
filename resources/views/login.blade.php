<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Inicia Sesión en SoftS UPAO</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="/css/Bootstrap/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="/css/App/signin.css">

</head>

<body class="text-center">

    <main class="form-signin w-100 m-auto shadow-lg rounded border-gray-500">
        <form method="POST" action="/login">
            @csrf
            <div class="center">
                <img class="my-2 w-100 " src="https://instructure-uploads.s3.amazonaws.com/account_179770000000000001/attachments/1075/7--Right-side-bar.png" alt="">
                <hr class="h3 mb-3 fw-normal">
                </hr>
                <div class="form-floating mb-3">
                    <input name="id" class="form-control" id="floatingInput" placeholder="name@example.com" required autocomplete="false" maxlength=9>
                    <label for="floatingInput">ID/User</label>
                </div>
                <div class="form-floating">
                    <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" required autocomplete="false">
                    <label for="floatingPassword">Password</label>
                </div>
            </div>

            <div class="checkbox my-3">
                <label>
                    <input id="remember-me" type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="w-100 btn btn-lg" style="background-color: #0374b5; color:white" type="submit">Ingresar</button>
        </form>
    </main>



</body>

</html>