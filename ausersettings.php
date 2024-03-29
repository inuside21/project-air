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

    // Fetch
    // =============================
    {
        
    }
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

                    <br><br>

                    <div class=content-header>
                        <div class=header-icon>
                            <i class=pe-7s-user></i>
                        </div>
                        <div class=header-title>
                            <h1>Update: <b><span id="dName"></span></b></h1>
                            <small>Navigate left menu to view or modify app content</small>
                            <ol class=breadcrumb>
                                <li class=active><a href=dashboard.php><i class=pe-7s-home></i> Home</a></li>
                            </ol>
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
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class=row>
                                    <div class="panel panel-danger">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="form-group row" style="display: none;">
                                                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text" id="rId" name="rId" value="" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-2 col-form-label">Username</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text" id="rUname" name="rUname" autocorrect="off" autocapitalize="none" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-2 col-form-label">Password</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text" id="rPword" name="rPword" autocorrect="off" autocapitalize="none">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row"></div>

                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-2 col-form-label">Full Name</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text" id="rFname" name="rFname">
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
            });


            // Variables
            // ===========================
            const params = new URLSearchParams(window.location.search);
            var getId = "";
            
            var getReqDataUser;


            // Start
            // ===========================
            LoadUser();
            

            // Loop
            // ===========================
            setInterval(function() {
                
            }, 1000);


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
                            url: "server/api.php?mode=guseredit2",
                            data: JSON.stringify(formData),
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


            // Function
            // ===========================
            // Load User
            function LoadUser() {
                $.ajax({
                    type: "POST",
                    url: "server/api.php?mode=userverifytoken",
                    data: JSON.stringify({ "utoken": localStorage.getItem("tokenId") }),
                    success: function(data) {
                        // result
                        const result = JSON.parse(data);

                        // check
                        if (result.status == "ok")
                        {
                            // set
                            getId = result.data.id;

                            // display
                            $('#userFname').text(result.data.user_fname.toUpperCase());

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

                            LoadDataUser();
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

            function LoadDataUser()
            {
                $.ajax({
                    type: "POST",
                    url: "server/api.php?mode=guserview",
                    data: JSON.stringify({
                        "reqid": getId,
                    }),
                    success: function(data) {
                        // result
                        const result = JSON.parse(data);
                        console.log(result)

                        // check
                        if (result.status == "ok")
                        {
                            getReqDataUser = result.data;
                            
                            // detail
                            $('#dName').text(getReqDataUser.user_fname);

                            // form
                            $('#rId').val(getReqDataUser.id);
                            $('#rUname').val(getReqDataUser.user_uname);
                            $('#rPword').val(getReqDataUser.user_pword);
                            $('#rFname').val(getReqDataUser.user_fname);
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
        </script>
    </body>
</html>
