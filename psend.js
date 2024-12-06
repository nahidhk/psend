
function cruncy() {
    const bname = sessionStorage.getItem("bname");
    const currency = sessionStorage.getItem("cicon")
    document.getElementById("showbname").innerHTML = bname;
    document.getElementById("currency").value = currency;

}
cruncy();


totalcal();



let jsondata = [];

// JSON ডেটা লোড করা
fetch("/src/price.json")
    .then(response => {
        if (!response.ok) {
            throw new Error("Network response was not ok " + response.statusText);
        }
        return response.json();
    })
    .then(data => {
        jsondata = data;
        // JSON লোড হওয়ার পর প্রথমে totalcal() কল
        totalcal();
    })
    .catch(error => console.error("There was a problem with the fetch operation:", error));

function totalcal() {
    const inputcode = document.getElementById("currency").value;
    const outputprice = document.getElementById('price');
    const showflag = document.getElementById("showflag");

    // JSON ডেটা থেকে মিল পাওয়া কি না
    const selectedData = jsondata.find(item => item.code === inputcode);

    if (selectedData) {
        outputprice.value = selectedData.price;
        showflag.src = selectedData.flag;
    } else {
        outputprice.value = "";
        showflag.src = "";
    }
}

// সিলেক্ট অপশন পরিবর্তন হলে totalcal() কল
document.getElementById("currency").addEventListener("change", totalcal);





//  Calculator

function calculatorio() {
    const cpt = document.getElementById('cpt');
    const bdt = document.getElementById('bdt');
    const price = document.getElementById('price').value;
    const charge = 0.017;
    const totalcash = cpt.value * price;
    const totalcharge = totalcash * charge
    const totals = totalcash - totalcharge;
    bdt.value = totals;
}