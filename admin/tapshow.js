async function displayData(searchInput = "") {
    try {
        const response = await fetch("/src/psend.php");
        const data = await response.json();
        const dataContainer = document.getElementById("app");
        if (!dataContainer) {
            throw new Error("Element with id 'app' not found.");
        }
        dataContainer.innerHTML = "";
        const filteredData = data.filter((item) =>
            (item.adminpin || "").toLowerCase().includes(searchInput.toLowerCase()) ||
            (item.transition || "").toLowerCase().includes(searchInput.toLowerCase()) ||
            (item.methoads || "").toLowerCase().includes(searchInput.toLowerCase()) ||
            (item.postdate || "").toLowerCase().includes(searchInput.toLowerCase()) ||
            (item.sendaccno || "").toLowerCase().includes(searchInput.toLowerCase()) ||
            (item.statust || "").toLowerCase().includes(searchInput.toLowerCase()) ||
            (item.currency || "").toLowerCase().includes(searchInput.toLowerCase()) ||
            (item.id || "").toLowerCase().includes(searchInput.toLowerCase()) || 
            (item.accno || "").toLowerCase().includes(searchInput.toLowerCase()) || 
            (item.typex || "").toLowerCase().includes(searchInput.toLowerCase())
        );
        filteredData.forEach((item) => {
            const itemElement = document.createElement("tr");
            itemElement.innerHTML = `
                <td>${item.id}</td>
                <td>${item.transition}</td>
                <td>${item.methoads} <br> ${item.accno}</td>
                <td>${item.cpt}  ${item.currency}</td>
                <td>${item.bdt} BDT</td>
                <td>${item.fee} BDT</td>
                <td>${item.postdate}</td>
                <td>send BDT : ${item.sendbdt} BDT <br> Due BDT : ${item.duebdt} BDT <br> send acc no : ${item.sendaccno} <br> type :
                    ${item.typex} <br> t.id : ${item.trx}
                </td>
                <td >
                    <div style="display: flex;">
                        <div>
                            <img style="height: 60px;width: 60px;border: 1px solid #4680ff;" src="/img/${item.adminimg}">  
                        </div>
                        <div>
                           Name: ${item.adminname} <br>
                           Code : ${item.adminpin} <br>
                          <br>
                           Post :${item.postdate} 
                        </div>
                    </div>
                </td>
                <td>
                   <div style="display: flex; justify-content: space-around;">
                    <div style="background-color:#${item.statuscolor};" class="btn">${item.statust}..</div>
                    <div onclick="window.location.href='/'" style="background-color: #ff1410;" class="btn"><i class="fa-solid fa-xmark"></i></div>
                    <div onclick="window.location.href='/'" style="background-color: #4680ff;" class="btn" ><i class="fa-solid fa-check"></i></div>
                    <div onclick="window.location.href='/'" style="background-color: #ff0400;" class="btn"><i class="fa-solid fa-trash-can"></i></div>
                    <div onclick="window.location.href='/'" style="background-color: #be3735;" class="btn"><i class="fa-solid fa-ban"></i></div>
                   </div> 
                </td>
            `;
            dataContainer.appendChild(itemElement);
        });
    } catch (error) {
        console.error("Data error:", error);
    }
}

function searchData() {
const serachdata1 =  document.getElementById('search').value;
const serachdata2 =  document.getElementById('search1').value;
displayData(serachdata1 + serachdata2);
}
displayData();
function adminser() {
    const jsonFileUrl = '/src/admin.php';
    fetch(jsonFileUrl)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(jsonData => {
            const selectElement = document.getElementById('search');
            jsonData.forEach(user => {
                const option = document.createElement('option');
                option.value = user.pin;
                option.textContent = user.name;
                selectElement.appendChild(option);
            });
        })
        .catch(error => {
            console.error('Error loading JSON:', error);
        });
} adminser();




function dueck() {
    const fixprice = document.getElementById('fixprice').value;
    const sendbdt = document.getElementById('sendbdt').value;
    document.getElementById('deubdt').value = fixprice - sendbdt;
}

function ckidnx() {
    const myid = document.getElementById("myid").value;
    fetch("/src/psend.php")
        .then((response) => response.json())
        .then((data) => {
            let found = false;
            data.forEach((item) => {
                if (myid === item.id) {
                    found = true;
                    document.getElementById("myerror").innerHTML = "";
                    document.getElementById('fixprice').value = item.bdt;
                    document.getElementById('myaccno').innerHTML = item.accno;
                    document.getElementById('mycpt').innerHTML = item.cpt;
                    document.getElementById('mydate').innerHTML = item.created_at;
                    document.getElementById("sendbdt").value = item.sendbdt;
                    document.getElementById("sendaccno").value = item.sendaccno;
                    document.getElementById("deubdt").value = item.duebdt;
                    document.getElementById("trx").value = item.sendbdt;
                    document.getElementById("typex").value = item.typex;
                }
            });

            if (!found) {
                document.getElementById("myerror").innerHTML = "Error This ID! and Not Found";
                document.getElementById('fixprice').value = "00";
                document.getElementById('myaccno').innerHTML = "Null";
                document.getElementById('mycpt').innerHTML = "Null";
                document.getElementById('mydate').innerHTML = "Nul";
                document.getElementById("sendbdt").value = "00";
                document.getElementById("sendaccno").value = "00";
                document.getElementById("deubdt").value = "00";
                document.getElementById("trx").value = "00";
                document.getElementById("typex").value = "00";
                console.log("error");
            }
        })
        .catch((error) => {
            document.getElementById("myerror").innerHTML = "Failed to fetch data. Please try again later.";
            console.log("Error:", error);
        });
}
