<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>LOGIN PAGE</title>
</head>

<body>
    <div class="container">
        <div class="logo">
            <img src="public/img/logo.svg">
        </div>
        <div class="login-panel-container">
            <form class="login" action="login" method="POST">
                <div class="messages">
                    <?php if(isset($messages)){
                        foreach ($messages as $message){
                        echo $message;
                        }
                    }
                    ?>
                </div>
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
                <button type="submit" >LOGIN</button>
            </form>
        </div>
    </div>
</body>