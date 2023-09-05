<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->library('form_validation');
        $this->load->library('pdf');
        $this->load->helper('security');
        
        $id = $this->session->userdata('id');
        $this->load->model('Auth_model');
        $this->load->model('Admin_model');
        $this->load->model('Petugas_model');
        $this->load->model('Masyarakat_model');
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        $data['level'] = $this->session->userdata('level');
        $nik = $this->session->userdata('id');
        $data['totaladuanmasuk'] = $this->Admin_model->get_totaladuanmasuk();
        $data['chartaduan']=$this->Admin_model->get_chartaduan();
        $data['piechartaduan']=$this->Admin_model->get_piechartaduan();
        $data['pending'] = $this->Admin_model->jumlah($status='Pending');
        $data['proses'] = $this->Admin_model->jumlah($status='Proses');
        $data['approved'] = $this->Admin_model->jumlah($status='Approved');
        $data['selesai'] = $this->Admin_model->jumlah($status='Selesai');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    // data total pengaduan masuk dashboard
    public function data_aduanmasuk(){
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Pengaduan Masuk";
        $data['data_pengaduan'] = $this->Admin_model->get_data_pengaduan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data_aduanmasuk', $data);
        $this->load->view('templates/footer');
    }

    public function data_aduanpending(){
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Pengaduan Pending";
        $data['data_pengaduan'] = $this->Admin_model->get_data_pengaduan_pending();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data_aduanpending', $data);
        $this->load->view('templates/footer');
    }

    public function data_aduanproses(){
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Pengaduan Proses";
        $data['data_pengaduan'] = $this->Admin_model->get_data_pengaduan_proses();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data_aduanproses', $data);
        $this->load->view('templates/footer');
    }

    public function data_aduanapproved(){
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Pengaduan Approved";
        $data['data_pengaduan'] = $this->Admin_model->get_data_pengaduan_approved();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data_aduanapproved', $data);
        $this->load->view('templates/footer');
    }

    public function data_aduanselesai(){
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Pengaduan Selesai";
        $data['data_pengaduan'] = $this->Admin_model->get_data_pengaduan_selesai();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data_aduanselesai', $data);
        $this->load->view('templates/footer');
    }

    // petugas
    public function data_petugas(){
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Petugas";
        $data['data_petugas'] = $this->Petugas_model->get_data_petugas();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/master_petugas', $data);
        $this->load->view('templates/footer');
    }
    
    public function tambah_petugas(){
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('telp', 'Telp', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[login.email]', [
            'is_unique' => 'Email ini sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]', [
            'min_length' => 'Password Terlalu Pendek!'
        ]);
        if ($this->form_validation->run() == false){
            $data['title'] = "Data Petugas / Tambah Data";
            $data['level'] = $this->session->userdata('level');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tambah_petugas');
            $this->load->view('templates/footer');
        }else{
            $this->_tambah_petugas();
        }
    }

        private function _tambah_petugas(){
            $data = [
                'email'     => htmlspecialchars($this->input->post('email', TRUE)),
                'password'  => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'level'     => 'Petugas'
            ];
            $data = $this->security->xss_clean($data);
            $this->Auth_model->tambah_user($data);

            $data_petugas = [
             'nama_petugas' => htmlspecialchars($this->input->post('nama', TRUE)),
             'telp'         => htmlspecialchars($this->input->post('telp', TRUE)),
             'id_login'     => $this->Auth_model->get_user_terakhir()->ID_LOGIN,
            ];
            $data_petugas = $this->security->xss_clean($data_petugas);
            $this->Petugas_model->tambah_petugas($data_petugas);

            $this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Data Berhasil ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('admin/data_petugas');
        }

    public function ubah_petugas(){
        $id = $this->uri->segment(3);
        $data['petugas'] = $this->Petugas_model->get_data_petugas_by_id($id);
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('telp', 'Telp', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = "Data Petugas / Ubah Data";
            $data['level'] = $this->session->userdata('level');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/ubah_petugas',$data);
            $this->load->view('templates/footer');
        }else{
            $this->_ubah_petugas();
        }
    }

        private function _ubah_petugas(){
            $id = $this->input->post('id', TRUE);
            $data_petugas = [
             'nama_petugas' => htmlspecialchars($this->input->post('nama', TRUE)),
             'telp'         => htmlspecialchars($this->input->post('telp', TRUE))
            ];
            $data_petugas = $this->security->xss_clean($data_petugas);
            $this->Petugas_model->ubah_petugas($data_petugas,$id);
            $this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Data Berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/data_petugas');
        }

    public function hapus_petugas()
    {
        $id = $this->uri->segment(3);
        $this->Petugas_model->hapus_petugas($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Data Berhasil dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/data_petugas');
    }

    // Masyarakat
    public function data_masyarakat(){
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Pelapor";
        $data['data_masyarakat'] = $this->Masyarakat_model->get_data_masyarakat();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/master_masyarakat', $data);
        $this->load->view('templates/footer');
    }

    public function hapus_masyarakat()
    {
        $nik = $this->uri->segment(3);
        $this->Masyarakat_model->hapus_masyarakat($nik);
        $this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Data Berhasil dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/data_masyarakat');
    }

    // Data User
    public function data_user(){
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data User";
        $data['data_user'] = $this->Admin_model->get_data_user();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/master_user', $data);
        $this->load->view('templates/footer');
    }

    public function ubah_user(){
        $id = $this->uri->segment(3);
        $data['data_user'] = $this->Admin_model->get_data_user_by_id($id);
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[login.email]', [
            'is_unique' => 'Email ini sudah terdaftar!'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = "Data User / Ubah Data";
            $data['level'] = $this->session->userdata('level');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/ubah_user',$data);
            $this->load->view('templates/footer');
        }else{
            $this->_ubah_user();
        }
    }

        private function _ubah_user(){
            $id = $this->input->post('id', TRUE);
            $data = [
             'email'    => htmlspecialchars($this->input->post('email', TRUE)),
            ];
            $data = $this->security->xss_clean($data);
            $this->Admin_model->ubah_user($data,$id);
            $this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Data Berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/data_user');
        }

    public function hapus_user()
    {
        $id = $this->uri->segment(3);
        $this->Admin_model->hapus_user($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Data Berhasil dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/data_user');
    }

    // Data Kategori
    public function data_kategori(){
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Kategori";
        $data['data_kategori'] = $this->Admin_model->get_data_kategori();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data_kategori', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_kategori(){
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        if ($this->form_validation->run() == false) {
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Kategori / Tambah Data";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/tambah_kategori');
        $this->load->view('templates/footer');
        }else{
        $this->_tambah_kategori();
        }
    }

        private function _tambah_kategori(){
            $data = [
             'nama_kategori' => htmlspecialchars($this->input->post('nama', TRUE)),
            ];
            $data = $this->security->xss_clean($data);
            $this->Admin_model->tambah_kategori($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Data Berhasil ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('admin/data_kategori');
        }

    public function ubah_kategori(){
        $id = $this->uri->segment(3);
        $data['kategori'] = $this->Admin_model->get_data_kategori_by_id($id);
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['level'] = $this->session->userdata('level');
            $data['title'] = "Data Kategori / Ubah Data";
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/ubah_kategori',$data);
            $this->load->view('templates/footer');
        }else{
            $this->_ubah_kategori();
        }
    }

        private function _ubah_kategori(){
            $id = $this->input->post('id',TRUE);
            $data = [
                'nama_kategori' => htmlspecialchars($this->input->post('nama', TRUE)),
            ];
            $data = $this->security->xss_clean($data);
            $this->Admin_model->ubah_kategori($data,$id);
            $this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Data Berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/data_kategori');
        }

    public function hapus_kategori()
    {
        $id = $this->uri->segment(3);
        $this->Admin_model->hapus_kategori($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Data Berhasil dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/data_kategori');
    }

    // Data Pengaduan
    public function data_pengaduan(){
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Pengaduan";
        $data['data_pengaduan'] = $this->Admin_model->get_data_pengaduan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data_pengaduan', $data);
        $this->load->view('templates/footer');
    }

    public function approved(){
        $id = $this->uri->segment(3);
        $this->Admin_model->approved($id);
        redirect('admin/data_pengaduan');
    }

    public function approved2(){
        $id = $this->uri->segment(3);
        $this->Admin_model->approved($id);
        redirect('admin/data_aduanproses');
    }

    public function detail($id){
        $id_pengaduan = $this->uri->segment(3);
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Detail Pengaduan";
        $data['detail'] = $this->Masyarakat_model->get_detail_data_pengaduan($id_pengaduan);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('masyarakat/detail_admin', $data);
        $this->load->view('templates/footer');
    }

    public function detail2($id){
        $id_pengaduan = $this->uri->segment(3);
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Detail Pengaduan";
        $data['detail'] = $this->Masyarakat_model->get_detail_data_pengaduan($id_pengaduan);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('masyarakat/detail_admin2', $data);
        $this->load->view('templates/footer');
    }

    public function print_data_pengaduan(){
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Pengaduan";
        $data['data_pengaduan'] = $this->Admin_model->get_data_pengaduan();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/data_pengaduan_print', $data);
        $this->load->view('templates/footer');
    }

    public function print_data_masyarakat(){
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Pelapor";
        $data['data_masyarakat'] = $this->Masyarakat_model->get_data_masyarakat();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/master_masyarakat_print', $data);
        $this->load->view('templates/footer');
    }

    public function print_tanggapan($id){
        $id_pengaduan = $this->uri->segment(3);
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Detail Pengaduan dan Tanggapan";
        $data['detail'] = $this->Masyarakat_model->get_detail_data_pengaduan($id_pengaduan);
        $this->load->view('templates/header', $data);
        $this->load->view('masyarakat/detail_admin_print', $data);
        $this->load->view('templates/footer');
    }

    // Manajemen Database
    public function manage_database(){
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Manajemen Database";
        $data['database'] = $this->Admin_model->get_database();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/master_database', $data);
        $this->load->view('templates/footer');
    }

    public function backup_database() {
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download'); 
            
            $config = array(
            'format'    => 'zip',
            'filename'  => 'db_wbswsbjateng.sql'
        );
        $backup =& $this->dbutil->backup($config);
             
        $save = FCPATH.'data/backup_db/backup-'.date("ymdHis").'-db.zip';
             
        write_file($save, $backup);

        $db_name = 'db_wbswsbjateng.sql';
        force_download($db_name, $backup);

        $this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Database Berhasil di Backup<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button></div>');
            redirect('admin/manage_database');
    }

    function restore_database() {
        $isi_file     = file_get_contents('./data/backup_db/db_wbswsbjateng.sql');
        $string_query = rtrim( $isi_file, "\n;" );
        $array_query  = explode(";", $string_query);
        foreach($array_query as $query)
        {
        $this->db->query($query);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Database Berhasil di Restore<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button></div>');
            redirect('admin/manage_database');
    }

}
