

<div id="center" class="column">
	  	<a href="#" class="banner"><img src="<?php echo base_url().'images/signup.jpg'?>" width="572" /></a><br />
	  	<div id="content">
			<a><br>Login<br></a>
			<div class="stuff">

                <?php
                echo form_open('main/login');
                echo validation_errors();
                echo "<p>Email:<br>";
                echo form_input('email', $this->input->post('email'));
                echo "</p>";
                echo "<p>Password:<br>";
                echo form_password('password');
                echo "<br></p>";
                echo "<p>";
                echo form_submit('login_submit', 'Login');
                echo "</p>";
                echo form_close();
                ?>

                <br><a href='<?php echo base_url('main/signup')?>'>Don't have an account? Register here</a><br><br>
			</div>
            
		</div>
	  </div>