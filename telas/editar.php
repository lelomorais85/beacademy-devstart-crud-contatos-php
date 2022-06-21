<h1>Editar Cadastro</h1>

<form action="" method="post">
    <input value="<?php echo $dados[0];?>" name="nome" type="text" class="form-control mt-2" placeholder="Nome">
    <input value="<?php echo $dados[1];?>" name="email" type="text" class="form-control mt-2" placeholder="Email">
    <input value="<?php echo $dados[2];?>" name="telefone" type="text" class="form-control mt-2" placeholder="Telefone">

    <button class='btn btn-primary mt-2'>Enviar</button>
</form>