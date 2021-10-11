<?php 

class M_data extends CI_Model{
	function tampil_data($table, $order, $sort){
        $this->db->from($table);
        $this->db->order_by($order, $sort);
        return $this->db->get()->result();
	}
	function input_data($data,$table){ return $this->db->insert($table,$data); } //Aksi input data  
    function hapus_data($where,$table){ return $this->db->delete($table, $where); } //Aksi hapus data
    function edit_data($where,$table){ return $this->db->get_where($table,$where); } //Tampil data sebelum di-edit
	function update_data($where,$data,$table){ return $this->db->update($table,$data,$where); } //Aksi edit data
	
    /*** Dinamis ***/
    function setjoin($data){
		foreach($data as $row){
			$tableJoin = $row["hasilTable"];
			$columnJoin = $row["hasilColumn"];
			$this->db->join($tableJoin, $columnJoin);
		}
	}

    //Menampilkan Seluruh Table
    function getjoin($table, $data, $order, $sort){
        $this->db->from($table);
        $this->setjoin($data); //Function agar bisa banyak join table 
        $this->db->order_by($order, $sort);
        return $this->db->get()->result();
    }

    //Menampilkan Seluruh Table where
    public function ambil_id($where, $table, $data)
    {
        $this->db->from($table);
        $this->setjoin($data);
        $this->db->where($where);
        
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    //Menampilkan Table join Group
     function joinGroup($select, $table, $data){
         $this->db->select($select);
         $this->db->from($table);
         $this->setjoin($data);
         $this->db->group_by('nilai_alternatif.id_alternatif');
         $this->db->order_by('id_alternatif');
         return $this->db->get()->result();
     }
}