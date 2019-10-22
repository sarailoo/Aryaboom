<?php get_header(); ?>

			<div class="col-12">
					<div id="containerr">
  <div class="content" data-slide="2" data-bg="<?php echo get_template_directory_uri();?>/Images/slide1.jpg">
    <div class="info-wrapper" style="background: linear-gradient(135deg, rgba(0, 0, 93, 0.7), rgba(118, 255, 3, 0.5));">
      <div id="slidebox">
      <h3 class="slidetitle">مشارکت در طرح های بهینه سازی نیروگاه ها </h3>
    </div>
    </div>
    <div class="bottom-divider"></div>
  </div>
  <div class="content" data-slide="4" data-bg="<?php echo get_template_directory_uri();?>/Images/slide2.jpg">
    <div class="info-wrapper" style="background:linear-gradient(135deg, rgba(105, 17, 0, 0.7), rgba(41, 121, 255, 0.5));">
      <h3 class="slidetitle">سرمایه گذاری در تأسیسات تولید و توزیع برق و انرژی</h3>
    </div>
    <div class="bottom-divider"></div>
  </div>
  <div class="content" data-slide="5" data-bg="<?php echo get_template_directory_uri();?>/Images/slide3.jpg">
    <div class="info-wrapper" style="background: linear-gradient(135deg, rgb(111, 138, 157), rgb(78, 109, 114));">
      <h3 class="slidetitle">مشارکت در زمینه انرژی های تجدیدپذیر </h3>
    </div>
    <div class="bottom-divider"></div>
  </div>
  <div class="content" data-slide="8" data-bg="<?php echo get_template_directory_uri();?>/Images/slide4.jpg">
    <div class="info-wrapper" style="background: linear-gradient(135deg, rgb(255, 204, 84), #ec1b1b)">
      <h3 class="slidetitle"> مشارکت در اجرای طرح های مرتبط با صنعت برق </h3>
    </div>
    <div class="bottom-divider"></div>
  </div>
</div>
			</div>
      <!-- END SLIDER -->
			<div id="select" class="col-12">
				<div id="selection">
          <div id="triangle"></div>
					<div id="top-text">
						<span id="span1"> ////////////////////////////////////////////////////////// </span> پروژه های خود را به ما بسپارید <span> ////////////////////////////////////////////////////////// </span>

					</div>
					<div id="circles" class="col-12">
						<div id="ccc">
              <a href="<?php echo esc_url( home_url() );?>/category/خدمات"title="خدمات">
							<span id="circle-1" class="col-2 cir">
							<i class="fa fa-cog"></i>
								<span id="t1" class="cir-text">خدمات</span>
				  			</span>
              </a>
              <a href="<?php echo esc_url( home_url() );?>/category/محصولات"title="محصولات">
							<span id="circle-2" class="col-2 cir">
							<i class="fa fa-cube"></i>
							<span id="t2" class="cir-text">محصولات</span>
				  			</span>
              </a>
              <a href="<?php echo esc_url( home_url() );?>/category/پروژه-ها"title="پروژه ها">
							<span id="circle-3" class="col-2 cir">
							<i class="fa  fa-pencil-square-o"></i>
								<span id="t3" class="cir-text">پروژه ها</span>
				  			</span>
              </a>
						</div>
					</div>
					<div id="details" class="col-12">
						<div id="det">
                <span>
							حوزه فعالیت این شرکت طراحی، مهندسی و ساخت انواع سیستم های کنترل و حفاظت توربین های گاز و بخار، اتاق فرمان مرکزی نیروگاه ها، سیستم های کنترل گسترده نیروگاه های سیکل ترکیبی، سیستم های
 حفاظت و تحریک ژنراتور و سیستم های حفاظت و کنترل مجموعه های نفت و گاز و پتروشیمی و … تعریف شده است که در حال حاضر محصولات خود را تحت لیسانس زیمنس آلمان و ABB سوئیس تولید می‌نماید.
            </span>
						  <a href="<?php echo esc_url( home_url() );?>/about-us">
              <div id="more" >
                <i class="fa fa-chevron-left"></i>
			  </div>
              </a>
						</div>
					</div>
				</div>

			</div><!-- END SELECT  -->
			<?php include 'sem-slide.php' ?>
			<div id="news" class="col-12">
			 <div id="new">

      <div id="news-text"><i class="fa fa-navicon"></i>تازه ها</div>
      <hr/>
<?php 
if(have_posts())
{
  while (have_posts()) : the_post();  ?>
  <?php  if ( has_post_thumbnail()) { ?>
    <div class="post">
      <a href="<?php the_permalink();?>"title="<?php the_title_attribute(); ?>">
      <?php the_post_thumbnail( 'thumbnail', array( 'alt' => get_the_title(),'title'=>get_the_title() ) ); ?>
      </a>
          <a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>">
          <span class="status">
              <span class="title"><h2><?php the_title(); ?></h2></span>
              <i class="fa fa-chevron-left"></i>
              <span class="ex"><?php the_content_rss('', TRUE, '', 15); ?></span>
          </span>
          </a>
          
        </div>

  <?php  } ?>
<?php endwhile; ?>
    <?php  } ?>
</div>
 <div id="numeric-nav">
    <?php mrcode_numeric_posts_nav(); ?>
  </div>
  </div><!-- END NEWS  -->
<?php get_footer(); ?> 