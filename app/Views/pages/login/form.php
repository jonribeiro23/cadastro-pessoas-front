<div class="row m-10">
  <div class="col offset-m4 s12 m4">
    <h1 class="text-center">Login</h1>
  </div>
</div>

<?php if (isset($validation)) : ?>

  <div class="row">
    <div class="col s1 m3"></div>
    <div class="col s10 m6">
      <div class="card">
        <div class="card-content" align="center">
          <?= $validation->listErrors() ?>
        </div>
      </div>
    </div>
    <div class="col s1 m3"></div>
  </div>

<?php endif ?>

<div class="row m-5">
  <div class="col s1 m2 l4"></div>
  <div class="col s10 m8 l4">
    <form action="<?= base_url('login') ?>" method="post">
      <div class="input-field col s12">
        <input id="email" type="email" class="validate" name="email">
        <label for="email">Email</label>
      </div>

      <div class="input-field col s12">
        <input id="password" type="password" class="validate" name="password">
        <label for="password">Senha</label>
      </div>


      <button class="btn waves-effect waves-light" type="submit" name="action">Entrar</button>

    </form>
  </div>
  <div class="col s1 m2 l4"></div>
</div>