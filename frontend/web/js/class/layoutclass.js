'use strict';

class LayoutClass {
    
    constructor() { 
      this.btnCertDetail = null;
      this.btnCertActivate = null;
      this.btnPhone = null;
      this.slist = null; 
    }

    init() {
      console.log('layout init');
      LayoutClass.callBackMsg = document.getElementById('callBackMsg');
      LayoutClass.csrf = document.querySelector("meta[name='csrf-token']").content;
      this.btnPhone = document.getElementById('btnPhone');  
      this.slist = document.getElementById('citieslist');  
      this.loadCitiesList();
      this.slist.onchange = this.cityChangeState;

      if (this.btnPhone) {
        this.btnPhone.onclick = this.getPhoneCall;
      } else {
          err('layoutclass.js','constructor', 'btnPhone not found.');
      };

      this.loadCity();

      

      window.addEventListener('onCityChange', e => {
        console.log('Hi from event test:', e.detail.cityId);
        let cid = parseInt(e.detail.cityId);
        LayoutClass.currentCityId = cid;
        LayoutClass.storeCityWhenChanged(cid); // Should it be an async function? 

        const ev = new CustomEvent ('onRefreshDependData');
        window.dispatchEvent(ev);
        
        if (LayoutClass.currentPage === 'main' || LayoutClass.currentPage === 'mainCity') {
          console.log('Redirect to:', '/main/' + LayoutClass.getCityCpuById(cid))
          window.location.href = "/main/" + LayoutClass.getCityCpuById(cid);
        } else if ( LayoutClass.pageName == 'category') {
          window.location.href = "/gifts/" + LayoutClass.getCityCpuById(this.value) +'/_';
        }
      });

      window.addEventListener('onChangeCity', e => {
        console.log('Hi rfom root onRefreshDependsData');
      });

    }

  loadCitiesList() {
    const url = '/ajax/get-city-list';

    fetch(url)
      .then ((resp) => {
        return(resp.json());
      })
      .then((data) => {
        LayoutClass.citiesList = data; 
      })
      .catch((e)=> {
          err('layoutclass.js','LoadCity/fetch', e.message);
      });
    return true
  }

  static getCityCpuById (inputid){
    console.log(LayoutClass.citiesList);
    let out = false;
    LayoutClass.citiesList.find((el) => {
      console.log(el.id == inputid);
      if (el.id == inputid) {
        out = el.cpu;
      } 
    }); 
    return out;
  }

  loadCity() {
    console.log('Start load city')
    const url = '/site/ajax-get-current-client-setting';
    let trap = true; 

    fetch(url)
      .then ((resp) => {
        return(resp.json());
      })
      .then((resp) => {
        LayoutClass.currentCityId = resp.city;
        console.log('I get city number:', resp.city);
        const ev = new CustomEvent ('onChangeCity');
        window.dispatchEvent(ev);
      })
      .catch((e)=> {
        err('layoutclass.js','loadCity', e.message);
      });

      let ev = new CustomEvent ('onCityChange', {
        detail: {cityId: this.value}
      });
  }

  static storeCityWhenChanged(cityid) {
    console.log('I starn with storeCityWhenChanged.');
    var url = '/site/ajax-set-current-client-setting';

    const data = new FormData();
    data.append('cityid', cityid);

    const myHeader = new Headers();
    myHeader.append('X-CSRF-Token', LayoutClass.csrf)

    fetch(url,{
      method: 'POST',
      headers: myHeader,
      body: data
    })
      .then ((resp) => {
        if (resp.status !== 200) {
          err('layoutclass.js','storeCityWhenChanged/fetch', resp.status);
          return;
        }
        resp.json().then((data) => {
          console.log('we get response, data:', data);
        });
      })
      .catch((e)=> {
          err('layoutclass.js','storeCityWhenChanged', e.message);
      });
  }

  cityChangeState() {
    console.log('City change value:', this.value)
    let ev = new CustomEvent ('onCityChange', {
      detail: {cityId: this.value}
    });

    window.dispatchEvent(ev);
  } 

  getPhoneCall() {
//    let out;
    let phonenumber;
    const phone = document.getElementById('inputphonefield');
    if (phone) {
       phonenumber = phone.value; 
    }

    const url = '/contact/ajax-send-callback-request';

    const data = new FormData();
    data.append('phone', phonenumber);

    const myHeader = new Headers();
    myHeader.append('X-CSRF-Token', LayoutClass.csrf)


    fetch(url,{
      method: 'POST',
      headers: myHeader,
      body: data
    })
      .then ((resp) => {
        if (resp.status !== 200) {
          err('layoutclass.js','getPhoneCall/fetch', resp.status);
          return;
        }
        resp.json().then((data) => {
          console.log('we get response, data:', data);
            if (data) {
              callBackMsg.style.display='block';
            } else {
              err('layoutclass.js','getPhoneCall', data);
            }
        })
      })
      .catch((e)=> {
          err('layoutclass.js','btnActivateOnClick', e.message);
      });
    return false;
  }
}

LayoutClass.csrf = null;
LayoutClass.citiesList = [];
LayoutClass.callBackMsg = null;
LayoutClass.currentCityId = null;
LayoutClass.pageName = null;
LayoutClass.currentPage = null;
LayoutClass.fcatid = -99;
LayoutClass.scatid = -99;

