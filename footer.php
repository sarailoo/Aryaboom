  <div id="footer" class="col-12">
  <div id="foots">
    <div id="foot1" class="col-4">
      <i class="fa fa-navicon"></i>
      <h3><div class="title">اخبار سایت</div></h3>
      <hr class="col-4"/>
      <ul>
<?php $recent = new WP_Query("orderby=rand&showposts=4&cat=2"); while($recent->have_posts()) : $recent->the_post();?>
<li><a alt="<?php the_title(); ?>" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"title="<?php the_title_attribute(); ?>">
<?php the_title(); ?>
</a></li>
<?php endwhile; ?>
</ul>
    </div>
    <div id="foot2" class="col-4">
      <i class="fa fa-wrench"></i>
      <h3><div class="title">آخرین پروژه های کاری</div></h3>
      <hr class="col-4"/>
<?php

//* The Query
$exec_query = new WP_Query("showposts=4&cat=3");

//* The Loop
if ( $exec_query->have_posts() ) { ?>

      
<ul>
      <?php

    while ( $exec_query->have_posts() ): $exec_query->the_post(); ?>
  <div>
     <li> <a href="<?php the_permalink(); ?>"title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
            
            </div>        
         <?php

    endwhile; ?>
</ul>
     <?php

    //* Restore original Post Data
    wp_reset_postdata();

}

?>        
    </div>
    <div id="foot3" class="col-4">
      <i class="fa fa-user"></i>
      <h3><div class="title">درباره ما</div></h3>
      <hr class="col-4"/>
      <img alt="تماس با ما" title="تماس با ما" src="<?php bloginfo('siteurl'); ?>/wp-content/themes/Aryaboom/Images/contact.png"/>
      <div id="txt1">
      <br/>
      تماس با شرکت
      <br/>
      <div id="tell">
      89 67 345 0912
      </div>
      </div>
      <div id="txt2">
      <br/>
حوزه فعالیت این شرکت طراحی، مهندسی و ساخت انواع سیستم های کنترل
 و حفاظت توربین های گاز و بخار، اتاق فرمان مرکزی نیروگاه ها، سیستم های
 کنترل گسترده نیروگاه ها است...
      </div>
    </div>
    </div>
  </div><!-- END FOOTER  -->
    <div id="redline" class="col-12">
      <div>
  <a href="<?php echo esc_url( home_url() );?>" title="Aryaboom">آریا بوم</a>
   <a target="_blank" href="http://www.sarailoo.ir/" title="sarailoo.ir">طراحی سایت</a>
    </div>
  </div><!-- END REDLINE  -->   
<p id="back-top">
<a href="#top"><span></span></a>
</p>
    </div> <!-- END MAIN  -->

</body>
</html>