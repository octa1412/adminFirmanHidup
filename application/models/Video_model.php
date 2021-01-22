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
			$this->db->where('id_kategori',$id);
		}
		$query = $this->db->get();
		return $query->result_array();
    }

    public function get_video($id = NULL) {  // id = id kategori
		$this->db->select('*');
		// $this->db->join('kategori','kategori.id_kategori = video.id_kategori');
		$this->db->from('video');		
        if($id != NULL){
            $this->db->where('id_kategori', $id);
		}
		$this->db->order_by('id_video','desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_video_id($id = NULL) { // id = id video
		$this->db->select('*');
		// $this->db->join('kategori','kategori.id_kategori = video.id_kategori');
        $this->db->from('video');
        if($id != NULL){
			$this->db->where('video.id_video', $id);			
        }
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_video_limit($id = NULL, $kategori = NULL, $start = NULL) {
		$this->db->select('*');
		$this->db->join('kategori','kategori.id_kategori = video.id_kategori');
		$this->db->from('video');	

		if($start != NULL){
			$this->db->limit(4, $start);
		}	
		if($id != NULL){
			$this->db->where('video.id_video', $id);			
        }
		if($kategori != NULL){
            $this->db->where('kategori.id_kategori', $kategori);
		}

		$this->db->order_by('id_video','desc');

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
		$this->db->where('id_video', $id);
		$query = $this->db->get('video');
		$row = $query->row();
	
		unlink("./upload/videos/$row->source_video");
		unlink("./upload/thumbnail/$row->source_gambar");

		// $this->db->delete('video');
		$this->db->delete('video', array('id_video' => $id));

		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}

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
		$this->db->where('id_kategori', $id);
		$query = $this->db->get('kategori');
		$row = $query->row();
	
		unlink("./upload/foto_kategori/$row->src_gambar");

		// $this->db->delete('video');
		$this->db->delete('kategori', array('id_kategori' => $id));
		
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}

	public function delete_file_video($file){	
		unlink("./upload/videos/$file");

		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}

	public function delete_file_thumbnail($file){	
		unlink("./upload/thumbnail/$file");

		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}

	public function delete_file_kategori($file){	
		unlink("./upload/foto_kategori/$file");

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