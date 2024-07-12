<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo URLROOT?>/">HOMEPAGE</a>
          </li>
        </ul>
        <ul class="navbar-nav">
          <?php if(isset($_SESSION['user_id'])) : ?>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT ?>/users/logout">LOG OUT</a>
          </li>
          <?php else :?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT ?>/users/login">LOG IN</a>
          </li>
          <?php endif; ?>
        </ul>
      </div>
    </nav>