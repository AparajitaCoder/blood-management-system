<?php
session_start();
error_reporting(0);
include('includes/config.php');



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Blood Bank System</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/modern-business.css" rel="stylesheet">
    <style>
    .navbar-toggler {
        z-index: 1;
    }
    
    @media (max-width: 576px) {
        nav > .container {
            width: 100%;
        }
    }
    .carousel-item.active,
    .carousel-item-next,
    .carousel-item-prev {
        display: block;
    }
    </style>

</head>

<body>

    <!-- Navigation -->
<?php include('includes/header.php');?>
<?php include('includes/slider.php');?>





 <?php 
if(isset($_POST['submit']))
{   

    $h_id=$_POST['h_id'];
    $u_id=$_SESSION['uid'];
    $sql="INSERT INTO  tblcontactusquery (UserID,HID ) VALUES(:uid,:hid)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':uid',$u_id,PDO::PARAM_STR);
    $query->bindParam(':hid',$h_id,PDO::PARAM_STR); 
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId)
    {
    $msg="Blood Group Created successfully";
    }
    else 
    {
    $error="Something went wrong. Please try again";
    }
}
?>

    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
        .succWrap{
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
    </style>
   
    <!-- Page Content -->
    <div class="container">

           <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?> 

        <!-- Portfolio Section -->
        <h2>Available blood samples</h2>

        <div class="row">
        <?php 
        $status=1;
        $sql = "SELECT * from tblbloodgroup";
        $query = $dbh -> prepare($sql);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0)
        {
        foreach($results as $result)
        { ?>

            <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <a href="#"><img class="card-img-top img-fluid" src="images/blooddonor.jpg" alt="" ></a>
                    <div class="card-block">
                        <h4 class="card-title"><b> Hospital Name:</b><?php echo htmlentities($result->HospitalName  );?></h4>
                            <p class="card-text"><b>Blood Group :</b> <?php echo htmlentities($result->BloodGroup);?></p>
                            <?php if($_SESSION['ulogin'] != ""){?>
                            
                              <form name="donar" method="post">
                                  <input type="hidden" name="h_id" value="<?php echo $result->HospitalD;?>" />
                                 <input type="submit" name="submit" class="btn btn-primary" value="submit" style="cursor:pointer">
                            </form>
                            <?php }elseif($_SESSION['hlogin'] =="" && $_SESSION['ulogin']==""){?>
                                 <a class="nav-link" href="receiver/index.php">Login to request a sample</a>
                            <?php }?>
                    </div>
                </div>
            </div>

        <?php }} ?>     

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->

    <!-- Footer -->
  <?php include('includes/footer.php');?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
