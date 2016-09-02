<div id="right" class="column">
		<div class="rightblock">
						            
            <div class="blocks">
				
                <div id="cartbox">
                    <a href="<?php echo base_url('main/show/'); ?>"><h2>Shopping Cart</h2></a>
                    <br>
                    <ul>
                        <li>Total</li>
                        <br>
                        <li>&euro;<?php echo $this->cart->total(); ?></li>
                        <br><br>
                        <a href="<?php echo base_url('main/checkout'); ?>"><li><button>Checkout</button></li></a>
                    </ul>
                </div>
                
				<div id="news">
					
					<h2>About Music Store</h2><br>
			<p>Welcome to Music Store! Here we have a wide selection of the best products for you, at the best prices. From guitars, to DJ stuff, we have everything you might be looking for. If you need some help, just contact us, we'll be glad to help you.<br /></p>
					<a href="<?php echo base_url('main/about'); ?>" class="more">read more</a>
                    
                    
				</div>
                <?php if ($this->session->userdata('is_logged_in')==1 || $this->session->userdata('is_admin_in')==1){?>
                    <a href="<?php echo base_url('main/logout')?>"><button>Logout</button></a>
                <?php }
				?>
			</div>
        
            
    </div>
</div>