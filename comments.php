<?php if ( have_comments() ) : ?>
	 <i class="fa fa-comment"></i>
    <div id="text1">
    <span id="cm-number">
    <?php comments_number(); ?>
    </span>
    <span id="text1-1">ارسال شده است </span>
    <div id="text1-2">شما هم نظر خود را ارسال کنید</div>
    </div>
    <?php else :  ?>
    <i class="fa fa-comment"></i>
    <div id="text1">
    <span id="cm-number">
    <?php comments_number(); ?>
    </span>
    <span id="text1-1"> </span>
    <div id="text1-2">اولین نظر را شما ارسال کنید</div>
    </div>
    <?php endif; ?>
	<div id="cm">
<div class="commm">


<?php if ( have_comments() ) : ?>

	<ul class="commentlist">
   
	<?php wp_list_comments(); ?>
	</ul>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">ديدگاه بسته شده است.</p>

	<?php endif; ?>
<?php endif; ?>
</div>
<div class="border2">
<?php if ('open' == $post->comment_status) : ?>

<div id="respond">
<?php if ( have_comments() ) : ?>
<h3><?php comment_form_title( '', 'پاسخ به %s :' ); ?></h3>

<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link(); ?></small>
</div>
<?php endif; ?>
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>شما بايد <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">وارد شويد</a> تا بتوانيد نظر خود را ارسال كنيد.</p>
<div class="khat"></div>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( 0 ) : ?>

<p>وارد شده با عنوان <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">خارج شدن</a></p>

<?php else : ?>

<p><input lang="fa" type="text" class="text" name="author" id="author" placeholder="نام و نام خانوادگی" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="author"><small><?php if ($req) echo ""; ?></small></label></p>

<p><input type="text" class="text" name="email" id="email" placeholder="پست الکترونیکی" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="email"><small><?php if ($req) echo ""; ?></small></label></p>

<p><input type="text" class="text" name="url" id="url" placeholder="آدرس سایت / وبلاگ" size="22" tabindex="3" />
<label for="url"><small></small></label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

<p><textarea lang="fa" name="comment" id="comment" cols="65%" rows="10" tabindex="4" class="comm"></textarea>
    <div>
        <button  id="send" name="submit" class="send" type="submit" id="submit" tabindex="5" value="ارسال" >ارسال
        <i class="fa fa-chevron-left" ></i>
        </button>


    </div>
</p>

<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>
<div class="clear"></div>
</form>

<?php endif; // If registration required and not logged in ?>
</div></div>
</div>
<?php endif; // if you delete this the sky will fall on your head ?>
