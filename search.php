<?php get_header(); ?>
			<div id="select-single" class="col-12">
				<div id="selection">
					<div id="top-text">
					جستجو :	<?php printf(the_search_query());?>
					</div>
				</div>
			</div><!-- END SELECT  -->
		<div id="post-side" class="col-12">
				<div id="p-s">
			<?php get_sidebar(); ?>
<div class="col-8"  id="posts">    
	 <?php if(have_posts() && get_search_query()) : ?>
     <?php while(have_posts()) : the_post(); ?>
        <div id="post">
       		<div id="up-post">
            	<div id="title">
             		<div id="title-icon">
                	<i class="fa fa- fa-pencil-square-o "></i>
                </div>
                <div id="text-title">
					<a href="<?php the_permalink() ?>"title="<?php the_title_attribute(); ?>"><h2><?php the_title(); ?></h2></a>
                </div>   	
              </div>
               <div id="content">
                  <div id="text-cat">
    
                    <div><i class="fa fa-folder"></i>
                       دسته بندی:
                    </div>
                        <?php the_category(); ?>
                    
                        <div>
                        <i class="fa fa-file"></i>
                       <?php the_time('d M Y'); ?>
                        </div>

                        <div>
                        <i class="fa fa-user"></i>
                       <?php echo getPostViews(get_the_ID());?>
                        </div>


                    </div>
                		<hr/> 
                <?php the_post_thumbnail( 'thumbnail', array( 'alt' => get_the_title(),'title'=> get_the_title() ) );  ?> 
                <?php the_excerpt(); ?>
               <a href="<?php the_permalink() ?>"title="<?php the_title_attribute(); ?>"> <div id="perma">ادامه مطلب</div> </a>
               
                </div> <!-- END CONTENT -->
        </div><!--  END UP POST -->
      </div> <!-- END POST -->
      <?php endwhile; ?>
      <div id="numeric-nav">
    <?php mrcode_numeric_posts_nav(); ?>
  </div> <!-- END POSTS -->
      <?php endif; ?>
      <?php if(!get_search_query()) echo '<div id="search-t">شما عبارتی را برای جستجو وارد نکردید !</div>'; ?>
      <?php if(!have_posts()) echo '<div id="search-t">نتیجه ای برای جستجوی شما یافت نشد !</div>'; ?>
      
      </div>
      
    </div>

 				</div><!-- END P-S  -->
 		</div><!-- END POST-SIDE  -->
    <?php get_footer(); ?> 
 