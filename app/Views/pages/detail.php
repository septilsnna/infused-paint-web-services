<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url() ?>/logo.jpeg" type="image/gif">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title><?= $username ?>'s Log</title>
</head>

<body style="font-family: Montserrat; background-color: black; color:white">
    <div class="container">
        <div class="row mt-5">
            <h2><?= $username ?>'s Log</h2>
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
                      <th scope="col">Username</th>
                      <th scope="col">Action</th>
                      <th scope="col">Timestamp</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php if($logs != null) : ?>
                     <?php $i = 1?>
                     <?php foreach ($logs as $d) : ?>
                    <tr>
                      <th scope="row"><?= $i ?></th>
                      <td><?= $d['user_id']; ?></td>
                      <td><?= $d['action']; ?></td>
                      <td><?= $d['timestamp']; ?></td>
                    </tr>
                    <?php $i = $i + 1?>
                    <?php endforeach; ?>
                    <?php endif ?>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>