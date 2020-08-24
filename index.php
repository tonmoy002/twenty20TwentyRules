<!doctype html>
<html lang="en">
<head>

    <?php include('common/header.php') ?>

</head>

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

                <form method="post" action="general-info.php">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-10">
                            <label for="email">Email:  <span class="text-muted"></span></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="youremail@example.com" required>
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
