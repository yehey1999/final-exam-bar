<?php
	class Comments extends CI_Model{
        public function all() {
            return $this->db->get('comments')->result();
        }

        public function get($id) {
            return $this->db->where('id', $id)->get('comments')->result()[0];
        }

        public function isUsernameExists($username) {
            return $this->db->where('username', $username)->get('comments')->result()[0];
        }

		public function add($comment){
			return $this->db->insert('comments', $comment);
		}

        public function delete($id){
			$this->db->where('id', $id);
            $this->db->delete('comments');
		}

        public function update($comment, $id){
            $this->db->where('id', $id);
			$this->db->update('comments', $comment);
		}
	}
?>