<div id="center" class="column">
	  	<a href="#" class="banner"><img src="<?php echo base_url('images/piano.jpg'); ?>" alt="" widli="572" height="236" /></a><br />
	  	<div id="content">
			<a><br>Shopping Cart<br></a>
			<div class="stuff">
                    <ul id="cart">
                    <?php $cart = $this->cart->contents(); ?>
                    <?php foreach($cart as $item): ?>
                        <li>Item name: <?php echo $item['name']; ?></li>
                        <li>Quantity: <?php echo $item['qty']; ?></li>
                        <li>Price: <?php echo $item['subtotal']; ?><?php echo anchor('main/remove/'.$item['rowid'], '  x')?></li>
                    <?php endforeach; ?>
                        <li><b>Total</b></li>
                        <li><b>&euro;<?php echo $this->cart->total(); ?></b></li>
                    <br><br>
                    <a href="<?php echo base_url('main/checkout'); ?>"><li><button>Checkout</button></li></a>
                    </ul>
                
			</div>
            
		</div>
	  </div>