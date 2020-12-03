<?php /* Template Name: Blog */ ?>
<?php include("header.php"); ?>

<section class="single-blog">
    <div class="single-blog-content">
        <h4><?php echo get_the_title(); ?></h4>
        <div class="text">
            <?php echo get_the_content(); ?>
        </div>
    </div>

    <div class="next-blog">
        <h4>Gerelateerde blogs</h4>

        <div class="blog-summary">

<?php

    $args = array(
        'posts_per_page'   => 3,
        'post_type'        => 'post',
        'post__not_in' => array(get_the_ID()),
    );

    $the_query = new WP_Query( $args );

    if ( $the_query->have_posts() ) { ?>
        
        <div class="related-blogs">

        <?php 
       
        while ( $the_query->have_posts() ) {
            $the_query->the_post(); ?>

            <?php 
                $date = new DateTime($post->post_date); 
                $categories = get_the_category( $post->ID );
            ?>

            <a class="blog-link" href="<?php echo get_permalink();?>">
                <div class="blog-item">
                    <div class="blog-header">
                        <div class="img">
                        <img src="<?php echo get_template_directory_uri();?>/img/blog-header.jpeg"/>
                        </div>
                        <p class="blog-date"><?php echo $date->format('d-m-Y');?></p>
                        <?php 

                        foreach(($categories) as $category){ ?>
                            <p class="blog-category"><?php echo $category->name;?> </p>
                            
                        <?php } ?>
                    </div>
                    <div class="blog-content">
                        <p class="blog-title"><?php echo $post->post_title;?></p>
                        <div class="blog-text"><?php echo $post->post_content;?></div>
                    </div>
                </div>
            </a>
            
        <?php } ?>

        </div>

    <?php    

    } else {
        ?>
            <p class="no-posts">Op dit moment zijn er geen gerelateerde blogposts.</p>
        <?php
    }

    wp_reset_postdata();

    ?>

   
</div>



    </div>
</section>

<?php include("footer.php"); ?>
