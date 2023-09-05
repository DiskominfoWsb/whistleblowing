<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation','recaptcha');
		$this->load->helper('security');
		$this->load->model('Auth_model');
		$this->load->model('Masyarakat_model');
	}

	public function index()
	{

		if ($this->session->userdata('id')) {
			if ($this->session->userdata('level') == "admin") {
				redirect('admin');
			} elseif ($this->session->userdata('level') == "petugas") {
				redirect('petugas');
			} else {
				redirect('masyarakat');
			}
		}
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('auth/wbs_landingpage');
		} else {
			$this->_login();
		}
	}

	public function login()
	{

		if ($this->session->userdata('id')) {
			if ($this->session->userdata('level') == "admin") {
				redirect('admin');
			} elseif ($this->session->userdata('level') == "petugas") {
				redirect('petugas');
			} else {
				redirect('masyarakat');
			}
		}
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		$data = array(
			'captcha' 		 => $this->recaptcha->getWidget(),
			'script_captcha' => $this->recaptcha->getScriptTag(),
		);
		
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/auth_header');
			$this->load->view('templates/auth_footer');
			$this->load->view('auth/login', $data);
		} else {
			$this->_login();
		}
	}

	public function daftar()
	{
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required|is_unique[masyarakat.nik]', [
			'is_unique' => 'NIP / NIK ini sudah terdaftar!'
		]);
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('telp', 'Telp', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[login.email]', [
			'is_unique' => 'Email ini sudah terdaftar!'
		]);
		
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]', [
			'matches' 	 => 'Password Tidak Sama!',
			'min_length' => 'Password Terlalu Pendek!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'trim|required|min_length[8]|matches[password1]', [
			'matches' 	 => 'Password Tidak Sama!',
			'min_length' => 'Password Terlalu Pendek!'
		]);

		$data = array(
			'captcha' 		 => $this->recaptcha->getWidget(),
			'script_captcha' => $this->recaptcha->getScriptTag(),
		);

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/auth_header');
			$this->load->view('templates/auth_footer');
			$this->load->view('auth/daftar',$data);
		} else {
			$this->_daftar();
		}
	}

	private function _daftar()
	{
		$recaptcha = $this->input->post('g-recaptcha-response');

		if (!empty($recaptcha)) {
			$response  = $this->recaptcha->verifyResponse($recaptcha);
			$data = [
				//'email' 	=> htmlspecialchars($this->input->post('email', TRUE)),
				'email' 	=> $this->input->post('email'),
				'password' 	=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'level' 	=> 'masyarakat'
			];
			$data = $this->security->xss_clean($data);
			$this->Auth_model->tambah_user($data);
			
			$dataMasyarakat = [
				'nik' 		=> htmlspecialchars($this->input->post('nik', TRUE)),
				'nama' 		=> htmlspecialchars($this->input->post('nama', TRUE)),
				'telp' 		=> htmlspecialchars($this->input->post('telp', TRUE)),
				'alamat' 	=> htmlspecialchars($this->input->post('alamat', TRUE)),
				'id_login' 	=> $this->Auth_model->get_user_terakhir()->ID_LOGIN
			];
			$dataMasyarakat = $this->security->xss_clean($dataMasyarakat);
			$this->Masyarakat_model->tambah_masyarakat($dataMasyarakat);

			$this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Selamat Anda telah terdaftar!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button></div>');
			redirect('auth/login');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger  alert-dismissible fade show" role="alert"> Captcha belum di Klik !<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button></div>');
			redirect('auth/daftar');
		}
	}

	private function _login()
	{
		$email 	   = $this->input->post('email');
		$password  = $this->input->post('password');
		$recaptcha = $this->input->post('g-recaptcha-response');

		$user = $this->db->get_where('login', ['email' => $email])->row_array();
		
		if (!empty($recaptcha)) {
			$response  = $this->recaptcha->verifyResponse($recaptcha);
			if ($user) {
				if (password_verify($password, $user['password']))
				{
					$data = [
						'id' => $user['id_login'],
						'level' => $user['level']
					];
					$this->session->set_userdata($data);
					if ($user['level'] == "admin") {
						redirect('admin');
					} elseif ($user['level'] == "petugas") {
						redirect('petugas');
					} else {
						redirect('masyarakat');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">email atau password Anda salah.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button></div>');
					redirect('auth/login');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">email atau password Anda salah.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button></div>');
				redirect('auth/login');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Captcha Belum di Klik !<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button></div>');
				redirect('auth/login');
		}

	}

	public function ubah_password()
	{
		$this->form_validation->set_rules('password_lama', 'Password Lama', 'trim|required');
		$this->form_validation->set_rules('password_baru', 'Password Baru', 'trim|required|min_length[8]|matches[password_konfirmasi]');
		$this->form_validation->set_rules('password_konfirmasi', 'Konfirmasi Password Baru', 'trim|required|min_length[8]|matches[password_baru]');
		if ($this->form_validation->run() == false) {
			$data['title'] = $this->session->userdata('level');
			$data['level'] = $this->session->userdata('level');
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data);
			$this->load->view('auth/ubah_password',$data);
			$this->load->view('templates/footer');
		} else {
			$this->_ubah_password();
		}
	}

	private function _ubah_password()
	{
		$id = $this->session->userdata('id');
		$user = $this->Auth_model->get_ubah_password($id);
		$password_lama = $this->input->post('password_lama');
		$password_baru = $this->input->post('password_baru');
		if(!password_verify($password_lama, $user['password'])){
			$this->session->set_flashdata('message', '<div class="alert alert-danger  alert-dismissible fade show" role="alert"> Password Lama Salah.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button></div>');
			redirect('auth/ubah_password');
		}else{
			if($password_lama == $password_baru){
				$this->session->set_flashdata('message', '<div class="alert alert-danger  alert-dismissible fade show" role="alert"> Password Baru tidak boleh sama dengan Password Lama.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button></div>');
				redirect('auth/ubah_password');
			}else{
				$password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
				$this->Auth_model->ubah_password($id,$password_hash);
				$this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Password Baru anda sudah bisa digunakan.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button></div>');
				redirect('auth/ubah_password');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('level');
		$this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Termikasih. Silahkan login kembali untuk masuk ke aplikasi.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button></div>');
		redirect('auth');
	}

	public function blocked()
	{
		$this->load->view('auth/403');
	}

	public function forgotPassword()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		
		$data2 = array(
			'captcha' 		 => $this->recaptcha->getWidget(),
			'script_captcha' => $this->recaptcha->getScriptTag(),
		);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Lupa Password';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/lupa_password', $data2);
			$this->load->view('templates/auth_footer');			
		} else {
			$recaptcha = $this->input->post('g-recaptcha-response');
			
			$email = $this->input->post('email');
			$user = $this->db->get_where('login', ['email' => $email])->row_array();

			if (!empty($recaptcha)) {
			$response  = $this->recaptcha->verifyResponse($recaptcha);

				if($user) {
					
					$token = base64_encode(random_bytes(32));
					$user_token = [
						'email' => $email,
						'token' => $token,
						'date_created' => time()
					];

					$this->db->insert('user_token', $user_token);
					$this->_sendEmail($token, 'forgot');
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan cek email anda untuk mereset password anda !</div>');
					redirect('auth/forgotpassword');

				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak terdaftar atau belum diaktivasi !</div>');
					redirect('auth/forgotpassword');
				}

			} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger  alert-dismissible fade show" role="alert"> Captcha belum di Klik !<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button></div>');
			redirect('auth/forgotpassword');
			}
		}
	}

	public function resetPassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('login', ['email' => $email])->row_array();

		if($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
			if($user_token) {
				$this->session->set_userdata('reset_email', $email);
				$this->changePassword();
				if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
				} else {
					$this->db->delete('user_token', ['email' => $email]);
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kode token kadaluarsa !!</div>');
					redirect('auth/login');	
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password gagal !! Kode Token salah.</div>');
				redirect('auth/login');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password gagal !! Email salah.</div>');
			redirect('auth/login');
		}
	}

	public function changePassword()
	{
		if(!$this->session->userdata('reset_email')) {
			redirect('auth/login');
		}

		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Ulangi Password', 'trim|required|min_length[8]|matches[password1]');
		
		$data2 = array(
			'captcha' 		 => $this->recaptcha->getWidget(),
			'script_captcha' => $this->recaptcha->getScriptTag(),
			);

		if($this->form_validation->run() == false) {
			$data['title'] = 'Ubah Password';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/change-password', $data2);
			$this->load->view('templates/auth_footer');
		} else {
			$recaptcha = $this->input->post('g-recaptcha-response');
			
				if (!empty($recaptcha)) {
				$response  = $this->recaptcha->verifyResponse($recaptcha);

				$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
				$email = $this->session->userdata('reset_email');

				$this->db->set('password', $password);
				$this->db->where('email', $email);
				$this->db->update('login');
				$this->db->delete('user_token', ['email' => $email]);

				$this->session->unset_userdata('reset_email');
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah ! Silahkan login.</div>');
				redirect('auth/login');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger  alert-dismissible fade show" role="alert"> Captcha belum di Klik !<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button></div>');
					redirect('auth/resetPassword');
				}
		}
	}

	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'inspektoratkabwonosobo@gmail.com',
			'smtp_pass' => 'bawasdawsb',
			'smtp_port' => 465,
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'newline'   => "\r\n"
		];

		$this->load->library('email', $config);
		$this->email->initialize($config);

		$this->email->from('inspektoratkabwonosobo@gmail.com', 'Whistleblowing Pemerintah Kabupaten Wonosobo');
		$this->email->to($this->input->post('email'));

		if ($type == 'verify') {
			$this->email->subject('Verifikasi Akun');
			$this->email->message('Klik link ini untuk memverifikasi akun Anda : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktivasi</a>');
		} else if($type == 'forgot') {
			$this->email->subject('Reset Password');
			$this->email->message('Klik link ini untuk mereset password Anda : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
		}
		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

}
