<!doctype html>
<html>
    <head>
        <title>AlertWalk</title>
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.js"></script>
        <script src="main.js"></script>
    </head>
    <body>
        <nav>
            <a href class="left">AlertWalk</a>
            
            <a href class="right">(l)</a>
            <a href class="right">:</a>
            <br class="clr">
        </nav>
        
        <main>
            <div id="location">
                <h1>Your current location is:</h1>
                <div class="loc-name">...</div>
                <div class="meter">
                    <div style="background-color:#FFC107;">&nbsp;</div>
                    <div style="background-color:#FF9800;">&nbsp;</div>
                    <div style="background-color:#F44336;">&nbsp;</div>
                    <br class="clr">
                </div>
            </div>
            
            <div id="buttons">
                <button id="btn-taxi">Call a Taxi</button>
                <button id="btn-bus">Nearby bus</button>
                <button>Safezones</button>
            </div>
        </main>
        
        <iframe id="ifrm" src></iframe>
        
    </body>
</html>