<div id="center" class="column">
	  	<div id="content">
			<a><br>Orders<br></a>
			<div class="stuff">
				<?php foreach($results as $row) : ?>
                <div id="deliveries">
                    <ul>
                        <li><b>Email: <?php echo $row['email']; ?></b></li>
                        <br>
                        <li><b>Total: <?php echo $row['total']; ?></b></li>
                        <br>
                        <li><b>Address: <?php echo $row['address']; ?></b></li>
                        <br>
                        <hr>
                        <?php foreach(unserialize($row['cart']) as $item): ?>
                        <li>Product name: <?php echo $item['name']; ?></li>
                        <br>
                        <li>Price: <?php echo $item['price']; ?></li>
                        <br>
                        <li>Quantity: <?php echo $item['qty']; ?></li>
                        <br>
                        <li>Subtotal: <?php echo $item['subtotal']; ?></li>
                        <br>
                        <hr>
                        <?php endforeach; ?>
                        <hr>
                    </ul>
				</div>
                <?php endforeach; ?>
                
                <br><a href='<?php echo base_url('main/config')?>'>Back</a><br><br>
			</div>
            
		</div>
	  </div>