<?php

    class Bugs extends CI_Controller{
        public function index(){
            $data['title'] = 'Bug Tracker';

			$data['bugs'] = $this->bug_model->get_bugs();
			

            $this->load->view('templates/header');
            $this->load->view('bugs/index', $data);
            $this->load->view('templates/footer');
        }

        public function view($slug = NULL){
			$data['bug'] = $this->bug_model->get_bugs($slug);
			$bug_id = $data['bug']['bug_id'];

			$data['name'] = $this->bug_model->get_category_name($data['bug']['bug_category_id']);
			if(empty($data['bug'])){
				show_404();
			}

			$data['title'] = $data['bug']['title'];

			$this->load->view('templates/header');
			$this->load->view('bugs/view', $data);
			$this->load->view('templates/footer');
		}

        public function create(){
			// Check login status
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}


			$data['title'] = 'Report a bug';

			$data['categories'] = $this->bug_model->get_categories();

			$this->form_validation->set_rules('title', 'Title', 'required|callback_check_title_exists');
			$this->form_validation->set_rules('description', 'Description', 'required');
			$this->form_validation->set_rules('reproduction', 'Reproduction', 'required');
			$this->form_validation->set_rules('error_message', 'Error message', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('bugs/create', $data);
				$this->load->view('templates/footer');
			} else {
				// Upload Image
				$config['upload_path'] = './assets/images/bugs';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['max_width'] = '4000';
				$config['max_height'] = '4000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$errors = array('error' => $this->upload->display_errors());
					$bug_image = 'noimage';
				}else{
					$data = array('upload_data' => $this->upload->data());
					$bug_image = $_FILES['userfile']['name'];
				}

				$this->bug_model->create_report($bug_image);

				$this->session->set_flashdata('bug_created', 'Your bug report has been created!');
				redirect('bugs');
			}
		}

		public function delete($id){
			// Check login status
			if(!$this->session->userdata('logged_in')){
			redirect('users/login');
			}

			$this->bug_model->delete_bug($id);
			$this->session->set_flashdata('bug_deleted', 'Your bug report has been deleted!');
			redirect('bugs');
		}

		public function edit($slug){
			// Check login status
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$data['bug'] = $this->bug_model->get_bugs($slug);

			// Check user
			if($this->session->userdata('user_id') != $this->bug_model->get_bugs($slug)['user_id']){
				redirect('bugs');
			}

			$data['bug_categories'] = $this->bug_model->get_categories();
			$data['name'] = $this->bug_model->get_category_name($data['bug']['bug_category_id']);

			if(empty($data['bug'])){
				show_404();
			}

			$data['title'] = 'Edit Bug Report';

			$this->load->view('templates/header');
			$this->load->view('bugs/edit', $data);
			$this->load->view('templates/footer');
		}

		public function update(){
			// Check login status
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$this->bug_model->update_bug();

			$this->session->set_flashdata('bug_edited', 'Your bug report has been updated!');
			redirect('bugs');
		}

		public function solved($id){
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$this->bug_model->mark_as_solved($id);
			$this->session->set_flashdata('bug_solved', 'Your bug report has been marked as solved!');
			redirect('bugs');
		}

		public function check_title_exists($title){
            $this->form_validation->set_message('check_title_exists', 'There is already a bug report with that title.');
            if($this->bug_model->check_title_exists($title)){
                return true;
            }else{
                return false;
            }
        }  

}