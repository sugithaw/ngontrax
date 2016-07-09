<?php session_start(); ?>

<div class="navbar-fixed">
    <nav>
        <ul class="nav-wrapper blue">
            <li><a class="left" href="#!" onclick="$('.button-collapse').sideNav('show');"><i class="material-icons">menu</i></a></li>
            <li id="title-text" class="brand-logo center" style="display:none;"><?php echo $pagenow ?></li>
        </ul>
        <ul id="slide-out" class="side-nav">
            <li><a href="#">Hi, <?php echo $_SESSION['user'] ?></a></li>
            <li class="divider"></li>
            <li><a href="../view/dashboard.php">Dashboard</a></li>
            <li><a href="../view/profile.php">Profil saya</a></li>
            
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header">Asset saya</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="#!">Kost</a></li>
                                <li><a href="#!">Non-Kost</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            
            <li><a href="#!">Laporan</a></li>
            <li class="divider"></li>
            <li><a href="../controler/ctrl-logout.php">Log out</a></li>
            

        </ul>
        <a href="#!" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>  
    </nav>
</div>
    
<script>
    $('.button-collapse').sideNav({
      menuWidth: 240,
      closeOnClick: true
    }
  );
</script>