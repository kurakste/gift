const market = {
   items : [],
   fitems: [], //filtred items
   itemOnPage: 20,
   pageCount: 0,
   fcid: -99, 
   scid: -99, 
   lprice: -1,
   hprice: -1,
   
   init: function(cityid) {
      this.loadItems(cityid); 
      this.pageCount = this.calcPageCount();
   },

   setFcats: function(fcid) {
      this.fcid = fcid;

   },

   setScats: function() {
      
   },
   // Returns items with filtering options;
   //
   getItems: function() {

   },

   loadItems: function(cityid) {
      const url = '/ajax/get-products';
      const req = `cityid=${cityid}`;
      let resp;
      
      // How do this in right way?
      ajaxget(url, req, false, (resptext) => {
         try {
            resp = JSON.parse(resptext);
            market.items = resp;
         } catch {
            resp = false;
            console.log('ajax resp false:', resp);
         }
      }); 
   },

   applyFilter: function() {

      let out = this.items.filter(function(el) {

         let ffcat = (this.market.fcid === -99) ? true : (el.fcid === this.market.fcid);
         let fscat = (this.market.scid === -99) ? true : (el.fsid === this.market.fsid);
         let flow = (this.market.lprice === -1) ? true : (el.price > this.market.lprice);
         let fupper = (this.market.hprice === -1) ? true : (el.price) < this.market.ehprice;

         return (ffcat && fscat && flow && fupper)
      });

      this.fitems = out;
   },

   calcPageCount : function() {
      let length = this.items.length;
      let out = parseInt(length/this.itemOnPage);
      return out;
   },

   getPageByNum: function(num) {
      num = (num > this.pageCount) ? this.pageCount : num;
      let out;
      out = this.items.slice((num-1)*this.itemOnPage, (num*this.itemOnPage+1));
      return out;
   }
} // End of object

