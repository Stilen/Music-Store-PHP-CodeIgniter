<div id="menu">
    <div id="nav">
        <ul>
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li><a href="<?php echo base_url(); ?>main/login">Login</a></li>
            <li><a href="<?php echo base_url(); ?>main/signup">Register</a></li>
            <li><a href="<?php echo base_url(); ?>main/contact">Contact Us</a></li>
            <li><a href="<?php echo base_url(); ?>main/about">About</a></li>
            <?php if ($this->session->userdata('is_admin_in')){ ?>
                <li><a href="<?php echo base_url(); ?>main/config">Configurations</a></li>"
            <?php } ?>  
        </ul>
    </div>
    
<div id="container">
    