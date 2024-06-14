  <div class="padding-global">
    <?php get_template_part('templates/page', 'header'); ?>
  </div>

  <?php if (have_posts()) : ?>
    <div class="padding-global">
      <div class="search-results" style="
    padding-top: 8rem;
    padding-bottom: 8rem;
">
        <h2><?php printf(__('Search Results for: %s', 'sage'), '<span>' . get_search_query() . '</span>'); ?></h2>

        <?php while (have_posts()) : the_post(); ?>
          <article <?php post_class(); ?>>
            <header>
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            </header>
            <div class="entry-content">
              <?php the_excerpt(); ?>
            </div>
          </article>
        <?php endwhile; ?>

        <?php the_posts_navigation(); ?>
      </div>
    </div>
  <?php else : ?>
    <div class="alert alert-warning">
      <?php _e('Sorry, no results were found.', 'sage'); ?>
    </div>
    <?php get_search_form(); ?>
  <?php endif; ?>