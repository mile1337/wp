<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package krilnik
 */

get_header(); ?>

	<div class="error-content" style="width: 100%; background-image: url('<?php echo esc_url( get_template_directory_uri() );?>/img/layout/slider-back.png');" >
			<h3 class="error-content__h4 intro">WE ARE CURRENTLY CREATING WINNING TACTICS.</h3>
			<div class="error-content__tactic1">
				<img src="<?php echo esc_url( get_template_directory_uri() );?>/img/layout/tactic1.png"/>
			</div>
			<div class="error-content__tactic2">
				<img src="<?php echo esc_url( get_template_directory_uri() );?>/img/layout/tactic2.png"/>
			</div>
			<h1 class="error-content__h1">OPS...</h1>
			<h3 class="error-content__h4">...UNDER CONSTRUCTION</h3>
			<P class="error-content__p">SORRY THE PAGE THAT YOU ARE LOOKING FOR DOES NOT EXIST. <br> YOU CAN EXPLORE OUR SITE BACK TO DO NAVIGATON BAR.</P>

		</div>
	<div class="error-devider" style="background-image: url('<?php echo esc_url( get_template_directory_uri() );?>/img/layout/slider-devider.png');"></div>

<?php

get_footer();

