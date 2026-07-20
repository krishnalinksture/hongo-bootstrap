<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( ! comments_open() ) {
	return;
}

?>
<div id="reviews" class="woocommerce-Reviews">
	<div id="comments">
		<?php
			$hongo_single_product_enable_tab_content_heading = hongo_option( 'hongo_single_product_enable_tab_content_heading', '0' );
			if( $hongo_single_product_enable_tab_content_heading == '1' ) {
		?>
			<h2 class="woocommerce-Reviews-title alt-font">
				<?php
				$count = $product->get_review_count();
				if ( $count && wc_review_ratings_enabled() ) {
					/* translators: 1: reviews count 2: product name */
					$reviews_title = sprintf( esc_html( _n( '%1$s review for %2$s', '%1$s reviews for %2$s', $count, 'hongo' ) ), esc_html( $count ), '<span>' . get_the_title() . '</span>' );
					echo apply_filters( 'woocommerce_reviews_title', $reviews_title, $count, $product ); // WPCS: XSS ok.
				} else {
					esc_html_e( 'Reviews', 'hongo' );
				}
				?>
			</h2>
		<?php } ?>

		<?php if ( have_comments() ) : ?>

			<ol class="commentlist">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</ol>

			<?php
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
				?>
				<nav class="woocommerce-pagination">
				<?php
					paginate_comments_links(
						apply_filters(
							'woocommerce_comment_pagination_args',
							array(
								'prev_text' => '&larr;',
								'next_text' => '&rarr;',
								'type'      => 'list',
							)
						)
					);
				?>
				</nav>
			<?php } ?>

		<?php else : ?>

			<p class="woocommerce-noreviews"><?php _e( 'There are no reviews yet.', 'hongo' ); ?></p>

		<?php endif; ?>
	</div>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>

		<div id="review_form_wrapper">
			<div id="review_form">
				<?php
				$commenter = wp_get_current_commenter();

				$comment_form = array(
					/* translators: %s is product title */
					'title_reply'          => have_comments() ? __( 'Add a review', 'hongo' ) : sprintf( __( 'Be the first to review &ldquo;%s&rdquo;', 'hongo' ), get_the_title() ),
					/* translators: %s is product title */
					'title_reply_to'       => __( 'Leave a Reply to %s', 'hongo' ),
					'title_reply_before'   => '<span id="reply-title" class="comment-reply-title alt-font">',
					'title_reply_after'    => '</span>',
					'comment_notes_after'  => '',
					'label_submit'  => __( 'Submit', 'hongo' ),
					'class_submit'  => 'submit alt-font comment-button',
					'logged_in_as'  => '',
					'comment_field' => '',
				);

				$name_email_required = (bool) get_option( 'require_name_email', 1 );
				$fields              = array(
					'author' => array(
						'label'    => __( 'Name', 'hongo' ),
						'type'     => 'text',
						'value'    => $commenter['comment_author'],
						'required' => $name_email_required,
					),
					'email'  => array(
						'label'    => __( 'Email', 'hongo' ),
						'type'     => 'email',
						'value'    => $commenter['comment_author_email'],
						'required' => $name_email_required,
					),
				);

				$comment_form['fields'] = array();

				foreach ( $fields as $key => $field ) {
					$field_html  = '<p class="comment-form-' . esc_attr( $key ) . '">';
					$field_html .= '<label for="' . esc_attr( $key ) . '">' . esc_html( $field['label'] );

					if ( $field['required'] ) {
						$field_html .= '&nbsp;<span class="required">*</span>';
					}

					$field_html .= '</label><input id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" type="' . esc_attr( $field['type'] ) . '" value="' . esc_attr( $field['value'] ) . '" size="30" ' . ( $field['required'] ? 'required' : '' ) . ' /></p>';

					$comment_form['fields'][ $key ] = $field_html;
				}

				$account_page_url = wc_get_page_permalink( 'myaccount' );
				if ( $account_page_url ) {
					/* translators: %s opening and closing link tags respectively */
					$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( esc_html__( 'You must be %1$slogged in%2$s to post a review.', 'hongo' ), '<a href="' . esc_url( $account_page_url ) . '">', '</a>' ) . '</p>';
				}

				if ( wc_review_ratings_enabled() ) {
					$comment_form['comment_field'] = '<div class="comment-form-rating"><label for="rating">' . esc_html__( 'Your rating', 'hongo' ) . '</label><select name="rating" id="rating" required>
						<option value="">' . esc_html__( 'Rate&hellip;', 'hongo' ) . '</option>
						<option value="5">' . esc_html__( 'Perfect', 'hongo' ) . '</option>
						<option value="4">' . esc_html__( 'Good', 'hongo' ) . '</option>
						<option value="3">' . esc_html__( 'Average', 'hongo' ) . '</option>
						<option value="2">' . esc_html__( 'Not that bad', 'hongo' ) . '</option>
						<option value="1">' . esc_html__( 'Very poor', 'hongo' ) . '</option>
					</select></div>';
				}

				$comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Your review', 'hongo' ) . '<span class="required">*</span></label><textarea id="comment" class="comment-field" name="comment" cols="45" rows="8"  aria-required="true"></textarea></p>';

				comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
			</div>
		</div>

	<?php else : ?>

		<p class="woocommerce-verification-required"><?php _e( 'Only logged in customers who have purchased this product may leave a review.', 'hongo' ); ?></p>

	<?php endif; ?>

	<div class="clear"></div>
</div>
