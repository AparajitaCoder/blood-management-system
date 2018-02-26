
    <nav class="navbar fixed-top navbar-toggleable-md navbar-inverse bg-inverse">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container">
            <a class="navbar-brand" href="index.php">Blood Management System</a>
            <div class="collapse navbar-collapse" id="navbarExample">
                <ul class="navbar-nav ml-auto">
                   
                 
                     <li class="nav-item">
                        <a class="nav-link" href="search-donor.php">Search Blood</a>
                    </li>
                    <?php if($_SESSION['hlogin'] == "" && $_SESSION['ulogin'] == ""){?>
                    <li>
                     <div class="btn-group" id="register">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                Register <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li> <a href="become-hospital.php">Hospital</a></li>
                                <li class="divider"></li>
                                <li> <a href="become-receiver.php">Receiver</a></li>
                            </ul>
                        </div>
                    </li>
                    <?php }?>
                     <li>

                    <?php if($_SESSION['hlogin'] != ""){?>
                            <a class="nav-link" href="hospital/dashboard.php">Dashboard</a>
                            <a class="nav-link" href="logout.php">Logout</a>
                           
                    <?php } elseif($_SESSION['ulogin'] != ""){?>
                            <a class="nav-link" href="receiver/change-password.php">Dashboard</a>
                            <a class="nav-link" href="logout.php">Logout</a>
                           
                    <?php }else {?>
                             <div class="btn-group" id="register">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    Login <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li> <a href="hospital/index.php">Hospital</a></li>
                                    <li class="divider"></li>
                                    <li> <a href="receiver/index.php">Receiver</a></li>
                                </ul>
                            </div>
                    <?php }?>
                    </li>
                 
                 
                </ul>
            </div>
        </div>
    </nav>
