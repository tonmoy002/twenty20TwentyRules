<!doctype html>
<html lang="en">
<head>

    <?php include('common/header.php') ?>

</head>

<?php



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $emailAdd       =  $_POST['email'];
    $bDate          =  $_POST['date-of-birth'];
    $gender         =  $_POST['gender'];
    $eyePrblm       =  $_POST['eye-problem'];
    $profession     =  $_POST['professioin'];
    $notifyType     =  $_POST['notify_type'];
    $notifyTime     =  $_POST['notify_time'];
    $hours          =  $_POST['hours'];
    $dateTimeNow    =  date("Y-m-d H:i:s");
    $dateToday      =  date("Y-m-d");


    if($profession == 'Others') {
        $profession     =  $_POST['other-profession'];
    }

    $sql            = "SELECT * FROM users WHERE email='$emailAdd'";
    $userInfo       = $conn->query($sql);


    if(mysqli_num_rows($userInfo)==0) {

        $sql = "INSERT INTO users (email, birth_date, sex, profession, computer_use_time, eye_problem, notify_type, notify_time, created_at, updated_at)
                  VALUES ('$emailAdd', '$bDate' , '$gender', '$profession', '$hours', '$eyePrblm', '$dateTimeNow' , '$dateTimeNow')";

        mysqli_query($conn, $sql);

        $insertedId     = $conn->insert_id;

    }else{

        $sql = "UPDATE users SET birth_date='$bDate', sex='$gender', profession='$profession', eye_problem='$eyePrblm',computer_use_time='$hours', notify_type='$notifyType', notify_time='$notifyTime', updated_at='$dateTimeNow'
                  WHERE email='$emailAdd'";

        mysqli_query($conn, $sql);

        while($row = $userInfo->fetch_assoc()) {

            $insertedId     = $row['id'];
        }

    }



    $_SESSION['user_id'] = $insertedId;


    $sql            = "SELECT * FROM symtoms WHERE user_id='$insertedId' and created_at>='$dateToday'";
    $symtoms        = $conn->query($sql);

    //if(mysqli_num_rows($symtoms)>0) {

    header("Location: app.php");

    //}

}


?>


<body class="bg-light">
<div class="container">
    <div class="py-2 text-center">
        <h2>20-20-20 Rules</h2>
        <p class="lead"></p>
    </div>

    <div class="row">

        <div class="col-md-2">

        </div>
        <div class="col-md-8">

            <form method="post" action="app.php">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-10">
                            <input class="" type="hidden" value="<?php echo $insertedId ?>" id="user_id" name="user_id" required>

                            <label for="eye_strain">Eye strain :  <span class="text-muted"></span></label>
                            <input  class="form-control" type="range" min="0.1" max="10.0" step="0.1" value="5.0" id="eye_strain" name="eye_strain">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-10">

                            <label for="water_dry">Watery or Dry Eyes:  <span class="text-muted"></span></label>
                            <input  class="form-control" type="range" min="0.1" max="10.0" step="0.1" value="5.0" id="water_dry" name="water_dry">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-10">

                            <label for="headache">Watery or Dry Eyes:  <span class="text-muted"></span></label>
                            <input  class="form-control" type="range" min="0.1" max="10.0" step="0.1" value="5.0" id="headache" name="headache">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-10">

                            <label for="blurred">Blurred or Double Vision:  <span class="text-muted"></span></label>
                            <input  class="form-control" type="range" min="0.1" max="10.0" step="0.1" value="5.0" id="blurred" name="blurred">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-10">

                            <label for="eye_irritation">Eye Irritations :  <span class="text-muted"></span></label>
                            <input  class="form-control" type="range" min="0.1" max="10.0" step="0.1" value="5.0" id="eye_irritation" name="eye_irritation">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-10">

                            <label for="d_concentration">Difficulty of Concentration:  <span class="text-muted"></span></label>
                            <input  class="form-control" type="range" min="0.1" max="10.0" step="0.1" value="5.0" id="d_concentration" name="d_concentration">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-10">

                            <label for="l_sensitivity">Light Sensitivity:  <span class="text-muted"></span></label>
                            <input  class="form-control" type="range" min="0.1" max="10.0" step="0.1" value="5.0" id="l_sensitivity" name="l_sensitivity">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-10">

                            <label for="sorness">Soreness in Neck, Shoulder or Back:  <span class="text-muted"></span></label>
                            <input  class="form-control" type="range" min="0.1" max="10.0" step="0.1" value="5.0" id="sorness" name="sorness">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-10">

                            <label for="keeping_open">Difficulty of Keeping Eyes Open:  <span class="text-muted"></span></label>
                            <input  class="form-control" type="range" min="0.1" max="10.0" step="0.1" value="5.0" id="keeping_open" name="keeping_open">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-10">

                            <label for="infections">Infections in Eyes:  <span class="text-muted"></span></label>
                            <input  class="form-control" type="range" min="0.1" max="10.0" step="0.1" value="5.0" id="infections" name="infections">
                        </div>
                    </div>
                </div>



                <div class="row py-2">
                    <div class="col-md-8">
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary btn-block" type="submit">Next</button>
                    </div>
                </div>
            </form>

        </div>


        <div class="col-md-2">

        </div>


        <?php


        ?>

    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2020- 20-20-20 Rules</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="javascript:void(0);">Privacy</a></li>
            <li class="list-inline-item"><a href="javascript:void(0);">Terms</a></li>
            <li class="list-inline-item"><a href="javascript:void(0);">Support</a></li>
        </ul>
    </footer>
</div>

</body>

<?php include('common/footer.php') ?>

</html>

<script type="text/javascript">




</script>
