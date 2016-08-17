<?php session_start(); ?>

<div class="navbar-fixed">
    <nav>
        <ul class="nav-wrapper blue">
            <li><a class="left" href="#!" onclick="$('.button-collapse').sideNav('show');"><i class="material-icons">menu</i></a></li>
            <li id="title-text" class="brand-logo center" style="display:none;"><?php echo $pagenow ?></li>
        </ul>
        <ul id="slide-out" class="side-nav">
            <li>
                <div class="userView">
                    <img class="background" src="../../pics/sys/side-back.jpg">
                    <a href="#!user"><img class="circle" src="../../pics/profile/pemilik/<?php echo $_SESSION['foto'] ?>"></a>
                    <a href="#!name"><span class="white-text name">Hi, <?php echo $_SESSION['user'] ?></span></a>
                    <a href="#!email"><span class="white-text email">ID :  <?php echo $_SESSION['id_pemilik'] ?></span></a>
                </div>
            </li>
            <li><a href="../view/dashboard.php">Dashboard</a></li>
            <li><a href="../view/profile.php">Profil saya</a></li>
            <li><a href="../view/asset.php">Asset saya</a></li>
            <li><a href="#!">Laporan</a></li>
            <li class="divider"></li>
            <li><a href="../controler/ctrl-logout.php">Log out</a></li>
            

        </ul>
        <a href="#!" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>  
    </nav>
</div>
    
<script>
    $('.button-collapse').sideNav({
      menuWidth: 300,
      closeOnClick: true
    }
  );
</script>