<div id="center" class="column">
	  	<a href="#" class="banner"><img src="<?php echo base_url().'images/'. $results[0]['category']; ?>" alt="" width="572" height="236" /></a><br />
	  	<div id="content">
			<a><br><?php echo ucfirst($results[0]['category']); ?><br></a>
			<div class="stuff">
				<?php foreach($results as $row) : ?>
                <div class="item">
					<img src="<?php echo base_url('images/'. $row['image']); ?>" style="width:150px;"/>
					<a href="<?php echo base_url('main/product/'. $row['id']); ?>" class="name"><?php echo $row['name']; ?></a>
					<span>&euro;<?php echo $row['price']; ?></span>
					<a href="<?php echo base_url('main/add/'. $row['id']); ?>"><img src="<?php echo base_url(); ?>images/cart.png" alt="" width="20" height="20"/></a>
				</div>
                <?php endforeach; ?>
			</div>
            
		</div>
	  </div>