'use strict';

class Market {

   constructor(cityid) {
      this.cityid = cityid;
      this.items = [];
      this.fitems=[]; //filtred items
      this.itemOnPage = 20;
      this.pageCount = 0;
      this.fcid = -99; 
      this.scid = -99; 
      this.lprice = -1;
      this.hprice = -1;
      this.pageCount = this.calcPageCount();
      this.loadItems();
      this.applyFilter();
   } 

   setFcats(fcid) {
      this.fcid = fcid;
      this.applyFilter();
   }

   setScats(scid) {
      this.scid = scid;
      this.applyFilter();
   }
   
   getItems() {}

   async loadItems() {
      const url = `/ajax/get-products?cityid=${this.cityid}`;
      
      await fetch(url, {
         method: 'GET',
      })
         .then(res => res.text())
            .then(async res=> {
               let data; 
               try {
                  data = JSON.parse(res);
               } catch(e) {
                  data = res;
               }
               console.log('result:', data);
               return await data; 
            })
            .then(json => this.items = json);
   }

   applyFilter() {
      const that = this;
      const out = this.items.filter(el => {
         const ffcat = (that.fcid === -99) ? true : (el.fcid === that.fcid);
         const fscat = (that.scid === -99) ? true : (el.scid === that.scid);
         const flow = (that.lprice === -1) ? true : (el.price > that.lprice);
         const fupper = (that.hprice === -1) ? true : (el.price) < that.hprice;

         return (ffcat && fscat && flow && fupper);
      });
      this.fitems = out;
   }

   calcPageCount() {
      let length = this.fitems.length;
      let out = parseInt(length/this.itemOnPage);
      return out;
   }

   getPageByNum(num) {
      num = (num > this.pageCount) ? this.pageCount : num;
      let out;
      out = this.items.slice((num-1)*this.itemOnPage, (num*this.itemOnPage+1));
      return out;
   }
} // End of object
