<?php /* Template Name: Homepage */ ?>

<?php include("header.php"); ?>

<section class="blog">
    <div class="create-blog">
        <h4>Plaats een blog bericht</h4>

        <form id="submitform" @submit.prevent="submit">
            <div class="form-item">
                <label for="name" v-bind:class="{ emptyinput: nameinput }">Berichtnaam</label>
                <input id="name" type="text" v-model="title" placeholder="Geen titel"/>
            </div>

            <div class="form-item">
                <label for="select" v-bind:class="{ emptyinput: categoryinput }">Categorie</label>
                <div class="form-select" style="width:100%;">
                    <select id="select" name="category" v-model="selected">
                        <option value="0" disabled >Geen categorie</option>
                        <?php
                        $category_list = get_categories( array(
                            'orderby'       => 'name',
                            'order'         => 'ASC',
                            'hide_empty'    => 0
                        ) );
                        
                        foreach($category_list as $category) {
                            ?><option v-bind:value="<?php echo $category->term_id;?>"><?php echo $category->name; ?></option> <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-item">
                <p class="form-item-title">Header afbeelding</p>
                <label for="file-upload" class="blog-file-upload">
                    <i class="fas fa-camera"></i><p>Kies bestand</p>
                </label>
                <input id="file-upload" type="file"/>
            </div>

            <div class="form-item">
                <label for="text" v-bind:class="{ emptyinput: messageinput }">Bericht</label>
                <textarea id="text" type="text" v-model="message"></textarea>
            </div>

            <div class="read-more">
                 <input type="submit" class="btn-big" value="Bericht aanmaken"></input>
            </div>
        </form>
    </div>

    <div class="blog-summary">

    <?php

        $args = array(
            'posts_per_page'   => 4,
            'post_type'        => 'post',
        );

        $the_query = new WP_Query( $args );

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
            <div class="read-more">
                <a href="<?php echo $_SERVER['REQUEST_URI']; ?>blog" class="btn-big">Meer laden</a>
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
