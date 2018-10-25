window.onload = function(){

   function loadCityes() 
   {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
         input = JSON.parse(this.responseText);
         refreshCitiesList(input);
         }
     };
     var path ="/delivery/ajax-get-city-to-delivery-list";
     path = path + "?did=" + curent_did; // Look at the widget template
     xhttp.open("GET", path, true);
     xhttp.send();
   }

   function removeCityFromDelivery(cid) 
   {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            loadCityes();
            }
      };
      var path ="/delivery/ajax-remove-city-to-delivery";
      console.log(cid);
      xhttp.open("POST", path, true);
      xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhttp.send('cid=' + cid + '&did=' + curent_did);
   }




   function refreshCitiesList(input) 
   {
      console.log(input);
      var citylst = document.getElementById('cities_list');

      while(citylst.firstChild){
         citylst.removeChild(citylst.firstChild);
      }

      input.forEach(function(item){
         var newli = document.createElement('li');
         var newspan = document.createElement('span');
         newspan.setAttribute('data', item['cid']);
         newspan.innerHTML ='  <i class="fa fa-times"></i>';
         newspan.onclick = function () {
            console.log(this.getAttribute('data'));
            removeCityFromDelivery(this.getAttribute('data'));
         }
         newli.innerHTML = item['name'];
         newli.insertBefore(newspan, newli.children[0]);
         citylst.insertBefore(newli, citylst.children[0]);
      });

      return true;
   }

   var addButton = document.getElementById("addButton");

   addButton.onclick = function() {
      var citysel = document.getElementById("newcity");
      var value = citysel.value;

      addNewCity(value);
   }

   function addNewCity(cid) 
   {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            loadCityes();
            }
      };
      var path ="/delivery/ajax-add-city-to-delivery";
     // path = path + "?did=" + curent_did + '&cid=' + cid; // Look at the widget template
      console.log(path);
      xhttp.open("POST", path, true);
      xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhttp.send('cid=' + cid + '&did=' + curent_did);
   }

   loadCityes()
};
