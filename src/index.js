require('./style.css');
require('./js/filter.js');
require('./js/validate.js');

{

  $create = document.querySelector(`.create__button`);
  $form = document.querySelector(`.create__form`);
  $formHello = document.querySelector(`.form__hello`);
  $formCreateJam = document.querySelector(`.form__createJam`);
  $formInstr = document.querySelector(`.form__instr`);
  $formWhere = document.querySelector(`.form__where`);
  $formWhen = document.querySelector(`.form__when`);
  $formSupplies = document.querySelector(`.form__supplies`);

  const init = () => {
    console.log(`index.js`);
    $formEdit = document.querySelector(`.form__edit`);
    $formCreate = document.querySelector(`.form__create`);
    if(document.body.contains($formEdit)){
      editForm();
    } else if(document.body.contains($formCreate)){
      createForm();
    }
  };

  const createForm = () => {
    console.log(`createForm`);

    $tabBtn = document.createElement(`div`);
    $tabBtn.classList.add(`form__tab__button`);
    $form.appendChild($tabBtn);

    //knop naar vorig form
    $back = document.createElement(`p`);
    $back.innerText = 'Other events';
    $back.classList.add(`form__back`);
    $tabBtn.appendChild($back);

    //knop naar volgende form
    $next = document.createElement(`p`);
    $next.classList.add(`form__next`);
    $tabBtn.appendChild($next);

    //submit button laten verdwijnen
    $formSubmit = document.querySelector(`.form__submit`);
    $formSubmit.disabled = true;
    $formSubmit.style.display = 'none';
    $tabBtn.appendChild($formSubmit);

    formHello();
  }

  const formHello = () => {
    console.log(`formHello`);
    $formHello.style.display = 'block';
    $formCreateJam.style.display = 'none';
    $formInstr.style.display = 'none';
    $formWhere.style.display = 'none';
    $formWhen.style.display = 'none';
    $formSupplies.style.display = 'none';

    document.querySelector(`.form__status--hello`).classList.add('form__check');

    $next.innerText = 'create Jam';
    $next.onclick = formHelloValidate;
    $back.style.display = 'none';
  }

  const formHelloValidate = () => {
    console.log(`validate`);
    const $perName = document.querySelector(`.input__per-name`);
    const $perGenderFemale = document.querySelector(`.form__input--gender--female`);
    const $perGenderIntersex = document.querySelector(`.form__input--gender--intersex`);
    const $perGendermale = document.querySelector(`.form__input--gender--male`);
    const $perAge16 = document.querySelector(`.input__per-age--16`);
    const $perAge19 = document.querySelector(`.input__per-age--19`);
    const $perAge25 = document.querySelector(`.input__per-age--25`);
    const $perAge30 = document.querySelector(`.input__per-age--30`);
    const $perAge40 = document.querySelector(`.input__per-age--40`);
    const $perAge60 = document.querySelector(`.input__per-age--60`);
    const $error = document.querySelector(`.error__hello`);

    $error.innerText = "";

    if(!$perName.validity.valueMissing){
      console.log(`naam ok`);
      if($perGenderFemale.checked || $perGenderIntersex.checked || $perGendermale.checked){
        console.log(`gender ok`);
        if($perAge16.checked || $perAge19.checked || $perAge25.checked || $perAge30.checked || $perAge40.checked || $perAge60.checked){
          console.log(`Alles is ok`);
          formCreateJam();
        } else {
          $error.innerText = "Gelieve alles in te vullen";
        }
      } else {
        $error.innerText = "Gelieve alles in te vullen";
      }
    } else {
      $error.innerText = "Gelieve alles in te vullen";
    }

  }

  const formCreateJam = () => {
    console.log(`formCreateJam`);
    $formHello.style.display = 'none';
    $formCreateJam.style.display = 'block';
    $formInstr.style.display = 'none';
    $formWhere.style.display = 'none';
    $formWhen.style.display = 'none';
    $formSupplies.style.display = 'none';

    document.querySelector(`.form__status--createJam`).classList.add('form__check');

    $next.innerText = 'Choosing Instruments';
    $next.onclick = formCreateJamValidate;
    $back.style.display = 'block';
    $back.innerText = 'Edit personal information';
    $back.onclick = formHello;
  }


  const formCreateJamValidate = () => {
    const $name = document.querySelector(`.form__input--name`);
    const $genreBlues = document.querySelector(`.form__input--genre--blues`);
    const $genreRock = document.querySelector(`.form__input--genre--rock`);
    const $genreJazz = document.querySelector(`.form__input--genre--jazz`);
    const $genreClas = document.querySelector(`.form__input--genre--classical`);
    const $genreReggae = document.querySelector(`.form__input--genre--reggae`);
    const $genreFolk = document.querySelector(`.form__input--genre--folk`);
    const $levelBeginner = document.querySelector(`.form__input--level--beginner`);
    const $levelMiddle = document.querySelector(`.form__input--level--middle`);
    const $levelExperienced = document.querySelector(`.form__input--level--experienced`);
    const $levelExpert = document.querySelector(`.form__input--level--expert`);
    const $Age16 = document.querySelector(`.form__input--age--16`);
    const $Age19 = document.querySelector(`.form__input--age--19`);
    const $Age25 = document.querySelector(`.form__input--age--25`);
    const $Age30 = document.querySelector(`.form__input--age--30`);
    const $Age40 = document.querySelector(`.form__input--age--40`);
    const $Age60 = document.querySelector(`.form__input--age--60`);
    const $error = document.querySelector(`.error__createJam`)

    if(!$name.validity.valueMissing){
      if($genreBlues.checked || $genreRock.checked || $genreJazz.checked || $genreClas.checked || $genreReggae.checked || $genreFolk.checked){
        if($levelBeginner.checked || $levelMiddle.checked || $levelExperienced.checked || $levelExpert.checked){
          if($Age16.checked || $Age19.checked || $Age25.checked || $Age30.checked || $Age40.checked || $Age60.checked){
            formInstr();
          } else {
            $error.innerText = "Gelieve alles in te vullen";
          }
        }else {
          $error.innerText = "Gelieve alles in te vullen";
        }
      }else {
        $error.innerText = "Gelieve alles in te vullen";
      }
    }else {
      $error.innerText = "Gelieve alles in te vullen";
    }
  }
  

  const formInstr = () => {
    console.log(`formInstr`);
    $formHello.style.display = 'none';
    $formCreateJam.style.display = 'none';
    $formInstr.style.display = 'block';
    $formWhere.style.display = 'none';
    $formWhen.style.display = 'none';
    $formSupplies.style.display = 'none';

    document.querySelector(`.form__status--instr`).classList.add('form__check');

    $next.innerText = 'Where is it?';
    $next.onclick = formInstrValidate;
    $back.innerText = 'Creating Jam';
    $back.onclick = formCreateJam;
  }

  const formInstrValidate = () => {
    const $perGuitar = document.querySelector(`.input__per-instr--guitar`);
    const $perBass = document.querySelector(`.input__per-instr--bass`);
    const $perDrum = document.querySelector(`.input__per-instr--drum`);
    const $perPiano = document.querySelector(`.input__per-instr--piano`);
    const $perVocals = document.querySelector(`.input__per-instr--vocals`);
    const $perSax = document.querySelector(`.input__per-instr--sax`);
    const $guitar = document.querySelector(`.input__instr--guitar`);
    const $bass = document.querySelector(`.input__instr--bass`);
    const $drum = document.querySelector(`.input__instr--drum`);
    const $piano = document.querySelector(`.input__instr--piano`);
    const $vocals = document.querySelector(`.input__instr--vocals`);
    const $sax = document.querySelector(`.input__instr--sax`);
    const $error = document.querySelector(`.error__instr`);

    if($perGuitar.checked || $perBass.checked || $perDrum.checked || $perPiano.checked || $perVocals.checked || $perSax.checked){
      if($guitar.checked || $bass.checked || $drum.checked || $piano.checked || $vocals.checked || $sax.checked){
        formWhere();
      }else {
        $error.innerText = "Gelieve alles in te vullen";
      }
    }else {
      $error.innerText = "Gelieve alles in te vullen";
    }


  }


  const formWhere = () => {
    console.log(`formWhere`);

    $formHello.style.display = 'none';
    $formCreateJam.style.display = 'none';
    $formInstr.style.display = 'none';
    $formWhere.style.display = 'block';
    $formWhen.style.display = 'none';
    $formSupplies.style.display = 'none';

    document.querySelector(`.form__status--where`).classList.add('form__check');

    $next.innerText = 'When is it?';
    $next.onclick = formWhereValidate;
    $back.innerText = 'Choosing Instruments';
    $back.onclick = formInstr;
  } 

  const formWhereValidate = () => {
    const $location = document.querySelector(`.input__location`);
    const $rehearsel = document.querySelector(`.location_cat--rehearsel`);
    const $pub = document.querySelector(`.location_cat--pub`);
    const $public = document.querySelector(`.location_cat--public`);
    const $private = document.querySelector(`.location_cat--private`);
    const $error = document.querySelector(`.error__where`);

    if(!$location.validity.valueMissing){
      if($rehearsel.checked || $pub.checked || $public.checked || $private.checked){
        formWhen();
      }else {
        $error.innerText = "Gelieve alles in te vullen";
      }
    }else {
      $error.innerText = "Gelieve alles in te vullen";
    }
  }

  const formWhen = () => {
    $formHello.style.display = 'none';
    $formCreateJam.style.display = 'none';
    $formInstr.style.display = 'none';
    $formWhere.style.display = 'none';
    $formWhen.style.display = 'block';
    $formSupplies.style.display = 'none';

    document.querySelector(`.form__status--when`).classList.add('form__check');

    $next.style.display= 'block';
    $next.innerText = 'Supplies';
    $next.onclick = formWhenValidate;
    $back.innerText = 'Where is it?';
    $back.onclick = formWhere;
    $formSubmit.disabled = true;
    $formSubmit.style.display = 'none';
  } 

  const formWhenValidate = () => {
    const $date = document.querySelector(`.form__input--date`);
    const $start = document.querySelector(`.form__input--start`);
    const $end = document.querySelector(`.form__input--end`);
    const $error = document.querySelector(`.error__when`);

    if(!$date.validity.valueMissing){
      if(!$start.validity.valueMissing){
        if(!$end.validity.valueMissing){
          formSupplies();
        } else {
          console.log(`error`);
          $error.innerText = "Gelieve alles in te vullen";
        }
      } else {
        console.log(`error`);
        $error.innerText = "Gelieve alles in te vullen";
      }
    } else {
      console.log(`error`);
      $error.innerText = "Gelieve alles in te vullen";
    }
  }

  const formSupplies = () => {
    $formHello.style.display = 'none';
    $formCreateJam.style.display = 'none';
    $formInstr.style.display = 'none';
    $formWhere.style.display = 'none';
    $formWhen.style.display = 'none';
    $formSupplies.style.display = 'block';

    document.querySelector(`.form__status--supplies`).classList.add('form__check');

    $next.style.display= 'none'; 
    $formSubmit.disabled = false;
    $formSubmit.style.display = 'block';
    $formSubmit.classList.remove('form__submit--edit')  
    $back.innerText = 'When is it?';
    $back.onclick = formWhen;   
  } 

  const editForm = () => {
    console.log(`editForm`);
    if(window.location.href.indexOf("createJam") > -1){
      console.log(`zit dit in de link?`);
      editCreateJam();
    } if(window.location.href.indexOf("instr") > -1){
      editInstr();
    } else if(window.location.href.indexOf("location") > -1){
      console.log('location');
      editLocationAndTime();
    } else if(window.location.href.indexOf("sup") > -1){
      console.log('editsupplies');
      editSupplies();
    } else if(window.location.href.indexOf("hello") > -1){
      editHello();
    }
  }

  const editCreateJam = () => {
    console.log(`editCreateJam`);
    $formCreateJam.style.display = 'block';
    $formHello.style.display = 'none';
    $formInstr.style.display = 'none';
    $formWhere.style.display = 'none';
    $formWhen.style.display = 'none';
    $formSupplies.style.display = 'none';
  }

  const editInstr = () => {
    console.log(`edit instrument`);
    $formCreateJam.style.display = 'none';
    $formHello.style.display = 'none';
    $formInstr.style.display = 'block';
    $formWhere.style.display = 'none';
    $formWhen.style.display = 'none';
    $formSupplies.style.display = 'none';
  }

  const editLocationAndTime = () => {
    $formCreateJam.style.display = 'none';
    $formHello.style.display = 'none';
    $formInstr.style.display = 'none';
    $formWhere.style.display = 'block';
    $formWhen.style.display = 'block';
    $formSupplies.style.display = 'none';
  }

  const editSupplies = () => {
    $formCreateJam.style.display = 'none';
    $formHello.style.display = 'none';
    $formInstr.style.display = 'none';
    $formWhere.style.display = 'none';
    $formWhen.style.display = 'none';
    $formSupplies.style.display = 'block';
  }

  const editHello = () => {
    $formCreateJam.style.display = 'none';
    $formHello.style.display = 'block';
    $formInstr.style.display = 'none';
    $formWhere.style.display = 'none';
    $formWhen.style.display = 'none';
    $formSupplies.style.display = 'none';
  }


  init();  

}