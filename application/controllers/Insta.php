<?php

/**
 * Created by PhpStorm.
 * User: asirik
 */

require_once APPPATH . 'third_party/instagram/src/Instagram.php';

use MetzWeb\Instagram\Instagram;


class Insta extends CI_Controller
{
    private $instagram;

    public function __construct()
    {

        parent::__construct();
        $this->load->model('instagramdata_model');

        // initialize class
        $this->instagram = new Instagram(array(
            'apiKey'      => '1b27c515f60f463487f6891f38d57e48',
            'apiSecret'   => '0a2f5404946b4210b73aec5fb9971de7',
            'apiCallback' => 'http://'.$_SERVER['HTTP_HOST'].'/insta/insta_success' // 
        ));
		
		
      
  


    }

    public function index(){
		
		 $_SESSION['id'] = 1;

        $codeSet =$this->instagramdata_model->getInstaAccessCode($_SESSION['id']);

        if( isset($codeSet->insta_key)){
            $this->instagram->setAccessToken($codeSet->insta_key);
        }else{
            header('Location:'.base_url().'insta/authenticate');
			exit;
        }


        $this->form_validation->set_rules('start', 'Start', 'required');
        $this->form_validation->set_rules('end', 'End', 'required');


        if ($this->form_validation->run() === false) {

            $showStart = date('d-m-Y', strtotime('-1500 days'));
            $showEnd = date('d-m-Y');

        } else {
			
            $showStartGet = $this->input->post('start');

            $showStart = date('d-m-Y', strtotime($showStartGet));

            $showEndGet = $this->input->post('end');
            $showEnd = date('d-m-Y', strtotime($showEndGet));
        }

        $data = array();

        $users = $this->get_user_info();

        $allPosts = $this->get_posts($users->counts->media);

        $medias = array();

        foreach($allPosts as $media){



            $paymentDate = $media->created_time;
            $contractDateBegin = strtotime($showStart);
            $contractDateEnd = strtotime($showEnd);

            if($paymentDate > $contractDateBegin && $paymentDate < $contractDateEnd) {
                $medias[] = $media;
            }

        }


        $data = array(
            'controller' => 'Instagram',
            'page' => 'Dashboard',
            'user' => $users,
            'posts' => $medias,
            'showStart' => $showStart,
            'showEnd' => $showEnd,
            

        );

        $data['breadcrumb'] = array(

            'icon'=> 'fa-instagram',
            'head_url'=>'',
            'title'=> 'Instagram',
            'sub'=>'',
            'date'=> 1
        );


        $this->load->view('header', $data);
        $this->load->view('instagram/dashboard');
        $this->load->view('footer');

    }

    public function authenticate(){

          //create login URL
        $loginUrl = $this->instagram->getLoginUrl();

        $codeSet =$this->instagramdata_model->getInstaAccessCode($_SESSION['id']);

        $data['loginUrl'] = $loginUrl;

        $data['is_authenticate'] = $codeSet;

        $data['breadcrumb'] = array(

            'icon'=> 'fa-instagram',
            'head_url'=>'/insta',
            'title'=> 'Instagram',
            'sub'=>'Authenticate',
            'date'=> 0
        );


        $this->load->view('header', $data);
        $this->load->view('instagram/authenticate');
        $this->load->view('footer');


    }

    public function insta_success(){

        $code = $_GET['code'];

// check whether the user has granted access
        if (isset($code)) {

            // receive OAuth token object
            $data = $this->instagram->getOAuthToken($code);

             $username = $data->user->username;

            // store user access token
            $this->instagram->setAccessToken($data);

            $dataSave = array(
                'insta_key' => $this->instagram->getAccessToken(),
                'user_name'=>$data->user->username,
                'status' =>1,
            );



            $codeSet =$this->instagramdata_model->save_insata($_SESSION['id'],$dataSave);
           

            header('Location:'.base_url().'insta/');


        } else {

            // check whether an error occurred
            if (isset($_GET['error'])) {
                //echo 'An error occurred: ' . $_GET['error_description'];
			    header('Location:'.base_url().'insta/authenticate/?error='.$_GET['error'].'&error_description='.$_GET['error_description'].'');
			    exit;
            }

        }

    }

    

    public function get_user_info(){

       $user = $this->instagram->getUser();

       return $user->data;

       

    }
	
	

    public function get_posts($numb_post){

        $posts =  $this->instagram->getUserMedia('self',$numb_post);

        return $posts->data;

    }
	
	

    public function deleteAccount(){

        $this->instagramdata_model->deleteInstaAccount();
      

        header('Location:'.base_url().'insta/authenticate');
    }
	

}
