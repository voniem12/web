<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");
class Dangtruyen_model extends CI_Model{
    public $variable;
    public function __construct(){
        parent::__construct();
    }
    public function taotruyentoDatabase($tentruyen,$theloaitruyen,$tacgia,$mota,$anhavatar,$user_id){
        
        
        $dulieu = array(
            'title' => $tentruyen,
            'author' => $tacgia,
            'description' => $mota,
            'cover_image' => $anhavatar,
            'category_name' => $theloaitruyen, 
            'user_id' => $user_id, 
            'status' => 'ongoing' 
        );
        return $this->db->insert('stories', $dulieu);
        return $this->db->insert_id();
    }
    public function layTruyenCuaNguoiDung($user_id){
        $this->db->select("*");
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('stories')->result_array();
        return $query;
    }
    public function layTinhtrangtruyen($story_id)
    {
       // echo "Story ID: " . $story_id; 
        $this->db->select('stories.id, stories.title, COUNT(chapters.id) as chapter_count');
        $this->db->from('stories');
        $this->db->join('chapters', 'chapters.story_id = stories.id', 'left');
        $this->db->where('stories.id', $story_id);
        $this->db->group_by('stories.id');
        $query = $this->db->get();
    
        return $query->row();
    }
    public function themnoidungvaodatabase_model($story_id,$id_chapter,$titlechuong,$noidungchuong)
    {
        $data = array(
            'story_id' => $story_id,
            'content' => $noidungchuong,
            'title' => $titlechuong,
            'chapter_number' => $id_chapter,
        );
        $this->db->insert('chapters', $data);
        return $this->db->insert_id();
    }
}