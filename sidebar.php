<div id="nav-post">
  <div class="col-3"id="nav">
    <div id="cat">
      <div id="up-cat">
        <div id="text-cat">
        دسته بندی
        </div>
        <hr id="hr1" />
        <hr id="hr2" />
      </div> <!-- END UP CAT -->
      <div id="down-cat">
      <?php  wp_list_categories();?>
      </div>
    </div> <!-- END CAT -->

    <div id="cat">
      <div id="up-cat">
        <div id="text-cat">
        مطالب تصادفی
        </div>
        <hr id="hr1" />
        <hr id="hr2" />  
      </div><!-- END UP CAT -->
      <div id="down-cat">
        <ul>
       <?php $recent = new WP_Query("orderby=rand&showposts=6");
        while($recent->have_posts()) : $recent->the_post();?>
          <li><a alt="<?php the_title(); ?>" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"title="<?php the_title_attribute(); ?>">
          <?php the_title(); ?>
          </a></li>
        <?php endwhile; ?>
        </ul>
            
      </div><!-- END Down CAT -->
    </div><!-- END CAT -->
    <div id="cat">
      <div id="up-cat">
        <div id="text-cat">
        آخرین پروژه ها
        </div>
        <hr id="hr1" />
        <hr id="hr2" />
      </div><!-- END UP CAT -->
      <div id="down-cat">
        <?php
        //* The Query
        $exec_query = new WP_Query("orderby=rand&showposts=6&cat=3");
        //* The Loop
        if ( $exec_query->have_posts() ) { ?>
          <ul>
        <?php
        while ( $exec_query->have_posts() ): $exec_query->the_post(); ?>
          <li> <a href="<?php the_permalink(); ?>"title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
        <?php
        endwhile; ?>
          </ul>
     <?php wp_reset_postdata(); }?>          
                </div> <!-- END DOWN CAT -->
    </div><!-- END CAT -->
  </div><!-- END NAV -->
