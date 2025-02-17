<?php
/**
* Customizer Custom Classes.
* @package Restaurant Culinary
*/

if ( ! function_exists( 'restaurant_culinary_sanitize_number_range' ) ) :
    function restaurant_culinary_sanitize_number_range( $restaurant_culinary_input, $restaurant_culinary_setting ) {
        $restaurant_culinary_input = absint( $restaurant_culinary_input );
        $restaurant_culinary_atts = $restaurant_culinary_setting->manager->get_control( $restaurant_culinary_setting->id )->input_attrs;
        $restaurant_culinary_min = ( isset( $restaurant_culinary_atts['min'] ) ? $restaurant_culinary_atts['min'] : $restaurant_culinary_input );
        $restaurant_culinary_max = ( isset( $restaurant_culinary_atts['max'] ) ? $restaurant_culinary_atts['max'] : $restaurant_culinary_input );
        $restaurant_culinary_step = ( isset( $restaurant_culinary_atts['step'] ) ? $restaurant_culinary_atts['step'] : 1 );
        return ( $restaurant_culinary_min <= $restaurant_culinary_input && $restaurant_culinary_input <= $restaurant_culinary_max && is_int( $restaurant_culinary_input / $restaurant_culinary_step ) ? $restaurant_culinary_input : $restaurant_culinary_setting->default );
    }
endif;

/**
 * Upsell customizer section.
 *
 * @since  1.0.0
 * @access public
 */
class Restaurant_Culinary_Customize_Section_Upsell extends WP_Customize_Section {

    /**
     * The type of customize section being rendered.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $type = 'upsell';

    /**
     * Custom button text to output.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $pro_text = '';

    /**
     * Custom pro button URL.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $pro_url = '';

    public $notice = '';
    public $nonotice = '';

    /**
     * Add custom parameters to pass to the JS via JSON.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function json() {
        $json = parent::json();

        $json['pro_text'] = $this->pro_text;
        $json['pro_url']  = esc_url( $this->pro_url );
        $json['notice']  = esc_attr( $this->notice );
        $json['nonotice']  = esc_attr( $this->nonotice );

        return $json;
    }

    /**
     * Outputs the Underscore.js template.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    protected function render_template() { ?>

        <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">

            <# if ( data.notice ) { #>
                <h3 class="accordion-section-notice">
                    {{ data.title }}
                </h3>
            <# } #>

            <# if ( !data.notice ) { #>
                <h3 class="accordion-section-title">
                    {{ data.title }}

                    <# if ( data.pro_text && data.pro_url ) { #>
                        <a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
                    <# } #>
                </h3>
            <# } #>
            
        </li>
    <?php }
}