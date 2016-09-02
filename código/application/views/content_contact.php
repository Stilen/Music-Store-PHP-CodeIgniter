<div id="center" class="column">
	  	<div id="content">
			<a><br>Contact Us<br></a>
			<div id="contact">
				<?php
    
                $this->load->helper('form');
                echo form_open("main/send_contact");
    
                echo form_label("Name: ", "fullName");
                    $data = array(
                    "Name" => "name",
                    "id" => "name",
                    "value" => ""    
                );
                echo form_input($data);
    
                echo form_label("Email: ", "email");
                $data = array(
                    "Name" => "email",
                    "id" => "email",
                    "value" => ""    
                );
                echo form_input($data);
    
                echo form_label("Message: ", "message");
                $data = array(
                    "Name" => "message",
                    "id" => "message",
                    "value" => ""    
                );
                echo form_textarea($data);
        
                echo form_submit("contactSubmit", "Send!");
    
                echo form_close();

                ?>    
			</div>
            
		</div>
	  </div>

