
function changeImage(){

  var image = document.forms['imageChange']['image'];
  var validImg = ["jpg","jpeg","png"];

  var pic_flag = "";



if(image.value == ""){

    document.getElementById('picture_err').innerHTML = "Upload a photo";

    pic_flag = "error";
  }
    
  if(image.value != ""){

    var ext = image.value.substring(image.value.lastIndexOf('.')+1);

    var result = validImg.includes(ext);

    if (result == false){

        document.getElementById('picture_err').innerHTML = "Only (png,jpeg,jpg) file allowed";

        pic_flag = "error";

    }

  }

  if (pic_flag == ""){

      document.getElementById('picture_err').innerHTML = "";

  }




    if(pic_flag != "" ){

      
        return false;


	}else{

           alert("Form submitted");

	}


}
