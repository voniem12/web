<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");
class search_model extends CI_Model {

    public function __construct() {
        // Gọi hàm khởi tạo của CI_Model
        parent::__construct();
        // Tải thư viện cơ sở dữ liệu
        $this->load->database();
    }

    // Hàm tìm kiếm truyện theo từ khóa
    public function search_stories($keyword) {
        // Truy vấn tìm kiếm truyện và đếm số chương dựa trên từ khóa
        $this->db->select('stories.*, COUNT(chapters.id) as chapter_count');
        $this->db->from('stories');
        $this->db->join('chapters', 'chapters.story_id = stories.id', 'left');
        $this->db->like('stories.title', $keyword);
        $this->db->group_by('stories.id'); // Nhóm theo ID của truyện
        $query = $this->db->get();
        
        return $query->result(); // Trả về kết quả truy vấn
    }
    public function chu_de_model($chu_de)
    {
        $this->db->select('stories.*, count(chapters.id) as chapter_count');
        $this->db->from('stories');
        $this->db->join('chapters', 'chapters.story_id = stories.id', 'left');
        $this->db->where('category_name',$chu_de);
        $this->db->group_by('stories.id');
        $query = $this->db->get();
        return $query->result();
    }
    public function trinhdien_model(){
        $this->db->select('stories.id, stories.title, stories.cover_image, stories.category_name');
        $this->db->from('stories');
        $query = $this->db->get();
        return $query->result();
    }
    public function tong_quat($id){
        $this->db->select('stories.*,chapters.title as chapter_title,chapters.chapter_number ,COUNT(chapters.id) as chapter_count');
        $this->db->from('stories');
        $this->db->join('chapters', 'chapters.story_id = stories.id', 'left');
        $this->db->where('stories.id',$id);
        $this->db->group_by('stories.id');
        $query = $this->db->get()->row();


        $this->db->select('id, title, created_at, chapter_number');
        $this->db->from('chapters');
        $this->db->where('story_id', $id);
        $this->db->order_by('chapter_number', 'ASC');
        $chapters = $this->db->get()->result(); // Trả về nhiều dòng (mảng đối tượng)

        // Trả về cả thông tin câu chuyện và danh sách chương
        return (object) ['story' => $query, 'chapters' => $chapters];

    }
    public function return_nd_chuong($id, $chapter_number) {
      
        $this->db->select('stories.*, chapters.title AS chapter_title, chapters.chapter_number, chapters.story_id, chapters.content');
        $this->db->from('stories');
        $this->db->join('chapters', 'chapters.story_id = stories.id', 'left');
        $this->db->where('stories.id', $id);
        $this->db->where('chapters.chapter_number', $chapter_number);
        $chapter_data = $this->db->get()->row();
    
        
        $this->db->select('COUNT(id) as chapter_count');
        $this->db->from('chapters');
        $this->db->where('story_id', $id);
        $total_chapters = $this->db->get()->row()->chapter_count;
    
        // Gộp cả hai dữ liệu vào mảng kết quả
        $chapter_data->chapter_count = $total_chapters;
        
        return $chapter_data;
    }
    public function register_user($username,$email,$password,$avataruser)
    {   $role = 'user';
        $dulieu = array(
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'avatar' => $avataruser,
            'role' => $role,
        );
        $this->db->where('email', $dulieu['email']);
        $this->db->or_where('username', $dulieu['username']);
        $query = $this->db->get('users');
        
        if ($query->num_rows() > 0) {
            // Kiểm tra cụ thể email hoặc username đã tồn tại
            $existing_user = $query->row();
            if ($existing_user->email == $dulieu['email']) {
                return 'email_exists'; // Email đã tồn tại
            } else if ($existing_user->username == $dulieu['username']) {
                return 'username_exists'; // Username đã tồn tại
            }
        } else {
            // Email và username đều chưa tồn tại, thực hiện đăng ký
            return $this->db->insert('users', $dulieu) ? 'success' : 'error';
        }
        return $this->db->insert('users',$dulieu);
        return $this->db->insert_id();
    }
    public function login_user($email, $password)
    {
        $this->db->select('id,username, email, password, role,avatar');
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        
        if($query->num_rows() == 1){
            $user = $query->row_array();
            if ($user['password'] === $password) { // So sánh mật khẩu không mã hóa
                return $user; // Mật khẩu đúng, trả về thông tin người dùng
            } else {
                echo "Mật khẩu không khớp.<br>"; // Thông báo mật khẩu sai
                return false; // Mật khẩu không khớp
                }
            
        }else {
            echo "Không tìm thấy email trong thông tin người dùng.";
            return false; // Không tìm thấy email
        }
       
    }
}