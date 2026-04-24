<?php
/**
 * Agro Connect — My Account Dashboard Styles
 */

add_action('wp_head', 'agroconnect_dashboard_styles');
function agroconnect_dashboard_styles() {
    if ( ! is_account_page() ) return;
    ?>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

    :root {
        --agro-green-dark:  #1a3a1a;
        --agro-green:       #2d5a27;
        --agro-green-mid:   #3d7a35;
        --agro-green-light: #e8f0e3;
        --agro-green-pale:  #f3f7f0;
        --agro-gold:        #c8922a;
        --agro-gold-light:  #f5e6c8;
        --agro-cream:       #faf8f3;
        --agro-white:       #ffffff;
        --agro-text:        #1c2b1c;
        --agro-muted:       #5a6e55;
        --agro-border:      #d4e0cc;
        --agro-shadow:      0 2px 16px rgba(26,58,26,0.07);
    }

    /* ── BASE ── */
    .woocommerce-account *,
    .woocommerce-account *::before,
    .woocommerce-account *::after {
        font-family: 'Poppins', sans-serif !important;
        box-sizing: border-box;
    }

    .woocommerce-account .woocommerce {
        max-width: 1080px;
        margin: 0 auto;
        padding: 2rem 1rem 4rem;
    }

    /* ── SIDEBAR NAV ── */
    .woocommerce-MyAccount-navigation {
        background: var(--agro-white);
        border: 1px solid var(--agro-border);
        border-radius: 12px;
        overflow: hidden;
        box-shadow: var(--agro-shadow);
    }

    .woocommerce-MyAccount-navigation::before {
        content: 'My Account';
        display: block;
        font-size: 0.65rem;
        font-weight: 600;
        color: var(--agro-muted);
        text-transform: uppercase;
        letter-spacing: 0.12em;
        padding: 1rem 1.2rem 0.8rem;
        border-bottom: 1px solid var(--agro-border);
    }

    .woocommerce-MyAccount-navigation ul {
        list-style: none;
        margin: 0;
        padding: 0.4rem 0;
    }

    .woocommerce-MyAccount-navigation ul li a {
        display: flex;
        align-items: center;
        gap: 0.65rem;
        padding: 0.7rem 1.2rem;
        font-size: 0.85rem;
        font-weight: 400;
        color: var(--agro-text);
        text-decoration: none;
        border-left: 3px solid transparent;
        transition: background 0.15s, color 0.15s, border-color 0.15s;
    }

    .woocommerce-MyAccount-navigation ul li a:hover {
        background: var(--agro-green-light);
        color: var(--agro-green-dark);
        border-left-color: var(--agro-green-mid);
    }

    .woocommerce-MyAccount-navigation ul li.is-active a {
        background: var(--agro-green-pale);
        color: var(--agro-green-dark);
        font-weight: 500;
        border-left-color: var(--agro-green);
    }

    /* Minimal SVG icons — only Dashboard, Orders, Addresses, Account, Logout */
    .woocommerce-MyAccount-navigation-link--dashboard a::before {
        content: '';
        display: inline-block;
        width: 15px;
        height: 15px;
        flex-shrink: 0;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%235a6e55' stroke-width='1.8'%3E%3Crect x='3' y='3' width='7' height='7' rx='1'/%3E%3Crect x='14' y='3' width='7' height='7' rx='1'/%3E%3Crect x='3' y='14' width='7' height='7' rx='1'/%3E%3Crect x='14' y='14' width='7' height='7' rx='1'/%3E%3C/svg%3E");
        background-size: contain;
        background-repeat: no-repeat;
    }

    .woocommerce-MyAccount-navigation-link--orders a::before {
        content: '';
        display: inline-block;
        width: 15px;
        height: 15px;
        flex-shrink: 0;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%235a6e55' stroke-width='1.8'%3E%3Cpath d='M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2'/%3E%3Crect x='9' y='3' width='6' height='4' rx='1'/%3E%3Cpath d='M9 12h6M9 16h4'/%3E%3C/svg%3E");
        background-size: contain;
        background-repeat: no-repeat;
    }

    .woocommerce-MyAccount-navigation-link--edit-address a::before {
        content: '';
        display: inline-block;
        width: 15px;
        height: 15px;
        flex-shrink: 0;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%235a6e55' stroke-width='1.8'%3E%3Cpath d='M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z'/%3E%3Ccircle cx='12' cy='9' r='2.5'/%3E%3C/svg%3E");
        background-size: contain;
        background-repeat: no-repeat;
    }

    .woocommerce-MyAccount-navigation-link--edit-account a::before {
        content: '';
        display: inline-block;
        width: 15px;
        height: 15px;
        flex-shrink: 0;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%235a6e55' stroke-width='1.8'%3E%3Ccircle cx='12' cy='8' r='4'/%3E%3Cpath d='M4 20c0-4 3.58-7 8-7s8 3 8 7'/%3E%3C/svg%3E");
        background-size: contain;
        background-repeat: no-repeat;
    }

    .woocommerce-MyAccount-navigation-link--customer-logout a::before {
        content: '';
        display: inline-block;
        width: 15px;
        height: 15px;
        flex-shrink: 0;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%23b94040' stroke-width='1.8'%3E%3Cpath d='M17 16l4-4m0 0l-4-4m4 4H7'/%3E%3Cpath d='M9 20H5a2 2 0 01-2-2V6a2 2 0 012-2h4'/%3E%3C/svg%3E");
        background-size: contain;
        background-repeat: no-repeat;
    }

    /* Hide downloads icon — no icon for downloads */
    .woocommerce-MyAccount-navigation-link--downloads a::before { display: none; }

    /* Logout styling */
    .woocommerce-MyAccount-navigation-link--customer-logout {
        border-top: 1px solid var(--agro-border);
        margin-top: 0.3rem;
        padding-top: 0.3rem;
    }

    .woocommerce-MyAccount-navigation-link--customer-logout a {
        color: #b94040 !important;
    }

    .woocommerce-MyAccount-navigation-link--customer-logout a:hover {
        background: #fdf0f0 !important;
        border-left-color: #b94040 !important;
    }

    /* ── CONTENT AREA ── */
    .woocommerce-MyAccount-content {
        background: var(--agro-white);
        border: 1px solid var(--agro-border);
        border-radius: 12px;
        padding: 2rem;
        box-shadow: var(--agro-shadow);
    }

    /* Welcome banner */
    .woocommerce-MyAccount-content > p:first-of-type {
        background: var(--agro-green-dark);
        color: var(--agro-white);
        border-radius: 10px;
        padding: 1.4rem 1.6rem;
        font-size: 0.9rem;
        font-weight: 400;
        line-height: 1.7;
        margin-bottom: 1.6rem;
    }

    .woocommerce-MyAccount-content > p:first-of-type a {
        color: var(--agro-gold-light);
        text-decoration: underline;
    }

    /* Content headings */
    .woocommerce-MyAccount-content h2,
    .woocommerce-MyAccount-content h3 {
        font-size: 1rem;
        font-weight: 600;
        color: var(--agro-green-dark);
        border-bottom: 1.5px solid var(--agro-green-light);
        padding-bottom: 0.6rem;
        margin-bottom: 1.2rem;
    }

    /* Orders table */
    .woocommerce-orders-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.85rem;
    }

    .woocommerce-orders-table th {
        background: var(--agro-green-pale);
        color: var(--agro-muted);
        font-size: 0.7rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.07em;
        padding: 0.7rem 1rem;
        border-bottom: 1.5px solid var(--agro-border);
        text-align: left;
    }

    .woocommerce-orders-table td {
        padding: 0.8rem 1rem;
        border-bottom: 1px solid var(--agro-border);
        color: var(--agro-text);
        vertical-align: middle;
    }

    .woocommerce-orders-table tr:last-child td { border-bottom: none; }
    .woocommerce-orders-table tr:hover td { background: var(--agro-green-pale); }

    /* Status badges */
    mark.order-status {
        padding: 0.28rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 500;
        font-family: 'Poppins', sans-serif !important;
    }
    mark.order-status.status-processing { background: #e3f5d8; color: #2a5e1a; }
    mark.order-status.status-completed  { background: #d8f0e3; color: #1a5040; }
    mark.order-status.status-pending    { background: var(--agro-gold-light); color: #7a5010; }
    mark.order-status.status-on-hold    { background: #e8e8e8; color: #444; }
    mark.order-status.status-cancelled  { background: #fce8e8; color: #7a1a1a; }
    mark.order-status.status-refunded   { background: #f0e8f8; color: #5a1a7a; }

    /* Buttons */
    .woocommerce-MyAccount-content .button,
    .woocommerce-MyAccount-content button[type="submit"],
    .woocommerce-MyAccount-content input[type="submit"] {
        background: var(--agro-green) !important;
        color: var(--agro-white) !important;
        border: none !important;
        padding: 0.7rem 1.6rem !important;
        border-radius: 8px !important;
        font-family: 'Poppins', sans-serif !important;
        font-size: 0.85rem !important;
        font-weight: 500 !important;
        cursor: pointer !important;
        transition: background 0.2s, transform 0.15s !important;
        letter-spacing: 0.01em !important;
    }

    .woocommerce-MyAccount-content .button:hover,
    .woocommerce-MyAccount-content button[type="submit"]:hover,
    .woocommerce-MyAccount-content input[type="submit"]:hover {
        background: var(--agro-green-dark) !important;
        transform: translateY(-1px) !important;
    }

    .woocommerce-orders-table .button {
        padding: 0.35rem 0.9rem !important;
        font-size: 0.78rem !important;
        border-radius: 7px !important;
    }

    /* Form inputs inside account */
    .woocommerce-MyAccount-content input[type="text"],
    .woocommerce-MyAccount-content input[type="email"],
    .woocommerce-MyAccount-content input[type="password"],
    .woocommerce-MyAccount-content select,
    .woocommerce-MyAccount-content textarea {
        width: 100%;
        padding: 0.7rem 1rem;
        border: 1.5px solid var(--agro-border);
        border-radius: 8px;
        font-family: 'Poppins', sans-serif !important;
        font-size: 0.85rem;
        color: var(--agro-text);
        background: var(--agro-green-pale);
        transition: border-color 0.2s, box-shadow 0.2s;
        box-sizing: border-box;
    }

    .woocommerce-MyAccount-content input:focus,
    .woocommerce-MyAccount-content select:focus,
    .woocommerce-MyAccount-content textarea:focus {
        outline: none;
        border-color: var(--agro-green-mid);
        box-shadow: 0 0 0 3px rgba(61,122,53,0.1);
        background: var(--agro-white);
    }

    .woocommerce-MyAccount-content label {
        font-size: 0.78rem;
        font-weight: 500;
        color: var(--agro-muted);
        text-transform: uppercase;
        letter-spacing: 0.06em;
        display: block;
        margin-bottom: 0.35rem;
    }

    .woocommerce-MyAccount-content .form-row { margin-bottom: 1rem; }

    /* Address block */
    .woocommerce-MyAccount-content address {
        background: var(--agro-green-pale);
        border: 1px solid var(--agro-border);
        border-radius: 10px;
        padding: 1.1rem 1.4rem;
        font-style: normal;
        font-size: 0.88rem;
        line-height: 1.8;
        color: var(--agro-text);
    }

    /* Notices */
    .woocommerce-account .woocommerce-message {
        background: var(--agro-green-light);
        border-left: 4px solid var(--agro-green-mid);
        color: var(--agro-green-dark);
        border-radius: 0 8px 8px 0;
        padding: 0.9rem 1.2rem;
        font-size: 0.88rem;
        margin-bottom: 1.5rem;
        list-style: none;
    }

    .woocommerce-account .woocommerce-error {
        background: #fce8e8;
        border-left: 4px solid #c0392b;
        color: #7a1a1a;
        border-radius: 0 8px 8px 0;
        padding: 0.9rem 1.2rem;
        font-size: 0.88rem;
        margin-bottom: 1.5rem;
        list-style: none;
    }

    .woocommerce-account .woocommerce-info {
        background: var(--agro-gold-light);
        border-left: 4px solid var(--agro-gold);
        color: #7a5010;
        border-radius: 0 8px 8px 0;
        padding: 0.9rem 1.2rem;
        font-size: 0.88rem;
        margin-bottom: 1.5rem;
        list-style: none;
    }

    /* ── RESPONSIVE ── */
    @media (max-width: 768px) {
        .woocommerce-MyAccount-navigation { margin-bottom: 1.2rem; }
        .woocommerce-MyAccount-content { padding: 1.2rem 1rem; }
    }
    </style>
    <?php
}
