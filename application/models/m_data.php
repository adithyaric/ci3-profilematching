<?php 

class M_data extends CI_Model{
	function tampil_data($table, $order, $sort){
        $this->db->from($table);
        $this->db->order_by($order, $sort);
        return $this->db->get()->result();
	}
	function hapus_data($where,$table){ return $this->db->delete($table, $where); }
	function input_data($data,$table){ return $this->db->insert($table,$data); }   
	function edit_data($where,$table){ return $this->db->get_where($table,$where); } //Tampil data sebelum di-edit
	function update_data($where,$data,$table){ return $this->db->update($table,$data,$where); } //Aksi edit data
	
	// public function tampil_data_join()
    // {
    //     $this->db->from('sub_kriteria');
    //     $this->db->join('kriteria', 'kriteria.id_kriteria = sub_kriteria.id_kriteria');
    //     return $this->db->get();
    // }
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
        echo '<pre>' . var_export($where, true) . '</pre>';
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
    
    function data_sub_($id, $table, $where){
        $this->db->from($table);
        $this->db->where($where, $id);
        return $this->db->get()->result();
    }

    function join2table($id, $where){
        $this->db->select('*');
        $this->db->from('nilai_alternatif');
        $this->db->join('sub_kriteria', 'sub_kriteria.id_subkriteria = nilai_alternatif.id_subkriteria');      
        $this->db->where($where, $id);
        $query = $this->db->get();
        return $query;
     }
}