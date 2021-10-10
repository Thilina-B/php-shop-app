<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Food Zity Customer Registration</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link href="<?php echo base_url(); ?>assets/styles/css/customer/register.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="title">Registration Form</div>
        <?php echo $this->session->flashdata('register_error'); ?>
        <div class="form">
            <?php echo form_open('Customer/register_user'); ?>
            <div class="input_field">
                <label>First Name</label>
                <input type="text" name="first_name" class="input">
            </div>
            <?php echo form_error('first_name'); ?>

            <div class="input_field">
                <label>Last Name</label>
                <input type="text" name="last_name" class="input">
            </div>
            <?php echo form_error('last_name'); ?>

            <div class="input_field">
                <label>Address</label>
                <textarea name="address" class="textarea"></textarea>
            </div>
            <?php echo form_error('address'); ?>

            <div class="input_field">
                <label>Email Address</label>
                <input type="text" name="email" class="input">
            </div>
            <?php echo form_error('email'); ?>

            <div class="input_field">
                <label>Password</label>
                <input type="password" name="password" class="input">
            </div>
            <?php echo form_error('password'); ?>

            <div class="input_field">
                <label>Confirm Password</label>
                <input type="password" name="passconf" class="input">
            </div>
            <?php echo form_error('passconf'); ?>

            <div class="input_field">
                <label>Phone Number</label>
                <input type="text" name="phone_number" class="input">
            </div>
            <?php echo form_error('phone_number'); ?>

            <div class="input_field">
                <input type="submit" value="Register" class="btn">
            </div>

            <div class="text">Already have an account? <a href="">Login Here</a></div>
        </div>
        <?php form_close(); ?>
    </div>
</body>

</html>