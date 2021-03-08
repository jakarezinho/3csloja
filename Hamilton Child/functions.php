<?php
function my_theme_enqueue_styles()
{

    $parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style('dashicons-css', get_bloginfo ('url'). '/wp-includes/css/dashicons.min.css');
    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style(
        'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array($parent_style),
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

////REGISTER NAV MENU

register_nav_menu('thri-menu', __('thri Menu', 'hamilton'));

function theme_js()
{
    wp_enqueue_script('theme_js', get_stylesheet_directory_uri() . '/assets/js/custom.js', array('jquery'), '1.0', true);
}

add_action('wp_enqueue_scripts', 'theme_js');

/// ADD SIDBAR///

add_action('widgets_init', 'hamilton_widgets_init');
function hamilton_widgets_init()
{
    register_sidebar(array(
        'name' => __('Main Sidebar', 'hamilton'),
        'id' => 'sidebar-1',
        'description' => __('Widgets in this area will be shown on all posts and pages.', 'theme-slug'),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ));
}

///IMAGE MINI ///
add_image_size('mini', 100, 100, true);

/////TRANSLATE///
if (function_exists('pll')) {

    pll_register_string("titulo_intro", "titulo_intro", true);
    pll_register_string("enviar_pedido", "enviar_pedido", true);
    pll_register_string("novo", "novo", true);
    pll_register_string("encomendar", "encomendar", true);
    pll_register_string("nmonbras", "nmobras", true);
    pll_register_string("bt_contacter", "bt_contacter", true);
	pll_register_string("falar_com", "falar_com", true);
}
//////////form7  RAND NUMERO ENCOMENDA /////////
function cf7_add_number_rand()
{

    $number_of_digits = 10;
    return substr(number_format(time() * mt_rand(), 0, '', ''), 0, $number_of_digits);
}

add_shortcode('CF7_ADD_PNUMBER_RAND', 'cf7_add_number_rand');

////////NOME AUTOR FOTM7 /////////
function cf7_add_autor()
{

    return get_the_author();
}

add_shortcode('CF7_AUTOR', 'cf7_add_autor');

////////NOME AUTOR NAME/////////
function cf7_add_autor_name()
{

    return  get_the_author_meta('display_name', get_the_author_meta('ID'));
}

add_shortcode('CF7_AUTOR_NAME', 'cf7_add_autor_name');


/////////////////AUTOR EMAIL /////////////
function cf7_add_autor_email()
{

    return  get_the_author_meta('email', get_the_author_meta('ID'));
}

add_shortcode('CF7_AUTOR_EMAIL', 'cf7_add_autor_email');

/////////ADD FIELDS  AUTOR///////

add_action('show_user_profile', 'extra_user_profile_fields');
add_action('edit_user_profile', 'extra_user_profile_fields');

function extra_user_profile_fields($user)
{ ?>
    <h3><?php _e("Extra profile information", "blank"); ?></h3>

    <table class="form-table">
        <tr>
            <th><label for="address"><?php _e("Address"); ?></label></th>
            <td>
                <input type="text" name="address" id="address" value="<?php echo esc_attr(get_the_author_meta('address', $user->ID)); ?>" class="regular-text" /><br />
                <span class="description"><?php _e("Please enter your address."); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="city"><?php _e("City"); ?></label></th>
            <td>
                <input type="text" name="city" id="city" value="<?php echo esc_attr(get_the_author_meta('city', $user->ID)); ?>" class="regular-text" /><br />
                <span class="description"><?php _e("Please enter your city."); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="contry"><?php _e("Contry"); ?></label></th>
            <td>
                <input type="text" name="contry" id="contry" value="<?php echo esc_attr(get_the_author_meta('contry', $user->ID)); ?>" class="regular-text" /><br />
                <span class="description"><?php _e("Please enter your contry"); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="postalcode"><?php _e("Postal Code"); ?></label></th>
            <td>
                <input type="text" name="postalcode" id="postalcode" value="<?php echo esc_attr(get_the_author_meta('postalcode', $user->ID)); ?>" class="regular-text" /><br />
                <span class="description"><?php _e("Please enter your postal code."); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="phone"><?php _e("Phone"); ?></label></th>
            <td>
                <input type="text" name="phone" id="phone" value="<?php echo esc_attr(get_the_author_meta('phone', $user->ID)); ?>" class="regular-text" /><br />
                <span class="description"><?php _e("Please enter your phone."); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="instagram"><?php _e("Instagram"); ?></label></th>
            <td>
                <input type="text" name="instagram" id="instagram" value="<?php echo esc_attr(get_the_author_meta('instagram', $user->ID)); ?>" class="regular-text" /><br />
                <span class="description"><?php _e("Please enter your instagram."); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="facebook"><?php _e("Facebook"); ?></label></th>
            <td>
                <input type="text" name="facebook" id="facebook" value="<?php echo esc_attr(get_the_author_meta('facebook', $user->ID)); ?>" class="regular-text" /><br />
                <span class="description"><?php _e("Please enter your facebook."); ?></span>
            </td>
        </tr>
    </table>
<?php }

add_action('personal_options_update', 'save_extra_user_profile_fields');
add_action('edit_user_profile_update', 'save_extra_user_profile_fields');

function save_extra_user_profile_fields($user_id)
{

    if (!current_user_can('edit_user', $user_id)) {
        return false;
    }

    update_user_meta($user_id, 'address', $_POST['address']);
    update_user_meta($user_id, 'city', $_POST['city']);
    update_user_meta($user_id, 'contry', $_POST['contry']);
    update_user_meta($user_id, 'postalcode', $_POST['postalcode']);
    update_user_meta($user_id, 'phone', $_POST['phone']);
    update_user_meta($user_id, 'instagram', $_POST['instagram']);
    update_user_meta($user_id, 'facebook', $_POST['facebook']);
}

/////////////MINI TRADUCTION ///////////////
function mini_traduction($pt, $fr, $en)
{
    if (function_exists('pll')) {
        $lang = pll_current_language();
        if ($lang == "en") {
            echo $en;
        } elseif ($lang == "fr") {
            echo $fr;
        } else {
            echo $pt;
        }
    }
}
//////POST BY LANG esconde usuarios sem traduções 

function author_post_lang($user_id)
{
    $langue = (function_exists('pll')) ? pll_current_language() : 'pt';
    $user_post_count = (function_exists('pll')) ? pll_count_posts($langue, ['author' => $user_id]) : count_user_posts($user_id);
    return $user_post_count;
}


///////////LIST USERS //////////////

function list_users($nome = false)
{
    $args = array(
        'exclude'      => array(),
        'order'        => 'ASC',
        'count_total'  => true,
        'fields'       => 'all',

    );
    $users = get_users($args);
	$nb_users = count($users)-1;
    mini_traduction('<h4>Artistas </h4>', '<h4>Artistes</h4>', '<h4>Artists</h4>');
echo '<ul class="menu menu_autors">';
    foreach ($users as $user) {
        $Npost = author_post_lang($user->ID);
        $link = get_author_posts_url($user->ID, get_the_author_meta($user->ID, 'user_nicename'));
        if ($Npost > 0) {
            if ($nome == true) {
                echo ' <li class="enligna"><a href="' . $link . '">' . get_avatar($user->ID, 55) .$user->display_name . '</a></li>';
            } else {
                echo ' <li class="tooltip"> <span class="tooltiptext"> '.$user->display_name.'</span><a  href="' . $link . '" >' . get_avatar($user->ID,55) . '</a></li>';
            }
        }
    }

    echo '</ul>';
}

///////////// USERS INFO/////////////
function users_infos($autd)
{

    if (!empty(get_the_author_meta('description', $autd))) {
        echo '<p>' . get_the_author_meta('description', $autd) . '</p>';
        if (!empty(get_the_author_meta('email', $autd))) {
            echo '<p> <strong>Email </strong> - ' . get_the_author_meta('email', $autd) . '</p>';
        }
        if (!empty(get_the_author_meta('url', $autd))) {
            echo '<p><strong> Url</strong> - ' . get_the_author_meta('url', $autd) . '</p>';
        }
        if (!empty(get_the_author_meta('phone', $autd))) {
            echo '<p><strong>Phone</strong> - ' . get_the_author_meta('phone', $autd) . '</p>';
        }
        if (!empty(get_the_author_meta('adress', $autd))) {
            echo '<p><strong> Adress</strong> - ' . get_the_author_meta('adress', $autd) . '</p>';
        }
        if (!empty(get_the_author_meta('contry', $autd))) {
            echo '<p><strong> Country</strong> - ' . get_the_author_meta('contry', $autd) . '</p>';
        }
        if (!empty(get_the_author_meta('city', $autd))) {
            echo '<p><strong> City</strong>- ' . get_the_author_meta('city', $autd) . '</p>';
        }
		  if (!empty(get_the_author_meta('facebook', $autd))||!empty(get_the_author_meta('instagram', $autd))) {
            echo '<strong>Follow </strong>';
        }
        if (!empty(get_the_author_meta('facebook', $autd))) {
            echo '<p><span class="dashicons dashicons-facebook-alt"></span> - ' . get_the_author_meta('facebook', $autd) . '</p>';
        }
        if (!empty(get_the_author_meta('instagram', $autd))) {
            echo '<p> <span class="dashicons dashicons-instagram"></span>  -' . get_the_author_meta('instagram', $autd) . '</p>';
        }
    } else {
        echo '<p> No infos </p>';
    }
}
/////////// USERS LOCATION///////////
function users_location($autd)
{

    if (!empty(get_the_author_meta('address', $autd))) {
        $adress = get_the_author_meta('address', $autd);
        $city = get_the_author_meta('city', $autd);
        $country = get_the_author_meta('contry', $autd);
        $link =  'https://www.google.com/maps/dir//' . $adress . ',' . $city . ',' . $country . '/';
        echo '<p><a href="' . $link . '" target="blank"><img src="https://maps.googleapis.com/maps/api/staticmap?scale=2&size=600x300&maptype=roadmap&key=&format=jpg&visual_refresh=true&markers=size:mid%7Ccolor:0xff0000%7Clabel:%7C' . $adress . ',' . $city . ',' . $country . '"></a></p>
       <p><a href="' . $link . '" target="blank"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path d="M4 15.189v-15.189h4v9.629c-1.635 1.57-2.993 3.458-yp9SKH_I-3oR2hEcF4 5.56zm8.709-9.689l1.041 2.625c-5.875 2.563-9.75 9-9.75 15.875h4c0-5.219 3.438-10.75 7.333-12l1.084 2.625 3.583-6.781-7.291-2.344z"/></svg><strong> Visit -  </strong>' . $adress . ', ' . $city . ', ' . $country . '»</a></p> ';
    }
}
///////////AUTOR CONTENT///

function autor_content()
{

    $author = get_the_author($feed=false);

    $mini = get_avatar(get_the_author_meta('ID'), 50);
	if($feed=true){
		return '<p class="center_feed branco center_avat_mini_1">' . $mini . '<br> <small>' . $author . '</small></p>';
	}else{
		return '<p class="center branco center_avat_mini_1">' . $mini . '<br> <small>' . $author . '</small></p>';
	}
    
}


/////////////////NOVO////////////

function novo($post_id)
{

    $mydate = get_the_date('Y-m-d', $post_id);
    $datetime1 = new DateTime($mydate);
    $datetime2 = new DateTime(date('Y-m-d'));

    $interval = $datetime1->diff($datetime2);
    $r = $interval->format('%R%a');

    if ($r <= 5) {

        if (function_exists('pll')) {
            echo pll__('novo');
        } else {
            echo "NOVO";
        }
    }
}


//////////////total pages aviso ////////

function fim()
{
	if (is_home() || is_category()) {
       
            mini_traduction("<hr><h5 class='center'>Pretende algo de especial? <a href='https://www.ceramica3cs.com/loja/contactos/'><br> FALE CONNOSCO »</a></h5>", "<hr><h5 class='center'>Vous n'avez pas trouvé ce que vous cherchiez? <a href='https://www.ceramica3cs.com/loja/fr/contacts/'><br>CONTACTEZ-NOUS »</a></h5>", "<hr><h5 class='center'>Did not find what you were looking for? <a href='https://www.ceramica3cs.com/loja/en/contacts-2/'><br>TALK TO US»</a></h5>");
        
    }
}

//////REMOVE PREFIX BEFORE ARCHIVE TITLES


if (!function_exists('hamilton_remove_archive_title_prefix')) {

    function hamilton_remove_archive_title_prefix($title)
    {
        if (is_category()) {
            $title = single_cat_title('', false);
        } elseif (is_tag()) {
            $title = single_tag_title('', false) . '€';
        } elseif (is_author()) {
            $title = '<span class="vcard">' . get_the_author() . '</span>';
        } elseif (is_year()) {
            $title = get_the_date('Y');
        } elseif (is_month()) {
            $title = get_the_date('F Y');
        } elseif (is_day()) {
            $title = get_the_date(get_option('date_format'));
        } elseif (is_tax('post_format')) {
            if (is_tax('post_format', 'post-format-aside')) {
                $title = _x('Asides', 'post format archive title', 'hamilton');
            } elseif (is_tax('post_format', 'post-format-gallery')) {
                $title = _x('Galleries', 'post format archive title', 'hamilton');
            } elseif (is_tax('post_format', 'post-format-image')) {
                $title = _x('Images', 'post format archive title', 'hamilton');
            } elseif (is_tax('post_format', 'post-format-video')) {
                $title = _x('Videos', 'post format archive title', 'hamilton');
            } elseif (is_tax('post_format', 'post-format-quote')) {
                $title = _x('Quotes', 'post format archive title', 'hamilton');
            } elseif (is_tax('post_format', 'post-format-link')) {
                $title = _x('Links', 'post format archive title', 'hamilton');
            } elseif (is_tax('post_format', 'post-format-status')) {
                $title = _x('Statuses', 'post format archive title', 'hamilton');
            } elseif (is_tax('post_format', 'post-format-audio')) {
                $title = _x('Audio', 'post format archive title', 'hamilton');
            } elseif (is_tax('post_format', 'post-format-chat')) {
                $title = _x('Chats', 'post format archive title', 'hamilton');
            }
        } elseif (is_post_type_archive()) {
            $title = post_type_archive_title('', false);
        } elseif (is_tax()) {
            $title = single_term_title('', false);
        } else {
            $title = __('Archives', 'hamilton');
        }
        return $title;
    }
    add_filter('get_the_archive_title', 'hamilton_remove_archive_title_prefix');
}
/////////// HTML IN USERS INFOS
remove_filter('pre_user_description', 'wp_filter_kses');
//add_filter( 'pre_user_description', 'wp_filter_post_kses');

////REMOVE WP VERSION ////
function remove_wordpress_version()
{
    return '';
}
add_filter('the_generator', 'remove_wordpress_version');

//////////// CLEAN/////
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');


////////////////LOAD MORE

function misha_my_load_more_scripts()
{

    global $wp_query;

    // In most cases it is already included on the page and this line can be removed
    //wp_enqueue_script('jquery');

    // register our main script but do not enqueue it yet
    wp_register_script('my_loadmore', get_stylesheet_directory_uri() . '/assets/js/myloadmore.js', array('jquery'));

    // now the most interesting part
    // we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
    // you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
    wp_localize_script('my_loadmore', 'misha_loadmore_params', array(
        'ajaxurl'  => admin_url('admin-ajax.php'), // WordPress AJAX
        'posts' => json_encode($wp_query->query_vars), // everything about your loop is here
        'current_page' => get_query_var('paged') ? get_query_var('paged') : 1,
        'max_page' => $wp_query->max_num_pages
    ));

    wp_enqueue_script('my_loadmore');
}

add_action('wp_enqueue_scripts', 'misha_my_load_more_scripts');

//////////
function misha_loadmore_ajax_handler()
{

    // prepare our arguments for the query
    $args = json_decode(stripslashes($_POST['query']), true);
    $args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
    $args['post_status'] = 'publish';

    // it is always better to use WP_Query but not here
    query_posts($args);

    if (have_posts()) :

        // run the loop
        while (have_posts()) : the_post();

            // look into your theme code how the posts are inserted, but you can use your own HTML of course
            // do you remember? - my example is adapted for Twenty Seventeen theme
            get_template_part('content');
        // for the test purposes comment the line above and uncomment the below one
        // the_title();


        endwhile;

    endif;
    die; // here we exit the script and even no wp_reset_query() required!
}



add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}

//// DSABLE UPDATE HAMILTON THEME
function disable_theme_update_notification( $value ) {
    if ( isset( $value ) && is_object( $value ) ) {
        unset( $value->response['hamilton'] );
    }
    return $value;
}
add_filter( 'site_transient_update_themes', 'disable_theme_update_notification' );

////DISABLE EMAIL ADMIN
add_filter ( 'admin_email_check_interval' , '__return_false' );
