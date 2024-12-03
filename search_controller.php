<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Search extends CI_Controller {

    public function index()
    {
        
        $noidung = $this->input->post('keyword');

        // Kiểm tra nếu có từ khóa thì tìm kiếm, nếu không thì gán kết quả rỗng
        if ($noidung) {
            $data['results'] = $this->Story_model->search_stories($noidung);
        } else {
            $data['results'] = [];
        }

        // Gửi kết quả tìm kiếm đến view
        $this->load->view('hien_thi_search', $data);
    }
}
