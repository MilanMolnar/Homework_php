
<h1 style="text-align: center; font-size: xx-large;margin-top: 1em;font-family: Arial, sans-serif; font-weight: bolder">Falatozz.hu Homework</h1>
<div style="text-align: center;min-height: 300px; margin-top: 3em; border: solid 1px black; width: 300px; margin-left: calc(50% - 150px)">
    <?php

    if (isset($_POST['submit'])) {

        //collect form data
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        //check phone number is valid
        if(!filter_var($phone, FILTER_SANITIZE_NUMBER_INT))
        {
            $error[] = 'Invalid Phone number!';
        }

        //check for a valid email address
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error[] = 'Please enter a valid email address';
        }

        //if no errors carry on
        if (!isset($error)) {
            echo "<p style='color:#5ae23e'>Data saved !</p>";
            $csvFile = "users.csv";
            $file_open = fopen($csvFile, 'a') or die("Cant open file");
            $stringData = $phone . ','. $email .  "\n";
            fwrite($file_open, $stringData);
        }
    }
    //if their are errors display them
    if (isset($error)) {
        foreach ($error as $error) {
            echo "<p style='color:#ff0000'>$error</p>";
        }
    }
    ?>

<form action='' method='post'>
    <p><label>Phone</label><br><input type='text' name='phone' value=''></p>
    <p><label>Email</label><br><input type='text' name='email' value=''></p>
    <p><input type='submit' name='submit' value='Submit'></p>
</form>
</div>