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
		$this->db->join('kategori','kategori.IdKategori = video.IdKategori');
        $this->db->from('video');
        if($id != NULL){
            $this->db->where('kategori.IdKategori', $id);
        }
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