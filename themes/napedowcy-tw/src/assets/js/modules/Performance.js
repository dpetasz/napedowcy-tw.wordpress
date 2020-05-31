class Performance {
    constructor(){
        this.performanceBefore = document.querySelectorAll('[data-performanceBefore]');
        this.performanceAtThe = document.querySelectorAll('[data-performanceAtThe]');
        this.btnBefore = document.querySelector('[data-btnBefore]');
        this.btnAtThe = document.querySelector('[data-btnAtThe]');
        this.current = true;
        this.initPerformance();
    }
    initPerformance(){
        if(this.btnAtThe) this.btnAtThe.addEventListener('click', this.changePerformance);
        if(this.btnBefore) this.btnBefore.addEventListener('click', this.changePerformance);
        if(this.performanceBefore && this.current == true) this.performanceBefore.forEach(el => {
            el.classList.add('site-performance__reveal-item--is-visible');
        })
        if(this.performanceAtThe && this.current == true) this.performanceAtThe.forEach(el => {
            el.classList.add('site-performance__reveal-item');
        })
    }
    changePerformance(){
        console.log('kliknięty')
    }
}

export default Performance;