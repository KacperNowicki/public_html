<?php
require_once('conn/connection.php');
require_once 'inc/header.php';
require_once 'inc/navbar.php';

if(isset($_POST)) {
    $success = false;
    $message = "Nie można dołączyć do kolejki";
    if(isset($_POST['enter_waitlist'])) {
        $email = $_POST['email'];
        $fname = $_POST['first_name'];
        $lname = $_POST['last_name'];

        // get the user id
        $sql_user = "SELECT id, email FROM waitlist WHERE email='$email'";
        $result = $conn->query($sql_user);

        if ($result->num_rows > 0) {

            // check if the email is in thw waitlist

            $message = "Ten adres email jest już w kolejce";
        } else {
            // if the email is not in the waitlist, insert the user in the waitlist
            $sql = "INSERT INTO waitlist(email, first_name, last_name)
VALUES ('$email','$fname', '$lname')";

            if ($conn->query($sql) === TRUE) {
                $message = "Dołączyłeś do kolejki";
                $success = true;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        $conn->close();
    }
}
?>

<div class="row">
    <div class="col-4"></div>
    <div class="col-4">
        <?php
            if(isset($_SESSION['deleted'])) {
                echo "<div class=\"alert alert-info\">".$_SESSION['deleted']."</div>";
                unset($_SESSION['deleted']);
            }
            if(isset($success) && isset($_POST['enter_waitlist'])) {
                if($success) {
                    echo "<div class=\"alert alert-info\">$message</div>";
                    echo "<a href=\"/check.php\" class=\"btn btn-primary\">Check my position</a>";
                }
                if(!$success)
                    echo "<div class=\"alert alert-danger\">$message</div>";
            }
        ?>
        <?php if(@$success != true) { ?>
        <form class="form-signin" method="post" action="">
            <h1 class="h3 mb-3 font-weight-normal">Dołącz do kolejki</h1>
            <label for="inputEmail" class="sr-only">Adres email</label>
            <input type="email" id="inputEmail" name="email" class="form-control my-3" value="<?= @$_POST['email'] ?>" placeholder="Email address" required autofocus>

            <label for="name" class="sr-only">Imię</label>
            <input type="text" id="name" name="first_name" class="form-control my-3" value="<?= @$_POST['first_name'] ?>" placeholder="First name" required autofocus>

            <label for="lname" class="sr-only">Nazwisko</label>
            <input type="text" id="lname" name="last_name" class="form-control my-3" value="<?= @$_POST['last_name'] ?>" placeholder="Last name" required autofocus>
            <input type="text" hidden name="enter_waitlist" value="1">
            <button class="btn btn-lg btn-primary btn-block my-4" type="submit">Dołącz</button>
        </form>
    <?php } ?>
    </div>
    <div class="col-4"></div>
</div>

<?php
require_once 'inc/footer.php';
?>