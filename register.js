const form = document.querySelector('.form form'),
submitbtn = form.querySelector('.submit input'),
errortxt = form.querySelector('.error-text');

form.onsubmit =(e) => {
  e.preventDefault();
}

submitbtn.onclick = () =>{
 //start ajax

 let xhr= new XMLHttpRequest(); //create xml obj
 xhr.open("POST","./php/signup.php", true);
 xhr.onload =()=> {
  if(xhr.readystate ==XMLHttpRequest.DONE ){
   if(xhr.status == 200){
     let data = xhr.response;
     if(data == "Success"){
        location.href = "./verify.php"
     }
     else{
      errortxt.textContent = data;
      errortxt.style.display = "block";
     }
   }
  }
 }
 //send data through ajax to php
 let formData = new FormData(form); //creating new object from form data
 xhr.send(FormData);//sending data to php
}