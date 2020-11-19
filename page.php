<?php get_header();?>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col">

            <h1 class="my-4">Page Heading
                <small>Secondary Text</small>
            </h1>


            <?php
                

                if (have_posts(  )){
                    while (have_posts()) {

$url = wp_get_attachment_url(get_post_thumbnail_id($post->ID), "thumbnail");
                        
                        the_post(  );

                        ?>
            <!-- Blog Post -->
            <div class="card mb-4">
                <img class="card-img-top" src="<?php echo $url   ?>" alt="Card image cap">
                <article>
                    <h2 class="card-title"><?php the_title();?></h2>
                    <p class="card-text"><?php the_content();?></p>
                </article>
                <!-- <div class="card-footer text-muted">
                    Posted on January 1, 2020 by
                    <a href="#">Start Bootstrap</a>
                </div> -->
            </div>
            <?php

                    }
                }
                ?>




            <!-- Pagination -->
            <ul class="pagination justify-content-center mb-4">
                <li class="page-item">
                    <a class="page-link" href="#">&larr; Older</a>
                </li>
                <li class="page-item disabled">
                    <a class="page-link" href="#">Newer &rarr;</a>
                </li>
            </ul>

        

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<?php get_footer();?>