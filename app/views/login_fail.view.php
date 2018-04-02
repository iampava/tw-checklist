<!DOCTYPE html>
<html lang="en">

<?php 
    include_once $_SERVER['DOCUMENT_ROOT'] . "/app/views/components/general.components.php";

    echo Components::createHead();
?>

<body>
    <?php 
        echo Components::createHeader();
    ?>
    
    <form class="form" id="loginForm" action="/" method="POST">
        <div class="form__github">
            <button type="button" class="btn" id="gitHubLoginBtn">
                <img src="public/images/github-logo.svg" alt="GitHub Logo" />
                <span> Sign in with GitHub </span>
            </button>
            <p class="separator"> or </p>
        </div>
        <div class="form-group">
            <label for="usernameInput"> Username </label>
            <input type="text" id="usernameInput" name="username" required/>
        </div>
        <div class="form-group">
            <label for="passwordInput"> Password </label>
            <input type="password" id="passwordInput" name="password" required />
        </div>
        <button type="submit" class="btn" id="loginBtn" name="login_submit"> Log in </button>
        <a href="/home" class="link"> Continue as anonymous </a>
    </form>
    <p id="loginErrorMessage">⚠ Invalid credentials</p>
</body>

</html>