<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/kiosk_mode.css">

    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
    <title>Attendance</title>
</head>
<body onload="startTime()">
<div class="base-container">
    <div class="top-bar">
        <img class="top-bar-left" src="public/img/home-03.png">
        <div class="top-bar-right">
        <div class="greeting">
        <?php if(isset($messages)){
            foreach ($messages as $message){
            echo $message;
            }
        }
        ?>
        </div>

        <img src="public/img/user-square.png">
        <a href="log_out"> <img src="public/img/log-out-03.png"></a>
        </div>
    </div>
    <div class="page-container">
        <div class="vertical-container">
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
                    <?php if ($punched_in): ?>
                        <form  method="POST" action="enter_time">
                            <button class= "red-button"type="submit" name="punch out">Punch out</button>
                        </form>
                    
                    <?php else: ?>
                        <form  method="POST" action="enter_time">
                            <button class= "green-button" type="submit" name="punch in">Punch in</button>
                            </form>
                        <?php endif; ?> 
                    </div>  
                        <div class="work-time-table">
                            <?php if (isset($table) or True): ?>
                                <table>
                                    <thead>
                                        <tr>
                                            <th><?php echo implode('</th><th>', array("Date","Time of punch in","Time of punch out","Total hours")); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($table as $row): array_map('htmlentities', $row); ?>
                                            <tr>
                                                <td><?php echo implode('</td><td>', $row); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php endif; ?>
                        </div>     
                </div>
                <div class="right-vertical-container">
                <div class="code-text">    
                <div class="kiosk-code">
                        <div> Kiosk code</div>
                        <p>
                            <?php if(isset($kiosk_code)){
                                    echo $kiosk_code;}
                                ?>
                        </p>
                    </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>


</div>