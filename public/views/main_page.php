<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/kiosk_mode.css">

    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
    <title>PROJECTS</title>
</head>

<body>
    <div class="base-container">
        <div class="top-bar-container">
            <nav>
                <div class ="left">
                    <img src="public/img/home-03.png">
                </div>
                <div class ="right">
                        <div class="greeting">
                        <?php if(isset($messages)){
                            foreach ($messages as $message){
                            echo $message;
                            }
                        }
                        ?>
                        </div>
                    <img src="public/img/user-square.png">
                    <img  class="chevron" src="public/img/chevron-down.png">
                    <img src="public/img/log-out-03.png">
                </div>
            </nav>
        </div>
        
       
        <main>
            <div class="top-container">
            <div class="vertical-company-info-container">
                <div class="time-container">
                    <img src="public/img/clock.png">
                </div>
                <div class="company-name">
                    <img src="public/img/building-03.png">
                </div>
                <div class="company-address">
                    <img src="public/img/marker-pin-01.png">
                </div>
                    
                </div>
                <?php if(isset($table))
                            echo $table;
                ?>
                
                    <div class="logo-bottom-right">
                        <img src="public/img/logo.svg">
                    </div>
                </div>
            </div>
                
        </main>
    </div>
</body>