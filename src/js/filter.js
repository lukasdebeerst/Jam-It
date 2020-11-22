{
    const $error = document.querySelector(`.event__error`);
    const $container = document.querySelector(`.event__grid`);

    const init = () => {
        console.log('test js forms');
        document.documentElement.classList.add('has-js');
        $filterName = document.querySelector('.filter__name');
        $filterGenre = document.querySelector('.filter__genre');
        $filterDate = document.querySelector('.filter__date');
        if(document.body.contains($filterName)){
            $filterName.addEventListener('input', handleInputSearch);
            $filterGenre.addEventListener('input', handleInputSearch);
            $filterDate.addEventListener('input', handleInputSearch);
        } 
    }

    const handleInputSearch = async () => {
        const name = document.querySelector(`.filter__name`).value;
        const genre = document.querySelector(`.filter__genre`).value;
        if(name.length >= 0 || genre != null || date != null){
            const filterForm = document.querySelector('.filter__form');
            const data = new FormData(filterForm);
            const entries = [...data.entries()];
            const qs = new URLSearchParams(entries).toString();
            const url = `${filterForm.getAttribute('action')}?${qs}`;
            console.log(url);
            const response = await fetch(url, {
                headers: new Headers({
                  Accept: 'application/json'
                })
            });
            const events = await response.json();
            console.log(events);
            if(events.length < 1){
                $container.innerHTML = "";

                if($error.innerHTML != ""){
                    $error.innerHTML = "";
                }
                
                $error.textContent = "Sorry, Er zijn geen jams gevonden.";
                
            } else{
                showResults(events);
            }
        }

        window.history.pushState(
            {},
            '',
            `${window.location.href.split('?')[0]}?search=${name}`
        );        
    }


    const showResults = results => {
        if($error.innerHTML != ""){
            $error.innerHTML = "";
        }

        if($container.innerHTML != ""){
            $container.innerHTML = "";
        }


        console.log(results);

        $container.innerHTML = results.map(result => {
            return `
            <a href="index.php?page=detail&id=${result.id}" title="${result.name}" class="grid-item">
            <div class="grid-item-content">
            <h3 class="item-title">${result.name}</h3>
            <p>Organised by <span>${result.per_name}</span></p>
            <p>on <span>${result.date}</span> in <span>${result.location}</span> </p>

            <p>to play <span>${result.genre}</span></p>
            </div>
            </a>`
        })
        .join(' ');
    };

    init();

}