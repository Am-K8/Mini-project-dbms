const otp = document.querySelectorAll('.otp_field');

//focus on first ip
otp[0].focus();

otp.forEach((field, index)=>{


 field.addEventListener('keydown', (e)=>{
    if(e.key >=0 && e.key <=9){
     otp[index].value = "";
     setTimeout(() =>{
      otp[index+1].focus();
     }, 4);
     
    }
    else if(e.key === 'Backspace') {
      setTimeout(() =>{
         otp[index-1].focus();
        }, 4);
    }
 })
})