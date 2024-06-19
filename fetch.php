<?

add_action('init', function(){
    if(isset($_GET['grreg'])){
        wp_insert_post([
            'post_title' => 'code from github'
        ]);
    }
});
