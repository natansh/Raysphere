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
/*
The loop is used to display everything. It checks whether posts exist,
and if they do, then the loop displays them one by one.
1. have_posts() tells us whether posts exist.
2. the_post() calls $wp_query->the_post() which advances the loop counter
   and sets up the global $post variable and all the global post data.
*/
?>
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php /* the_ID() displays the ID of the post. */ ?>
		<?php /* post_class() creates CSS selectors to style content only within the post content area. */ ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class() ?>>
			<div class="post-header">
				<?php /* rel="bookmark" is for specifying that the link is a permalink. */ ?>
				<h2 class="entry-title"> <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<?php /* Check out http://codex.wordpress.org/Formatting_Date_and_Time for this. Various options */ ?>
				<div class="post-date"?> <?php the_time('F j, Y') ?> </div>
			</div><!-- post-header -->
			<?php the_content(); ?>
			<?php get_comments(); ?>
		</div><!-- post -->
	<?php endwhile; ?>
<?php else : ?>
	<div class="post">
		<div class="post-header">
			<h2 class="page-title">Not Found</h2>
			<p>The ion you're looking for is currently being dreamt up. For now it exists only as a figment of your imagination.</p>
		</div><!-- post-header -->
	</div><!-- post -->
<?php endif; ?>
