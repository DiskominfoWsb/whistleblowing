<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->load->model('Petugas_model');
    }
    
    public function index()
    {
        $id = $this->session->userdata('id');
        $data['title'] = "Dashboard";
        $data['level'] = $this->session->userdata('level');
        $petugas = $this->Petugas_model->get_petugas_id($id);
        $data['totaladuanmasuk_anda'] = $this->Petugas_model->get_totaladuanmasuk_anda($petugas['id_petugas']);
        $data['aduanpending_anda'] = $this->Petugas_model->get_aduanpending_anda($petugas['id_petugas']);
        $data['aduanproses_anda'] = $this->Petugas_model->get_aduanproses_anda($petugas['id_petugas']);
        $data['aduanapproved_anda'] = $this->Petugas_model->get_aduanapproved_anda($petugas['id_petugas']);
        $data['aduanselesai_anda'] = $this->Petugas_model->get_aduanselesai_anda($petugas['id_petugas']);
        $data['chartaduan_anda']=$this->Petugas_model->get_chartaduan_anda($petugas['id_petugas']);
        $data['piechartaduan_anda']=$this->Petugas_model->get_piechartaduan_anda($petugas['id_petugas']);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/index', $data);
        $this->load->view('templates/footer');
    }

    public function list_aduanmasuk()
    {
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Pengaduan Masuk";
        $data['data_pengaduan'] = $this->Petugas_model->get_data_pengaduan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/list_aduanmasuk', $data);
        $this->load->view('templates/footer');
    }

    public function ambil(){
        $id = $this->session->userdata('id');
        $id_pengaduan = $this->uri->segment(3);
        $petugas = $this->Petugas_model->get_petugas_id($id);
        $data = [
            'status' => 'Proses'
        ];
        $this->Petugas_model->update_status($id_pengaduan,$data);

        if($this->db->affected_rows() > 0)
        {
            $data = [
                'id_pengaduan' => $id_pengaduan,
                'id_petugas'   => $petugas['id_petugas']
            ];
            $this->Petugas_model->simpan_tanggapan($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Anda berhasil mengajukan untuk mengisi tanggapan.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
            redirect('petugas/list');
        }
    }

    public function daftar(){
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Daftar Tanggapan";
        $id = $this->session->userdata('id');
        $petugas = $this->Petugas_model->get_petugas_id($id);
        $data['data_pengaduan'] = $this->Petugas_model->get_data_pengaduan_by_id($petugas['id_petugas']);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/list', $data);
        $this->load->view('templates/footer');
    }

    public function tanggapan(){
        $this->form_validation->set_rules('tanggapan', 'Tanggapan', 'trim|required');
        $this->form_validation->set_rules('status2', 'Status2', 'trim|required');
        if ($this->form_validation->run() == false) {
        $data['level'] = $this->session->userdata('level');
            $data['title'] = "Form Tanggapan";
            $id = $this->uri->segment(3);
            $data['tanggapan'] = $this->Petugas_model->get_data_tanggapan_by_id($id);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('petugas/form', $data);
            $this->load->view('templates/footer');
        }else{
            $this->_tanggapan();
        }
    }

    private function _tanggapan(){
        $data = [
            'tanggal_tanggapan' => date("Y/m/d"),
            'isi_tanggapan'     => htmlspecialchars($this->input->post('tanggapan', TRUE)),
            'status2'           => htmlspecialchars($this->input->post('status2', TRUE)),
            'file2'             => $this->_upload2()
        ];
        $id = $this->input->post('id_tanggapan', TRUE);
        $id_pengaduan = $this->input->post('id_pengaduan', TRUE);
        $data = $this->security->xss_clean($data);
        $this->Petugas_model->update_tanggapan($id,$data);
        if($this->db->affected_rows() > 0){
            $data = [
                'status' => 'Selesai'
            ];
            $this->Petugas_model->update_status($id_pengaduan,$data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert">Anda berhasil memberi tanggapan.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
        redirect('petugas/list');
    }

    private function _upload2()
    {
        $config['upload_path']          = './assets/upload/';
        $config['allowed_types']        = 'gif|jpg|png|doc|docx|xls|xlsx|pdf|rar|zip';
        $config['file_name']            = time();
        $config['overwrite']            = true;
        $config['max_size']             = 2048;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('attachment')) {
            return $this->upload->data("file_name");
        }
        print_r($this->upload->display_errors());
    }

    // Data total pengaduan masuk dashboard
    public function data_aduananda(){
        $id = $this->session->userdata('id');
        $petugas = $this->Petugas_model->get_petugas_id($id);
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Pengaduan Anda";
        $data['data_pengaduan'] = $this->Petugas_model->get_data_pengaduan_by_id($petugas['id_petugas']);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/list_tanggapananda', $data);
        $this->load->view('templates/footer');
    }

    public function data_aduanproses(){
        $id = $this->session->userdata('id');
        $petugas = $this->Petugas_model->get_petugas_id($id);
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Pengaduan Proses";
        $data['data_pengaduan'] = $this->Petugas_model->get_data_pengaduan_proses($petugas['id_petugas']);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/list_aduanproses', $data);
        $this->load->view('templates/footer');
    }

    public function data_aduanapproved(){
        $id = $this->session->userdata('id');
        $petugas = $this->Petugas_model->get_petugas_id($id);
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Pengaduan Approved";
        $data['data_pengaduan'] = $this->Petugas_model->get_data_pengaduan_approved($petugas['id_petugas']);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/list_aduanapproved', $data);
        $this->load->view('templates/footer');
    }

    public function data_aduanselesai(){
        $id = $this->session->userdata('id');
        $petugas = $this->Petugas_model->get_petugas_id($id);
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Pengaduan Selesai";
        $data['data_pengaduan'] = $this->Petugas_model->get_data_pengaduan_selesai($petugas['id_petugas']);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/list_aduanselesai', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id){
        $id_pengaduan = $this->uri->segment(3);
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Detail Pengaduan";
        $data['detail'] = $this->Petugas_model->get_detail_data_pengaduan($id_pengaduan);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/detail_petugas', $data);
        $this->load->view('templates/footer');
    }

    public function detail2($id){
        $id_pengaduan = $this->uri->segment(3);
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Detail Pengaduan";
        $data['detail'] = $this->Petugas_model->get_detail_data_pengaduan($id_pengaduan);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/detail_petugas2', $data);
        $this->load->view('templates/footer');
    }

    public function detail3($id){
        $id_pengaduan = $this->uri->segment(3);
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Detail Pengaduan";
        $data['detail'] = $this->Petugas_model->get_detail_data_pengaduan($id_pengaduan);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/detail_petugas3', $data);
        $this->load->view('templates/footer');
    }

    public function print_aduan($id){
        $id_pengaduan = $this->uri->segment(3);
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Aduan";
        $data['detail'] = $this->Petugas_model->get_detail_data_pengaduan($id_pengaduan);
        $this->load->view('templates/header', $data);
        $this->load->view('petugas/print_aduan', $data);
        $this->load->view('templates/footer');
    }

    public function print_tanggapan($id){
        $id_pengaduan = $this->uri->segment(3);
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Aduan dan Tanggapan";
        $data['detail'] = $this->Petugas_model->get_detail_data_pengaduan($id_pengaduan);
        $this->load->view('templates/header', $data);
        $this->load->view('petugas/print_tanggapan', $data);
        $this->load->view('templates/footer');
    }

}