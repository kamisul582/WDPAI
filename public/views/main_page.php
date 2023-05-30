<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/kiosk_mode.css">

    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
    <title>Attendance</title>
</head>

<body onload="startTime()">
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
                          let h = today.getHours();
                          let m = today.getMinutes();
                          let s = today.getSeconds();
                          m = checkTime(m);
                          s = checkTime(s);
                          document.getElementById('txt').innerHTML =  h + ":" + m + ":" + s;
                          setTimeout(startTime, 1000);
                        }

                        function checkTime(i) {
                          if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
                          return i;
                        }
                        </script>
                        <?php if ($punched_in): ?>
                            <form  method="POST" action="punch_in">
                                <button class= "red-button"type="submit" name="punch out">Punch out</button>
                            </form>
                        
                        <?php else: ?>
                            <form  method="POST" action="punch_in">
                                <button class= "green-button" type="submit" name="punch in">Punch in</button>
                            </form>
                        <?php endif; ?>        
                </div>
                <div class="work-time-table">
                <?php if (isset($table)): ?>
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
                
                
                
                   
            
                
                
               
                
            </form>
                
                </div>
            </div>
                
        </main>
    </div>
</body>