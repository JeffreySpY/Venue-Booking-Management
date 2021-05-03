<?php session_start();
/*
	Template Name:Page Second-Payment
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
                    get_template_part('pages/page','second-payment');
                    ?>
	            
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
	<?php get_footer(); ?>
