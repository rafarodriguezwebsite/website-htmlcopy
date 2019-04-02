
function reasonActive(bool) {
    if (bool == false) {
        document.getElementById('reason').setAttribute("disabled", true);
    }
    else {
        document.getElementById('reason').removeAttribute("disabled");
    }
    
}

function send() {
    var empt1 = document.forms["sendMessage"]["name"].value;
    var empt2 = document.forms["sendMessage"]["mail"].value;
    var empt3 = document.forms["sendMessage"]["reason"].value;
    empt3 += (!document.getElementById('reason').disabled) ? "" : "1";
    var empt4 = document.forms["sendMessage"]["comment"].value;
    if (empt1=="" ||
        empt2=="" ||
        empt3=="" ||
        empt4=="" )
        {
        alert("Be sure to fill all areas.");
        return false;
    }
    else {
        document.getElementById('sendMessage').reset();
        reasonActive(false);
        alert("Your message has been sent. Expect a reply within 24 hours.");
    }
                
}
    