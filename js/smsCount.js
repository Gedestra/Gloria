textArea = document.getElementById("exampleTextarea");
charSpan = document.getElementById("smsCharCounter");
smsSpan = document.getElementById("smsCounter");
smsCount = 1;


textArea.addEventListener("input", event=>{
    let target = event.currentTarget;
    let length  = target.value.length;
    charSpan.innerHTML = length + " caracteres escritos";
    smsCount = Math.ceil(length/160);
    
    if(smsCount <= 1){
        smsSpan.innerHTML = "se enviará un mensaje";    
    }else{
        smsSpan.innerHTML = "se enviaran " + smsCount + " mensajes";
    }
} );