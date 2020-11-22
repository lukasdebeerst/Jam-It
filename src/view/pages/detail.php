
<h3 class="detail__title"><?php echo $event['name'] ?></h3>
<article class="detail__part">
    <header class="detail__header">
        <h4 class="h2-like">General</h4>
        <a class="edit__button" href="index.php?page=create&id=<?php echo $event['id'] ?>&edit=createJam">Edit</a>
    </header>
    <dl class="detail__info">
        <dt class="info__title">Genre</dt>
        <dd class="info__text"><?php echo $event['genre'] ?></dd>
        <dt class="info__title">Level</dt>
        <dd class="info__text"><?php echo $event['level'] ?></dd>
        <dt class="info__title">Age</dt>
        <dd class="info__text"><?php echo $event['age'] ?></dd>
    </dl>
</article>
<article class="detail__part">
    <header class="detail__header">
        <h4 class="h2-like">Instruments</h4>
        <a class="edit__button" href="index.php?page=create&id=<?php echo $event['id'] ?>&edit=instr">Edit</a>
    </header>
        <ul class="detail__instr"><?php
            if($event['event_guitar'] == 'guitar'){
                echo '<li class="detail__instr--guitar"> Guitar </li>';
            }
            if($event['event_bass'] == 'bass'){
                echo '<li class="detail__instr--bass"> Bass </li>';
            }   
            if($event['event_drum'] == 'drum'){
                echo '<li class="detail__instr--drum"> Drum </li>';
            }
            if($event['event_piano'] == 'piano'){
                echo '<li class="detail__instr--piano"> Piano </li>';
            }
            if($event['event_vocals'] == 'vocals'){
                echo '<li class="detail__instr--vocals"> vocals </li>';
            }
            if($event['event_sax'] == 'sax'){
                echo '<li class="detail__instr--sax"> Saxophone </li>';
            }
            ?>
        </ul> 
</article>
<article class="detail__part">
    <header class="detail__header">
        <h4 class="h2-like">Location and time</h4>
        <a class="edit__button" href="index.php?page=create&id=<?php echo $event['id'] ?>&edit=location">Edit</a>
    </header>
    <div class="detail__loc">
        <div class="mapouter"><div class="gmap_canvas">
            
        <iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo $event['location'] ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.divi-discounts.com">informationen und die demo</a></div></div>
        <div class="loc__detail">

            <dl class="detail__info">
                <dt class="info__title">Location</dt>
                <dd class="info__text"><?php echo $event['location']; ?></dd>
                <dd class="info__text"><?php echo $event['location_cat']; ?></dd>
                <dd class="info__text"><?php echo $event['distance'] ?> kilometer</dd>
                <dt class="info__title">Time</dt>
                <dd class="info__text"><?php echo $event['date'];?></dd>
                <dd class="info__text"><?php echo $event['time_start'] . '-' . $event['time_end'];?></dd>
            </dl>


        </div>

    </div>

</article>
<article class="detail__part">
    <header class="detail__header">
        <h4 class="h2-like">Supplies</h4>
        <a class="edit__button" href="index.php?page=create&id=<?php echo $event['id'] ?>&edit=sup">Edit</a>
    </header>
        <ul class="detail__instr"><?php 
        if($event['soundsys'] == 'soundsys'){
            echo '<li class="detail__sup--soundsys"> Soundsystem </li>'; 
        }
        if($event['drum'] == 'drum'){
            echo '<li class="detail__sup--drum"> Drum </li>';
        }
        if($event['g_amp'] == 'g_amp'){
            echo '<li class="detail__sup--guitar-amp"> Guitar Amp </li>';
        }
        if($event['b_amp'] == 'b_amp'){
            echo '<li class="detail__sup--bass-amp"> Bass Amp </li>';
        }
        if($event['keyboard'] == 'keyboard'){
            echo '<li class="detail__sup--key"> Keyboard </li>';
        }
        if($event['snacks'] == 'snacks'){
            echo '<li class="detail__sup--snacks"> Snacks and Drinks </li>';
        }
        ?></ul>
</article>
<article class="detail__part">
    <header class="detail__header">
        <h4 class="h2-like">About The creator</h4>
        <a class="edit__button" href="index.php?page=create&id=<?php echo $event['id'] ?>&edit=hello">Edit</a>
    </header>    
        <dl class="detail__instr">
            <dt>Name</dt>
            <dd class="detail__per--name"><?php echo $event['per_name']; ?></dd>
            <dt>Age</dt>
            <dd class="detail__per--age"><?php echo $event['per_age']; ?></dd>
            <dt>Gender</dt>
            <dd class="form__input--gender--<?php echo $event['per_gender']; ?>"><?php echo $event['per_gender'] ?></dd>
            <dt>Instrument</dt>
            <dd class="detail__instr--<?php echo strtolower($event['per_instr']); ?>"><?php echo $event['per_instr']; ?></dd>
        </dl>
</article>
<article class="detail__part">
    <h4 class="h2-like">Delete</h4>
    <p class="delete__text">Are you sure you want to delete the event?</p>
    <a class="edit__button" href="index.php?action=delete&id=<?php echo $event['id'] ?>">Delete</a>
</article>
