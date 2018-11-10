window.onload = function() {
   
   var fcats = document.getElementById('fcatlist');   
   var scats = document.getElementById('scatlist');  

   for (var i = 0; i < fcats.children.length; i++) {
      fcats.children[i].children[0].onclick = fcatsclick;
   }
   
   for (var i = 0; i < scats.children.length; i++) {
      scats.children[i].children[0].onclick = fcatsclick;
   }

//   fakeProductGenerator();

   requestForItems();

   
//-----------------------------------------------------   
   
   function requestForItems() {
      var xhr = new XMLHttpRequest();
      // xhr = new XDomainRequest();
      xhr.open("GET", '/site/test', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onreadystatechange = function() {
         if (this.readyState != 4) return;
   //      console.log(this.responseText);
         items = JSON.parse(this.responseText);
         generateItemsFromArray(items); 
         
      }
      xhr.send('');
   }



   function generateItemsFromArray(items) {
      items.forEach(function(item) {
         console.log(item.name); 
         var content = generateItem(item.name, item.price, item.image);
         addNewItemInContainer(content);
      }); 

   
   }

   //onCatsElements click hendler;
   function fcatsclick() 
   {
      alert('Hi!');
      return false; // Prevent default action on a tags
   }

   //Add html content (item) in product container
   function addNewItemInContainer(content)
   {
      var pcontainer = document.getElementById('pcontainer');   

      var ddiv = document.createElement('div');

      ddiv.innerHTML = content;
      pcontainer.appendChild(ddiv);
      return true;
   }

   //Generate item that need to be added in product conteiner.
   function generateItem(name, price, image) {
      
      var tmpl = 
`
<div class="col-lg-4 col-md-4 col-sm-6">
   <div class="f_p_item">
       <div class="f_p_img">
           <img class="img-fluid" src="`+ image + `" alt="">
           <div class="p_icon">
               <a href="#"><i class="lnr lnr-heart"></i></a>
               <a href="#"><i class="lnr lnr-cart"></i></a>
           </div>
       </div>
       <a href="#">
           <h4>` + name + ` </h4>
       </a>
       <h5>&#8381 ` + price + ` </h5>
   </div>
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
}
