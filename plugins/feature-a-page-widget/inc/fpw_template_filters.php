<?php
/**
 * Feature a Page Widget Template Tags
 *
 * Functions used in Widget Template Files for Output, Filtering, and Supporting Options
 *
 * You can change the widget output by copying any of the three template files
 * in the /fpw_views-2/ folder to an /fpw_views-2/ folder in the active theme.
 *
 * There are a variety of filters documented below that are provided to modify the output.
 *
 * @package feature_a_page_widget
 * @author 	Mark Root-Wiley (info@MRWweb.com)
 * @link 	http://wordpress.org/plugins/feature-a-page-widget
 * @since	2.0.0
 * @license	http://www.gnu.org/licenses/gpl-2.0.html	GPLv2 or later
 */
/**
 * apply filters to the_title in feature a page widget
 *
 * @since 2.0.0
 */
function fpw_page_title( $title, $post_id ) {

	/*$custom_title = get_post_meta( get_the_id(), 'fpw_page_title', true );
	if( $custom_title ) {
		$title = $custom_title;
	}*/

	$title = apply_filters( 'fpw_page_title', $title );

	return $title;

}

/**
 * output a post's Featured Image in a widget template file
 *
 * @since 2.0.0
 *
 * @param  string $image_size a registered image size
 * @return string             html output of image
 */
function fpw_featured_image_html( $html, $post_id, $post_thumbnail_id, $size, $attr ) {

	/*$custom_image_id = get_post_meta( $post_id, 'fpw_featured_image_id', true );
	if( $custom_image_id ) {
		$html = wp_get_attachment_image( $custom_image_id, $size, false, $attr );
	}*/

	// IDs are for backward compatibility with old filters
	$html = apply_filters( 'fpw_featured_image', $html, $post_id, $post_thumbnail_id, $size, $attr );

	return $html;

}

/**
 * apply custom image size filter for feature a page widget to post_thumbnail_size
 *
 * @since  2.0.0
 */
function fpw_image_size( $size ) {

	/**
	 * filter the image sizes in Feature a Page Widget
	 *
	 * @since  2.0.0
	 *
	 * @param  string $size image size slug registered by add_image_size()
	 *
	 * @return string|array       image size slug or width/height array for image size
	 */
	$size = apply_filters( 'fpw_image_size', $size );
	return $size;

}

/**
 * apply custom filters to the_excerpt in feature a page widget template
 *
 * @since 2.0.0
 */
function fpw_excerpt( $excerpt ) {

	$post_id = get_the_id();

	/**
	 * allow use of autogenerated excerpts
	 *
	 * by default, excerpt is empty if it is not explicitly set in the "Excerpt" field
	 *
	 * @since  2.0.0
	 *
	 * @param bool $fpw_auto_excerpt false by default
	 * @return bool whether to allow auto-generated excerpts when excerpt is empty
	 */
	$fpw_auto_excerpt = apply_filters( 'fpw_auto_excerpt', false );
	if( !has_excerpt() && ! (bool) $fpw_auto_excerpt ) {
		return;
	}

	/*$custom_excerpt = get_post_meta( $post_id, 'fpw_excerpt', true );
	if( $custom_excerpt ) {
		$excerpt = $custom_excerpt;
	}*/

	/**
	 * filter the_excerpt in feature a page widget
	 *
	 * @since  2.0.0
	 *
	 * @param   string 	$excerpt 	excerpt of post
	 * @param   int 	$post_id 	post id
	 * @return   string used as the excerpt
	 */
	$excerpt = apply_filters( 'fpw_excerpt', $excerpt, $post_id );

	return $excerpt;

}

/**
 * append accesible "Read More" link to a piece of text
 *
 * intended for use as a filter function
 * applied to the_excerpt fpw_widget_class.php based on widget settings
 *
 * @since 2.0.0
 *
 * @param  string $excerpt block of text to append link to
 * @return string          block of text with appended link
 */
function fpw_read_more( $excerpt ) {

	$default_read_more =  esc_html__( 'Read More', 'feature-a-page-widget' );
	/**
	 * change "Read More" text in "Read More about __{TITLE}__..." link
	 * @var string
	 * @since 2.0.0
	 */
	$read_more_text = apply_filters( 'fpw_read_more_text', $default_read_more );

	/**
	 * change or hide the "..." in the read more link
	 * @var string
	 * @since 2.0.2
	 */
	$read_more_ellipsis = apply_filters( 'fpw_read_more_ellipsis', '&hellip;' );

	$excerpt = $excerpt . ' <a class="fpw-read-more-link" href="' . get_permalink() . '">' .  esc_html( $read_more_text ) . '<span class="screen-reader-text"> ' . _x( 'about', 'Joining word in accessible read more link. Form: __"Read More"__ about {Page Title}','feature-a-page-widget' ) . ' "' . get_the_title() . '"</span>' . esc_html( $read_more_ellipsis ) . '</a>';

	return $excerpt;

}

/**
 * Apply filters (on which widget options rely) to widget templates
 */
function fpw_before_loop() {
	add_filter( 'the_title', 'fpw_page_title', 10, 2 );
	add_filter( 'get_the_excerpt', 'fpw_excerpt' );
	add_filter( 'post_thumbnail_size', 'fpw_image_size' );
	add_filter( 'post_thumbnail_html', 'fpw_featured_image_html', 10, 5 );
}
add_action( 'fpw_loop_start', 'fpw_before_loop' );

/**
 * Remove filters applied to widget templates to avoid interfering with other stuff
 */
function fpw_after_loop() {
	remove_filter( 'the_title', 'fpw_page_title', 10 );
	remove_filter( 'get_the_excerpt', 'fpw_excerpt' );
	remove_filter( 'post_thumbnail_size', 'fpw_image_size' );
	remove_filter( 'post_thumbnail_html', 'fpw_featured_image_html', 10 );
}
add_action( 'fpw_loop_end', 'fpw_after_loop' );