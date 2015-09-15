<?php
class Blog extends CI_Controller
{
   public function __construct()
        {
		
                parent::__construct();
				$this->load->database();
                $this->load->helper('url_helper');
				$this->load->library('session');
        }
    public function index()
    {
	$data['blog'] = $this->get_blog();
	$data['title'] = 'Latest blog on Blogger';
	$this->load->view('templates/header',$data);
	$this->load->view('blog/index',$data);
	}
	
	public function profile(){
		$this->db->from('users');
		$this->db->where('id',$this->session->userdata('id'));
		$query = $this->db->get();
		$result = $query->result();

		$this->db->select('title,text');
		$this->db->from('blogs');
		$this->db->where('user_id',$this->session->userdata('id'));
		$query= $this->db->get();
		$user_blog = $query->result();

		$data=array(
              'result'=>$result[0],
              'user'=>$user_blog
              );
		if($this->session->userdata('id'))
		{
        $this->load->view('templates/header');
		$this->load->view('user/profile',$data);
	    }
	    else{  

               redirect('user/index');
	    	
	    }


	}
    public function create(){

	$this->load->helper('form');
	$this->load->library('form_validation');
	$data['title'] = 'Create a Blog item';

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('text', 'text', 'required');

    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('templates/header', $data);
        $this->load->view('blog/create');
        $this->load->view('templates/footer', $data);
       

    }

    else 
      
    { 
      if($this->session->userdata('id'))	 
      { 
      	$this->set_blog();
        $this->index();
      }

      else
      {
      	echo "you have to login to submit the post";
      }
    }  
	
	
	
	}
	public function comments()
	{
		$post_id = $this->input->post('post_id');
		$comment = $this->input->post('comment');
		$user_id = $this->session->userdata('id');
		$data = [
			'text' =>$comment,
			'user_id'=>$user_id,
			'post_id' =>$post_id
		];

		$this->db->insert('comments',$data);	
		$this->db->from('users');
		$this->db->where('id',$user_id);
		$query = $this->db->get();
		$result = $query->result();
		foreach ($result as $results) {
			$first_name =  $results->first_name;
		     $last_name = $results->last_name;
		    $content = '';
		$content .= '<div class="panel panel-danger"><div class="panel-heading" style="color:black;height:35px;background:#f4b4b4">';
        $content .= '<p text-left="">'.$first_name.' '.$last_name.'</p>';
        $content .= '</div><div class="panel-body">';
        $content .= $comment;                  
        $content .='</div></div>';

        echo $content;
		}

		

	}
	public function show_blog($slug=TRUE)
	{
	 $this->load->helper('form');

	 $blog_data=$this->get_blog($slug);
	 
	 $this->set_comment();

       
       $this->db->from('comments');
       $this->db->join('blogs','blogs.id = comments.post_id');
       $this->db->where('blogs.id',$blog_data['id']);
       $this->db->select('comments.text');
       $temp=$this->db->get();
       $result=$temp->result();

        $username_first=$this->session->userdata('first_name');
        $username_last=$this->session->userdata('last_name');
        $userid=$this->session->userdata('id');
       $data=array( 
         'blog_data'=>$blog_data,
         'result' =>$result,
         'fname'=>$username_first,
         'lname'=>$username_last,
         'uid'=>$userid
     	);
     $this->load->view('templates/header');
	 $this->load->view('blog/show_blog',$data);
	 $this->load->view('templates/footer');
	 
	 }

	
	
	public function set_blog()                           //storing the blog in database
	{
	$this->load->helper('url');
	
	$slug = url_title($this->input->post('title'),'dash',TRUE);
	
	$data = array(
	        'title' => $this->input->post('title'),
			'slug' =>  $slug,
			'text' => $this->input->post('text'),
			'user_id'=>$this->session->userdata('id')
	        );
		  return $this->db->insert('blogs',$data);
	
	}
	public function get_blog($slug=FALSE)                  //getting the blog data
	{
	 if( $slug === FALSE)
	 {
	 $query = $this->db->get('blogs');
	 return $query->result_array();
	 
	 }
	 else
	 {
	 $query = $this->db->order_by('time', 'DESC')->get_where('blogs',array('slug'=>$slug));
	 return $query->row_array();
	 
	 }
	
	}

	public function set_comment()    //functioin for comment on the status
{
	     $this->load->helper('form');
		 $this->load->library('form_validation');
	     $this->form_validation->set_rules('comment','Comment','required');

	     if ($this->form_validation->run() === FALSE)
	     {

	     	
	     }
	     else{


	     $data= array(
	     'text'=> $this->input->post('comment'),
	     'post_id'=>$this->input->post('post_id'),
	     'user_id'=>$this->session->userdata('id')
	     );
	     return $this->db->insert('comments',$data);
	     }
	 }



}
		

?>