<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <title>REGISTER</title>
</head>

<body>
    <div class="container">
        <div class="logo">
            <img src="public/img/logo.svg">
        </div>
        <div class="login-panel-container">
            <form class="register" action="register_company" method="POST">
                
                <div>AAAAAAAAAAA\n\n\n</div>
                <input name="email" type="text" placeholder="email@email.com">
                <input name="password" type="password" placeholder="password">
                <input name="confirmedPassword" type="password" placeholder="confirm password">
                <input name="company_name" type="text" placeholder="company name">
                <input name="company_address" type="text" placeholder="company address">
                <!--<input name="employer_id" type="text" placeholder="employer ID">-->
                <button type="submit">REGISTER</button>
            </form>
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