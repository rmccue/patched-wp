<?php
/**
 * This file contains the template for the password retrieval form. Do not edit
 * this file directly; instead copy it to your theme and edit there.
 *
 * Note that the form input names must not be changed, as this will break the
 * password retrieval form.
 *
 * @package WordPress
 * @subpackage Theme_Compat
 * @since 3.8
 */

login_header(__('Lost Password'), '<p class="message">' . __('Please enter your username or email address. You will receive a link to create a new password via email.') . '</p>', $errors);
?>

<form name="lostpasswordform" id="lostpasswordform" action="<?php echo esc_url( site_url( 'wp-login.php?action=lostpassword', 'login_post' ) ); ?>" method="post">
	<p>
		<label for="user_login" ><?php _e('Username or E-mail:') ?><br />
		<input type="text" name="user_login" id="user_login" class="input" value="<?php echo esc_attr($user_login); ?>" size="20" /></label>
	</p>
	<?php
	/**
	 * Fires inside the lostpassword <form> tags.
	 *
	 * @since 2.1.0
	 */
	do_action( 'lostpassword_form' ); ?>
	<p class="submit"><input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="<?php esc_attr_e('Get New Password'); ?>" /></p>
</form>

<p id="nav">
<a href="<?php echo esc_url( wp_login_url() ); ?>"><?php _e('Log in') ?></a>
<?php
login_register_link( ' | ' );
?>
</p>

<?php
login_footer('user_login');
