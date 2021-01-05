
function supplierAcceptCheck(){

  var aid = document.getElementById('add_id').value.trim();
  var uname = document.getElementById('uname').value.trim();

  var httpr = new XMLHttpRequest();
  httpr.open('POST', '../php/accept_check.php', true);

  httpr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  httpr.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){


      document.getElementById('accept_response').innerHTML = this.responseText;

    
    }
  }

  httpr.send("add_id="+aid+"&"+"uname="+uname);
  

}


function farmerAcceptCheck(){


  var aid = document.getElementById('add_id').value.trim();
  var uname = document.getElementById('uname').value.trim();

  var httpr = new XMLHttpRequest();
  httpr.open('POST', '../php/accept_check.php', true);

  httpr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  httpr.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){


      document.getElementById('accept_response_farmer_add').innerHTML = this.responseText;

    
    }
  }

  httpr.send("add_id_farmer="+aid+"&"+"uname_s="+uname);


}