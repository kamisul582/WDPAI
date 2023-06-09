<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/login.css">
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <title>REGISTER</title>
</head>

<body>
    <div class="container">
        <div class="logo">
            <img src="public/img/logo.svg">
        </div>
        
        <div class="login-panel-container">
        <div class="welcome">Register User</div>
            <form class="register" action="register_user" method="POST">
                
                <div class="login-container">
                    <div> email </div>
                    <input name="email" type="text" placeholder="email@email.com">
                </div>
                <div class="login-container">
                    <div> password </div>
                    <input name="password" type="password" placeholder="password">
                </div>
                <div class="login-container">
                    <div> password </div>
                    <input name="confirmedPassword" type="password" placeholder="confirm password">
                </div>
                <div class="login-container">
                    <div> name </div>
                    <input name="name" type="text" placeholder="name">
                </div>
                <div class="login-container">
                    <div> surname </div>
                    <input name="surname" type="text" placeholder="surname">
                </div>
                <div class="login-container">
                    <div> employer ID </div>
                    <input name="employer_id" type="text" placeholder="employer ID">
                </div>
                
                <button type="submit">REGISTER</button>
            </form>
            <div class="register-links">
                    <a href="register_company">Register as company</a>
                    <a href="log_out">Log in</a>
                </div>
            <div class="messages">
                    <?php if(isset($messages)){
                        foreach ($messages as $message){
                        echo $message;
                        }
                    }
                    ?>
                </div>
        </div>
    </div>
</body>