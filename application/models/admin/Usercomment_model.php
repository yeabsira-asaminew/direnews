<?php
class Usercomment_model extends CI_Model
{


    public function managecomment()
    {

        $query = $this->db->get('tblcomment');
        return $query->result();
    }


    public function Approvedcomment($id, $status)
    {
        $data = array(
            'status' => $status

        );
        $query = $this->db->where('id', $id)
            ->update('tblcomment', $data);
    }



    public function getwebsitedetails($id)
    {
        $query = $this->db->select('tbladdnews.id,newtitle,tblcategory.name as category,
        tblsub_category.subcategory_name as subcategory,Description,Upload_Image,create_date')
            ->join('tblcategory', 'tbladdnews.Category=tblcategory.id', 'left')
            ->join('tblsub_category', 'tbladdnews.Sub_category=tblsub_category.id', 'left')
            ->from('tbladdnews')
            ->where('tbladdnews.id', $id)
            ->get();
        return $query->row();
    }
}
