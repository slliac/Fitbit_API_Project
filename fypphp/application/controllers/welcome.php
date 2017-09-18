<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

        /**
         * Index Page for this controller.
         *
         * Maps to the following URL
         *              http://example.com/index.php/welcome
         *      - or -
         *              http://example.com/index.php/welcome/index
         *      - or -
         * Since this controller is set as the default controller in
         * config/routes.php, it's displayed at http://example.com/
         *
         * So any other public methods not prefixed with an underscore will
         * map to /index.php/welcome/<method_name>
         * @see http://codeigniter.com/user_guide/general/urls.html
         */

         function __Construct()
         {
          parent::__Construct();
                                $dbconnect = $this->load->database();
                                $this->load->model('Simple_model');
         }

        public function index()
        {
                $this->data['abc'] = $this->Simple_model->get_all_name();

                $this->load->view('welcome_message', $this->data);

        }


        public function autocomplete()
        {
                // load model
                $this->load->model('Simple_model');

                $search_data = $this->input->post('search_data');

                $result = $this->Welcome_model->get_autocomplete($search_data);

                if (!empty($result))
                {
                    foreach ($result as $row):
                        echo "<li><a href='#'>" . $row->name . "</a></li>";
                    endforeach;
                }
                else
                {
                    echo "<li> <em> Not found ... </em> </li>";
                }
        }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
