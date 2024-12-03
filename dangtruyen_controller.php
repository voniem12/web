<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class dangtruyen_controller extends CI_Controller {
    public function __construct(){
        parent::__construct();
    }

    public function index(){
         
    if (!$this->session->userdata('user_id')) {
       
        $this->session->set_userdata('redirect_to', current_url());
        $this->session->set_flashdata('error', 'Vui lòng đăng nhập để đăng truyện.');
        redirect('Truyentt/dangnhap'); 
    } else {
        
        $this->load->view('dangtruyen_view');
    }
}

    public function dangtruyen(){
        $user_id = $this->session->userdata('user_id');
        $tentruyen = $this->input->post('tentruyen');
        $theloaitruyen = $this->input->post('theloaitruyen');
        $tacgia = $this->input->post('tacgia');
        $mota = $this->input->post('mota');

        // Xử lí upload file
        $target_dir = "Fileupload/";
        $target_file = $target_dir . basename($_FILES["anhavatar"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["anhavatar"]["tmp_name"]);
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
            
            if (move_uploaded_file($_FILES["anhavatar"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["anhavatar"]["name"])) . " has been uploaded.";
                echo base_url() . $target_file;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        $anhavatar =  base_url()."Fileupload/".basename($_FILES["anhavatar"]["name"]);
        $this->load->model('Dangtruyen_model');
        
        $this->Dangtruyen_model->taotruyentoDatabase($tentruyen,$theloaitruyen,$tacgia,$mota,$anhavatar,$user_id);
            
    //          echo '<pre>';
    // print_r($data); // In ra dữ liệu để kiểm tra
    // echo '</pre>';
             
    }
    public function viettruyen(){
        $user_id = $this->session->userdata('user_id');

        $this->load->model('Dangtruyen_model'); 
        $data= $this->Dangtruyen_model->layTruyenCuaNguoiDung($user_id);
          
        $viewdata = array('truyen_cua_toi'=>$data);
        $this->load->view('viettruyen_view', $viewdata);
    }
   public function themchapter($story_id)
   {
    $this->load->model("Dangtruyen_model");
    $data = $this->Dangtruyen_model->layTinhtrangtruyen($story_id);
    //var_dump($data);
    $data = array('tinhtrangtruyen'=>$data);
      //var_dump($data);
   $this->load->view('themchapter_view',$data);
   }
   public function nhapnoidung_chaptervao_database(){
        $story_id = $this->input->post('story_id');
        $id_chapter = $this->input->post('id_chapter');
        $titlechuong = $this->input->post('titlechuong');
        $noidungchuong = $this->input->post('noidungchuong');
        // var_dump($noidungchuong);
        $this->load->model('Dangtruyen_model');
        if($this->Dangtruyen_model->themnoidungvaodatabase_model($story_id,$id_chapter,$titlechuong,$noidungchuong))
        {
            redirect('dangtruyen_controller/themchapter/'.$story_id);
        }
        else{
            echo "lỗi";
        }
   }
}
