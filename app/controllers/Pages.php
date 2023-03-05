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

      $myreservations =  $this->pagesModel->myreservations();

      $data = [
        'myreservations' => $myreservations
      ];

      $this->view('pages/myreservations', $data);
    }

    public function plan($idcruise){
      if($this->pagesModel->checkForRooms($idcruise)){
        flash('ship_with_no_rooms', 'There is no rooms available in this ship','alert alert-danger');
      }
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if($this->pagesModel->checkForRooms($idcruise)){
          flash('ship_with_no_rooms', 'Can\'t reservate, no rooms available','alert alert-danger');
          redirect('pages/reservations');exit;
        }

        $reservation = explode(',' ,$_POST['reservation']);

        $idroom = $reservation[0];
        $idcruise = $reservation[1];
        $data = [
          'idroom' => $idroom,
          'idcruise' => $idcruise,
          'idusers' => $_SESSION['idusers'],
        ];

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