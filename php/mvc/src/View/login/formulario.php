<?php require __DIR__ . '/../header.php'; ?>
<form name="login" method="post" action="/realiza-login">
<div class="form-group">
    <label for="email">E-mail:</label>
    <input type="email" name="email" id="email" class="form-control" />
</div>
<div class="form-group">
    <label for="senha">Senha:</label>
    <input type="password" name="senha" id="senha" class="form-control" />
    <button class="btn btn-primary my-4">
        Entrar
    </button>
</div>
</form>
<?php require __DIR__ . '/../footer.php'; ?>