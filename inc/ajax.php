<?php

add_action( 'wp_ajax_nopriv_notifier.search_users', 'search_users' );
add_action( 'wp_ajax_notifier.search_users', 'search_users' );

function search_users( $request = null ){

	$response = (object) array(
		'status' => false,
		'message' => __( 'Your request has failed', 'notifier' ),
		'results' => array(),
		'more' => true,
	);

	if ( ( is_null( $request ) ) || ! is_user_logged_in() ){
		return ( exit( json_encode( $response ) ) );
	}

	$request = (object) wp_parse_args(
		$request,
		array(
			'search' => isset( $_POST['search'] ) ? $_POST['search'] : '',
			'page' => absint( isset( $_POST['page'] ) ? $_POST['page'] : 0 ),
			'page_limit' => absint( isset( $_POST['page_limit'] ) ? $_POST['page_limit'] : 10 ),
		)
	);

	$response->status  = true;
	$response->message = __( 'Request successful', 'notifier' );

	$query_args = array(
		'orderby' => 'display_name',
		'offset'  => $request->page_limit * ( $request->page - 1 ),
		'number'  => $request->page_limit,
	);

	if ( ! empty( $request->search ) ){
		$query_args['search'] = "*{$request->search}*";
		$query_args['search_columns'] = array(
			'user_login',
			'user_nicename',
			'user_email',
			'user_url',
		);
	}

	$users = new WP_User_Query( $query_args );

	foreach ( $users->results as $result ){
		$response->results[] = $result;
	}

	if ( empty( $response->results ) || count( $response->results ) < $request->page_limit ){
		$response->more = false;
	}

	return ( exit( json_encode( $response ) )  );
}