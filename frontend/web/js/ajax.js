   function ajaxget(url, req, asinc, callback) {
      var xhr = new XMLHttpRequest();
      req = url + req; 
      xhr.open("GET", req, asinc);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onreadystatechange = function() {
         if (this.readyState != 4) return;
         callback(this.responseText);
      };
      xhr.send('');
   }
