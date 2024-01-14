<?php

    // Database
    include("config/config.php");

    /*
    // Check
    // =============================
    {
        // ID
        // --------------------------
        if (!isset($_GET['id']))
        {
            // redirect
            //header("Location: areaadd.php?info");
            //exit();
        }
    }
    */

    /*
    // Fetch
    // =============================
    {
        // Custom
        // --------------------------
        {
            $rowCustom = array();
            $sql = "select * from item_custom_tbl order by custom_pos asc";
            $rsCustom = mysqli_query($connection, $sql);
            $rsCustomCount = mysqli_num_rows($rsCustom);
            if ($rsCustomCount > 0)
            {
                while ($rowsCustom = mysqli_fetch_object($rsCustom))
                {
                    $rowCustom[] = $rowsCustom;
                }
            }
            else
            {
                // redirect
                //header("Location: aareaadd.php");
                //exit();
            }
        }

        // Area
        // --------------------------
        {
            $rowArea = array();
            $sql = "select * from item_warehouse_tbl";
            $rsArea = mysqli_query($connection, $sql);
            $rsAreaCount = mysqli_num_rows($rsArea);
            if ($rsAreaCount > 0)
            {
                while ($rowsArea = mysqli_fetch_object($rsArea))
                {
                    $rowArea[] = $rowsArea;
                }
            }
            else
            {
                // redirect
                //header("Location: aareaadd.php");
                //exit();
            }
        }

        // Supplier
        // --------------------------
        {
            $rowSupplier = array();
            $sql = "select * from item_supplier_tbl";
            $rsSupplier = mysqli_query($connection, $sql);
            $rsSupplierCount = mysqli_num_rows($rsSupplier);
            if ($rsSupplierCount > 0)
            {
                while ($rowsSupplier = mysqli_fetch_object($rsSupplier))
                {
                    $rowSupplier[] = $rowsSupplier;
                }
            }
            else
            {
                // redirect
                //header("Location: asupadd.php");
                //exit();
            }
        }

        // UOM
        // --------------------------
        {
            $rowUOM = array();
            $sql = "select * from item_uom_tbl";
            $rsUOM = mysqli_query($connection, $sql);
            $rsUOMCount = mysqli_num_rows($rsUOM);
            if ($rsUOMCount > 0)
            {
                while ($rowsUOM = mysqli_fetch_object($rsUOM))
                {
                    $rowUOM[] = $rowsUOM;
                }
            }
            else
            {
                // redirect
                //header("Location: aitemuomadd.php");
                //exit();
            }
        }

        // Category
        // --------------------------
        {
            $rowCat = array();
            $sql = "select * from item_cat_tbl";
            $rsCat = mysqli_query($connection, $sql);
            $rsCatCount = mysqli_num_rows($rsCat);
            if ($rsCatCount > 0)
            {
                while ($rowsCat = mysqli_fetch_object($rsCat))
                {
                    $rowCat[] = $rowsCat;
                }
            }
            else
            {
                // redirect
                //header("Location: aitemcatadd.php");
                //exit();
            }
        }
    }
    */
?>

<!DOCTYPE html>
<html lang=en>
    <head>
        <meta charset=utf-8>
        <meta http-equiv=X-UA-Compatible content="IE=edge">
        <meta name=viewport content="width=device-width, initial-scale=1">
        <meta name=description content="">
        <meta name=author content="">
        <title><?php echo $contentPageTitle; ?></title>
        <?php
            // ================
            // CSS
            // ================ 
            echo $contentPageCSS; 
        ?>
    </head> 
    <body>
        <div id=wrapper class="wrapper animsition">

            <!-- Menu Header -->
            <nav class="navbar navbar-fixed-top" role=navigation>
                <div class=navbar-header style="background-color: white;">
                    <button type=button class=navbar-toggle data-toggle=collapse data-target=.navbar-collapse style="float: left; color: black;">
                        <span class=sr-only>Toggle navigation</span>
                        <i class=material-icons>menu</i>
                    </button>

                    <button type=button class=navbar-toggle data-toggle=collapse data-target=.navbar-collapse style="float: right; color: black;">
                        <span class=sr-only>Toggle navigation</span>
                        <i class=material-icons>help</i>
                    </button>

                    <a class=navbar-brand href="#">
                        <img class="main-logo" src="<?php echo $contentPageLogoSmall; ?>" width="100" height="100" alt="">
                    </a>
                </div>
                <div class=nav-container>

                    <!-- Menu Header [Left] -->
                    <ul class="nav navbar-nav hidden-xs">
                        <li><a id=fullscreen href="#"><i class=material-icons>fullscreen</i> </a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle material-ripple" data-toggle=dropdown>Welcome Back! <span id="userFname"></span></a>
                        </li>
                    </ul>

                    <!-- Menu Header [Right] -->
                    <ul class="nav navbar-top-links navbar-right">
                        
                    </ul>
                </div>
            </nav>

            <!-- Menu Side -->
            <?php echo $configMenu; ?>
            <?php echo $configMenu2; ?>

            <!-- Main Content -->
            <div id=page-wrapper>
                <div class=content>

                    <br><br><br>

                    <div class="row d-none">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <a>
                                <div class="statistic-box statistic-filled-3">
                                    <h2><span class="count-number1" id="count-numberAir">---</span><span class="slight"></span></h2>
                                    <div class="small">Air Quality</div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <a>
                                <div class="statistic-box statistic-filled-3">
                                    <h2><span class="count-number1" id="count-numberConnection">---</span><span class="slight"></span></h2>
                                    <div class="small">Connection</div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="row d-none">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="cMenuFanBtnOld">
                            <a>
                                <div class="statistic-box statistic-filled-3">
                                    <h2><span class="count-number1" id="count-numberFan">---</span><span class="slight"></span></h2>
                                    <div class="small">Fan Level</div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="cMenuSprayBtnOld">
                            <a>
                                <div class="statistic-box statistic-filled-3">
                                    <h2><span class="count-number1" id="count-numberSpray">---</span><span class="slight"></span></h2>
                                    <div class="small">Spray Interval</div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="row text-right d-none">
                        <a id="fSubmit">
                            <button type="button" class="btn btn-labeled btn-danger m-b-5">
                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>Save
                            </button>
                        </a>
                    </div>

                    <form id="fInfo" enctype="multipart/form-data">
                        <div class="row d-none">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 p-t-30 p-b-30 d-none">
                                <div class="text-center">
                                    <label for="image-upload">
                                    <image id="preview-image" src="files/images/none.png" width="400px" height="400px">
                                    </label>
                                    <br>
                                    Tap to upload image (400x400)
                                    <br>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class=row>
                                    <div class="panel panel-danger">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <h4>Air Purifier Information</h4> <br>
                                                <h5>General information of the Air Purifier</h5>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="form-group row" style="display: none;">
                                                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text" id="rId" name="rId" value="" readonly>
                                                            <input class="form-control" type="text" id="rUid" name="rUid" value="" readonly>
                                                            <input class="form-control" type="text" id="rImageOrig" name="rImageOrig" value="" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row" style="display: none;">
                                                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text" id="rImage" name="rImage">
                                                            <input type="file" id="image-upload" name="image-upload" accept="image/*">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text" id="oName" name="oName">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>


                    <!-- Title -->
                    <div class="row" id="dev-titlediv">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class=row>
                                <div class="text-center">
                                    <h1><b><span id="dev-title"></span></b></h1>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Dashboard / L = 1 -->
                    <div class="row" id="dev-statusdiv">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class=row>
                                <div class="text-center">
                                    <img src="assets/images/purifier.png" height="256" width="256">
                                    <br><br>
                                    <h1><b><span id="dev-name"></span></b></h1>
                                    <h3 style="margin-top: -5px;"><span id="dev-connection" style="color: green"></span></h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="cMenuFanBtn">
                            <a>
                                <div style="margin-left: 20px; margin-right: 20px; margin-bottom: 20px; border: 3px; border-color: white; border-radius: 20px; background-color: white; padding: 20px; height: 80px;">
                                    <div style="float: left; font-size: 30px;">
                                        <i class=material-icons style="vertical-align: middle;">power_settings_new</i>
                                        <span style="margin-left: 10px;">Power</span>
                                    </div>
                                    <div style="float: right; font-size: 25px;">
                                        <span id="dev-fanstatus" style="color: blue">OFF</span>
                                    </div>
                                </div>
                                
                            </a>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="cMenuFanBtn2">
                            <a>
                                <div style="margin-left: 20px; margin-right: 20px; margin-bottom: 20px; border: 3px; border-color: white; border-radius: 20px; background-color: white; padding: 20px; height: 80px;">
                                    <div style="float: left; font-size: 30px;">
                                        <i class=material-icons style="vertical-align: middle;">dvr</i>
                                        <span style="margin-left: 10px;">Level</span>
                                    </div>
                                    <div style="float: right; font-size: 25px;">
                                        <span id="dev-fanlevel" style="color: blue">OFF</span>
                                    </div>
                                </div>
                                
                            </a>
                        </div>
                    </div>

                    <!-- Air Status / L = 2 -->
                    <div class="row d-none" id="dev-qualitydiv">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class=row>
                                <div class="text-center">
                                    <img src="assets/images/" id="dev-qualityimg" height="310" width="256">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Spray / L = 4 -->
                    <div class="row" id="dev-spraydiv" style="margin-top: 60px;">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="cMenuSprayBtn2">
                            <a>
                                <div style="margin-left: 20px; margin-right: 20px; margin-bottom: 20px; border: 3px; border-color: white; border-radius: 20px; background-color: white; padding: 20px; height: 80px;">
                                    <div style="float: left; font-size: 25px;">
                                        <i class=material-icons style="vertical-align: middle;">power_settings_new</i>
                                        <span style="margin-left: 10px;">Power</span>
                                    </div>
                                    <div style="float: right; font-size: 25px;">
                                        <span id="dev-spraystatus2" style="color: blue">OFF</span>
                                    </div>
                                </div>
                                
                            </a>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="cMenuSprayBtn3">
                            <a>
                                <div style="margin-left: 20px; margin-right: 20px; margin-bottom: 20px; border: 3px; border-color: white; border-radius: 20px; background-color: white; padding: 20px; height: 80px;">
                                    <div style="float: left; font-size: 25px;">
                                        <i class=material-icons style="vertical-align: middle;">timer</i>
                                        <span style="margin-left: 10px;">Automatic</span>
                                    </div>
                                    <div style="float: right; font-size: 25px;">
                                        <span id="dev-spraystatus3" style="color: blue">OFF</span>
                                    </div>
                                </div>
                                
                            </a>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="tSprayOnce">
                            <a>
                                <div style="margin-left: 20px; margin-right: 20px; margin-bottom: 20px; border: 3px; border-color: white; border-radius: 20px; background-color: white; padding: 20px; height: 80px;">
                                    <div style="float: left; font-size: 25px;">
                                        <i class=material-icons style="vertical-align: middle;">blur_on</i>
                                        <span style="margin-left: 10px;">Spray</span>
                                    </div>
                                    <div style="float: right; font-size: 25px;">
                                        <span id="dev-spraystatus3" style="color: blue">Press</span>
                                    </div>
                                </div>
                                
                            </a>
                        </div>
                    </div>

                    <!-- Logs -->
                    <div class="row" id="dev-logs" style="margin-top: 60px;">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class=row>
                                <div class="panel panel-danger">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <h4>Logs</h4> <br>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Air Quality %</th>
                                                    <th>Air Quality</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Modals -->
                    <div class="modal fade modal-danger in" id="modal-fan" tabindex="-1" role="dialog" style="top: auto;">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" style="height: 350px;">
                                <div class="modal-body">
                                
                                    <h2 style="margin-left: 20px;"><b>Are you sure?</b></h2>
                                    
                                    <br>

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="tFanOffBtn" data-dismiss="modal">
                                        <a>
                                            <div style="margin-left: 20px; margin-right: 20px; margin-bottom: 20px; border: 3px; border-color: #f6f7fb; border-radius: 20px; background-color: #f6f7fb; padding: 20px; height: 80px;">
                                                <div class="text-center" style="font-size: 30px;">
                                                    <span style="margin-left: 10px;"><b>Yes</b></span>
                                                </div>
                                            </div>
                                            
                                        </a>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" data-dismiss="modal">
                                        <a>
                                            <div style="margin-left: 20px; margin-right: 20px; margin-bottom: 20px; border: 3px; border-color: #f6f7fb; border-radius: 20px; background-color: #f6f7fb; padding: 20px; height: 80px;">
                                                <div class="text-center" style="font-size: 30px;">
                                                    <span style="margin-left: 10px;"><b>No</b></span>
                                                </div>
                                            </div>
                                            
                                        </a>
                                    </div>

                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>

                    <div class="modal fade modal-danger in" id="modal-fan2" tabindex="-1" role="dialog" style="top: auto;">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" style="height: 450px;">
                                <div class="modal-body">

                                    <h2 style="margin-left: 20px;"><b>Adjust Level</b></h2>
                                    
                                    <br>

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="tFanLowBtn" data-dismiss="modal">
                                        <a>
                                            <div style="margin-left: 20px; margin-right: 20px; margin-bottom: 20px; border: 3px; border-color: #f6f7fb; border-radius: 20px; background-color: #f6f7fb; padding: 20px; height: 80px;">
                                                <div class="text-center" style="font-size: 30px;">
                                                    <span style="margin-left: 10px;"><b>Low</b></span>
                                                </div>
                                            </div>
                                            
                                        </a>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="tFanMedBtn" data-dismiss="modal">
                                        <a>
                                            <div style="margin-left: 20px; margin-right: 20px; margin-bottom: 20px; border: 3px; border-color: #f6f7fb; border-radius: 20px; background-color: #f6f7fb; padding: 20px; height: 80px;">
                                                <div class="text-center" style="font-size: 30px;">
                                                    <span style="margin-left: 10px;"><b>Medium</b></span>
                                                </div>
                                            </div>
                                            
                                        </a>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="tFanHighBtn" data-dismiss="modal">
                                        <a>
                                            <div style="margin-left: 20px; margin-right: 20px; margin-bottom: 20px; border: 3px; border-color: #f6f7fb; border-radius: 20px; background-color: #f6f7fb; padding: 20px; height: 80px;">
                                                <div class="text-center" style="font-size: 30px;">
                                                    <span style="margin-left: 10px;"><b>High</b></span>
                                                </div>
                                            </div>
                                            
                                        </a>
                                    </div>

                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>

                    <div class="modal fade modal-danger in" id="modal-spray" tabindex="-1" role="dialog" style="top: auto;">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" style="height: 350px;">
                                <div class="modal-body">
                                
                                    <h2 style="margin-left: 20px;"><b>Are you sure?</b></h2>
                                    
                                    <br>

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="tSpray0" data-dismiss="modal">
                                        <a>
                                            <div style="margin-left: 20px; margin-right: 20px; margin-bottom: 20px; border: 3px; border-color: #f6f7fb; border-radius: 20px; background-color: #f6f7fb; padding: 20px; height: 80px;">
                                                <div class="text-center" style="font-size: 30px;">
                                                    <span style="margin-left: 10px;"><b>Yes</b></span>
                                                </div>
                                            </div>
                                            
                                        </a>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" data-dismiss="modal">
                                        <a>
                                            <div style="margin-left: 20px; margin-right: 20px; margin-bottom: 20px; border: 3px; border-color: #f6f7fb; border-radius: 20px; background-color: #f6f7fb; padding: 20px; height: 80px;">
                                                <div class="text-center" style="font-size: 30px;">
                                                    <span style="margin-left: 10px;"><b>No</b></span>
                                                </div>
                                            </div>
                                            
                                        </a>
                                    </div>

                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>

                    <div class="modal fade modal-danger in" id="modal-spray2" tabindex="-1" role="dialog" style="top: auto;">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" style="height: 650px;">
                                <div class="modal-body text-center">
                                
                                    <h2 style="margin-left: 20px;"><b><span style="font-size: 80px;" id="modal2-spraymain">20</span></b></h2>
                                    
                                    <br>

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="tSpray1" data-dismiss="modal">
                                        <a>
                                            <div style="margin-left: 20px; margin-right: 20px; margin-bottom: 20px; border: 3px; border-color: #f6f7fb; border-radius: 20px; background-color: #f6f7fb; padding: 20px; height: 80px;">
                                                <div class="text-center" style="font-size: 30px;">
                                                    <span style="margin-left: 10px;"><b>1 Minute</b></span>
                                                </div>
                                            </div>
                                            
                                        </a>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="tSpray2" data-dismiss="modal">
                                        <a>
                                            <div style="margin-left: 20px; margin-right: 20px; margin-bottom: 20px; border: 3px; border-color: #f6f7fb; border-radius: 20px; background-color: #f6f7fb; padding: 20px; height: 80px;">
                                                <div class="text-center" style="font-size: 30px;">
                                                    <span style="margin-left: 10px;"><b>3 Minutes</b></span>
                                                </div>
                                            </div>
                                            
                                        </a>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="tSpray3" data-dismiss="modal">
                                        <a>
                                            <div style="margin-left: 20px; margin-right: 20px; margin-bottom: 20px; border: 3px; border-color: #f6f7fb; border-radius: 20px; background-color: #f6f7fb; padding: 20px; height: 80px;">
                                                <div class="text-center" style="font-size: 30px;">
                                                    <span style="margin-left: 10px;"><b>5 Minutes</b></span>
                                                </div>
                                            </div>
                                            
                                        </a>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="tSpray4" data-dismiss="modal">
                                        <a>
                                            <div style="margin-left: 20px; margin-right: 20px; margin-bottom: 20px; border: 3px; border-color: #f6f7fb; border-radius: 20px; background-color: #f6f7fb; padding: 20px; height: 80px;">
                                                <div class="text-center" style="font-size: 30px;">
                                                    <span style="margin-left: 10px;"><b>10 Minutes</b></span>
                                                </div>
                                            </div>
                                            
                                        </a>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="tSpray5" data-dismiss="modal">
                                        <a>
                                            <div style="margin-left: 20px; margin-right: 20px; margin-bottom: 20px; border: 3px; border-color: #f6f7fb; border-radius: 20px; background-color: #f6f7fb; padding: 20px; height: 80px;">
                                                <div class="text-center" style="font-size: 30px;">
                                                    <span style="margin-left: 10px;"><b>15 Minutes</b></span>
                                                </div>
                                            </div>
                                            
                                        </a>
                                    </div>

                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>

                </div>
            </div>
        </div>
        <?php
            // ================
            // JS
            // ================
            echo $contentPageJS; 
        ?>


        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip({trigger: 'manual'}).tooltip('show');
                $(".progress-animated").each(function () {
                    each_bar_width = $(this).attr('aria-valuenow');
                    $(this).width(each_bar_width + '%');
                });     

                /*
                $('#pDept').select2();
                $('#pStatus').select2();
                $('#pPhase').select2();
                $('#pCustomer').select2();
                */
            });


            // Variables
            // ===========================
            const params = new URLSearchParams(window.location.search);
            const getId = params.get('id');
            const devViewId = params.get('l');  // 1 - dashboard
                                                // 2 - air status
                                                // 3 - air cleaner
                                                // 4 - spray
            
            var getReqDataAir;
            var table1;


            // Start
            // ===========================
            LoadUser();
            LoadTable();
            

            // Loop
            // ===========================
            setInterval(function() {
                LoadDataAir();
                table1.ajax.reload();
            }, 200);


            // Interaction
            // ==========================
            // Press - Submit
            $('#fSubmit').click(function(e) {
                // check
                swal(
                    {
                        title: "Are you sure?",
                        text: "Pressing the Proceed button will save the data.",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#333333",
                        confirmButtonText: "Proceed",
                        closeOnConfirm: false
                    },
                    function() {
                        /*
                        // image
                        var file = $('#rImage')[0].files[0];
                        var reader = new FileReader();
                        reader.onload = function() {
                            var base64 = reader.result.replace(/^data:image\/(png|jpeg|jpg);base64,/, '');
                            $('#rWe').val(base64);
                        };
                        reader.readAsDataURL(file);
                        */

                        // form
                        var formData = {};
                        $.each($('#fInfo').serializeArray(), function() {
                            var key = this.name;
                            var value = this.value;
                            if (formData[key] !== undefined) {
                                if (!Array.isArray(formData[key])) {
                                    formData[key] = [formData[key]];
                                }
                                formData[key].push(value);
                            } else {
                                formData[key] = value;
                            }
                        });

                        // request
                        $.ajax({
                            type: "POST",
                            contentType: false,
                            processData: false,
                            url: "server/api.php?mode=airedit",
                            data: JSON.stringify(formData),
                            beforeSend: function() {
                                // button
                                $('#fButton').toggle();
                            },
                            success: function(data) {
                                // button
                                $('#fButton').toggle();

                                console.log(data)
                                
                                // result
                                const result = JSON.parse(data);
                               
                                // check
                                if (result.status == "ok")
                                {
                                    //message
                                    swal(result.title, result.message, "success");
                                    setTimeout(() => {
                                        location.reload(true);
                                    }, 1000);
                                }
                                else
                                {
                                    // message
                                    swal(result.title, result.message, "error");
                                }
                            },
                            error: function(data) {
                                // button
                                $('#fButton').toggle();

                                // message
                                swal("Error!", "Something went wrong. Please try again.", "error");
                            }
                        });
                    }
                );
            });

            // Press - Delete
            $('#fDelete').click(function(e) {
                // check
                swal(
                    {
                        title: "Are you sure?",
                        text: "Pressing the Proceed button will REMOVE the data.",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#333333",
                        confirmButtonText: "Proceed",
                        closeOnConfirm: false
                    },
                    function() {
                        // request
                        $.ajax({
                            type: "POST",
                            contentType: false,
                            processData: false,
                            url: "server/api.php?mode=airdelete",
                            data: JSON.stringify({
                                dAir: getReqDataAir,
                            }),
                            beforeSend: function() {
                                // button
                                $('#fButton').toggle();
                            },
                            success: function(data) {
                                // button
                                $('#fButton').toggle();
                                
                                // result
                                const result = JSON.parse(data);
                               
                                // check
                                if (result.status == "ok")
                                {
                                    //message
                                    swal(result.title, result.message, "success");
                                    setTimeout(() => {
                                        location.reload(true);
                                    }, 1000);
                                }
                                else
                                {
                                    // message
                                    swal(result.title, result.message, "error");
                                }
                            },
                            error: function(data) {
                                // button
                                $('#fButton').toggle();

                                // message
                                swal("Error!", "Something went wrong. Please try again.", "error");
                            }
                        });
                    }
                );
            });

            // Fan
            $('#cMenuFanBtn').click(function(e) {
                if (getReqDataAir.air_fan == "0")
                {
                    $('#modal-fan2').modal('show');
                }
                else
                {
                    $('#modal-fan').modal('show');
                }
               
            });

            $('#cMenuFanBtn2').click(function(e) {
                $('#modal-fan2').modal('show');
            });

            $('#tFanOffBtn').click(function(e) {
                $.ajax({
                    cache: false,
                    type: "POST",
                    url: "server/api.php?mode=airfanedit",
                    data: JSON.stringify({
                        airid: getReqDataAir.id,
                        airfanlvl: "0",
                    }),
                    beforeSend: function() {
                    },
                    success: function(data) {
                    },
                    error: function(data) {
                    }
                });
            });

            $('#tFanLowBtn').click(function(e) {
                $.ajax({
                    cache: false,
                    type: "POST",
                    url: "server/api.php?mode=airfanedit",
                    data: JSON.stringify({
                        airid: getReqDataAir.id,
                        airfanlvl: "1",
                    }),
                    beforeSend: function() {
                    },
                    success: function(data) {
                    },
                    error: function(data) {
                    }
                });
            });

            $('#tFanMedBtn').click(function(e) {
                $.ajax({
                    cache: false,
                    type: "POST",
                    url: "server/api.php?mode=airfanedit",
                    data: JSON.stringify({
                        airid: getReqDataAir.id,
                        airfanlvl: "2",
                    }),
                    beforeSend: function() {
                    },
                    success: function(data) {
                    },
                    error: function(data) {
                    }
                });
            });

            $('#tFanHighBtn').click(function(e) {
                $.ajax({
                    cache: false,
                    type: "POST",
                    url: "server/api.php?mode=airfanedit",
                    data: JSON.stringify({
                        airid: getReqDataAir.id,
                        airfanlvl: "3",
                    }),
                    beforeSend: function() {
                    },
                    success: function(data) {
                    },
                    error: function(data) {
                    }
                });
            });

            // Spray
            $('#cMenuSprayBtn').click(function(e) {
                if (getReqDataAir.air_spray == "0")
                {
                    $('#modal-spray2').modal('show');
                }
                else
                {
                    $('#modal-spray').modal('show');
                }
            });

            $('#cMenuSprayBtn2').click(function(e) {
                if (getReqDataAir.air_spray == "0")
                {
                    $('#modal-spray2').modal('show');
                }
                else
                {
                    $('#modal-spray').modal('show');
                }
            });

            $('#cMenuSprayBtn3').click(function(e) {
                $('#modal-spray2').modal('show');
            });

            $('#tSprayOnce').click(function(e) {
                $.ajax({
                    cache: false,
                    type: "POST",
                    url: "server/api.php?mode=airspray2edit",
                    data: JSON.stringify({
                        airid: getReqDataAir.id,
                    }),
                    beforeSend: function() {
                    },
                    success: function(data) {
                    },
                    error: function(data) {
                    }
                });
            });

            $('#tSpray0').click(function(e) {
                $.ajax({
                    cache: false,
                    type: "POST",
                    url: "server/api.php?mode=airsprayedit",
                    data: JSON.stringify({
                        airid: getReqDataAir.id,
                        airsprayint: "0",
                    }),
                    beforeSend: function() {
                    },
                    success: function(data) {
                    },
                    error: function(data) {
                    }
                });
            });

            $('#tSpray1').click(function(e) {
                $.ajax({
                    cache: false,
                    type: "POST",
                    url: "server/api.php?mode=airsprayedit",
                    data: JSON.stringify({
                        airid: getReqDataAir.id,
                        airsprayint: "1",
                    }),
                    beforeSend: function() {
                    },
                    success: function(data) {
                    },
                    error: function(data) {
                    }
                });
            });

            $('#tSpray2').click(function(e) {
                $.ajax({
                    cache: false,
                    type: "POST",
                    url: "server/api.php?mode=airsprayedit",
                    data: JSON.stringify({
                        airid: getReqDataAir.id,
                        airsprayint: "2",
                    }),
                    beforeSend: function() {
                    },
                    success: function(data) {
                    },
                    error: function(data) {
                    }
                });
            });

            $('#tSpray3').click(function(e) {
                $.ajax({
                    cache: false,
                    type: "POST",
                    url: "server/api.php?mode=airsprayedit",
                    data: JSON.stringify({
                        airid: getReqDataAir.id,
                        airsprayint: "3",
                    }),
                    beforeSend: function() {
                    },
                    success: function(data) {
                    },
                    error: function(data) {
                    }
                });
            });

            $('#tSpray4').click(function(e) {
                $.ajax({
                    cache: false,
                    type: "POST",
                    url: "server/api.php?mode=airsprayedit",
                    data: JSON.stringify({
                        airid: getReqDataAir.id,
                        airsprayint: "4",
                    }),
                    beforeSend: function() {
                    },
                    success: function(data) {
                    },
                    error: function(data) {
                    }
                });
            });

            $('#tSpray5').click(function(e) {
                $.ajax({
                    cache: false,
                    type: "POST",
                    url: "server/api.php?mode=airsprayedit",
                    data: JSON.stringify({
                        airid: getReqDataAir.id,
                        airsprayint: "5",
                    }),
                    beforeSend: function() {
                    },
                    success: function(data) {
                    },
                    error: function(data) {
                    }
                });
            });


            // Function
            // ===========================
            // Load User
            function LoadUser() {
                $.ajax({
                    cache: false,
                    type: "POST",
                    url: "server/api.php?mode=userverifytoken",
                    data: JSON.stringify({ "utoken": localStorage.getItem("tokenId") }),
                    success: function(data) {
                        // result
                        const result = JSON.parse(data);

                        // check
                        if (result.status == "ok")
                        {
                            // display
                            $('#userFname').text(result.data.user_fname.toUpperCase());
                            $('#rUid').val(result.data.id);

                            // check admin
                            if (result.data.user_pos == "0")
                            {
                                $('[id="admmenu"]').show();
                                $('[id="opmenu"]').hide();
                            }
                            else
                            {
                                $('[id="admmenu"]').hide();
                                $('[id="opmenu"]').show();
                            }
                        }
                        else
                        {
                            window.location.href = "login.php";
                        }
                    },
                    error: function(data) {
                        window.location.href = "login.php";
                    }
                });
            }

            // Logout User
            $('[id="uLogout"]').click(function(e) {
                localStorage.setItem("tokenId", "");
                window.location.href = "login.php";
            });

            function LoadDataAir()
            {
                $.ajax({
                    cache: false,
                    type: "POST",
                    url: "server/api.php?mode=airview",
                    data: JSON.stringify({
                        "reqid": getId,
                    }),
                    success: function(data) {
                        // result
                        const result = JSON.parse(data);

                        // check
                        if (result.status == "ok")
                        {
                            getReqDataAir = result.data;
                            
                            // detail
                            $('#dName').text(getReqDataAir.air_name);
                            //$('#preview-image').attr('src', 'files/images/' + getReqDataProject.proj_img);

                            // form
                            $('#rId').val(getReqDataAir.id);
                            //$('#rImageOrig').val(getReqDataOven.proj_img);
                            $('#oName').val(getReqDataAir.air_name);

                            //
                            $('#count-numberAir').text(getReqDataAir.air_airvaltext);
                            $('#count-numberConnection').text(getReqDataAir.air_connected);
                            $('#count-numberFan').text(getReqDataAir.air_fantext);
                            $('#count-numberSpray').text(getReqDataAir.air_spraytext);

                            //
                            {
                                if (getReqDataAir.air_connected == "Connected")
                                {
                                    $('#dev-connection').text(getReqDataAir.air_connected);
                                    $('#dev-connection').css('color', 'green');
                                }

                                if (getReqDataAir.air_connected == "Disconnected")
                                {
                                    $('#dev-connection').text(getReqDataAir.air_connected);
                                    $('#dev-connection').css('color', 'red');
                                }

                                $('#dev-name').text(getReqDataAir.air_name);
                            }

                            $('#tFanText').text(getReqDataAir.air_fantext);
                            $('#tSprayText').text(getReqDataAir.air_spraytext);

                            $('#modal2-spraymain').text(getReqDataAir.air_spraytext);

                            /*
                            $('#pDept').trigger('change');
                            $('#pStatus').trigger('change');
                            $('#pPhase').trigger('change');
                            $('#pCustomer').trigger('change');
                            */

                            // L = 1?
                            {
                                LoadDisplay();

                                if (devViewId == "1")
                                {
                                    $('#dev-statusdiv').show();

                                    // SPRAY OFF
                                    if (getReqDataAir.air_fan == "0")
                                    {
                                        $('#dev-fanstatus').text("OFF");
                                    }
                                    else
                                    {
                                        $('#dev-fanstatus').text("ON");
                                    }
                                    
                                    $('#dev-fanlevel').text(getReqDataAir.air_fantext);
                                }

                                if (devViewId == "2")
                                {
                                    $('#dev-titlediv').show();
                                    $('#dev-qualitydiv').show();
                                    $('#dev-logs').show();

                                    $('#dev-title').text("Air Status");
                                    $("#dev-qualityimg").attr("src", "assets/images/" + getReqDataAir.air_airvaltext + ".png");
                                }

                                if (devViewId == "4")
                                {
                                    $('#dev-titlediv').show();
                                    $('#dev-spraydiv').show();

                                    $('#dev-title').text("Spray Cleaner");

                                    // SPRAY OFF
                                    if (getReqDataAir.air_spray == "0")
                                    {
                                        $('#dev-spraystatus2').text("OFF");
                                        $('#dev-spraystatus3').text(getReqDataAir.air_spraytext);
                                    }
                                    else
                                    {
                                        $('#dev-spraystatus2').text("ON");
                                        $('#dev-spraystatus3').text(getReqDataAir.air_spraytext);
                                    }
                                }
                            }
                        }
                        else
                        {
                            //window.location.href = "ovenlist.php";
                        }
                    },
                    error: function(data) {
                        //window.location.href = "ovenlist.php";
                    }
                });
            }

            // Load Table
            function LoadTable()
            {
                table1 = $("#dataTableExample1").DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        
                    ],
                    aaSorting: [],
                    ajax: {
                        url: 'server/api.php?mode=airloglist&aid=' + getId,
                        dataSrc: 'data',
                    },
                    columns: [
                        { 
                            data: null, 
                            render: function ( data, type, row, meta ) {
                                return data.air_date;
                            } 
                        },
                        { 
                            data: null, 
                            render: function ( data, type, row, meta ) {
                                return data.air_val + "%";
                            } 
                        },
                        { 
                            data: null, 
                            render: function ( data, type, row, meta ) {
                                return data.air_valtext;
                            } 
                        },
                    ]
                });
            }

            function LoadDisplay()
            {
                $('#dev-titlediv').hide();
                $('#dev-statusdiv').hide();
                $('#dev-qualitydiv').hide();
                $('#dev-spraydiv').hide();
                $('#dev-logs').hide();
            }
        </script>

        <script>
            /* IMAGE SCRIPT */
            const imageUpload = document.getElementById("image-upload");
            const previewImage = document.getElementById("preview-image");

            imageUpload.addEventListener("change", function() {
                const file = this.files[0];
                const reader = new FileReader();
                
                reader.addEventListener("load", function() {
                    // set image
                    previewImage.src = this.result;

                    // set base
                    //var base64 = this.result.replace(/^data:image\/(png|jpeg|jpg);base64,/, '');

                    var base64 = this.result.split(",")[1];
                    $('#rImage').val(base64);
                    console.log(base64);
                });
                
                reader.readAsDataURL(file);
            });
        </script>

        <script>
            // Initialize Dropzone
            Dropzone.autoDiscover = false;
            var myDropzone = new Dropzone("#dzFrom", {
                url: "server/api.php?mode=fileupload2&pid=" + getId,
                maxFilesize: 20, // Maximum file size in MB
                addRemoveLinks: true, // Show remove file links
                dictRemoveFile: "Remove",
                init: function() {
                    this.on("success", function(file, response) {
                        console.log("File uploaded successfully:", response);
                        table1.ajax.reload();
                    });
                    this.on("error", function(file, errorMessage) {
                        console.log("Error uploading file:", errorMessage);
                    });
                }
            });
        </script>

    </body>
</html>
