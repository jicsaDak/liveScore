<?php
include "inc/header.php";
$msg = "";
if (isset($_POST['submit'])) {

    $tornament_id = $_POST['tornament_id'];
    $match_id = $_POST['match_id'];
    $innings = $_POST['innings'];
    $boll_Status = $_POST['boll_Status'];
    $boll_no = $_POST['boll_no'];
    $over_no = $_POST['over_no'];
    $wickets_type = $_POST['wickets_type'];
    $boller_id = $_POST['boller_id'];
    $bter_id = $_POST['bter_id'];
    $ttl_runs = $_POST['ttl_runs'];
    $extra_run = $_POST['extra_run'];
    $bowandari = $_POST['bowandari'];
    $bouncer = $_POST['bouncer'];
    $entry_by = $_POST['entry_by'];


    $sql = "INSERT INTO `ball_dump` (`tornament_id`, `match_id`, `innings`, `boll_Status`, `boll_no`, `over_no`, `wickets_type`, `boller_id`,
    `bter_id`, `ttl_runs`, `extra_run`, `bowandari`, `bouncer`, `entry_by`)
    VALUES ('" . $tornament_id . "','" . $match_id . "','" . $innings . "','" . $boll_Status . "','" . $boll_no . "','" . $over_no . "','" . $wickets_type . "',
    '" . $boller_id . "','" . $bter_id . "',
    '" . $ttl_runs . "','" . $extra_run . "','" . $bowandari . "','" . $bouncer . "','" . $entry_by . "')";

    $query = $conn->query($sql);


    if ($query) {
        $msg = "Data Inserted Succesfully";
    } else {
        $msg = "Data Not Inserted";
    }
}



if (isset($_POST['update'])) {

    $type = $_POST['type'];
    $duration = $_POST['duration'];
    $overs = $_POST['overs'];
    $number_of_ball = $_POST['number_of_ball'];
    $number_of_players = $_POST['number_of_players'];
    $time = $_POST['time'];

    $sql = "UPDATE `match_type` SET `type`='" . $type . "',`duration`='" . $duration . "',`overs`='" . $overs . "',`number_of_ball`='" . $number_of_ball . "',`number_of_players`='" . $number_of_players . "' WHERE roll_no='" . $student_roll . "'";
    $query = $conn->query($sql);


    if ($query) {
        $msg = "Data Updated Succesfully";
    } else {
        $msg = "Data Not Updated";
    }
}

if (isset($_GET['id'])) {

    $roll_no = $_GET['id'];

    $sql = "select s.*, r.*, a.* from student_info s, results r, address a where s.roll_no=r.roll_no and s.roll_no=a.roll_num and s.roll_no='" . $roll_no . "' ";

    $query = $conn->query($sql);

    $row = $query->fetch_object();
}

?>

<html>

<head>
    <title>data input</title>

</head>



<body>

    <style>
        input[type=text],
        select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }
    </style>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <div class="container">
        <div class="col">
            <section class="headeroption">
                <h2 style="text-align:center">Continuous Ball Information</h2>
            </section>
            <span><?php echo $msg; ?></span>
            <?php if (isset($_GET['id'])) { ?>
                <a href="view.php">Go Back</a>
            <?php } ?>
            <section class="maincontent">
                <div class="div">
                    <form action="" method="post">

                        <label for="">Tornament Id:</label>
                        <input type="number" name="tornament_id" value=""><br>

                        <label for="">Match Id :</label>
                        <input type="text" name="match_id" value=""><br>


                        <label for="">Innings:</label>
                        <select name="innings" value="">
                            <option value="1st">1st</option>
                            <option value="2nd">2nd</option>
                        </select><br>

                        <label for="">Ball Status:</label>
                        <select name="boll_Status" value="">
                            <option value="y">Yes</option>
                            <option value="n">No</option>
                        </select><br>



                        <label for="">Ball No:</label>
                        <select name="boll_no" value="">
                            <option value="1">1st</option>
                            <option value="2">2nd</option>
                            <option value="3">3rd</option>
                            <option value="4">4rth</option>
                            <option value="5">5th</option>
                            <option value="6">last</option>
                        </select>








                        <label for="">Over No:</label>
                        <input type="number" name="over_no" max="50" value=""><br>





                        <label for="">Wickets Type:</label>
                        <select name="wickets_type" value="">
                            <option value="no">No</option>
                            <option value="catch">Catch</option>
                            <option value="Bold">Bold</option>
                            <option value="RunOut">Run Out</option>
                        </select>


                        <label for="">Boller Id:</label>
                        <input type="number" name="boller_id" value="">


                        <label for="">Bater Id:</label>
                        <input type="number" name="bter_id" value="">



                        <label for="">Totel Run In this Ball:</label>
                        <input type="number" name="ttl_runs" max="20" value="">


                        <label for="">Extra Runs:</label>
                        <input type="number" name="extra_run" max="10" value="">




                        <label for="">Bawandari:</label>
                        <select name="bowandari" value="">
                            <option value="0">NO</option>
                            <option value="4">Four</option>
                            <option value="6">Six</option>
                        </select>

                        <label for="">Bouncer:</label>
                        <select name="bouncer" value="">
                            <option value="0">NO</option>
                            <option value="1">One Bounce</option>
                        </select>


                        <label for="">Entry BY:</label>
                        <input type="number" name="entry_by" value="">

                        <?php if (isset($_GET['id'])) { ?>
                            <input type="submit" name="update" value="Update">
                        <?php } else { ?>
                            <input type="submit" name="submit" value="Submit">
                        <?php } ?>


                    </form>
                </div>
            </section>

        </div>
    </div>
</body>


</html>
<?php include "inc/footer.php"; ?>