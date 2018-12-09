'use strict';

class CatPageClass {

   constructor() {
      this.fcats = document.getElementById('fcatlist');   
      this.scats = document.getElementById('scatlist');  
      
      if (this.fcats!=null) {
         for (var i = 0; i < fcats.children.length; i++) {
            this.fcats.children[i].children[0].onclick = (this) =>{
               this.FcatsClick(this);
            }
         }
      }
      
      if (this.scats!=null) {
         for (var i = 0; i < scats.children.length; i++) {
            this.scats.children[i].children[0].onclick = (this) => {
               this.ScatsClick(this);
            }
         }
      }
   }

   //onCatsElements click hendler;
   function FcatsClick(that) {

      let tmp = that.fcats.getElementsByClassName('accented');

      if (tmp!=null) {
         for (var i = 0; i < tmp.length; i++) {
            tmp[i].classList.remove('accented');
         }
      }
      that.classList.add('accented');

      globalFcatID = this.dataset.fcatid;
      requestForItems();
      return false; // Prevent default action on a tags
   }
   
   function ScatsClick(that) {
      
      let tmp = that.scats.getElementsByClassName('accented');

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

}
