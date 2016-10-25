 <?php
 class UserModel extends CI_Model
{
  function __construct()
  {
     parent::__construct();
     $this->load->database();
  }
  
   function get($table)
   {
	   $qry=$this->db->get($table);
	   return $qry->result();
   }
   
  function insert_gen_setting($table=false,$data=false,$filter=false)
   {
    if($filter){
            $this->db->where($filter);
            $this->db->update($table,$data);
        } else {
            if($table=='user'){
            $field=array ('StaffId'=>$data['StaffId']);
            $ql=$this->db->select('StaffId')->from($table)->where($field)->get();
            if ($ql->num_rows()>0)
        {   return false;
            }else{
            $this->db->insert($table,$data);
            return true;
            }}else{
                $this->db->insert($table,$data);
            return true;
            }
        }
   }
}
	

 ?>