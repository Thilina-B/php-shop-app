<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Login</title>
    <!-- <link href="assets/styles/css/styles.css" rel="stylesheet"> -->
    <link href="<?php echo base_url(); ?>assets/styles/css/styles.css" rel="stylesheet">

</head>

<body>
    <div class="login_box">
        <img src="assets/images/avatar.png" class="avatar">
        <h1>Login Here</h1>
        <?php echo form_open('Admin/login'); ?>
        <p>Email</p>
        <input type="text" name="email" placeholder="Enter Email">
        <?php echo form_error('email'); ?>
        <p>Password</p>
        <input type="password" name="password" placeholder="Enter Password">
        <?php echo form_error('password'); ?>
        <input type="submit" name="submit" value="Login">
        <?php echo $this->session->flashdata('login_error'); ?>
        <?php form_close(); ?>
    </div>
</body>

</html>