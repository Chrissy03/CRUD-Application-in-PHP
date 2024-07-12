<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-dark mt-5" style="color:white">
        <?php flash('addUser_success'); ?>
            <h2>Login</h2>
            <p>Please fill your credentials to log in</p>
            <form action="<?php echo URLROOT; ?>/users/login" method="post">
                <div class="form-group">
                    <label for="username">Username: <sup>*</sup></label>
                    <input type="text" name="username" class="form-control form-control-lg <?php
                    echo (!empty($data['username_err'])) ? 'is-invalid' : ''; ?> " value="<?php
                           echo $data['username']; ?>">
                    <span class="invalid-feedback"><?php echo $data['username_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password: <sup>*</sup></label>
                    <input type="password" name="password" class="form-control form-control-lg <?php
                    echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?> " value="<?php
                           echo $data['password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                </div>
                <br>
                <div class="container">
                    <div class="row">
                        <input type="submit" value="Login" class="btn btn-success btn-block">
                    </div>
                    <br>
                    <div class="row">
                        <a href="<?php echo URLROOT; ?>/pages/index" class="btn btn-block" style="color:white">Return To login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>