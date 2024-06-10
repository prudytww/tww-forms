<?php
namespace TWWForms\Shortcodes;

class TWW_FreeShortcode extends TWW_Shortcodes {
    public function set_sc_settings() {
        $this->sc_settings = [
            'name' => 'tww_free_subscription',
            'handle' => 'free-subscription-shortcode',
            'css_handle' => 'free-subscription-shortcode',
        ];
    }

    public function render_shortcode($atts, $content = null) {
        wp_enqueue_script('free-subscription-shortcode');
        wp_enqueue_style('free-subscription-shortcode');

        $atts = shortcode_atts([
            'justify' => 'flex-start',
            'post_id' => get_the_ID(),
            'redirect_url' => home_url(),
        ], $atts);
        
        ob_start();
        include TWW_FORMS_PLUGIN . 'templates/free-subscription-form-shortcode.php';
        return ob_get_clean();
    }
}