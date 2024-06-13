 <?php
    /**
     * Page Builder - Accordions
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
 <div class="section-accordion">
     <div class="padding-global">
         <h1 class="heading-page clip-text left"><?php the_sub_field('section_heading'); ?></h1>
         <div class="accordions">
             <?php if (have_rows('accordion')) : ?>
                 <?php while (have_rows('accordion')) : the_row(); ?>
                     <div class="accordion">
                         <div class="accordion_inner">
                             <div class="accordion_trigger">
                                 <h4 class="accordion_heading"><?php the_sub_field('heading'); ?></h4>
                                 <div class="accordion_icon div-block">
                                     <div class="accordion_icon_horizontal"></div>
                                     <div class="accordion_icon_vertical"></div>
                                 </div>
                             </div>
                             <div class="accordion_txt">
                                 <div class="accordion_content_inner">
                                     <div class="text-size-small margin-bottom margin-custom1"><?php the_sub_field('text'); ?></div>
                                     <a href="<?php echo esc_url($button_link); ?>" class="button is-icon w-inline-block">
                                         <div class="btn_text"><?php the_sub_field('button_text'); ?></div>
                                         <div class="icon-1x1-small w-embed"><svg width="10" height="20" viewbox="0 0 10 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                 <path d="M0.779968 0.439941L8.55994 8.21997C9.42994 9.08997 9.42994 10.51 8.55994 11.38L0.779968 19.16" stroke="currentColor" stroke-miterlimit="10"></path>
                                             </svg></div>
                                     </a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 <?php endwhile; ?>
             <?php endif; ?>
         </div>
         <div class="spacer-large"></div>
     </div>
 </div>