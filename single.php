<?php get_header(); ?>
			<div id="select-single" class="col-12">
				<div id="selection">
					<div id="top-text">
						<h2><?php the_title();?></h2>
					</div>
				</div>
			</div><!-- END SELECT  -->
		<div id="post-side" class="col-12">
				<div class="col-12" id="p-s">
			<?php get_sidebar(); ?>
<div class="col-8" id="posts">    
	 <?php if(have_posts()) : ?>
     <?php while(have_posts()) : the_post(); ?>
      <?php setPostViews(get_the_ID());?>
        <div id="post">
       		<div id="up-post">
            	<div id="title">
             		<div id="title-icon">
                		<i class="fa fa- fa-pencil-square-o "></i>
                	</div>
                	<div id="text-title">
           	 		
                    <a href="<?php the_permalink() ?>"title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
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
                <?php the_post_thumbnail( 'thumbnail', array( 'alt' => get_the_title(),'title' => get_the_title() ) );  ?>
                	
                <?php the_content(); ?>
               
                </div><!-- END CONTENT -->

        </div><!-- END UP-POST -->
      <?php endwhile; ?>
      <?php endif; ?>
      </div><!-- END POST -->
            <div id="comment">
            <?php comments_template();?>
            </div>
    </div>
			</div><!-- END NAV-POST -->

 				</div><!-- END P-S  -->
 		</div><!-- END POST-SIDE  -->
    <?php get_footer(); ?> 