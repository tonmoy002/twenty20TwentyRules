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
        <h2>20-20-20 rules</h2>
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
                            <select class="form-control" name="gender" required>
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
                            <select class="form-control" name="eye-problem" required>
                                <option value="">Select</option>
                                <option value="Yes" <?php if($dataInfo['eye_problem']== 'Yes') echo ' selected="selected"'; ?> >Yes</option>
                                <option value="No" <?php if($dataInfo['eye_problem']== 'No') echo ' selected="selected"'; ?> >No</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-10">
                            <label for="hours">Everyday general computer use time in hour? <span class="text-muted"></span></label>
                            <input class="form-control" type="number" value="<?php echo $dataInfo['use_time'];?>" id="hours" name="hours" required>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-10">
                            <label for="professioin">Profession?  <span class="text-muted"></span></label>
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
                            <label for="eye-problem">Other profession <span class="text-muted"></span></label>
                            <input class="form-control" type="text" value="<?php echo $dataInfo['profession'] ?>" id="other-profession" name="other-profession">
                        </div>
                    </div>

                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-10">
                            <label for="eye-problem">Preferred notification type  <span class="text-muted"></span></label>
                            <select class="form-control" name="notify_type" required>
                                <option value="">Select</option>
                                <option value="Audio" <?php if($dataInfo['notify_type']== 'Audio') echo ' selected="selected"'; ?> >Audio</option>
                                <option value="Push notification" <?php if($dataInfo['notify_type']== 'Push notification') echo ' selected="selected"'; ?> >Push notification</option>
                                <option value="Both" <?php if($dataInfo['notify_type']== 'Both') echo ' selected="selected"'; ?> >Both</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-10">
                            <label for="hours">Preferred notification time in minutes? <span class="text-muted"></span></label>
                            <select class="form-control" name="notify_time" required>
                                <option value="">Select time in minutes</option>
                                <option value="15" <?php if($dataInfo['notify_time']== '15') echo ' selected="selected"'; ?> >15 minutes</option>
                                <option value="20" <?php if($dataInfo['notify_time']== '20') echo ' selected="selected"'; ?> >20 minutes</option>
                                <option value="25" <?php if($dataInfo['notify_time']== '25') echo ' selected="selected"'; ?> >25 minutes</option>
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
        <p class="mb-1">&copy; 2020- 20-20-20 rules</p>
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

        }else{

            $('.profession-other').addClass('d-none');
            $("#other-profession"). removeAttr("required");

        }

    });


</script>
