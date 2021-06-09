<?php
    class Bug_category_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function create_category(){
            $data = array(
                'name' => $this->input->post('name'),
                'user_id' => $this->session->userdata('user_id')
            );

            return $this->db->insert('bug_categories', $data);
        }

        public function get_categories(){
            $this->db->order_by('id');
            $query = $this->db->get('bug_categories');
            return $query->result_array();
        }

        public function delete_category($id){
            $data = array(
                'bug_category_id' => 1
            );
            $this->db->where('bug_category_id', $id);
            $this->db->update('bugs', $data);

            $this->db->where('id', $id);
            $this->db->delete('bug_categories');
            return true;
        }
    }