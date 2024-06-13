 <?php
    /**
     * Page Builder - Feature Cards
     *
     *
     */
    ?>

 <div class="line-divider">
     <div class="padding-global">
         <div class="container-large">
             <div class="line-divider_inner"></div>
         </div>
     </div>
 </div>
 <section class="section_feature-cards">
     <div class="padding-global">
         <h1 class="heading-page clip-text left"><?php the_sub_field('section_heading'); ?></h1>
         <div class="feature-cards">
             <?php if (have_rows('card')) : ?>
                 <?php while (have_rows('card')) : the_row(); ?>
                     <div class="feature-card">
                         <div class="feature-card-_inner">
                             <div>
                                 <?php
                                    $image = get_sub_field('image');
                                    ?>
                                 <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="feature-card_img">
                                 <h3 style="text-align: center;"><?php the_sub_field('heading'); ?></h3>
                             </div>
                             <p class="feature-card_txt"><?php the_sub_field('text'); ?></p>
                             <a href="<?php echo esc_url($button_link); ?>" class="button is-icon text-color-alternate w-inline-block">
                                 <div class="btn_text"><?php the_sub_field('button_text'); ?></div>
                                 <div class="icon-1x1-small w-embed"><svg width="10" height="20" viewbox="0 0 10 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                         <path d="M0.779968 0.439941L8.55994 8.21997C9.42994 9.08997 9.42994 10.51 8.55994 11.38L0.779968 19.16" stroke="currentColor" stroke-miterlimit="10"></path>
                                     </svg></div>
                             </a>
                         </div>
                     </div>
                 <?php endwhile; ?>
             <?php endif; ?>


         </div>
     </div>
 </section>