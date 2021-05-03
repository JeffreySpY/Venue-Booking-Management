<?php session_start();
/*
	Template Name:Page Stripe-Confirmation
*/
	get_header();
	if(!is_front_page()){
		//get_template_part('breadcrums');
	}?>
	 <section class="blog-section page-section">
        <div class="container">
            <div class="row">
                <!--Blog Content Area-->
                <div class="col-md-12">
                    <?php
                    get_template_part('pages/page','stripe-confirmation');
                    ?>
	            
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
	<?php get_footer(); ?>
