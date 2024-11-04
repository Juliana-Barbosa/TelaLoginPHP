<?php
    require_once 'usuario.php';
    $usuario = new Usuario();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <h2>CADASTRO</h2>
        <form action="" method="post"> <!-- obrigatório -->
        <label>Nome:</label>
        <input type="text" name="nome" placeholder="Digite seu nome.">
        <label>Telefone:</label>
        <input type="tel" name="tel" placeholder="Digite seu telefone.">
        <label>Email:</label>
        <input type="email" name="email" placeholder="Digite seu email.">
        <label>Senha:</label>
        <input type="password" name="senha" placeholder="Digite sua senha.">
        <label>Confirmar Senha:</label>
        <input type="password" name="confSenha" placeholder="Confirme sua senha.">
        <input type="submit" value="CADASTRAR">
        <a href="index.php">VOLTAR</a>
        </form>

        <?php
            if(isset($_POST['nome'])) // por meio do metodo post ira guardar dentro da variavel, se tiver o campo nome:
            {
                $nome = $_POST['nome']; // se foi preenchido será executado
                $telefone = $_POST['tel'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                $confSenha = addslashes($_POST['confSenha']);

                // verificar se todos os campo estão preenchidos
                if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confSenha)) // condição nao tem ;
                { // empty = preenchido
                    $usuario->conectar("cadastroturma32", "localhost", "root", ""); // usuario tem quatro parâmetros
                    if($usuario->msgErro == "") // se a mensagem de erro estiver vazia:
                    {
                        if($senha == $confSenha) // confirme senha
                        {
                            if($usuario->cadastrar($nome, $telefone, $email, $senha)) // então poderá se cadastrar
                            {
                                ?>

                                <!-- essa area vai ser o html -->
                                    <div id="msn-sucesso">
                                        Cadastro com Sucesso.
                                        Clique <a href="index.php">aqui</a> 
                                        para logar.
                                    </div>
                                    <!-- fim da area do html -->
                                
                                <?php
                            }
                            else
                            {
                                ?>
                                <!-- essa area vai ser o html -->
                                    <div id="msn-sucesso">
                                        Email já cadastrado
                                    </div>
                                    <!-- fim da area do html -->
                            
                                <?php
                            }
                        }
                        else
                        {
                            ?>

                            <!-- essa area vai ser o html -->
                                <div id="msn-sucesso">
                                        Senha e Confirma senha não conferem
                                </div>
                                <!-- fim da area do html -->
                            
                            <?php
                        }
                    }
                    else
                    {
                        ?>

                            <!-- essa area vai ser o html -->
                                <div id="msn-sucesso">
                                    <?php echo "Erro: ".$usuario->msgErro; ?>
                                </div>
                                <!-- fim da area do html -->
                            
                            <?php
                    }
                }
                else
                {
                    ?>

                            <!-- essa area vai ser o html -->
                                <div id="msn-sucesso">
                                    Preencha todos os campos
                                </div>
                                <!-- fim da area do html -->
                            
                            <?php
                }
            }
        ?>

</body>
</html>