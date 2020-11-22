<?php

require_once( __DIR__ . '/DAO.php');

class EventsDAO extends DAO {

  public function updateEvent($data){
    $sql = "UPDATE `events` SET `per_name` = :per_name, `per_gender` = :per_gender, `per_age` = :per_age, `name` = :name, `genre` = :genre, `level` = :level, `age` = :age, `per_instr` = :per_instr, `event_guitar` = :event_guitar,
    `event_bass` = :event_bass, `event_drum` = :event_drum, `event_piano` = :event_piano, `event_vocals` = :event_vocals, `event_sax` = :event_sax, `location` = :location, `location_cat` = :location_cat, `date` = :date,
    `time_start` = :time_start, `time_end` = :time_end, `distance` = :distance, `soundsys` = :soundsys, `drum` = :drum, `g_amp` = :g_amp, `b_amp` = :b_amp, `keyboard` = :keyboard, `snacks` = :snacks, `extra` = :extra
    WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue('per_name', $data['per_name']);
    $stmt->bindValue('per_gender', $data['per_gender']);
    $stmt->bindValue('per_age', $data['per_age']);
    $stmt->bindValue('name', $data['name']);
    $stmt->bindValue('genre', $data['genre']);
    $stmt->bindValue('level', $data['level']);
    $stmt->bindValue('age', $data['age']);
    $stmt->bindValue('per_instr', $data['per_instr']);
    $stmt->bindValue('event_guitar', $data['event_guitar']);
    $stmt->bindValue('event_bass', $data['event_bass']);
    $stmt->bindValue('event_drum', $data['event_drum']);
    $stmt->bindValue('event_piano', $data['event_piano']);
    $stmt->bindValue('per_name', $data['per_name']);
    $stmt->bindValue('event_vocals', $data['event_vocals']);
    $stmt->bindValue('event_sax', $data['event_sax']);
    $stmt->bindValue('location', $data['location']);
    $stmt->bindValue('location_cat', $data['location_cat']);
    $stmt->bindValue('date', $data['date']);
    $stmt->bindValue('time_start', $data['time_start']);
    $stmt->bindValue('time_end', $data['time_end']);
    $stmt->bindValue('distance', $data['distance']);
    $stmt->bindValue('soundsys', $data['soundsys']);
    $stmt->bindValue('drum', $data['drum']);
    $stmt->bindValue('g_amp', $data['g_amp']);
    $stmt->bindValue('b_amp', $data['b_amp']);
    $stmt->bindValue('keyboard', $data['keyboard']);
    $stmt->bindValue('snacks', $data['snacks']);
    $stmt->bindValue('extra', $data['extra']);
    $stmt->bindValue('id', $data['id']);
    return $stmt->execute();
  }

  public function addNewEvent($data){
    $errors = $this->validate($data);
    if(empty($errors)){
      $sql = "INSERT INTO `events` 
              (`per_name`, `per_gender`, `per_age`, `name`, `genre`, `level`, `age`, `per_instr`, `event_guitar`, `event_bass`, `event_drum`, `event_piano`, `event_vocals`, `event_sax`, `location`, `location_cat`, `date`, `time_start`, `time_end`, `distance`, `soundsys`, `drum`, `g_amp`, `b_amp`, `keyboard`, `snacks`, `extra`) 
              VALUES (:per_name, :per_gender, :per_age, :name, :genre, :level, :age, :per_instr, :event_guitar, :event_bass, :event_drum, :event_piano, :event_vocals, :event_sax, :location, :location_cat, :date, :time_start, :time_end, :distance, :soundsys, :drum, :g_amp, :b_amp, :keyboard, :snacks, :extra)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue('per_name', $data['per_name']);
      $stmt->bindValue('per_gender', $data['per_gender']);
      $stmt->bindValue('per_age', $data['per_age']);
      $stmt->bindValue('name', $data['name']);
      $stmt->bindValue('genre', $data['genre']);
      $stmt->bindValue('level', $data['level']);
      $stmt->bindValue('age', $data['age']);
      $stmt->bindValue('per_instr', $data['per_instr']);
      $stmt->bindValue('event_guitar', $data['event_guitar']);
      $stmt->bindValue('event_bass', $data['event_bass']);
      $stmt->bindValue('event_drum', $data['event_drum']);
      $stmt->bindValue('event_piano', $data['event_piano']);
      $stmt->bindValue('per_name', $data['per_name']);
      $stmt->bindValue('event_vocals', $data['event_vocals']);
      $stmt->bindValue('event_sax', $data['event_sax']);
      $stmt->bindValue('location', $data['location']);
      $stmt->bindValue('location_cat', $data['location_cat']);
      $stmt->bindValue('date', $data['date']);
      $stmt->bindValue('time_start', $data['time_start']);
      $stmt->bindValue('time_end', $data['time_end']);
      $stmt->bindValue('distance', $data['distance']);
      $stmt->bindValue('soundsys', $data['soundsys']);
      $stmt->bindValue('drum', $data['drum']);
      $stmt->bindValue('g_amp', $data['g_amp']);
      $stmt->bindValue('b_amp', $data['b_amp']);
      $stmt->bindValue('keyboard', $data['keyboard']);
      $stmt->bindValue('snacks', $data['snacks']);
      $stmt->bindValue('extra', $data['extra']);
      return $stmt->execute();
    }
  }

  public function getEventById($id){
    $sql = "SELECT * FROM `events` WHERE id = :id ";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue('id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function getAllEvents(){
    $sql = "SELECT * FROM `events`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }


  public function getEventsByGenre($genre){
    $sql = "SELECT * FROM `evenets` WHERE `genre` = :genre";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':genre', $genre);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getEventByLevel($level){
    $sql = "SELECT * FROM `events` WHERE `level` = :level";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':level', $level);
    return $stmt-> fetchAll(PDO::FETCH_ASSOC);
  }

  public function searchEvents($name){
    $sql = "SELECT * FROM `events` WHERE `name` LIKE :name";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':name', '%' . $name . '%');
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function searchEventsByGenre($genre){
    $sql = "SELECT * FROM `events` WHERE `genre` = :genre";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':genre', $genre);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function searchEventsByDate($date){
    $sql = "SELECT * FROM `events` WHERE `date` = :date";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':date', $date);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function searchEventsBySearchAndGenre($search, $genre){
    $sql = "SELECT * FROM `events` WHERE `name` LIKE :search AND `genre` = :genre";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':search', '%' . $search . '%');
    $stmt->bindValue(':genre', $genre);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function searchEventsByGenreAndDate($genre, $date){
    $sql = "SELECT * FROM `events` WHERE `genre` = :genre AND `date` = :date";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':genre', $genre);
    $stmt->bindValue(':date', $date);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function searchEventsBySearchAndDate($search, $date){
    $sql = "SELECT * FROM `events` WHERE `name` LIKE :search AND `date` = :date";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':search', '%' . $search . '%');
    $stmt->bindValue(':date', $date);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function searchEventsBySearchGenreAndDate($search, $genre, $date){
    $sql = "SELECT * FROM `events` WHERE `name` LIKE :search AND `genre` = :genre AND `date` = :date";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':search', '%' . $search . '%');
    $stmt->bindValue(':genre', $genre);
    $stmt->bindValue(':date', $date);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function deleteEvent($id){
    $sql = "DELETE FROM `events` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    return $stmt->execute();
  }

  public function validate($data){
    $errors = [];
    if(!empty($_POST['action'])){
      if($_POST['action'] == 'createJam'){
        if(empty($_POST['per_name'])){
          $errors['per_name'] = 'Please enter your name.';
        }
        if(empty($_POST['per_gender'])){
          $errors['per_gender'] = 'Please select your gender.';
        }
        if(empty($_POST['per_age'])){
          $errors['per_age'] = 'Please select your age.';
        }
        if(empty($_POST['name'])){
          $errors['name'] = 'Please find a name for your jam.';
        }
        if(empty($_POST['genre'])){
          $errors['genre'] = 'Please select the genre of your jam.';
        }
        if(empty($_POST['level'])){
          $errors['level'] = 'Please select the levek of your jam.';
        }
        if(empty($_POST['age'])){
          $errors['age'] = 'Please select the average age of the musicians.';
        }
        if(empty($_POST['per_instr'])){
          $errors['per_instr'] = 'Please select the instrument you are going to play at the jam';
        }
        // if(empty($_POST['event_guitar']) || empty($_POST['event_bass']) || empty($_POST['event_drum']) || empty($_POST['event_piano']) || empty($_POST['event_vocals']) || empty($_POST['event_sax'])){
        //   $errors['event_instr'] = 'Please select the instruments you want in the jam.';
        // }
        if(empty($_POST['location'])){
          $errors['location'] = 'Please enter the location of the jam.';
        }
        if(empty($_POST['location_cat'])){
          $errors['location_cat'] = 'Please select the kind of building';
        }
        if(empty($_POST['date'])){
          $errors['date'] = 'Please enter the date of the jam.';
        }
        if(empty($_POST['time_start'])){
          $errors['time_start'] = 'Please enter the time the jam starts';
        }
        if(empty($_POST['time_end'])){
          $errors['time_end'] = 'Please enter the time the jam ends';
        }
        if(empty($_POST['distance'])){
          $errors['distance'] = 'Please select the maximum distance of the other musicians';
        }
      }
    }

    return $errors;
  }

}
