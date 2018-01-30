<?php
/**
 * The category template file
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

	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		
		<div class="carousel-inner">
			<?php
			//SLIDEOVI
				if( have_rows('item','option') ):
					$count = 0;
				    while ( have_rows('item', 'option') ) : the_row();
				    $count++; ?>
				        <div class="item<?php if( 1 == $count ) { echo ' active'; }?>">
				        	<div class="slideshow-background" style="background-image: url(<?php the_sub_field('slideshow-background', 'option');?>);">
				        	</div>
				        </div>
				    <?php
				    endwhile; 
				endif;
			?>	
			<?php 
		//INDIKATORI
			if( $count > 1 )
			if( have_rows('item' , 'option') ): $count = 0; ?>
				<ol class="carousel-indicators" style="bottom: 0px;">
				    <?php while ( have_rows('item', 'option') ): the_row(); ?>
				      	<li data-target="#myCarousel" data-slide-to="<?php echo $count; ?>" class="<?php if($count == 0) { echo 'active'; } ?>"></li>
				    <?php $count++;
				    endwhile; ?>  
				</ol>
				<a class="left carousel-control" href="#myCarousel" data-slide="prev"></a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next"></a>
			<?php endif;
		?>
		</div><!-- endcarousel inner -->		
		<div class="carousel__devider" style="background-image: url('<?php echo esc_url( get_template_directory_uri() );?>/img/layout/slider-devider.png');">
		</div>
	</div> <!-- end myCarousel -->
	<div class="articles">
			<div class="articles__item">
				<a href="#">
					<img src="<?php echo esc_url( get_template_directory_uri() );?>/img/layout/slide1.png" alt="clanstvo"/>
					<p>ČLANSTVO</p>
				</a>
			</div><!-- endarticles item -->

			<div class="articles__item">
				<a href="#">
					<img src="<?php echo esc_url( get_template_directory_uri() );?>/img/layout/slide2.png" alt="krilnik akademija"/>
					<p>KRILNIK AKADEMIJA</p>
				</a>
			</div><!-- endarticles item -->
	
			<div class="articles__item">
				<a href="#">
					<img src="<?php echo esc_url( get_template_directory_uri() );?>/img/layout/slide3.png" alt="postani partner"/>
					<p class="last">POSTANI  PARTNER</p>
				</a>
			</div><!-- endarticles item -->
			
		</div><!-- end articles -->

		<div class="news">
			<div class="news__feed">
			<?php 
				$args = array(
					'post_type' => 'vijesti',
					'post_status' => 'publish',
					'category_name' => 'rukomet'
					);
				$query = new WP_Query($args);
				while($query -> have_posts()) : $query -> the_post();
			?>
			<?php if ( have_rows('dodaj_vijest') ) : ?>
				<?php while ( have_rows('dodaj_vijest') ) : the_row() ; ?>
					<div class="news__wrapper" style="position: relative;">
					<?php the_post_thumbnail('news-thumbnail' , array('alt' => get_the_title())); ?>
					<div class="news__thumb">
						
					    <div class="news__thumb__title">
							    <div class="news__thumb__logo">
							        <img src="<?php echo esc_url( get_template_directory_uri() );?>/img/layout/news-logo.png" alt="Krilnik">
							    </div><!-- End news logo -->
							    <img class="sign" src="<?php echo esc_url( get_template_directory_uri() );?>img/layout/handball-sign.png" alt="handball sign" />
						   		 <div class="calendar">
						   		<?php 
									$date = DateTime::createFromFormat('Ymd', get_sub_field('datum'));
													
								?>
							    	<div class="calendar__number"><?php echo $date->format('d'); ?></div>
							    	<div class="calendar__date"><?php echo $date->format('m'); ?><span>/</span><?php echo $date->format('Y'); ?></div>
							    	<div class="calendar__day"><?php echo $date->format('l'); ?></div>
							    </div><!-- end calendar --> 	
						    	<div class="text">
							    	<h3><?php the_title();?></h3>
							    	<p><?php the_sub_field('podnaslov');?></p>
							    </div><!-- end text -->
					    </div><!-- End news title -->
					</div><!-- End news thumb -->
					<div class="news__text">
						<p> <?php the_sub_field('text_vijesti');?></p>
					</div><!-- End news text -->
				</div>
				<?php
				    endwhile; 
				endif;
			?>	
		<?php endwhile; ?>
		</div><!-- End news feed -->
		<div class="wrapper wr-rukomet">
			<div class="news__schedule">
				<div class="schedule__thumb">
						<div class="news__schedule__schedule">
							<div class="news__schedule__logo">
								<img src="<?php echo esc_url( get_template_directory_uri() );?>/img/layout/news-logo.png" alt="Krilnik">
							</div><!-- End panel title logo -->
							<img class="sign" src="<?php echo esc_url( get_template_directory_uri() );?>/img/layout/handball-sign.png" alt="handball sign" />
							<div class="text">
								<h4>raspored <br>treninga</h4>
								<h5>Sportska dvorana <br> Bazeni Poljud</h5>
							</div>			        
						</div><!-- End panel title schedule -->	
					</div><!-- end chedule thumb -->
					<div class="accord">
					<?php if( have_rows('raspored_treninga_rukomet','option') ):
						$count = 0;
					    while ( have_rows('raspored_treninga_rukomet', 'option') ) : the_row();
					    	$count++; ?>
					        <div class="accordion">
							    <h4><?php the_sub_field('uzrast', 'option') ?></h4>
							    <p><?php the_sub_field('mjesto_odrzavanja_treninga', 'option') ?></p>
							    <img src="<?php echo esc_url( get_template_directory_uri() );?>/img/layout/arrow.png" alt="arrow"/>
					        </div>
							<div class="panel<?php if( 1 == $count ) { echo ' show'; }?>">
								<?php if ( have_rows('raspored', 'option') ) : ?>
									<?php while ( have_rows('raspored', 'option') ) : the_row('raspored', 'option') ; ?>

									<?php 
										$pon = get_sub_field('ponedjeljak', 'option');
										$uto = get_sub_field('utorak', 'option');
										$sri = get_sub_field('srijeda', 'option');
										$cet = get_sub_field('cetvrtak', 'option');
										$pet = get_sub_field('petak', 'option');
										$sub = get_sub_field('subota', 'option');
										$ned = get_sub_field('nedjelja', 'option');
									?>
									<?php if ($pon || $uto || $sri || $cet || $pet || $sub || $ned ) :?>
									<table>
										<tr>
											<th>PON</th>
											<th>UTO</th>
											<th>SRI</th>
											<th>ČET</th>
											<th>PET</th>
											<th class="red">SUB</th>
											<th class="red">NED</th>
										</tr>
											

										<tr>
											<td><?php echo $pon; ?></td>
											<td><?php echo $uto; ?></td>
											<td><?php echo $sri; ?></td>
											<td><?php echo $cet; ?></td>
											<td><?php echo $pet; ?></td>
											<td><?php echo $sub; ?></td>
											<td><?php echo $ned; ?></td>
										</tr>
									</table>
								 	<?php
								 	endif;
									    endwhile; 
									endif;
								?>	
								<div class="napomena">	
									<h5>Napomena:</h5>
							  		<p><?php the_sub_field('napomena', 'option') ?></p>
							  	</div>
							</div>
					    <?php
					    endwhile; 
					endif;
					?>	
					</div><!-- end accord -->
			</div><!-- end news schedule -->
		</div><!-- end wrapper -->
	</div><!-- End News -->


<?php

get_footer();
