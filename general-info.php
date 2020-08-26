<!doctype html>
<html lang="en">
<head>

    <?php include('common/header.php') ?>

</head>

<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $emailAdd       =  $_POST['email'];
        $dataInfo       =  array();
        $sql            = "SELECT * FROM users WHERE email='$emailAdd'";
        $userInfo       = $conn->query($sql);

        while($row = $userInfo->fetch_assoc()) {

            $dataInfo['gender']           = $row['sex'];
            $dataInfo['d_ob']             = $row['birth_date'];
            $dataInfo['profession']       = $row['profession'];
            $dataInfo['eye_problem']      = $row['eye_problem'];
            $dataInfo['use_time']         = $row['computer_use_time'];
            $dataInfo['notify_time']         = $row['notify_time'];
            $dataInfo['notify_type']         = $row['notify_type'];
        }

    }else{
        header("Location: index.php");
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

            <form method="post" action="every-day-info.php">
            <!--<form method="post" action="app.php">-->

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-10">
                            <input class="" type="hidden" value="<?php echo $emailAdd ?>" id="email" name="email" required>

                            <label for="gender">Gender:  <span class="text-muted"></span></label>
                            <select class="form-control" name="gender" id="gender" required>
                                <option value="">Select</option>
                                <option value="Male" <?php if($dataInfo['gender']== 'Male') echo ' selected="selected"'; ?>>Male</option>
                                <option value="Female" <?php if($dataInfo['gender']== 'Female') echo ' selected="selected"'; ?> >Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-10">
                            <label for="date-of-birth">Date of birth  <span class="text-muted"></span></label>
                            <input class="form-control" type="date" value="<?php echo $dataInfo['d_ob']?>" id="date-of-birth" name="date-of-birth" required>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-10">
                            <label for="eye-problem">Do you have any eye problem?  <span class="text-muted"></span></label>
                            <select class="form-control" name="eye-problem" id="eye-problem" required>
                                <option value="">Select</option>
                                <option value="Yes" <?php if($dataInfo['eye_problem']== 'Yes') echo ' selected="selected"'; ?> >Yes</option>
                                <option value="No" <?php if($dataInfo['eye_problem']== 'No') echo ' selected="selected"'; ?> >No</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-10">
                            <label for="hours">Everyday average computer use time in hour? <span class="text-muted"></span></label>
                            <input class="form-control" type="number" value="<?php echo $dataInfo['use_time'];?>" id="hours" name="hours" required>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-10">
                            <label for="professioin-input">Profession?  <span class="text-muted"></span></label>
                            <select class="form-control" name="professioin" id="professioin-input" required>
                                <option value="">Select</option>
                                <option value="Scientists" <?php if($dataInfo['profession']== 'Scientists') echo ' selected="selected"'; ?> >Scientists</option>
                                <option value="Researchers" <?php if($dataInfo['profession']== 'Researchers') echo ' selected="selected"'; ?> >Researchers</option>
                                <option value="Teachers" <?php if($dataInfo['profession']== 'Teachers') echo ' selected="selected"'; ?> >Teachers</option>
                                <option value="Students" <?php if($dataInfo['profession']== 'Students') echo ' selected="selected"'; ?> >Students</option>
                                <option value="Executives" <?php if($dataInfo['profession']== 'Executives') echo ' selected="selected"'; ?> >Executives</option>
                                <option value="Bankers" <?php if($dataInfo['profession']== 'Bankers') echo ' selected="selected"'; ?> >Bankers</option>

                                <?php
                                if($dataInfo['profession']== 'Scientists' || $dataInfo['profession']== 'Researchers' ||$dataInfo['profession']== 'Teachers' ||$dataInfo['profession']== 'Students' ||$dataInfo['profession']== 'Executives' || $dataInfo['profession']== 'Bankers'|| $dataInfo['profession']== '' )
                                    echo '<option value="Others">Others</option>';
                                else
                                    echo '<option value="Others" selected>Others</option>';
                                ?>

                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 profession-other <?php
                        if($dataInfo['profession']== 'Scientists' || $dataInfo['profession']== 'Researchers' ||$dataInfo['profession']== 'Teachers' ||$dataInfo['profession']== 'Students' ||$dataInfo['profession']== 'Executives' || $dataInfo['profession']== 'Bankers' || $dataInfo['profession']== '' ) echo 'd-none'
                    ?>">
                        <div class="mb-10">
                            <label for="other-profession">Other profession <span class="text-muted"></span></label>
                            <input class="form-control" type="text" value="<?php echo $dataInfo['profession'] ?>" id="other-profession" name="other-profession">
                        </div>
                    </div>

                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-10">
                            <label for="notify_type">Preferable notification type  <span class="text-muted"></span></label>
                            <select class="form-control" name="notify_type" id="notify_type" required>
                                <option value="">Select</option>
                                <option value="Audio" <?php if($dataInfo['notify_type']== 'Audio') echo ' selected="selected"'; ?> >Audio</option>
                                <option value="Push notification" <?php if($dataInfo['notify_type']== 'Push notification') echo ' selected="selected"'; ?> >Push notification</option>
                                <option value="Both" <?php if($dataInfo['notify_type']== 'Both') echo ' selected="selected"'; ?> >Both</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-10">
                            <label for="notify_time">Preferable notification time in minutes? <span class="text-muted"></span></label>
                            <select class="form-control" name="notify_time"  id="notify_time" required>
                                <option value="">Select time in minutes</option>
                                <?php
                                    for ($i=5; $i<=60; $i=$i+5){
                                        if($dataInfo['notify_time']== $i)
                                            echo '<option value="'.$i.'" selected="selected"> '.$i.' minutes</option>';
                                        else
                                            echo '<option value="'.$i.'"> '.$i.' minutes</option>';


                                    }
                                ?>
                            </select>

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

    $(document).on('change', '#professioin-input', function (e) {

        var that        =   $(this);
        var profession  =   that.val();
        if(profession == 'Others') {

            $('.profession-other').removeClass('d-none');
            $('#other-profession').attr('required','required');
            $('#other-profession').val('');


        }else{

            $('.profession-other').addClass('d-none');
            $("#other-profession"). removeAttr("required");

        }

    });


</script>
