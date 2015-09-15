<?php
class User extends CI_Controller
{
 public function __construct()
        {
		
                parent::__construct();
				$this->load->database();
				$this->load->library('session');
        }
public function index()                                            //index and user signup form
{
	 $this->load->helper('form');
	 $this->load->library('form_validation');
	 $data['title'] = 'Welcome to login';
	 
	  $this->load->view('templates/header', $data);
	  $this->load->view('User/index',$data);
	  $this->load->view('templates/footer', $data);
	 
        $this->form_validation->set_rules('fname','FIRST NAME','required');
		$this->form_validation->set_rules('lname','Last NAME','required');
		$this->form_validation->set_rules('email','email','required');
		$this->form_validation->set_rules('dob','dob','required');
		$this->form_validation->set_rules('password','Password','required');
		
		if($this->form_validation->run() == FALSE){
		
		//echo "validation failed";
		}
		else{
		if($this->input->post('password') == $this->input->post('repassword'))
		{
		 $email = $this->input->post('email');
		 if($this->check_email($email))
		 {
		  echo "This email has already registered";

		 }
		 else{
		 $this->signup();
		 echo '<script>alert("You Have Successfully signup. please click ok and login");</script>';
		 redirect('user/index');
        
		}
		}
		else
		{
		 $error_message="your Password didn't match";
		 echo $error_message;
		}
		
		}

} 
 public function login()                                     //user login 
 {
     $this->load->helper('url');
     $this->load->helper('form');
	 $this->load->library('form_validation');
     
	 $this->form_validation->set_rules('loginemail','Login_Email','required');
	 $this->form_validation->set_rules('loginpassword','Login_password','required');
	 
	 if($this->form_validation->run() === FALSE)
	 {
	    $this->load->view('templates/header');
        $this->load->view('User/index');
	 }
     else
	 {
	 $username = $this->input->post('loginemail');
	 $password = $this->input->post('loginpassword');

	$this->db->select('id,first_name,last_name,email,password');
    $this->db->from('users');
    $this->db->where('email',$username);
    $this->db->where('password',$password);
    // $this->db->limit(1);
  
  	$query= $this->db->get();
	  if($query->num_rows() ==1){
	   $result = $query->result();
	 	$id = $result[0]->id;
	 	$first_name=$result[0]->first_name;
	 	$last_name=$result[0]->last_name;
	 	$this->session->set_userdata('id',$id);
	 	$this->session->set_userdata('first_name',$first_name);
	 	$this->session->set_userdata('last_name',$last_name);
	 	redirect('blog/profile');
	   }
	   else{
	     $data['message'] = "Your user id or password is incorrect"; 
	     $this->load->view('templates/header');
	     $this->load->view('user/index',$data);
	   }

	 }
	}
 public function logout(){
  if($this->session->userdata('id'))
  {
  	$this->session->unset_userdata('id');
  	$this->session->unset_userdata('first_name');
  	$this->session->unset_userdata('last_name');
  	$this->session->sess_destroy();

  	redirect('user/index');
  }
  

 }
 

 public function check_login($loginemail,$loginpassword)       //function for checking login
 {
    $this->db->select('id,email,password');
    $this->db->from('users');
    $this->db->where('email',$loginemail);
    $this->db->where('password',$loginpassword);
    $this->db->limit(1);
  
    $query= $this->db->get();
	  if($query->num_rows() ==1){
	   return $query->result();
	   }
	   else{
	   return false;
	   }

}
public function signup()                                    //function of signup for new user
{
  $data = array(

          'first_name' => $this->input->post('fname'),
          'last_name' => $this->input->post('lname'),
          'email' => $this->input->post('email'),
          'password'=>$this->input->post('password'),
          'dob'=>$this->input->post('dob')			 
				);		
		  return $this->db->insert('users', $data); 

}
public function check_email($email)                         //check If email already exists or not
{
  $this->db->select('email');
  $this->db->from('users');
  $this->db->where('email',$email);
  $this->db->limit(1);
  
  $query = $this->db->get();
  if($query->num_rows() == 1)
  {
  return $query->result();
  }
  else
  {
  return false;
  }



}

}
?>