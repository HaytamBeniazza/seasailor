<?php
  class Client {

    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function displayReservations() {
      $results = $this->db->query('SELECT *, MIN(roomtype.price) as min_price
      FROM `cruise`
      JOIN `port` ON port.idport = cruise.idport
      JOIN `ship` ON ship.idship = cruise.idship
      JOIN `room` ON room.idship = cruise.idship
      JOIN `roomtype` ON roomtype.idtype = room.idtype
      WHERE cruise.departuredate > NOW()
      GROUP BY cruise.idcruise');

      return $results = $this->db->resultSet();
    }

    public function getRoom($idcruise) {
      $results = $this->db->query('SELECT * FROM `room` JOIN ship on ship.idship = room.idship join roomtype on room.idtype = roomtype.idtype join cruise on cruise.idship = room.idship where cruise.idcruise = :idcruise ORDER BY roomtype.price ASC');
      $this->db->bind(':idcruise', $idcruise);

      return $results = $this->db->resultSet();
    }

    public function getMinPrice(){
      $results = $this->db->query('SELECT MIN(price) as minprice FROM `roomtype` ');
      return $results = $this->db->resultSet();
    }

    public function reservate($data) {
      $this->db->query('INSERT INTO reservation (idroom, idcruise, idusers) VALUES(:idroom, :idcruise, :idusers)');
      // Bind values
      $this->db->bind(':idroom', $data['idroom']);
      $this->db->bind(':idcruise', $data['idcruise']);
      $this->db->bind(':idusers', $data['idusers']);

  
      // Execute
      if ($this->db->execute()) {
        return true;
      } else {
        return false;
      }

    }

    public function search($name)
    {
      $results = $this->db->query("SELECT * FROM `cruise` join port on cruise.idport = port.idport join ship on cruise.idship = ship.idship where (ship.shipname like '%$name%' or port.name like '%$name%' or cruise.departuredate like '%$name%') and cruise.departuredate > NOW()  ");
  
      return $results = $this->db->resultSet();
    }

    public function myreservations()
    {
      $results = $this->db->query("SELECT * FROM `reservation` join users on reservation.idusers = users.idusers join cruise on cruise.idcruise = reservation.idcruise join room on room.idroom = reservation.idroom join ship on ship.idship = cruise.idship join port on port.idport = cruise.idport");
  
      return $results = $this->db->resultSet();
    }

    public function cancel($reservationid)
    {
      $this->db->query('DELETE FROM `reservation` WHERE `reservation`.`reservationid` = :reservationid');
      $this->db->bind(':reservationid', $reservationid);
      if ($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }

    public function checkForRooms($idcruise) {
      $this->db->query('SELECT * FROM room join ship on ship.idship = room.idship join cruise on cruise.idship = room.idship WHERE cruise.idcruise = :idcruise');
      // Bind value
      $this->db->bind(':idcruise', $idcruise);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return false;
      } else {
        return true;
      }
    }
    public function bringdate($reservationid){
      $results = $this->db->query('SELECT departuredate FROM reservation join cruise on cruise.idcruise = reservation.idcruise WHERE reservation.reservationid = :reservationid');
      $this->db->bind(':reservationid', $reservationid);
      return $results = $this->db->resultSet();

    }
    

    public function getMonth($month) {
      $results = $this->db->query('SELECT * FROM `cruise` JOIN `port` on port.idport = cruise.idport JOIN ship on ship.idship = cruise.idship where MONTH(cruise.departuredate) = :month and cruise.departuredate > NOW()');
      $this->db->bind(':month', $month);

      return $results = $this->db->resultSet();
    }

  }