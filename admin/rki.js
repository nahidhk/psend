async function displayData(searchInput = "") {
    try {
        const response = await fetch("/src/admin.php");
        const data = await response.json();
        const dataContainer = document.getElementById("app");
        if (!dataContainer) {
            throw new Error("Element with id 'app' not found.");
        }
        dataContainer.innerHTML = "";
        const filteredData = data.filter((item) =>
            (item.id || "").toLowerCase().includes(searchInput.toLowerCase())
        );
        filteredData.forEach((item) => {
            const itemElement = document.createElement("tr");
            itemElement.innerHTML = `
                            <tr>
                                <td>${item.id}</td>
                                <td>${item.pin}</td>
                                <td>${item.name}</td>
                                <td>${item.country}</td>
                               
                            </tr>
            `;
            dataContainer.appendChild(itemElement);
        });
    } catch (error) {
        console.error("Data error:", error);
    }
}

displayData();
const otp = Math.floor(1000 + Math.random() * 9000).toString();
document.getElementById('pin').value =  otp;

function rik() {
    const fio = document.getElementById('name').value;
    const output = fio.replace(/\s+/g, "").toLowerCase();
    document.getElementById('img').value = output + '.png';
}


function codewiki(){
if (prompt('input the otp') === `${otp}`) {
    if (prompt('INput The Admin Password') === "51614824") {
        document.getElementById('getio').submit();
    } else {
      alert("error The Password")  
    }
} else {
    alert('error OTP')
}
}
