<?php

// ----------------------------------------------
// WOOCOMMERCE FUNCTIONS TO MODIFY THE SHOP PAGE
// ---------------------------------------------



// remove standard woocommerce sidebar

remove_action( "woocommerce_sidebar", "woocommerce_get_sidebar");




// template layout if clicked on a product item (redirecting the template to another such as a single product)

function load_template_layout(){

    if(is_shop()){ // True

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

    }
}

add_action("template_redirect", "load_template_layout");

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


//remove shop page title heading

add_filter("woocommerce_show_page_title", "toggle_page_title");

function toggle_page_title($val){
    $val = false;
    return $val;
}

//Add excerpt under shop product items title

add_action("woocommerce_after_shop_loop_item_title", "the_excerpt");


// remove elements from archive-product.php

remove_action( "woocommerce_before_main_content", "woocommerce_breadcrumb", 20);

remove_action( "woocommerce_before_shop_loop", "woocommerce_result_count", 20 );

remove_action( "woocommerce_before_shop_loop", "woocommerce_catalog_ordering", 30 );
?>