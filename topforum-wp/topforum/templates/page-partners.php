<?php
    get_header();    
?>

<?php
    $class_img = '';
    $pagetags = '';
    $parent_ID = is_subpage();   

    if ( is_page(127) ) {
        $class = 'sponsors';
    } elseif (is_page(129) || $parent_ID == 129 ) {
        $class = 'exhibitors';
    } elseif (is_page(131) || $parent_ID == 131 ) {
        $class = 'speakers';
        $class_img = 'card__img_speakers';
    }

    $pagetags = get_the_tags();
    if( $pagetags ){
        $tags = '';
        foreach( $pagetags as $tag ){
            $tags = $tags . ', ' . $tag->slug;
        }
        $taglist = ltrim( $tags, ' ,' );
    } else {
        $taglist = '';
    }
?>

    <div class="<?php echo $class ?>">
        <div class="container">  
            <div class="introduction">
                <h1 class="title"><?php the_title(); ?></h1>
                <div class="introduction__descr">
                    <?php the_content() ?>
                </div>
            </div>
            <form action="#" class="select <?php echo $class ?>__form">
                <div class="select__title">please select a conference</div>
                <div class="select__wrapper">
                    <select name="conference" id="conference" class="select__feeld">
                        <option value="1">Wealth TOP FORUM Israel 2016</option>
                        <option value="2">Wealth TOP FORUM Israel 2017</option>
                    </select>
                </div>
            </form>
            <div class="<?php echo $class ?>__wrapper">
                <?php 
                    // параметры по умолчанию
                    $my_posts = get_posts( array(
                        'numberposts' => -1,                        
                        'category_name' => $class,
                        'tag' => $taglist,                        
                        'orderby'     => 'meta_value',
                        'order'       => 'ASC',
                        'meta_key'    => 'sponsors_category',
                        'post_type'   => 'post',
                        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                    ) );

                    foreach( $my_posts as $post ){
                        setup_postdata( $post );
                        ?>
                        <div class="card <?php echo $class ?>__card">
                            <?php
                                if ($class == 'sponsors') {
                                    ?>
                                    <h2 class="card__title"><?php the_field('sponsors_category'); ?></h2>
                                    <?php
                                }
                            ?>                            
                            <div class="card__img <?php echo $class_img ?>">
                                <img src="<?php the_field('partners_img'); ?>" alt="" />
                            </div>
                            <div class="card__subtitle"><?php the_title(); ?></div>
                            <p class="card__text">
                                <?php the_field('partners_descr'); ?>
                            </p>
                            <a href="<?php echo get_permalink(); ?>" class="btn card__btn">Learn more</a>
                        </div>
                        <?php
                    }

                    wp_reset_postdata(); // сброс
                ?>                
            </div>
        </div>
	</div>

<?php
    get_footer();
?>