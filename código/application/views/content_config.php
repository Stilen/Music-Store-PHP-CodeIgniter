<div id="center" class="column">
	  	<div id="content">
			<a><br>Insert New Item<br></a>
            
            <?php
                echo form_open_multipart('main/submit_product');
                echo "<p>Name: ";
                echo form_input('name',$this->input->post('name'));
                echo "</p>";
                echo "<p>Price: ";
                echo form_input('price', $this->input->post('price'));
                echo "</p>";
                echo "<p>Category: ";
                echo form_input('category', $this->input->post('category'));
                echo "</p>";
                echo "<p>Description: ";
                echo form_input('description', $this->input->post('description'));
                echo "</p>";
                echo "<p>";
                echo form_upload('userfile');
                echo "</p>";
                echo "<p>";
                echo form_submit('product_submit','Add Product');
                echo "</p>";
                echo "<p>";
                echo form_close();
                echo "</p>";
            ?>
            <br>
            
            <a href="<?php echo base_url('main/view_orders'); ?>"><br>View Orders<br></a>
            
            <a href="<?php echo base_url('main/view_messages'); ?>"><br>View User Messages<br></a>
            
            <a><br>Edit Items:<br></a>
			<div class="stuff">
				<?php foreach($results as $row) : ?>
                <div class="item">
					<img src="<?php echo base_url('images/'. $row['image']); ?>" style="width:150px;"/>
					<a href="<?php echo base_url('main/product/'. $row['id']); ?>" class="name"><?php echo $row['name']; ?></a>
					<span>&euro;<?php echo $row['price']; ?></span>
                    <?php
                    echo form_open('main/edit_product/'. $row['id']);
                    echo "<p>";
                    echo form_input('price', $this->input->post('price'));
                    echo "</p>";
                    echo "<p>";
                    echo form_submit('price_submit','New Price');
                    echo "</p>";
                    echo "<p>";
                    echo form_close();
                    echo "</p>";
                    ?>
					                        
                    <a href="<?php echo base_url('main/delete_product/'.$row['id']); ?>"><img src="<?php echo base_url(); ?>images/delete.png"                          alt="" width="20" height="20"/></a>
				</div>
                <?php endforeach; ?>
			</div>
            
		</div>
	  </div>