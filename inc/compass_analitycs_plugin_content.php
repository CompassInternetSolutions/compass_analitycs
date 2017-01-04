<?php
/**
 * Created by PhpStorm.
 * User: ido
 * Date: 1/4/2017
 * Time: 9:52 AM
 */

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

if ($cga_options[ 'enable'] == 1){
    add_action( 'wp_head', 'compass_google_analytics', 10 );
}else{

    add_action( 'wp_footer', 'compass_google_analytics', 10 );
}
