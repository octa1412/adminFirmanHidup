<?php
class Video_model extends CI_Model {

	public function __construct(){
		$this->load->database();
	}

    //GET DATABASE
    public function get_all_genre($id = NULL){
        $this->db->select('*');
		$this->db->from('kategori');
		if ($id != NULL){
			$this->db->where('IdKategori',$id);
		}
		$query = $this->db->get();
		return $query->result_array();
    }

    public function get_video($id = NULL) {
		$this->db->select('*');
		$this->db->from('kategori');		
		$this->db->join('video','video.IdKategori = kategori.IdKategori');
		$this->db->join('thumbnail','thumbnail.id_gambar = video.id_gambar');
        if($id != NULL){
            $this->db->where('kategori.IdKategori', $id);
		}
		$this->db->order_by('video.IdVideo','desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_video_id($id = NULL) {
		$this->db->select('*');
		$this->db->join('kategori','kategori.IdKategori = video.IdKategori');
        $this->db->from('video');
        if($id != NULL){
			$this->db->where('video.IdVideo', $id);			
        }
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_reply_id($id = NULL) {
		$this->db->select('*');
        $this->db->from('reply_doa');
        if($id != NULL){
			$this->db->where('id_ruang_doa', $id);			
        }
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_video_doa($email = NULL, $start = NULL) {
		$this->db->select('*');
		$this->db->from('ruang_doa');	

		if($start != NULL){
			$this->db->limit(4, $start);	
		}
        if($email != NULL){
            $this->db->where('email', $email);
		}
		$this->db->order_by('id_ruang_doa','desc');

		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_data_error_log($orderby = NULL, $sort = "asc", $limit = NULL){
		$this->db->select('*');
		$this->db->from('error_log');
		if ($orderby != NULL) {
			$this->db->order_by($orderby, $sort);
		}
		if ($limit != NULL) {
			$this->db->limit($limit);
		}
		$query = $this->db->get();
		return $query->result_array();
	}


	//INSERT DATABASE
	public function insert_video($data){
        $this->db->insert('video', $data);
        if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}

	public function insert_video_doa($data){
        $this->db->insert('ruang_doa', $data);
        if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}

	public function insert_reply_doa($data){
        $this->db->insert('reply_doa', $data);
        if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}

	public function insert_kategori($data){
        $this->db->insert('kategori', $data);
        if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}

	public function insert_error_log($data){
		$this->db->insert('error_log', $data);
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}




	//UPDATE DATABASE
	public function update($where, $data){
		$this->db->where($where);
        $this->db->update('video', $data);
	}

	public function update_category($where, $data){
		$this->db->where($where);
        $this->db->update('kategori', $data);
	}

	public function update_video_doa($where, $data){
		$this->db->where($where);
        $this->db->update('ruang_doa', $data);
	}

	//DELETE DATABASE
	public function delete($id){
		$this->db->where('IdVideo', $id);
		$query = $this->db->get('video');
		$row = $query->row();
	
		unlink("./upload/videos/$row->SourceVideo");

		// $this->db->delete('video');
		$this->db->delete('video', array('IdVideo' => $id));

		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}

	//DELETE DATABASE
	public function delete_ruang_doa($id){
		$this->db->where('id_ruang_doa', $id);
		$query = $this->db->get('reply_doa');
		$row = $query->row();
	
		unlink("./upload/reply_ruang_doa/$row->video");

		// $this->db->delete('video');
		$this->db->delete('reply_doa', array('id_ruang_doa' => $id));

		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}

	public function delete_kategori($id){
		$this->db->where('IdKategori', $id);
		$this->db->delete('kategori');
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}
	
	//OTHER
	//Insert or Update
	public function insertOrUpdate($table, $data) {
		if (empty($table) || empty($data)) return false;
		$duplicate_data = array();
		foreach($data AS $key => $value) {
			if ($value!=NULL) {
				$duplicate_data[] = sprintf("%s='%s'", $key, $value);
			}else{
				$duplicate_data[] = sprintf("%s=NULL", $key);
			}
			
		}

		$sql = sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string($table, $data), implode(',', $duplicate_data));
		$this->db->query($sql);
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}
	

}