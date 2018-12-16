'use strict';

class DescriptionClass extends LayoutClass {
  constructor() {
    super();
    LayoutClass.currentPage = 'description';
  }

  init(globalCertId) {

    super.init();
    DescriptionClass.certId = globalCertId; // Data gets from template
    console.log('cert id:', globalCertId);
    this.btnCertActivate = document.getElementById('certActivateBtn');

    if (this.btnCertActivate != null)  {
      this.btnCertActivate.onclick = this.btnActivateOnClickHandler;
    } else {
      err('mainpageclass.js','init', 'certActivateBtn not found.');
    };
  
  }

  btnActivateOnClickHandler() {
    console.log('Hi from activate!', DescriptionClass.certId);
    const workrmsg = document.getElementById('cert_work');   
    const donemsg = document.getElementById('cert_done');   
    const acterrormsg = document.getElementById('cert_act_error');   
       
    workrmsg.style.display='none';
    donemsg.style.display='none';
    acterrormsg.style.display='none';


    const url = '/cert/ajax-activate'
    const data = new FormData();
    data.append('certid', DescriptionClass.certId);
    const myHeader = new Headers();
    myHeader.append('X-CSRF-Token', DescriptionClass.csrf)
    let resp;

    fetch(url,{
      method: 'POST',
      headers: myHeader,
      body: data
    })
      .then((resp) => {
        if (resp.status !== 200) {
          err('layoutclass.js','btnActivateOnClick/fetch', resp.status);
          return;
        }
        resp.json().then((data) => {
          console.log('data:::', data);
            if (data) {
               workrmsg.style.display='none';
               donemsg.style.display='block';
            } else {
               workrmsg.style.display='none';
               acterrormsg.style.display='block';
            }
        })
      })
      .catch((e)=> {
          err('layoutclass.js','btnActivateOnClick', e.message);
      });
      return false;
  }
  

}

