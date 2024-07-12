<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css"
        integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <title><?php echo SITENAME ?></title>

</head>

<body class="bg-dark">
    <?php require APPROOT . '/views/inc/navbar.php'; ?>
    <div class="container">
        <div class="text-center bg-dark" style="border-radius: 20px; color:white;">
            <div class="container pb-3">
                <br>
                <?php flash('login_success') ?>
                <?php flash('tabledata') ?>
                <h1 class="display-2"><strong><?php echo $data['title']; ?></strong></h1>
                <a href="<?php echo URLROOT; ?>/tabledata/adduser" class="btn btn-primary">ADD USER</a>
                <p class="lead"><?php echo $data['description']; ?></p>
                <ul>
                    <table class="table table-hover table-dark">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">First Name</th>
                                <th scope="col">last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Username</th>
                                <th scope="col">Password</th>
                                <th scope="col">Edit</th>
                                <?php if ($_SESSION['role'] == 'Admin') { ?>
                                    <th scope="col">Delete</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['db_users'] as $db_user): ?>
                                <tr>
                                    <th scope="row"><?php echo $db_user->id ?></th>
                                    <td><?php echo $db_user->first_name ?></td>
                                    <td><?php echo $db_user->last_name ?></td>
                                    <td><?php echo $db_user->email ?></td>
                                    <td><?php echo $db_user->role ?></td>
                                    <td><?php echo $db_user->username ?></td>
                                    <td><?php echo $db_user->password ?></td>
                                    <td><a href="<?php echo URLROOT; ?>/tabledata/edituser/<?php echo $db_user->id ?>"
                                            class="btn btn-block btn-info" style="color:white">Edit</a></td>
                                    <?php if ($_SESSION['role'] == 'Admin') { ?>
                                        <td><form action="<?php echo URLROOT; ?>/tabledata/delete/<?php echo $db_user->id ?>"
                                            method="post">
                                            <input type="submit" value="Delete" class="btn btn-danger">
                                        </form></td>
                                    <?php } ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </ul>

                <?php require APPROOT . '/views/inc/footer.php'; ?>