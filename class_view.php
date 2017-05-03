class view(){

   public $table;
   
   
   

    public function __construct($t){
      self::$table=$t;

    }

    public function listData($controller){

        $config['base_url']=site_url().'/admin/home/$controller';
        $config['total_rows']=$this->db->count_all($table);
        $config['per_page']=5;
        $config['cur_tag_open']='<li class="am-active"><a>';
        $config['cur_tag_close']='</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo;';
        $config['next_link']='&raquo;';
        $this->pagination->initialize($config);
        $data['data']=$this->db->get($table,$config['per_page'],$this->uri->segment(4));
        return $data;
        }

    

		public function del($id){
        if($this->db->where('id',$id)->delete(self::$table)){
            echo "<script>alert('删除成功');window.history.go(-1);</script>";
        }else{
            echo "<script>alert('删除失败');window.history.go(-1);</script>";
        }
	}

    public function sea($field){
            $key=$this->input->post('key');
            $data['data']=$this->db->like($field,$key)->get($table)->result_array();
            $data['key']=$key;
            return $data;
    }
}



class Home extends MY_Controller {
	
	$news = new view('abm_news');
	$case = new view();
	$user = new view();

	

	function addAction(){
	  switch()
	  case ('news'):$news->add();
	  case ():
	}

	function delAction($type){
	  switch($type)
	  case ('news'):$news->del();
	  case ():
	}

	function seaAction($type,$field){
	  switch($type)
	  case ('news'):$data=$news->sea($field);load->view
	  case ():
	}

    function loadview($type，$page){
    switch($type)
    case news:
             switch($page)
                case list:$data=$news->listdata('loadview');$this->load->view('',$data),break
                case add:$this->load->view()
    }


}
