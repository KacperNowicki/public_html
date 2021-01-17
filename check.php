<?php
require_once('conn/connection.php');
require_once 'inc/header.php';
require_once 'inc/navbar.php';

if(isset($_POST)) {
    $success = false;
    $message = "Nie można dołączyć do kolejki";
    if(isset($_POST['check_waitlist'])) {
        $email = $_POST['email'];
        // get the user id
        $sql_user = "SELECT * FROM waitlist WHERE email='$email'";
        $result = $conn->query($sql_user);

        /*
         * Here we get all the users in the waitlist
         */
        $allUsersSQL = "SELECT * FROM waitlist ORDER BY date_added ASC";
        $rusers = $conn->query($allUsersSQL);
        if($rusers->num_rows > 0) {
            $allUsersID = [];
            // 3. Application reassigns the new numbers to people waiting after the user who resigned
            // we create an array in order to have all the users ids so we can index them by date
            // so we can find the position of the current user in the waitlist
            foreach ($rusers->fetch_all() as $user_r) {
                $allUsersID[] = $user_r[0];
            }
        }


        if ($result->num_rows > 0) {
            $message = "Jesteś w kolejce";
            $user = $result->fetch_assoc();
            $fname = $user['first_name'];
            $lname = $user['last_name'];
            $id = $user['id'];
            // the postion of the current user in the waitlist. we add + 1 because indexing starts at 0.
            $position = array_search($id, $allUsersID) +1;
            $success = true;
        } else {
            $message = "Ten email nie jest w kolejce";
        }

        $conn->close();
    }
}
?>

    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <?php
            if(isset($success) && isset($_POST['check_waitlist'])) {
                if($success) {
                    echo "<div class=\"alert alert-info\">$message</div>";
                    ?>
                    <hr>
                    Jesteś <b>#<?= @$position ?></b> w kolejce.
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Imie i Nazwisko</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><?= $id ?></td>
                                <td><?= @$fname . " " . @$lname ?></td>
                                <td><?= $email ?></td>
                                <td><a href="/delete.php?user=<?= @$id ?>" onclick="deleteUser(e)" class="confirmdelete btn btn-sm btn-danger">resign</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <?php
                }
                if(!$success)
                    echo "<div class=\"alert alert-danger\">$message</div>";
            }
            ?>
            <?php if(@$success != true) { ?>
                <form class="form-signin" method="post" action="">
                    <h1 class="h3 mb-3 font-weight-normal">Sprawdź kolejkę</h1>
                    <label for="inputEmail" class="sr-only">Adres email</label>
                    <input type="email" id="inputEmail" name="email" class="form-control my-3" value="<?= @$_POST['email'] ?>" placeholder="Email address" required autofocus>
                    <input type="text" hidden name="check_waitlist" value="1">
                    <button class="btn btn-lg btn-primary btn-block my-4" type="submit">Sprawdź</button>
                </form>
            <?php } ?>
        </div>
        <div class="col-4"></div>
    </div>
    <script>
        var elems = document.getElementsByClassName('confirmdelete');
        var confirmIt = function (e) {
            if (!confirm('Na pewno chcesz wyjść z kolejki?')) e.preventDefault();
        };
        for (var i = 0, l = elems.length; i < l; i++) {
            elems[i].addEventListener('click', confirmIt, false);
        }
    </script>
<?php
require_once 'inc/footer.php';
?>