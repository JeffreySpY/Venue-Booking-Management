<?php 
    session_start();
/*
	Template Name:Page Search Result
*/
	get_header();
	if(!is_front_page()){
		get_template_part('breadcrums');
	}

?>

    <section class="blog-section page-section" style="padding:0px">

            <div class="row">
                <!--Blog Content Area-->
                <div class="col-md-12">
        
                   
 <?php
         
                    get_template_part('pages/page','searchResult');
                    ?>

                </div>
    
            </div>

    </section>
    <div class="clearfix"></div>
<?php
	get_footer(); ?>