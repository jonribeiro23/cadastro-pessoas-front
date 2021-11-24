<?php \Config\Services::session(); ?>
<!DOCTYPE html>
<html>

<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="<?= base_url('public/assets/css/materialize.min.css') ?>" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="<?= base_url('public/assets/css/main.css') ?>" media="screen,projection" />

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Logo</a>
      
      <?php if(session()->get('is_logged_in')): ?>
      <ul class="right hide-on-med-and-down">
        <li><a href="<?= base_url('logout') ?>">Logout</a></li>
      </ul>
      <?php endif ?>

      <?php if(session()->get('is_logged_in')): ?>
      <ul id="nav-mobile" class="sidenav">
        <li><a href="<?= base_url('logout') ?>">Logout</a></li>
      </ul>
      <?php endif ?>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <?= view($view_name) ?>
  <!--JavaScript at end of body for optimized loading-->
  <script type="text/javascript" src="<?= base_url('public/assets/js/materialize.min.js') ?>"></script>
</body>

</html>