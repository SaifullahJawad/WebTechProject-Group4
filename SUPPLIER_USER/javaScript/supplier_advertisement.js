
function supplierAdd(){

   var add_name = document.getElementById('add_name').value.trim();
   var quantity = document.getElementById('quantity').value.trim();
   var price = document.getElementById('price').value.trim();
   
   var image = document.forms['add_form']['image'];
   var validImg = ["jpg","jpeg","png"];


   var add_name_flag = "";
   var quantity_flag = "";
   var price_flag = "";
   var pic_flag = "";


   if (add_name == ""){

		document.getElementById('add_name_err').innerHTML = "Enter Crop Name";

		add_name_flag = "error";

	   
    }

    if(add_name != ""){
     
     var alphaCount = 0;
     var j = 0;

    var dtName = add_name.replace(/ /g,'');

     while (j < dtName.length){

        if (!(dtName[j].toLowerCase() >='a' && dtName[j].toLowerCase() <='z')) {

   		  alphaCount++;

   	}

   	j++

   }

   if (alphaCount != 0){

		document.getElementById('add_name_err').innerHTML = "Use just Alphabet and Space(If need)";

    add_name_flag = "error";

		

   }


   }


   if (add_name_flag == ""){

     document.getElementById('add_name_err').innerHTML = "";

    }


    //******************Quantity Check*************

   if (quantity == ""){

		document.getElementById('quantity_err').innerHTML = "Enter Quantity";

		quantity_flag = "error";

	   
    }


if (quantity != ""){

   var qCount = 0;
   var u=0;

   while (u < quantity.length){

        if (!(quantity[u] >= '0'  && quantity[u] <= '9')){

    qCount++;

    }

    u++
   }

   if (qCount != 0){

    document.getElementById('quantity_err').innerHTML = "**Use Just numbers with no SPACE ";

    quantity_flag = "error";

  }


}

if (quantity_flag == "") {

   document.getElementById('quantity_err').innerHTML = "";

}

//***********Price check***********************

if (price == ""){

		document.getElementById('price_err').innerHTML = "Enter Price";

		price_flag = "error";

	   
    }


if (price != ""){

   var pCount = 0;

   var m=0;

   while (m < price.length){

        if (!(price[m] >= '0'  && price[m] <= '9')){

    pCount++;

    }

    m++
   }

   if (pCount != 0){

    document.getElementById('price_err').innerHTML = "**Use Just numbers with no SPACE ";

    price_flag = "error";

  }


}

if (price_flag == "") {

   document.getElementById('price_err').innerHTML = "";

}

///****************image Check****************************


if(image.value == ""){

    document.getElementById('picture_err').innerHTML = "Upload a photo";

    pic_flag = "error";
  }
    
  if(image.value != ""){

    var ext = image.value.substring(image.value.lastIndexOf('.')+1);

    var lext = ext.toLowerCase();

    var result = validImg.includes(lext);

    if (result == false){

        document.getElementById('picture_err').innerHTML = "Only (png,jpeg,jpg) file allowed";

        pic_flag = "error";

    }

  }

  if (pic_flag == ""){

      document.getElementById('picture_err').innerHTML = "";

  }



  if(add_name_flag != "" || quantity_flag != "" || price_flag != "" || pic_flag != "" ){

      
        return false;


	}else{

           alert("Form submitted");

	}



}