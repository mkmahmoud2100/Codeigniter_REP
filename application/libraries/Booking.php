<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Booking
 *
 * @author mahmoud
 */
class Booking extends CI_Controller {

    private $C = NULL;

    public function __construct() {
        parent::__construct();
        $this->C = &get_instance();
    }

    public function configuration() {
        $config = array(
            array(
                'field' => 'from-address',
                'label' => 'from-address',
                'rules' => 'required',
            ),
            array(
                'field' => 'to-address',
                'label' => 'to-address',
                'rules' => 'required',
            ),
            array(
                'field' => 'flight-no',
                'label' => 'flight-no',
                'rules' => 'required',
            ),
            array(
                'field' => 'return-flight-no',
                'label' => 'return-flight-no',
                'rules' => 'callback_retrun_checked',
            ),
            array(
                'field' => 'depart-date',
                'label' => 'depart date',
                'rules' => 'required',
            ),
            array(
                'field' => 'depart-time',
                'label' => 'depart-time',
                'rules' => 'required',
            ),
            array(
                'field' => 'arrival-date',
                'label' => 'arrival-date',
                'rules' => 'callback_retrun_checked',
            ),
            array(
                'field' => 'arrival-time',
                'label' => 'arrival-time',
                'rules' => 'callback_retrun_checked',
            ),
            array(
                'field' => 'name',
                'label' => 'name',
                'rules' => 'required|max_length[35]',
            ),
            array(
                'field' => 'surname',
                'label' => 'surname',
                'rules' => 'required|max_length[35]',
            ),
            array(
                'field' => 'email',
                'label' => 'email',
                'rules' => 'required|valid_email|trim',
            ),
            array(
                'field' => 'mobile',
                'label' => 'mobile',
                'rules' => 'required|max_length[14]',
            )
        );
        return $config;
    }

    public function retrun_checked($str) {
//        print $this->security->xss_clean($this->input->post('return-way'));
        if ($str == NULL && $this->security->xss_clean($this->input->post('return-way')) == 'T') {
            $this->form_validation->set_message('retrun_checked', 'The {field} field can not be empty while retuen way is SELECTED');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function index() {
        $twoway = $this->input->post("twoway");
        $this->smarty->assign("twoway", $twoway);

        $accessory = $this->Accessories_model->viewAll();
        $this->smarty->assign("accessory", $accessory);

        $currencies = $this->Currency_model->viewAll();
        $this->smarty->assign("currencies", $currencies);

        $this->smarty->assign("validation_errors", $this->form_validation->error_array());

        $code = $this->Booking_model->getLastBookingCode();
        $last_code = "";
        if (is_array($code)) {
            foreach ($code as $row) {
                $last_code = $row["AUTO_INCREMENT"];
            }
        }
        $this->smarty->assign("lastCode", $last_code);
        $this->smarty->assign('site_url', site_url());
        $this->smarty->view('booking.tpl', array());
    }

//    public function search() {
//        //print 'Search fnctio';
//        $address = $this->input->post('from-address');
//        $result = $this->Route_model->search_database($address);
////            print_r($result);
//        echo json_encode($result);
//    }
//    public function searchRouteInfo() {
//
//        $twoway = $this->input->post("twoway");
//
//        $this->smarty->assign("twoway", $twoway);
//
//        $accessory = $this->Accessories_model->viewAll();
//        $this->smarty->assign("accessory", $accessory);
//
//        $currencies = $this->Currency_model->viewAll();
//        $this->smarty->assign("currencies", $currencies);
//
//        $this->smarty->assign("validation_errors", $this->form_validation->error_array());
//
//        $code = $this->Booking_model->getLastBookingCode();
//        $last_code = "";
//        if (is_array($code)) {
//            foreach ($code as $row) {
//                $last_code = $row["AUTO_INCREMENT"];
//            }
//        }
//        $this->smarty->assign("lastCode", $last_code);
//        $this->smarty->view('reservation.tpl', array());
//    }

    public function reserveBooking() {
        if ($this->input->post('submit')) {
//            print 'Cehedche' . $this->security->xss_clean($this->input->post('return-way'));
//            print "Route Id" . $this->input->post('route_id');
//            print_r($_POST);
            $conf = $this->configuration();
            $this->form_validation->set_rules($conf);
            if ($this->form_validation->run() == FALSE) {
//                print_r($this->form_validation->error_array());
//                foreach ($this->form_validation->error_array() as $key => $value) {
////                    print $value;
//                }
                $this->smarty->assign("validation_errors", $this->form_validation->error_array());

                /* retype field form validation */

                $this->smarty->assign("from_address", set_value('from-address'));
                $this->smarty->assign("to_address", set_value('to-address'));
                $this->smarty->assign("flight_no", set_value('flight-no'));
                $this->smarty->assign("return_flight_no", set_value('return-flight-no'));

                $this->smarty->assign("depart_date", set_value('depart-date'));
                $this->smarty->assign("depart_time", set_value('depart-time'));
                $this->smarty->assign("address", set_value('address'));

                $this->smarty->assign("arrival_date", set_value('arrival-date'));
                $this->smarty->assign("arrival_time", set_value('arrival-time'));
                $this->smarty->assign("delivery-address", set_value('delivery-address'));

                $this->smarty->assign("name", set_value('name'));
                $this->smarty->assign("surname", set_value('surname'));
                $this->smarty->assign("email", set_value('email'));
                $this->smarty->assign("mobile", set_value('mobile'));
                $this->smarty->assign("phone", set_value('phone'));
                $this->smarty->assign("address", set_value('address'));
                $this->smarty->view("booking.tpl", array());
            } else {

                $return_way = $this->security->xss_clean($this->input->post('return-way'));
                if ($return_way == 'T') {
                    $type = 'T';
                } else {
                    $type = 'O';
                }
//             print 'Type ' . $type;
                $from = $this->security->xss_clean($this->input->post('from-address'));
                $to = $this->security->xss_clean($this->input->post('to-address'));
                $address = $this->security->xss_clean($this->input->post('address'));
                $estimated_time = $this->security->xss_clean($this->input->post('duration-hidden'));
                $distance = $this->security->xss_clean($this->input->post('distance-hidden'));
                $fees = $this->security->xss_clean($this->input->post('fees-hidden'));
                $total = $this->security->xss_clean($this->input->post('total-try-hidden')); //set total from exchange and store it in booking schema
                $iso = $this->security->xss_clean($this->input->post('fees-iso-hidden'));

                $route = new Route_lib(0, $from, $to, $address, $estimated_time, $distance, $fees, $iso, "");
//                print_r($route);


                $booking = new Booking_lib();
                $booking->setTypeId($type);
                $booking->setTotal($total);
//                print_r($booking);

                $flight_no = $this->security->xss_clean($this->input->post('flight-no'));
                $return_flight_no = $this->security->xss_clean($this->input->post('return-flight-no'));
                $depart_date = $this->security->xss_clean($this->input->post('depart-date'));
                $depart_time = $this->security->xss_clean($this->input->post('depart-time'));
                $arrival_date = $this->security->xss_clean($this->input->post('arrival-date'));
                $arrival_time = $this->security->xss_clean($this->input->post('arrival-time'));


                $schedule = new Schedule_lib(0, $flight_no, $return_flight_no, $depart_date
                        , $depart_time, $arrival_date, $arrival_time, 0);
//                print_r($schedule);
                $name = $this->security->xss_clean($this->input->post('name'));
                $surname = $this->security->xss_clean($this->input->post('surname'));
                $email = $this->security->xss_clean($this->input->post('email'));
                $mobile = $this->security->xss_clean($this->input->post('mobile'));
                $phone = $this->security->xss_clean($this->input->post('phone'));

                $customer = new Customer_lib($customerId = 0, $name, $surname, $email
                        , $mobile, $phone, $address);
//                print_r($customer);
                $adult = $this->security->xss_clean($this->input->post('adult'));
                $kids = $this->security->xss_clean($this->input->post('kids'));
                $baby = $this->security->xss_clean($this->input->post('baby'));

                $pOBoard = new PassengerOnBoard(0, $adult, $kids, $baby);

                $babyChair = $this->security->xss_clean($this->input->post('baby-chair'));
                $infantAcc = $this->security->xss_clean($this->input->post('infant'));

//            print $babyChair . $infantAcc;

                $bookingAccessory = array();
                if ($babyChair != 0) {
                    $bookingAccessory[0] = new BookingAccessory();
                    $bookingAccessory[0]->setAccessId($babyChair);
                }
                if ($infantAcc != 0) {
                    $bookingAccessory[1] = new BookingAccessory();
                    $bookingAccessory[1]->setAccessId($infantAcc);
                }
                $link = base_url() . 'booking';

//                print_r($bookingAccessory);
                $flag = $this->Booking_model->insert($booking, $route, $schedule, $customer, $pOBoard, $bookingAccessory);
//                print 'flag ' . $flag;
                if ($flag) {
                    $sent = $this->sendApproval($customer->getEmail(), $booking, $route, $pOBoard, $schedule, $customer);

                    if ($sent == 1) {
                        echo "<script> alert('Your reservation have been approved. Please check your email.');
                   window.location.href = '$link';
                       </script>";
//                        print "<script> alert('Your reservation have been approved. Please check your email.');
//                   window.location.href = '$link';
//                       </script>";
                    } else {
//                        print "<script> alert('Your reservation have been done. Please send us email for verification
//                            on info@cyprotransfer.com or via facebook cyprotransfer.');
//                   window.location.href = '$link';
//                       </script>";
                    }
                } else {
                    $this->smarty->assign("from_address", set_value(''));
                    $this->smarty->assign("to_address", set_value(''));
                    $this->smarty->assign("flight_no", set_value('flight-no'));
                    $this->smarty->assign("return_flight_no", set_value('return-flight-no'));

                    $this->smarty->assign("depart_date", set_value('depart-date'));
                    $this->smarty->assign("depart_time", set_value('depart-time'));
                    $this->smarty->assign("arrival_date", set_value('arrival-date'));
                    $this->smarty->assign("arrival_time", set_value('arrival-time'));

                    $this->smarty->assign("name", set_value('name'));
                    $this->smarty->assign("surname", set_value('surname'));
                    $this->smarty->assign("email", set_value('email'));
                    $this->smarty->assign("mobile", set_value('mobile'));
                    $this->smarty->assign("phone", set_value('phone'));
                    $this->smarty->assign("address", set_value('address'));

                    $this->smarty->assign("database_error", "The same parameters were exists!");
                    $this->smarty->view("booking.tpl", array());
                }
            }
        }
    }

    public function sendApproval($to_email, Booking_lib $booking, Route_lib $route, PassengerOnBoard $pOBoard, Schedule_lib $schedule, Customer_lib $customer) {
        $sent = 0;
        $from = 'Cypro Transfer';
        $subject = 'Reservation Approval';
        $message = " You has been request a tansfer ";
        $message += " Booking Date: " . $booking->getBookingDate();
        $message += " From : " . $route->getFromAddress() . " To : " . $route->getToAddress() . " ";
        $message += " Estimated Time: " . $route->getEstimatedTime() . " Distance: " . $route->getDistance() . " ";
        $message += " Fees: " . $route->getFees() . " Currency: " . $route->getCurrencyISO() . "";
        $message += " Depart Date / Time : " . $schedule->getDepartDate() . " " . $schedule->getDepartTime() . " ";
        $message += " Arrival Date / Time : " . $schedule->getArrivalDate() . " " . $schedule->getArrivalTime() . " ";
        $message += " Flight No: " . $schedule->getFlightNo() . " Return Flight No: " . $schedule->getReturnFlightNo() . " ";
        $message += " Name: " . $customer->getName() . " Surname: " . $customer->getSurname() . " ";
        $message += " Email: " . $customer->getEmail() . " Phone: " . $customer->getMobile() . " ";
        $message += " Adress: " . $customer->getAddress() . " ";
        $message += " Adults: " . $pOBoard->getAdult() . " Kids: " . $pOBoard->getKids() . " Infants: " . $pOBoard->getInfant() . " ";
        $message += " If there is any mistakes in yours reservation,"
                . " please send an email to this address (info@cyprotransfer.com) "
                . " or call the following"
                . " numbers: "
                . " 00 90 5428582417  "
                . " 00 90 5338482417 "
                . " 00 357 97615741  ";

        $config['protocol'] = 'SMTP';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['smtp_host'] = 'mail.cyprotransfer.com';
        $config['smtp_user'] = 'customer@cyprotransfer.com';
        $config['smtp_pass'] = 'fsXstxOqZQ$a';
        $config['smtp_port'] = '587';
        $this->email->initialize($config);
        $this->email->from($from);
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message . " ");

        if ($this->email->send(FALSE)) {
//            print 'Message Has Been Sent ';
            $sent = 1;
        } else {
//            print $this->email->print_debugger(array('headers'));
            $sent = 0;
        }
        return $sent;
    }

    public function viewAccessorisById($id) {
        $data = $this->Accessories_model->viewById($id);
        $array = json_encode($data);
//print_r($array);
        echo $array;
    }

    public function bookingInfo() {
//        print 'bookingInfo';
//        print_r($_POST);
        if ($this->input->post("find_booking")) {
//            print '

            $bookingId = $this->input->post('booking_search');
            $bookingInfo = $this->Booking_model->findBookingById($bookingId);
            $this->smarty->assign("bookingInfo", $bookingInfo);
//            print_r($bookingInfo);
            $bookingAccessories = $this->Booking_model->viewBookingAccessories($bookingId);
//            print_r($bookingAccessories);
            $this->smarty->assign('bookingAccessories', $bookingAccessories);
            $this->smarty->view("booking_info.tpl", array());
        }
    }

    public function booking_details() {
        $currencies = $this->Currency_model->viewAll();
        $this->smarty->assign("currencies", $currencies);
        $this->smarty->view("booking_details.tpl", array());
    }

}
