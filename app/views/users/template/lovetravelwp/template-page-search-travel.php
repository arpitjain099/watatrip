<?php
/**
 * Template Name: Page Search Travel
 */

get_header(); ?>

<?php include "include/header-page-single.php" ?>
	
<section class="sectionhome" id="sectionsearchtravel">
	<div class="container clearfix">
	
		<!--start form-->
		<form class="<?php echo $smof_data['travel_searchformcolorbuttons']; ?>"  id="formsearchtravel"  method="post" action="<?php echo $smof_data['travel_searchformaction']; ?>"> 
		
			<div class="labelsearchtravel">
				<i class="icon-direction"></i>
				<p>BOOK TRAVELS</p>
			</div>
		
			<?php  $taxonomies = get_object_taxonomies('travel');
				foreach($taxonomies as $tax){
					echo buildSelect($tax);
				}
			?>
			<div class="grid_2">
				<input value="search" type="submit"/>
			</div>
		</form>
		<!--end form-->
		
	</div>
</section>

<div class="divider"><span></span></div>

<!--start page-->
<section id="internalpage">

	<!--start container-->
    <div class="container clearfix">
		
		<?php  
		
		$list = array();
		$item = array();  
		
		foreach($_POST as $key => $value){
			if($value != ''){
				$item['taxonomy'] = htmlspecialchars($key);
				$item['terms'] = htmlspecialchars($value);
				$item['field'] = 'slug';
				$list[] = $item;
			}		
		}  
		
		$cleanArray = array_merge(array('relation' => 'AND'), $list);

		$numbershowposts = $smof_data['travel_searchformnumberposts'];

		$args['post_type'] = 'travel';
		$args['showposts'] = $numbershowposts;
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args['paged'] = $paged;  
		$args['tax_query'] = $cleanArray; 
		$the_query = new WP_Query( $args );

		?>


		<?php echo ($the_query->found_posts > 0) ? '' : '<div style="text-align:center" class="grid_12"><h1>NO RESULTS</h1><i style="font-size:35px; display:inline-block; margin-top:20px; color:#5e6d81;" class="icon-frown"></i></div>';?>
		<?php # echo ($the_query->found_posts > 0) ? '<h3 class="foundPosts">' . $the_query->found_posts. ' listings found</h3>' : '<h3 class="foundPosts">We found no results</h3>';?>

		<!--start style masonry-->
		<div class="stylemasonry">
	
			<?php $travel_searchformgrid = $smof_data['travel_searchformgrid']; ?>

			<?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
 
				<!--start single travel-->	
				<div class="<?php echo $travel_searchformgrid; ?> singlemasonry">
					<div class="archivetour <?php $lovetravel_main_color = get_post_meta($post->ID, 'lovetravel_main_color', true ); ?>
					<?php if (!empty($lovetravel_main_color)) { echo $lovetravel_main_color;}else{ echo "green"; }?>">
						<div class="leftarchivetour">
							<a href="<?php the_permalink(); ?>">
								<div class="imgarchivesinglepost">
									<div class="btnsarchivesingletravel">
										<?php $lovetravel_btnoffer_travel = get_post_meta($post->ID, 'lovetravel_btnoffer_travel', true ); ?>
										<?php if (!empty($lovetravel_btnoffer_travel)) { 
											echo do_shortcode($lovetravel_btnoffer_travel);
										}
										?>
									</div>
									<?php the_post_thumbnail('archive-image'); ?>
								</div>
							</a>
							<div class="pricetitleleftarchivetour">
								<div class="priceleftarchivetour"><p><?php $lovetravel_price_travel = get_post_meta($post->ID, 'lovetravel_price_travel', true ); ?>
					<?php if (!empty($lovetravel_price_travel)) { echo $lovetravel_price_travel;}else{ echo "SALE"; }?></p></div>
								<p class="titleleftarchivetour"><?php $lovetravel_description_travel = get_post_meta($post->ID, 'lovetravel_description_travel', true ); ?>
					<?php if (!empty($lovetravel_description_travel)) { echo do_shortcode($lovetravel_description_travel);}else{ echo "Amazing Tour"; }?></p>
							</div>
						</div>
						
						<div class="rightarchivetour">
							<div class="titledayarchivetour">
								<a href="<?php the_permalink(); ?>"><p class="titlearchivetour"><?php the_title(); ?></p></a>
								<div class="dayarchivetour"><p><?php $lovetravel_duration_travel = get_post_meta($post->ID, 'lovetravel_duration_travel', true ); ?>
					<?php if (!empty($lovetravel_duration_travel)) { echo $lovetravel_duration_travel;}else{ echo "00"; } ?></p><span><?php $lovetravel_textduration_travel = get_post_meta($post->ID, 'lovetravel_textduration_travel', true ); ?>
					<?php if (!empty($lovetravel_textduration_travel)) { echo $lovetravel_textduration_travel;}else{ echo "DAYS"; } ?></span></div>
							</div>
							<div class="descriptioniconsarchivetour"><?php the_excerpt(); ?></div>
						</div>
					</div>
				</div>
				<!--end single travel-->
	
			<?php endwhile; wp_reset_postdata();?>	

		</div>
		<!--end style masonry-->

		
		<div class="contentarchivepagination">
			<div class="archivepagination">
				<?php next_posts_link('', $the_query->max_num_pages) ?> 
				 <?php previous_posts_link('') ?> 
			</div>
		</div>


    </div>
    <!--end container--> 
    
</section>
<!--end internal page-->

<div class="divider"><span></span></div>

<?php get_footer(); ?>