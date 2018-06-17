<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login - SEGEDS Admin</title>
    <!-- Bootstrap core CSS-->
    <link href="<?= BASE_URL ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="<?= BASE_URL ?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Carrega CSS assets-->
    <link href="<?= BASE_URL ?>assets/libs/poppins/stylesheet.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>assets/css/login.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="body">
<main>
    <form id="form_login">
        <span class="titulo">SEGEDS admin</span>
        <input type="text" required name="login" placeholder="Login">
        <input type="password" required name="senha" placeholder="Senha">

        <button type="submit">LOGIN</button>

        <span class="msg" id="msg"></span>

    </form>
</main>

<script type="text/javascript">var BASE_URL = "<?php echo BASE_URL; ?>";</script>
<script src="<?= BASE_URL ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= BASE_URL ?>assets/js/login.js"></script>
</body>
</html>