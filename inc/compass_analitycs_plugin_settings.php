<?php
/**
 * Created by PhpStorm.
 * User: ido
 * Date: 1/4/2017
 * Time: 9:52 AM
 */


// Create the Menu link

function cga_options_menu_link(){
    add_options_page('Google Analytics', 'google analytics', 'manage_options', 'cga-options', 'cga_options_content');

}

//Create Options page content
function cga_options_content(){

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

                    <?php echo _e('Google Analytics Settings', 'cga_domain');?>
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


//register the settings

function cga_register_settings(){
    register_setting('cga_settings_gruop', 'cga_settings');

}
if ( is_admin() ){

    add_action('admin_init', 'cga_register_settings');
}
