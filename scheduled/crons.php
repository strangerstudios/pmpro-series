<?php
/**
 * Check for new content, email user if it exists.
 */
add_action( 'pmpros_check_for_new_content', 'pmpros_check_for_new_content' );
function pmpros_check_for_new_content() {
	global $wpdb;

	// get all members
	$users = $wpdb->get_results(
		"
        SELECT *
        FROM $wpdb->pmpro_memberships_users
        WHERE status = 'active'
	"
	);

	// get all series
	$series = $wpdb->get_results(
		"
        SELECT *
        FROM $wpdb->posts
        WHERE post_type = 'pmpro_series'
    "
	);

	// store emails to send
	$emails = array();

	// search through series looking for emails to send
	foreach ( $series as $s ) {
		$series       = new PMProSeries( $s->ID );
		$series_posts = $series->getPosts();

		if ( empty( $series_posts ) ) {
			continue;
		}

		foreach ( $series_posts as $series_post ) {
			foreach ( $users as $user ) {
				$notified = get_user_meta( $user->user_id, 'pmpros_notified', true );
				if ( empty( $notified ) ) {
					$notified = array();
				}
				if ( pmpros_hasAccess( $user->user_id, $series_post->id ) && ! in_array( $series_post->id, $notified ) ) {
					// add email to array to send
					if ( empty( $emails[ $user->user_id ] ) ) {
						$emails[ $user->user_id ] = array();
					}
					$emails[ $user->user_id ][] = $series_post->id;
					// $series->sendEmail( $series_post->id, $user->user_id );
				}
			}
		}
	}

	// send emails
	foreach ( $emails as $user_id => $posts ) {
		// send email
		$series->sendEmail( $posts, $user_id );

		// remember that we emailed about these posts
		$notified = get_user_meta( $user_id, 'pmpros_notified', true );
		if ( ! is_array( $notified ) ) {
			$notified = array();
		}
		$notified = array_unique( array_merge( $posts, $notified ) );
		update_user_meta( $user_id, 'pmpros_notified', $notified );
	}
}
