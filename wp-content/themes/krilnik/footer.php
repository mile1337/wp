<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package krilnik
 */

?>

	<div class="footer">
			<div class="footer__intro" style="background-image: url('<?php echo esc_url( get_template_directory_uri() );?>/img/layout/footer_banner.jpg');">
				<img src="<?php echo esc_url( get_template_directory_uri() );?>/img/layout/footer-intro.png" alt="footer intro" />
			</div>
			<!--<div class="footer__sponsors">
				<ul class="footer__icons">
					<li><img class="first" src="img/layout/zdrug.png"></li>
					<li><img class="sponsor" src="img/layout/zdrug.png"></li>
					<li><img class="last" src="img/layout/zdrug.png"></li>
				</ul>
			</div>-->
			<div class="footer__outro">
				<div class="footer__nav">
			
					<ul class="ico-nav socialNetwork-nav">
						<?php
							if( have_rows('social_media_icons', 'option') ):
							    while ( have_rows('social_media_icons', 'option') ) : the_row();

							        $social_platform = get_sub_field('social_media_platforms', 'option');
							        $social_url = get_sub_field('social_media_url', 'option');

							        if( $social_platform == 'facebook'){
							        	echo '<li><a href="'. $social_url ?>"><img src="<?php echo esc_url( get_template_directory_uri() );?>/img/icons/facebook.png" alt="facebook" /></a></li>';
							        <?php }
							        elseif( $social_platform == 'twitter'){
							        	echo '<li><a href="'. $social_url ?>"><img src="<?php echo esc_url( get_template_directory_uri() );?>/img/icons/tweeter.png" alt="tweeter" /></a></li>';
							        <?php }
							        elseif( $social_platform == 'instagram'){
							        	echo '<li><a href="'. $social_url ?>"><img src="<?php echo esc_url( get_template_directory_uri() );?>/img/icons/instagram.png" alt="instagram" /></a></li>';
							        <?php }
							        elseif( $social_platform == 'gmail'){
							        	echo '<li><a href="'. $social_url ?>"><img src="<?php echo esc_url( get_template_directory_uri() );?>/img/icons/gmail.png" alt="gmail" ></a></li>';
							        <?php }
							        elseif( $social_platform == 'youtube'){
							        	echo '<li><a href="'. $social_url ?>"><img src="<?php echo esc_url( get_template_directory_uri() );?>/img/icons/youtube.png" alt="youtube" /></a></li>';
							        <?php }					       
							    endwhile;
							
							endif;

						?>
						
					</ul><!-- End socialNetwork-nav -->
				</div>
				<img class="outro-img" src="<?php echo esc_url( get_template_directory_uri() );?>/img/layout/footer-outro.png" alt="footer outro"/>
			</div>
			<div class="footer__credits">
				<h4>KRILNIK klub spomenik hrvatskih branitelja iz Domovinskog rata</h4>
				<p class="color">Dom Hrvatske vojske, Poljudsko šetalište 1, 21000 Split</p>
				<p>službena internetska stranica <span class ="copy">&copy;</span> sva prava pridržana 1992 - 2017</p>
			</div>
	</div>	


<?php wp_footer(); ?>

</body>
</html>
