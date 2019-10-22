<?php
    session_start();

    include 'conexao.php';

    if (isset($_GET['id']))
        $id = $_GET['id'];

    try {
        if (isset($id)) {
            $stmt = $conn->prepare('SELECT * FROM tabelapessoas WHERE id = :id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        } else {
            $stmt = $conn->prepare('SELECT * FROM tabelapessoas');
        }
        //$stmt->execute(array('id' => $id));
        $stmt->execute();
    
        //while($row = $stmt->fetch()) {
        //while($row = $stmt->fetch(PDO::FETCH_OBJ)) {
            //print_r($row);
        //}

        $result = $stmt->fetchAll();

        if ( count($result) ) {
            foreach($result as $row) {
                print_r($row);
            }
        } else {
            echo "Nenhum resultado retornado.";
        }

    } catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
    }

    if (isset($id)){
        try {
            $stmt = $conn->prepare('DELETE FROM tabelapessoas (id) values (:id)');
            $stmt->bindParam(':id',$id, PDO::PARAM_INT);
        } else {
            $stmt = $conn->prepare('DELETE * FROM tabelapessoas (id)');       
    }
    }
    
?>
<form>
    <input type="text" name="id">
    <input type="submit" name="Deletar">
</form>
