<?php
try {
    $conexao = new PDO('mysql:host=localhost;dbname=cadastroturma32', 'root', '');
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $result = $conexao->query("SELECT * FROM usuarios")->fetchAll();

    foreach ($result as $item) {
        echo $item['nome'] . ' - ' . $item['email'] . '<br/>';
    }


    var_dump($result);
} catch (PDOException $erro) {
    echo 'ERRO =>' . $erro->getMessage();
}
?>
