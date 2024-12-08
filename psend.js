const charge = 0.013;
function cruncy() {
    const currency = sessionStorage.getItem("cicon")
    document.getElementById("currency").value = currency;
}
cruncy();
//  Calculator
function calculatorio() {
    const cpt = document.getElementById('cpt');
    const bdt = document.getElementById('bdt');
    const price = document.getElementById('price').value;
    const showfee = document.getElementById('fee');
    const totalcash = cpt.value * price;
    const totalcharge = totalcash * charge
    const totals = totalcash - totalcharge;
    bdt.value = totals;
    showfee.value = totalcharge;
}
function ifcall() {
    document.getElementById('cpt').value = "";
    document.getElementById('bdt').value = "";
}
function cruncyapp() {
    let jsondata = [];
    fetch("/src/price.php")
        .then(response => {
            if (!response.ok) {
                throw new Error("Network response was not ok " + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            jsondata = data;
            totalcal();
        })
        .catch(error => console.error("There was a problem with the fetch operation:", error));

    function totalcal() {
        const inputcode = document.getElementById("currency").value;
        const outputprice = document.getElementById('price');
        const showflag = document.getElementById("showflag");
        const bname = document.getElementById("showbname");
        const selectedData = jsondata.find(item => item.code === inputcode);

        if (selectedData) {
            outputprice.value = selectedData.price;
            showflag.src = selectedData.flag;
            bname.innerHTML = selectedData.bname;

        } else {
            outputprice.value = "";
            showflag.src = "";
        }
    }
    document.getElementById("currency").addEventListener("change", totalcal);

}
cruncyapp();
function next1() {
    psendmony();
    countrysho();
    if (document.getElementById("cpt").value) {
        document.getElementById("nextbtn1").style.display = "none";
        document.getElementById("next2").style.display = "block";
        window.location.href = "#next2";
    } else (alert('input error CPT'));

}
function methods(calldata) {
    const bkash = document.getElementById('bkash');
    const nagad = document.getElementById('nagad');
    const outputmethod = document.getElementById("outputmethod");
    const smethod = document.getElementById('smethod');
    if (calldata === "bkash") {
        smethod.value=calldata;
        bkash.classList = "card active";
        nagad.classList = "card";
        outputmethod.innerHTML = "Input Bkash Number"
    }
    if (calldata === "nagad") {
        smethod.value=calldata;
        nagad.classList = "card active";
        bkash.classList = "card";
        outputmethod.innerHTML = "Input Nagad Number"
    }
}
function typeaccount() {
    const bkash = document.getElementById('bkash').classList;
    const nagad = document.getElementById('nagad').classList;
    if (bkash.contains("active") || nagad.contains("active")) {  
       
    } else {
        alert("Error! You have not selected both methods.");
    }
}
function countrysho(){
   const thiscontry =  sessionStorage.getItem('country');
  const countrysho =  document.getElementById('countrysho');
  countrysho.value = thiscontry;
}

function psendmony(){
    // stroge
const adminname = sessionStorage.getItem("name");
const adminpin = sessionStorage.getItem("pin");
const adminimg = sessionStorage.getItem("img");
const adminid = sessionStorage.getItem("id");
// element
document.getElementById('adminpin').value = adminpin;
document.getElementById('adminname').value = adminname;
document.getElementById('adminid').value= adminid;
 document.getElementById('adminimg').value = adminimg;

}
document.addEventListener("DOMContentLoaded", psendmony);
