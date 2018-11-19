window.onload = function() {
   console.log('Layout js here.');

   var globalFcatID = -99;
   var globalScatID = -99;
   var globalCityID = 1; 
   var csrf = document.querySelector("meta[name='csrf-token']").content;
   console.log(csrf);
   
   
   var fcats = document.getElementById('fcatlist');   
   var scats = document.getElementById('scatlist');  
   var slist = document.getElementById('citieslist');  

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
   slist.onchange = cityChangeState;

   loadCity(); 

   console.log(globalCityID);
   requestForItems();

   
//-----------------------------------------------------   
  
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
         //console.log(this.responseText);
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
            console.log(favicons[i]);
         }
      }

   }
   
   function onAddToFavoriteClick() {
      console.log(this.firstChild.getAttribute('data-cityid')); 
      let favid = this.firstChild.getAttribute('data-cityid');
      requestForAddToFav(favid);
      
      return false
   }

   function requestForAddToFav(iid) {
      var xhr = new XMLHttpRequest();
      var url = '/site/ajax-add-item-to-fav';
      var req = '';

      req = url + '?iid=' + iid;
      console.log(req);
      xhr.open("GET", req, true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onreadystatechange = function() {
         if (this.readyState != 4) return;
         console.log('add to fav done');
      }
      xhr.send('');
   }
   
   
   //onCatsElements click hendler;
   function fcatsclick() {
      globalFcatID = this.dataset.fcatid;
     // console.log(globalFcatID);
      requestForItems();
      return false; // Prevent default action on a tags
   }
   
   function scatsclick() {
      globalScatID = this.dataset.scatid;
      requestForItems();
    //  console.log(this.dataset.scatid);
      return false; // Prevent default action on a tags
   }

   function clearProductContainer(){
      var pcontainer = document.getElementById('pcontainer');   
      pcontainer.innerHTML ='';
//      console.log('cleaning done');
   }

   //Add html content (item) in product container
   function addNewItemInContainer(content) {
      var pcontainer = document.getElementById('pcontainer');   
      var ddiv = document.createElement('div');
      ddiv.classList.add('col-lg-4')
      ddiv.classList.add('col-md-4')
      ddiv.classList.add('col-sm-4')

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
               <a class="fproduct-item" href="#"><i class="lnr lnr-heart" data-cityid="`+ id + `"></i></a>
               <a class="aproduct-item" href="/site/checkout?product=`+ cpu +`"><i class="lnr lnr-cart" data-cityid="`+ id + `"></i></a>
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
      console.log('Load city here.'); 
      var xhr = new XMLHttpRequest();
      var url = '/site/ajax-get-current-client-setting';
      var req = url;

      xhr.open("GET", req, true);
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
