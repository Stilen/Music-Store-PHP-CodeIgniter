<div id="center" class="column">
	  	<a href="#" class="banner"><img src="<?php echo base_url().'images/signup.jpg'?>" width="572" /></a><br />
	  	<div id="content">
			<a><br>Sign Up<br></a>
			<div class="stuff">
                
            <?php
                echo form_open('main/signup_validation');
                echo validation_errors();
                echo "<p>Name: ";
                echo form_input('name',$this->input->post('name'));
                echo "</p>";
                echo "<p>Email: ";
                echo form_input('email', $this->input->post('email'));
                echo "</p>";
                echo "<p>Address: ";
                echo form_input('address', $this->input->post('address'));
                echo "</p>";
                echo "<p>Password: ";
                echo form_password('password');
                echo "</p>";
                echo "<p>Confirm Password: ";
                echo form_password('cpassword');
                echo "</p>";
                echo "<p>";
                echo form_submit('signup_submit','Sign Up');
                echo "</p>";
            ?>
                <br><a href='<?php echo base_url('main/login')?>'>Already have an account? Login</a><br><br>
				
			</div>
            
		</div>
	  </div>