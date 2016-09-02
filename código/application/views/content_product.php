<div id="center" class="column">
	  	<div id="content">
			<?php 
        foreach($results as $row) :{
        $id = $row->id;
        $name = $row->name;
        $price = $row->price;
        $image = $row->image;
        $text = $row->description;
    }
    endforeach; ?>
    <div id="contentItem" class="item">
        <img src="<?php echo base_url('images/'. $image); ?>" style="width:400px;" />
		<a href="<?php echo base_url('main/product/'. $id); ?>" class="name"><?php echo $name; ?></a>
		<span>&euro;<?php echo $price; ?></span>
		<a href="<?php echo base_url('main/add/'. $id); ?>"><img src="<?php echo base_url(); ?>images/cart.png" alt="" width="30" height="30"/></a>
    </div>
    <div id="ctext">
        <p><?php echo $text; ?></p>
    </div>
            
		</div>
	  </div>