<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Food Zity Login</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link href="<?php echo base_url(); ?>assets/styles/css/customer/style.css" rel="stylesheet">

    <!--Fontawesome CDN Link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
</head>

<body>
    <div class="container">
        <?php echo form_open('Customer/login'); ?>
        <div class="form_content">
            <div class="login_form">
                <div class="title">Login</div>
                <div class="input_boxes">
                    <div class="input_box">
                        <i class="fas fa-envelope"></i>
                        <input type="text" name="email" placeholder="Enter your email">
                    </div>
                    <?php echo form_error('email'); ?>

                    <div class="input_box">
                        <i class="fa fa-key"></i>
                        <input type="password" name="password" placeholder="Enter your password">
                    </div>
                    <?php echo form_error('password'); ?>

                    <div class="button input_box">
                        <input type="submit" name="submit" value="Submit">
                    </div>
                    <?php echo $this->session->flashdata('login_error'); ?>
                    <div class="text">Don't have an account? <a href="<?php echo base_url(); ?>Customer/register">Register Here</a> </div>
                </div>
            </div>
        </div>
        <?php form_close(); ?>
    </div>
</body>

</html>