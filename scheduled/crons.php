<?php
/* Check for new content, email user if it exists. */
function pmpros_check_for_new_content() {

    global $wpdb;

    //get all members
    $users = $wpdb->get_results("
        SELECT *
        FROM $wpdb->pmpro_memberships_users
        WHERE status = 'active'
	");

    //get all series
    $series = $wpdb->get_results("
        SELECT *
        FROM $wpdb->posts
        WHERE post_type = 'pmpro_series'
    ");

    foreach($series as $s) {
        $series = new PMProSeries($s->ID);
        $series_posts = $series->getPosts();
        foreach($series_posts as $series_post) {
            foreach($users as $user) {
                $notified = get_user_meta($user->user_id,'pmpros_notified', true);
                if(pmpros_hasAccess($user->user_id, $series_post->id) && !in_array($series_post->id, $notified)) {
                    $series->sendEmail($series_post->id, $user->user_id);
                    $notified[] = $series_post->id;
                    update_user_meta($user->user_id, 'pmpros_notified', $notified);
                }
            }
        }
    }
}