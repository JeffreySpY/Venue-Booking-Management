<div class="blog-area animate" data-anim-type="fadeInUp" data-anim-delay="900">
    <div >
    <?php
    session_start();
    ?>
    <?php
        if ('POST' == $_SERVER['REQUEST_METHOD'] && $_POST['action'] == "package_update") {
            ?> <h4>Thank you for your submission. The package has been updated.</h4><?php
        }
        elseif ( 'POST' == $_SERVER['REQUEST_METHOD'] && $_POST['action'] == "Venue"){
            ?> <h4>Thank you for your submission. We will process the venue listing and publish onto the website  as soon as possible.</h4><?php
        }
        elseif ('POST' == $_SERVER['REQUEST_METHOD'] && $_POST['action'] == "Package"){
            ?> <h4>Thank you for your submission. The new package has been created.</h4><?php
        }
        elseif('POST' == $_SERVER['REQUEST_METHOD'] && $_POST['action'] == "venue_update"){
            ?> <h4>Thank you for your submission. We will process the venue update and publish onto the website as soon as possible.</h4><?php
        }
        elseif('POST' == $_SERVER['REQUEST_METHOD'] && $_POST['action'] == "pdf_update"){
            ?> <h4>Thank you for your submission. The pdf has been updated.</h4><?php
        }
        elseif('POST' == $_SERVER['REQUEST_METHOD'] && $_POST['action'] == "room_creation"){
            ?> <h4>Thank you for your submission. The new room has been created.</h4><?php
        }
        elseif('POST' == $_SERVER['REQUEST_METHOD'] && $_POST['action'] == "room_update"){
            ?> <h4>Thank you for your submission. The room has been updated.</h4><?php
        }
        elseif('POST' == $_SERVER['REQUEST_METHOD'] && $_POST['action'] == "date_update"){
            ?> <h4>Thank you for your submission. The date availability of room has been updated.</h4><?php
        } ?>
		<br />
		<br />
		<br />		
		<br />
		<br />
		<h4>
Please <a href="<?php echo get_site_url(null,"/dashboard/","https")?>">click here to return to your dashboard </a>
		</h4>
    </div>
</div>
    