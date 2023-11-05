<?php  
    include ('conexao.php');
    session_start();

    $status = $conn->query("SELECT * FROM personagem WHERE id = " . $_SESSION['id']);
    $status1 = $status->fetch_assoc();

    if (isset($_POST['forca']) && $status1["ouro"] >= ($status1["stat1"] * $status1["stat1"])) {
        $stat = $status1['stat1'] + 1;
        $ouroareduzir = $status1['ouro'] - ($status1['stat1'] * $status1['stat1']);
        $conn->query("UPDATE personagem SET stat1 = '$stat', ouro = '$ouroareduzir' WHERE id = " . $_SESSION['id']);
    } 
    else if (isset($_POST['agilidade'])) {
        $stat = $status1['stat2'] + 1;
        $ouroareduzir = $status1['ouro'] - ($status1['stat2'] * $status1['stat2']);
        $conn->query("UPDATE personagem SET stat2 = '$stat', ouro = '$ouroareduzir' WHERE id = " . $_SESSION['id']);
    }
    else if (isset($_POST['destreza'])) {
        $stat = $status1['stat3'] + 1;
        $ouroareduzir = $status1['ouro'] - ($status1['stat3'] * $status1['stat3']);
        $conn->query("UPDATE personagem SET stat3 = '$stat', ouro = '$ouroareduzir' WHERE id = " . $_SESSION['id']);
    }
    else if (isset($_POST['resistencia'])) {
        $stat = $status1['stat4'] + 1;
        $ouroareduzir = $status1['ouro'] - ($status1['stat4'] * $status1['stat4']);
        $conn->query("UPDATE personagem SET stat4 = '$stat', ouro = '$ouroareduzir' WHERE id = " . $_SESSION['id']);
    }
    else {
        echo "Você não tem ouro suficiente";
        echo "<br><a href='../registrar.php'><button>Voltar</button></a>";
    }
?>
