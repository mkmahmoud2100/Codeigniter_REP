<?php
defined('BASEPATH') or exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Users
 *
 * @author mahmoud
 */
class Users extends CI_Controller{
   public function __construct() {
       parent::__construct();
   }
   public function index(){
       
   }
   
    // -----------------------------------------------------------------------

    /**
     * Most minimal user creation. You will of course make your
     * own interface for adding users, and you may even let users
     * register and create their own accounts.
     *
     * The password used in the $user_data array needs to meet the
     * following default strength requirements:
     *   - Must be at least 8 characters long
     *   - Must be at less than 72 characters long
     *   - Must have at least one digit
     *   - Must have at least one lower case letter
     *   - Must have at least one upper case letter
     *   - Must not have any space, tab, or other whitespace characters
     *   - No backslash, apostrophe or quote chars are allowed
     */
    public function create_user() {
        // Customize this array for your user
        $user_data = [
            'username' => 'admin',
            'passwd' => '7_U+^o~gAM',
            'email' => 'admin@example.com',
            'auth_level' => '9', // 9 if you want to login @ examples/index.
        ];

        $this->is_logged_in();

        echo $this->load->view('examples/page_header', '', TRUE);

        // Load resources
        $this->load->helper('auth');
        $this->load->model('examples/examples_model');
        $this->load->model('examples/validation_callables');
        $this->load->library('form_validation');

        $this->form_validation->set_data($user_data);

        $validation_rules = [
            [
                'field' => 'username',
                'label' => 'username',
                'rules' => 'max_length[12]|is_unique[' . db_table('user_table') . '.username]',
                'errors' => [
                    'is_unique' => 'Username already in use.'
                ]
            ],
            [
                'field' => 'passwd',
                'label' => 'passwd',
                'rules' => [
                    'trim',
                    'required',
                    [
                        '_check_password_strength',
                        [ $this->validation_callables, '_check_password_strength']
                    ]
                ],
                'errors' => [
                    'required' => 'The password field is required.'
                ]
            ],
            [
                'field' => 'email',
                'label' => 'email',
                'rules' => 'trim|required|valid_email|is_unique[' . db_table('user_table') . '.email]',
                'errors' => [
                    'is_unique' => 'Email address already in use.'
                ]
            ],
            [
                'field' => 'auth_level',
                'label' => 'auth_level',
                'rules' => 'required|integer|in_list[1,6,9]'
            ]
        ];

        $this->form_validation->set_rules($validation_rules);

        if ($this->form_validation->run()) {
            $user_data['passwd'] = $this->authentication->hash_passwd($user_data['passwd']);
            $user_data['user_id'] = $this->examples_model->get_unused_id();
            $user_data['created_at'] = date('Y-m-d H:i:s');

            // If username is not used, it must be entered into the record as NULL
            if (empty($user_data['username'])) {
                $user_data['username'] = NULL;
            }

            $this->db->set($user_data)
                    ->insert(db_table('user_table'));

            if ($this->db->affected_rows() == 1)
                echo '<h1>Congratulations</h1>' . '<p>User ' . $user_data['username'] . ' was created.</p>';
        }
        else {
            echo '<h1>User Creation Error(s)</h1>' . validation_errors();
        }

        echo $this->load->view('examples/page_footer', '', TRUE);
    }
    public function editUser(){
        
    }
    public function deleteUser(){
        
    }
}
