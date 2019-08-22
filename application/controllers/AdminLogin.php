<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Community Auth - Examples Controller
 *
 * Community Auth is an open source authentication application for CodeIgniter 3
 *
 * @package     Community Auth
 * @author      Robert B Gottier
 * @copyright   Copyright (c) 2011 - 2017, Robert B Gottier. (http://brianswebdesign.com/)
 * @license     BSD - http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://community-auth.com
 */
class AdminLogin extends MY_Controller {

    private $C = null;

    public function __construct() {
        parent::__construct();

        // Force SSL
        //$this->force_ssl();
        // Form and URL helpers always loaded (just for convenience)
        $this->load->helper('url');
        $this->load->helper('form');
        if ($this->C == NULL) {
            $this->C = get_instance();
        }
    }

    // -----------------------------------------------------------------------

    /**
     * Demonstrate being redirected to login.
     * If you are logged in and request this method,
     * you'll see the message, otherwise you will be
     * shown the login form. Once login is achieved,
     * you will be redirected back to this method.
     */
    public function index() {
        if ($this->require_role('admin')) {
           $base_url = base_url();
           
//            $auth_user_id = $this->auth_user_id;
//            $this->smarty->assign("auth_user_id", $auth_user_id);
            
            
            $this->smarty->assign('base_url', $base_url);
            $data['manufacturer'] = $this->manufacturer_model->viewAllManufacturer();
            $data['categories'] = $this->categories_model->viewAllCategories();
            $data['colors'] = $this->colors_model->viewAllColors();
            $data['currencies'] = $this->currency_model->viewCurrency();
            //     $this->products_list();
            //print 'Success';
            $this->smarty->view('products_list.tpl', $data, false);
        }
    }

// -----------------------------------------------------------------------

    /**
     * This login method only serves to redirect a user to a 
     * location once they have successfully logged in. It does
     * not attempt to confirm that the user has permission to 
     * be on the page they are being redirected to.
     */
    public function login() {
        // Method should not be directly accessible
        if ($this->uri->uri_string() == 'examples/login')
            show_404();

        if (strtolower($_SERVER['REQUEST_METHOD']) == 'post')
            $this->require_min_level(1);

        $this->setup_login_form();

        if ($this->authentication->on_hold === TRUE) {
            $on_hold_message = 1;
        }
       $this->smarty->assign("form_open", form_open(base_url() . 'index.php/login?redirect=admin_login'), 'class =>std-form');
        $this->smarty->assign("form_close", form_close());
        $this->smarty->assign("header", "Admin Login");
        $this->smarty->assign("on_hold_message", $on_hold_message);
//$this->smarty->assign("login_error_mesg",$this->authentication->login_error_mesg);
        $this->smarty->assign("login_errors_count", $this->authentication->login_errors_count);
        $this->smarty->assign("max_chars_for_password", 250);
//        print 'Load admin login form';
        $this->smarty->view("admin_login.tpl");
    }

// --------------------------------------------------------------

    /**
     * Log out
     */
    public function logout() {
        $this->authentication->logout();

// Set redirect protocol
        $redirect_protocol = USE_SSL ? 'https' : NULL;

//        redirect(site_url(LOGIN_PAGE . '?logout=1', $redirect_protocol));
        redirect(site_url(), $redirect_protocol);
    }

// --------------------------------------------------------------

    /**
     * Attempt to login via AJAX
     */
    public function ajax_login() {
        $this->is_logged_in();

        $this->tokens->name = 'login_token';

        $data['javascripts'] = [
            'https://code.jquery.com/jquery-1.12.0.min.js'
        ];

        if ($this->authentication->on_hold === TRUE) {
            $data['on_hold_message'] = 1;
        }

// This check for on hold is for normal login attempts
        else if ($on_hold = $this->authentication->current_hold_status()) {
            $data['on_hold_message'] = 1;
        }

        $link_protocol = USE_SSL ? 'https' : NULL;

        $data['final_head'] = "<script>
			$(document).ready(function(){
				$(document).on( 'submit', 'form', function(e){
					$.ajax({
						type: 'post',
						cache: false,
						url: '" . site_url('examples/ajax_attempt_login', $link_protocol) . "',
						data: {
							'login_string': $('#login_string').val(),
							'login_pass': $('#login_pass').val(),
							'login_token': $('[name=\"login_token\"]').val()
						},
						dataType: 'json',
						success: function(response){
							$('[name=\"login_token\"]').val( response.token );
							console.log(response);
							if(response.status == 1){
								$('form').replaceWith('<p>You are now logged in.</p>');
								$('#login-link').attr('href','" . site_url('examples/logout', $link_protocol) . "').text('Logout');
								$('#ajax-login-link').parent().hide();
							}else if(response.status == 0 && response.on_hold){
								$('form').hide();
								$('#on-hold-message').show();
								alert('You have exceeded the maximum number of login attempts.');
							}else if(response.status == 0 && response.count){
								alert('Failed login attempt ' + response.count + ' of ' + $('#max_allowed_attempts').val());
							}
						}
					});
					return false;
				});
			});
		</script>";

        $html = $this->load->view('examples/page_header', $data, TRUE);
        $html .= $this->load->view('examples/ajax_login_form', $data, TRUE);
        $html .= $this->load->view('examples/page_footer', '', TRUE);

        echo $html;
    }

// --------------------------------------------------------------

    /**
     * Test for login via ajax
     */
    public function ajax_attempt_login() {
        if ($this->input->is_ajax_request()) {
// Allow this page to be an accepted login page
            $this->config->set_item('allowed_pages_for_login', ['examples/ajax_attempt_login']);

// Make sure we aren't redirecting after a successful login
            $this->authentication->redirect_after_login = FALSE;

// Do the login attempt
            $this->auth_data = $this->authentication->user_status(0);

// Set user variables if successful login
            if ($this->auth_data)
                $this->_set_user_variables();

// Call the post auth hook
            $this->post_auth_hook();

// Login attempt was successful
            if ($this->auth_data) {
                echo json_encode([
                    'status' => 1,
                    'user_id' => $this->auth_user_id,
                    'username' => $this->auth_username,
                    'level' => $this->auth_level,
                    'role' => $this->auth_role,
                    'email' => $this->auth_email
                ]);
            }

// Login attempt not successful
            else {
                $this->tokens->name = 'login_token';

                $on_hold = (
                        $this->authentication->on_hold === TRUE OR
                        $this->authentication->current_hold_status()
                        ) ? 1 : 0;

                echo json_encode([
                    'status' => 0,
                    'count' => $this->authentication->login_errors_count,
                    'on_hold' => $on_hold,
                    'token' => $this->tokens->token()
                ]);
            }
        }

// Show 404 if not AJAX
        else {
            show_404();
        }
    }

// -----------------------------------------------------------------------
}

/* End of file Examples.php */
/* Location: /community_auth/controllers/Examples.php */
