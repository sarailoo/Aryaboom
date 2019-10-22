<?php
/*
Template Name: products
*/
?>
<?php get_header(); ?>
      <div id="select-single" class="col-12">
        <div id="selection">
          <div id="top-text">
            <span > ////////////////////////////////////////////////////////// </span>
            <?php single_cat_title(); ?>
            <span> ////////////////////////////////////////////////////////// </span>
          </div>
        </div>
      </div><!-- END SELECT  -->
      <div id="services" class="col-12">
        <div id="service">
      <?php

if ( have_posts() ) { ?>
      <?php

    while (have_posts() ): the_post(); ?>

   <div id="boxx">
   <a href="<?php the_permalink(); ?>"title="<?php the_title_attribute(); ?>">
    <?php the_post_thumbnail( 'thumbnail', array( 'alt' => get_the_title(),'title' => get_the_title() ) );    ?>
    </a> 
     <a href="<?php the_permalink(); ?>"title="<?php the_title_attribute(); ?>">
		 <span> <h2><?php the_title(); ?></h2></span>
      </a>
    </div>
    
         
         <?php

    endwhile; ?>

     <?php

    wp_reset_postdata();

}

?>
  </div> <!-- END BOXX -->
              </div> <!-- END SERVICE -->
  <div class="col-12" id="numeric-nav">
    <?php mrcode_numeric_posts_nav(); ?>
  </div> <!-- END SERVICES -->
<?php get_footer(); ?>