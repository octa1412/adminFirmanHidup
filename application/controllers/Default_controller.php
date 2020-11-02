<?php

// include_once ("Loadview.php");

class Default_controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Default_model');
		$this->load->model('Video_model');
		$this->load->helper('url_helper');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function frontpage(){
		$this->load->view('frontpage');
	}

	//front
	public function index(){
		$this->load->view('admin/login');
	}

	//Dashboard
	public function dashboardadmin(){
		if ($this->checkcookieadmin()) {
			$this->load->view('admin/dashboard');
		}else{
			header("Location: ".base_url()."index.php/loginadmin");
			die();
		}
	}

	
	//GET DATA

	//ambil data admin
	//note: password tidak diambil
	//parameter 1: true bila ingin return array, kosongi bila ingin Json
	public function get_all_admin($return_var = NULL){
		$data = $this->Default_model->get_data_admin();
		if (empty($data)){
			$data = [];
		}else{
			foreach ($data as &$row){
				unset($row['password']);
			}
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	//ambil data admin berdasarkan username
	//note: ambil data admin dari database berdasarkan username
	//parameter 1: username
	//parameter 1: true bila ingin return array, kosongi bila ingin Json
	public function get_admin_by_id($id, $return_var = NULL){
		$filter = array('username'=> $id);
		$data = $this->Default_model->get_data_admin($filter);
		if (empty($data)){
			$data = [];
		}else{
			foreach ($data as &$row){
				unset($row['password']);
			}
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}



	//ambil data error log (developer only)
	public function get_error_log($orderby = NULL, $sort = "asc", $limit = NULL, $return_var = NULL){
		$data = $this->Default_model->get_data_error_log($orderby, $sort, $limit);
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	//ambil data kategori
	//parameter 1: true bila ingin return array, kosongi bila ingin Json
	public function get_all_kategori($return_var = NULL){
		$data = $this->Video_model->get_all_genre();
			if (empty($data)){
				$data = [];
			}
			if ($return_var == true) {
				$jml = $data.length;
				return $data;
			}else{
				echo json_encode($data);
			}
	}

	//ambil data Video
	//parameter 1: true bila ingin return array, kosongi bila ingin Json
	public function get_all_video($return_var = NULL){
		$kategori = $this->input->post('data');
		
		if($kategori != Null){
			$data = $this->Video_model->get_video($kategori);
		} else {
			$data = $this->Video_model->get_video();
		}
				
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	//ambil data user berdasarkan username
	//note: ambil data user dari database berdasarkan username
	public function get_video_by_id($return_var = NULL){
		$id = $this->input->post('id');
		$data = $this->Video_model->get_video_id($id);
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}
	

	//INSERT

	//Tambah data admin
	//note: API hanya bisa diakses saat ada cookie admin
	//input: form POST seperti di bawah
	//output: success/failed/access denied
	public function insert_admin(){
		if ($this->checkcookieadmin()) {
			$data = array(
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password'))
			);
			$insertStatus = $this->Default_model->insert_admin($data);
			echo $insertStatus;
		}else{
			echo "access denied";
		}
	}

	//Tambah data error log
	//input: form POST seperti di bawah
	//output: success/failed
	public function insert_error_log($log = NULL){
		if (!empty($this->input->post('log'))) {
			$log = $this->input->post('log');
		}
		$data = array(
			'value' => $log
		);
		$insertStatus = $this->Default_model->insert_error_log($data);
		// echo $insertStatus;
	}

	// Tambah video 
	public function insert_video($kategori, $nama, $video) {
		// if ($this->checkcookieuser()) {
			// $idktgr = $this->input->post('kategori');
			// $video = $this->input->post('nama');

			$idktgr = $kategori;
			$nama = $nama;
			$video = $video;

			$data = array(
				'IdKategori' => $idktgr,
				'NamaVideo' => $nama,
				'SourceVideo' => $video
			);
			$insertStatus = $this->Video_model->insert_video($data);
			echo $insertStatus;
		// }else{
		// 	echo "access denied";
		// }
	}

	public function coba(){
		$datalama = $this->Video_model->get_video_id($_POST['id_file']);
		$videolama = $datalama[0]['SourceVideo'];

		if($_POST['status'] == "1"){			
			unlink('./upload/videos/'.$datalama[0]['SourceVideo']);

			if (isset($_FILES['fileupload']['name']) && $_FILES['fileupload']['name'] != '') {
				unset($config);
				$date = date("ymd");
				$configVideo['upload_path'] = './upload/videos';
				$configVideo['max_size'] = '60000';
				$configVideo['allowed_types'] = 'avi|flv|wmv|mp3|mp4';
				$configVideo['overwrite'] = FALSE;
				$configVideo['remove_spaces'] = TRUE;
				$video_name = $date.$_FILES['fileupload']['name'];
				$configVideo['file_name'] = $video_name;
		
				$this->load->library('upload', $configVideo);
				$this->upload->initialize($configVideo);

				if(!$this->upload->do_upload('fileupload')) {
					// echo $this->upload->display_errors();
				}else{
					$videoDetails = $this->upload->data();
					$data['video_name']= $configVideo['file_name'];
					$data['video_detail'] = $videoDetails;
					
					// echo "<pre>";
					// print_r($data);
					// echo "</pre>";

					// echo "<br> <br> nama";
					// echo $videoDetails['file_name'];
					$data['idvideo'] = $_POST['id_file'];
					$data['namavideo'] = $_POST['nama_file'];
					$data['kategori'] = $_POST['kategori_file'];				
					$nmvideo = $videoDetails['file_name'];	
					$data['namafile'] = $nmvideo;			
					
					$this->update_video($data['idvideo'], $data['kategori'], $data['namavideo'], $nmvideo );
										
					echo json_encode($data);
				
				}
		
			}else{
				echo "Please select a file";
			}

		} else {
			$data['idvideo'] = $_POST['id_file'];
			$data['namavideo'] = $_POST['nama_file'];
			$data['kategori'] = $_POST['kategori_file'];				

			$this->update_video($data['idvideo'], $data['kategori'], $data['namavideo'], $videolama );
		}

	}

	public function try(){
		$image = $this->input->post('data');
		$image_name = 'asd';
		$filename = $image_name . '.' . 'png';
		$path = ('upload/');

		//image uploading folder path
		file_put_contents($path . $filename, file_get_contents($image));

		echo $image;
	}

	public function add_video(){
		
		if (isset($_FILES['video']['name']) && $_FILES['video']['name'] != '') {
			unset($config);
			$date = date("ymd");
			$configVideo['upload_path'] = './upload/videos';
			$configVideo['max_size'] = '60000';
			$configVideo['allowed_types'] = 'avi|flv|wmv|mp3|mp4';
			$configVideo['overwrite'] = FALSE;
			$configVideo['remove_spaces'] = TRUE;
			$video_name = $date.$_FILES['video']['name'];
			$configVideo['file_name'] = $video_name;
	
			$this->load->library('upload', $configVideo);
			$this->upload->initialize($configVideo);

			if(!$this->upload->do_upload('video')) {
				// echo $this->upload->display_errors();
			}else{
				$videoDetails = $this->upload->data();
				$data['video_name']= $configVideo['file_name'];
				$data['video_detail'] = $videoDetails;
				
				echo "<pre>";
				print_r($data);
				echo "</pre>";

				echo "<br> <br> nama";
				echo $videoDetails['file_name'];
				$test['namavideo'] = $this->input->post('namavideo');
				$test['kategori'] = $this->input->post('kategori');				
				$nmvideo = $videoDetails['file_name'];				
				
				$this->insert_video($test['kategori'], $test['namavideo'], $nmvideo );
			
			}
	
		}else{
			echo "Please select a file";
		}

		redirect($_SERVER['HTTP_REFERER']);

	}

	

	//UPDATE

	//Ubah password admin
	//note: API hanya bisa diakses saat ada cookie admin
	//parameter 1: username
	//input: form POST seperti di bawah
	//output: success/failed/id not found/wrong old password/access denied
	public function update_password_admin($id){
		if ($this->checkcookieadmin()) {
			$oldpassword = md5($this->input->post('oldpassword'));
			$newpassword = md5($this->input->post('newpassword'));
			$filter = array('username'=> $id);
			$data = $this->Default_model->get_data_admin($filter);
			if (empty($data)){
				echo "id not found";
			}else{
				foreach ($data as $row){
					if ($oldpassword == $row['password']){
						$update_data = array(
							'password' => $newpassword
						);
						$updateStatus = $this->Default_model->update_admin($id,$update_data);
						echo $updateStatus;
					}else{
						echo "wrong old password";
					}
				}
			}
		}else{
			echo "access denied";
		}
	}

	//Update data video
	public function update_video($id, $kategori, $nama, $video){
		// $id = $this->input->post('id');
		// $nama = $this->input->post('nama');
		// $kategori = $this->input->post('kategori');
		// $status = $this->input->post('status');

		$data = array(
			'NamaVideo' => $nama,
			'IdKategori' => $kategori,
			'SourceVideo' => $video
		);
		
		$where= array('IdVideo' => $id );
        $this->Video_model->update($where, $data);
	}


	//DELETE

	//Delete admin
	//note: API hanya bisa diakses saat ada cookie admin
	//parameter 1: username
	//output: success/failed/access denied
	public function delete_admin($id){
		if ($this->checkcookieadmin()) {
			$deleteStatus = $this->Default_model->delete_admin($id);
			echo $deleteStatus;
		}else{
			echo "access denied";
		}
	}

	// delete video
	public function delete_video(){
		// if ($this->checkcookieuser()) {
			$id = $this->input->post('id');;
			$deleteStatus = $this->Video_model->delete($id);
			
			echo $deleteStatus;
		// }else{
		// 	echo "access denied";
		// }
	}


	//OTHER

	//Login admin
	//note: -
	//input: form POST seperti di bawah
	//Output: berhasil login / gagal login
	public function cekloginadmin(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$filter = array('username'=> $username);
		$data = $this->Default_model->get_data_admin($filter);
		$is_login = false;
		foreach ($data as $row){
			if ($username == $row['username'] && $password == $row['password']) {
				$this->create_cookie_encrypt("adminCookie",$username);
				$is_login = true;
				break;
			}
		}
		if ($is_login) {
			echo "berhasil login";
		}else{
			echo "gagal login";
		}
	}


	//Check cookie
	//note: tidak untuk front end
	public function checkcookieadmin(){
		$this->load->helper('cookie');
		if ($this->input->cookie('adminCookie',true)!=NULL) {
			$value = $this->str_rot($this->input->cookie('adminCookie',true)); //decrypt first
			if (empty($this->get_admin_by_id($value,true))) {
				return false;
			}else{
				return true;
			}
		}else{
			return false;
		}
	}

	//Logout
	//note: menghapus cookie dan langsung redirect ke halaman login
	public function logoutadmin(){
		$this->load->helper('cookie');
		delete_cookie("adminCookie");
		header("Location: ".base_url()."index.php");
		die();
	}

	//untuk membuat cookie
	//parameter 1: nama cookie (opsional)
	//parameter 2: value cookie (opsional)
	//parameter 3: expire (opsional)
	//input: form POST seperti di bawah (opsional bila tidak bisa menggunakan parameter)
	//output: -
	public function create_cookie($name = NULL, $value = NULL, $expire = NULL){
		if ($name == NULL) {
			$name = $this->input->post('name');
		}
		if ($value == NULL) {
			$value = $this->input->post('value');
		}
		if ($expire == NULL) {
			$expire = 0;
		}
		$this->load->helper('cookie');
		$cookie= array(
			'name'   => $name,
			'value'  => $value,
			'expire' => $expire
		);
		$this->input->set_cookie($cookie);
		// echo "cookie created";
	}

	//untuk mengambil cookie
	//note: JANGAN GUNAKAN INI UNTUK MENGAMBIL COOKIE USER (karena sudah di encrypt), gunakan get_cookie_decrypt() di bawah
	//parameter 1: nama cookie
	//output: no cookie / $cookie
	public function get_cookie($name){
		$this->load->helper('cookie');
		if ($this->input->cookie($name,true)!=NULL) {
			echo $this->input->cookie($name,true);
		}else{
			echo "no cookie";
		}
	}

	//untuk membuat cookie yang diencrypt
	//parameter 1: nama cookie (opsional)
	//parameter 2: value cookie (opsional)
	//parameter 3: expire (opsional)
	//input: form POST seperti di bawah (opsional bila tidak bisa menggunakan parameter)
	//output: -
	public function create_cookie_encrypt($name = NULL, $value = NULL, $expire = NULL){
		if ($name == NULL) {
			$name = $this->input->post('name');
		}
		if ($value == NULL) {
			$value = $this->input->post('value');
		}
		if ($expire == NULL) {
			$expire = 0;
		}
		$this->load->helper('cookie');
		$cookie= array(
			'name'   => $name,
			'value'  => $this->str_rot($value), //custom encoding
			'expire' => $expire
		);
		$this->input->set_cookie($cookie);
		// echo "cookie created";
	}

	//untuk mengambil cookie yang di decrypt dari fungsi create_cookie_encrypt
	//parameter 1: nama cookie
	//output: no cookie / $cookie
	public function get_cookie_decrypt($name){
		$this->load->helper('cookie');
		if ($this->input->cookie($name,true)!=NULL) {
			echo $this->str_rot($this->input->cookie($name,true));
		}else{
			echo "no cookie";
		}
	}


	//Untuk mengacak teks agar tidak mudah dibaca.
	//note: alternatif pengganti str_rot13 dan base64decode karena beberapa server melarang fungsi tersebut.
	//parameter 1: string yang akan di acak
	//parameter 2: sebanyak berapa posisi huruf berpindah
	//parameter 3: sebanyak berapa posisi digit berpindah
	public function str_rot($s, $nletter = 13, $ndiggit = 5) {
		static $letterslower = 'abcdefghijklmnopqrstuvwxyz';
		static $lettersupper = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		static $digits = '0123456789';
		$nletter = (int)$nletter % 26;
		$ndiggit = (int)$ndiggit % 10;
		for ($i = 0, $l = strlen($s); $i < $l; $i++) {
			$c = $s[$i];
			if ($c >= 'a' && $c <= 'z') {
				$s[$i] = $letterslower[(ord($c) - 71 + $nletter) % 26];
			} else if ($c >= 'A' && $c <= 'Z') {
				$s[$i] = $lettersupper[(ord($c) - 39 + $nletter) % 26];
			} else if ($c >= '0' && $c <= '9') {
				$s[$i] = $digits[(ord($c) - 38 + $ndiggit) % 10];
			}
		}
		return $s;
	}



	public function testing(){
		echo $this->Default_model->get_count_admin();
	}


	public function get_image($file){
		$config = array(
			'image_library' => 'GD2',
			'source_image'  => './assets/images/'.$file,
			'maintain_ratio'=> FALSE,
			'width'         => 600,
			'height'        => 400,
			'new_image'     => './assets/images/'.$file
		);

		$this->load->library('image_lib', $config[0]);
        foreach ($config as $item){
            $this->image_lib->initialize($item);
            if(!$this->image_lib->resize()){
                return false;
            }
            $this->image_lib->clear();
        }

	}

}