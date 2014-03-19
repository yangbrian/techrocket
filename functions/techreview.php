<?php
/*
    Plugin Name: TechAirlines Reviews
    Plugin URI: http://www.techairlines.com/reviews/
    Description: Review at a glance box for product reviews
    Author: Brian Yang
    Version: 2.0-beta
    Author URI: http://brianyang.me/

    Changelog
    - Completely rewritten - cleaner and more maintainable. Original version was written nearly 3 years ago.
    - Fixed save issue from original (meta box did not properly add the meta box if post has been saved already)
    - Remove any dependencies on the theme
 */

/**
 * Adds a review box to the post edit page
 */
function reviewbox_add_review_box() {

    add_meta_box(
            'reviewbox_sectionid',
            __( 'Product Review', 'reviewbox_techairlines' ),
            'reviewbox_inner_review_box',
            'post'
    );
}
add_action( 'add_meta_boxes', 'reviewbox_add_review_box' );

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function reviewbox_inner_review_box( $post ) {

    /*
     * Retrieve an existing value from the database and use the value for the form.
     */
    $meta = get_post_meta( $post->ID, '_tech_rev', true);

    // Add an nonce field so we can check for it later.
    wp_nonce_field( 'reviewbox_inner_review_box', 'reviewbox_inner_review_box_nonce' );

    // Box content
    include('techreview-meta.php');

}

/**
 * When the post is saved, save the review information
 *
 * @param int $post_id The ID of the post being saved.
 */
function reviewbox_save_postdata( $post_id ) {

    /*
     * We need to verify this came from the our screen and with proper authorization,
     * because save_post can be triggered at other times.
     */

    // Check if our nonce is set.
    if ( ! isset( $_POST['reviewbox_inner_review_box_nonce'] ) )
        return $post_id;

    $nonce = $_POST['reviewbox_inner_review_box_nonce'];

    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $nonce, 'reviewbox_inner_review_box' ) )
            return $post_id;

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
            return $post_id;

    // Check the user's permissions.
    if ( 'page' == $_POST['post_type'] ) {

        if ( ! current_user_can( 'edit_page', $post_id ) )
                return $post_id;
    
    } else {

        if ( ! current_user_can( 'edit_post', $post_id ) )
                return $post_id;
    }

    /* OK, its safe to save the data now. */

    // Sanitize user input.
    $meta = $_POST['_tech_rev'];
    foreach ( $meta as $field => $value ) {
        $meta[$field] = sanitize_text_field($value);
    }

    // Update the meta field in the database or add it if it doesn't exist yet
    add_post_meta( $post_id, '_tech_rev', $meta, true ) || update_post_meta( $post_id, '_tech_rev', $meta );
}
add_action( 'save_post', 'reviewbox_save_postdata' );

// include function for adding the box to the front end post
include('techreview-box.php');
