<?php
    class Bug_categories extends CI_Controller{
        public function index(){
            $data['title'] = 'Bug Categories';

            $data['categories'] = $this->bug_category_model->get_categories();

            $this->load->view('templates/header');
            $this->load->view('bug_categories/index', $data);
            $this->load->view('templates/footer');
        }

        public function create(){
			// Check login status
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
            }
            
            $data['title'] = 'Create a Bug Category';

            $this->form_validation->set_rules('name', 'Name', 'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('bug_categories/create', $data);
                $this->load->view('templates/footer');
            }else{
                $this->bug_category_model->create_category();
                $this->session->set_flashdata('bug_category_created', 'Your bug category has been created!');
                redirect('bug_categories');
            }
        }

        public function delete($id){
			// Check login status
			if(!$this->session->userdata('logged_in')){
			redirect('users/login');
			}

			$this->bug_category_model->delete_category($id);
			$this->session->set_flashdata('bug_category_deleted', 'Your bug category has been deleted!');
			redirect('bug_categories');
		}
    }