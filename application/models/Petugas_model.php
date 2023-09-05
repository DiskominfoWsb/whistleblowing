<?php
class Petugas_model extends CI_Model
{
    public function get_data_petugas(){
        $this->db->select('*');
        $this->db->from('petugas');
        $this->db->join('login', 'login.id_login = petugas.id_login');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function get_data_petugas_by_id($id){
        return $this->db->get_where('petugas', ['id_petugas' => $id])->row_array();
    }

    public function get_petugas_id($id){
        return $this->db->get_where('petugas', ['id_login' => $id])->row_array();
    }

    public function tambah_petugas($data)
    {
        $this->db->insert('petugas', $data);
    }

    public function ubah_petugas($data,$id){
        $this->db->where('id_petugas', $id);
        $this->db->update('petugas', $data);
    }

    public function hapus_petugas($id){
        $this->db->set('nama_petugas', $data['nama_petugas']);
        $this->db->set('telp', $data['telp']);
        $this->db->where('id_petugas', $id);
        $this->db->delete('petugas');
    }

    public function get_data_pengaduan(){
        $this->db->select('*');
        $this->db->from('pengaduan a'); 
        $this->db->join('kategori b', 'b.id_kategori=a.id_kategori', 'left');
        $this->db->join('masyarakat c', 'c.nik=a.nik', 'left');
        $this->db->where('status', 'Pending');
        $this->db->order_by("a.tanggal_pengaduan", "desc");
        return $this->db->get()->result_array();
    }

    public function get_data_pengaduan_by_id($id_petugas){
        $this->db->select('*');
        $this->db->from('pengaduan a'); 
        $this->db->join('kategori b', 'b.id_kategori=a.id_kategori');
        $this->db->join('tanggapan c', 'c.id_pengaduan=a.id_pengaduan');
        $this->db->join('masyarakat d', 'd.nik=a.nik', 'left');
        $where = "id_petugas =$id_petugas AND status NOT LIKE '%Pending%'";
        $this->db->where($where);
        $this->db->order_by("a.tanggal_pengaduan", "desc");
        return $this->db->get()->result_array();
    }

    public function update_status($id,$data){
        $this->db->where('id_pengaduan', $id);
        $this->db->update('pengaduan',$data);
    }

    public function simpan_tanggapan($data){
        $this->db->insert('tanggapan', $data);
    }

    public function get_data_tanggapan_by_id($id){
        return $this->db->get_where('tanggapan', ['id_tanggapan' => $id])->row_array();
    }

    public function update_tanggapan($id,$data){
        $this->db->where('id_tanggapan', $id);
        $this->db->update('tanggapan', $data);
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

    public function get_totaladuanmasuk_anda($id_petugas){
        $this->db->select('*');
        $this->db->from('pengaduan a'); 
        $this->db->join('kategori b', 'b.id_kategori=a.id_kategori');
        $this->db->join('tanggapan c', 'c.id_pengaduan=a.id_pengaduan');
        $this->db->join('masyarakat d', 'd.nik=a.nik', 'left');
        $where = "id_petugas =$id_petugas AND status NOT LIKE '%Pending%'";
        $this->db->where($where);
        $this->db->select('status');
        $this->db->select("count(*) as total");
        return $this->db->get()->result();
    }

    public function get_aduanpending_anda($id_petugas){
        $this->db->select('*');
        $this->db->from('pengaduan a'); 
        $this->db->join('kategori b', 'b.id_kategori=a.id_kategori');
        $this->db->join('tanggapan c', 'c.id_pengaduan=a.id_pengaduan');
        $this->db->join('masyarakat d', 'd.nik=a.nik', 'left');
        $where = "id_petugas =$id_petugas AND status = 'Pending'";
        $this->db->where($where);
        $this->db->select('status');
        $this->db->select("count(*) as total");
        return $this->db->get()->result();
    }

    public function get_aduanproses_anda($id_petugas){
        $this->db->select('*');
        $this->db->from('pengaduan a'); 
        $this->db->join('kategori b', 'b.id_kategori=a.id_kategori');
        $this->db->join('tanggapan c', 'c.id_pengaduan=a.id_pengaduan');
        $this->db->join('masyarakat d', 'd.nik=a.nik', 'left');
        $where = "id_petugas =$id_petugas AND status ='Proses'";
        $this->db->where($where);
        $this->db->select('status');
        $this->db->select("count(*) as total");
        return $this->db->get()->result();
    }

    public function get_aduanapproved_anda($id_petugas){
        $this->db->select('*');
        $this->db->from('pengaduan a'); 
        $this->db->join('kategori b', 'b.id_kategori=a.id_kategori');
        $this->db->join('tanggapan c', 'c.id_pengaduan=a.id_pengaduan');
        $this->db->join('masyarakat d', 'd.nik=a.nik', 'left');
        $where = "id_petugas =$id_petugas AND status = 'Approved'";
        $this->db->where($where);
        $this->db->select('status');
        $this->db->select("count(*) as total");
        return $this->db->get()->result();
    }

    public function get_aduanselesai_anda($id_petugas){
        $this->db->select('*');
        $this->db->from('pengaduan a'); 
        $this->db->join('kategori b', 'b.id_kategori=a.id_kategori');
        $this->db->join('tanggapan c', 'c.id_pengaduan=a.id_pengaduan');
        $this->db->join('masyarakat d', 'd.nik=a.nik', 'left');
        $where = "id_petugas =$id_petugas AND status = 'Selesai'";
        $this->db->where($where);
        $this->db->select('status');
        $this->db->select("count(*) as total");
        return $this->db->get()->result();
    }

    public function get_chartaduan_anda($id_petugas)
    {
        $this->db->select('*');
        $this->db->from('pengaduan a'); 
        $this->db->join('kategori b', 'b.id_kategori=a.id_kategori');
        $this->db->join('tanggapan c', 'c.id_pengaduan=a.id_pengaduan');
        $this->db->join('masyarakat d', 'd.nik=a.nik', 'left');
        $this->db->where('c.id_petugas', $id_petugas);
        $this->db->select('status');
        $this->db->select("count(*) as total");
        $this->db->group_by('status');
        return $this->db->get()->result();
    }

    public function get_piechartaduan_anda($id_petugas)
    {
        $this->db->select('*');
        $this->db->from('pengaduan a'); 
        $this->db->join('kategori b', 'b.id_kategori=a.id_kategori');
        $this->db->join('tanggapan c', 'c.id_pengaduan=a.id_pengaduan');
        $this->db->join('masyarakat d', 'd.nik=a.nik', 'left');
        $this->db->where('c.id_petugas', $id_petugas);
        $this->db->select('status2');
        $this->db->select("count(*) as total");
        $this->db->group_by('status2');
        return $this->db->get()->result();
    }

    public function get_data_pengaduan_proses($id_petugas){
        $this->db->select('*');
        $this->db->from('pengaduan a'); 
        $this->db->join('kategori b', 'b.id_kategori=a.id_kategori');
        $this->db->join('tanggapan c', 'c.id_pengaduan=a.id_pengaduan');
        $this->db->join('masyarakat d', 'd.nik=a.nik', 'left');
        $where = "id_petugas =$id_petugas AND status = 'Proses'";
        $this->db->where($where);
        $this->db->order_by("a.tanggal_pengaduan", "desc");
        return $this->db->get()->result_array();
    }

    public function get_data_pengaduan_approved($id_petugas){
        $this->db->select('*');
        $this->db->from('pengaduan a'); 
        $this->db->join('kategori b', 'b.id_kategori=a.id_kategori');
        $this->db->join('tanggapan c', 'c.id_pengaduan=a.id_pengaduan');
        $this->db->join('masyarakat d', 'd.nik=a.nik', 'left');
        $where = "id_petugas =$id_petugas AND status = 'Approved'";
        $this->db->where($where);
        $this->db->order_by("a.tanggal_pengaduan", "desc");
        return $this->db->get()->result_array();
    }

    public function get_data_pengaduan_selesai($id_petugas){
        $this->db->select('*');
        $this->db->from('pengaduan a'); 
        $this->db->join('kategori b', 'b.id_kategori=a.id_kategori');
        $this->db->join('tanggapan c', 'c.id_pengaduan=a.id_pengaduan');
        $this->db->join('masyarakat d', 'd.nik=a.nik', 'left');
        $where = "id_petugas =$id_petugas AND status = 'Selesai'";
        $this->db->where($where);
        $this->db->order_by("a.tanggal_pengaduan", "desc");
        return $this->db->get()->result_array();
    }
    
}
