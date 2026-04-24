<?php
/**
 * Agro Connect — WhatsApp Proof of Payment Button
 */

add_action( 'woocommerce_thankyou', 'agroconnect_whatsapp_payment_button', 10 );
function agroconnect_whatsapp_payment_button( $order_id ) {

    if ( ! $order_id ) return;

    $order          = wc_get_order( $order_id );
    $payment_method = $order->get_payment_method();

    
    $bank_transfer_methods = array( 'bacs', 'direct_bank_transfer', 'bank_transfer' );

    if ( ! in_array( $payment_method, $bank_transfer_methods ) ) return;

   
    $whatsapp_number = '2348150365514'; // Change this to your WhatsApp business number

    $order_number = $order->get_order_number();
    $order_total  = $order->get_formatted_order_total();

    
    $message = urlencode(
        "Hello Agro Connect, I just placed Order #{$order_number} for {$order_total} via bank transfer. Please find my proof of payment attached."
    );

    $whatsapp_url = "https://wa.me/{$whatsapp_number}?text={$message}";

    ?>

    <!-- WhatsApp Proof of Payment Button -->
    <div class="agro-wa-wrap" id="agroWaWrap">

        <!-- Floating corner button -->
        <a href="<?php echo esc_url( $whatsapp_url ); ?>"
           target="_blank"
           rel="noopener noreferrer"
           class="agro-wa-float"
           id="agroWaFloat"
           title="Send proof of payment on WhatsApp">

            <!-- WhatsApp SVG icon -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="28" height="28" fill="#ffffff">
                <path d="M16 0C7.163 0 0 7.163 0 16c0 2.833.737 5.49 2.027 7.8L0 32l8.418-2.01A15.93 15.93 0 0016 32c8.837 0 16-7.163 16-16S24.837 0 16 0zm0 29.333a13.27 13.27 0 01-6.77-1.847l-.486-.29-5.002 1.194 1.23-4.87-.316-.5A13.267 13.267 0 012.667 16C2.667 8.636 8.636 2.667 16 2.667S29.333 8.636 29.333 16 23.364 29.333 16 29.333zm7.273-9.878c-.398-.199-2.354-1.162-2.72-1.294-.365-.133-.631-.199-.897.199-.265.398-1.029 1.294-1.261 1.56-.232.265-.465.298-.863.1-.398-.199-1.681-.62-3.201-1.977-1.183-1.056-1.981-2.36-2.213-2.758-.232-.398-.025-.613.174-.811.179-.178.398-.465.597-.697.199-.232.265-.398.398-.664.133-.265.066-.497-.033-.697-.1-.199-.897-2.162-1.228-2.96-.324-.776-.652-.671-.897-.683l-.764-.013c-.265 0-.697.1-1.062.497-.365.398-1.394 1.362-1.394 3.322s1.427 3.853 1.626 4.118c.199.265 2.808 4.286 6.803 6.012.951.41 1.693.655 2.271.839.954.304 1.823.261 2.51.158.766-.114 2.354-.963 2.686-1.894.332-.931.332-1.729.232-1.894-.099-.166-.365-.265-.763-.464z"/>
            </svg>

            <span class="agro-wa-label">Send Proof of Payment</span>
        </a>

        <!-- Inline banner fallback (always visible, in page flow) -->
        <div class="agro-wa-banner">
            <div class="agro-wa-banner-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="22" height="22" fill="#ffffff">
                    <path d="M16 0C7.163 0 0 7.163 0 16c0 2.833.737 5.49 2.027 7.8L0 32l8.418-2.01A15.93 15.93 0 0016 32c8.837 0 16-7.163 16-16S24.837 0 16 0zm0 29.333a13.27 13.27 0 01-6.77-1.847l-.486-.29-5.002 1.194 1.23-4.87-.316-.5A13.267 13.267 0 012.667 16C2.667 8.636 8.636 2.667 16 2.667S29.333 8.636 29.333 16 23.364 29.333 16 29.333zm7.273-9.878c-.398-.199-2.354-1.162-2.72-1.294-.365-.133-.631-.199-.897.199-.265.398-1.029 1.294-1.261 1.56-.232.265-.465.298-.863.1-.398-.199-1.681-.62-3.201-1.977-1.183-1.056-1.981-2.36-2.213-2.758-.232-.398-.025-.613.174-.811.179-.178.398-.465.597-.697.199-.232.265-.398.398-.664.133-.265.066-.497-.033-.697-.1-.199-.897-2.162-1.228-2.96-.324-.776-.652-.671-.897-.683l-.764-.013c-.265 0-.697.1-1.062.497-.365.398-1.394 1.362-1.394 3.322s1.427 3.853 1.626 4.118c.199.265 2.808 4.286 6.803 6.012.951.41 1.693.655 2.271.839.954.304 1.823.261 2.51.158.766-.114 2.354-.963 2.686-1.894.332-.931.332-1.729.232-1.894-.099-.166-.365-.265-.763-.464z"/>
                </svg>
            </div>
            <div class="agro-wa-banner-text">
                <strong>You paid via bank transfer</strong>
                <span>Tap below to send your proof of payment on WhatsApp so we can confirm and process your order.</span>
            </div>
            <a href="<?php echo esc_url( $whatsapp_url ); ?>"
               target="_blank"
               rel="noopener noreferrer"
               class="agro-wa-banner-btn">
                Send Proof of Payment
            </a>
        </div>

    </div>

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    /* ── FLOATING CORNER BUTTON ── */
    .agro-wa-float {
        position: fixed;
        bottom: 24px;
        left: 24px;
        z-index: 9999;
        display: flex;
        align-items: center;
        gap: 0.6rem;
        background: #25d366;
        color: #ffffff !important;
        text-decoration: none !important;
        padding: 0.7rem 1.1rem 0.7rem 0.85rem;
        border-radius: 50px;
        font-family: 'Poppins', sans-serif;
        font-size: 0.82rem;
        font-weight: 500;
        box-shadow: 0 4px 16px rgba(37, 211, 102, 0.40);
        transition: background 0.2s, transform 0.2s, box-shadow 0.2s;
        white-space: nowrap;
        max-width: calc(100vw - 48px);
    }

    .agro-wa-float:hover {
        background: #1da851;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(37, 211, 102, 0.50);
        color: #ffffff !important;
        text-decoration: none !important;
    }

    .agro-wa-float svg {
        flex-shrink: 0;
    }

    .agro-wa-label {
        line-height: 1;
    }

    /* ── INLINE BANNER (always in page, as backup) ── */
    .agro-wa-banner {
        font-family: 'Poppins', sans-serif;
        background: #f0fdf4;
        border: 1px solid #86efac;
        border-left: 4px solid #25d366;
        border-radius: 0 12px 12px 0;
        padding: 1.1rem 1.2rem;
        display: flex;
        flex-direction: column;
        gap: 0.9rem;
        margin: 1.5rem 0;
    }

    .agro-wa-banner-icon {
        width: 38px;
        height: 38px;
        background: #25d366;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .agro-wa-banner-text {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
    }

    .agro-wa-banner-text strong {
        font-size: 0.88rem;
        font-weight: 600;
        color: #14532d;
    }

    .agro-wa-banner-text span {
        font-size: 0.81rem;
        color: #166534;
        line-height: 1.55;
    }

    .agro-wa-banner-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.4rem;
        background: #25d366;
        color: #ffffff !important;
        text-decoration: none !important;
        padding: 0.7rem 1.4rem;
        border-radius: 8px;
        font-family: 'Poppins', sans-serif;
        font-size: 0.85rem;
        font-weight: 500;
        transition: background 0.2s, transform 0.15s;
        align-self: flex-start;
    }

    .agro-wa-banner-btn:hover {
        background: #1da851;
        transform: translateY(-1px);
        color: #ffffff !important;
        text-decoration: none !important;
    }

    /* Mobile adjustments */
    @media (max-width: 480px) {
        .agro-wa-float {
            bottom: 16px;
            left: 16px;
            font-size: 0.78rem;
            padding: 0.65rem 1rem 0.65rem 0.75rem;
        }

        .agro-wa-banner-btn {
            width: 100%;
        }
    }
    </style>

    <?php
}
