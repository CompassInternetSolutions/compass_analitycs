<?php
/**
 * Created by PhpStorm.
 * User: ido
 * Date: 1/5/2017
 * Time: 12:01 PM
 */

function remove_header_junk(){
    if ( !current_user_can( 'manage_options' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
    global $rhl_options;

    ob_start() ?>

    <h2><?php _e('Compass Remove Unnecessary links From Header', 'cga_domain') ;?></h2>

    <form action="options.php" method="post">

        <?php settings_fields('rhl_settings_gruop') ;?>
        <table class="form-table">
            <tbody>
            <tr>

                <th scope="row">

                    <?php echo _e('Check box in order to Remove Unnecessary links From Header', 'cga_domain');?>
                </th>
            </tr>


            <tr>
                <th scope="row">
                    <label for="rhl_settings[rsd]">
                        <?php _e('remove really simple discovery link', 'cga_domain') ;?>
                    </label>
                </th>
                <td>
                    <input type="checkbox" name="rhl_settings[rsd]" value="1" <?php checked( '1', $rhl_options['rsd']) ;?> id="rhl_settings[rsd]"></td>
            </tr>


            </tbody>

        </table>
        <p class="submit">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('Save Changes', 'cga_domain') ;?>">
        </p>
    </form>

    <?php
    echo ob_get_clean();
}

function remove_chosen_links(){

    global $rhl_options;

    if($rhl_options[ 'rsd']){
        remove_action('wp_head', 'rsd_link');
    }


}

add_action('init', 'remove_chosen_links', 10);