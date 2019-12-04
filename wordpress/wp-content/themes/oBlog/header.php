<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?>
<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Déclaration de notre font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,800" rel="stylesheet">

    <!-- Import d'icones pour les réseaux sociaux -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!--
        * On ajoute notre fichier de styles persos
        * L'ordre des links est importants, car style.css peut écraser des valeurs définies dans bootstrap.css
    -->
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(). '/assets/css/style.css' ?>">
    <title>O'Blog</title>
</head>

<header class='header'>
<ul class="list-group-header list-group-flush d-none d-md-flex">

					<?php $args = array(
						"hide_empty" => 0,
						"type"      => "post",
						"orderby"   => "name",
						"order"     => "ASC"
					);
					$categories = get_categories($args);
					foreach ($categories as $category) {
						echo '<li class="list-group-item-header"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
					} ?>
				</ul>
    <nav class="navbar navbar-expand-md navbar-light bg-light d-md-none">
        
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#blogNav" aria-controls="blogNav" aria-expanded="false" aria-label="Toggle navigation">
            Menu <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Pour caler à droite le menu, on ajoute la classe justify-content-end -->
        <div class="collapse navbar-collapse justify-content-end" id="blogNav">
            <!-- Puis on retire le mr-auto -->
            <ul class="navbar-nav d-md-none">
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
            
            <!-- On copie-colle notre formulaire du aside
                Mais on ne l'affiche qu'en mobile (dans le menu burger)-->
           <!-- Champ de recherche: https://getbootstrap.com/docs/4.1/components/input-group/ -->
			<?php if (is_active_sidebar('searchbar-widget')) : ?>
				<div id="sidebar-widget-area" class="nwa-header-widget widget-area d-md-none" role="complementary">
					<?php dynamic_sidebar('searchbar-widget'); ?>
				</div>
			<?php endif; ?>
        </div>
    </nav>

    <div class="py-3 py-lg-5 d-md-none d-lg-block">
        <!-- Emmet: h1{À la dérive}+p{Un blog collaboratif de développeurs web dérivant délibérément au beau milieu de l'espace} -->
        <h1 class="text-center">À la dérive</h1>
        <div class="header-bar"></div>
        <p class="text-center">
            Un blog collaboratif de développeurs web dérivant délibérément au beau milieu de l'espace
        </p>
    </div>
</header>