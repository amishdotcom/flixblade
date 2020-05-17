<?php

$logged = 0;

$member_id = array ();

if( isset( $_POST['username'] ) and isset( $_POST['password'] ) )
{
	$username = $db->safesql( $_POST['username'] );

	$password =  trim ( $_POST['password'] );
	
    if( $username && $password ) {

        $member_id = $db->super_query( "SELECT * FROM ninacoder_users where username ='{$_POST['username']}'");

        if( password_verify($password, $member_id['password']) ){

            set_cookie( "user_id", $member_id['user_id'], 365 );

            set_cookie( "password", $member_id['password'], 365 );

            $_SESSION['user_id'] = $member_id['user_id'];

            $_SESSION['password'] = $member_id['password'];

            $logged = true;

        }

    }

} elseif( isset( $_SESSION['user_id'] ) AND  intval( $_SESSION['user_id'] ) > 0 AND $_SESSION['password'] ) {

	$member_id = $db->super_query( "SELECT * FROM ninacoder_users WHERE user_id='" . intval( $_SESSION['user_id'] ) . "'" );

	if( $member_id['password'] == $_SESSION['password'] ) {

		$logged = true;

	} else {

		$member_id = array ();

		$logged = false;

	}
} elseif( isset( $_COOKIE['user_id'] ) AND intval( $_COOKIE['user_id'] ) > 0 ) {

	$member_id = $db->super_query( "SELECT * FROM ninacoder_users WHERE user_id='" . intval( $_COOKIE['user_id'] ) . "'" );

	if( $member_id['password'] == $_COOKIE['password'] ) {

		$logged = true;

		$_SESSION['user_id'] = $member_id['user_id'];

		$_SESSION['password'] = $_COOKIE['password'];

	} else {

		$member_id = array ();

		$logged = false;

	}
}
?>