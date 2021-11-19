<?php
/**
 * Created by PhpStorm.
 * User: ido
 * Date: 1/4/2017
 * Time: 9:52 AM
 */


// Create the Menu link

function cga_options_menu_link(){
    //add_options_page('Google Tools', 'Google Tools', 'manage_options', 'cga-options', 'cga_options_content');
    add_menu_page( 'Google Tools', 'Google Tools', 'manage_options', 'cga-options', 'cga_options_content' );



    //add submenu page
    add_submenu_page( 'cga-options', 'Remove Header Links', 'Remove Header Links', 'manage_options', 'rhl-options', 'remove_header_junk');
}

//Create Options page content
function cga_options_content(){


    if ( !current_user_can( 'manage_options' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
// init global variable for options

    global $cga_options;

    ob_start();?>

    <div class="wrap">
        <h2><?php _e('Compass Google Analytics', 'cga_domain') ;?></h2>
        <p>
            <?php _e('Settings For the Compass Google Analytics Plugin', 'cga_domain') ;?>
        </p>
        <form action="options.php" method="post">

            <?php settings_fields('cga_settings_gruop') ;?>
            <table class="form-table">
                <tbody>

                <th>

                    <?php echo _e('Google Analytics Tools Settings', 'cga_domain');?>
                </th>

                <tr>
                    <th scope="row">

                        <label for="cga_settings[ga_ua]">
                            <?php _e('Add Google Analytics UA', 'cga_domain') ;?>
                        </label>
                    </th>
                    <td>
                        <input type="text" name="cga_settings[ga_ua]" value="<?php echo $cga_options['ga_ua'] ;?>" id="cga_settings[ga_ua]" class="regular-text" placeholder="UA-XXXXXXXX-X"/>
                        <p class="description">
                            <?php _e('Add Google Analytics UA', 'cga_domain');?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">

                        <label for="cga_settings[ga_ua]">
                            <?php _e('Add Google Analytics V-4 Gtag', 'cga_domain') ;?>
                        </label>
                    </th>
                    <td>
                        <input type="text" name="cga_settings[ga_gtag]" value="<?php echo $cga_options['ga_gtag'] ;?>" id="cga_settings[ga_gtag]" class="regular-text" placeholder="G-XXXXXXXX"/>
                        <p class="description">
                            <?php _e('Add Google Analytics gtag', 'cga_domain');?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="cga_settings[enable]">
                            <?php _e('Load Script in Header', 'cga_domain') ;?>
                        </label>
                    </th>
                    <td>
                        <input type="checkbox" name="cga_settings[enable]" value="1" <?php checked( '1', $cga_options[ 'enable']) ;?> id="cga_settings[enable]"></td>
                </tr>
                <tr>
                    <th scope="row">

                        <label for="cga_settings[gwmt]">
                            <?php _e('Add Google WMT verification code', 'cga_domain') ;?>
                        </label>
                    </th>
                    <td>
                        <span>meta name="google-site-verification" content="
                            <input type="text" name="cga_settings[gwmt]" value="<?php echo $cga_options['gwmt'] ;?>" id="cga_settings[gwmt]" class="regular-text" placeholder="Add code here"/>"
                        </span>
                        <p class="description">
                            <?php _e('Add Google WMT verification code', 'cga_domain');?>
                        </p>
                    </td>
                </tr>

                </tbody>

            </table>
            <p class="submit">
                <input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('Save Changes', 'cga_domain') ;?>">
            </p>
        </form>
    </div>

    <?php

    echo ob_get_clean();

}
if ( is_admin() ){

    add_action('admin_menu','cga_options_menu_link');
}




