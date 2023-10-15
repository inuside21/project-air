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
                <div class=navbar-header>
                    <button type=button class=navbar-toggle data-toggle=collapse data-target=.navbar-collapse>
                        <span class=sr-only>Toggle navigation</span>
                        <i class=material-icons>apps</i>
                    </button>
                    <a class=navbar-brand href="#">
                        <img class="main-logo hidden-xs" src="<?php echo $contentPageLogoSmall; ?>" width="150" height="50" alt="">
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

                    <br>

                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <a>
                                <div class="statistic-box statistic-filled-3">
                                    <h2><span class="count-number1" id="count-numberAir">---</span><span class="slight"></span></h2>
                                    <div class="small">Air Quality</div>
                                    <i class="ti-check-box statistic_icon"></i>
                                </div>
                            </a>
                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <a>
                                <div class="statistic-box statistic-filled-3">
                                    <h2><span class="count-number1" id="count-numberConnection">---</span><span class="slight"></span></h2>
                                    <div class="small">Connection</div>
                                    <i class="ti-check-box statistic_icon"></i>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" id="cMenuFanBtn">
                            <a>
                                <div class="statistic-box statistic-filled-3">
                                    <h2><span class="count-number1" id="count-numberFan">---</span><span class="slight"></span></h2>
                                    <div class="small">Fan Level</div>
                                    <i class="ti-check-box statistic_icon"></i>
                                </div>
                            </a>
                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" id="cMenuSprayBtn">
                            <a>
                                <div class="statistic-box statistic-filled-3">
                                    <h2><span class="count-number1" id="count-numberSpray">---</span><span class="slight"></span></h2>
                                    <div class="small">Spray Interval</div>
                                    <i class="ti-check-box statistic_icon"></i>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="row text-right">
                        <a id="fSubmit">
                            <button type="button" class="btn btn-labeled btn-danger m-b-5">
                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>Save
                            </button>
                        </a>
                    </div>

                    <form id="fInfo" enctype="multipart/form-data">
                        <div class=row>
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

                    <div class=row>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class=row>
                                <div class="panel panel-danger">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <h4>Logs</h4> <br>
                                            <h5>Logging of this Air Purifier</h5>
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

                    <div class="modal fade modal-danger in" id="modal-fan" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h1 class="modal-title"><b style="font-size:60px;">Fan Level: <br><span id="tFanText">---</span></b></h1>
                                </div>
                                <div class="modal-body">
                                    <p>
                                    <form id="fInfoTimer" enctype="multipart/form-data">
                                        <div class="text-center">
                                            <button type="button" class="btn btn-success" id="tFanOffBtn">OFF</button> 
                                            <button type="button" class="btn btn-success" id="tFanLowBtn">LOW</button> 
                                            <button type="button" class="btn btn-success" id="tFanMedBtn">MEDIUM</button> 
                                            <button type="button" class="btn btn-success" id="tFanHighBtn">HIGH</button> 
                                        </div>
                                    </form>

                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>

                    <div class="modal fade modal-danger in" id="modal-spray" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h1 class="modal-title"><b style="font-size:60px;">Spray Interval: <br><span id="tSprayText">---</span></b></h1>
                                </div>
                                <div class="modal-body">
                                    <p>
                                    <form id="fInfoTimer" enctype="multipart/form-data">
                                        <div class="text-center">
                                            <button type="button" class="btn btn-success" id="tSpray0">OFF</button> 
                                            <button type="button" class="btn btn-success" id="tSpray1">1 Minute</button> 
                                            <button type="button" class="btn btn-success" id="tSpray2">3 Minutes</button> <br><br>
                                            <button type="button" class="btn btn-success" id="tSpray3">5 Minutes</button> 
                                            <button type="button" class="btn btn-success" id="tSpray4">10 Minutes</button>
                                            <button type="button" class="btn btn-success" id="tSpray5">15 Minutes</button> 
                                        </div>
                                    </form>

                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
                        confirmButtonColor: "#E5343D",
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
                        confirmButtonColor: "#E5343D",
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
                $('#modal-fan').modal('show');
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
                $('#modal-spray').modal('show');
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

                            $('#tFanText').text(getReqDataAir.air_fantext);
                            $('#tSprayText').text(getReqDataAir.air_spraytext);

                            /*
                            $('#pDept').trigger('change');
                            $('#pStatus').trigger('change');
                            $('#pPhase').trigger('change');
                            $('#pCustomer').trigger('change');
                            */
                        }
                        else
                        {
                            window.location.href = "ovenlist.php";
                        }
                    },
                    error: function(data) {
                        window.location.href = "ovenlist.php";
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
