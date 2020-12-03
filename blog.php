<?php /* Template Name: Blog */ ?>
<?php include("header.php"); ?>

<section class="full-blog">


<div class="blog-summary">

<?php

    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $the_query = new WP_Query( array(
        'posts_per_page'   => 8,
        'post_type'        => 'post',
        'paged' => $paged
    ) );


    if ( $the_query->have_posts() ) {
       
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
            
            <?php
        }
    ?>
    <div class="pagination">
    <?php 

        $next_post = 'Volgende pagina <i class="fas fa-long-arrow-alt-right"></i>';
        echo paginate_links( array(
            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
            'total'        => $the_query->max_num_pages,
            'current'      => max( 1, get_query_var( 'paged' ) ),
            'format'       => '?paged=%#%',
            'show_all'     => false,
            'type'         => 'plain',
            'end_size'     => 2,
            'mid_size'     => 1,
            'prev_next'    => true,
            'prev_text'    => false,
            // 'prev_text'    => sprintf( '<i></i> %1$s', __( '', 'text-domain' ) ),
            // 'next_text'    => sprintf( '%1$s <i></i>', __( 'Volgende pagina', 'text-domain' ) ),
            'next_text'    => $next_post,
            'add_args'     => false,
            'add_fragment' => '',
        ) );
    ?>
    </div>
        
    <?php
        
    } else {
        ?>
            <p class="no-posts">Op dit moment zijn er geen blogposts.</p>
        <?php
    }

    wp_reset_postdata();

    ?>

   
</div>
    
</section>

<?php include("footer.php"); ?>
