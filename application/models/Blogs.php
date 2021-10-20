<?php
	class Blogs extends CI_Model{
        public function all() {
            return $this->db->get('blogs')->result();
        }

        public function get($id) {
            return $this->db->where('id', $id)->get('blogs')->result()[0];
        }

		public function add($blog){
			return $this->db->insert('blogs', $blog);
		}

        public function delete($id){
			$this->db->where('id', $id);
            $this->db->delete('blogs');
		}

        public function update($blog, $id){
            $this->db->where('id', $id);
			$this->db->update('blogs', $blog);
		}
	}
?>