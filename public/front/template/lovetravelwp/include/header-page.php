<section class="header-page fade-up" style="background: url(
<?php if (is_category()): ?>
	<?php echo $smof_data['category_imageheaderpage']; ?>
<?php elseif (is_tag()): ?>
	<?php echo $smof_data['tag_imageheaderpage']; ?>
<?php elseif (is_author()): ?>
	<?php echo $smof_data['author_imageheaderpage']; ?>
<?php elseif (is_search()): ?>
	<?php echo $smof_data['search_imageheaderpage']; ?>
<?php else: ?>
	<?php echo $smof_data['archive_imageheaderpage']; ?>
<?php endif ?>
) 50% 0 fixed;">
	<div class="bounce-in animate4">

		<?php if (is_category()): ?>
			<h2 class="header-pagetitle">CATEGORY<br/><span class="header-pagedescription"><?php single_cat_title(); ?></span></h2>
		<?php elseif (is_tag()): ?>
			<h2 class="header-pagetitle">TAG<br/><span class="header-pagedescription"><?php single_tag_title() ?></span></h2>
		<?php elseif (is_month()): ?>
			<h2 class="header-pagetitle">ARCHIVE FOR<br/><span class="header-pagedescription"><?php single_month_title(); ?></span></h2>
		<?php elseif (is_author()): ?>
			<h2 class="header-pagetitle">AUTHOR<br/><span class="header-pagedescription"><?php the_author(); ?></span></h2>
		<?php elseif (is_search()): ?>
			<h2 class="header-pagetitle">SEARCH FOR<br/><span class="header-pagedescription">" <?php the_search_query(); ?> "</span></h2>
		<?php elseif (is_post_type_archive('travel')): ?>
			<h2 class="header-pagetitle">TRAVEL</h2>
		<?php elseif (is_tax()): ?>
			<h2 class="header-pagetitle">TRAVEL</h2>
		<?php else: ?>
			<h2 class="header-pagetitle">ARCHIVE</h2>
		<?php endif ?>

	</div>
</section>