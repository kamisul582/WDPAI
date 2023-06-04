<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/kiosk_mode.css">

    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
    <title>PROJECTS</title>
</head>

<body onload="startTime()">
    <div class="base-container">
        <div class="top-bar-container">
            <nav>
                <div class ="left">
                    <img src="public/img/home-03.png">
                </div>
                <div class ="right">
                    <img src="public/img/user-square.png">
                    <img  class="chevron" src="public/img/chevron-down.png">
                    <a href="log_out"> <img src="public/img/log-out-03.png"></a>
                </div>
            </nav>
        </div>
        
       
        <main>
        <div class="top-container">
            
            <div class="horizontal-company-info-container">
                
                <div class="company-name">
                    <img src="public/img/building-03.png">
                    <?php if(isset($company_name)){
                            echo $company_name;}
                        ?>
                </div>
                <div class="company-address">
                    <img src="public/img/marker-pin-01.png">
                    <?php if(isset($company_address)){
                            echo $company_address;}
                        ?>
                </div>
                <div class="time-container">
                    <img src="public/img/clock.png">
                    <div id="txt"></div>
                    <script>
                        function startTime() {
                          const today = new Date();
                          const options = { month: "long" };
                          let month = new Intl.DateTimeFormat("en-US", options).format(today)
                          let day = today.getDate();
                          let h = today.getHours();
                          let m = today.getMinutes();
                          let s = today.getSeconds();
                          m = checkTime(m);
                          s = checkTime(s);
                          document.getElementById('txt').innerHTML = (month + " " + day + " " + h + ":" + m + ":" + s).trim();
                          setTimeout(startTime, 1000);
                        }

                        function checkTime(i) {
                          if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
                          return i;
                        }
                        </script>
                <div class="kiosk-container">
                    <div>Enter Kiosk code</div>
                    <form class="kiosk-code" action="enter_kiosk_code" method="POST">
                        <input name="kiosk_code" type="text" placeholder="Kiosk code">
                        <button type="submit" >Submit</button>
                    </form>
                </div>
                <div class="logo-bottom">
                    <img src="public/img/logo.svg">
                </div>
        </main>
    </div>
</body>