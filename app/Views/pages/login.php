<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url() ?>/logo.jpeg" type="image/gif">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Infused Paint REST API</title>
</head>

<body style="font-family: Montserrat; background-color: black; color:white">
    <div class="container">
        <div class="row mt-5">
            <h2>Welcome to Infused Paint REST Server</h2>
        </div>
        <div class="row mt-3">
            <h4>Login Here</h4>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 mb-5">
                <form action="/home/login" method="post">
                    <div class="form-group row px-4">
                        <div class="col-md-12 py-2">
                            <label style="font-weight: normal;" for="username">Username</label>
                            <input type="text" class="form-control"
                                style="border-radius: 10px; background-color: C4C4C4; opacity: 0.8" id="username"
                                name="username" required autofocus>
                        </div>
                        <div class="col-md-12 pt-2">
                            <label style="font-weight: normal;" for="password">Password</label>
                            <input type="password" class="form-control"
                                style="border-radius: 10px; background-color: C4C4C4; opacity: 0.8"
                                id="password" name="password" required>
                        </div>
                    </div>
                    <div class="form-group row px-4 pt-4 justify-content-center">
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-block"
                                style="font-weight: bold; background-color: #FEB724; border-radius: 20px">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>