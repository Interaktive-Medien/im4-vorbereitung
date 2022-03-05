<?php get_header(); ?>
<article>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <h2><?php the_title() ?></h2>
      <p><?php the_excerpt() ?></p>
      <a href="<?php the_permalink() ?>">mehr lesen</a>
  <?php endwhile; else : ?>
    <p>Es können keine Posts geladen werden.</p>
  <?php endif; ?>
</article>
<?php get_footer(); ?>
