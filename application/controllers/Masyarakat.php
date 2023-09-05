<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masyarakat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->load->model('Admin_model');
        $this->load->model('Masyarakat_model');
    }

    public function index()
    {
        $id = $this->session->userdata('id');
        $masyarakat = $this->Masyarakat_model->get_nik($id);
        $data['title'] = "Dashboard";
        $data['level'] = $this->session->userdata('level');
        $data['totaladuanmasuk'] = $this->Admin_model->get_totaladuanmasuk();
        $data['totaladuanmasuk_anda'] = $this->Masyarakat_model->get_totaladuanmasuk_anda($masyarakat['nik']);
        $data['aduanpending_anda'] = $this->Masyarakat_model->get_aduanpending_anda($masyarakat['nik']);
        $data['aduanproses_anda'] = $this->Masyarakat_model->get_aduanproses_anda($masyarakat['nik']);
        $data['aduanapproved_anda'] = $this->Masyarakat_model->get_aduanapproved_anda($masyarakat['nik']);
        $data['aduanselesai_anda'] = $this->Masyarakat_model->get_aduanselesai_anda($masyarakat['nik']);
        $data['chartaduan_anda']=$this->Masyarakat_model->get_chartaduan_anda($masyarakat['nik']);
        $data['piechartaduan_anda']=$this->Masyarakat_model->get_piechartaduan_anda($masyarakat['nik']);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('masyarakat/index', $data);
        $this->load->view('templates/footer');
    }

    public function form()
    {
        $id = $this->session->userdata('id');
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
        $this->form_validation->set_rules('nama_terlapor', 'Nama', 'trim|required');
        $this->form_validation->set_rules('lokasi_kejadian', 'Lokasi', 'trim|required');
        $this->form_validation->set_rules('tanggal_kejadian', 'Tanggal', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
        $this->form_validation->set_rules('isi', 'Isi', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['level'] = $this->session->userdata('level');
            $data['title'] = "Form Pengaduan";
            $data['kategori'] = $this->Admin_model->get_data_kategori();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('masyarakat/form', $data);
            $this->load->view('templates/footer');
        } else {
            $masyarakat = $this->Masyarakat_model->get_nik($id);
            $data=[
                'id_kategori'       => $this->input->post('kategori', TRUE),
                'nik'               => $masyarakat['nik'],
                'nama_terlapor'     => htmlspecialchars($this->input->post('nama_terlapor', TRUE)),
                'lokasi_kejadian'   => htmlspecialchars($this->input->post('lokasi_kejadian', TRUE)),
                'tanggal_kejadian'  => $this->input->post('tanggal_kejadian', TRUE),
                'tanggal_pengaduan' => $this->input->post('tanggal', TRUE),
                'isi_pengaduan'     => htmlspecialchars($this->input->post('isi', TRUE)),
                'file'              => $this->_upload(),
            ];
            $data = $this->security->xss_clean($data);
            $this->Masyarakat_model->simpan_pengaduan($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Data Berhasil ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
            redirect('masyarakat/list_aduansaya');
        }
    }

    public function form_modal()
    {
        $id = $this->session->userdata('id');
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
        $this->form_validation->set_rules('nama_terlapor', 'Nama', 'trim|required');
        $this->form_validation->set_rules('lokasi_kejadian', 'Lokasi', 'trim|required');
        $this->form_validation->set_rules('tanggal_kejadian', 'Tanggal', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
        $this->form_validation->set_rules('isi', 'Isi', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['level'] = $this->session->userdata('level');
            $data['title'] = "Form Pengaduan";
            $data['kategori'] = $this->Admin_model->get_data_kategori();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('masyarakat/form', $data);
            $this->load->view('templates/footer');
        }else{
            $masyarakat = $this->Masyarakat_model->get_nik($id);
            $data=[
                'id_kategori'       => $this->input->post('kategori', TRUE),
                'nik'               => $masyarakat['nik'],
                'nama_terlapor'     => htmlspecialchars($this->input->post('nama_terlapor', TRUE)),
                'lokasi_kejadian'   => htmlspecialchars($this->input->post('lokasi_kejadian', TRUE)),
                'tanggal_kejadian'  => $this->input->post('tanggal_kejadian', TRUE),
                'tanggal_pengaduan' => $this->input->post('tanggal', TRUE),
                'isi_pengaduan'     => htmlspecialchars($this->input->post('isi', TRUE)),
                'file'              => $this->_upload(),
            ];
            $data = $this->security->xss_clean($data);
            $this->Masyarakat_model->simpan_pengaduan($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Data Berhasil ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
            redirect('masyarakat/list_aduansaya');
        }
    }

        private function _upload()
        {
            $config['upload_path']      = './assets/upload/';
            //$config['allowed_types']  = 'gif|jpg|png|doc|docx|xls|xlsx|pdf|rar';
            $config['allowed_types']    = 'pdf|zip|rar';
            $config['file_name']        = time();
            $config['overwrite']        = true;
            $config['max_size']         = 2048;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('attachment')) {
                return $this->upload->data("file_name");
            }
            print_r($this->upload->display_errors());
            return "Tidak Ada Bukti Dukung yang Dilampirkan";
        }

    public function list_aduansaya(){
        $id = $this->session->userdata('id');
        $masyarakat = $this->Masyarakat_model->get_nik($id);
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Pengaduan Anda";
        $data['data_pengaduan'] = $this->Masyarakat_model->get_data_pengaduan($masyarakat['nik']);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('masyarakat/list', $data);
        $this->load->view('templates/footer');
    }

    // Data total pengaduan masuk dashboard
    public function data_aduananda(){
        $id = $this->session->userdata('id');
        $masyarakat = $this->Masyarakat_model->get_nik($id);
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Pengaduan Anda";
        $data['data_pengaduan'] = $this->Masyarakat_model->get_data_pengaduan($masyarakat['nik']);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('masyarakat/list_aduananda', $data);
        $this->load->view('templates/footer');
    }

    public function data_aduanpending(){
        $id = $this->session->userdata('id');
        $masyarakat = $this->Masyarakat_model->get_nik($id);
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Pengaduan Pending";
        $data['data_pengaduan'] = $this->Masyarakat_model->get_data_pengaduan_pending($masyarakat['nik']);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('masyarakat/list_aduanpending', $data);
        $this->load->view('templates/footer');
    }

    public function data_aduanproses(){
        $id = $this->session->userdata('id');
        $masyarakat = $this->Masyarakat_model->get_nik($id);
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Pengaduan Proses";
        $data['data_pengaduan'] = $this->Masyarakat_model->get_data_pengaduan_proses($masyarakat['nik']);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('masyarakat/list_aduanproses', $data);
        $this->load->view('templates/footer');
    }

    public function data_aduanapproved(){
        $id = $this->session->userdata('id');
        $masyarakat = $this->Masyarakat_model->get_nik($id);
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Pengaduan Approved";
        $data['data_pengaduan'] = $this->Masyarakat_model->get_data_pengaduan_approved($masyarakat['nik']);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('masyarakat/list_aduanapproved', $data);
        $this->load->view('templates/footer');
    }

    public function data_aduanselesai(){
        $id = $this->session->userdata('id');
        $masyarakat = $this->Masyarakat_model->get_nik($id);
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Pengaduan Selesai";
        $data['data_pengaduan'] = $this->Masyarakat_model->get_data_pengaduan_selesai($masyarakat['nik']);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('masyarakat/list_aduanselesai', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id){
        $id_pengaduan = $this->uri->segment(3);
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Detail Pengaduan";
        $data['detail'] = $this->Masyarakat_model->get_detail_data_pengaduan($id_pengaduan);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('masyarakat/detail', $data);
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
        $this->load->view('masyarakat/detail2', $data);
        $this->load->view('templates/footer');
    }

    public function print_tanggapan($id){
        $id_pengaduan = $this->uri->segment(3);
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Detail Pengaduan dan Tanggapan";
        $data['detail'] = $this->Masyarakat_model->get_detail_data_pengaduan($id_pengaduan);
        $this->load->view('templates/header', $data);
        $this->load->view('masyarakat/detail_print', $data);
        $this->load->view('templates/footer');
    }

}
