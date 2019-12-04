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
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>


<div class="container">
	<div class="row">

		<main class="col-lg-9">


			<?php
			if (have_posts()) {

				// Load posts loop.
				while (have_posts()) {
					the_post();
					get_template_part('template-parts/content/content');
				}

				// Previous/next page navigation.
				twentynineteen_the_posts_navigation();
			} else {

				// If no content, include the "No posts found" template.
				get_template_part('template-parts/content/content', 'none');
			}
			?>



		</main>
		<aside class="col-lg-3">
			<!-- Champ de recherche: https://getbootstrap.com/docs/4.1/components/input-group/ -->
			<?php if (is_active_sidebar('searchbar-widget')) : ?>
				<div id="sidebar-widget-area" class="nwa-header-widget widget-area" role="complementary">
					<?php dynamic_sidebar('searchbar-widget'); ?>
				</div>
			<?php endif; ?>

			<!-- Catégories: https://getbootstrap.com/docs/4.1/components/card/#list-groups-->
			<div class="card">
				<h3 class="card-header">Catégories</h3>
				<ul class="list-group list-group-flush">

					<?php $args = array(
						"hide_empty" => 0,
						"type"      => "post",
						"orderby"   => "name",
						"order"     => "ASC"
					);
					$categories = get_categories($args);
					foreach ($categories as $category) {
						echo '<li class="list-group-item"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
					} ?>
				</ul>


				<!-- Auteurs: https://getbootstrap.com/docs/4.1/components/card/#list-groups -->
				<div class="card">
					<h3 class="card-header">Auteurs</h3>
					<ul class="list-group list-group-flush">
						<?php

						$params = array(
							'role'         => 'author',
							'orderby'      => 'post_count',
							'order'        => 'DESC',
							'offset'       => '',
							'search'       => '',
							'number' => 4,
							'count_total'  => false,
							'fields'       => 'all',
							'who'          => '',
						);
						$authors = get_users($params);
						foreach ($authors as $author) {
							if (count_user_posts($author->ID) > 0) {
								echo '<li class="list-group-item" id="' . $author->ID . '">' . $author->display_name . '</li>';
							}
						} ?>

					</ul>
				</div>
			</div>

		</aside>
	</div><!-- /.row -->

</div>


<?php
get_footer();
