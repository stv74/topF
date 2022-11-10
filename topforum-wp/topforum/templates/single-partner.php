<?php 
    get_header();
?>

    <main class="partners">
        <div class="container">
            <h1 class="title"><?php single_post_title(); ?></h1>
            <div class="partners__text">
                <?php the_field('partners_text_1'); ?>
            </div>
            
            <?php
                if( in_category( 'speakers' ) ){
                    ?>
                    <img src="<?php the_field('partners_img'); ?>" alt="" class="partners__picture" />
                    <?php                    
                } else {
                    ?>
                        <div class= "partners__img">
                            <img src="<?php the_field('partners_img'); ?>" alt="" />
                        </div>
                    <?php                    
                }
            ?>

            <div class="partners__text">
                <?php the_field('partners_text_2'); ?>
            </div>
            
            <?php  
                $autor = get_the_title();
                $my_posts = get_posts( array(
                    'numberposts' => 2,
                    'category_name'    => 'articles',
                    'author_name' => $autor,
                    'orderby'     => 'date',
                    'order'       => 'ASC',
                    'post_type'   => 'post',
                    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                ) );

                if ( $my_posts ) {
                ?>
                    <div class="partners__wrapp">
                <?php
                        foreach( $my_posts as $post ){
                            setup_postdata( $post );
                            if ( has_post_thumbnail()) {
                            ?>
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                            <?php 
                            }
                        } 
                        ?>                        
                    </div>
                <?php
                }
                    wp_reset_postdata(); // сброс
                ?>            

            <div class="partners__text">
                <?php the_field('partners_text_3'); ?>
            </div>
            
        </div>
	</main>

<?php 
    get_footer();