<?php
    get_header();
?>

<?php
    if (is_page(222)) {
        $article = 'best';
    } else {
        $article = '';
    }
?>

    <div class="media">
        <div class="container">
            <div class="introduction">
                <h1 class="title"><?php single_post_title(); ?></h1>
                <div class="introduction__descr">
                    <?php the_content() ?>
                </div>
            </div>
            <div class="media__wrapper">
                <?php
                    // параметры по умолчанию
                    $my_posts = get_posts( array(
                        'numberposts' => -1,
                        'category_name'    => 'articles',
                        'tag' => $article,
                        'orderby'     => 'date',
                        'order'       => 'ASC',
                        'post_type'   => 'post',
                        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                    ) );

                    foreach( $my_posts as $post ){
                        setup_postdata( $post );
                        ?>
                        <div class="card card_media media__card">
                            <div class="card__img card__img_media">
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
                            <div class="card__subtitle"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></div>
                            <p class="card__text">
                                <?php the_field('description_articles'); ?>
                            </p>
                        </div>
                        <?php
                        
                    }

                    wp_reset_postdata(); // сброс 
                ?>                
            </div>
            <?php
            if ( is_page(222) ) { ?>
                <a href="<?php echo get_permalink(257); ?>" class="btn media__btn">More article</a>
            <?php
            }
            ?>
        </div>
	</div>

<?php
    get_footer();
?>