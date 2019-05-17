<?php

include('conexao.php');
$idPessoa = $_GET['idPessoa'];
$query = "Select * from tbPessoa where idPessoa = '$idPessoa';";
$resultado = mysqli_query($conexao,$query);
mysqli_close($conexao);
foreach ($resultado as $linha) {
    $idPessoa = $linha['idPessoa'];
    $nmPessoa = $linha['nmPessoa'];
}
?>


<!DOCTYPE HTML>

<html>

<head>
    <title>Ranking No Bugs</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/pessoa.css" />>
</head>

<body>

    <section id="main">
        <div class="inner">

            <!-- One -->
            <section id="one" class="wrapper style1" align="cente">
                <header id="cabecalho">
                    <nav class="menu">
                        <ul>
                            <li><a href="#"><strong>Ranking</stron></a>
                                <ul class="submenu">
                                    <li><a href="geral.php"><strong>Geral</strong></a>
                                    <li><a href="index.php"><strong>Anual</strong></a>
                                    <li><a href="mensal.php"><strong>Mensal</strong></a>
                                    <li><a href="semanal.php"><strong>Semanal</strong></a>
                                </ul>

                            <li><a href="login-php/index.php"><strong>Login</strong></a></li>
                        </ul>
                    </nav>

                </header>
            </section>

            <header class="special">
                <div>
                    <h3 align="center">Detalhes de <?php echo $nmPessoa ?></h3>
                </div>
                <div>
                    <font color="black">
                        <table align="center" style="font-family: Mario Kart regular">
                            <strong>
                                <tr align="center">
                                    <td>Atividade</td>
                                    <td>Pontos</td>
                                    <td></td>
                                </tr>
                                <tbody>
                                    <?php
                                        include("conexao.php");
                                        if ($conexao) {
                                            $sql = "Select * from tbAtividade a inner join tbPessoaAtividade pa on a.idAtividade = pa.idAtividade where pa.idPessoa = '$idPessoa'; ";
                                            $resultado = mysqli_query($conexao, $sql);
                                            $row = mysqli_num_rows($resultado);
                                            mysqli_close($conexao);
                                            if ($row > 0) {
                                                foreach ($resultado as $linha) {
                                                    echo "<tr>";
                                                        echo"<td align='center'>".$linha['desAtividade']."</td>";
                                                        echo"<td align='center'>".$linha['pontos']."</td>";
                                                        echo"<td> <a class='btn btn-danger'  href='pessoaDetalhes.php?idPessoa=".$linha['idPessoa']."'> Excluir </a> </td>";
                                                    echo"</tr>";
                                                }
                                            }
                                        }
                                    ?>
                                </tbody>
                                <br>
                                <td color="blue">
                                    Total de Atividades
                                </td>
                                <td>Total de pontos</td>
                                </tr>
                        </table>
                    </font>
                </div>
                <br><br><br><br>
        </div>
    </section>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.poptrox.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>