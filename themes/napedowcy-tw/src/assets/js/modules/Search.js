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
        $.when(
            $.getJSON(napedowcyData.root_url + '/wp-json/wp/v2/posts?search=' + this.inputSearch.val()),
            $.getJSON(napedowcyData.root_url + '/wp-json/wp/v2/pages?search=' + this.inputSearch.val())
        ).then((posts, pages)=>{
            let combinedResults = posts[0].concat(pages[0]);
                this.resultsDiv.html(`
                <h2 class="search__section-title"> wynik wyszukiwania</h2>
                    ${combinedResults.length ? '<ul>' : '<p> nic nie znaleźliśmy</p>'}
                    ${combinedResults.map( item => `<li><a href="${item.link}"> ${item.title.rendered} </a></li>`).join('')}
                    ${combinedResults.length ? '</ul>' : ''}
            `);
            this.isSpinnerVisible = false;
        },()=>{
            this.resultsDiv.html('<p>Wystąpił błąd, spróbuj ponownie później</p>')
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
                <div id="search__results">

                </div>
            </div>
            </div>
        `)
    }
}
export default Search;