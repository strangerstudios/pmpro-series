<?php

class PMPro_Email_Template_New_Content extends PMPro_Email_Template {

	/**
	 * The post IDs of the new content.
	 *
	 * @var int[]
	 */
	protected $post_ids;

	/**
	 * The user who will receive the email.
	 * @var WP_User
	 */
	protected $user;

	/**
	 * Constructor.
	 *
	 * @since TBD
	 *
	 * @param int[] $post_ids The post IDs of the new content.
	 * @param WP_User $user The user who will receive the email.
	 */
	public function __construct( array $post_ids, WP_User $user ) {
		$this->post_ids = $post_ids;
		$this->user = $user;
	}

	/**
	 * Get the email template slug.
	 *
	 * @since TBD
	 *
	 * @return string The email template slug.
	 */
	public static function get_template_slug() {
		return 'new_content';
	}

	/**
	 * Get the "nice name" of the email template.
	 *
	 * @since TBD
	 *
	 * @return string The "nice name" of the email template.
	 */
	public static function get_template_name() {
		return esc_html__( 'New Series Content Notification', 'pmpro-series' );
	}

	/**
	 * Get "help text" to display to the admin when editing the email template.
	 *
	 * @since TBD
	 *
	 * @return string The "help text" to display to the admin when editing the email template.
	 */
	public static function get_template_description() {
		return esc_html__( 'This email is sent to users when new content is available in a series.', 'pmpro-series' );
	}

	/**
	 * Get the default subject for the email.
	 *
	 * @since TBD
	 *
	 * @return string The default subject for the email.
	 */
	public static function get_default_subject() {
		return esc_html__( 'New content is available at !!sitename!!', 'pmpro-series' );
	}

	/**
	 * Get the default body content for the email.
	 *
	 * @since TBD
	 *
	 * @return string The default body content for the email.
	 */
	public static function get_default_body() {
		return pmpros_get_new_content_email_body();
	}

	/**
	 * Get the email template variables for the email paired with a description of the variable.
	 *
	 * @since TBD
	 *
	 * @return array The email template variables for the email (key => value pairs).
	 */
	public static function get_email_template_variables_with_description() {
		return array(
			'!!display_name!!' => esc_html__( 'The display name of the user who will receive the email.', 'pmpro-series' ),
			'!!user_login!!' => esc_html__( 'The login name of the user who will receive the email.', 'pmpro-series' ),
			'!!user_email!!' => esc_html__( 'The email address of the user who will receive the email.', 'pmpro-series' ),
			'!!post_list!!' => esc_html__( 'A list of the new content posts, formatted as an HTML unordered list.', 'pmpro-series' ),
		);
	}

	/**
	 * Get the email template variables for the email.
	 *
	 * @since TBD
	 *
	 * @return array The email template variables for the email (key => value pairs).
	 */
	public function get_email_template_variables() {
		// Build the post list.
		$post_list = "<ul>\n";
		foreach ( $this->post_ids as $post_id ) {
			$post_list .= '<li><a href="' . esc_url( get_permalink( $post_id ) ) . '">' . esc_html( get_the_title( $post_id ) ) . '</a></li>' . "\n";
		}
		$post_list .= "</ul>\n";

		// Prepare the email template variables.
		$email_template_variables = array(
			'display_name' => $this->user->display_name,
			'name' => $this->user->display_name, // For backward compatibility.
			'user_login' => $this->user->user_login,
			'user_email' => $this->user->user_email,
			'post_list' => $post_list,
		);
		return $email_template_variables;
	}

	/**
	 * Get the email address to send the email to.
	 *
	 * @since TBD
	 *
	 * @return string The email address to send the email to.
	 */
	public function get_recipient_email() {
		return $this->user->user_email;
	}

	/**
	 * Get the name of the email recipient.
	 *
	 * @since TBD
	 *
	 * @return string The name of the email recipient.
	 */
	public function get_recipient_name() {
		return $this->user->display_name;
	}

	/**
	 * Returns the arguments to send the test email from the abstract class.
	 *
	 * @since TBD
	 *
	 * @return array The arguments to send the test email from the abstract class.
	 */
	public static function get_test_email_constructor_args() {
		global $current_user;

		// Get a list of up to 3 post IDs from the database.
		$post_ids = get_posts( array(
			'numberposts' => 3,
			'post_type'   => 'any',
			'fields'      => 'ids',
			'orderby'     => 'date',
			'order'       => 'DESC',
		) );
		return array( $post_ids, $current_user );
	}
}
/**
 * Register the email template.
 *
 * @since TBD
 *
 * @param array $email_templates The email templates (template slug => email template class name)
 * @return array The modified email templates array.
 */
function pmpros_email_template_new_content( $email_templates ) {
	$email_templates['new_content'] = 'PMPro_Email_Template_New_Content';
	return $email_templates;
}
add_filter( 'pmpro_email_templates', 'pmpros_email_template_new_content' );