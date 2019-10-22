<?php
/*
Template Name: about us
*/
?>
<?php get_header(); ?>
      <div id="select-single" class="col-12">
        <div id="selection">
          <div id="top-text">
            <span > ////////////////////////////////////////////////////////// </span>
            <?php the_title(); ?>
            <span> ////////////////////////////////////////////////////////// </span>
          </div>
        </div>
      </div><!-- END SELECT  -->
    <div id="post-side" class="col-12">
        <div class="col-12" id="p-s">
      <?php get_sidebar(); ?>
<div class="col-8" id="posts">    
        <div id="post">
          <div id="up-post">
              <div id="title">
                <div id="title-icon">
                    <i class="fa fa- fa-pencil-square-o "></i>
                  </div>
                  <div id="text-title">
                
					  <a href="<?php the_permalink() ?>"title="<?php the_title_attribute(); ?>"><h2><?php the_title(); ?></h2></a>
                  </div>
                      
            </div> <!-- END TITLE -->
            <div id="container">
               <div id="content" class="about">
               <div id="about-text">
                  <div id="text">اگر نگاهي به اطرافمان بيندازيم، انبوهي از وسايل برقي را خواهيم ديد. امروزه زندگي بدون وسايل الكتربكي غير ممكن شده است. پس براي استقلال و همگامي با رشد جهاني نيازمند متخصصاني هستيم كه با اندوختن توشه علمي به كسب تكنولوژيهاي جديد اقدام كنند
 با نگاهي اجمالي به صنعت در مي يابيم كه در ابتدا (از رنسانس با قرن بيستم) تمام ابزارها و صنايع، مكانيكي بوده اند و مهندسي عموماً به طراحي و ساخت اين وسايل مكانيكي اطلاق مي شد، اما با به كارگيري الكتريسيته در صنايع، از حجم ابزارها و دستگاهها كاسته شد و صنايع پيچيده تر گرديد</div>
                  <img alt="آریابوم" title="آریابوم" src="<?php bloginfo('siteurl'); ?>/wp-content/themes/Aryaboom/Images/logo.png"/>
                </div>
                <div id="aria">مجموعه آریا بوم</div>
                 <hr/>
                      <div id="slide2">
      <div id="slider2">
  <section class="center slider">
      <?php

//* The Query
$exec_query = new WP_Query( array (
   'posts_per_page' => 100 ,
  'cat'=> 5
) );

//* The Loop
if ( $exec_query->have_posts() ) { ?>

      

      <?php

    while ( $exec_query->have_posts() ): $exec_query->the_post(); ?>
   <div>
   <a href="<?php the_permalink(); ?>"title="<?php the_title_attribute(); ?>"> <?php the_post_thumbnail( 'thumbnail', array( 'alt' => get_the_title(),'title' => get_the_title() ) );    ?></a>
             <span> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
            </div>
     
         
         <?php

    endwhile; ?>

     <?php

    //* Restore original Post Data
    wp_reset_postdata();

}

?>
    </section>    
    </div><!-- END SLIDER2  -->
      </div><!-- END SLIDE2  -->


 
</div><!-- #content -->
</div><!-- END CONTAINER -->
</div><!-- END UP POST -->
</div><!-- END POST -->
</div><!-- END POSTS -->
</div><!-- END NAV POST-->
</div><!-- END P-S -->
    <?php get_footer(); ?> 