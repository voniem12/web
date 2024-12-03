<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Truyentt extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index() {
        $this->load->model('search_model');
        $data = $this->search_model->trinhdien_model();
        $data = array('trinhdien'=>$data);
        $this->load->view('truyentt_view',$data); 
    }

    public function search() {
        $noidung = $this->input->post('keyword');
        
        if ($noidung) {
            $this->load->model('search_model');
            $data['noidunghienthi'] = $this->search_model->search_stories($noidung);
    //             echo "<pre>";
    //    var_dump($data) ;
    //    echo "</pre>";
        } else {
            $data['noidunghienthi'] = [];
        }
        
        $this->load->view('hien_thi_search', $data); // Hiển thị kết quả tìm kiếm
    }
    public function chu_de($chu_de)
    {   //echo $chu_de;
        $this->load->model('search_model');
        $du_lieu = $this->search_model->chu_de_model($chu_de);
        $du_lieu = array('hienthichude'=>$du_lieu);
        if(!empty($du_lieu['hienthichude'])){
            $this->load->view('hien_thi_chu_de',$du_lieu);
        }
        else{
            echo "chưa có truyện cho chủ đề này";
        }
    // echo "<pre>";
    //    var_dump($du_lieu) ;
    //    echo "</pre>";
        
    }
    // public function trinhdien()
    // {
    //     $this->load->model('search_model');
    //     $data = $this->search_model->trinhdien_model();
    //     $data = array('trinhdien'=>$data);

        
    // }
    public function gioi_thieu_truyen($id) {
        $this->load->model('search_model');
        $du_lieu = $this->search_model->tong_quat($id);
        $du_lieu = array('tongquat'=>$du_lieu);
    // echo "<pre>";
    //    var_dump($du_lieu) ;
    //    echo "</pre>";
         $this->load->view('tong_quat_truyen',$du_lieu);

    }
    public function doc_tu_dau($id,$chapter_number){
        $this->load->model('search_model');
        $data = $this->search_model->return_nd_chuong($id,$chapter_number);
    // echo "<pre>";
    //    var_dump($data) ;
    //    echo "</pre>";
    $data = array('hienthinoidungchuong'=>$data);
        $this->load->view('hien_thi_noi_dung_truyen',$data);

    }
    public function dangky()
    {   
        $this->load->view('register');
    }
    public function process_register(){
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        // $password = password_hash($password,PASSWORD_DEFAULT);

         // Xử lí upload file
         $target_dir = "avataruser_upload/";
         $target_file = $target_dir . basename($_FILES["avataruser"]["name"]);
         $uploadOk = 1;
         $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
 
         
         if (isset($_POST["submit"])) {
             $check = getimagesize($_FILES["avataruser"]["tmp_name"]);
             if ($check !== false) {
                 echo "File is an image - " . $check["mime"] . ".";
                 $uploadOk = 1;
             } else {
                 echo "File is not an image.";
                 $uploadOk = 0;
             }
         }
 
         
         if ($uploadOk == 0) {
             echo "Sorry, your file was not uploaded.";
         } else {
             
             if (move_uploaded_file($_FILES["avataruser"]["tmp_name"], $target_file)) {
                 echo "The file " . htmlspecialchars(basename($_FILES["avataruser"]["name"])) . " has been uploaded.";
                 echo base_url() . $target_file;
             } else {
                 echo "Sorry, there was an error uploading your file.";
             }
         }
         $avataruser =  base_url()."avataruser_upload/".basename($_FILES["avataruser"]["name"]);
         
         $this->load->model('search_model');
         $result = $this->search_model->register_user($username,$email,$password,$avataruser);
         if ($result == 'email_exists') {
            // Email đã tồn tại, chuyển về trang đăng ký với thông báo lỗi
            $this->session->set_flashdata('error', 'Email đã tồn tại!');
            redirect('Truyentt/dangky');
        } else if ($result == 'username_exists') {
            // Username đã tồn tại, chuyển về trang đăng ký với thông báo lỗi
            $this->session->set_flashdata('error', 'Username đã tồn tại!');
            redirect('Truyentt/dangky');
        } else if ($result == 'success') {
            // Đăng ký thành công, chuyển sang trang đăng nhập
            $this->session->set_flashdata('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
            redirect('Truyentt/dangnhap');
        } else {
            // Có lỗi xảy ra, chuyển về trang đăng ký với thông báo lỗi
            $this->session->set_flashdata('error', 'Có lỗi xảy ra. Vui lòng thử lại!');
            redirect('Truyentt/dangky');
        }

        //$this->load->view('dang_nhap');
    }
   public function dangnhap(){
    $this->load->view('dang_nhap');
   }
   public function process_login() {
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    
    
    $this->load->model('search_model');
    $user = $this->search_model->login_user($email, $password);
    //  echo "<pre>";
    //    var_dump($user) ;
    //    echo "</pre>";
    if ($user) {
        
       
        $this->session->set_userdata('user_id', $user['id']);
        $this->session->set_userdata('username', $user['username']);
        $this->session->set_userdata('avatar', $user['avatar']);
        // echo "<pre>";
        // var_dump($this->session->userdata());
        // echo "</pre>";
        // exit();
        
        redirect('Truyentt/'); 
    } else {
      
        $this->session->set_flashdata('error', 'Sai email hoặc mật khẩu');
        redirect('Truyentt/dangnhap');
    }
}
public function logout() {
    // Hủy bỏ tất cả các session
    $this->session->sess_destroy();

    // Chuyển hướng về trang chủ hoặc trang đăng nhập
    redirect(base_url('index.php/Truyentt/'));
}
}
