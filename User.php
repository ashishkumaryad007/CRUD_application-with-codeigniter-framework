<?php
class User extends CI_Controller
{   
    function index(){
        $this->load->model('User_model');
		$result['data']=$this->User_model->all();//go to all() model for data display 
		$this->load->view('list',$result);//go to view and run  list.php
        
    }
    function create(){
        $this->load->model('User_model');
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('mobile','Mobile','required|max_length[10]|min_length[10]|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('password','Password','required');

        if ($this->form_validation->run()== false){
            $this->load->view('create');
        }else{
            //saverecord in to database
            $formArray= array();
            $formArray['name']=$this->input->post('name');
            $formArray['email']=$this->input->post('email');
            $formArray['mobile']=$this->input->post('mobile');
            $formArray['password']=$this->input->post('password');
            $formArray['created_at']=date('Y-m-d');
            $this->User_model->create($formArray);
            $this->session->set_flashdata('success','Record added Successfully!');
            redirect(base_url().'index.php/User/index');
        }
     
    }
    function edit($userId){
        $this->load->model('User_model');
        $user = $this->User_model->getUser($userId);
        $data=array();
        $data['user'] = $user;

        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('mobile','Mobile','required|max_length[10]|min_length[10]|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('password','Password','required');

        if ($this->form_validation->run()== false){
            $this->load->view('edit',$data);
        }else{
            //update record in to database
            $formArray= array();
            $formArray['name']=$this->input->post('name');
            $formArray['email']=$this->input->post('email');
            $formArray['mobile']=$this->input->post('mobile');
            $formArray['password']=$this->input->post('password');

            $this->User_model->updateUser($userId,$formArray);
            $this->session->set_flashdata('success','Record updated Successfully!');
            redirect(base_url().'index.php/User/index');
        }
    
    }
    function delete($userId){
        $this->load->model('User_model');
        $user = $this->User_model->getUser($userId);
        if(empty($user)){
            $this->session->set_flashdata('failure','Record Not Found in Database!');
            redirect(base_url().'index.php/User/index');
        }else{
            $this->User_model->deleteUser($userId);
            $this->session->set_flashdata('success','Record deleted Successfully!');
            redirect(base_url().'index.php/User/index');
        }

    }

}

?>