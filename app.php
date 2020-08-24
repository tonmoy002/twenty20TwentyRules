<?php include('common/header.php') ?>
<?php

$dateTimeNow    =  date("Y-m-d H:i:s");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $userId         =  $_POST['user_id'];
    $eyeStrain      =  $_POST['eye_strain'];
    $waterDry       =  $_POST['water_dry'];
    $headache       =  $_POST['headache'];
    $blurred        =  $_POST['blurred'];
    $eyeIrri        =  $_POST['eye_irritation'];
    $dConcen        =  $_POST['d_concentration'];
    $lSensity       =  $_POST['l_sensitivity'];
    $sorness        =  $_POST['sorness'];
    $keepOpen       =  $_POST['keeping_open'];
    $infection      =  $_POST['infections'];

    $sql            = "SELECT * FROM symtoms WHERE user_id='$userId' and created_at>='$dateToday'";
    $symtoms        = $conn->query($sql);

    if(mysqli_num_rows($symtoms)==0) {

        $sql            = "INSERT INTO symtoms (symtom_1, symtom_2, symtom_3, symtom_4, symtom_5, symtom_6, symtom_7, symtom_8, symtom_9, symtom_10, user_id, created_at)
                          VALUES ('$eyeStrain', '$waterDry' , '$headache', '$blurred', '$eyeIrri', '$dConcen' ,'$lSensity' ,'$sorness' ,'$keepOpen' ,'$infection' ,'$userId' , '$dateTimeNow')";

        mysqli_query($conn, $sql);

    }



}else{

    $userId         =  $_SESSION['user_id'];
    $notifyType     =  'Both';
    $notifyTime     =  2;


    //$sql            = "SELECT * FROM symtoms WHERE user_id='$userId' and created_at>='$dateToday'";
    //$symtoms        = $conn->query($sql);

    $sql            = "SELECT * FROM users WHERE id='$userId'";
    $userInfo       = $conn->query($sql);


    while($row = $userInfo->fetch_assoc()) {

        $notifyType     = $row['notify_type'];
        $notifyTime     = $row['notify_time'];
    }


    if(mysqli_num_rows($symtoms)==0) {

        //header("Location: index.php");

    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>20 20 20 rules</title>
  <script defer src="face-api.min.js"></script>
  <script defer src="script.js"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="push.js"></script>
  <script src="serviceWorker.min.js"></script>

  <style>
    body {
      margin: 0;
      padding: 0;
      width: 100vw;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    canvas {
      position: absolute;
    }
  </style>
</head>
<body>

  <video id="video" width="530" height="330" autoplay></video>

  <audio id="myAudio">
    <source src="audio/20-seconds.ogg" type="audio/ogg">
    <source src="audio/20-seconds.mp3" type="audio/mpeg">
    Your browser does not support the audio element.
  </audio>

</body>

<script type="text/javascript">

    var notifyTime   = '<?php echo $notifyTime;?>';
    notifyTime       = parseInt(notifyTime);
    var notifyType   = '<?php echo $notifyType;?>';

</script>


</html>