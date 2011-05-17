<?php
/*
Raysphere - A Wordpress Theme
Copyright (C) 2011  Natansh Verma (mail: natansh@ionsofimagination.com)

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
text-align:gkhe Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
?>
<?php
/* Not really that sure why we need the DOCTYPE, but it is always present,
 * and I remember having read somewhere that this is probably the best 
 * doctype to use.
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
/* Language attributes for xhtml specify the text direction and language information for the page.
 * This should expand to dir="ltr" xml:lang="en", as far as I can tell.
 */?>
<html <?php language_attributes('xhtml'); ?>>
	<head>
		<?php /* The charset should expand to UTF-8 */ ?>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<title><?php
			/* Usage of wp_title <?php wp_title( $sep, $echo, $seplocation ); ?> */
			wp_title( '|', true, 'right' );

			// Printing the blog name itself
			bloginfo( 'name' );

			// If blog description exists, then print for the home and front page.
			$blog_description = get_bloginfo( 'description', 'display' );
			if ( $blog_description && ( is_home() || is_front_page() ) )
				echo " | $blog_description";

			// Checking if one post exists over multiple pages.
			global $page, $paged;
			if ( $paged >= 2 || $page >= 2 )
				/* The __() is a function for l10n (localization). Set raysphere as domain. */
				echo ' | ' . sprintf( __( 'Page %s', 'raysphere' ), max( $paged, $page ) );
		?></title>
		
		<?php /* Check out why exactly this profile rel is required */?> 
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
		
		<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
		<?php 
			/* This hook is required to prevent plugins from breaking. 
		 	 * Plugins use this hook to inject code into the header.
		 	 */
			wp_head();
		?> 
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<div id="title"><?php 
					/* H1 tag is only supposed to be used for the title, on the front and home page */
					$heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
					<<?php echo $heading_tag; ?> id="titletext">
						<span>
							<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
						</span>
					</ <?php echo $heading_tag; ?> >
				</div>
				<div id="subtitle"><?php bloginfo( 'description' ); ?></div>
			</div><!-- header -->
			
			<div id="navmenu">
			<?php /* WP generates the navigation menu for us */ ?>
			<?php wp_nav_menu( array( 'container_class' => 'menu-container', 'theme_location' => 'navigation' ) ); ?>
			</div><!-- #navmenu -->

			<div id="main">
				<div id="content">		
