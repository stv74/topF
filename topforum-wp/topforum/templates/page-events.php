<?php
    get_header();
?>

    <div class="event">
        <div class="container">
            <div class="introduction">
                <h1 class="title"><?php the_title(); ?></h1>
                <div class="introduction__descr">
                    <?php the_content(); ?>
                </div>
            </div>

            <?php  
                $my_posts = get_posts( array(
                        'numberposts' => -1,
                        'category_name'    => 'events',
                        'orderby'     => 'date',
                        'order'       => 'ASC',
                        'post_type'   => 'post',
                        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                    ) );

                    foreach( $my_posts as $post ){
                        setup_postdata( $post );
                        ?>
                        <div class="event__article">
                            <div class="event__img">
                                <?php 
                                if ( has_post_thumbnail()) { ?>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                                    <?php the_post_thumbnail(); ?>
                                    </a>
                                <?php 
                                } else { ?>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                                    <img src="<?php echo bloginfo('template_url'); ?>/assets/images/no_photo.jpg" alt="Not image">
                                    </a>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="event__prev">
                                <h3 class="event__prev-title"><?php the_title(); ?></h3>
                                <div class="event__prev-subtitle"><?php the_field('date_events');?> | <?php the_field('participate_events'); ?></div>
                                <div class="event__prev-descr">
                                    <?php the_field('description_events'); ?>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="btn btn_activ event__btn">Learn more</a>
                            </div>
                        </div>
                        <?php
                    }

                    wp_reset_postdata(); // сброс
            ?>            
        </div>
	</div>

<?php
    get_footer();
?>