<?php
    session_start();

    include 'conexao.php';
    
    if (isset($_POST['gravar'])) {
        try {
            $stmt = $conn->prepare('INSERT INTO tabelapessoas (nome) values (:nome)');
            //$stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute(array('nome' => $_POST['nome']));
            //$stmt->execute(); 
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
    
?>
<form method="post">
    <input type="text" name="nome">
    <input type="submit" name="gravar" value="Gravar">
</form>

