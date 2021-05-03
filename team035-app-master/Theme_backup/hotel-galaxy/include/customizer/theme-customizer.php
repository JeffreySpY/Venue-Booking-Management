<?php
add_action( 'customize_register', 'hotel_galaxy_customizer' );
function hotel_galaxy_customizer( $wp_customize ) {	
	/* Genral section */	
	$wp_customize->add_panel( 'hotel_galaxy_theme_option', array(
		'title' => __( 'Theme Settings','hotel-galaxy' ),
    'priority' => 1, // Mixed with top-level-section hierarchy.
    ) );

	$hotel_galaxy_option = hotel_galaxy_default_setting();	

	/**genral option  start**/
	require_once(Hotel_galaxy_Dir_Uri_include . '/customizer/genral-option.php');
	/**genral option  end**/

	/**typography option  start**/
	require_once(Hotel_galaxy_Dir_Uri_include . '/customizer/typography-section.php');
	/**typography option  end**/

	/**slider option  start**/
	require_once(Hotel_galaxy_Dir_Uri_include . '/customizer/slider.php');
	/**slider option  end**/
	
	/**room option  start**/
	require_once(Hotel_galaxy_Dir_Uri_include . '/customizer/room-section.php');
	/**room option  end**/

	/**Services option  start**/
	require_once(Hotel_galaxy_Dir_Uri_include . '/customizer/services.php');
	/**Services option  end**/


	/**Blog option  start**/
	require_once(Hotel_galaxy_Dir_Uri_include . '/customizer/blog.php');
	/**Blog option  end**/

	/**shortcode option  start**/
	require_once(Hotel_galaxy_Dir_Uri_include . '/customizer/shortcode.php');
	/**shortcode option  end**/

	/**page-title  start**/
	require_once(Hotel_galaxy_Dir_Uri_include . '/customizer/page-title-section.php');
	/**page-title  end**/

	/**social link  start**/
	require_once(Hotel_galaxy_Dir_Uri_include . '/customizer/social-links.php');
	/**social link  end**/


	/**footer collout start**/
	require_once(Hotel_galaxy_Dir_Uri_include . '/customizer/footer-callout.php');
	/**footer collout end**/

	/**footer start**/
	require_once(Hotel_galaxy_Dir_Uri_include . '/customizer/footer-section.php');
	/**footer end**/

	
}

function hotel_galaxy_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

function hotel_galaxy_sanitize_integer( $input ) {
	if( is_numeric( $input ) ) {
		return intval( $input );
	}
}


if ( ! function_exists( 'hotel_galaxy_sanitize_dropdown_pages' ) ) :

	/**
	 * Sanitize dropdown pages.
	 *
	 * @since 1.0.0
	 *
	 * @param int                  $page_id Page ID.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return int|string Page ID if the page is published; otherwise, the setting default.
	 */
function hotel_galaxy_sanitize_dropdown_pages( $page_id, $setting ) {

		// Ensure $input is an absolute integer.
	$page_id = absint( $page_id );
		// If $page_id is an ID of a published page, return it; otherwise, return the default.
	return ( 'publish' === get_post_status( $page_id ) ? $page_id : $setting->default );

}

endif;


if ( ! class_exists( 'WP_Customize_Control' ) )
	return NULL;

/**
* 
*/
class hotel_galaxy_setting_separate extends WP_Customize_Control
{	
	function render_content()
	{
		switch ( $this->type ) {
			default:
			case 'hr_tag' :
			echo '<h3 style="text-align:center; color:#DBB26B;">' . esc_html( $this->label ) . '</h3><hr />';
			break;
		}
	}
}


if ( ! class_exists( 'WP_Customize_Control' ) )
	return NULL;

/**
 * A class to create a dropdown for all categories in your wordpress site
 */
class hotel_galaxy_category_dropdown_custom_control extends WP_Customize_Control
{
	private $cats = false;

	public function __construct($manager, $id, $args = array(), $options = array())
	{
		$this->cats = get_categories($options);

		parent::__construct( $manager, $id, $args );
	}

    /**
     * Render the content of the category dropdown
     *
     * @return HTML
     */
    public function render_content()
    {
    	if(!empty($this->cats))
    	{
    		?>
    		<label>
    			<span class="customize-category-select-control"><?php echo esc_html( $this->label ); ?></span>
    			<select <?php $this->link();?> >
    				
    				<?php
    				foreach ( $this->cats as $cat )
    				{
    					printf('<option value="%s" %s>%s</option>', $cat->term_id, selected($this->value(), $cat->term_id, false), $cat->name);  					
    				}
    				?>
    			</select>
    		</label>
    		<?php
    	}
    }
}

function hotel_galaxy_room_sanitize( $value ) {
	if ( ! in_array( $value, array( 'Uncategorized','category' ) ) )    
		return $value;
}
?>