<?php 
/*
	Template Name:Page Venue-Information-Edit
*/
	get_header();
	if(!is_front_page()){
		get_template_part('breadcrums');
	}

?>

    <section class="blog-section page-section">
        <div class="container">
            <div class="row">
                <!--Blog Content Area-->
                <div class="col-md-12">
        
                    <?php
         
                    get_template_part('pages/page','venue-edit');

                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;


                    ?>


                </div>
                <!---Blog Right Sidebar-->
                <?php //get_sidebar(); ?>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
<?php
	get_footer(); ?>