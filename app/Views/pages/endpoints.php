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
            <a href="/home/logout" class="mx-3 py-2" style="font-weight: bold; color: #F7F7F7;">Logout</a>
        </div>
        <div class="row mt-3">
            <h2>GET Method</h2>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 mb-5">
                <div class="list-group">
                    <li class="list-group-item list-group-item-action list-group-item-dark">
                        <h4>Users</h4>
                        /users endpoint to get all users</br>
                        /users/show/{email} endpoint to get user by its email
                    </li>
                    <li class="list-group-item list-group-item-action list-group-item-dark">
                        <h4>Image Styles</h4>
                        /imagestyles endpoint to get all image styles</br>
                        /imagestyles/show/{id} endpoint to get image style by its id
                    </li>
                    <li class="list-group-item list-group-item-action list-group-item-dark">
                        <h4>Image Results</h4>
                        /imageresults endpoint to get all image results</br>
                        /imageresults/show/{email} endpoint to get image result by email</br>
                        /imageresults/show/{email}/{id} endpoint to get image result by email and its id
                    </li>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <h2>POST Method</h2>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 mb-5">
                <div class="list-group">
                    <li class="list-group-item list-group-item-action list-group-item-dark">
                        <h4>Users</h4>
                        /users/create endpoint to create user</br>
                        Body URL Encode: username, password, name, email
                    </li>
                    <li class="list-group-item list-group-item-action list-group-item-dark">
                        <h4>Image Styles</h4>
                        /imagestyles/create endpoint to create image style</br>
                        Body URL Encode: title, creator, image_story, image_file
                    </li>
                    <li class="list-group-item list-group-item-action list-group-item-dark">
                        <h4>Image Results</h4>
                        /imageresults/create endpoint to create image result</br>
                        Body URL Encode: user_id, style_id, content_image, file_result
                    </li>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <h2>PUT Method</h2>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 mb-5">
                <div class="list-group">
                    <li class="list-group-item list-group-item-action list-group-item-dark">
                        <h4>Users</h4>
                        /users/update/{email} endpoint to update user by its email</br>
                        Body URL Encode: username, password, name, email, edit_freq, share_freq
                    </li>
                    <li class="list-group-item list-group-item-action list-group-item-dark">
                        <h4>Image Results</h4>
                        /imageresults/update/{id} endpoint to update image result by its id</br>
                        Body URL Encode: share_ig, share_twitter, share_fb
                    </li>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <h2>DELETE Method</h2>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 mb-5">
                <div class="list-group">
                    <li class="list-group-item list-group-item-action list-group-item-dark">
                        <h4>Users</h4>
                        /users/delete/{email} endpoint to delete user by its email
                    </li>
                    <li class="list-group-item list-group-item-action list-group-item-dark">
                        <h4>Image Results</h4>
                        /imageresults/delete/{id} endpoint to delete image result by its id
                    </li>
                </div>
            </div>
        </div>
    </div>
</body>

</html>