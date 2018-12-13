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
    const sortsel = document.getElementById('sort-selector');
    const iopagesel = document.getElementById('iemsOnPage'); 


    
    sortsel.onchange = this.onSortChange; 
    iopagesel.onchange = this.onItemsOnPageChange;


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
      CategoryPageClass.generatePaginator()

    });
  }

  onItemsOnPageChange() {
    console.log('Hi from onItemsOnPageChange',this.value);
    
    CategoryPageClass.itemsOnPage = parseInt(this.value); 
    CategoryPageClass.currentPageNumber = 1;
    

    CategoryPageClass.refreshItems()
    CategoryPageClass.generatePaginator()
    
    return true;
    
  }

  static generatePaginator() {
   const iop = CategoryPageClass.itemsOnPage; 
   const cpn = CategoryPageClass.currentPageNumber;
   const pcont = document.getElementById('paginator');
   const items = CategoryPageClass.applyFilterAndSorting();
   const pages = Math.ceil(items.length/iop);

   if (pages <= 7) {
     pcont.innerHTML = '';
     for (let i = 1; i<=pages; i++) {
       let li = document.createElement('li');
       li.classList.add('page-item');
       li.onclick = CategoryPageClass.onPaginatorPageClick;
       if (i == cpn) li.classList.add('active');
       li.innerHTML = `<a class="page-link" href="#">${i}</a>`;
       pcont.appendChild(li);
     }
    } else {
      err('categorypageclass.js','GeneratePaginator', 'Не выведен товар на страницу. Превышен лимит семи страниц');
    } 
  }
  
  static onPaginatorPageClick() {
    
    const par = this.parentNode.childNodes;
    console.log('pareent:', par)
    par.forEach(e => {
      console.log('clering classes:', e);
      e.classList.remove('active');
    })
    
    let newPN = parseInt(this.firstChild.innerHTML);
    
    this.classList.add('active');
    console.log('parent node:', this.parentNode);
    CategoryPageClass.currentPageNumber = newPN;
    console.log('On page click', newPN); 
    CategoryPageClass.refreshItems()
    return false;
  }

  
  onSortChange() {
    console.log('filter changed');
    if (parseInt(this.value) === 1) {
      CategoryPageClass.sort ='ASC';
    } else  {
      CategoryPageClass.sort ='DESC';
    }
    CategoryPageClass.currentPageNumber = 1;
    CategoryPageClass.refreshItems();
    CategoryPageClass.generatePaginator()
    return true
  }
  
  onMouseUpFromSlider() {
    const amoutn = document.getElementById('amount');   
    const range = amount.value.split(' - ');
    CategoryPageClass.lprice = parseInt(range[0]);
    CategoryPageClass.hprice = parseInt(range[1]);

    CategoryPageClass.refreshItems()
    CategoryPageClass.generatePaginator()
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
    CategoryPageClass.refreshItems()
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

  static applyFilterAndSorting() {
    const out = CategoryPageClass.items.filter(el => {
      const ffcat = (CategoryPageClass.fcatid === -99) ? true : (el.fcid === CategoryPageClass.fcatid);
      const fscat = (CategoryPageClass.scatid === -99) ? true : (el.scid === CategoryPageClass.scatid);
      const flow = (CategoryPageClass.lprice === 0) ? true : (el.price > CategoryPageClass.lprice);
      const fupper = (CategoryPageClass.hprice === 10000) ? true : (el.price < CategoryPageClass.hprice);

      return (ffcat && fscat && flow && fupper);
    });
    if (CategoryPageClass.sort === 'ASC') {
      out.sort((a, b) => a.price - b.price);
    } else {
      out.sort((a, b) => b.price - a.price);
    }
    console.log('Filtred out:', out);
    return out;
  }

  static refreshItems() {

    const iop = CategoryPageClass.itemsOnPage; 
    const cpn = CategoryPageClass.currentPageNumber;
    const items = CategoryPageClass.applyFilterAndSorting();
    const pageItems = items.slice((cpn - 1) * iop, (cpn*iop));
    console.log('low index:', (cpn - 1)*iop);
    console.log('hi index:', (cpn*iop));
    console.log('Filtered & sorted items', pageItems);
    CategoryPageClass.clearProductContainer();
    pageItems.forEach(function(item) {
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
               <a class="aproduct-item icon-link" href="/checkout?product=${cpu}"><i class="lnr lnr-cart" data-cityid="${id}"></i></a>
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
CategoryPageClass.sort ='ASC' //up crease (second value DESC);
CategoryPageClass.itemsOnPage = 12; 
CategoryPageClass.currentPageNumber = 1;
