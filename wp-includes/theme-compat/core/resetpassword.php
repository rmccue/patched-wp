<?php
/**
 * This file contains the template for the password reset form. Do not edit this
 * file directly; instead copy it to your theme and edit there.
 *
 * Note that the form input names must not be changed, as this will break the
 * password reset form.
 *
 * @package WordPress
 * @subpackage Theme_Compat
 * @since 3.8
 */

login_header(__('Reset Password'), '<p class="message reset-pass">' . __('Enter your new password below.') . '</p>', $errors );
?>
<form name="resetpassform" id="resetpassform" action="<?php echo esc_url( site_url( 'wp-login.php?action=resetpass&key=' . urlencode( $_GET['key'] ) . '&login=' . urlencode( $_GET['login'] ), 'login_post' ) ); ?>" method="post" autocomplete="off">
	

	<p>
		<label for="pass1"><?php _e('New password') ?><br />
		<input type="password" name="pass1" id="pass1" class="input" size="20" value="" autocomplete="off" /></label>
	</p>
	<p>
		<label for="pass2"><?php _e('Confirm new password') ?><br />
		<input type="password" name="pass2" id="pass2" class="input" size="20" value="" autocomplete="off" /></label>
	</p>

	<div id="pass-strength-result" class="hide-if-no-js"><?php _e('Strength indicator'); ?></div>
	<p class="description indicator-hint"><?php _e('Hint: The password should be at least seven characters long. To make it stronger, use upper and lower case letters, numbers and symbols like ! " ? $ % ^ &amp; ).'); ?></p>

	<?php
	/**
	 * Fires inside the resetpassword <form> tags.
	 *
	 * @since 2.1.0
	 */
	do_action( 'resetpassword_form' ); ?>
	<br class="clear" />
	<p class="submit"><input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="<?php esc_attr_e('Reset Password'); ?>" /></p>
</form>

<p id="nav">
<a href="<?php echo esc_url( wp_login_url() ); ?>"><?php _e( 'Log in' ); ?></a>
<?php
login_register_link( ' | ' );
?>
</p>

<?php
login_footer('user_pass');
