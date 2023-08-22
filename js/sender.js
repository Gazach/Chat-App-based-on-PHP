
var messageBody = document.querySelector('#message');
messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;

// read to databases

let msgdiv = document.getElementById("message");
setInterval(() => {
    fetch("readmsg.php", {
        mode: "no-cors"
    }).then(
        r=>{
            if(r.ok){
                return r.text();
            }
        }
    ).then (
        d=>{
            msgdiv.innerHTML=d;
        }
    )
}, 100);


// send to databases
window.onkeydown=(e) => {
    if(e.key=="Enter"){
        update()
    }
}
function update() {
    
    let msg = inputs.value ;
    inputs.value="";
    fetch(`addmsg.php?msg=${msg}`,{
        mode: "no-cors"
    }).then(
        r=>{
            if (r.ok){
                return r.text();
            }
        }
    ).then (
        d=>{
            console.log("The Message has been Send/add");
            msgdiv.scrollTop=(msgdiv.scrollHeight-msgdiv.clientHeight)+100;
        }
    )
    
}


