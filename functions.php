<?php
add_action ( 'transition_post_status', 'mn_on_post_status_transition_archive', 10, 3 );
add_action ( 'edit_post', 'mn_on_post_edit', 10, 3 );

function mn_on_post_status_transition_archive( $new_status, $old_status, $post ) {
	if ( ( $old_status == 'publish' && $new_status != 'publish') || ( $old_status != 'publish' && $new_status == 'publish') ) {
		mn_invalidate_archive_cache();
	}
}

function mn_on_post_edit( $post_ID, $post ) {
	mn_invalidate_archive_cache();
}

function mn_invalidate_archive_cache() {
	wp_cache_delete( 'zh_archives', 'general' );
}
