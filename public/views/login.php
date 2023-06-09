<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/login.css">
    <title>LOGIN PAGE</title>
</head>

<body>
    <div class="container">
        <div class="logo">
            <img src="public/img/logo.svg">
        </div>
        <div class="login-panel-container">
            <form class="login" action="login_trigger" method="POST">
                
                <div class="welcome">Welcome!</div>
                <div class="login-container">
                    <div> email </div>
                    <input name="email" type="text" placeholder="email">
                </div>
                <div class="password-container">
                    <div> password </div>
                    <input name="password" type="password" placeholder="password">
                </div>
                <div class="small-text">
                    <div>forgot password?</div>
                </div>
                <div class="login-as-company-container">
                    <label for="loginAsCompany">Log in as company?</label>
                    <input type="checkbox" id="loginAsCompany" name="login_as_company" />
                    
                </div>
                
                
                
                <button type="submit" >LOGIN</button>
                <div class="register-links">
                    <a href="register_user">Register as worker</a>
                    <a href="register_company">Register as company</a>
                </div>
                <div class="messages">
                    <?php if(isset($messages)){
                        foreach ($messages as $message){
                        echo $message;
                        }
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>
</body>
