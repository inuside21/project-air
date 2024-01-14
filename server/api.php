<?php
    ini_set('display_errors', 0);

    // Database
    include("../config/config.php");

    // check
    if (!isset($_GET['mode'])) {
        echo json_encode(array("status" => "error", "message" => "Mode Error"));
        exit();
    }

    /*
        tip:    USE var_dump return in this page, then console.log return in webpage form submit / ajax
                to view structures

        use:    https://vardumpformatter.io/
    /*

    /*
        ======================================
        MODES
        ======================================
    */

    // User Login
    // ----------------------
    if ($_GET['mode'] == 'userlogin')
    {
        $resData = JSONGet();

        // login
        $sql="select * FROM user_tbl where binary user_uname = '" . $_POST['uuname'] . "' and binary user_pword = '" . $_POST['upword'] . "'"; 
        $rsgetacc=mysqli_query($connection,$sql);
        while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
        {
            // others
            {
                // archive?
                if ($rowsgetacc->user_archive == "1")
                {
                    continue;
                }

                // blocked?
                if ($rowsgetacc->user_block == "1")
                {
                    JSONSet("error", "Login Error", "This account is temporarily blocked.");
                }
            }

            $tokenNew = GUID();

            $sql="update user_tbl set user_token = '" . $tokenNew . "' where id = '" . $rowsgetacc->id . "'"; 
            $rsupdate=mysqli_query($connection,$sql);


            JSONSet("ok", "", "", $tokenNew);
        }

        // result
        JSONSet("error", "Login Error", "Login Error");
    }

    // User Token
    // ----------------------
    if ($_GET['mode'] == 'userverifytoken')
    {
        $resData = JSONGet();

        // login
        $sql="select * FROM user_tbl where user_token = '" . $resData->utoken . "'"; 
        $rsgetacc=mysqli_query($connection,$sql);
        while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
        {
            // others
            {
                // archive?
                if ($rowsgetacc->user_archive == "1")
                {
                    continue;
                }

                // blocked?
                if ($rowsgetacc->user_block == "1")
                {
                    JSONSet("error", "Login Error", "This account is temporarily blocked.");
                }
            }

            JSONSet("ok", "", "", $rowsgetacc);
        }

        // result
        JSONSet("error", "Token Error", "Token Error");
    }


    // Dashboard Rep Item 1
    // ----------------------
    if ($_GET['mode'] == 'dashboard1')
    {
        $resData = JSONGet();
        
        // set
        $output = 0;

        // login
        $sql="select count(*) as resCount FROM air_tbl"; 
        $rsgetacc=mysqli_query($connection,$sql);
        while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
        {
            $output = $rowsgetacc->resCount;
        }

        JSONSet("ok", "", "", $output);
    }

    // Dashboard Rep Item 2
    // ----------------------
    if ($_GET['mode'] == 'dashboard2')
    {
        $resData = JSONGet();

        // set
        $output = 0;

        // login
        $sql="select count(*) as resCount FROM project_tbl where proj_status = '0'"; 
        $rsgetacc=mysqli_query($connection,$sql);
        while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
        {
            $output = $rowsgetacc->resCount;
        }

        JSONSet("ok", "", "", $output);
    }

    // Dashboard Rep Item 3
    // ----------------------
    if ($_GET['mode'] == 'dashboard3')
    {
        $resData = JSONGet();

        // set
        $output = 0;

        // login
        $sql="select count(*) as resCount FROM project_tbl where proj_status = '0' and proj_enddate < '" . $dateResult . "'"; 
        $rsgetacc=mysqli_query($connection,$sql);
        while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
        {
            $output = $rowsgetacc->resCount;
        }

        JSONSet("ok", "", "", $output);
    }


    // User List
    // ----------------------
    if ($_GET['mode'] == 'guserlist')
    {
        $resData = JSONGet();

        // set
        $resList = array();

        // login
        $sql="select * FROM user_tbl where user_archive != 1"; 
        $rsgetacc=mysqli_query($connection,$sql);
        while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
        {
            // others
            {
                if ($rowsgetacc->user_pos == "1")
                {
                    $rowsgetacc->user_pos = "Employee";
                }

                if ($rowsgetacc->user_pos == "0")
                {
                    $rowsgetacc->user_pos = "Administrator";
                }
            }

            $resList[] = $rowsgetacc;
        }

        JSONSet("ok", "", "", $resList);
    }

    // User View
    // ----------------------
    if ($_GET['mode'] == 'guserview')
    {
        $resData = JSONGet();

        // check exist
        {
            $sql="select * FROM user_tbl where id = '" . $resData->reqid . "' and user_archive != 1"; 
            $rsgetacc=mysqli_query($connection,$sql);
            while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
            {
                // result
                JSONSet("ok", "", "", $rowsgetacc);
            }
        }

        // result
        JSONSet("error", "", "");
    }

    // User Add
    // ----------------------
    if ($_GET['mode'] == 'guseradd')
    {
        $resData = JSONGet();

        // check
        {

        }

        // check exist
        {
            // login
            $sql="select * FROM user_tbl where binary user_uname = '" . $resData->rUname . "' and user_archive != 1"; 
            $rsgetacc=mysqli_query($connection,$sql);
            while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
            {
                JSONSet("error", "Adding Failed", "Username already exist.");
            }
        }

        // login
        $sql="insert into user_tbl
                (
                    user_date,
                    user_block,
                    user_pos,
                    user_uname,
                    user_pword,
                    user_fname
                )
            values
                (
                    '" . $dateOnlyResult . "',
                    '" . $resData->rBlock. "',
                    '" . $resData->rAccess. "',
                    '" . $resData->rUname . "',
                    '" . $resData->rPword . "',
                    '" . $resData->rFname . "'
                )"; 
        $rsgetacc=mysqli_query($connection,$sql);

        // result
        JSONSet("ok", "Adding Success!", "New user added successfully.");
    }

    // User Edit
    // ----------------------
    if ($_GET['mode'] == 'guseredit')
    {
        $resData = JSONGet();

        // check
        {

        }

        // check exist
        {
            $isExist = false;
            $sql="select * FROM user_tbl where id = '" . $resData->rId . "'"; 
            $rsgetacc=mysqli_query($connection,$sql);
            while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
            {
                $isExist = true;
            }

            if (!$isExist)
            {
                JSONSet("error", "Update Failed", "User not exist.");
            }
        }

        // check exist
        {
            // login
            $sql="select * FROM user_tbl where binary user_uname = '" . $resData->rUname . "' and id != '" . $resData->rId  . "' and user_archive != 1"; 
            $rsgetacc=mysqli_query($connection,$sql);
            while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
            {
                JSONSet("error", "Update Failed", "Username already exist.");
            }
        }

        // login
        $sql="  update user_tbl set
                    user_block = '" . $resData->rBlock. "',
                    user_pos = '" . $resData->rAccess. "',
                    user_uname = '" . $resData->rUname. "',
                    user_pword = '" . $resData->rPword. "',
                    user_fname = '" . $resData->rFname. "'
                where
                    id = '" . $resData->rId . "'
        "; 
        $rsgetacc=mysqli_query($connection,$sql);

        // result
        JSONSet("ok", "Update Success!", "User updated successfully.");
    }

    // User Delete
    // ----------------------
    if ($_GET['mode'] == 'guserdelete')
    {
        $resData = JSONGet();

        // check
        {

        }

        // check exist
        {
            $isExist = false;
            $sql="select * FROM user_tbl where id = '" . $resData->duser->id . "'"; 
            $rsgetacc=mysqli_query($connection,$sql);
            while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
            {
                $isExist = true;
            }

            if (!$isExist)
            {
                JSONSet("error", "Delete Failed", "User not exist.");
            }
        }

        // login
        $sql="update user_tbl set user_archive = 1 where id = '" . $resData->duser->id . "'"; 
        $rsgetacc=mysqli_query($connection,$sql);

        // result
        JSONSet("ok", "Delete Success!", "User removed successfully.");
    }

    // User Edit (Settings)
    // ----------------------
    if ($_GET['mode'] == 'guseredit2')
    {
        $resData = JSONGet();

        // check
        {

        }

        // check exist
        {
            $isExist = false;
            $sql="select * FROM user_tbl where id = '" . $resData->rId . "'"; 
            $rsgetacc=mysqli_query($connection,$sql);
            while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
            {
                $isExist = true;
            }

            if (!$isExist)
            {
                JSONSet("error", "Update Failed", "Account not exist.");
            }
        }

        // check exist
        {
            
        }

        // login
        $sql="  update user_tbl set
                    user_pword = '" . $resData->rPword. "'
                where
                    id = '" . $resData->rId . "'
        "; 
        $rsgetacc=mysqli_query($connection,$sql);

        // result
        JSONSet("ok", "Update Success!", "Account updated successfully.");
    }



    // Air Add
    // ----------------------
    if ($_GET['mode'] == 'airadd')
    {
        $resData = JSONGet();

        // check
        {
            if ($resData->oName == "")
            {
                JSONSet("error", "Add Failed", "Name must not empty.");
            }
        }

        // check image
        {
            /*
            // create image name
            $imageName = GUID() . ".png";
            $imagemptyName = "none.png";

            try 
            {
                if ($resData->rImage != "")
                {
                    $imageConvert = base64_decode($resData->rImage);

                    // check
                    if (getimagesizefromstring($imageConvert) !== false) 
                    {
                        file_put_contents("../files/images/" . $imageName, $imageConvert);
                    }   
                    else
                    {
                        $imageName = $imagemptyName;
                    }
                }
                else
                {
                    $imageName = $imagemptyName;
                }
            }
            catch (Exception $e)
            {
                $imageName = $imagemptyName;
            }
            */
        }

        // item
        {
            $sql="insert into air_tbl
                    (
                        air_name
                    )
                values
                    (
                        '" . $resData->oName . "'
                    )"; 
            $rsgetacc=mysqli_query($connection,$sql);
            $itemId = mysqli_insert_id($connection);
        }

        // result
        JSONSet("ok", "Add Success!", "New Air Purifier detail added successfully.");
    }

    // Air Edit
    // ----------------------
    if ($_GET['mode'] == 'airedit')
    {
        $resData = JSONGet();

        // check
        {
            if ($resData->oName == "")
            {
                JSONSet("error", "Update Failed", "Name must not empty.");
            }
        }

        // check image
        {
            /*
            // create image name
            $imageName = GUID() . ".png";
            $imagemptyName = "none.png";

            try 
            {
                if ($resData->rImage != "")
                {
                    $imageConvert = base64_decode($resData->rImage);

                    // check
                    if (getimagesizefromstring($imageConvert) !== false) 
                    {
                        file_put_contents("../files/images/" . $imageName, $imageConvert);
                    }   
                    else
                    {
                        $imageName = $imagemptyName;
                    }
                }
                else
                {
                    $imageName = $imagemptyName;
                }
            }
            catch (Exception $e)
            {
                $imageName = $imagemptyName;
            }
            */
        }

        // item
        { 
            $sql="  update air_tbl set
                        air_name = '" . $resData->oName . "'
                    where
                        id = '" . $resData->rId . "'
            "; 
            $rsgetacc=mysqli_query($connection,$sql);
        }

        // result
        JSONSet("ok", "Update Success!", "Air Purifier detail has been updated successfully.");
    }

    // Air Delete
    // ----------------------
    if ($_GET['mode'] == 'airdelete')
    {
        $resData = JSONGet();

        $sql="delete from air_tbl where id = '" . $resData->dAir->id . "'"; 
        $rsgetacc=mysqli_query($connection,$sql);

        // result
        JSONSet("ok", "Delete Success!", "Air Purifier detail has been removed successfully.");
    }

    // Air List
    // ----------------------
    if ($_GET['mode'] == 'airlist')
    {
        $resData = JSONGet();

        // set
        $resList = array();  

        // login
        $sql="select * FROM air_tbl order by id desc"; 
        $rsgetacc=mysqli_query($connection,$sql);
        while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
        {
            // other
            {
                //
                $timeDiff = strtotime($dateResult) - (int)$rowsgetacc->air_connected;
                if ($timeDiff > 10)
                {
                    $rowsgetacc->air_connected = "Disconnected";
                }

                //
                if ($timeDiff <= 10)
                {
                    $rowsgetacc->air_connected = "Connected";
                }
            }

            $resList[] = $rowsgetacc;
        }

        JSONSet("ok", "", $sql, $resList);
    }

    // Air Log List
    // ----------------------
    if ($_GET['mode'] == 'airloglist')
    {
        $resData = JSONGet();

        // set
        $resList = array();  

        // login
        $sql="select * FROM air_log_tbl where air_id = '" . $_GET['aid'] . "' order by id desc limit 1000"; 
        $rsgetacc=mysqli_query($connection,$sql);
        while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
        {
            // other
            {
                if ((int)$rowsgetacc->air_val >= 0 && (int)$rowsgetacc->air_val <= 5)
                {
                    $rowsgetacc->air_valtext = "GOOD";
                }

                if ((int)$rowsgetacc->air_val >= 6 && (int)$rowsgetacc->air_val <= 50)
                {
                    $rowsgetacc->air_valtext = "CLEANING";
                }

                if ((int)$rowsgetacc->air_val >= 51)
                {
                    $rowsgetacc->air_valtext = "BAD";
                }
            }

            $resList[] = $rowsgetacc;
        }

        JSONSet("ok", "", $sql, $resList);
    }

    // Air View
    // ----------------------
    if ($_GET['mode'] == 'airview')
    {
        $resData = JSONGet();

        // check exist
        {
            $sql="select * FROM air_tbl where id = '" . $resData->reqid . "'"; 
            $rsgetacc=mysqli_query($connection,$sql);
            while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
            {
                // other
                {
                    //
                    if ((int)$rowsgetacc->air_airval >= 0 && (int)$rowsgetacc->air_airval <= 5)
                    {
                        $rowsgetacc->air_airvaltext = "GOOD";
                    }
                    if ((int)$rowsgetacc->air_airval >= 6 && (int)$rowsgetacc->air_airval <= 50)
                    {
                        $rowsgetacc->air_airvaltext = "CLEANING";
                    }
                    if ((int)$rowsgetacc->air_airval >= 51)
                    {
                        $rowsgetacc->air_airvaltext = "BAD";
                    }

                    // fan
                    if ((int)$rowsgetacc->air_fan == "0")
                    {
                        $rowsgetacc->air_fantext = "OFF";
                    }
                    if ((int)$rowsgetacc->air_fan == "1")
                    {
                        $rowsgetacc->air_fantext = "LOW";
                    }
                    if ((int)$rowsgetacc->air_fan == "2")
                    {
                        $rowsgetacc->air_fantext = "MEDIUM";
                    }
                    if ((int)$rowsgetacc->air_fan == "3")
                    {
                        $rowsgetacc->air_fantext = "HIGH";
                    }

                    // spray
                    if ((int)$rowsgetacc->air_spray == "0")
                    {
                        $rowsgetacc->air_spraytext = "OFF";
                    }
                    if ((int)$rowsgetacc->air_spray == "1")
                    {
                        $rowsgetacc->air_spraytext = "1 Minute";
                    }
                    if ((int)$rowsgetacc->air_spray == "2")
                    {
                        $rowsgetacc->air_spraytext = "3 Minutes";
                    }
                    if ((int)$rowsgetacc->air_spray == "3")
                    {
                        $rowsgetacc->air_spraytext = "5 Minutes";
                    }
                    if ((int)$rowsgetacc->air_spray == "4")
                    {
                        $rowsgetacc->air_spraytext = "10 Minutes";
                    }
                    if ((int)$rowsgetacc->air_spray == "5")
                    {
                        $rowsgetacc->air_spraytext = "15 Minutes";
                    }

                    //
                    $timeDiff = strtotime($dateResult) - (int)$rowsgetacc->air_connected;
                    if ($timeDiff > 10)
                    {
                        $rowsgetacc->air_connected = "Disconnected";
                    }

                    //
                    if ($timeDiff <= 10)
                    {
                        $rowsgetacc->air_connected = "Connected";
                    }
                }

                // result
                JSONSet("ok", "", $resData->reqid, $rowsgetacc);
            }
        }

        // result
        JSONSet("error", "", "");
    }



    // Air Fan Edit
    // ----------------------
    if ($_GET['mode'] == 'airfanedit')
    {
        $resData = JSONGet();
        
        // item
        { 
            $sql="  update air_tbl set
                        air_fan = '" . $resData->airfanlvl . "'
                    where
                        id = '" . $resData->airid . "'
            "; 
            $rsgetacc=mysqli_query($connection,$sql);
        }

        // result
        JSONSet("ok", "Update Success!", "Air Purifier detail has been updated successfully.");
    }

    // Air Spray Edit
    // ----------------------
    if ($_GET['mode'] == 'airsprayedit')
    {
        $resData = JSONGet();
        
        // item
        { 
            $sql="  update air_tbl set
                        air_spray = '" . $resData->airsprayint . "'
                    where
                        id = '" . $resData->airid . "'
            "; 
            $rsgetacc=mysqli_query($connection,$sql);
        }

        // result
        JSONSet("ok", "Update Success!", "Air Purifier detail has been updated successfully.");
    }

    // Air Spray 2 Edit
    // ----------------------
    if ($_GET['mode'] == 'airspray2edit')
    {
        $resData = JSONGet();
        
        // item
        { 
            $sql="  update air_tbl set
                        air_spray2 = '1'
                    where
                        id = '" . $resData->airid . "'
            "; 
            $rsgetacc=mysqli_query($connection,$sql);
        }

        // result
        JSONSet("ok", "Update Success!", "Air Purifier detail has been updated successfully.");
    }



    // ards
    // Air Fan
    // ----------------------
    if ($_GET['mode'] == 'getfan')
    {
        $resData = JSONGet();

        // check exist
        {
            $sql="select * FROM air_tbl where id = '" . $_GET['id'] . "'"; 
            $rsgetacc=mysqli_query($connection,$sql);
            while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
            {
                echo $rowsgetacc->air_fan;
            }
        }
    } 

    // ards
    // Air Spray
    // ----------------------
    if ($_GET['mode'] == 'getspray')
    {
        $resData = JSONGet();

        // check exist
        {
            $sql="select * FROM air_tbl where id = '" . $_GET['id'] . "'"; 
            $rsgetacc=mysqli_query($connection,$sql);
            while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
            {
                echo $rowsgetacc->air_spray;
            }
        }
    } 

    // ards
    // Air Spray 2
    // ----------------------
    if ($_GET['mode'] == 'getspray2')
    {
        $resData = JSONGet();

        // check exist
        {
            $sql="select * FROM air_tbl where id = '" . $_GET['id'] . "'"; 
            $rsgetacc=mysqli_query($connection,$sql);
            while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
            {
                echo $rowsgetacc->air_spray2;
            }
        }
    } 

    // ards
    // Air Set
    // ----------------------
    if ($_GET['mode'] == 'setdata')
    {
        $resData = JSONGet();

        //
        $sql="  update air_tbl set
                    air_airval = '" . $_GET['val1'] . "',
                    air_spray2 = '0'
                where 
                    id = '" . $_GET['id'] . "'
        ";
        $rsupd=mysqli_query($connection,$sql); 

        //
        $sql="select * FROM air_tbl where id = '" . $_GET['id'] . "'"; 
        $rsgetacc=mysqli_query($connection,$sql);
        while ($rowsgetacc = mysqli_fetch_object($rsgetacc))
        {
            //
            {

            }

            $sql="  insert into air_log_tbl 
                        (
                            air_id,
                            air_date,
                            air_val
                        )
                    values
                        (
                            '" . $_GET['id'] . "',
                            '" . $dateResult . "',
                            '" . $_GET['val1'] . "'
                        )
            "; 
            $rsupd=mysqli_query($connection,$sql);
        }

        //
        $sql="  update air_tbl set
                    air_connected = '" . strtotime($dateResult) . "'
                where 
                    id = '" . $_GET['id'] . "'
        "; 
        $rsupd=mysqli_query($connection,$sql);
    }





    









    /*
        ======================================
        FUNCTIONS
        ======================================
    */

    // JSON - Get
    // ---------------------------------------
    function JSONGet()
    {
        // get json
        $json = file_get_contents('php://input');
        $data = json_decode($json);

        // sanitize?
        {
            sanitize_array($data);
        }

        return $data;
    }

    // JSON - Set     
    // ---------------------------------------
    function JSONSet($resStatus, $resTitle = "", $resMsg = "", $resData = "")
    {
        /*
            status:
                ok      - success
                error   - error

            title:
                return any notif title

            message:
                return any notif msg
            
            data:
                return any result
        */
        echo json_encode(array("status" => $resStatus, "title" => $resTitle, "message" => $resMsg, "data" => $resData));
        exit();
    }

    // IDs
    // ---------------------------------------
    function GUID()
    {
        if (function_exists('com_create_guid') === true)
        {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535));
    }

    // Time
    // ---------------------------------------
    function convertSecondsToTime($seconds) {
        if ($seconds <= 0)
        {
            $seconds = 0;
        }

        $hours = floor($seconds / 3600);
        $minutes = floor(($seconds % 3600) / 60);
        $seconds = $seconds % 60;
        
        return sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
    }

    // Sanitize
    // ---------------------------------------
    function sanitize_string($string) {
        // Remove any characters that could be used to inject SQL code
        $string = str_replace("'", "", $string);
        $string = str_replace("`", "", $string);
        $string = str_replace("\"", "", $string);
        $string = str_replace("\\", "", $string);
        $string = str_replace("*", "", $string);
        $string = str_replace("%", "", $string);
        $string = str_replace(";", "", $string);
        $string = strip_tags($string);
        return $string;
    }

    function sanitize_array(&$array) {
        foreach ($array as &$item) {
            if (is_array($item)) {
                sanitize_array($item);
            } else if (is_string($item)) {
                $item = sanitize_string($item);
            }
        }
    }
?>