<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-dark" style="color:white">
            <h2>Add A User</h2>
            <p>Please fill in the form to add a user</p>
            <form action="<?php echo URLROOT; ?>/tabledata/adduser" method="post">
                <div class="form-group">
                    <label for="first_name">First Name: <sup>*</sup></label>
                    <input type="text" name="first_name" class="form-control form-control-lg <?php
                    echo (!empty($data['first_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php
                          echo $data['first_name']; ?>">
                    <span class="invalid-feedback"><?php echo $data['first_name_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name: <sup>*</sup></label>
                    <input type="text" name="last_name" class="form-control form-control-lg <?php
                    echo (!empty($data['last_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php
                          echo $data['last_name']; ?>">
                    <span class="invalid-feedback"><?php echo $data['last_name_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="email">Email: <sup>*</sup></label>
                    <input type="email" name="email" class="form-control form-control-lg <?php
                    echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php
                          echo $data['email']; ?>">
                    <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="role">Role: <sup>*</sup></label>
                    <input type="text" name="role" class="form-control form-control-lg <?php
                    echo (!empty($data['role_err'])) ? 'is-invalid' : ''; ?>" value="<?php
                          echo $data['role']; ?>">
                    <span class="invalid-feedback"><?php echo $data['role_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="username">Username: <sup>*</sup></label>
                    <input type="text" name="username" class="form-control form-control-lg <?php
                    echo (!empty($data['username_err'])) ? 'is-invalid' : ''; ?>" value="<?php
                          echo $data['username']; ?>">
                    <span class="invalid-feedback"><?php echo $data['username_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password: <sup>*</sup></label>
                    <input type="password" name="password" class="form-control form-control-lg <?php
                    echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php
                          echo $data['password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password: <sup>*</sup></label>
                    <input type="password" name="confirm_password" class="form-control form-control-lg <?php
                    echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php
                          echo $data['confirm_password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
                </div>
                <br>
                <div class="container">
                    <div class="row">
                        <input type="submit" value="Add User" class="btn btn-success btn-block">
                    </div>
                    <br>
                    <div class="row">
                        <a href="<?php echo URLROOT; ?>/table/index" class="btn btn-block" style="color:white">Return To Table</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>