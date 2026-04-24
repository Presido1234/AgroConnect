<?php
/**
 * Agro Connect — Order Confirmation Buttons

 */

add_action( 'woocommerce_thankyou', 'agroconnect_order_confirmation_buttons', 5 );
function agroconnect_order_confirmation_buttons( $order_id ) {

    if ( ! $order_id ) return;

    $order       = wc_get_order( $order_id );
    $dashboard   = wc_get_account_endpoint_url( 'dashboard' );
    $track_url   = wc_get_account_endpoint_url( 'orders' );

    ?>

    <div class="agro-confirm-buttons">

        <div class="agro-confirm-message">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6" width="28" height="28">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
            </svg>
            <div>
                <strong>Your order has been placed successfully.</strong>
                <span>We are already processing it. You will receive an email confirmation shortly.</span>
            </div>
        </div>

        <div class="agro-confirm-btn-row">

            <a href="<?php echo esc_url( $track_url ); ?>" class="agro-btn agro-btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" width="16" height="16">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                </svg>
                Track My Order
            </a>

            <a href="<?php echo esc_url( $dashboard ); ?>" class="agro-btn agro-btn-outline">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" width="16" height="16">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Go to Dashboard
            </a>

        </div>

    </div>

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    .agro-confirm-buttons {
        font-family: 'Poppins', sans-serif;
        margin: 2rem 0 1rem;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    /* Success message bar */
    .agro-confirm-message {
        display: flex;
        align-items: flex-start;
        gap: 0.9rem;
        background: #e8f5e0;
        border: 1px solid #b8d9a0;
        border-left: 4px solid #2d5a27;
        border-radius: 0 10px 10px 0;
        padding: 1rem 1.2rem;
        color: #1a3a1a;
    }

    .agro-confirm-message svg {
        color: #2d5a27;
        flex-shrink: 0;
        margin-top: 2px;
    }

    .agro-confirm-message div {
        display: flex;
        flex-direction: column;
        gap: 0.2rem;
    }

    .agro-confirm-message strong {
        font-size: 0.9rem;
        font-weight: 600;
        color: #1a3a1a;
        display: block;
    }

    .agro-confirm-message span {
        font-size: 0.82rem;
        color: #3d6e2a;
        line-height: 1.5;
    }

    /* Button row */
    .agro-confirm-btn-row {
        display: flex;
        gap: 0.8rem;
        flex-wrap: wrap;
    }

    /* Base button */
    .agro-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.4rem;
        border-radius: 9px;
        font-family: 'Poppins', sans-serif;
        font-size: 0.87rem;
        font-weight: 500;
        text-decoration: none;
        cursor: pointer;
        transition: background 0.2s, transform 0.15s, border-color 0.2s;
        line-height: 1;
        white-space: nowrap;
    }

    .agro-btn:hover {
        transform: translateY(-1px);
        text-decoration: none;
    }

    /* Primary — Track Order */
    .agro-btn-primary {
        background: #2d5a27;
        color: #ffffff !important;
        border: 1.5px solid #2d5a27;
    }

    .agro-btn-primary:hover {
        background: #1a3a1a;
        border-color: #1a3a1a;
        color: #ffffff !important;
    }

    /* Outline — Dashboard */
    .agro-btn-outline {
        background: transparent;
        color: #2d5a27 !important;
        border: 1.5px solid #2d5a27;
    }

    .agro-btn-outline:hover {
        background: #f3f7f0;
        color: #1a3a1a !important;
    }

    /* Mobile */
    @media (max-width: 480px) {
        .agro-confirm-btn-row {
            flex-direction: column;
        }

        .agro-btn {
            width: 100%;
            justify-content: center;
        }
    }
    </style>

    <?php
}
