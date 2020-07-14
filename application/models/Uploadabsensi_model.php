<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Uploadabsensi_model extends CI_Model
{

	private $simpeg;
	
	public $table = 'agd_absensi_shift';
    public $id = 'j_id';
    public $order = array('j_id' => 'desc');
	public $column = array('j_id');

  
    function __construct()
    {
        parent::__construct();
		
    }

    private function _get_datatables_query()
    {        
		
        ////$this->db->from($this->table);
        $this->db->select('a.*,b.em_name');
        $this->db->from('agd_absensi_shift a');
        $this->db->join('agd_employe b', 'a.j_npp = b.em_nik', 'INNER');

        $i = 0;
    
        foreach ($this->column as $item) 
        {
            if($_POST['search']['value']){
                ($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
               
            }

            $column[$i] = $item;
            $i++;
        }
        
        if(isset($_POST['order']))
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();

        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();

        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);

        return $this->db->count_all_results();
    }

    public function get_by_id($id)
    {
        $this->db->where($this->id, $id);

        return $this->db->get($this->table)->row();
    }

    public function get_all()
    {
        $order = $this->order;
        $this->db->order_by($this->id, $order[key($order)]);
        
        return $this->db->get($this->table)->result();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);

        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);

        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where($this->id, $id);

        return $this->db->delete($this->table);
    }

    public function GetDataatasan($nip){
        $rec = $this->db->query("SELECT ms_parent FROM agd_struktur_jabatan WHERE ms_jabatan  = '$nip' ");
        return $rec->row_array();
    }

    public function GetDataSanksi($nip){
        $this->db->select('a.* , b.em_name');
        $this->db->from('agd_peringatan a');
        $this->db->join('agd_employe b', 'a.p_nik = b.em_nik', 'left');
        $this->db->where('b.em_nik',$nip);
        $query = $this->db->get();

        return $query->result();
    }
}