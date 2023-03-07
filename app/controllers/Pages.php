<?php
  class Pages extends Controller {
    protected $pagesModel;

    public function __construct(){
      $this->pagesModel = $this->model('client');
    }
    
    public function index(){
     
      $this->view('pages/index');
    }

    public function about(){

      $this->view('pages/about');
    }

    public function reservations(){

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['search']) && isset($_POST['month'])){
          $name = $_POST['search'];
          $month = $_POST['month'];
          $search = $this->pagesModel->search($name);
          $filterdate = $this->pagesModel->getMonth($month);
          $data = [
            'reservations' => $search,
            'reservations' => $filterdate,
          ];
          $this->view('pages/reservations', $data);
        }elseif(isset($_POST['search']) && !isset($_POST['month'])) {
          $search = $this->pagesModel->search($_POST['search']);
          $data = [
            'reservations' => $search,
          ];
          $this->view('pages/reservations', $data);
        }elseif(!isset($_POST['search']) && isset($_POST['month'])){
          $filterdate = $this->pagesModel->getMonth($_POST['month']);
          $data = [
            'reservations' => $filterdate,
          ];
          $this->view('pages/reservations', $data);
        }
      }else{
        $reservations =  $this->pagesModel->displayReservations();

          $data = [
            'reservations' => $reservations,
        ];

          $this->view('pages/reservations', $data);
      }
    }
    public function myreservations(){


      $myreservations =  $this->pagesModel->myreservations($_SESSION['idusers']);

      $data = [
        'myreservations' => $myreservations
      ];

      $this->view('pages/myreservations', $data);
    }

    public function plan($idcruise){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $reservation = explode(',' ,$_POST['reservation']);

        $idroom = $reservation[0];
        $idcruise = $reservation[1];
        $idship = $reservation[2];
        $data = [
          'idroom' => $idroom,
          'idcruise' => $idcruise,
          'idusers' => $_SESSION['idusers'],
        ];

        $roomCapacity = $this->pagesModel->getCapacity($idship);
         $countReservations = $this->pagesModel->countReservations($idcruise);

        if(($roomCapacity[0]->rooms) <= ($countReservations[0]->count)){
          flash('fullship', 'Can\'t reservate, all rooms are full','alert alert-danger');
          redirect('pages/reservations');exit;
        }

        if($this->pagesModel->reservate($data)){
          redirect('pages/reservations');
      }else{
          echo 'error';
          die();
      }

        $this->view('clients/myreservations', $data);
      }else{
        $getrooms = $this->pagesModel->getRoom($idcruise);

          $data = [
            'getrooms' => $getrooms,
          ];
        $this->view('pages/plan', $data);
      }
    }

    public function cancel($reservationid)
    {
      $givenDate = $this->pagesModel->bringdate($reservationid);
      $givenDate = new DateTime($givenDate[0]->departuredate);
      $currentDateTime = new DateTime();
      $diff = $givenDate->diff($currentDateTime);
      
      if ($diff->days >= 2) {
        $this->pagesModel->cancel($reservationid);
        flash('cancel_success', 'Your reservation has been canceled', 'alert alert-success');
        redirect('pages/myreservations');
      } else {
        flash('cancel_error', 'You can\'t cancel your reservation less than 2 days before the cruise', 'alert alert-danger');
        redirect('pages/myreservations');
      }
    }


    public function contact(){
      $this->view('pages/contact');
    }
  }