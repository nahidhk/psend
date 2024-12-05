function loginverinno(){
    const rioap = sessionStorage.getItem("verif")
    if (rioap === 'true') {
        
    } else {
        window.location.href="/index.html"
    }
}
loginverinno();