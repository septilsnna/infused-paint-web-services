<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url() ?>/logo.jpeg" type="image/gif">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Infused Paint Dashboard</title>
</head>

<body style="font-family: Montserrat; background-color: black; color:white">
    <div class="container">
        <div class="row mt-5">
            <h2>Welcome to Infused Paint Dashboard</h2>
            <a href="/home/logout" class="mx-3 py-2" style="font-weight: bold; color: #F7F7F7;">Logout</a>
        </div>
        <div class="row mt-3">
            <div class="col-md">
                <div class="card mb-3 shadow">
                    <div class="card-body py-4" style="color: black; font-size: large;">
                        <h1><?= $users; ?></h1> USERS
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card mb-3 shadow">
                    <div class="card-body py-4" style="color: black; font-size: large;">
                        <h1><?= $artworks; ?></h1> ARTWORKS
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <h2>Users</h2>
        </div>
        <div class="row mt-3">
            <div class="col-md">
                <table class="table table-hover table-light">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Joined at</th>
                      <th scope="col">Logs</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php $i = 1?>
                     <?php foreach ($users_list as $d) : ?>
                    <tr>
                      <th scope="row"><?= $i ?></th>
                      <td><?= $d['name']; ?></td>
                      <td><?= $d['email']; ?></td>
                      <td><?= $d['created_at']; ?></td>
                      <td><a href="/home/detail/<?= $d['email']; ?>" class="btn btn-outline-dark" style="border-radius: 10px;">See Log</a></td>
                    </tr>
                    <?php $i = $i + 1?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-3">
            <h2>Styles</h2>
        </div>
        <div class="row mt-3">
            <?php foreach ($styles as $d) : ?>
            <div class="col-md-3">
                <div class="card mb-3 shadow">
                    <img src="<?= $d['image_file']; ?>" class="card-img-top">
                    <div class="card-body py-4" style="color: black; font-size: large;">
                        <?= $d['title']; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>