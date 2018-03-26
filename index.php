<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TW Checklist</title>
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Mono" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./style.css" />
</head>

<body>
    <?php 
        session_start();

        if(isset($_SESSION['username'])) {
            header("Location: /php/public/home.php");
        }
    ?>
    <header>
        <h1> 
            <span class="emoji">🚀</span> 
            TW Checklist 
            <span class="emoji">🚀</span>
        </h1>
    </header>
    <form class="form" id="loginForm" action="/php/actions/auth/login.php" method="POST">
        <div class="form-group">
            <label for="usernameInput"> Username </label>
            <input type="text" id="usernameInput" name="username" required/>
        </div>
        <div class="form-group">
            <label for="passwordInput"> Password </label>
            <input type="password" id="passwordInput" name="password" required />
        </div>
        <button type="submit" class="btn" id="loginBtn" name="submit"> Log in </button>
        <a href="/checklist" class="link"> Continue as anonymous </a>
        <?php
            if(isset($_GET['invalid_login'])){
                echo "Invalid login";
            }
        ?>
    </form>
</body>

</html>