<?php
class Admin_model extends CI_Model
{
    public function get_data_user(){
    $this->db->select('*');
    $this->db->from('login'); 
    $this->db->not_like('level', 'admin');
    $this->db->order_by("level", "desc");
    return $this->db->get()->result_array();
    }

    public function get_data_user_by_id($id){
        return $this->db->get_where('login', ['id_login' => $id])->row_array();
    }

    public function ubah_user($data,$id){
        $this->db->where('id_login', $id);
        $this->db->update('login', $data);
    }

    public function hapus_user($id){
        $this->db->where('id_login', $id);
        $this->db->delete('login');
    }    

    public function get_data_kategori(){
        $query = $this->db->get('kategori')->result_array();
        return $query;
    }
    
    public function tambah_kategori($data)
    {
        $this->db->insert('kategori', $data);
    }

    public function get_data_kategori_by_id($id){
        return $this->db->get_where('kategori', ['id_kategori' => $id])->row_array();
    }

    public function ubah_kategori($data,$id){
        $this->db->where('id_kategori', $id);
        $this->db->update('kategori', $data);
    }

    public function hapus_kategori($id){
        $this->db->where('id_kategori', $id);
        $this->db->delete('kategori');
    }

    public function get_data_pengaduan(){
    $this->db->select('*');
    $this->db->from('pengaduan a'); 
    $this->db->join('kategori b', 'b.id_kategori=a.id_kategori', 'left');
    $this->db->join('masyarakat c', 'c.nik=a.nik', 'left');
    $this->db->join('tanggapan d', 'd.id_pengaduan=a.id_pengaduan', 'left');
    $this->db->join('petugas e', 'e.id_petugas=d.id_petugas', 'left');
    $this->db->order_by("a.tanggal_pengaduan", "desc");
    return $this->db->get()->result_array();
    }

    public function get_data_pengaduan_pending(){
    $this->db->select('*');
    $this->db->from('pengaduan a'); 
    $this->db->join('kategori b', 'b.id_kategori=a.id_kategori', 'left');
    $this->db->join('masyarakat c', 'c.nik=a.nik', 'left');
    $this->db->join('tanggapan d', 'd.id_pengaduan=a.id_pengaduan', 'left');
    $this->db->join('petugas e', 'e.id_petugas=d.id_petugas', 'left');
    $this->db->where('status', 'Pending');
    $this->db->order_by("a.tanggal_pengaduan", "desc");
    return $this->db->get()->result_array();
    }

    public function get_data_pengaduan_proses(){
    $this->db->select('*');
    $this->db->from('pengaduan a'); 
    $this->db->join('kategori b', 'b.id_kategori=a.id_kategori', 'left');
    $this->db->join('masyarakat c', 'c.nik=a.nik', 'left');
    $this->db->join('tanggapan d', 'd.id_pengaduan=a.id_pengaduan', 'left');
    $this->db->join('petugas e', 'e.id_petugas=d.id_petugas', 'left');
    $this->db->where('status', 'Proses');
    $this->db->order_by("a.tanggal_pengaduan", "desc");
    return $this->db->get()->result_array();
    }

    public function get_data_pengaduan_approved(){
    $this->db->select('*');
    $this->db->from('pengaduan a'); 
    $this->db->join('kategori b', 'b.id_kategori=a.id_kategori', 'left');
    $this->db->join('masyarakat c', 'c.nik=a.nik', 'left');
    $this->db->join('tanggapan d', 'd.id_pengaduan=a.id_pengaduan', 'left');
    $this->db->join('petugas e', 'e.id_petugas=d.id_petugas', 'left');
    $this->db->where('status', 'Approved');
    $this->db->order_by("a.tanggal_pengaduan", "desc");
    return $this->db->get()->result_array();
    }

    public function get_data_pengaduan_selesai(){
    $this->db->select('*');
    $this->db->from('pengaduan a'); 
    $this->db->join('kategori b', 'b.id_kategori=a.id_kategori', 'left');
    $this->db->join('masyarakat c', 'c.nik=a.nik', 'left');
    $this->db->join('tanggapan d', 'd.id_pengaduan=a.id_pengaduan', 'left');
    $this->db->join('petugas e', 'e.id_petugas=d.id_petugas', 'left');
    $this->db->where('status', 'Selesai');
    $this->db->order_by("a.tanggal_pengaduan", "desc");
    return $this->db->get()->result_array();
    }

    public function get_totaladuanmasuk(){
        return $this->db->from("pengaduan")->count_all_results();
    }

    public function get_chartaduan()
    {
        $this->db->select('status');
        $this->db->group_by('status');
        $this->db->select("count(*) as total");
        return $this->db->from('pengaduan')
          ->get()
          ->result();
    }

    public function get_piechartaduan()
    {
        $this->db->select('*');
        $this->db->from('pengaduan a'); 
        $this->db->join('tanggapan b', 'b.id_pengaduan=a.id_pengaduan', 'left');
        $this->db->select('status2');
        $this->db->select("count(*) as total");
        $this->db->group_by('status2');
        return $this->db->get()->result();
    }

    public function approved($id){
        $data = [
            'status' => 'Approved'
        ];
        $this->db->where('id_pengaduan', $id);
        $this->db->update('pengaduan', $data);
    }

    public function jumlah($status){
        return $this->db->where('status', $status)->from("pengaduan")->count_all_results();
    }

    public function get_database(){
    $this->db->select('*');
    $this->db->from('pengaduan a'); 
    $this->db->join('kategori b', 'b.id_kategori=a.id_kategori', 'left');
    $this->db->join('masyarakat c', 'c.nik=a.nik', 'left');
    $this->db->join('tanggapan d', 'd.id_pengaduan=a.id_pengaduan', 'left');
    $this->db->join('petugas e', 'e.id_petugas=d.id_petugas', 'left');
    $this->db->order_by("a.tanggal_pengaduan", "desc");
    return $this->db->get()->result_array();
    }

}
