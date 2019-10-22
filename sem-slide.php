<div id="slide" class="col-12" >
			
	<div id="slider">
	<section class="center slider">
			<?php

//* The Query
$exec_query = new WP_Query( array (
  'posts_per_page' => 10 ,
  'cat'=> 3
) );

//* The Loop
if ( $exec_query->have_posts() ) { ?>

      

      <?php

    while ( $exec_query->have_posts() ): $exec_query->the_post(); ?>
   <div>
    <a href="<?php the_permalink(); ?>"title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail
		( 'project', array( 'alt' => get_the_title(),'title'=> get_the_title() ) );   ?></a>
				     <span> <a href="<?php the_permalink(); ?>"title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></span>
						
				    </div>
     
         
         <?php

    endwhile; ?>

     <?php

    //* Restore original Post Data
    wp_reset_postdata();

}

?>
	  </section>		
				
		</div>
			</div><!-- END SLIDE  -->
			