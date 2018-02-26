<?php

/**
 * Plugin Name: WooCommerce Payment Gateway - YaadPay
 * Plugin URI: https://yaadpay.yaad.net
 * Description: Accept all major credit cards directly on your WooCommerce site in a seamless and secure checkout environment with Yaadpay.
 * Version: 1.7.6
 * Author: Yaad Sarig Payments
 * Author URI: https://yaadpay.yaad.net
 * License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * @package WordPress
 * @author innerfire
 * @since 1.0.0
 */

add_action('plugins_loaded', 'woocommerce_yaadpay2_init', 0);

function woocommerce_yaadpay2_init()
{

    if (!class_exists('WC_Payment_Gateway')) {
        return;
    };

    DEFINE('PLUGIN_DIR', plugins_url(basename(plugin_dir_path(__FILE__)), basename(__FILE__)) . '/');
    DEFINE('GATEWAY_URL', 'https://icom.yaad.net/p/');
    DEFINE('GATEWAY_URL2', 'https://pay.leumicard.co.il/p/');

    /**
     * YaadPay Gateway Class
     */
    class WC_Yaadpay extends WC_Payment_Gateway
    {

        function __construct()
        {

            // Register plugin information
            $this->id = 'yaadpay';
            $this->has_fields = true;

            // Create plugin fields and settings
            $this->init_form_fields();
            $this->init_settings();

            // Lang and Cur
            $this->langForYADPAY = array('USD' => 'ENG', 'EUR' => 'ENG', 'GBP' => 'ENG', 'ILS' => 'HEB', 'default' => 'HEB');
            $this->currencyForYADPAY = array('ILS' => 1, 'USD' => 2, 'EUR' => 3, 'GBP' => 3, 'default' => 1);


            // Get setting values
            foreach ($this->settings as $key => $val) $this->$key = $val;

            // Load plugin checkout icon
            //  $this->icon = PLUGIN_DIR . 'images/cards.png';
            $this->icon = '';
            // Add hooks
            add_action('woocommerce_receipt_yaadpay', array($this, 'receipt_page'));
            add_action('woocommerce_update_options_payment_gateways', array($this, 'process_admin_options'));
            add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));
            add_action('woocommerce_api_wc_gateway_yaadpay', array($this, 'check_response'));
            add_action('woocommerce_api_wc_iframe_yaadpay', array($this, 'iframe_form'));
            add_action('woocommerce_before_checkout_form', array($this, 'action_woocommerce_before_checkout_form'));

        }

        public function action_woocommerce_before_checkout_form()
        {
            global $woocommerce;

            if (isset($_GET['errorYAD']) && $_GET['errorYAD'] > 0) {
                wc_print_notice(__('Something went wrong while making Yaadpay payment!', 'woocommerce'), 'error');
            }

        }

        public function getFormFromOrderID($order_id, $submit = false)
        {
            global $woocommerce;
            $order = new WC_Order($order_id);
            $timeStamp = time();
            $total = $order->get_total();
            $currencyCurrent = get_woocommerce_currency();
            $langCurrent = get_woocommerce_currency();


            if ($this->settings['languageuse'] == "AUTO") {
                if (array_key_exists($langCurrent, $this->langForYADPAY)) {
                    $varLangToSend = $this->langForYADPAY[$langCurrent];
                } else {
                    $varLangToSend = $this->langForYADPAY['default'];
                }
            } else {
                $varLangToSend = $this->settings['languageuse'];
            }


            if (array_key_exists($currencyCurrent, $this->currencyForYADPAY)) {
                $varCurToSend = $this->currencyForYADPAY[$currencyCurrent];
            } else {
                $varCurToSend = $this->currencyForYADPAY['default'];
            }
            $products = $order->get_items();


            $itemArray = "";
            $_pf = new WC_Product_Factory();
            foreach ($products as $key => $product) {
                $item_id = $product['product_id'];
                $product2 = $_pf->get_product($item_id);
                $name = $product['name'];
                $price = $product2->price;
                $qty = $product['qty'];
                $itemArray .= "[" . $item_id . "~" . $name . "~" . $qty . "~" . $price . "]";
            }


            $get_total_shipping = $order->get_total_shipping();
            if ($get_total_shipping > 0) {
                $itemArray .= "[0~Shipping~1~" . $get_total_shipping . "]";
            }

            $get_total_discount = $order->get_total_discount();
            if ($get_total_discount > 0) {
                $itemArray .= "[1~Discount~-1~" . $get_total_discount . "]";
            }
            $url_gateway = GATEWAY_URL2;
            if (strpos($this->settings['termno'], '88') === false) {
                $url_gateway = GATEWAY_URL;
            }


            $returnForm = '<form name="YaadPay" id="YaadPay" action="' . $url_gateway . '" method="post" >
				  <INPUT TYPE="hidden" value="pay" NAME="action" >
				  <INPUT TYPE="hidden" value="' . $this->settings['termno'] . '" NAME="Masof" >
				  <INPUT TYPE="hidden" value="' . $total . '" NAME="Amount" >
				  <INPUT TYPE="hidden" value="' . $order_id . '" NAME="Info" >
				  <INPUT TYPE="hidden" value="' . $order_id . '" NAME="Order" >
				  <INPUT TYPE="hidden" value="True" NAME="sendemail" >
				  <INPUT TYPE="hidden" value="True" NAME="Sign" >
			 	  <INPUT TYPE="hidden" value="' . $varLangToSend . '" NAME="PageLang" >
				  <INPUT TYPE="hidden" value="' . $varCurToSend . '" NAME="Coin" >
				  <INPUT TYPE="hidden" value="True" NAME="Sign" >
				  <INPUT TYPE="hidden" value="' . $order->billing_last_name . '" NAME="ClientLName" >
				  <INPUT TYPE="hidden" value="' . $order->billing_first_name . '" NAME="ClientName" >
				  <INPUT TYPE="hidden" value="' . $order->billing_address_1 . " " . $order->billing_address_2 . '" NAME="street" >
				  <INPUT TYPE="hidden" value="' . $order->billing_city . '" NAME="city" >
				  <INPUT TYPE="hidden" value="' . $order->billing_postcode . '" NAME="zip" >
				  <INPUT TYPE="hidden" value="' . $order->billing_phone . '" NAME="phone" >
				  <INPUT TYPE="hidden" value="' . $order->billing_phone . '" NAME="cell" >
				  <INPUT TYPE="hidden" value="' . $order->billing_email . '" NAME="email" >






				  <INPUT TYPE="hidden" value="True" NAME="UTF8" >
				  <INPUT TYPE="hidden" value="True" NAME="UTF8out" >';

            if ($varLangToSend == "ENG") {
                $returnForm .= '<input type="hidden" name="UserId" value="000000000">';
            }

            if ($this->settings['pritim'] && $this->settings['pritim'] == "true") {
                $returnForm .= '<INPUT TYPE="hidden" value="True" NAME="SendHesh" > ';
                $returnForm .= '<INPUT TYPE="hidden" value="' . $itemArray . '" NAME="heshDesc" > ';
                $returnForm .= '<INPUT TYPE="hidden" value="True" NAME="Pritim" > ';
            }


            if ($this->settings['paymentinstallments']) {
                $returnForm .= '<INPUT TYPE="hidden" value="' . $this->settings['paymentinstallments'] . '" NAME="Tash" >';

            }

            if ($this->settings['postpone'] && $this->settings['postpone'] == "true") {
                $returnForm .= '<INPUT TYPE="hidden" value="True" NAME="Postpone" >';
            }


            if ($submit) {
                //	  $returnForm .= '<INPUT TYPE="submit" value="Pay Now" NAME="submit" >';
            }

            $returnForm .= '</form>
				<script>
					window.onload = function(){
					  document.forms["YaadPay"].submit()

					}

					</script>
				';

            return $returnForm;
        }

        public function iframe_form()
        {


            global $woocommerce;
            $order_id = $_GET['order_id'];
            echo $this->getFormFromOrderID($order_id, true);

            exit;

        }


        /**
         * Initialize Gateway Settings Form Fields.
         */
        function init_form_fields()
        {

            $this->form_fields = array(
                'enabled' => array(
                    'title' => __('Enable/Disable', 'woothemes'),
                    'label' => __('Enable Yaadpay', 'woothemes'),
                    'type' => 'checkbox',
                    'description' => '',
                    'default' => 'no'
                ),
                'title' => array(
                    'title' => __('Title', 'woothemes'),
                    'type' => 'text',
                    'description' => __('This controls the title which the user sees during checkout.', 'woothemes'),
                    'default' => __('Credit Card ', 'woothemes')
                ),
                'description' => array(
                    'title' => __('Description', 'woothemes'),
                    'type' => 'textarea',
                    'description' => __('This controls the description which the user sees during checkout.', 'woothemes'),
                    'default' => '
				תשלום מאובטח בכרטיס אשראי  <span>Powered By <a href="https://yaadpay.yaad.net" target="_blank">Yaad Sarig Payments</a></span>'
                ),
                'signature' => array(
                    'title' => __('Password Signature', 'woothemes'),
                    'type' => 'text',
                    'description' => __('This is the API Signature. You will got from Yaadpay.', 'woothemes'),
                    'default' => ''
                ),
                'termno' => array(
                    'title' => __('Term No.', 'woothemes'),
                    'type' => 'text',
                    'description' => __('This is the your Term No. You will got from Yaadpay.', 'woothemes'),
                    'default' => ''
                ),
                'paymentinstallments' => array(
                    'title' => __('Payment Installments', 'woothemes'),
                    'type' => 'text',
                    'description' => '',
                    'default' => '1',
                    'disable' => true
                ),
                'postpone' => array(
                    'title' => __('Postpone', 'woothemes'),
                    'type' => 'select',
                    'description' => '',
                    'options' => array(
                        'false' => 'False',
                        'true' => 'True'
                    ),
                    'default' => 'False'
                ),
                'pritim' => array(
                    'title' => __('Pritim', 'woothemes'),
                    'type' => 'select',
                    'description' => '',
                    'options' => array(
                        'false' => 'False',
                        'true' => 'True'
                    ),
                    'default' => 'False'
                ),
                'languageuse' => array(
                    'title' => __('Language', 'woothemes'),
                    'type' => 'select',
                    'description' => '',
                    'options' => array(

                        'HEB' => 'HEB',
                        'ENG' => 'ENG',
                        'AUTO' => 'AUTO'
                    ),
                    'default' => 'False'
                ),
                'moduleworking' => array(
                    'title' => __('Module working', 'woothemes'),
                    'type' => 'select',
                    'description' => '',
                    'options' => array(
                        'iframe' => 'Iframe based',
                        'form' => 'Form based'
                    ),
                    'default' => 'form'
                ),
                'iframewidth' => array(
                    'title' => __('Iframe Width', 'woothemes'),
                    'type' => 'text',
                    'description' => '',
                    'default' => '600',
                    'disable' => true
                ),
                'iframeheight' => array(
                    'title' => __('Iframe Height', 'woothemes'),
                    'type' => 'text',
                    'description' => '',
                    'default' => '600',
                    'disable' => true
                ),
                'logo_link' => array(
                    'title' => __('Choose Logo', 'woothemes'),
                    'type' => 'select',
                    'description' => '',
                    'options' => array(
                        'https://yaadpay.yaad.net/wp-content/uploads/2016/07/BW-secure-payment-logos_HEB-09.gif' => '1',
                        'https://yaadpay.yaad.net/wp-content/uploads/2016/07/secure-payment-logos-006.gif' => '2',
                        'https://yaadpay.yaad.net/wp-content/uploads/2016/07/secure-payment-logos-05‭.gif' => '3',
                        'https://yaadpay.yaad.net/wp-content/uploads/2016/07/secure-payment-logos-04‭.gif' => '4',
                        'https://yaadpay.yaad.net/wp-content/uploads/2016/07/secure-payment-logos-003.gif' => '5',
                        'https://yaadpay.yaad.net/wp-content/uploads/2016/07/secure-payment-logos-02.gif' => '6',
                        'https://yaadpay.yaad.net/wp-content/uploads/2016/07/secure-payment-logos-01.gif' => '7',
                        'https://yaadpay.yaad.net/wp-content/uploads/2016/07/BW-secure-payment-logos_HEB-08.gif' => '8',
                        'https://yaadpay.yaad.net/wp-content/uploads/2016/07/BW-secure-payment-logos_HEB-07.gif' => '9',
                        'https://yaadpay.yaad.net/wp-content/uploads/2016/07/BW-secure-payment-logos_EN-12‭.gif' => '10',
                        'https://yaadpay.yaad.net/wp-content/uploads/2016/07/BW-secure-payment-logos_EN-11.gif' => '11',
                        'https://yaadpay.yaad.net/wp-content/uploads/2016/07/BW-secure-payment-logos_EN-10‭.gif' => '12'
                    ),
                    'default' => '1'
                ),
                'logo_width' => array(
                    'title' => __('Choose Logo Width (px)', 'woothemes'),
                    'type' => 'text',
                    'description' => 'Choose Logo Width',
                    'default' => '100',
                ),
                'logo_position' => array(
                    'title' => __('Choose Logo Position (left/center/right)', 'woothemes'),
                    'type' => 'text',
                    'description' => 'Choose Logo Position',
                    'default' => 'center',
                ),
            );
        }


        /**
         * UI - Admin Panel Options
         */
        function admin_options()
        {

            if ($this->is_valid_for_use()) {
                ?>


                <h3><?php _e('Yaadpay', 'woothemes'); ?></h3>
                <p><?php _e('Accept all major credit cards directly on your WooCommerce site in a seamless and secure checkout environment with Yaadpay.', 'woothemes'); ?></p>
                <p><?php _e('Return URL for YAADPAY: ', 'woothemes');
                    echo "<b>" . WC()->api_request_url('WC_Gateway_Yaadpay') . "</b>"; ?></p>

                <table class="form-table">
                    <?php $this->generate_settings_html(); ?>
                </table>


                <?php
            } else {
                ?>
                <div class="inline error"><p>
                        <strong><?php _e('Gateway Disabled', 'woothemes'); ?></strong>: <?php _e('Yaadpay does not support your store currency.', 'woothemes'); ?>
                    </p></div>
                <?php
            }

        }

        /**
         * Process the payment and return the result.
         */
        function process_payment($order_id)
        {

            global $woocommerce;
            $order = new WC_Order($order_id);
            return array(
                'result' => 'success',
                'redirect' => $order->get_checkout_payment_url(true)
            );
        }

        /**
         * Check for Yaadpay IPN Response
         */
        public function check_response()
        {

            global $woocommerce;
            $checkout_url = $woocommerce->cart->get_checkout_url() . '?errorYAD=1';

            if (isset($_GET['Order']) && $_GET['Order'] > 0 && $_GET['CCode'] == 0 && $this->check_yaad_signature()) {
                $order = wc_get_order($_GET['Order']);
                $order_complete = $this->process_order_status($order, $_GET['Id'], "APPROVED", $_GET['ACode']);
                if ($order_complete) {
                    // Return thank you page redirect

                    if ($this->settings['moduleworking'] && $this->settings['moduleworking'] == "iframe") {
                        ?>
                        <script>
                            window.top.location.href = '<?php echo $this->get_return_url($order); ?>';
                        </script>
                        <?php
                    } else {
                        wp_redirect($this->get_return_url($order));

                    }
                } else {
                    if ($this->settings['moduleworking'] && $this->settings['moduleworking'] == "iframe") {
                        ?>
                        <script>
                            window.top.location.href = '<?php echo $checkout_url; ?>';
                        </script>
                        <?php
                    } else {
                        wp_redirect($checkout_url);

                    }
                }


            } else if (isset($_GET['Order']) && $_GET['Order'] > 0 && $_GET['CCode'] == 800 && $this->check_yaad_signature()) {
                $order = wc_get_order($_GET['Order']);
                $order_complete = $this->process_order_status($order, $_GET['Id'], "APPROVED", $_GET['ACode']);
                if ($order_complete) {
                    // Return thank you page redirect

                    if ($this->settings['moduleworking'] && $this->settings['moduleworking'] == "iframe") {
                        ?>
                        <script>
                            window.top.location.href = '<?php echo $this->get_return_url($order); ?>';
                        </script>
                        <?php
                    } else {
                        wp_redirect($this->get_return_url($order));

                    }
                } else {
                    if ($this->settings['moduleworking'] && $this->settings['moduleworking'] == "iframe") {
                        ?>
                        <script>
                            window.top.location.href = '<?php echo $checkout_url; ?>';
                        </script>
                        <?php
                    } else {
                        wp_redirect($checkout_url);

                    }
                }


            } else {
                if ($this->settings['moduleworking'] && $this->settings['moduleworking'] == "iframe") {
                    ?>
                    <script>
                        window.top.location.href = '<?php echo $checkout_url; ?>';
                    </script>
                    <?php
                } else {
                    wp_redirect($checkout_url);

                }
            }
            exit;
        }

        public function process_order_status($order, $payment_id, $status, $auth_code)
        {
            if ('APPROVED' == $status) {
                // Payment complete
                $order->payment_complete($payment_id);

                // Add order note
                $order->add_order_note(sprintf(__('Yaadpay payment approved (ID: %s)', 'woocommerce'), $payment_id));

                // Remove cart
                WC()->cart->empty_cart();

                return true;
            }

            return false;
        }

        /**
         * Receipt Page
         **/
        function receipt_page($order)
        {
            if ($this->is_valid_for_use()) {
                // echo '<p>'.__('Thank you for your order, please click the button below to pay with Yaadpay.', 'woothemes').'</p>';
                echo $this->generate_yaadpay_form($order);
            } else {
                ?>
                <div class="inline error"><p>
                        <strong><?php _e('Gateway error', 'woothemes'); ?></strong>: <?php _e('Please try another payment module.', 'woothemes'); ?>
                    </p></div>
                <?php
            }
        }

        /**
         * Generate yaadpay button link
         **/
        public function generate_yaadpay_form($order_id)
        {
            if ($this->settings['moduleworking'] && $this->settings['moduleworking'] == "iframe") { ?>
                <iframe
                    src="<?php echo WC()->api_request_url('WC_Iframe_Yaadpay'); ?>?order_id=<?php echo $order_id; ?>"
                    width="<?php echo $this->settings['iframewidth']; ?>"
                    height="<?php echo $this->settings['iframeheight']; ?>" id="chekout_frame" name="chekout_frame"
                    style="border:none;" scrolling="no">
                </iframe>
                <?php
            } else {
                echo $this->getFormFromOrderID($order_id, true);
            }

        }
        /**
         *Payments Installments
         */
        /*  private function get_yaad_installments($installment) {
      
            $installmentArray = explode(",",$installment);
            print_r($installmentArray);
      
            return 2;
              }  */

        /**
         *Payments check Signature
         */
        private function check_yaad_signature()
        {


            $deal = $_GET['Id']; // עסקה 'מס
            $CCode = $_GET['CCode']; // משבא תשובה 'מס
            $Amount = $_GET['Amount']; // סכום
            $ACode = $_GET['ACode']; //
            $token = $_GET['Order']; // token
            $fullname = $_GET['Fild1']; // משפחה ושם פרטי שם
            $email = $_GET['Fild2']; // מייל כתובת
            $phone = $_GET['Fild3']; // טלפון
            $Sign = $_GET['Sign']; // דיגיטלית חתימה


            $sign_array = array(
                'Id' => $deal,
                'CCode' => $CCode,
                'Amount' => $Amount,
                'ACode' => $ACode,
                'Order' => $token,
                'Fild1' => rawurlencode($fullname),
                'Fild2' => rawurlencode($email),
                'Fild3' => rawurlencode($phone)
            );

            $string = '';
            foreach ($sign_array as $key => $val) {
                $string .= $key . '=' . $val . '&';
            }
            $string = substr($string, 0, -1);

            $verify = hash_hmac('SHA256', $string, $this->settings['signature']);
            if ($verify == $Sign) // good !!!
            {
                return true;
            } else {
                return false;
            }

        }


        /**
         * Get the current user's login name
         */
        private function get_user_login()
        {
            global $user_login;
            get_currentuserinfo();
            return $user_login;
        }

        /**
         * Get post data if set
         */
        private function get_post($name)
        {
            if (isset($_POST[$name])) {
                return $_POST[$name];
            }
            return null;
        }

        /**
         * Check if this gateway is enabled and available in the user's country
         *
         * @return bool
         */
        public function is_valid_for_use()
        {
            return in_array(get_woocommerce_currency(), apply_filters('woocommerce_yaadpay_supported_currencies', array('NONE', 'ILS', 'USD', 'EUR', 'GBP')));
        }


        /**
         * Generate a string of 36 alphanumeric characters to associate with each saved billing method.
         */
        function random_key()
        {

            $valid_chars = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
            $key = '';
            for ($i = 0; $i < 36; $i++) {
                $key .= $valid_chars[mt_rand(0, 61)];
            }
            return $key;

        }
    }


    /**
     * Add the gateway to woocommerce
     */
    function add_yaadpay_commerce_gateway($methods)
    {
        $methods[] = 'WC_Yaadpay';
        return $methods;
    }

    function add_logo_to_footer()
    {
        $yaad = get_option( 'woocommerce_yaadpay_settings' );
        echo '<div id="yaad_logo" style="text-align: '.$yaad['logo_position'].';"><a href="https://yaadpay.yaad.net" title="סליקת כרטיסי אשראי" target="_blank"><img style="width: '.$yaad['logo_width'].'px; height: auto;" src="'.$yaad['logo_link'].'" alt="סליקת כרטיסי אשראי" /></a>‬</div>';
    }

    add_filter('woocommerce_payment_gateways', 'add_yaadpay_commerce_gateway');
    add_action('wp_footer', 'add_logo_to_footer');
}
