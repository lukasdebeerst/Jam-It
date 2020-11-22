<div>
  <section class="filter">
    <h3 class="h2-like">Filter op</h3>
    <input type="hidden" name="page" value="events" />
    <form action="index.php" method="GET" class='filter__form'>
    <label class="h3-like" for="action">Naam
      <input type="hidden" name="action" value="filter">
      <input type="text" name="search" class="filter-button filter__name" value="<?php if(!empty($_GET['action'])){if($_GET['action'] == 'filter'){ if(!empty($_GET['search'])){ echo $_GET['search'];}}} ?>">
      </label>
      <label class="h3-like" for="genre">Genre
        <select class="filter-button filter__genre" name="genre" id="genre">
          <option value="">Kies Genre</option>
          <option value="blues">Blues</option>
          <option value="rock">Rock</option>
          <option value="jazz">Jazz</option>
          <option value="classical">Classical</option>
          <option value="reggae">Reggae</option>
          <option value="folk">Folk</option>
        </select>
      </label>
      <label class="h3-like" for="date">Datum
        <input type="date" id="date" name="date" class="filter-button filter__date">
      </label>
      <input type="submit" name="submit" value="Filteren" class="filter-button--confirm">
    </form>
  </section>
  <section class="content-wrapper fullwidth">
    <h3 class="hidden">Events</h3>
    <span><?php 
      if(!empty($_SESSION)){
        if(!empty($_SESSION['delete'])){
          echo $_SESSION['delete'];
        }
        if(!empty($_SESSION['eventNotFound'])){
          echo $_SESSION['eventNotFound'];
        }
        if(!empty($_SESSION['createSucces'])){
          echo $_SESSION['createSucces'];
        }
      } 
      ?></span>
    <div class="content sitewidth">
      <span class="event__error"></span> 
      <div class="event__grid">     
        <?php foreach($events as $event):?>
        <a href="index.php?page=detail&id=<?php echo $event['id']; ?>" title="<?php echo $event['name']; ?>" class="grid-item">
          <div class="grid-item-content">
            <h3 class="item-title"><?php echo $event['name']; ?></h3>
            <p>Organised by <span><?php echo $event['per_name']; ?></span></p>
            <p>on <span><?php echo $event['date'] ?></span> in <span><?php echo $event['location']; ?></span> </p>
            <p>He is still searching for a 
            <span>
            <?php 
            if($event['event_guitar'] == 'guitar'){
              echo 'guitarist, ';
            }
            if($event['event_bass'] == 'bass'){
              echo 'bassist, ';
            }
            if($event['event_drum'] == 'drum'){
              echo 'drummer, ';
            }
            if($event['event_piano'] == 'piano'){
              echo 'pianist, ';
            }
            if($event['event_vocals'] == 'vocals'){
              echo 'singer, ';
            }
            if($event['event_sax'] == 'sax'){
              echo 'saxophonist';
            }
          
            ?>
            </span> </p>
            <p>to play <span><?php echo $event['genre']; ?></span></p>
          </div>
        </a>
        <?php endforeach; ?>       
      </div>
    </div>
  </section>
</div>
