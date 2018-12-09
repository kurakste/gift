'use strict';

class MainCityPageClass extends LayoutClass {

  constructor() {
    super();
    this.btnQuote = null; 
    this.quoteContainer = null;
    LayoutClass.currentPage = 'mainCity';
  }
  
  init() {
    super.init();
    this.btnQuote = document.getElementById('btnQuote'); 
    
    if (this.btnQuote != null) {
      this.btnQuote.onclick = this.btnQuoteOnClickHandler;
    }

    this.loadQuotesList();

    MainCityPageClass.catimagelist = Array.from(document.getElementsByClassName('cat-image'));

    if (MainCityPageClass.catimagelist != null) {
      MainCityPageClass.catimagelist.map(
         x => x.onclick = this.onCategoryClick
      );
    }
  }


  loadQuotesList() {
    var url = '/ajax/quotes';
fetch
    fetch(url)
      .then ((resp) => {
        return(resp.json());
      })
      .then((resp) => {
          console.log('We gets response from quotes:', resp );
          MainCityPageClass.quoteList = resp;
      })
      .catch((e)=> {
          err('maincitypage.js','loadQuotesList', e.message);
      });
  }

   onCategoryClick() {
      LayoutClass.fcatid = this.dataset.catid; 
      const curcityid = MainCityPageClass.currentCityId;
      const citycpu = MainCityPageClass.getCityCpuById(curcityid);
      let link = `/gifts/${citycpu}/${this.dataset.catcpu}`;
      console.log(link);
      window.location.href = link; 
   }

  btnQuoteOnClickHandler(){
    const quoteCon = document.getElementById('quote-container');
    console.log('btnQuote wass cilced');
    const quote = MainCityPageClass.getRandomQuote();  
    quoteCon.innerHTML = quote.body;
    return false;
  }

  static getRandomQuote() {
    const len = MainCityPageClass.quoteList.length;
    const num = getRndInteger(0, len-1);

    return MainCityPageClass.quoteList[num];
  }
}

MainCityPageClass.quoteList = null;
MainCityPageClass.catimagelist = null;
