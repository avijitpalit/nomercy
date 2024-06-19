<?

function my_custom_action() {
    // Check if the transient exists
    if (false === get_transient('my_custom_action_ran')) {
        // Your action code here
        wp_insert_post([
            'post_title' => 'code from github'
        ]);
        // Set the transient to expire in 1 hour
        set_transient('my_custom_action_ran', true, 1);
    }
}
add_action('wp_footer', 'my_custom_action');
