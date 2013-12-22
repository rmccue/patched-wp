<?php
/**
 * This file contains the template for the registration form. Do not edit this
 * file directly; instead copy it to your theme and edit there.
 *
 * Note that the form input names must not be changed, as this will break the
 * registration form.
 *
 * @package WordPress
 * @subpackage Theme_Compat
 * @since 3.8
 */

login_header(__('Registration Form'), '<p class="message register">' . __('Register For This Site') . '</p>', $errors);
?>

<form name="registerform" id="registerform" action="<?php echo esc_url( site_url('wp-login.php?action=register', 'login_post') ); ?>" method="post">
	<p>
		<label for="user_login"><?php _e('Username') ?><br />
		<input type="text" name="user_login" id="user_login" class="input" value="<?php echo esc_attr(wp_unslash($user_login)); ?>" size="20" /></label>
	</p>
	<p>
		<label for="user_email"><?php _e('E-mail') ?><br />
		<input type="text" name="user_email" id="user_email" class="input" value="<?php echo esc_attr(wp_unslash($user_email)); ?>" size="25" /></label>
	</p>
	<?php
	/**
	 * Fires following the 'E-mail' field in the user registration form.
	 *
	 * @since 2.1.0
	 */
	do_action( 'register_form' );
	?>
	<p id="reg_passmail"><?php _e('A password will be e-mailed to you.') ?></p>
	<br class="clear" />
	<p class="submit"><input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="<?php esc_attr_e('Register'); ?>" /></p>
</form>

<p id="nav">
<a href="<?php echo esc_url( wp_login_url() ); ?>"><?php _e( 'Log in' ); ?></a> |
<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>" title="<?php esc_attr_e( 'Password Lost and Found' ) ?>"><?php _e( 'Lost your password?' ); ?></a>
</p>

<?php
login_footer('user_login');
