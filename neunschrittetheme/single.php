<?php get_header(); ?>
<article>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <h4><?php the_author() ;?>,<?php the_time('d.m.Y') ;?></h4>
    <h2><?php the_title() ?></h2>
    <p><?php the_content() ?></p>
  <?php endwhile; else : ?>
    <p>Es können keine Posts geladen werden.</p>
  <?php endif; ?>
</article>
<?php get_footer(); ?>
