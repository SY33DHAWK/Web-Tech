<?php

session_start();

date_default_timezone_set("Asia/Dhaka");






if (isset($_POST['draft'])) {

    $_SESSION['draft'] = $_POST;

    $_SESSION['last_modified'] = date("m/d/Y h:i:s a");

}




if (isset($_POST['register'])) {

    $_SESSION['last_modified'] = date("m/d/Y h:i:s a");

    unset($_SESSION['draft']); // clear draft after final submit

}






$draft = $_SESSION['draft'] ?? [];

?>




<!DOCTYPE html>

<html>

<head>

    <title>Registration</title>

</head>




<body>




<h2>Registration</h2>




<?php

if (isset($_SESSION['last_modified'])) {

    echo "<b>Last modified on:</b> " . $_SESSION['last_modified'] . "<br><br>";

}

?>




<form method="post">




<table width="100%" cellspacing="10">

<tr>






<td width="33%" valign="top">

<fieldset>

<legend>General Information</legend>




<table cellspacing="5">

<tr>

<td>First Name</td>

<td><input type="text" name="fname" value="<?= $draft['fname'] ?? '' ?>"></td>

</tr>




<tr>

<td>Last Name</td>

<td><input type="text" name="lname" value="<?= $draft['lname'] ?? '' ?>"></td>

</tr>




<tr>

<td>Gender</td>

<td>

<input type="radio" name="gender" <?= (($draft['gender'] ?? '') == 'Male') ? 'checked' : '' ?>> Male

<input type="radio" name="gender" <?= (($draft['gender'] ?? '') == 'Female') ? 'checked' : '' ?>> Female

</td>

</tr>




<tr>

<td>Father's Name</td>

<td><input type="text" name="father" value="<?= $draft['father'] ?? '' ?>"></td>

</tr>




<tr>

<td>Mother's Name</td>

<td><input type="text" name="mother" value="<?= $draft['mother'] ?? '' ?>"></td>

</tr>




<tr>

<td>Blood Group</td>

<td>

<select name="blood">

<option <?= (($draft['blood'] ?? '') == 'A+') ? 'selected' : '' ?>>A+</option>

<option <?= (($draft['blood'] ?? '') == 'B+') ? 'selected' : '' ?>>B+</option>

<option <?= (($draft['blood'] ?? '') == 'O+') ? 'selected' : '' ?>>O+</option>

</select>

</td>

</tr>




<tr>

<td>Religion</td>

<td>

<select name="religion">

<option <?= (($draft['religion'] ?? '') == 'Islam') ? 'selected' : '' ?>>Islam</option>

<option <?= (($draft['religion'] ?? '') == 'Hindu') ? 'selected' : '' ?>>Hindu</option>

</select>

</td>

</tr>

</table>

</fieldset>

</td>






<td width="33%" valign="top">

<fieldset>

<legend>Contact Information</legend>




<table cellspacing="5">

<tr>

<td>Email</td>

<td><input type="email" name="email" value="<?= $draft['email'] ?? '' ?>"></td>

</tr>




<tr>

<td>Phone</td>

<td><input type="text" name="phone" value="<?= $draft['phone'] ?? '' ?>"></td>

</tr>




<tr>

<td>Website</td>

<td><input type="text" name="website" value="<?= $draft['website'] ?? '' ?>"></td>

</tr>




<tr>

<td>Address</td>

<td><textarea rows="3" cols="22"><?= $draft['address'] ?? '' ?></textarea></td>

</tr>




<tr>

<td>Post Code</td>

<td><input type="text" name="post" value="<?= $draft['post'] ?? '' ?>"></td>

</tr>

</table>

</fieldset>

</td>






<td width="33%" valign="top">

<fieldset>

<legend>Account Information</legend>




<table cellspacing="5">

<tr>

<td>Username</td>

<td><input type="text" name="username" value="<?= $draft['username'] ?? '' ?>"></td>

</tr>




<tr>

<td>Password</td>

<td><input type="password" name="password"></td>

</tr>




<tr>

<td>Confirm Password</td>

<td><input type="password" name="confirm"></td>

</tr>

</table>

</fieldset>

</td>




</tr>

</table>




<br>

<input type="submit" name="register" value="Register">

<input type="submit" name="draft" value="Save as Draft">




</form>




</body>

</html>