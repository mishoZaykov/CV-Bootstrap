<head>
    <?php wp_head(); ?>
</head>

<header class="nav">
    <p class="logo">Tech Picker</p>
    <?php
    wp_nav_menu(array(
        'theme_location' => 'primary',
        'container' => 'nav',
        'contaner_class' => 'this_is_my_menu',
        'menu_class' => '',
        'menu_id' => ''
    ));
    ?>
    <div class="search">
        <?php
        get_search_form();
        ?>
    </div>
</header>