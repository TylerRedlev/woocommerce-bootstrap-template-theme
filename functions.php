<?php

// Load Scripts Function

function simple_bootstrap_theme_load_scripts(){

    // css files
    wp_enqueue_style("bootstrap", get_template_directory_uri(). "/assets/vendor/bootstrap/css/bootstrap.min.css", array(), "1.0", "all");

    wp_enqueue_style("blog-home", get_template_directory_uri(). "/assets/css/blog-home.css", array(), "1.0", "all");

    wp_enqueue_style("blog-home",  get_stylesheet_uri(), array(), "1.0", "all");

    // js scripts
    wp_enqueue_script("bootstrap", get_template_directory_uri()."/assets/vendor/bootstrap/js/bootstrap.bundle.min.js", array("jquery"), "1.0", true);
}

//Adding styles and scripts with action
add_action("wp_enqueue_scripts", "simple_bootstrap_theme_load_scripts");


//Registering navbars and configuring navigation
function simple_bootstrap_theme_nav_config(){

    //registering the nav menus
    register_nav_menus(array(
        "sbt_primary_menu_id" => "SBT Primary Menu (Top Menu)",
        "sbt_secondary_menu_id" => "SBT Sidebar"
    ));

    // add theme support for thumbnails
    add_theme_support("post-thumbnails");

    //Add WooCommerce theme support
    add_theme_support("woocommerce", array(
        "thumbnail_image_width" => 150,
        "single_image_width" => 200,
        "product_grid" => array(
            "default_columns" => 10,
            "min_columns" => 2,
            "max_columns" => 3
            
        )
    ));
}
//Add nav reg'strat'ons and theme support
add_action("after_setup_theme", "simple_bootstrap_theme_nav_config");


// adding classes to li 

function simple_bootstrap_theme_add_li_class($classes, $item, $args){
    $classes[] = "nav-item sbt-theme";
    return $classes;

}

add_filter("nav_menu_css_class", "simple_bootstrap_theme_add_li_class", 1, 3);

// adding classes to anchor links

function simple_bootstrap_theme_add_anchor_links($classes, $item, $args){
    $classes["class"] = "nav-link sbt-link-class";
    return $classes;
}

add_filter("nav_menu_link_attributes", "simple_bootstrap_theme_add_anchor_links", 1, 3);

remove_action( "woocommerce_sidebar", "woocommerce_get_sidebar");

// add container & row class

function open_container_row_div_classes(){
    echo "<div class='container owt-container'><div class='row owt-row'>";

}

add_action("woocommerce_before_main_content", "open_container_row_div_classes", 5);



// close container & row class

function close_container_row_div_classes(){

    echo "</div></div>";
}

add_action("woocommerce_after_main_content", "close_container_row_div_classes", 5);




// ** open sidebar column grid **
// <div class="col-sm-4"> Sidebar</div>

function open_sidebar_column_grid() {

    echo "<div class='col-sm-4'>";

}

add_action("woocommerce_before_main_content", "open_sidebar_column_grid", 6);


//Readding the sidebar after opening sidebar with our own div class

add_action("woocommerce_before_main_content", "woocommerce_get_sidebar", 7);

// close sidebar column grid

function close_sidebar_column_grid(){
    echo "</div>";
}

add_action("woocommerce_before_main_content", "close_sidebar_column_grid", 8);


// Adding the products grid into the div class
// <div class="col-sm-8"></div>

function open_product_column_grid(){
    echo "<div class='col-sm-8'>";
}

add_action("woocommerce_before_main_content", "open_product_column_grid", 9);

//closing the product grid div

function close_product_column_grid(){
    echo "</div>";
}

add_action("woocommerce_before_main_content", "close_product_column_grid", 10);


// template layout if clicked on a product item (redirecting the template to another such as a single product)

function load_template_layout(){

    if(is_shop()){ // True
        

    }
}



?>