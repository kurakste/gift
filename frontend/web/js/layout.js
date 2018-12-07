'use strict';
// Why array looks like blended?
// How use polifil. Have i to use some if statements? 
// Is fetch work well with cross domain requests?
//

if (typeof(initialCityFromBackend) != 'undefined' && initialCityFromBackend != null) {
   var globalCityID = initialCityFromBackend; 
}

const mark  = new Market(globalCityID);

window.onload = () => {

   console.log(mark);
   mark.setFcats(2);
   mark.setScats(2);
   console.log(mark);

   if (typeof(initialFcidFromBackend) != 'undefined' && initialFcidFromBackend != null) {
      var globalFcatID = initialFcidFromBackend;
   }

   var globalScatID = -99;
   var globalCitiesList = [];
   var globalQuotesList = [];

   const csrf = document.querySelector("meta[name='csrf-token']").content;
   
   const fcats = document.getElementById('fcatlist');   
   const scats = document.getElementById('scatlist');  

   var slist = document.getElementById('citieslist');  
   var slist2 = document.getElementById('citieslist2');  
   var btnPhone = document.getElementById('btnPhone');  
   var btnQuote = document.getElementById('btnQuote');  
   var btnCertDetail = document.getElementById('certDetailBtn');   
   var btnCertActivate = document.getElementById('certActivateBtn');
   var catimagelist = Array.from(document.getElementsByClassName('cat-image'));
   var quoteContainer = document.getElementById('quote-container');
   const callBackMsg = document.getElementById('callBackMsg');


   if (fcats!=null) {
      // fcats.map(
      //    x => x.children[0].onclick = fcatsclick
      // );
      for (var i = 0; i < fcats.children.length; i++) {
         fcats.children[i].children[0].onclick = fcatsclick;
      }
   }
   
   if (scats!=null) {
      // scats.map(
      //   x => x.children[0].onclick =  scatsclick
      // );
      for (var i = 0; i < scats.children.length; i++) {
         scats.children[i].children[0].onclick = scatsclick;
      }
   }

   if (catimagelist!=null) {
      catimagelist.map(
         x => x.onclick = onCategoryClick
      );
   }

   if (btnQuote != null) btnQuote.onclick = btnQuoteOnClickHandler;
   if (btnCertDetail != null) btnCertDetail.onclick = btnDetailOnClickHandler;
   if (btnCertActivate != null) btnCertActivate.onclick = btnActivateOnClickHandler;

   slist.onchange = cityChangeState;
   if (slist2) {
      slist2.onchange = cityChangeState;
   }

   if (btnPhone) {
      btnPhone.onclick = getPhoneCall;
   }

   loadCity(); // Этот запрос синхоронный. Все будут ждать, пока не выяснится город. Без этого не правильно загрузятся товары.  
   loadCitiesList();  
   loadQuotesList();
   //requestForItems();
   getItems();
   
//-----------------------------------------------------   
   function getPhoneCall() {
      let out;
      let phonenumber;
      const phone = document.getElementById('inputphonefield');
      if (phone) {
         phonenumber = phone.value; 
      }
      const url = '/contact/ajax-send-callback-request';
      const req = 'phone=' + phonenumber;

      ajaxpost(url, req, true, (resptext) => {
         let resp;
         try {
            resp = JSON.parse(resptext);
            callBackMsg.style.display='block';
         } catch {
            resp = false;
         }
      });

      return false;
   }

   function btnDetailOnClickHandler() {

      const certidel = document.getElementById('cert_input');   
      let errormsg = document.getElementById('cert_error');   
      let certid = certidel.value;
      const url = '/cert/ajax-check';
      const req = 'certid=' + certid;
      let resp;

      ajaxget(url, req, false, (resptext) => {
         try {
            resp = JSON.parse(resptext);
         } catch {
            resp = false;
         }
      }); 

      if (resp) {
          document.location.href='/cert/description?certid='+certid;
      } else {
         errormsg.style.display='block';
      }
      return false
   }

   function btnActivateOnClickHandler() {

      const certidel = document.getElementById('cert_input');   
      let errormsg = document.getElementById('cert_error');   
      let workrmsg = document.getElementById('cert_work');   
      let donemsg = document.getElementById('cert_done');   
      let acterrormsg = document.getElementById('cert_act_error');   
         
      errormsg.style.display='none';
      workrmsg.style.display='none';
      donemsg.style.display='none';
      acterrormsg.style.display='none';

      let certid = certidel.value;
      
      const url = '/cert/ajax-check';
      const req = '?certid=' + certid;
      let resp;

      ajaxget(url, req, false, (resptext) => {
         try {
            resp = JSON.parse(resptext);
         } catch {
            resp = false;
         }
      }); 

      if (resp) {
         workrmsg.style.display='none';
         donemsg.style.display='block';
      } else {
         workrmsg.style.display='none';
         errormsg.style.display='block';
      }
      return false
   }

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
      xhr.open("GET", req, true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onreadystatechange = function() {
         if (this.readyState != 4) return;
         let cities = JSON.parse(this.responseText);
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
      xhr.open("GET", req, true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onreadystatechange = function() {
         let items;
         if (this.readyState != 4) return;
         try {
            items = JSON.parse(this.responseText);
         } catch(e) {
            items = [];
         }
         
         clearProductContainer()
         generateItemsFromArray(items); 
         refreshAddToCartHendler();
      }
      xhr.send('');
   }

   function getItems() {
      const url = '/ajax/get-products';
      const req = 'cityid=' + globalCityID;
      let resp;

      ajaxget(url, req, true, (resptext) => {
         try {
            resp = JSON.parse(resptext);
            market.items = resp;
            let tmp = market.getPageCount();
            console.log('ajax resp ok:', tmp);

         } catch {
            resp = false;
            console.log('ajax resp false:', resp);
         }
      }); 
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
      var tmpl =`
   <div class="f_p_item">
       <div class="f_p_img">
           <img class="img-fluid" src="${image}" alt="">
           <div class="p_icon">
               <a class="fproduct-item icon-link" href="#"><i class="lnr lnr-heart" data-cityid="${id}"></i></a>
               <a class="aproduct-item icon-link" href="/site/checkout?product=${cpu}"><i class="lnr lnr-cart" data-cityid="${id}"></i></a>
           </div>
       </div>
       <a href="/site/get-product?product=${cpu}">

           <h4>${name}</h4>
       </a>
       <h5>&#8381; ${price} </h5>
   </div>`;
   
   return tmpl;
   }
   
//-------------------------------------------------------function
   function cityChangeState() {
      globalCityID = this.value;
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
         }
      }
      requestForItems();
   } 

   function storeCityWhenChanged(cityid) {
   
      var xhr = new XMLHttpRequest();
      var url = '/site/ajax-set-current-client-setting';
      var req = '';

      req = url + '?cityid=' + cityid;
      xhr.open("GET", req, true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onreadystatechange = function() {
         if (this.readyState != 4) return;
         items = JSON.parse(this.responseText);
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
         return out;
      }
      xhr.send('');
   }
}
