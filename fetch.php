<?
add_action('wp_footer', function(){
  wp_insert_post([
      'post_title' => 'temp'
  ]);
}, 99);
