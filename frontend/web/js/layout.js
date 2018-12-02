window.onload = function() {
   
   if (typeof(initialFcidFromBackend) != 'undefined' && initialFcidFromBackend != null) {
      var globalFcatID = initialFcidFromBackend;
   }
   // var globalFcatID = initialFcidFromBackend ? initialFcidFromBackend : null;
   // var globarFcatID = initialFcidFromBackend || null;
   
   if (typeof(initialCityFromBackend) != 'undefined' && initialCityFromBackend != null) {
      var globalCityID = initialCityFromBackend; 
   }

   var globalScatID = -99;
   var globalCitiesList = [];
   var globalQuotesList = [];

   var csrf = document.querySelector("meta[name='csrf-token']").content;
   
   
   var fcats = document.getElementById('fcatlist');   
   var scats = document.getElementById('scatlist');  
   var slist = document.getElementById('citieslist');  
   var btnQuote = document.getElementById('btnQuote');  
   var catimagelist = document.getElementsByClassName('cat-image');
   var quoteContainer = document.getElementById('quote-container');


   if (fcats!=null) {
      for (var i = 0; i < fcats.children.length; i++) {
         fcats.children[i].children[0].onclick = fcatsclick;
      }
   }
   
   if (fcats!=null) {
      for (var i = 0; i < scats.children.length; i++) {
         scats.children[i].children[0].onclick = scatsclick;
      }
   }

   if (catimagelist!=null) {
      for (var i=0; i< catimagelist.length; i++) {
         catimagelist[i].onclick = onCategoryClick;
      } 
   }

   if (btnQuote!=null) btnQuote.onclick = btnQuoteOnClickHandler;

   slist.onchange = cityChangeState;

   loadCity(); // Этот запрос синхоронный. Все будут ждать, пока не выяснится город. Без этого не правильно загрузятся товары.  
   loadCitiesList();  
   loadQuotesList();
   requestForItems();
   
//-----------------------------------------------------   
   function btnQuoteOnClickHandler(){
      let quote = getRandomQuote();  
      quoteContainer.innerHTML = quote.body;
      return false;
   }
   
   function getRandomQuote() {
      let len = globalQuotesList.length;
      let num = getRndInteger(0, len-1);

      return globalQuotesList[num];
   }

   function getRndInteger(min, max) {
       return Math.floor(Math.random() * (max - min) ) + min;
   }

   function loadQuotesList(){
      var xhr = new XMLHttpRequest();
      var url = '/ajax/quotes';
      var req = '';

      req = url; 
      xhr.open("GET", req, true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onreadystatechange = function() {
         if (this.readyState != 4) return;
         let quotes = JSON.parse(this.responseText);
         globalQuotesList = quotes;
      };
      xhr.send('');
      
   }

   function getCityCpuById (id){
      let len = globalCitiesList.length;
      for (var i = 0; i < len; i++) {
         if (globalCitiesList[i].id == id) {
            return globalCitiesList[i].cpu;
         }
      }
      return '_';
   }
   
   function loadCitiesList() {
      var xhr = new XMLHttpRequest();
      var url = '/ajax/get-city-list';
      var req = '';

      req = url; 
      console.log(req);
      xhr.open("GET", req, true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onreadystatechange = function() {
         if (this.readyState != 4) return;
         let cities = JSON.parse(this.responseText);
         console.log(cities);
         globalCitiesList = cities;
      };
      xhr.send('');
   }

   function onCategoryClick() {
      globalScatID = this.dataset.catid; 
      let link = "/gifts/"+ getCityCpuById(globalCityID)+"/" + this.dataset.catcpu;
      window.location.href = link; 
   }
  
   function requestForItems() {
      var xhr = new XMLHttpRequest();
      var url = '/site/ajax-get-products';
      var req = '';

      req = url + '?fcid=' + globalFcatID + '&scid=' + globalScatID +
         '&cityid=' + globalCityID;
      console.log(req);
      xhr.open("GET", req, true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onreadystatechange = function() {
         if (this.readyState != 4) return;
         items = JSON.parse(this.responseText);
         console.log(this.responseText);
         clearProductContainer()
         generateItemsFromArray(items); 
         refreshAddToCartHendler();
      }
      xhr.send('');
   }

   function generateItemsFromArray(items) {
      items.forEach(function(item) {
         var content = generateItem(item.name, item.price, item.image, item.cpu, item.id);
         addNewItemInContainer(content);
      }); 
   }
  

   function refreshAddToCartHendler() {

      let favicons = document.querySelectorAll('.fproduct-item');
      if (favicons!=null) {
         for (var i = 0; i < favicons.length; i++) {
            favicons[i].onclick = onAddToFavoriteClick;
         }
      }

   }
   
   function onAddToFavoriteClick() {
      let favid = this.firstChild.getAttribute('data-cityid');
      requestForAddToFav(favid);
      
      return false
   }

   function requestForAddToFav(iid) {
      var xhr = new XMLHttpRequest();
      var url = '/site/ajax-add-item-to-fav';
      var req = '';

      req = url + '?iid=' + iid;
      xhr.open("GET", req, true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onreadystatechange = function() {
         if (this.readyState != 4) return;
      }
      xhr.send('');
   }
   
   
   //onCatsElements click hendler;
   function fcatsclick() {

      let tmp = fcats.getElementsByClassName('accented');

      // let tmp= this.parentNode;

      if (tmp!=null) {
         for (var i = 0; i < tmp.length; i++) {
            tmp[i].classList.remove('accented');
         }
      }
      this.classList.add('accented');

      globalFcatID = this.dataset.fcatid;
      requestForItems();
      return false; // Prevent default action on a tags
   }
   
   function scatsclick() {
      
      let tmp = scats.getElementsByClassName('accented');

      if (tmp!=null) {
         for (var i = 0; i < tmp.length; i++) {
            tmp[i].classList.remove('accented');
         }
      }
      this.classList.add('accented');

      globalScatID = this.dataset.scatid;
      requestForItems();
      return false; // Prevent default action on a tags
   }

   function clearProductContainer(){
      var pcontainer = document.getElementById('pcontainer');   
      if (pcontainer != null) {
         pcontainer.innerHTML ='';
      }
   }

   

   //Add html content (item) in product container
   function addNewItemInContainer(content) {
      var pcontainer = document.getElementById('pcontainer');   
      var ddiv = document.createElement('div');
      ddiv.classList.add('col-lg-4');
      ddiv.classList.add('col-md-4');
      ddiv.classList.add('col-sm-4');

      ddiv.innerHTML = content;
      pcontainer.appendChild(ddiv);
      return true;
   }

   //Generate item that need to be added in product conteiner.
   function generateItem(name, price, image, cpu, id) {
      
     // <div class="col-lg-4 col-md-4 col-sm-6">
//</div>
      var tmpl = 
`
   <div class="f_p_item">
       <div class="f_p_img">
           <img class="img-fluid" src="`+ image + `" alt="">
           <div class="p_icon">
               <a class="fproduct-item icon-link" href="#"><i class="lnr lnr-heart" data-cityid="`+ id + `"></i></a>
               <a class="aproduct-item icon-link" href="/site/checkout?product=`+ cpu +`"><i class="lnr lnr-cart" data-cityid="`+ id + `"></i></a>
           </div>
       </div>
       <a href="/site/get-product?product=` + cpu + `">

           <h4>` + name + ` </h4>
       </a>
       <h5>&#8381 ` + price + ` </h5>
   </div>

`;
   
   return tmpl;
   }



   //
   //Just testing function to check wich way work addNewItemInContainer &
   // generateItem.
   function fakeProductGenerator()
   {
      for (i=1; i<=12; i++) {
         let name = 'item_' + i;
         let cost = i * 1000;
         let image = '/img/product/most-product/m-product-' + i + '.jpg';

         content = generateItem(name, cost, image); 
         addNewItemInContainer(content);
      }
   }

//-------------------------------------------------------function
   function cityChangeState() {
      globalCityID = this.value;
      console.log(globalCityID);
      storeCityWhenChanged(this.value);
      if (typeof(globalPage) != 'undefined' && globalPage != null) {
         if (globalPage == 'main') {
            window.location.href = "/main/" + getCityCpuById(globalCityID);
         } else if ( globalPage == 'category') {
            window.location.href = "/gifts/" + getCityCpuById(globalCityID)+'/_';
         }
            else {
               let homelink1 = document.getElementById('home-link-1');   
               let homelink2 = document.getElementById('home-link-2');   
               console.log(homelink1);
         }
      }
      requestForItems();
   } 

   function storeCityWhenChanged(cityid) {
   
      var xhr = new XMLHttpRequest();
      var url = '/site/ajax-set-current-client-setting';
      var req = '';

      req = url + '?cityid=' + cityid;
      console.log(req);
      xhr.open("GET", req, true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onreadystatechange = function() {
         if (this.readyState != 4) return;
         items = JSON.parse(this.responseText);
         console.log(this.responseText);
      }
      xhr.send('');
   }

   function loadCity() {
      var xhr = new XMLHttpRequest();
      var url = '/site/ajax-get-current-client-setting';
      var req = url;

      xhr.open("GET", req, false);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onreadystatechange = function() {
         if (this.readyState != 4) return;
         let settings  = JSON.parse(this.responseText);
         let out =settings.city;
         globalCityID = out;
         requestForItems();
         console.log(globalCityID);
         return out;
      }
      console.log(req);
      xhr.send('');
   }
   
  
}
