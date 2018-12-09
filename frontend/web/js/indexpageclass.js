'use strict';

class IndexPageClass {

   constructor() {
      this.slist2 = document.getElementById('citieslist2');  
      this.btnPhone = document.getElementById('btnPhone');  
      this.btnQuote = document.getElementById('btnQuote');  
      this.btnCertDetail = document.getElementById('certDetailBtn');   
      this.btnCertActivate = document.getElementById('certActivateBtn');
      this.quoteContainer = document.getElementById('quote-container');
   }


   function onCategoryClick() {
      globalScatID = this.dataset.catid; 
      let link = "/gifts/"+ getCityCpuById(globalCityID)+"/" + this.dataset.catcpu;
      window.location.href = link; 
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
}
