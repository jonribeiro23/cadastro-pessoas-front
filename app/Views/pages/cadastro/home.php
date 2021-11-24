<div class="row m-10">
    <div class="col offset-m4 s12 m4">
        <h3 class="text-center">Cadastrar Usuário</h3>
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


<!-- FOMULARIO -->
<div class="row m-5">
    <div class="col s1 m2 l4"></div>
    <div class="col s10 m8 l4">
        <form action="<?= base_url('cadastrar') ?>" method="post">
            <div class="input-field col s12">
                <input id="nome" type="text" class="validate" name="nome">
                <label for="nome">Nome</label>
            </div>

            <div class="input-field col s12">
                <input id="email" type="email" class="validate" name="email">
                <label for="email">Email</label>
            </div>

            <div class="input-field col s12">
                <input id="telefone" type="text" class="validate" name="telefone">
                <label for="telefone">Telefone</label>
            </div>

            <div class="input-field col s12">
                <input id="nascimento" type="date" class="validate" name="nascimento">
                <label for="nascimento">Nascimento</label>
            </div>

            <div class="input-field col s12">
                <select name="sexo">
                    <option value="" disabled selected>Escolher...</option>
                    <option value="m">Homem</option>
                    <option value="f">Mulher</option>
                </select>
                <label>Sexo</label>
            </div>


            <button class="btn waves-effect waves-light" type="submit" name="action">Cadastrar</button>

        </form>
    </div>
    <div class="col s1 m2 l4"></div>
</div>

<!-- USUARIOS -->
<?php if (isset($users)) : ?>

    <div class="row m-5">

        <div class="col s1 m3"></div>
        <div class="col s10 m6">
            <h3 class="text-center">Usuários cadastrados</h3>
        </div>
        <div class="col s1 m3"></div>

    </div>

    <?php foreach($users as $user): ?>
    <div class="row">

        <div class="col s1 m3"></div>
        <div class="col s10 m6">
            <div class="card">
                <div class="card-content" align="center">
                    <p>
                        <b>Nome: </b> <?= $user->nome ?>
                    </p>

                    <p>
                        <b>Email: </b> <?= $user->email ?>
                    </p>

                    <p>
                        <b>Telefone: </b> <?= $user->telefone ?>
                    </p>

                    <p>
                        <b>Data de Nascimento: </b> <?= $user->dataNascimento ?>
                    </p>

                    <p>
                        <b>Sexo: </b> <?= $user->sexo == 'm' ? 'Masculino' : 'Feminino'  ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col s1 m3"></div>

    </div>
    <?php endforeach ?>

<?php endif ?>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems, '');
    });
</script>