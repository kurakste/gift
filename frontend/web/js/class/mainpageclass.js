'use strict';

class MainPageClass extends LayoutClass {
  constructor() {
    super();
    this.QuotesList = [];
    this.catimagelist = Array.from(document.getElementsByClassName('cat-image'));
    LayoutClass.currentPage = 'main';
  }

  init() {
    super.init();
    this.btnCertDetail = document.getElementById('certDetailBtn');   
    this.btnCertActivate = document.getElementById('certActivateBtn');
    this.slist2 = document.getElementById('citieslist2');  

    if (this.btnCertDetail != null) {
      this.btnCertDetail.onclick = this.btnDetailOnClickHandler;
    } else {
      err('mainpageclass.js','init', 'certDetailBtn not found.');
    };

    if (this.btnCertActivate != null)  {
      this.btnCertActivate.onclick = this.btnActivateOnClickHandler;
    } else {
      err('mainpageclass.js','init', 'certActivateBtn not found.');
    };
  
    if (this.slist2) {
      this.slist2.onchange = this.cityChangeState;
    } else {
        err('layoutclass.js','constructor', 'citieslist2 not found.');
    };
    if (this.catimagelist!=null) {
      let that = this;
      this.catimagelist.map(
        x => x.onclick = that.onCategoryClick
      );
    }
  }

  btnDetailOnClickHandler() {
    const certidel = document.getElementById('cert_input');   
    const errormsg = document.getElementById('cert_error');   
    const certid = certidel.value;
    const url = `/cert/ajax-check?certid=${certid}`;
    let resp;
    
    fetch(url)
      .then ((resp) => {
        return(resp.json());
      })
      .then((resp) => {
        if (resp) {
            document.location.href='/cert/description?certid='+certid;
        } else {
           errormsg.style.display='block';
        }
      })
      .catch((e)=> {
          err('layoutclass.js','btnDatailOnClick', e.message);
      });
    return false
  }
  
  btnActivateOnClickHandler() {
    console.log('Hi from activate!');
    const certidel = document.getElementById('cert_input');   
    const errormsg = document.getElementById('cert_error');   
    const workrmsg = document.getElementById('cert_work');   
    const donemsg = document.getElementById('cert_done');   
    const acterrormsg = document.getElementById('cert_act_error');   
       
    errormsg.style.display='none';
    workrmsg.style.display='none';
    donemsg.style.display='none';
    acterrormsg.style.display='none';

    const certid = certidel.value;

    const url = '/cert/ajax-activate'
    const data = new FormData();
    data.append('certid', certid);
    const myHeader = new Headers();
    myHeader.append('X-CSRF-Token', LayoutClass.csrf)

    let resp;

    fetch(url,{
      method: 'POST',
      headers: myHeader,
      body: data
    })
      .then ((resp) => {
        if (resp.status !== 200) {
          err('layoutclass.js','btnActivateOnClick/fetch', resp.status);
          return;
        }
        resp.json().then((data) => {
          console.log('data', data);
            if (data) {
               workrmsg.style.display='none';
               donemsg.style.display='block';
            } else {
               workrmsg.style.display='none';
               errormsg.style.display='block';
            }
        })
      })
      .catch((e)=> {
          err('layoutclass.js','btnActivateOnClick', e.message);
      });
      return false;
  }
  

}
