<span><?php if(!empty($errors)){if(!empty($errors['main'])){ echo $errors['main'];}}?></span>

<section>
    <h2 class="hidden">Status of form</h2>
    <ul class="form__status">
        <li class="form__status--default form__status--hello">Hello There</li> 
        <li class="form__status--default form__status--createJam">Creating The jam</li>
        <li class="form__status--default form__status--instr">Choosing instruments</li>
        <li class="form__status--default form__status--where">Where is the jam</li>
        <li class="form__status--default form__status--when">When is the jam</li>
        <li class="form__status--default form__status--supplies">Supplies</li>
    </ul>
    <span class='error'><?php if(!empty($_SESSION)){if($_SESSION['createError']){ echo $_SESSION['createError'] ;}} ?></span>
</section>

<form id="form" action="index.php?page=create" method="POST" class="create__form form__validate">
<?php if(!empty($_GET['id'])): ?>
    <input type="hidden" name="action" value="editJam">
    <input type="hidden" name="id" value="<?php echo $event['id']; ?>">
    <span class="hidden form__edit"></span>
    <?php else: ?>
    <input type="hidden" name="action" value="createJam">
    <span class="hidden form__create"></span>
    <?php endif; ?>

  <fieldset class="tab form__hello">
  <legend class="h2-like">Hello There</legend>
          <span class="error__hello"></span>
        <div class="form__part ">
            <label class="form__part--name form__label">What is your full name? 
                <span class="error"><?php if(!empty($errors)){if(!empty($errors['per_name'])){ echo $errors['per_name'];}}?></span>
                <input class="form__input input input__per-name" type="text" maxlenght="255" name="per_name" value="<?php if(!empty($event)){ echo $event['per_name'];}?>" required>
            </label> 
        </div>
        <div class="form__part form__part--icons">
            <label class="form__label">What is your gender?</label>
            <span><?php if(!empty($errors)){if(!empty($errors['per_gender'])){ echo $errors['per_gender'];}}?></span>
            <ul class="form__list--icons">
                <li>
                    <input class="form__input--icon  form__input--gender--female" type="radio" name="per_gender" value="female" <?php if(!empty($event)){ if($event['per_gender'] == 'female'){ echo ' checked';}} ?>>
                    <label for="per_gender">Female</label>
                </li>
                <li>
                    <input class="form__input--icon  form__input--gender--intersex" type="radio" name="per_gender" value="intersex" <?php if(!empty($event)){ if($event['per_gender'] == 'intersex'){ echo ' checked';}} ?>>
                    <label for="per_gender">Intersex</label>
                </li>
                <li>
                    <input class="form__input--icon form__input--gender--male" type="radio" name="per_gender" value="male" <?php if(!empty($event)){ if($event['per_gender'] == 'male'){ echo ' checked';}} ?>>
                    <label for="per_gender">Male</label>
                </li>
            </ul>            
        </div>
        <div class="form__part form__part--per_age">
            <label class="form__label">How old are you?</label>
            <span class="error"><?php if(!empty($errors)){if(!empty($errors['per_age'])){ echo $errors['per_age'];}}?></span>
            <ul class="form__list--per_age">
                <li>
                    <input id="16-18" class="input form__input--per_age input__per-age--16" type="radio" name="per_age" value="16-18" <?php if(!empty($event)){ if($event['per_age'] == '16-18' ){ echo ' checked';}} ?>>
                    <label for="16-18">16-18</label>
                </li>
                <li>
                    <input id="19-25" class="input form__input--per_age input__per-age--19" type="radio" name="per_age" value="19-25" <?php if(!empty($event)){ if($event['per_age'] == '19-25' ){ echo ' checked';}} ?> >
                    <label for="19-25">19-25</label>
                </li>
                <li>
                    <input id="25-30" class="input form__input--per_age input__per-age--25" type="radio" name="per_age" value="25-30" <?php if(!empty($event)){ if($event['per_age'] == '25-30' ){ echo ' checked';}} ?> >
                    <label for="25-30">25-30</label>
                </li>
                <li>
                    <input id="30-40" class="input__age form__input--per_age input__per-age--30" type="radio" name="per_age" value="30-40" <?php if(!empty($event)){ if($event['per_age'] == '30-40' ){ echo ' checked';}} ?> >
                    <label for="30-40">30-40</label>
                </li>
                <li>
                    <input id="40-60" class="input form__input--per_age input__per-age--40" type="radio" name="per_age" value="40-60" <?php if(!empty($event)){ if($event['per_age'] == '40-60' ){ echo ' checked';}} ?> >
                    <label for="40-60">40-60</label>
                </li>
                <li>
                    <input id="60" class="input form__input--per_age input__per-age--60" type="radio" name="per_age" value="60+" <?php if(!empty($event)){ if($event['per_age'] == '60+' ){ echo ' checked';}} ?> >
        <!-- <p class="form-intro">First we will need some personal infromation from you.</p> -->
  </fieldset>
  <fieldset class="tab form__createJam">
  <legend class="h2-like">Creating The Jam</legend>
  <span class="error__createJam"></span>
        <div class="form__part">
            <label class="form__label form__part--name">What is the name of the jam?
                <span class="error"><?php if(!empty($errors)){if(!empty($errors['name'])){ echo $errors['name'];}}?></span> 
                <input class="input form__input form__input--name" type="text" maxlength="100" name="name" required value="<?php if(!empty($event)){ echo $event['name'];}?>">
            </label>
        </div>
        <div class="form__part form__part--icons">
            <label class="form__label">Which genre will you play?</label>
            <span class="error"><?php if(!empty($errors)){if(!empty($errors['genre'])){ echo $errors['genre'];}}?></span>
            <ul class="form__list--icons">
                <li>
                    <input class="form__input--icon form__input--genre--blues" type="radio" name="genre" value="blues" <?php if(!empty($event)){ if($event['genre'] == 'blues'){ echo ' checked';}} ?>>
                    <label for="genre">Blues</label>
                </li>
                <li>
                    <input class="form__input--icon form__input--genre--rock" type="radio" name="genre" value="rock" <?php if(!empty($event)){ if($event['genre'] == 'rock'){ echo ' checked';}} ?>>
                    <label for="genre">Rock</label>
                </li>
                <li>
                    <input class="orm__input--icon form__input--genre--jazz" type="radio" name="genre" value="jazz" <?php if(!empty($event)){ if($event['genre'] == 'jazz'){ echo ' checked';}} ?>>
                    <label for="genre">Jazz</label>
                </li>
                <li>
                    <input class="form__input--icon form__input--genre--classical" type="radio" name="genre" value="classical" <?php if(!empty($event)){ if($event['genre'] == 'classical'){ echo ' checked';}} ?>>
                    <label for="genre">Classical</label>
                </li>
                <li>
                    <input class="form__input--icon form__input--genre--reggae" type="radio" name="genre" value="reggae" <?php if(!empty($event)){ if($event['genre'] == 'reggae'){ echo ' checked';}} ?>>
                    <label for="genre">Reggae</label>
                </li>
                <li>
                    <input class="form__input--icon form__input--genre--folk" type="radio" name="genre" value="folk" <?php if(!empty($event)){ if($event['genre'] == 'folk'){ echo ' checked';}} ?>>
                    <label for="genre">Folk</label>
                </li>
            </ul>            
        </div>
        <div class="form__part form__part--level">
        <label class="form__label"> What is the level of the jam?</label>
        <span class="error"><?php if(!empty($errors)){if(!empty($errors['level'])){ echo $errors['level'];}}?></span>
            <div class="form--level">
                <label for="level">Beginner</label>
                <input class="input form__input form__input--level form__input--level--beginner" type="radio" name="level" value="beginner" <?php if(!empty($event)){ if($event['level'] == 'beginner'){ echo ' checked';}} ?>> 
                <label for="level">Middle</label>
                <input class="input form__input form__input--level form__input--level--middle" type="radio" name="level" value="middle" <?php if(!empty($event)){ if($event['level'] == 'middle'){ echo ' checked';}} ?>>
                <label for="level">Experienced</label>
                <input class="input form__input form__input--level form__input--level--experienced" type="radio" name="level" value="experienced" <?php if(!empty($event)){ if($event['level'] == 'experienced'){ echo ' checked';}} ?>>
                <label for="level">Expert</label>
                <input class="input form__input form__input--level form__input--level--expert" type="radio" name="level" value="expert" <?php if(!empty($event)){ if($event['level'] == 'expert'){ echo ' checked';}} ?>>
            </div>
        </div>
        <div class="form__label form__label--age">What is the age? 
            <span class="error"><?php if(!empty($errors)){if(!empty($errors['age'])){ echo $errors['age'];}}?></span>
            <ul class="form__list--age">
                <li>
                    <input id="16-18" class="input form__input--age form__input--age--16" type="radio" name="age" value="16-18" <?php if(!empty($event)){ if($event['age'] == '16-18' ){ echo ' checked';}} ?> required >
                    <label for="16-18">16-18</label>
                </li>
                <li>
                    <input id="19-25" class="input form__input--age form__input--age--19" type="radio" name="age" value="19-25" <?php if(!empty($event)){ if($event['age'] == '19-25' ){ echo ' checked';}} ?> >
                    <label for="19-25">19-25</label>
                </li>
                <li>
                    <input id="25-30" class="input form__input--age form__input--age--25" type="radio" name="age" value="25-30" <?php if(!empty($event)){ if($event['age'] == '25-30' ){ echo ' checked';}} ?> >
                    <label for="25-30">25-30</label>
                </li>
                <li>
                    <input id="30-40" class="input form__input--age form__input--age--30" type="radio" name="age" value="30-40" <?php if(!empty($event)){ if($event['age'] == '30-40' ){ echo ' checked';}} ?> >
                    <label for="30-40">30-40</label>
                </li>
                <li>
                    <input id="40-60" class="input form__input--age form__input--age--40" type="radio" name="age" value="40-60" <?php if(!empty($event)){ if($event['age'] == '40-60' ){ echo ' checked';}} ?> >
                    <label for="40-60">40-60</label>
                </li>
                <li>
                    <input id="60" class="input form__input--age form__input--age--60" type="radio" name="age" value="60+" <?php if(!empty($event)){ if($event['age'] == '60+' ){ echo ' checked';}} ?> >
                    <label for="60">60+</label>
                </li>
            </ul>            
        </div>
    </fieldset>

    <fieldset class="tab form__instr">
        <legend class="h2-like">Choosing Instruments</legend>
        <span class="error__instr"></span>
        <div class="form__part form__part--icons form__part--instr">
            <label class="form__label">Which instrument do you want to play? <span>(pick one)</span></label>
            <span class="error"><?php if(!empty($errors)){if(!empty($errors['per_instr'])){ echo $errors['per_instr'];}}?></span>
            <ul class="form__list--icons">
                <li>
                    <input class="form__input--icon form__input--instr--guitar input__per-instr--guitar" type="radio" name="per_instr" value="Guitar" <?php if(!empty($event)){ if($event['per_instr'] == 'guitar' ){ echo ' checked';}} ?> required>
                    <label for="per_instr">Guitar</label>
                </li>
                <li>
                    <input class="form__input--icon form__input--instr--bass input__per-instr--bass" type="radio" name="per_instr" value="Bass" <?php if(!empty($event)){ if($event['per_instr'] == 'Bass' ){ echo ' checked';}} ?>>
                    <label for="per_instr">Bass</label>
                </li>
                <li>
                    <input class="form__input--icon form__input--instr--drum input__per-instr--drum" type="radio" name="per_instr" value="Drum" <?php if(!empty($event)){ if($event['per_instr'] == 'Drum' ){ echo ' checked';}} ?>>
                    <label for="per_instr">Drum</label>
                </li>
                <li>
                    <input class="form__input--icon form__input--instr--piano input__per-instr--piano" type="radio" name="per_instr" value="Piano" <?php if(!empty($event)){ if($event['per_instr'] == 'Piano' ){ echo ' checked';}} ?>>
                    <label for="per_instr">Piano</label>
                </li>
                <li>
                    <input class="form__input--icon form__input--instr--vocals input__per-instr--vocals" type="radio" name="per_instr" value="Vocals" <?php if(!empty($event)){ if($event['per_instr'] == 'Vocals' ){ echo ' checked';}} ?>>
                    <label for="per_instr">Vocals</label>
                </li>
                <li>
                    <input class="form__input--icon form__input--instr--saxophone input__per-instr--sax" type="radio" name="per_instr" value="Saxophone" <?php if(!empty($event)){ if($event['per_instr'] == 'Saxophone' ){ echo ' checked';}} ?>>
                    <label for="per_instr">Saxophone</label>
                </li>
            </ul>            
        </div>

        <div class="form__part form__part--icons form__part--instr">
            <label class="form__label">Which instruments are you still looking for?</label>
            <span class="error"><?php if(!empty($errors)){if(!empty($errors['event_instr'])){ echo $errors['event_instr'];}}?></span>
            <ul class="form__list--icons">
                <li>
                    <input class="form__input--icon form__input--instr--guitar input__instr--guitar" type="checkbox" name="event_guitar" value="guitar" <?php if(!empty($event)){ if($event['event_guitar'] == 'guitar' ){ echo ' checked';}} ?>>
                    <label for="event_instr">Guitar</label>
                </li>
                <li>
                    <input class="form__input--icon form__input--instr--bass input__instr--bass" type="checkbox" name="event_bass" value="bass" <?php if(!empty($event)){ if($event['event_bass'] == 'bass' ){ echo ' checked';}} ?>>
                    <label for="event_instr">Bass</label>
                </li>
                <li>
                    <input class="form__input--icon form__input--instr--drum input__instr--drum" type="checkbox" name="event_drum" value="drum" <?php if(!empty($event)){ if($event['event_drum'] == 'drum' ){ echo ' checked';}} ?>>
                    <label for="event_instr">Drum</label>
                </li>
                <li>
                    <input class="form__input--icon form__input--instr--piano input__instr--piano" type="checkbox" name="event_piano" value="piano" <?php if(!empty($event)){ if($event['event_piano'] == 'piano' ){ echo ' checked';}} ?>>
                    <label for="event_instr">Piano</label>
                </li>
                <li>
                    <input class="form__input--icon form__input--instr--vocals input__instr--vocals" type="checkbox" name="event_vocals" value="vocals" <?php if(!empty($event)){ if($event['event_vocals'] == 'vocals' ){ echo ' checked';}} ?>>
                    <label for="event_instr">Vocals</label>
                </li>
                <li>
                    <input class="form__input--icon form__input--instr--saxophone input__instr--sax" type="checkbox" name="event_sax" value="sax" <?php if(!empty($event)){ if($event['event_sax'] == 'sax' ){ echo ' checked';}} ?>>
                    <label for="event_instr">Saxophone</label>
                </li>
            </ul>            
        </div>
    </fieldset>
    <fieldset class="tab form__where">
        <legend class="h2-like">Where is the jam?</legend>
        <span class="error__where"></span>
        <div class="form__part form__part--name">
            <label class="form__label">Where is the jam? </label>
            <span class="error"><?php if(!empty($errors)){if(!empty($errors['location'])){ echo $errors['location'];}}?></span>
            <input class="input form__input input__location" type="text" name="location" value="<?php if(!empty($event)){ echo $event['location'];}?>" required>
        </div>
        <div class="form__part form__part--icons form__part--loc">
            <label class="form__label">Which kind of building is this?</label>
            <span class="error"><?php if(!empty($errors)){if(!empty($errors['location_cat'])){ echo $errors['location_cat'];}}?></span>
            <ul class="form__list--icons">
                <li>
                    <input class="input form__input--box form__input--cat_rehearsel location_cat--rehearsel" class="form__input" type="radio" name="location_cat" value="rehearsel" <?php if(!empty($event)){ if($event['location_cat'] == 'rehearsel' ){ echo ' checked';}} ?> required>
                    <label for="location_cat">Studio</label>
                </li>
                <li>
                    <input class="input form__input--box form__input--cat_pub location_cat--pub" class="form__input" type="radio" name="location_cat" value="pub" <?php if(!empty($event)){ if($event['location_cat'] == 'pub' ){ echo ' checked';}} ?>>
                    <label for="location_cat ">Pub</label>
                </li>
                <li>
                    <input class="input form__input--box form__input--cat_public location_cat--public" class="form__input" type="radio" name="location_cat" value="public" <?php if(!empty($event)){ if($event['location_cat'] == 'public' ){ echo ' checked';}} ?>>
                    <label for="location_cat ">Public place</label>
                </li>
                <li>
                    <input class="input form__input--box form__input--cat_private location_cat--private" class="form__input" type="radio" name="location_cat" value="private" <?php if(!empty($event)){ if($event['location_cat'] == 'private' ){ echo ' checked';}} ?>>
                    <label for="location_cat ">Private place</label>
                </li>
            </ul>            
        </div>
        
        <label class="form__label"> Maximum distance?
            <span class="error"><?php if(!empty($errors)){if(!empty($errors['distance'])){ echo $errors['distance'];}}?></span>
            <div class="form__distance">
                <input class="input form__input form__input--distance" type="range" name="distance" id="distanceID" min="5" max="50" step="5" oninput="distance__output.value = distanceID.value" value="<?php if(!empty($event)){ echo $event['distance'];}?>" required>
                <output id="distance__output">30</output><span> kilometer</span>
            </div>
        </label>
    </fieldset>
    <fieldset class="tab form__when">
        <legend class="h2-like">When is the jam?</legend>
        <span class="error__when"></span>
        <label class="form__label label__date">What is the date?
            <span class="error"><?php if(!empty($errors)){if(!empty($errors['date'])){ echo $errors['date'];}}?></span>
            <input class="input form__input form__input--date" type="date" name="date" value="<?php if(!empty($event)){ echo $event['date'];}?>" required>
        </label>
        <div class="form__time">
            <label class="form__label label__time"> When does it start?
                <span class="error"><?php if(!empty($errors)){if(!empty($errors['time_start'])){ echo $errors['time_start'];}}?></span>
                <input class="input form__input form__input--start" type="time" name="time_start" value="<?php if(!empty($event)){ echo $event['time_start'];}?>" required>
            </label>
            <label class="form__label label__time"> When does it end?
                <span class="error"><?php if(!empty($errors)){if(!empty($errors['time_end'])){ echo $errors['time_end'];}}?></span>
                <input class="input form__input form__input--end" type="time" name="time_end" value="<?php if(!empty($event)){ echo $event['time_end'];}?>" required>
            </label>
        </div>
    </fieldset>

    <fieldset class="tab form__supplies">
        <legend class="h2-like">Supplies</legend>
        <div class="form__part form__part--icons form__part--instr">
            <label class="form__label">What can we find at the location?</label>
            <ul class="form__list--icons">
                <li>
                    <input class="form__input--icon form__input--sup--soundsys input__sup--soundsys" type="checkbox" name="soundsys" value="soundsys" <?php if(!empty($event)){ if($event['soundsys'] == 'soundsys' ){ echo ' checked';}} ?>>
                    <label for="soundsys">Soundsystem</label>
                </li>
                <li>
                    <input class="form__input--icon form__input--instr--drum input__instr--drum" type="checkbox" name="drum" value="drum" <?php if(!empty($event)){ if($event['drum'] == 'drum' ){ echo ' checked';}} ?>>
                    <label for="drum">A Drum</label>
                </li>
                <li>
                    <input class="form__input--icon form__input--sup--g_amp input__sup--g_amp" type="checkbox" name="g_amp" value="g_amp" <?php if(!empty($event)){ if($event['g_amp'] == 'g_amp' ){ echo ' checked';}} ?>>
                    <label for="g_amp">Guitar Amp</label>
                </li>
                <li>
                    <input class="form__input--icon form__input--sup--b_amp input--sup--b_amp" type="checkbox" name="b_amp" value="b_amp" <?php if(!empty($event)){ if($event['b_amp'] == 'b_amp' ){ echo ' checked';}} ?>>
                    <label for="b_amp">Bass Amp</label>
                </li>
                <li>
                    <input class="form__input--icon form__input--sup--key input--sup--key" type="checkbox" name="keyboard" value="keyboard" <?php if(!empty($event)){ if($event['keyboard'] == 'keyboard' ){ echo ' checked';}} ?>>
                    <label for="keyboard">Keyboard</label>
                </li>
                <li>
                    <input class="form__input--icon form__input--cat_pub input__sup--snacks" type="checkbox" name="snacks" value="snacks" <?php if(!empty($event)){ if($event['snacks'] == 'snacks' ){ echo ' checked';}} ?>>
                    <label for="snacks">Snacks</label>
                </li>
            </ul>            
        </div>
        <div class="form__part form__part--extra">
            <label class="form__label">Do you want to add something?</label>
            <textarea class="input__extra" name="extra" cols="30" rows="10"><?php if(!empty($event)){ echo $event['extra'];}?></textarea>
        </div>

    </fieldset>
    <input class="form__submit form__submit--edit" type="submit" value="<?php
    if(!empty($_GET['id'])){
        echo 'Evenement aanpassen';
    } else{
        echo 'Evenement aanmaken';
    }
    ?>">
</form>
