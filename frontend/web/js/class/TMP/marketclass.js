'use strict';

class CatPageClass {

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
      this.loadItems(cityid);
   } 

   loadItems(cityid) {
      let url =`/ajax/get-products?cityid=${cityid}`; 
      let data;
      httpGet(url)
         .then(
            (response) => {
               try {
                  data = JSON.parse(response);
                  this.items = data; 
                  this.applyFilter();
                  console.log('We gets data:', this);
               } catch(e) {
                  myErrorHandler(e);
               }
            })
         .catch((e) => {
            myErrorHandler(e);
         });
   }

   setFcats(fcid) {
      this.fcid = fcid;
      this.applyFilter();
   }

   setScats(scid) {
      this.scid = scid;
      this.applyFilter();
   }
   setLprice(price) {
      this.lprice = price;
      this.applyFilter();
   }

   setHprice(price) {
      this.hprice = price;
      this.applyfilter();
   }
   
   getItems() {}

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
      let out = Math.ceil(length/this.itemOnPage);
      return out;
   }

   getPageByNum(num) {
      num = (num > this.pageCount) ? this.pageCount : num;
      let out;
      out = this.items.slice((num-1)*this.itemOnPage, (num*this.itemOnPage+1));
      return out;
   }
} // End of object
