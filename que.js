function clickbtmbtn(clickdata) {
    const userclick = document.getElementById(clickdata);
    userclick.classList.add("activez");
    sessionStorage.setItem("activez", clickdata);
    window.location.href = clickdata+".php";
}
function getclickdata() {
    const getclick = sessionStorage.getItem("activez");
    if (getclick) {
        clickbtmbtn(getclick);
    }
}
