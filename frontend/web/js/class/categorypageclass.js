'use strict';
class CategoryPageClass extends LayoutClass {
  
  constructor() {
    super();
  }

  init() {
    super.init();
    const fcats = document.getElementById('fcatlist');   
    const scats = document.getElementById('scatlist');  
    const price = document.getElementById('amount');

    if (price != null) {
      console.log('price:', price);
      price.onchange = () => alert('hi');
//        this.onPriceChange;
    }
    if (fcats!=null) {
      for (var i = 0; i < fcats.children.length; i++) {
         fcats.children[i].children[0].onclick = this.fcatsclick;
      }
    }

    if (scats!=null) {
      for (var i = 0; i < scats.children.length; i++) {
         scats.children[i].children[0].onclick = this.scatsclick;
      }
    }

    let sl = document.getElementsByClassName('ui-slider-handle');
    sl[0].onmouseup = this.onMouseUpFromSlider;
    sl[1].onmouseup = this.onMouseUpFromSlider;
    console.log(sl[1]);

    window.addEventListener('onChangeCity', e => {
      console.log('Hi from category onRefreshDependsData');
      console.log(this);
      this.loadItems();
    });

    window.addEventListener('onLoadItemsDone', e => {
      console.log('onLoadItemsDone event triggered');
      console.log(this);
      CategoryPageClass.refreshItems()

    });
  }

  onMouseUpFromSlider() {
    const amoutn = document.getElementById('amount');   
    const range = amount.value.split(' - ');
    CategoryPageClass.lprice = parseInt(range[0]);
    CategoryPageClass.hprice = parseInt(range[1]);

    CategoryPageClass.refreshItems()
    console.log('Price filter changed:', range);
  }

  loadItems() {
    console.log('Start load items');
    const cityid= LayoutClass.currentCityId;
    const url = `/ajax/get-products?cityid=${cityid}`;
    console.log(url);

    fetch(url)
      .then ((resp) => {
        return(resp.json());
      })
      .then((data) => {
        CategoryPageClass.items = data; 
        console.log('load items done', data);

        const ev = new CustomEvent ('onLoadItemsDone');
        window.dispatchEvent(ev);
      })
      .catch((e)=> {
          err('categorypageclass.js','LoadItems/fetch', e.message);
      });
    return true
  }

   //onCatsElements click hendler;
   fcatsclick() {

      const fcats = document.getElementById('fcatlist');   
      let tmp = fcats.getElementsByClassName('accented');

      if (tmp!=null) {
         for (var i = 0; i < tmp.length; i++) {
            tmp[i].classList.remove('accented');
         }
      }
      this.classList.add('accented');

      CategoryPageClass.fcatid = parseInt(this.dataset.fcatid);
      console.log(CategoryPageClass.fcatid);
      CategoryPageClass.refreshItems();
      return false; // Prevent default action on a tags
   }
  onPriceChange() {
    console.log(this.value);
  
  }
   scatsclick() {
      const scats = document.getElementById('scatlist');  
      let tmp = scats.getElementsByClassName('accented');

      if (tmp!=null) {
         for (var i = 0; i < tmp.length; i++) {
            tmp[i].classList.remove('accented');
         }
      }
      this.classList.add('accented');
      CategoryPageClass.scatid = parseInt(this.dataset.scatid);
      console.log(CategoryPageClass.scatid);
      CategoryPageClass.refreshItems();
      return false; // Prevent default action on a tags
   }

   static applyFilter() {
      const out = CategoryPageClass.items.filter(el => {
         const ffcat = (CategoryPageClass.fcatid === -99) ? true : (el.fcid === CategoryPageClass.fcatid);
         const fscat = (CategoryPageClass.scatid === -99) ? true : (el.scid === CategoryPageClass.scatid);
         const flow = (CategoryPageClass.lprice === 0) ? true : (el.price > CategoryPageClass.lprice);
         const fupper = (CategoryPageClass.hprice === 10000) ? true : (el.price < CategoryPageClass.hprice);

         return (ffcat && fscat && flow && fupper);
      });
      console.log('Filtred out:', out);
      return out;
   }

   static refreshItems() {
     const items = CategoryPageClass.applyFilter();
     CategoryPageClass.clearProductContainer();
     items.forEach(function(item) {
       var content = CategoryPageClass.generateItem(item.name, item.price, item.image, item.cpu, item.id);
       CategoryPageClass.addNewItemInContainer(content);
     }); 
   }

   static clearProductContainer(){
     var pcontainer = document.getElementById('pcontainer');   
     if (pcontainer != null) {
        pcontainer.innerHTML ='';
     }
   }

   //Add html content (item) in product container
   static addNewItemInContainer(content) {
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
   static generateItem(name, price, image, cpu, id) {
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
CategoryPageClass.items =[];
CategoryPageClass.lprice = 0;
CategoryPageClass.hprice = 10000;
