<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../view/styles/login.css">

</head>
<body>
<div class="login-container">
        <h1>MAIRI - BA</h1>
        <h2>Login</h2>
        <form action="../controllers/VerificarLogin.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
            
            <? 
        include __DIR__ . '/../controllers/VerificarLogin.php';
        
             if (isset($_GET['error']) && $_GET['error'] == 1)  {

            ?>
        <p style="color: red;"><?echo 'senha ou email incorretos, tente novamente';?></p>
            <?}?>
            <button type="submit">Entrar</button>
        </form>
    </div>


</body>
</html>