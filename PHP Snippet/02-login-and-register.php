<?php
/**
 * Agro Connect — Login & Register Page Setup + Styles
 */



add_action('init', 'agroconnect_create_auth_pages');
function agroconnect_create_auth_pages() {

    // Create Login page
    if ( ! get_option('agroconnect_login_page_id') ) {
        $login_page = array(
            'post_title'   => 'Login',
            'post_name'    => 'login',
            'post_content' => '[agroconnect_login_form]',
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_author'  => 1,
        );
        $login_id = wp_insert_post( $login_page );
        if ( $login_id && ! is_wp_error( $login_id ) ) {
            update_option( 'agroconnect_login_page_id', $login_id );
        }
    }

    // Create Register page
    if ( ! get_option('agroconnect_register_page_id') ) {
        $register_page = array(
            'post_title'   => 'Register',
            'post_name'    => 'register',
            'post_content' => '[agroconnect_register_form]',
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_author'  => 1,
        );
        $register_id = wp_insert_post( $register_page );
        if ( $register_id && ! is_wp_error( $register_id ) ) {
            update_option( 'agroconnect_register_page_id', $register_id );
        }
    }
}



add_shortcode('agroconnect_login_form', 'agroconnect_render_login_form');
function agroconnect_render_login_form() {

    // If already logged in, redirect to My Account
    if ( is_user_logged_in() ) {
        wp_redirect( wc_get_account_endpoint_url('dashboard') );
        exit;
    }

    ob_start();

    // Show WooCommerce login errors/notices
    wc_print_notices();

    $register_url = get_permalink( get_option('agroconnect_register_page_id') );
    $myaccount_url = get_permalink( get_option('woocommerce_myaccount_page_id') );

    ?>
    <div class="agro-auth-wrap">
        <div class="agro-auth-card">

            <div class="agro-auth-brand">
                <div class="agro-brand-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6" width="28" height="28">
                        <path d="M12 2C6 2 3 7 3 12c0 2.5 1 5 3 7M12 2c6 0 9 5 9 10 0 2.5-1 5-3 7M12 2v20M3 12h18"/>
                    </svg>
                </div>
                <span class="agro-brand-name">Agro Connect</span>
            </div>

            <h1 class="agro-auth-title">Welcome back</h1>
            <p class="agro-auth-sub">Sign in to your account to continue shopping.</p>

            <form class="agro-form" method="post" action="<?php echo esc_url( $myaccount_url ); ?>">
                <?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
                <input type="hidden" name="login" value="Login" />

                <div class="agro-field">
                    <label for="agro_username">Email address</label>
                    <input type="text" id="agro_username" name="username" autocomplete="username" placeholder="you@example.com" required />
                </div>

                <div class="agro-field">
                    <label for="agro_password">Password</label>
                    <input type="password" id="agro_password" name="password" autocomplete="current-password" placeholder="Enter your password" required />
                    <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>" class="agro-forgot">Forgot password?</a>
                </div>

                <div class="agro-remember">
                    <label class="agro-check-label">
                        <input type="checkbox" name="rememberme" value="forever" />
                        <span>Keep me signed in</span>
                    </label>
                </div>

                <button type="submit" class="agro-btn">Sign In</button>

                <p class="agro-switch">
                    Don't have an account?
                    <a href="<?php echo esc_url( $register_url ); ?>">Create one</a>
                </p>
            </form>

        </div>
    </div>
    <?php

    return ob_get_clean();
}


add_shortcode('agroconnect_register_form', 'agroconnect_render_register_form');
function agroconnect_render_register_form() {

    if ( is_user_logged_in() ) {
        wp_redirect( wc_get_account_endpoint_url('dashboard') );
        exit;
    }

    ob_start();

    wc_print_notices();

    $login_url    = get_permalink( get_option('agroconnect_login_page_id') );
    $myaccount_url = get_permalink( get_option('woocommerce_myaccount_page_id') );

    ?>
    <div class="agro-auth-wrap">
        <div class="agro-auth-card">

            <div class="agro-auth-brand">
                <div class="agro-brand-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6" width="28" height="28">
                        <path d="M12 2C6 2 3 7 3 12c0 2.5 1 5 3 7M12 2c6 0 9 5 9 10 0 2.5-1 5-3 7M12 2v20M3 12h18"/>
                    </svg>
                </div>
                <span class="agro-brand-name">Agro Connect</span>
            </div>

            <h1 class="agro-auth-title">Create account</h1>
            <p class="agro-auth-sub">Join Agro Connect and start shopping fresh produce.</p>

            <form class="agro-form" method="post" action="<?php echo esc_url( $myaccount_url ); ?>">
                <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
                <input type="hidden" name="register" value="Register" />

                <div class="agro-field-row">
                    <div class="agro-field">
                        <label for="agro_first_name">First name</label>
                        <input type="text" id="agro_first_name" name="billing_first_name" placeholder="John" required />
                    </div>
                    <div class="agro-field">
                        <label for="agro_last_name">Last name</label>
                        <input type="text" id="agro_last_name" name="billing_last_name" placeholder="Doe" required />
                    </div>
                </div>

                <div class="agro-field">
                    <label for="agro_email">Email address</label>
                    <input type="email" id="agro_email" name="email" autocomplete="email" placeholder="you@example.com" required />
                </div>

                <div class="agro-field">
                    <label for="agro_phone">Phone number</label>
                    <input type="text" id="agro_phone" name="billing_phone" placeholder="+234 800 000 0000" />
                </div>

                <div class="agro-field">
                    <label for="agro_reg_password">Password</label>
                    <input type="password" id="agro_reg_password" name="password" autocomplete="new-password" placeholder="Create a strong password" required />
                </div>

                <div class="agro-terms">
                    <label class="agro-check-label">
                        <input type="checkbox" name="agro_terms" required />
                        <span>I agree to the <a href="/terms-and-conditions" target="_blank">Terms & Conditions</a></span>
                    </label>
                </div>

                <button type="submit" class="agro-btn">Create Account</button>

                <p class="agro-switch">
                    Already have an account?
                    <a href="<?php echo esc_url( $login_url ); ?>">Sign in</a>
                </p>
            </form>

        </div>
    </div>
    <?php

    return ob_get_clean();
}


add_action('woocommerce_created_customer', 'agroconnect_save_register_fields');
function agroconnect_save_register_fields( $customer_id ) {
    if ( isset( $_POST['billing_first_name'] ) ) {
        update_user_meta( $customer_id, 'first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
        update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
    }
    if ( isset( $_POST['billing_last_name'] ) ) {
        update_user_meta( $customer_id, 'last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
        update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
    }
    if ( isset( $_POST['billing_phone'] ) ) {
        update_user_meta( $customer_id, 'billing_phone', sanitize_text_field( $_POST['billing_phone'] ) );
    }
}



add_action('wp_head', 'agroconnect_auth_styles');
function agroconnect_auth_styles() {

    $login_id    = get_option('agroconnect_login_page_id');
    $register_id = get_option('agroconnect_register_page_id');

    if ( ! is_page( $login_id ) && ! is_page( $register_id ) ) return;

    ?>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

    :root {
        --agro-green-dark:  #1a3a1a;
        --agro-green:       #2d5a27;
        --agro-green-mid:   #3d7a35;
        --agro-green-pale:  #f3f7f0;
        --agro-gold:        #c8922a;
        --agro-cream:       #faf8f3;
        --agro-white:       #ffffff;
        --agro-text:        #1c2b1c;
        --agro-muted:       #5a6e55;
        --agro-border:      #d4e0cc;
    }

    body {
        font-family: 'Poppins', sans-serif !important;
        background: var(--agro-cream) !important;
        margin: 0;
    }

    /* Hide the default page title on auth pages */
    .entry-title,
    .page-title,
    h1.entry-title {
        display: none !important;
    }

    /* Center the page content */
    .entry-content,
    .page-content,
    .site-main {
        padding: 0 !important;
        margin: 0 !important;
        max-width: 100% !important;
    }

    /* Full-height auth wrapper */
    .agro-auth-wrap {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem 1rem;
        background: var(--agro-cream);
        background-image:
            radial-gradient(ellipse at 20% 50%, rgba(45,90,39,0.05) 0%, transparent 60%),
            radial-gradient(ellipse at 80% 20%, rgba(200,146,42,0.05) 0%, transparent 50%);
    }

    /* Auth card */
    .agro-auth-card {
        background: var(--agro-white);
        border: 1px solid var(--agro-border);
        border-radius: 16px;
        padding: 2.5rem 2.2rem;
        width: 100%;
        max-width: 460px;
        box-shadow: 0 4px 24px rgba(26,58,26,0.08);
    }

    /* Brand header */
    .agro-auth-brand {
        display: flex;
        align-items: center;
        gap: 0.6rem;
        margin-bottom: 1.8rem;
    }

    .agro-brand-icon {
        width: 40px;
        height: 40px;
        background: var(--agro-green);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--agro-white);
        flex-shrink: 0;
    }

    .agro-brand-name {
        font-size: 1rem;
        font-weight: 600;
        color: var(--agro-green-dark);
        letter-spacing: -0.01em;
    }

    /* Titles */
    .agro-auth-title {
        font-size: 1.4rem !important;
        font-weight: 600 !important;
        color: var(--agro-green-dark) !important;
        margin: 0 0 0.3rem !important;
        padding: 0 !important;
        border: none !important;
        font-family: 'Poppins', sans-serif !important;
        display: block !important;
    }

    .agro-auth-sub {
        font-size: 0.85rem;
        color: var(--agro-muted);
        margin: 0 0 1.8rem !important;
        line-height: 1.6;
    }

    /* Form fields */
    .agro-form { width: 100%; }

    .agro-field {
        margin-bottom: 1.1rem;
        position: relative;
    }

    .agro-field-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0.8rem;
        margin-bottom: 0;
    }

    .agro-field label {
        display: block;
        font-size: 0.75rem;
        font-weight: 500;
        color: var(--agro-muted);
        text-transform: uppercase;
        letter-spacing: 0.06em;
        margin-bottom: 0.4rem;
    }

    .agro-field input {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1.5px solid var(--agro-border);
        border-radius: 9px;
        font-family: 'Poppins', sans-serif;
        font-size: 0.875rem;
        color: var(--agro-text);
        background: var(--agro-green-pale);
        transition: border-color 0.2s, box-shadow 0.2s;
        box-sizing: border-box;
        outline: none;
    }

    .agro-field input:focus {
        border-color: var(--agro-green-mid);
        background: var(--agro-white);
        box-shadow: 0 0 0 3px rgba(61,122,53,0.1);
    }

    .agro-field input::placeholder {
        color: #aabba5;
        font-size: 0.84rem;
    }

    /* Forgot password */
    .agro-forgot {
        display: block;
        text-align: right;
        font-size: 0.78rem;
        color: var(--agro-gold);
        text-decoration: none;
        margin-top: 0.4rem;
    }

    .agro-forgot:hover { text-decoration: underline; }

    /* Remember / Terms checkbox */
    .agro-remember,
    .agro-terms {
        margin-bottom: 1.3rem;
    }

    .agro-check-label {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.83rem;
        color: var(--agro-text);
        cursor: pointer;
    }

    .agro-check-label input[type="checkbox"] {
        width: 15px;
        height: 15px;
        accent-color: var(--agro-green);
        cursor: pointer;
        flex-shrink: 0;
    }

    .agro-check-label a {
        color: var(--agro-green);
        text-decoration: underline;
    }

    /* Submit button */
    .agro-btn {
        width: 100%;
        padding: 0.85rem;
        background: var(--agro-green);
        color: var(--agro-white);
        border: none;
        border-radius: 9px;
        font-family: 'Poppins', sans-serif;
        font-size: 0.9rem;
        font-weight: 500;
        cursor: pointer;
        transition: background 0.2s, transform 0.15s;
        letter-spacing: 0.01em;
        margin-bottom: 1.2rem;
    }

    .agro-btn:hover {
        background: var(--agro-green-dark);
        transform: translateY(-1px);
    }

    /* Switch link */
    .agro-switch {
        text-align: center;
        font-size: 0.83rem;
        color: var(--agro-muted);
        margin: 0;
    }

    .agro-switch a {
        color: var(--agro-green);
        font-weight: 500;
        text-decoration: none;
    }

    .agro-switch a:hover { text-decoration: underline; }

    /* Responsive */
    @media (max-width: 480px) {
        .agro-auth-card {
            padding: 1.8rem 1.2rem;
            border-radius: 12px;
        }
        .agro-field-row {
            grid-template-columns: 1fr;
        }
    }
    </style>
    <?php
}
