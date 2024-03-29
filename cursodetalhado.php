<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title> InForma </title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" type="text/css" href="style/decoracao.css" media="screen" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;700&display=swap" rel="stylesheet">
</head>
<body>

<?php 
if(isset($_SESSION['emailUsuario'])) { ?>
    <div class="fixed-action-btn">
        <a href="feedback.php" class="btn-floating btn-large btn-primary"> 
            <i class="bi bi-chat"></i>
        </a>
    </div>
<?php
}
?>
    
    <!-- MENU -->
    <header>
    <nav class="navbar navbar-expand-lg" id="nav">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php" id="name-nav"> <img src="img/logofinal.png" alt="Logo da InForma" class="logo"></a>
            <button id="botao" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbar">
                <ul class="navbar-nav">
                    <li>
                        <a class="nav-link" href="index.php"> HOME </a>
                    </li>

                    <li>
                        <a class="nav-link" href="cursos.php"> CURSOS </a>
                    </li>

                    <li>
                        <a class="nav-link" href="campus.php"> CAMPUS </a>
                    </li>
                    
                    <li>
                        <a class="nav-link" href="forum.php"> FÓRUM </a>
                    </li>

                    
                    <li>
                        <?php
                            if(isset($_SESSION['emailUsuario'])) {
                                echo "<a class='nav-link' href='perfil.php'> PERFIL </a>";
                            } 
                        ?>
                    </li>

                    <li>
                        <?php
                            if(!isset($_SESSION['emailUsuario'])) {
                                echo "<a class='nav-link' href='login.php'> LOGIN </a>";
                            } else {
                                echo "<a class='nav-link' href='sair.php' id='sair'> SAIR </a>";
                            }
                        ?>
                    </li>
                </ul>             
            </div>
        </div>
    </nav>
</header>


        <?php 
        $codigo = $_GET["idCurso"]; 

        include_once("conexao.php");
        $sql = "SELECT * FROM table_cursos WHERE idCurso = '$codigo'";
        $result = $conexao->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {?>

            <section class="primeiro-conteudo">
                <div class="imagem-curso"> 
                    <?php echo "<img src='".$row['imagemCurso']."' alt='Imagem do curso'>"; ?>
                    <?php echo "<h2>" .$row['nomeCurso']. "</h2>"; ?>
                </div>

                <div class="descricao-curso">
                    <h3> Descrição: </h3>
                    <?php echo "<p>" .$row['descricaoCurso']. "</p>"; ?>
                    <?php echo "<p><strong> Duração: </strong>" .$row['duracaoCurso']."</p>"; ?>
                    <?php echo "<p><strong> Carga Horária: </strong>" .$row['horasCurso']. "</p>"; ?>
                    <?php echo "<p><strong> Campus: </strong>" .$row['campusCurso']. "</p>"; ?>
                </div>
            </section>  
            
            <section class="segundo-conteudo">
                <img src="img/video_indisponivel.png" alt="Vídeo Indisponível" width='800' height='400'>
                <?php //echo "<video src='" .$row['videoCurso']."' width='800' height='600' preload='auto' controls> </video>"; ?>
            </section>
            
            <section class="terceiro-conteudo">
            <h3 class="titulo-documento"> DOCUMENTOS: </h3>
                <div>
                    <?php echo "<a href='".$row['docCurso']."'><img class='zoom' src='img/ppc.png' alt=''></a>"; ?>
                </div>
            </section>

        <?php
            }
        }
        ?>


        <!-- RODAPÉ -->
        <footer class="container-fluid">
    <div class="row rodape-area">
            <div class="col-4">
                <p><a href="index.php"> INÍCIO </a></p>
                <p><a href="cursos.php"> Cursos </a></p>
                <p><a href="campus.php"> Campus </a></p>
            </div>

            <div class="col-4">
                <p><a href="forum.php"> FÓRUM </a></p>
                <p><a href="feedback.php"> Feedback </a></p>
            </div>

            <div class="col-4">
                <a href="https://www.instagram.com/informa_ifrn/"><i class="bi bi-instagram"></i></a>
                <a href="https://twitter.com/informa_ifrn"><i class="bi bi-twitter"></i></a>
            </div>
        </div>

    <div class="row copyright">
        <p> © 2022 Copyright - InForma Corp. </p>
    </div>
</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>