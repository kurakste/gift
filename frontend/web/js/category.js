window.onload = function() {
   
   var fcats = document.getElementById('fcatlist');   
   var scats = document.getElementById('scatlist');  
   var pcontainer = document.getElementById('pcontainer');   

   console.log( generateItem('FirstItem', '2 000', '/img/first.jpg'));
   var ddiv = document.createElement('div');
   ddiv.innerHTML = generateItem('FirstItem', '2 000', '/img/first.jpg');
   pcontainer.appendChild(ddiv);
   pcontainer.appendChild(ddiv);
   pcontainer.appendChild(ddiv);
   
   for (var i = 0; i < fcats.children.length; i++) {
      fcats.children[i].children[0].onclick = fcatsclick;
      console.log(fcats.children[i]);
   }
   
   for (var i = 0; i < scats.children.length; i++) {
      scats.children[i].children[0].onclick = fcatsclick;
      console.log(scats.children[i]);
   }

   function fcatsclick() 
   {
      alert('Hi!');
      return false;
   }

   function generateItem(name, price, image)
   {
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


}
