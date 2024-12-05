function loginapp() {
    let inputPin = document.getElementById("pin").value;
    fetch("src/admin.json")
        .then(response => {
            if (!response.ok) {
                throw new Error("Failed to load admin.json");
            }
            return response.json(); 
        })
        .then(adminPin => {
            let matchingPin = adminPin.find(pinObj => pinObj.pin === inputPin);
            if (matchingPin) {
                // Save the entire object as a JSON string
                sessionStorage.setItem("user", JSON.stringify(matchingPin));
                sessionStorage.setItem('verif',true)
               window.location.href="/home.html"
            } else {
                alert("Error: Invalid PIN");
            }
        })
        .catch(error => {
            console.error("Error loading or processing admin.json:", error);
            alert("An error occurred while checking the PIN.");
        });
}
