<div id="center" class="column">
	  	<div id="content">
			<a><br>User Messages<br></a>
			<div class="stuff">
				<?php foreach($results as $row) : ?>
                <div id="message">
                    <ul>
                        <li><b>Name: <?php echo $row['name']; ?></b><br></li>
                        <br>
                        <li>Email: <?php echo $row['email']; ?></li>
                        <br>
                        <li>Message: <?php echo $row['message']; ?></li>
                        <br><hr>					       
                    </ul>
				</div>
                <?php endforeach; ?>
                <br><a href='<?php echo base_url('main/config')?>'>Back</a><br><br>
			</div>  
		</div>
	  </div>