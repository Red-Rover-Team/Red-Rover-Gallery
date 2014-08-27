<?php require_once('includes/header.php'); ?>


<section class="panel">
	<header>
		<h2>Categories</h2>
	</header>
	<div>
		<?php 
			$cat_count = count($categories);
			for($i = 0; $i < $cat_count; $i++) {
				
				if( $i % 2 == 0 ) : ?>
					<div class="row">
				<?php endif; ?>		
		    	
		    	<div class="6u">
		    		<a href="albumList.php?cat=<?=$categories[$i]?>" class="image fit">
		    			<img src="img/<?=$categories[$i]?>.jpg" alt="<?=$categories[$i]?>" />
		    		</a>
		    	</div>
				
				<?php if( $i % 2 != 0 || $i == $cat_count - 1 ) : ?>
					</div>
				<?php endif;
			} 
		?>
	</div>
</section>


<?php require_once('includes/footer.php');
