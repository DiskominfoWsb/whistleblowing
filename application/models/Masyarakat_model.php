<?php
class Masyarakat_model extends CI_Model
{
    public function get_data_masyarakat(){
        $this->db->select('*');
        $this->db->from('masyarakat a');
        $this->db->join('login b', 'b.id_login=a.id_login', 'left');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function tambah_masyarakat($data)
    {
        $this->db->insert('masyarakat', $data);
    }

    public function hapus_masyarakat($nik){
        $this->db->where('nik', $nik);
        $this->db->delete('masyarakat');
    }

    public function get_nik($id){
        $this->db->select('nik');
        $this->db->from('masyarakat');
        $this->db->where('id_login', $id);
        return $this->db->get()->row_array();
    }
    
    public function simpan_pengaduan($data)
    {
        $this->db->insert('pengaduan', $data);
    }

    public function get_data_pengaduan($id){
        $this->db->select('*');
        $this->db->from('pengaduan a'); 
        $this->db->join('kategori b', 'b.id_kategori=a.id_kategori', 'left');
        $this->db->where('nik', $id);
        $this->db->order_by('tanggal_pengaduan', 'DESC');
        return $this->db->get()->result_array();
    }

    public function get_data_pengaduan_pending($id){
        $this->db->select('*');
        $this->db->from('pengaduan a'); 
        $this->db->join('kategori b', 'b.id_kategori=a.id_kategori', 'left');
        $this->db->where('nik', $id);
        $this->db->where('status', 'Pending');
        $this->db->order_by('tanggal_pengaduan', 'DESC');
        return $this->db->get()->result_array();
    }

    public function get_data_pengaduan_proses($id){
        $this->db->select('*');
        $this->db->from('pengaduan a'); 
        $this->db->join('kategori b', 'b.id_kategori=a.id_kategori', 'left');
        $this->db->where('nik', $id);
        $this->db->where('status', 'Proses');
        $this->db->order_by('tanggal_pengaduan', 'DESC');
        return $this->db->get()->result_array();
    }

    public function get_data_pengaduan_approved($id){
        $this->db->select('*');
        $this->db->from('pengaduan a'); 
        $this->db->join('kategori b', 'b.id_kategori=a.id_kategori', 'left');
        $this->db->where('nik', $id);
        $this->db->where('status', 'Approved');
        $this->db->order_by('tanggal_pengaduan', 'DESC');
        return $this->db->get()->result_array();
    }

    public function get_data_pengaduan_selesai($id){
        $this->db->select('*');
        $this->db->from('pengaduan a'); 
        $this->db->join('kategori b', 'b.id_kategori=a.id_kategori', 'left');
        $this->db->where('nik', $id);
        $this->db->where('status', 'Selesai');
        $this->db->order_by('tanggal_pengaduan', 'DESC');
        return $this->db->get()->result_array();
    }

    public function get_detail_data_pengaduan($id){
        $this->db->select('*');
        $this->db->from('pengaduan a'); 
        $this->db->join('kategori b', 'b.id_kategori=a.id_kategori', 'left');
        $this->db->join('masyarakat c', 'c.nik=a.nik', 'left');
        $this->db->join('tanggapan d', 'd.id_pengaduan=a.id_pengaduan', 'left');
        $this->db->join('petugas e', 'e.id_petugas=d.id_petugas', 'left');
        $this->db->join('login f', 'f.id_login=c.id_login', 'left');
        $this->db->where('d.id_pengaduan', $id);
        return $this->db->get()->row_array();
    }

    public function get_totaladuanmasuk_anda($nik){
        $this->db->select('*');
        $this->db->from('pengaduan a'); 
        $this->db->join('masyarakat b', 'b.nik=a.nik', 'left');
        $this->db->where('b.nik', $nik);
        $this->db->select('status');
        $this->db->select("count(*) as total");
        return $this->db->get()->result();
    }

    public function get_aduanpending_anda($nik){
        $this->db->select('*');
        $this->db->from('pengaduan a'); 
        $this->db->join('masyarakat b', 'b.nik=a.nik', 'left');
        $this->db->where('b.nik', $nik);
        $this->db->where('status','Pending');
        $this->db->select("count(*) as total");
        return $this->db->get()->result();
    }

    public function get_aduanproses_anda($nik){
        $this->db->select('*');
        $this->db->from('pengaduan a'); 
        $this->db->join('masyarakat b', 'b.nik=a.nik', 'left');
        $this->db->where('b.nik', $nik);
        $this->db->where('status','Proses');
        $this->db->select("count(*) as total");
        return $this->db->get()->result();
    }

    public function get_aduanapproved_anda($nik){
        $this->db->select('*');
        $this->db->from('pengaduan a'); 
        $this->db->join('masyarakat b', 'b.nik=a.nik', 'left');
        $this->db->where('b.nik', $nik);
        $this->db->where('status','Approved');
        $this->db->select("count(*) as total");
        return $this->db->get()->result();
    }

    public function get_aduanselesai_anda($nik){
        $this->db->select('*');
        $this->db->from('pengaduan a'); 
        $this->db->join('masyarakat b', 'b.nik=a.nik', 'left');
        $this->db->where('b.nik', $nik);
        $this->db->where('status','Selesai');
        $this->db->select("count(*) as total");
        return $this->db->get()->result();
    }

    public function get_chartaduan_anda($nik)
    {
        $this->db->select('*');
        $this->db->from('pengaduan a'); 
        $this->db->join('masyarakat b', 'b.nik=a.nik', 'left');
        $this->db->where('b.nik', $nik);
        $this->db->select('status');
        $this->db->select("count(*) as total");
        $this->db->group_by('status');
        return $this->db->get()->result();
    }

    public function get_piechartaduan_anda($nik)
    {
        $this->db->select('*');
        $this->db->from('pengaduan a');
        $this->db->join('masyarakat b', 'b.nik=a.nik', 'left'); 
        $this->db->join('tanggapan c', 'c.id_pengaduan=a.id_pengaduan', 'left');
        $this->db->where('b.nik', $nik);
        $this->db->select('status2');
        $this->db->select("count(*) as total");
        $this->db->group_by('status2');
        return $this->db->get()->result();
    }

}