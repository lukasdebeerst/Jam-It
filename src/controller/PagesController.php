<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/EventsDAO.php';

class PagesController extends Controller {

  function __construct() {
    $this->eventsDAO = new EventsDAO();
  }

  public function index() {
    $events = $this->eventsDAO->getAllEvents();

    if(!empty($_GET['action'])){
      if($_GET['action'] == 'filter'){
        if(!empty($_GET['search']) && empty($_GET['genre']) && empty($_GET['date'])){
          $events = $this->eventsDAO->searchEvents($_GET['search']);
        }
        if(empty($_GET['search']) && !empty($_GET['genre']) && empty($_GET['date'])){
          $events = $this->eventsDAO->searchEventsByGenre($_GET['genre']);
        }
        if(empty($_GET['search']) && empty($_GET['genre']) && !empty($_GET['date'])){
          $events = $this->eventsDAO->searchEventsByDate($_GET['date']);
        }
        if(!empty($_GET['search']) && !empty($_GET['genre']) && empty($_GET['date'])){
          $events = $this->eventsDAO->searchEventsBySearchAndGenre($_GET['search'], $_GET['genre']); 
        }
        if(empty($_GET['search']) && !empty($_GET['genre']) && !empty($_GET['date'])){
          $events = $this->eventsDAO->searchEventsByGenreAndDate($_GET['genre'], $_GET['date']);
        }
        if(!empty($_GET['search']) && empty($_GET['genre']) && !empty($_GET['date'])){
          $events = $this->eventsDAO->searchEventsBySearchAndDate($_GET['search'], $_GET['date']);
        }
        if(!empty($_GET['search']) && !empty($_GET['genre']) && !empty($_GET['date'])){
          $events = $this->eventsDAO->searchEventsBySearchGenreAndDate($_GET['search'], $_GET['genre'], $_GET['date']);
        }
      }
    } 
    if ($_SERVER['HTTP_ACCEPT'] == 'application/json') {
      echo json_encode($events);
      exit();
    }
    


    if(!empty($_GET['action'])){
      if($_GET['action'] == 'delete'){
        $deleteEvent = $this->eventsDAO->deleteEvent($_GET['id']);
      }
      if($deleteEvent){
        $_SESSION['delete'] = 'De jam is deleted';
        header('Location: index.php');
        exit();
      }
    }

    $this->set('events', $events);
    $this->set('title', 'Events');
  }

  public function detail(){

    if(!empty($_GET['id'])){
      $event = $this->eventsDAO->getEventById($_GET['id']);
    }

    if(empty($event)){
      $_SESSION['eventNotFound'] = "Sorry, we didn't find this event";
      header('Location: index.php');
      exit();
    }

    $this->set('event', $event);
    $this->set('title', 'Detail');
  }

  public function create(){

    if(!empty($_GET['id'])){
      $event = $this->eventsDAO->getEventById($_GET['id']);
      $this->set('event', $event);
    }

    if(!empty($_POST['action'])){
      if(empty($_POST['event_guitar'])){
        $_POST['event_guitar'] = 0;
      }
      if(empty($_POST['event_bass'])){
        $_POST['event_bass'] = 0;
      }
      if(empty($_POST['event_drum'])){
        $_POST['event_drum'] = 0;
      }
      if(empty($_POST['event_piano'])){
        $_POST['event_piano'] = 0;
      }
      if(empty($_POST['event_vocals'])){
        $_POST['event_vocals'] = 0;
      }
      if(empty($_POST['event_sax'])){
        $_POST['event_sax'] = 0;
      }

      if(empty($_POST['soundsys'])){
        $_POST['soundsys'] = 0;
      }
      if(empty($_POST['drum'])){
        $_POST['drum'] = 0;
      }
      if(empty($_POST['g_amp'])){
        $_POST['g_amp'] = 0;
      }
      if(empty($_POST['b_amp'])){
        $_POST['b_amp'] = 0;
      }
      if(empty($_POST['keyboard'])){
        $_POST['keyboard'] = 0;
      }
      if(empty($_POST['snacks'])){
        $_POST['snacks'] = 0;
      }

      if($_POST['action'] == 'createJam'){
        $addEvent = $this->eventsDAO->addNewEvent(array(
          'per_name' => $_POST['per_name'],
          'per_gender' => $_POST['per_gender'],
          'per_age' => $_POST['per_age'],
          'name' => $_POST['name'],
          'genre' => $_POST['genre'],
          'level' => $_POST['level'], 
          'age' => $_POST['age'], 
          'per_instr' => $_POST['per_instr'], 
          'event_guitar' => $_POST['event_guitar'],
          'event_bass' => $_POST['event_bass'],
          'event_drum' => $_POST['event_drum'],
          'event_piano' => $_POST['event_piano'],
          'event_vocals' => $_POST['event_vocals'],
          'event_sax' => $_POST['event_sax'],
          'location' => $_POST['location'],
          'location_cat' => $_POST['location_cat'],
          'date' => $_POST['date'],
          'time_start' => $_POST['time_start'],
          'time_end' => $_POST['time_end'],
          'distance' => $_POST['distance'], 
          'soundsys' => $_POST['soundsys'],
          'drum' => $_POST['drum'], 
          'g_amp' => $_POST['g_amp'], 
          'b_amp' => $_POST['b_amp'],
          'keyboard' => $_POST['keyboard'],
          'snacks' => $_POST['snacks'],
          'extra' => $_POST['extra']
        ));
        if(!$addEvent){
          $_SESSION['createError'] = 'There is something wrong';
          $errors = $this->eventsDAO->validate($_POST);
          $this->set('errors', $errors);
        } else {
          $_SESSION['createSucces'] = 'The jam is succesfully created.';
          header('Location: index.php');
          exit();
        }
      }
    
      if($_POST['action'] == 'editJam'){
        if(!empty($_POST['id'])){
          $editEvent = $this->eventsDAO->updateEvent(array(
            'id' => $_POST['id'],
            'per_name' => $_POST['per_name'],
            'per_gender' => $_POST['per_gender'],
            'per_age' => $_POST['per_age'],
            'name' => $_POST['name'],
            'genre' => $_POST['genre'],
            'level' => $_POST['level'], 
            'age' => $_POST['age'], 
            'per_instr' => $_POST['per_instr'], 
            'event_guitar' => $_POST['event_guitar'],
            'event_bass' => $_POST['event_bass'],
            'event_drum' => $_POST['event_drum'],
            'event_piano' => $_POST['event_piano'],
            'event_vocals' => $_POST['event_vocals'],
            'event_sax' => $_POST['event_sax'],
            'location' => $_POST['location'],
            'location_cat' => $_POST['location_cat'],
            'date' => $_POST['date'],
            'time_start' => $_POST['time_start'],
            'time_end' => $_POST['time_end'],
            'distance' => $_POST['distance'], 
            'soundsys' => $_POST['soundsys'],
            'drum' => $_POST['drum'], 
            'g_amp' => $_POST['g_amp'], 
            'b_amp' => $_POST['b_amp'],
            'keyboard' => $_POST['keyboard'],
            'snacks' => $_POST['snacks'],
            'extra' => $_POST['extra']
          ));
          if($editEvent){
            header('Location: index.php?page=detail&id=' . $_POST['id']);
            exit();
          }
        }
      }
    }



    $this->set('title', 'Create');
  }



}
