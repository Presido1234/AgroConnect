<?php
/**
 * Agro Connect — Complete Email Notification System
 
 */



function agro_email_template( $title, $body_html, $cta_url = '', $cta_label = '' ) {

    $site_name = get_bloginfo( 'name' ) ?: 'Agro Connect';
    $site_url  = home_url();
    $year      = date( 'Y' );

   
    $logo_svg = '
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80" width="64" height="64" fill="none">
      <circle cx="40" cy="40" r="36" stroke="white" stroke-width="2.5" fill="none" opacity="0.6"/>
      <ellipse cx="40" cy="40" rx="18" ry="26" stroke="white" stroke-width="1.5" fill="white" fill-opacity="0.9"/>
      <!-- Africa shape simplified -->
      <path d="M34 20 C30 22 28 28 30 33 C31 36 29 39 31 43 C33 47 37 50 39 54 C41 50 45 47 46 43 C48 39 47 36 48 33 C50 28 48 22 44 20 Z" fill="#1a3a1a" opacity="0.85"/>
      <!-- Leaf right -->
      <path d="M52 22 C56 18 62 20 62 26 C62 30 58 32 54 30 C52 28 50 24 52 22Z" fill="white" opacity="0.8"/>
      <path d="M52 22 L58 28" stroke="#2d5a27" stroke-width="1.2"/>
      <!-- Leaf top right small -->
      <path d="M56 16 C59 13 64 15 63 20 C61 22 57 21 56 18Z" fill="white" opacity="0.6"/>
    </svg>';

    $cta_button = '';
    if ( $cta_url && $cta_label ) {
        $cta_button = '
        <div style="text-align:center;margin:28px 0 8px;">
            <a href="' . esc_url( $cta_url ) . '"
               style="display:inline-block;background:#2d5a27;color:#ffffff;text-decoration:none;
                      padding:13px 32px;border-radius:8px;font-family:Poppins,Arial,sans-serif;
                      font-size:14px;font-weight:600;letter-spacing:0.3px;">
                ' . esc_html( $cta_label ) . '
            </a>
        </div>';
    }

    return '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<title>' . esc_html( $title ) . '</title>
</head>
<body style="margin:0;padding:0;background:#f0f4ec;font-family:Poppins,Arial,sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="background:#f0f4ec;padding:24px 0;">
<tr><td align="center">
<table width="100%" cellpadding="0" cellspacing="0" style="max-width:560px;margin:0 auto;">

  <!-- Header -->
  <tr>
    <td style="background:linear-gradient(160deg,#1a3a1a 0%,#2d5a27 100%);
               border-radius:14px 14px 0 0;padding:32px 24px 28px;text-align:center;">
      ' . $logo_svg . '
      <p style="margin:14px 0 0;color:rgba(255,255,255,0.55);font-size:11px;
                font-weight:600;letter-spacing:2.5px;text-transform:uppercase;
                font-family:Poppins,Arial,sans-serif;">
          Marketplace Excellence
      </p>
    </td>
  </tr>

  <!-- Body card -->
  <tr>
    <td style="background:#111c11;border-radius:0 0 14px 14px;
               padding:32px 28px 28px;">

      <!-- Title -->
      <p style="margin:0 0 20px;font-size:20px;font-weight:700;
                color:#7ab87a;font-family:Poppins,Arial,sans-serif;">
          ' . esc_html( $title ) . '
      </p>

      <!-- Body content -->
      <div style="color:#d0dece;font-size:14px;line-height:1.75;
                  font-family:Poppins,Arial,sans-serif;">
          ' . $body_html . '
      </div>

      ' . $cta_button . '

      <!-- Divider -->
      <hr style="border:none;border-top:1px solid rgba(255,255,255,0.08);margin:28px 0 20px;"/>

      <!-- Footer note -->
      <p style="margin:0;font-size:11.5px;color:rgba(255,255,255,0.3);
                font-family:Poppins,Arial,sans-serif;line-height:1.6;">
          This email was sent by
          <a href="' . esc_url( $site_url ) . '"
             style="color:#7ab87a;text-decoration:none;">' . esc_html( $site_name ) . '</a>.
          If you did not expect this email, you can safely ignore it.
      </p>

    </td>
  </tr>

  <!-- Footer bar -->
  <tr>
    <td style="text-align:center;padding:18px 0 8px;">
      <p style="margin:0;font-size:11px;color:#7a9070;font-family:Poppins,Arial,sans-serif;">
          &copy; ' . $year . ' ' . esc_html( $site_name ) . ' &nbsp;&middot;&nbsp;
          <a href="' . esc_url( $site_url ) . '/privacy-policy" style="color:#7a9070;text-decoration:none;">Privacy Policy</a>
          &nbsp;&middot;&nbsp;
          <a href="' . esc_url( wc_get_account_endpoint_url('dashboard') ) . '" style="color:#7a9070;text-decoration:none;">My Account</a>
      </p>
    </td>
  </tr>

</table>
</td></tr>
</table>

</body>
</html>';
}


// ═══════════════════════════════════════════════════════════════════════════
// HELPER — Info box row (used inside email body)
// ═══════════════════════════════════════════════════════════════════════════

function agro_email_info_box( $rows ) {
    $html = '<div style="background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);
                         border-radius:10px;padding:16px 18px;margin:18px 0;">';
    foreach ( $rows as $label => $value ) {
        $html .= '
        <p style="margin:0 0 8px;font-size:13px;">
            <span style="color:#7ab87a;font-weight:600;">' . esc_html( $label ) . ':</span>
            <span style="color:#d0dece;margin-left:4px;">' . wp_kses_post( $value ) . '</span>
        </p>';
    }
    $html .= '<hr style="border:none;border-top:1px solid rgba(255,255,255,0.08);margin:12px 0 4px;"/></div>';
    return $html;
}



function agro_send_email( $to, $subject, $html ) {
    add_filter( 'wp_mail_content_type', function() { return 'text/html'; } );
    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From: ' . get_bloginfo('name') . ' <' . get_option('admin_email') . '>',
    );
    wp_mail( $to, $subject, $html, $headers );
    remove_all_filters( 'wp_mail_content_type' );
}



add_action( 'woocommerce_created_customer', 'agro_email_welcome', 10, 1 );
add_action( 'user_register', 'agro_email_welcome', 10, 1 );

function agro_email_welcome( $user_id ) {
    // Prevent duplicate (woocommerce_created_customer fires user_register too)
    static $sent = array();
    if ( isset( $sent[ $user_id ] ) ) return;
    $sent[ $user_id ] = true;

    $user = get_userdata( $user_id );
    if ( ! $user || ! $user->user_email ) return;

    $name = $user->first_name ?: $user->display_name;
    $to   = $user->user_email;

    $body = '
    <p>Hello <strong style="color:#fff;">' . esc_html( $name ) . '</strong>,</p>
    <p>Welcome to <strong style="color:#7ab87a;">Agro Connect</strong> — Nigeria\'s agric marketplace for students. We are excited to have you on board.</p>
    <p>Your account has been created successfully. Here is what you can do right now:</p>
    <ul style="padding-left:18px;margin:12px 0;">
        <li style="margin-bottom:6px;">Browse fresh produce from verified Nigerian farms</li>
        <li style="margin-bottom:6px;">Add products to your basket and checkout securely</li>
        <li style="margin-bottom:6px;">Chat with Agro Nutri — your AI nutritionist</li>
        <li style="margin-bottom:6px;">Track your orders from your dashboard</li>
    </ul>
    <p>If you have any questions, reply to this email or visit our contact page. We are always here.</p>
    <p style="margin-top:20px;">Welcome to the farm family 🌱</p>';

    $html = agro_email_template(
        'Welcome to Agro Connect!',
        $body,
        wc_get_page_permalink('shop'),
        'Start Shopping'
    );

    agro_send_email( $to, 'Welcome to Agro Connect — Your Account is Ready', $html );
}



add_action( 'wp_login', 'agro_email_login_notification', 10, 2 );

function agro_email_login_notification( $user_login, $user ) {
    if ( ! $user || ! $user->user_email ) return;

    // Don't send to admins
    if ( in_array( 'administrator', (array) $user->roles, true ) ) return;

    $name      = $user->first_name ?: $user->display_name;
    $to        = $user->user_email;
    $time      = current_time( 'd M Y, g:i A' );
    $ip        = sanitize_text_field( $_SERVER['REMOTE_ADDR'] ?? 'Unknown' );

    $body = '
    <p>Hello <strong style="color:#fff;">' . esc_html( $name ) . '</strong>,</p>
    <p>A successful login was recorded on your Agro Connect account.</p>'
    . agro_email_info_box( array(
        'Time'     => $time,
        'IP Address' => $ip,
        'Account'  => esc_html( $user->user_email ),
    ) ) .
    '<p>If this was you, no action is needed. If you did not log in, please
    <a href="' . esc_url( wc_get_account_endpoint_url('edit-account') ) . '"
       style="color:#7ab87a;">secure your account immediately</a>.</p>';

    $html = agro_email_template(
        'Login Notification',
        $body,
        wc_get_account_endpoint_url('dashboard'),
        'Go to Dashboard'
    );

    agro_send_email( $to, 'New Login to Your Agro Connect Account', $html );
}


add_action( 'woocommerce_checkout_order_created', 'agro_email_new_order', 10, 1 );

function agro_email_new_order( $order ) {
    if ( ! $order ) return;

    $user_id = $order->get_user_id();
    if ( ! $user_id ) return;

    $user    = get_userdata( $user_id );
    $name    = $order->get_billing_first_name() ?: ( $user->first_name ?: $user->display_name );
    $to      = $order->get_billing_email();

    if ( ! $to ) return;

    $order_num  = $order->get_order_number();
    $order_date = $order->get_date_created()->date( 'd M Y, g:i A' );
    $total      = $order->get_formatted_order_total();
    $payment    = $order->get_payment_method_title();
    $status     = wc_get_order_status_name( $order->get_status() );

    // Build items list
    $items_html = '<p style="color:#7ab87a;font-weight:600;margin:18px 0 8px;font-size:13px;">ORDER ITEMS</p>';
    foreach ( $order->get_items() as $item ) {
        $items_html .= '<p style="margin:0 0 6px;font-size:13px;color:#d0dece;">
            &bull; ' . esc_html( $item->get_name() ) . '
            <span style="color:#7ab87a;float:right;">x' . $item->get_quantity() . ' — ' . wc_price( $item->get_total() ) . '</span>
        </p>';
    }

    $body = '
    <p>Hello <strong style="color:#fff;">' . esc_html( $name ) . '</strong>,</p>
    <p>Thank you! Your order has been placed successfully and we are already processing it.</p>'
    . agro_email_info_box( array(
        'Order Number' => '#' . $order_num,
        'Date'         => $order_date,
        'Total'        => $total,
        'Payment'      => esc_html( $payment ),
        'Status'       => '<span style="color:#4caf50;">' . esc_html( $status ) . '</span>',
    ) )
    . $items_html . '
    <p style="margin-top:18px;">You will receive another email when your order is out for delivery. You can also track your order from your dashboard at any time.</p>';

    $html = agro_email_template(
        'Order Confirmed — #' . $order_num,
        $body,
        wc_get_account_endpoint_url('orders'),
        'Track My Order'
    );

    agro_send_email( $to, 'Your Agro Connect Order #' . $order_num . ' is Confirmed', $html );
}



add_action( 'woocommerce_order_status_changed', 'agro_email_order_status', 10, 4 );

function agro_email_order_status( $order_id, $old_status, $new_status, $order ) {
    if ( ! $order ) return;

    $to = $order->get_billing_email();
    if ( ! $to ) return;

    $name      = $order->get_billing_first_name() ?: 'Customer';
    $order_num = $order->get_order_number();
    $total     = $order->get_formatted_order_total();

    $configs = array(
        'processing' => array(
            'subject' => 'Your Order #' . $order_num . ' is Being Processed',
            'title'   => 'Order Processing',
            'message' => 'Great news! Your order is now being processed. Our team is picking and preparing your items for dispatch.',
            'color'   => '#4caf50',
            'cta_url' => wc_get_account_endpoint_url('orders'),
            'cta_lbl' => 'View Order Details',
        ),
        'completed' => array(
            'subject' => 'Order #' . $order_num . ' Delivered — Thank You!',
            'title'   => 'Order Delivered',
            'message' => 'Your order has been marked as delivered. We hope you enjoy your fresh produce! If anything was not right, please reach out within 48 hours.',
            'color'   => '#2e7d32',
            'cta_url' => wc_get_page_permalink('shop'),
            'cta_lbl' => 'Shop Again',
        ),
        'on-hold' => array(
            'subject' => 'Your Order #' . $order_num . ' is On Hold',
            'title'   => 'Order On Hold',
            'message' => 'Your order is currently on hold. This usually happens when payment verification is pending. Please check your payment status or contact us if you need help.',
            'color'   => '#c8922a',
            'cta_url' => wc_get_account_endpoint_url('orders'),
            'cta_lbl' => 'View Order',
        ),
        'cancelled' => array(
            'subject' => 'Your Order #' . $order_num . ' Has Been Cancelled',
            'title'   => 'Order Cancelled',
            'message' => 'Your order has been cancelled. If you believe this is a mistake or you need assistance, please contact us immediately.',
            'color'   => '#c62828',
            'cta_url' => home_url('/contact'),
            'cta_lbl' => 'Contact Us',
        ),
        'refunded' => array(
            'subject' => 'Refund Processed for Order #' . $order_num,
            'title'   => 'Refund Processed',
            'message' => 'A refund has been processed for your order. Please allow 3 to 5 business days for the amount to reflect in your account, depending on your payment method.',
            'color'   => '#7ab87a',
            'cta_url' => wc_get_account_endpoint_url('orders'),
            'cta_lbl' => 'View Orders',
        ),
        'failed' => array(
            'subject' => 'Payment Failed for Order #' . $order_num,
            'title'   => 'Payment Failed',
            'message' => 'Unfortunately, the payment for your order could not be processed. Please try again or use a different payment method.',
            'color'   => '#c62828',
            'cta_url' => $order->get_checkout_payment_url(),
            'cta_lbl' => 'Retry Payment',
        ),
    );

    // Only send for statuses we have configured
    if ( ! isset( $configs[ $new_status ] ) ) return;

    $cfg = $configs[ $new_status ];

    $body = '
    <p>Hello <strong style="color:#fff;">' . esc_html( $name ) . '</strong>,</p>
    <p>' . esc_html( $cfg['message'] ) . '</p>'
    . agro_email_info_box( array(
        'Order Number' => '#' . $order_num,
        'Total'        => $total,
        'Status'       => '<span style="color:' . $cfg['color'] . ';font-weight:600;">' . ucfirst( str_replace( '-', ' ', $new_status ) ) . '</span>',
    ) );

    $html = agro_email_template(
        $cfg['title'],
        $body,
        $cfg['cta_url'],
        $cfg['cta_lbl']
    );

    agro_send_email( $to, $cfg['subject'], $html );
}


add_action( 'woocommerce_add_to_cart', 'agro_email_add_to_cart', 10, 6 );

function agro_email_add_to_cart( $cart_item_key, $product_id, $quantity, $variation_id, $variation, $cart_item_data ) {

    if ( ! is_user_logged_in() ) return;

    // Throttle — only send once per session per product to avoid spam
    $session_key = 'agro_cart_email_' . $product_id;
    if ( WC()->session && WC()->session->get( $session_key ) ) return;
    if ( WC()->session ) WC()->session->set( $session_key, true );

    $user       = wp_get_current_user();
    $to         = $user->user_email;
    $name       = $user->first_name ?: $user->display_name;
    $product    = wc_get_product( $product_id );

    if ( ! $product || ! $to ) return;

    $product_name  = $product->get_name();
    $product_price = wc_price( $product->get_price() );
    $cart_url      = wc_get_cart_url();
    $checkout_url  = wc_get_checkout_url();

    // Cart total
    $cart_count = WC()->cart ? WC()->cart->get_cart_contents_count() : $quantity;
    $cart_total = WC()->cart ? WC()->cart->get_cart_total() : $product_price;

    $body = '
    <p>Hello <strong style="color:#fff;">' . esc_html( $name ) . '</strong>,</p>
    <p>You just added an item to your basket on Agro Connect.</p>'
    . agro_email_info_box( array(
        'Product'    => esc_html( $product_name ),
        'Quantity'   => esc_html( $quantity ),
        'Price'      => $product_price,
        'In Basket'  => $cart_count . ' item(s)',
        'Basket Total' => $cart_total,
    ) )
    . '<p>Ready to checkout? Complete your order before your items sell out.</p>';

    $html = agro_email_template(
        'Item Added to Basket',
        $body,
        $checkout_url,
        'Proceed to Checkout'
    );

    agro_send_email( $to, 'You Added ' . $product_name . ' to Your Agro Connect Basket', $html );
}


add_action( 'woocommerce_before_checkout_form', 'agro_email_checkout_started', 5 );

function agro_email_checkout_started() {
    if ( ! is_user_logged_in() ) return;

    // Only fire once per session
    if ( WC()->session && WC()->session->get( 'agro_checkout_email_sent' ) ) return;
    if ( WC()->session ) WC()->session->set( 'agro_checkout_email_sent', true );

    $user = wp_get_current_user();
    $to   = $user->user_email;
    $name = $user->first_name ?: $user->display_name;

    if ( ! $to ) return;

    $cart        = WC()->cart;
    $cart_count  = $cart ? $cart->get_cart_contents_count() : 0;
    $cart_total  = $cart ? $cart->get_cart_total() : '—';

    if ( $cart_count === 0 ) return;

    $body = '
    <p>Hello <strong style="color:#fff;">' . esc_html( $name ) . '</strong>,</p>
    <p>You are almost there! You have started the checkout process on Agro Connect.</p>'
    . agro_email_info_box( array(
        'Items in Basket' => $cart_count,
        'Order Total'     => $cart_total,
    ) )
    . '<p>If you did not complete your order, you can return to your basket at any time and pick up where you left off.</p>
    <p>If you ran into any issues during checkout, feel free to contact us and we will help you through it.</p>';

    $html = agro_email_template(
        'Checkout Started',
        $body,
        wc_get_checkout_url(),
        'Complete Your Order'
    );

    agro_send_email( $to, 'Complete Your Agro Connect Order', $html );
}



add_action( 'woocommerce_new_customer_note', 'agro_email_order_tracking_note', 10, 1 );

function agro_email_order_tracking_note( $args ) {
    $order_id = $args['order_id'] ?? 0;
    $note     = $args['customer_note'] ?? '';

    if ( ! $order_id || empty( $note ) ) return;

    $order = wc_get_order( $order_id );
    if ( ! $order ) return;

    $to   = $order->get_billing_email();
    $name = $order->get_billing_first_name() ?: 'Customer';

    if ( ! $to ) return;

    $order_num = $order->get_order_number();
    $status    = wc_get_order_status_name( $order->get_status() );

    $body = '
    <p>Hello <strong style="color:#fff;">' . esc_html( $name ) . '</strong>,</p>
    <p>There is a new update on your Agro Connect order <strong style="color:#7ab87a;">#' . esc_html( $order_num ) . '</strong>.</p>'
    . agro_email_info_box( array(
        'Order'   => '#' . $order_num,
        'Status'  => esc_html( $status ),
        'Update'  => '<em style="color:#b8d4b4;">' . esc_html( $note ) . '</em>',
    ) )
    . '<p>If you have questions about your delivery, reply to this email or visit your order dashboard.</p>';

    $html = agro_email_template(
        'Order Update — #' . $order_num,
        $body,
        wc_get_account_endpoint_url('orders'),
        'Track My Order'
    );

    agro_send_email( $to, 'Update on Your Agro Connect Order #' . $order_num, $html );
}


add_action( 'after_password_reset', 'agro_email_password_reset', 10, 1 );

function agro_email_password_reset( $user ) {
    if ( ! $user || ! $user->user_email ) return;

    $name = $user->first_name ?: $user->display_name;
    $to   = $user->user_email;
    $time = current_time( 'd M Y, g:i A' );

    $body = '
    <p>Hello <strong style="color:#fff;">' . esc_html( $name ) . '</strong>,</p>
    <p>Your Agro Connect account password was successfully reset.</p>'
    . agro_email_info_box( array(
        'Time'    => $time,
        'Account' => esc_html( $user->user_email ),
    ) )
    . '<p>If you made this change, you can ignore this email. If you did not reset your password, please
    <a href="' . esc_url( wc_get_account_endpoint_url('edit-account') ) . '"
       style="color:#7ab87a;">contact us immediately</a> to secure your account.</p>';

    $html = agro_email_template(
        'Password Reset Successful',
        $body,
        wc_get_account_endpoint_url('dashboard'),
        'Go to Dashboard'
    );

    agro_send_email( $to, 'Your Agro Connect Password Has Been Reset', $html );
}


add_action( 'woocommerce_save_account_details', 'agro_email_account_updated', 10, 1 );

function agro_email_account_updated( $user_id ) {
    $user = get_userdata( $user_id );
    if ( ! $user || ! $user->user_email ) return;

    $name = $user->first_name ?: $user->display_name;
    $to   = $user->user_email;
    $time = current_time( 'd M Y, g:i A' );

    $body = '
    <p>Hello <strong style="color:#fff;">' . esc_html( $name ) . '</strong>,</p>
    <p>Your Agro Connect account details have been updated successfully.</p>'
    . agro_email_info_box( array(
        'Updated On' => $time,
        'Account'    => esc_html( $user->user_email ),
    ) )
    . '<p>If you did not make these changes, please
    <a href="' . esc_url( home_url('/contact') ) . '"
       style="color:#7ab87a;">contact us right away</a>.</p>';

    $html = agro_email_template(
        'Account Updated',
        $body,
        wc_get_account_endpoint_url('dashboard'),
        'Go to Dashboard'
    );

    agro_send_email( $to, 'Your Agro Connect Account Has Been Updated', $html );
}


add_filter( 'woocommerce_email_enabled_customer_processing_order', '__return_false' );
add_filter( 'woocommerce_email_enabled_customer_completed_order',  '__return_false' );
add_filter( 'woocommerce_email_enabled_customer_on_hold_order',    '__return_false' );
add_filter( 'woocommerce_email_enabled_customer_cancelled_order',  '__return_false' );
add_filter( 'woocommerce_email_enabled_customer_refunded_order',   '__return_false' );
add_filter( 'woocommerce_email_enabled_customer_new_account',      '__return_false' );
add_filter( 'woocommerce_email_enabled_customer_note',             '__return_false' );
