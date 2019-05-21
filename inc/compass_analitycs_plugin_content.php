<?php
/**
 * Created by PhpStorm.
 * User: ido
 * Date: 1/4/2017
 * Time: 9:52 AM
 */
require_once( ABSPATH . "wp-includes/pluggable.php" );

function compass_google_analytics() {

    global $cga_options;

    ?>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', '<?php echo $cga_options['ga_ua'];?>', 'auto');
        ga('send', 'pageview');

    </script>
<?php }

//check if it is a logged in user in order not to send info
if ( !function_exists('is_user_logged_in') ) :

    /**
     * Checks if the current visitor is a logged in user.
     *
     * @since 2.0.0
     *
     * @return bool True if user is logged in, false if not logged in.
     */

    function is_user_logged_in() {
        $user = wp_get_current_user();

        if ( empty( $user->ID ) )
            return false;

        return true;
    }
endif;
if(! is_user_logged_in() ){

    if ($cga_options[ 'enable'] == 1){
        add_action( 'wp_head', 'compass_google_analytics', 10 );
    }else{

        add_action( 'wp_footer', 'compass_google_analytics', 10 );
    }
}


function compass_wmt_verification(){
    global $cga_options;
    ?>
    <meta name="google-site-verification" content="<?php echo $cga_options['gwmt'];?>">

<?php }

if( $cga_options['gwmt']){

    add_action('wp_head','compass_wmt_verification');
}


