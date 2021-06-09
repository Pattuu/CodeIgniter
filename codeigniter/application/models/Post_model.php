<?php
    class Post_model extends CI_model{
        public function __construct(){
            $this->load->database();
        }

        // Gets posts from posts table
        public function get_posts($slug = FALSE, $limit = FALSE, $offset = FALSE){
            if($limit){
                $this->db->limit($limit, $offset);
            }
            if($slug === FALSE){
                $this->db->order_by('posts.id', 'DESC');
                $this->db->join('categories', 'categories.id = posts.category_id');
                $query = $this->db->get('posts');
                return $query->result_array();
            }

            $query = $this->db->get_where('posts', array('slug' => $slug));
            return $query->row_array();
        }


        // Creates a new post in posts table
        public function create_post($post_image){
            $slug = url_title($this->input->post('title'));

            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'body' => $this->input->post('body'),
                'category_id' => $this->input->post('category_id'),
                'user_id' => $this->session->userdata('user_id'),
                'post_image' => $post_image
            );

            return $this->db->insert('posts', $data);
        }


        // Deletes post and it's comments from posts and comments tables
        public function delete_post($id){
            $this->db->where('post_id', $id);
            $this->db->delete('comments');
            $this->db->where('id', $id);
            $this->db->delete('posts');
            return true;
        }


        // Updates post after edit
        public function update_post(){
            $slug = url_title($this->input->post('title'));

            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'body' => $this->input->post('body'),
                'category_id' => $this->input->post('category_id')
            );

            $this->db->where('id', $this->input->post('id'));
            return $this->db->update('posts', $data);
        }

        // Get all categories from categories table
        public function get_categories(){
            $this->db->order_by('id');
            $query = $this->db->get('categories');
            return $query->result_array();
        }

        // Gets posts based on category
        public function get_post_by_category($category_id){
            $this->db->order_by('posts.id', 'DESC');
            $this->db->join('categories', 'categories.id = posts.category_id');
            $query = $this->db->get_where('posts', array('category_id' => $category_id));
            return $query->result_array();
        }

        // Get post slug
        public function get_post_slug($id){
            return $this->db->query("SELECT * FROM posts WHERE id = '$id'")->row()->slug;
        }

        // Adds upvote
        public function add_upvote($id){

            // Check if user has already voted on the post
            $user_id = $this->session->userdata('user_id');
            $query = $this->db->get_where('votes', array('post_id' => $id, 'user_id' => $user_id));
            if($query->result_array()){
                return false;
            }

            // Create data array
            $data = array(
                'post_id' => $id,
                'user_id' => $user_id,
                'vote' => 1
            );

            // Update score on posts table
            $query2 = $this->db->query("SELECT * FROM posts WHERE id = '$id'")->row()->score;
            $new_score = $query2 + 1;
            $data2 = array(
                'score' => $new_score
            );
            $this->db->update('posts', $data2);

            // Insert data into votes table
            return $this->db->insert('votes', $data);
        }


        // Adds downvote
        public function add_downvote($id){

            // Check if user has already voted on the post
            $user_id = $this->session->userdata('user_id');
            $query = $this->db->get_where('votes', array('post_id' => $id, 'user_id' => $user_id));
            if($query->result_array()){
                return false;
            }

            // Create data array
            $data = array(
                'post_id' => $id,
                'user_id' => $user_id,
                'vote' => -1
            );

            // Update score on posts table
            $query2 = $this->db->query("SELECT * FROM posts WHERE id = '$id'")->row()->score;
            $new_score = $query2 - 1;
            $data2 = array(
                'score' => $new_score
            );
            $this->db->update('posts', $data2);

            // Insert data into votes table
            return $this->db->insert('votes', $data);
        }
    }
