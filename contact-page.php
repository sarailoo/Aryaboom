<?php
/*
Template Name: contact us
*/
?>

<?php
if(isset($_POST['submitted'])) {
        if(trim($_POST['contactName']) === '') {
               $nameError = 'لطفا نام خود را وارد نمایید';
               $hasError = true;
        } else {
               $name = trim($_POST['contactName']);
        }
 
        if(trim($_POST['email']) === '')  {
               $emailError = 'لطفا آدرس ایمیل خود را وارد نمایید.';
               $hasError = true;
        } else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
               $emailError = 'آدرس ایمیل وارد شده صحیح نمی باشد';
               $hasError = true;
        } else {
               $email = trim($_POST['email']);
        }
 
        if(trim($_POST['comments']) === '') {
               $commentError = 'لطفا پیغام خود را وارد نمایید';
               $hasError = true;
        } else {
               if(function_exists('stripslashes')) {
                       $comments = stripslashes(trim($_POST['comments']));
               } else {
                       $comments = trim($_POST['comments']);
               }
        }
 
        if(!isset($hasError)) {
               $emailTo = get_option('tz_email');
               if (!isset($emailTo) || ($emailTo == '') ){
                       $emailTo = get_option('admin_email');
               }
               $subject = 'یک پیغام از طرف '.$name;
               $body = "نام فرستنده: $name \n\nایمیل نویسنده: $email \n\nپیغام: $comments";
               $headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
 
               wp_mail($emailTo, $subject, $body, $headers);
               $emailSent = true;
        }
 
} ?>
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
                    <i class="fa fa- fa-envelope "></i>
                  </div>
                  <div id="text-title">
                
					  <a href="<?php the_permalink() ?>"title="<?php the_title_attribute(); ?>"><h2><?php the_title(); ?></h2></a>
                  </div>
                      
            </div> <!-- END TITLE -->
            <div id="container">
               <div id="content">
          
               <div id="contact-text">
                  <i class="fa fa-phone"></i>
                  <div class="contact-box">
                    <div id="phone-text">تلفن</div>
                    <div id="phone-number">0215716571</div>
                  </div>
                  <i class="fa fa-fax"></i>
                  <div class="contact-box">
                    <div>فکس</div>
                    <div>0215716571</div>
                  </div>
                  <i class="fa fa-envelope"></i>
                  <div class="contact-box">
                    <div>ایمیل</div>
                   <div>info@aryaboom.ir</div>
                  </div>
                  <i class="fa fa-home"></i>
                  <div class="contact-box">
                    <div>
                   آ درس
                    <br/>
                    اردبيل، جاده قديم مشکين شهر، کيلومتر9، اراضي روستاي صومعه 
                   </div>
                 </div>
                </div> <!-- END CONTACT TEXT -->
                <div id="aria">ارسال پیام</div>
                <hr/>         
                 <div>
                  <?php if(isset($emailSent) && $emailSent == true) { ?>
                   <div>
                    </div>
                     <?php } else { ?>
                       <?php the_content(); ?> 
 <?php } ?>
</div><!-- .entry-content -->
 </div><!-- #content -->
 <div id="comment">
<form  action="<?php the_permalink(); ?>"method="post" id="commentform">

<p><input id="author" placeholder="نام و نام خانوادگی" type="text" name="contactName" 
value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>"/>
<label for="author"><small><?php if ($req) echo ""; ?></small></label></p>

<p><input placeholder="ایمیل" type="text" name="email"
    value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>"/>
<label for="email"><small><?php if ($req) echo ""; ?></small></label></p>

<p><textarea lang="fa" name="comment" id="comment"  cols="65%" rows="10" tabindex="4" class="comm"></textarea>
    <div>
        <button  id="send" name="submit" class="send" type="submit" id="submit" tabindex="5" value="ارسال" >ارسال
        <i class="fa fa-chevron-left" ></i>
        </button>
    </div>
</p>
</form>
</div>
</div><!-- #container -->
</div><!-- END UP POST -->
</div><!-- END POST -->
</div><!-- END POSTS -->
</div><!-- END NAV POST -->
</div><!-- END P-S -->
</div><!-- END POST-SIDE -->
    <?php get_footer(); ?> 