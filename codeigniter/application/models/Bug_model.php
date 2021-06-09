<?php
    class Bug_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function get_bugs($slug = FALSE){
            if($slug === FALSE){
                $this->db->order_by('bugs.bug_id', 'DESC');
                $this->db->join('bug_categories', 'bug_categories.id = bugs.bug_category_id');
                $query = $this->db->get('bugs');
                return $query->result_array();
            }

            $query = $this->db->get_where('bugs', array('slug' => $slug));
            return $query->row_array();
        }

        public function create_report($bug_image){
            $slug = url_title($this->input->post('title'));
            

            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'description' => $this->input->post('description'),
                'reproduce' => $this->input->post('reproduction'),
                'user_id' => $this->session->userdata('user_id'),
                'bug_image' => $bug_image,
                'severity' => $this->input->post('severity'),
                'status' => 'Reported',
                'bug_category_id' => $this->input->post('bug_category_id'),
                'error_message' => $this->input->post('error_message'),
                'info' => $this->input->post('info'),
                'found_by' => $this->session->userdata('username')
            );

            return $this->db->insert('bugs', $data);
        }

        public function get_categories(){
            $this->db->order_by('id');
            $query = $this->db->get('bug_categories');
            return $query->result_array();
        }

        public function delete_bug($id){
            $this->db->where('bug_id', $id);
            $this->db->delete('bugs');
            return true;
        }

        public function update_post(){
            $slug = url_title($this->input->post('title'));

            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'body' => $this->input->post('description'),
                'bug_category_id' => $this->input->post('category_id')
            );

            $this->db->where('bug_id', $this->input->post('id'));
            return $this->db->update('bugs', $data);
        }

        public function get_category_name($bug_category_id){
            $name = $this->db->query("SELECT name AS cat_name FROM bug_categories WHERE id = '$bug_category_id'")->row();
            if ($name) {
                return $name->cat_name;
            } 
            else {
                return FALSE;
            }
        }

        public function mark_as_solved($id){
            //load date helper
            $this->load->helper('date');

            $this->db->where('bug_id', $id);
            $data = array(
                'solved' => 1,
                'solved_by' => $this->session->userdata('username'),
                'status' => 'Solved'
            );
            $this->db->set('solved_at', 'NOW()', FALSE);
            return $this->db->update('bugs', $data);
        }

        public function check_title_exists($title){
            $query = $this->db->get_where('bugs', array('title' => $title));
            if(empty($query->row_array())){
                return true;
            }else{
                return false;
            }
        }

    }