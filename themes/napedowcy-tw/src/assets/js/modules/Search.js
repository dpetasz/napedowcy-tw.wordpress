import $ from '../../../../node_modules/jquery';

class Search {
    constructor(){
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
                this.typingTimer = setTimeout(()=> this.getResults(), 1000);
            }else{
                this.resultsDiv.html('');
                this.isSpinnerVisible = false;
            }

            
        }
        
        this.previousValue = this.inputSearch.val();
    }

    getResults(){
        $.getJSON('http://localhost/napedowcy-tw/wp-json/wp/v2/posts?search=' + this.inputSearch.val(), (results)=>{
            this.resultsDiv.html(`
                <h2 class="search__section-title"> wynik wyszukiwania</h2>
                <ul>
                    ${results.map( item => `<li><a href="${item.link}"> ${item.title.rendered} </a></li>`).join('')}
                </ul>
            
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
        this.isOverlayOpen = true; 
        
    }
    closeOverlay(){
            this.searchOverlay.removeClass('search--active');
            this.body.removeClass('body-no-scroll');
            this.isOverlayOpen = false;
        
    }
}
export default Search;