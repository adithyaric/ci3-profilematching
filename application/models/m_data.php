<?php

class M_data extends CI_Model
{
    function tampil_data($table, $order, $sort)
    {
        $this->db->from($table);
        $this->db->order_by($order, $sort);
        return $this->db->get()->result();
    }
    function input_data($data, $table)
    {
        return $this->db->insert($table, $data);
    } //Aksi input data  
    function hapus_data($where, $table)
    {
        return $this->db->delete($table, $where);
    } //Aksi hapus data
    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    } //Tampil data sebelum di-edit
    function update_data($where, $data, $table)
    {
        return $this->db->update($table, $data, $where);
    } //Aksi edit data

    /*** Dinamis ***/
    function setjoin($data)
    {
        foreach ($data as $row) {
            $tableJoin = $row["hasilTable"];
            $columnJoin = $row["hasilColumn"];
            $this->db->join($tableJoin, $columnJoin);
        }
    }

    //Menampilkan Seluruh Table
    function getjoin($table, $data, $order, $sort)
    {
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
    function joinGroupNamaNilai()
    {
        $this->db->select('nilai_alternatif.id_alternatif, nama_alternatif');
        $this->db->from('nilai_alternatif');
        $this->db->join('alternatif', 'alternatif.id_alternatif = nilai_alternatif.id_alternatif');
        $this->db->group_by('nilai_alternatif.id_alternatif');
        $this->db->order_by('id_alternatif');
        return $this->db->get()->result();
    }

    function hitungid()
    {
        $this->db->select("nilai_alternatif.id_alternatif, 
        GROUP_CONCAT(sub_kriteria.nilai) as nilai 
        FROM nilai_alternatif 
        LEFT JOIN sub_kriteria 
        ON nilai_alternatif.id_subkriteria = sub_kriteria.id_subkriteria 
        GROUP BY nilai_alternatif.id_alternatif");
        return $this->db->get()->result();
    }
}
