<html>
    <head>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="../css/materialize.css"  media="screen,projection"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../js/materialize.min.js"></script>
    </head>
    
    <body class="container">
        <div class="row">
            <div class="col l4 m6 s12 offset-l4 offset-m3">
                <div>
                    <div class="card-content">
                        <br>
                        <center><img src="../pics/sys/logo-64.png"></center>
                        <br>
                        <br>
                        <br>
                        <form action="controler/ctrl-login.php" method="post">
                            <div class="input-field">
                                <input type="text" name="username" id="username">
                                <label for="username"><i class="material-icons">account_circle</i></label>
                            </div>
                            <div class="input-field">
                                <input type="password" name="password" id="password">
                                <label for="password"><i class="material-icons">vpn_key</i></label>
                            </div>
                            <div class="input-field">
                                <input class="btn blue" type="submit" value="Masuk" style="width:100%; height: 4em">
                            </div>
                        </form>
                        <div class="divider"></div>
                        <div class="">
                            <a href="wellcome-splash.php" class="left green-text">Daftar menjadi anggota</a>
                            <span class="blue-text">|</span>
                            <a href="" class="right red-text">Bantuan masuk</a>
                        </div>
                        <div class="divider"></div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>