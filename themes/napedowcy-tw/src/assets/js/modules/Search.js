import $ from '../../../../node_modules/jquery';

class Search {
    constructor(){
        this.addSearchHTML();
        this.resultsDiv = $('#search__results');
        this.openButton = $('[data-openSearch]');
        this.closeButton = $('[data-closeSearch]');
        this.searchOverlay = $('[data-searchOverlay]');
        this.body = $('body');
        this.inputSearch = $('#search-term');
        this.init();
        this.isOverlayOpen = false;
        this.isSpinnerVisible = false;
        this.previousValue;
        this.typingTimer;
    }

    init(){
        this.openButton.on('click',() => this.openOverlay());
        this.closeButton.on('click',() => this.closeOverlay());
        $(document).on('keydown', (e)=> this.keyPressDispatcher(e));
        this.inputSearch.on('keyup', ()=> this.typingLogic());
    }

    typingLogic(){
        if(this.inputSearch.val() != this.previousValue){
            clearTimeout(this.typingTimer);

            if(this.inputSearch.val()){
                if(!this.isSpinnerVisible){
                    this.resultsDiv.html('<div class="search__spinner-loader"></div>');
                    this.isSpinnerVisible =true;
                } 
                this.typingTimer = setTimeout(()=> this.getResults(), 750);
            }else{
                this.resultsDiv.html('');
                this.isSpinnerVisible = false;
            }

            
        }
        
        this.previousValue = this.inputSearch.val();
    }

    getResults(){

        $.getJSON(napedowcyData.root_url + '/wp-json/napedowcy/v1/search?term=' + this.inputSearch.val(), (results)=>{
            this.resultsDiv.html(`
                
                    <div class='search__one-third'>
                        <h2 clsss='search__section-title'>Główne informacje</h2>
                            ${results.generalInfo.length ? '<ul class="search__link-list">' : '<p> nic nie znaleźliśmy</p>'}
                            ${results.generalInfo.map( item => `<li><a href="${item.permalink}"> ${item.title} </a></li>`).join('')}
                            ${results.generalInfo.length ? '</ul>' : ''}
                    </div>
                    
                    
                        
                    <div class='search__one-third'>  
                        <h2 clsss='search__section-title'>Przedstawienia</h2>  <h3 class='title'>Aktualne</h3>
                            ${results.performances.length  ? '<div class="">' : `<p> nic nie znaleźliśmy: <a href='${napedowcyData.root_url}/performances'> Przedstawienia aktualne</a> </p>`}
                            ${results.performances.map( item => `
                            
                                
                                <div class="search__article">
                                    <h3><a href="${item.permalink}">${item.title} </a></h3>
                                    <p>data premiery: ${item.premiere_day_month}.${item.premiere_year}</p>
                                    <p>Kompozytor: ${item.composer}</p>
                                    <p>data premiery: ${item.director}</p>
                                </div>
                                    
                                
                            
                            `
                            ).join('')}
                            ${results.performances.length ? '</div>' : ''}
                    
                    
                            <h3 class='title'>Archiwalne</h3>
                            ${results.performances_archival.length  ? '<div class="">' : `<p> Nic nie znaleźliśmy: <a href='${napedowcyData.root_url}/archival-performances'> Przedstawienia archiwalne</a> </p>`}
                            ${results.performances_archival.map( item => `

                                <div class="search__article">
                                    <h3><a href="${item.permalink}">${item.title} </a></h3>
                                    <p>data premiery: ${item.premiere_day_month}.${item.premiere_year}</p>
                                    <p>Kompozytor: ${item.composer}</p>
                                    <p>Reżyser: ${item.director}</p>
                                </div>
                            `
                            ).join('')}
                            ${results.performances_archival.length ? '</div>' : ''}
                    </div>
                    <div class='search__one-third'>
                        <h2 clsss='search__section-title'>Urządzenia</h2>
                            
                            ${results.devices.length  ? '<ul class="search__link-list">' : `<p> nic nie znaleźliśmy: <a href='${napedowcyData.root_url}/devices'>Urządzenia</a> </p>`}
                            ${results.devices.map( item => `<li><a href="${item.permalink}"> ${item.title} </a></li>`).join('')}
                            ${results.devices.length ? '</ul>' : ''}
                    </div>
            `);
            this.isSpinnerVisible = false;
        });
    }

    keyPressDispatcher(e){
        if(e.keyCode == 27 && this.isOverlayOpen) this.closeOverlay();
        // if(e.keyCode ==83 && !this.isOverlayOpen) this.openOverlay();
        
    }

    openOverlay(){
        this.searchOverlay.addClass('search--active');
        this.body.addClass('body-no-scroll');
        this.inputSearch.val('');
        setTimeout(()=>this.inputSearch.focus(), 301 );
        this.isOverlayOpen = true; 
        
    }
    closeOverlay(){
            this.searchOverlay.removeClass('search--active');
            this.body.removeClass('body-no-scroll');
            this.isOverlayOpen = false;
        
    }
    addSearchHTML(){
        $('body').append(`
            <div class='search' data-searchOverlay>
            <div class="search__top">
                <div class="search__container wrapper">
                    <i class="fa fa-search search__icon" aria-hidden='true'></i>
                    <input type="text" class='search-term' placeholder='Czego szukasz?' id='search-term'>
                    <i class="fa fa-window-close search__close" aria-hidden='true' data-closeSearch></i>
                </div>
            </div>
            <div class="wrapper">
                <div class='search__results' id="search__results">

                </div>
            </div>
            </div>
        `)
    }
}
export default Search;