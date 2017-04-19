<div class="portfolio_navigation">
	<div class="portfolio_prev">
		<div class="portfolio_prev_text">
		<?php
			if(get_previous_post() != ""){
				$previous_post = get_previous_post();
				echo '<h4>'.$previous_post->post_title.'</h4>'; 
				echo '<span>';
				$terms = wp_get_post_terms($previous_post->ID,'portfolio_category');
				$counter = 0;
				$all = count($terms);
				foreach($terms as $term) {
					$counter++;
					if($counter < $all){ $after = ', ';}
					else{ $after = ''; }
					echo $term->name.$after;
				}
				echo '</span>';
			}	
		?>
		</div>
		<div class="portfolio_prev_thumb">
			<?php 
				if(get_previous_post() != ""){ 
					echo get_the_post_thumbnail($previous_post->ID, 'page_image' );
					previous_post_link('%link', '<i class="fa fa-angle-left"></i>');
				}
			?>
		</div>
	</div>
	<?php if(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true) != ""){ ?>
		<div class="portfolio_button"><a href="<?php echo get_permalink(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true)); ?>"><i class="fa fa-th"></i></a></div>
	<?php } ?>								
	<div class="portfolio_next">
		<div class="portfolio_next_text">
			<?php
				if(get_next_post() != ""){
					$next_post = get_next_post();  
					echo '<h4>'.$next_post->post_title.'</h4>';
					echo '<span>';
					$terms = wp_get_post_terms($next_post->ID,'portfolio_category');
					$counter = 0;
					$all = count($terms);
					foreach($terms as $term) {
						$counter++;
						if($counter < $all){ $after = ', ';}
						else{ $after = ''; }
						echo $term->name.$after;
					}
					echo '</span>';
				}
			?>
		</div>
		<div class="portfolio_next_thumb">
			<?php 
				if(get_next_post() != ""){
					echo get_the_post_thumbnail($next_post->ID, 'page_image');
					next_post_link('%link','<i class="fa fa-angle-right"></i>');
				}
			?>	
		</div>
	</div>
</div>