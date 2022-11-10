<?php
    /* ---------------------- Подключаем стили и скрипты --------------------- */
    add_action( 'wp_enqueue_scripts', 'topforum_styles' );
    add_action( 'wp_enqueue_scripts', 'topforum_scripts' );

    function topforum_styles () {
        wp_enqueue_style( 'topforum-style', get_stylesheet_uri() );
    }

    function topforum_scripts () {
        wp_enqueue_script( 'topforum_script', get_template_directory_uri() . '/assets/js/script.min.js', array(), null, true );
    }
    /* ------------------------------------------------------------------------ */

    /* -------- Подключаем пользовательский логотип и миниатюры постов -------- */
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');

    /* 
    * Добавляем возможность добавлять теги к постоянным страницам.
    * Это нужно, чтобы на страницах мероприятий выводить информацию об их    участниках. Одним тегом помечена страница мероприятия и записи участников, которые нужно на ней вывести.    
    */
    add_action( 'init', 'post_tag_for_pages' );
        function post_tag_for_pages(){
            register_taxonomy_for_object_type( 'post_tag', 'page');
        }

    /*
    * Ф-ция проверяет, является ли текущая постоянная страница дочерней страницей
    * Возвращает ID родителя или false
    */
    function is_subpage() {
        global $post;

        if ( is_page() && $post->post_parent ) {
            return $post->post_parent;
        } 
        return false;
    }

    /* ------------------------- Подключение шаблонов записей ---------------------- */

    add_filter( 'template_include', 'templates' );

   
    function templates( $template ) {
        
        $sp = is_subpage();
        if( is_page( array(127, 129, 131)) || $sp == 127 || $sp == 129 || $sp == 131) {
            return get_template_directory() . '/templates/page-partners.php';
        }

        if( has_category( array('sponsors', 'speakers', 'exhibitors')) ) {
            return get_template_directory() . '/templates/single-partner.php';
        }
        
        if( is_page( array(222, 257) ) ) {
            return get_template_directory() . '/templates/page-media.php';
        }
        
        if( is_page( 259 ) ) {
            return get_template_directory() . '/templates/page-events.php';
        }
        
        if( is_page( 262 ) ) {
            return get_template_directory() . '/templates/page-contacts.php';
        }
        
        if( is_page( 463 ) ) {
            return get_template_directory() . '/templates/page-registration.php';
        }

        return $template;
    }

    /* ------------------------------------------------------------------------ */

    /* 
    * Ограничиваем размер тизера для записей из категории "Articles" двадцатью словами
    */
    add_filter( 'excerpt_length', function(){
        if ( in_category( 'articles' ) ) {
            return 20;
        }
        return 55;
    } );

    /* -------------------------------- Меню ---------------------------------- */

    /* Регистрируем три меню */
    add_action( 'after_setup_theme', function(){
        register_nav_menus( [
            'header_menu' => 'Меню в шапке',
            'subheader_menu' => 'Меню возле логотипа',
            'footer_menu' => 'Меню в подвале',
            'mobile_menu' => 'Мобильное меню'
        ] );
    } );

    /* Удаляем ID у всех пунктов меню на сайте */
    add_filter( 'nav_menu_item_id', '__return_empty_string' );

    /* Изменяем класс вложенного списка */
    add_filter( 'nav_menu_submenu_css_class', 'change_menu_submenu_css_class', 10, 3 );

    /* Удаляем дефолтные классы у элементов li и заменяем их своими */
    add_filter( 'nav_menu_css_class', 'change_menu_item_css_classes', 10, 4 );

    /* Добавляем классы к ссылкам меню */
    add_filter('nav_menu_link_attributes', 'add_nav_menu_link_classes', 10, 4);

    function change_menu_submenu_css_class( $classes, $args, $depth ) {
        if ( $args->theme_location == 'header_menu' ) {
            $classes = [ 'topmenu__dropdown' ];
        }
	    return $classes;
    }

    function change_menu_item_css_classes( $classes, $item, $args, $depth ) {
        if ( $args->theme_location === 'header_menu' ) {
            if ( $depth === 0 ) {
                $classes = [ 'topmenu__item' ];
            } else {
                $classes = [ 'topmenu__dropdown-item' ];
            }
        }   elseif ( $args->theme_location === 'subheader_menu' ) {
                $classes = [ 'subheader__menu-item' ];
        }   elseif ( $args->theme_location === 'mobile_menu' ) {
                $classes = [ 'topmenu__mobile-item' ];
        }
        return $classes;
    }

    function add_nav_menu_link_classes( $atts, $item, $args, $depth ) {
	        if ( $args->theme_location === 'header_menu' ) {
                if ( $depth === 0 ) {
                    $atts['class'] = 'topmenu__link';	            
                } else {
                    $atts['class'] = 'topmenu__dropdown-link';
                }
	        }   elseif ( $args->theme_location === 'footer_menu' ) {
                    $atts['class'] = 'footer__link';
            }   elseif ( $args->theme_location === 'mobile_menu' ) {
                    $atts['class'] = 'topmenu__mobile-link';
            }
	        return $atts;
    }

    /*
        * Добавляем иконки к пунктам меню рядом с логотипом.
    */
    add_filter( 'nav_menu_item_title', 'filter_nav_menu_item_title', 10, 4 );
    function filter_nav_menu_item_title( $title, $item, $args, $depth ) {
        if ( $args->theme_location === 'subheader_menu' ) {
            $iconurl = get_bloginfo('template_url') . '/assets/icons/menu_' . $item->menu_order . '.png';
            $title = "<img src=$iconurl />" . $title;
        }

        return $title;
    }

    /* ---------------------------------------------------------------------- */   

    /* ---- Добавляем в админ-панель возможность управления 3-мя слайдерами ---- */

    /* Добавляем в админ-меню новый пункт "Слайдеры */
    add_action( 'admin_menu', 'add_new_menu_item' );

    function add_new_menu_item() {
        add_menu_page('Слайдеры', 'Слайдеры', 'manage_options', 'sliders', '', 'dashicons-slides', 21 );
    }
    
    /*
        Регистрируем 3 новых типа записи "slider_promo", "slider_advantages" и "slider_clients" (по одному для каждого слайдера) и выводим их в качестве подпунктов у добавленного выше пункта меню "Слайдеры"        
    */

    add_action( 'init', 'slider_promo' );
    add_action( 'init', 'slider_reviews' );
    add_action( 'init', 'slider_clients' );

    function slider_promo() {
        register_post_type( 'slider-promo', array(
           'description' => 'Слайдер, в котором выводится информация о мероприятиях',
           'public' => true,
           'supports' => array( 'title', 'custom-fields' ),
           'publicly_queryable' => false,
           'exclude_from_search' => true,
           'show_in_menu' => 'sliders',
           'show_in_nav_menus' => false,
           'show_in_admin_bar' => false,
           'rewrite' => false,
           'labels' => array(
                'name' => 'Промо-слайдер',
                'all_items' => 'Промо-слайдер',
                'add_new' => 'Добавить слайд',
                'add_new_item' => 'Добавить слайд'
           ),
        ) );
    }

    function slider_reviews() {
        register_post_type( 'slider_reviews', array(
           'public' => true,
           'supports' => array( 'title', 'custom-fields' ),
           'publicly_queryable' => false,
           'exclude_from_search' => true,
           'show_in_menu' => 'sliders',
           'show_in_nav_menus' => false,
           'show_in_admin_bar' => false,
           'rewrite' => false,
           'labels' => array(
                'name' => 'Слайдер с отзывами',
                'all_items' => 'Слайдер с отзывами',
                'add_new' => 'Добавить слайд',
                'add_new_item' => 'Добавить слайд'
           ),
        ) );
    }

    function slider_clients() {
        register_post_type( 'slider_clients', array(
           'public' => true,
           'supports' => array( 'title', 'custom-fields' ),
           'publicly_queryable' => false,
           'exclude_from_search' => true,
           'show_in_menu' => 'sliders',
           'show_in_nav_menus' => false,
           'show_in_admin_bar' => false,
           'rewrite' => false,
           'labels' => array(
                'name' => 'Слайдер с клиентами',
                'all_items' => 'Слайдер с клиентами',
                'add_new' => 'Добавить слайд',
                'add_new_item' => 'Добавить слайд'
           ),
        ) );
    }
    /* ------------------------------------------------------------------------- */

    /* --- Добавляем возможность использовать тег <span> в редакторе TinyMCE --- */

    add_filter( 'tiny_mce_before_init', 'tinymce_update_rules' );

    function tinymce_update_rules( $init ) {

        $init['extended_valid_elements'] = 'span[*]';

        return $init;
    }

    /* ------------------------------------------------------------------------- */

    /* 
     * Разрешаем загрузку стилей и скриптов плагина CF7 только на тех страницах, где    есть шорткоды форм, созданных им
    */
    
    function wpcf7_remove_assets() {
	add_filter( 'wpcf7_load_js', '__return_false' );
	add_filter( 'wpcf7_load_css', '__return_false' );
    }

    add_action( 'wpcf7_init', 'wpcf7_remove_assets' );

    function wpcf7_add_assets( $atts ) {
        wpcf7_enqueue_styles();
        wpcf7_enqueue_scripts();

        return $atts;
    }

    add_filter( 'shortcode_atts_wpcf7', 'wpcf7_add_assets' );
?>