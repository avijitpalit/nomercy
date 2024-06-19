<?php
function custom_post_type_books() {
    // Labels for the Post Type
    $labels = array(
        'name'                  => _x('Books', 'Post Type General Name', 'textdomain'),
        'singular_name'         => _x('Book', 'Post Type Singular Name', 'textdomain'),
        'menu_name'             => __('Books', 'textdomain'),
        'name_admin_bar'        => __('Book', 'textdomain'),
        'archives'              => __('Book Archives', 'textdomain'),
        'attributes'            => __('Book Attributes', 'textdomain'),
        'parent_item_colon'     => __('Parent Book:', 'textdomain'),
        'all_items'             => __('All Books', 'textdomain'),
        'add_new_item'          => __('Add New Book', 'textdomain'),
        'add_new'               => __('Add New', 'textdomain'),
        'new_item'              => __('New Book', 'textdomain'),
        'edit_item'             => __('Edit Book', 'textdomain'),
        'update_item'           => __('Update Book', 'textdomain'),
        'view_item'             => __('View Book', 'textdomain'),
        'view_items'            => __('View Books', 'textdomain'),
        'search_items'          => __('Search Book', 'textdomain'),
        'not_found'             => __('Not found', 'textdomain'),
        'not_found_in_trash'    => __('Not found in Trash', 'textdomain'),
        'featured_image'        => __('Featured Image', 'textdomain'),
        'set_featured_image'    => __('Set featured image', 'textdomain'),
        'remove_featured_image' => __('Remove featured image', 'textdomain'),
        'use_featured_image'    => __('Use as featured image', 'textdomain'),
        'insert_into_item'      => __('Insert into book', 'textdomain'),
        'uploaded_to_this_item' => __('Uploaded to this book', 'textdomain'),
        'items_list'            => __('Books list', 'textdomain'),
        'items_list_navigation' => __('Books list navigation', 'textdomain'),
        'filter_items_list'     => __('Filter books list', 'textdomain'),
    );

    // Arguments for the Post Type
    $args = array(
        'label'                 => __('Book', 'textdomain'),
        'description'           => __('A custom post type for books', 'textdomain'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
        'taxonomies'            => array('category', 'post_tag'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
        'rewrite'               => array('slug' => 'books'), // Custom URL slug
    );

    // Registering the Post Type
    register_post_type('books', $args);
}

// Hooking up our function to the init action
add_action('init', 'custom_post_type_books');
?>
