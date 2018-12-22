'use strict';
class CheckoutPageClass extends LayoutClass {
  
  constructor() {
    super();
  }

  init() {
    super.init();
    const termsswtch = document.getElementById('certtermsswch');   
    const polisyswtch = document.getElementById('ppolicyswch');   
    const sbmtBtn = document.getElementById('sbmtBtn');   
    CheckoutPageClass.errTermsMsg = document.getElementById('errorTerms');   
    CheckoutPageClass.errPolicyMsg = document.getElementById('errorPolicy');   
    console.log('hi from checkout page');
    termsswtch.onchange = this.onTermsSwitch; 
    polisyswtch.onchange = this.onPolicySwitch;
    sbmtBtn.onclick = this.onSbmtClick;

    }

    onTermsSwitch() {
      CheckoutPageClass.termsChecked = !CheckoutPageClass.termsChecked;
      console.log('Terms switched', CheckoutPageClass.termsChecked);
    }
    
    onPolicySwitch() {
      CheckoutPageClass.policyChecked = !CheckoutPageClass.policyChecked;
      console.log('Policy switched', CheckoutPageClass.policyChecked);
    }
  
    onSbmtClick() {
      CheckoutPageClass.errTermsMsg.style.display = 'none';
      CheckoutPageClass.errPolicyMsg.style.display = 'none';

      if(!CheckoutPageClass.termsChecked) {
        CheckoutPageClass.errTermsMsg.style.display = 'block';
        console.log('Submit was pressed, terms false');
        return false;
      }
      if(!CheckoutPageClass.policyChecked) {
        CheckoutPageClass.errPolicyMsg.style.display = 'block';
        console.log('Submit was pressed, policy false', this);
        return false;
      }

      return true;
    }


}

CheckoutPageClass.termsChecked = false;
CheckoutPageClass.policyChecked = false;

