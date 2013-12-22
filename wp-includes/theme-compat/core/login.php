<?php
/**
 * This file contains the template for the login form. Do not edit this file
 * directly; instead copy it to your theme and edit there.
 *
 * Note that the form input names must not be changed, as this will break the
 * login form.
 *
 * @package WordPress
 * @subpackage Theme_Compat
 * @since 3.8
 */

login_header(__('Log In'), '', $errors);
?>

<form name="loginform" id="loginform" action="<?php echo esc_url( site_url( 'wp-login.php', 'login_post' ) ); ?>" method="post">
	<p>
		<label for="user_login"><?php _e('Username') ?><br />
		<input type="text" name="log" id="user_login" class="input" value="<?php echo esc_attr($user_login); ?>" size="20" /></label>
	</p>
	<p>
		<label for="user_pass"><?php _e('Password') ?><br />
		<input type="password" name="pwd" id="user_pass" class="input" value="" size="20" /></label>
	</p>
	<?php
	/**
	 * Fires following the 'Password' field in the login form.
	 *
	 * @since 2.1.0
	 */
	do_action( 'login_form' );
	?>
	<p class="forgetmenot"><label for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever" <?php checked( $rememberme ); ?> /> <?php esc_attr_e('Remember Me'); ?></label></p>
	<p class="submit">
		<input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="<?php esc_attr_e('Log In'); ?>" />
	</p>
</form>

<?php if ( ! $interim_login ) { ?>
	<p id="nav">
	<?php if ( ! isset( $_GET['checkemail'] ) || ! in_array( $_GET['checkemail'], array( 'confirm', 'newpass' ) ) ) :
		login_register_link( '', ' | ' );
		?>
		<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>" title="<?php esc_attr_e( 'Password Lost and Found' ); ?>"><?php _e( 'Lost your password?' ); ?></a>
	<?php endif; ?>
	</p>
<?php } ?>

<script type="text/javascript">
function wp_attempt_focus(){
	setTimeout( function(){
		try{
			<?php if ( $user_login || $interim_login ): ?>
				d = document.getElementById('user_pass');
				d.value = '';
			<?php else: ?>
				d = document.getElementById('user_login');
				<?php if ( 'invalid_username' == $errors->get_error_code() ): ?>
					if( d.value != '' )
						d.value = '';
				<?php endif; ?>
			<?php endif; ?>

			d.focus();
			d.select();
		} catch(e) {}
	}, 200);
}

<?php if ( !$error ): ?>
	wp_attempt_focus();
<?php endif; ?>

if ( typeof wpOnload=='function' ) wpOnload();

<?php if ( $interim_login ): ?>
	(function(){
	try {
		var i, links = document.getElementsByTagName('a');
		for ( i in links ) {
			if ( links[i].href )
				links[i].target = '_blank';
		}
	} catch(e){}
	}());
<?php endif; ?>
</script>

<?php
login_footer();
