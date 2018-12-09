<?php

/*
 * Signup 1
 *
 * Adds a signup form for MailChimp
 */

$signup_note    = ( ! empty( get_theme_mod( 'signup_note' ) ) ) ? '<p><strong>' . stripslashes_deep( get_theme_mod( 'signup_note' ) ) . '</strong></p>' : '';
$fields         = ( ! empty( get_theme_mod( 'signup_name' ) ) ) ? true : false;
$class          = ( $fields ) ? 'four-col' : 'kcso-col';
?>

<?php do_action( 'kcs_signup_above_hook' ); ?>
<section id="section-signup" class="signup section">
    <div class="container">
        <div class="section-content text-center">
            <?php if ( $signup_note ) : ?>
                <div class="section-signup-note xl">
                    <?php echo $signup_note; ?>
                </div>
            <?php endif; ?>

            <div class="section-signup-form">
                <?php do_action( 'kcs_signup_above_form_hook' ); ?>
                <form id="signup" class="signup-form-inline" name="signup">
                    <?php if ( $fields ) : ?>
                        <input class="text firstname signup-fields inline <?php echo $class; ?>" name="firstname" type="text" placeholder="<?php _e( 'First Name', 'kcs' ); ?>" />
                        <input class="text lastname signup-fields inline<?php echo $class; ?>" name="lastname" type="text" placeholder="<?php _e( 'Last Name', 'kcs' ); ?>" />
                    <?php endif; ?>
                    <input class="email text signup-fields inline <?php echo $class; ?>" name="email" type="text" placeholder="<?php _e( 'Email Address', 'kcs' ); ?>"/>
                    <a id="submitButton" href="javascript:void(0)" class="progress-button signup-button signup-fields button inline <?php echo $class; ?>" data-loading="<?php _e( 'Processing...', 'kcs' ); ?>"  data-finished="<?php _e( 'Thanks for signing up', 'kcs' ); ?>!" data-success="<?php _e( 'Thanks for signing up', 'kcs' ); ?>!" data-type="background-bar" data-fail="<?php _e( 'Sorry, try again', 'kcs' ); ?>!"><?php _e( 'Sign up', 'kcs' ); ?></a>
                </form>
                <?php do_action( 'kcs_signup_below_form_hook' ); ?>
            </div>
        </div>
    </div>
</section>
<?php do_action( 'kcs_signup_below_hook' ); ?>