<?php require APPROOT . '/views/inc/header.php'; ?>
<?php ?>
<div class="text-center bg-dark" style="border-radius: 20px; color:white;">
    <div class="container pb-3">
        <br>
        <?php flash('login_success') ?>
        <h1 class="display-2"><strong><?php echo $data['title']; ?></strong></h1>
        <p class="lead"><?php echo $data['description']; ?></p>
        <div class="container">
            <div>
                <button class="btn btn-success btn-block">
                    <a class="nav-link" href="<?php echo URLROOT ?>/users/login/">Login</a>
                </button>
            </div>
        </div>
        <?php require APPROOT . '/views/inc/footer.php'; ?>