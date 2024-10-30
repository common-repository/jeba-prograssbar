<?php
/*
Plugin Name: Jeba Skill Prograssbar
Plugin URI: http://prowpexpert.com/
Description: This is Jeba cute wordpress Skill Prograssbar plugin really looking awesome sliding. Everyone can use the cute Skill Prograssbar plugin easily like other wordpress plugin. By using [skillbar] shortcode use the slider every where post, page and template.
Author: Md Jahed
Version: 1.0
Author URI: http://prowpexpert.com/
*/
function jebas_wps_latest_jquery() {
	wp_enqueue_script('jquery');
}
add_action('init', 'jebas_wps_latest_jquery');

function plugin_function_jeba_prograssbarss() {



	wp_enqueue_style( 'jeba-css_skill', plugins_url( '/js/goalProgress.css', __FILE__ ));
    wp_enqueue_script( 'jeba-slider-js_skill', plugins_url( '/js/goalProgress.min.js', __FILE__ ), true);
    
    	
	
}

add_action('init','plugin_function_jeba_prograssbarss');




function skill_prograss_bar( $atts ) {
    extract( shortcode_atts( array(
        'total' => '100', // default total
        'skill' => '60', // default skill
        'id' => '1', // default id
        'name' => 'Skill Name ', // default textBefore
        'fbg' => '#ddd', // default fbg
        'bg' => '#FF008C', // default bg
        'after' => '%', // default after
        'color' => '#fff', // default color
    ), $atts ) );
    ?>
	
    <script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#sample_goal<?php echo (int) $id; ?>').goalProgress({
				goalAmount: <?php echo (int) $total; ?>,
				currentAmount: <?php echo (int) $skill; ?>,
				textBefore: '<?php echo $name; ?>',
				textAfter: '<?php echo $after; ?>'
			});

		});
		
	</script>
	
			<div id="sample_goal<?php echo (int) $id; ?>"></div>
	<style type="text/css">
		#sample_goal<?php echo (int) $id; ?> div.progressBar {
						  background: none repeat scroll 0 0 <?php echo $bg; ?>;
						  color: <?php echo $color; ?>;
						}
		#sample_goal<?php echo (int) $id; ?> .goalProgress {
					  background: none repeat scroll 0 0 <?php echo $fbg; ?>;
					}
					#sample_goal<?php echo (int) $id; ?> {
									  margin-bottom: 5px;
									}
	</style>
	
    <?php
}
add_shortcode('skillbar', 'skill_prograss_bar');



?>