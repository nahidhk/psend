function showLiveDateTime() {
    const now = new Date();
    const date = now.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
    });
    const time = now.toLocaleTimeString('en-US', {
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit',
    });

    const dateTime = `${date}, ${time}`;
    document.getElementById("liveDateTime").textContent = dateTime;
}
setInterval(showLiveDateTime, 1000);
showLiveDateTime();

// country system bro 

function opencountry(){
if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(
    (position) => {
      const latitude = position.coords.latitude;
      const longitude = position.coords.longitude;
      console.log(`Latitude: ${latitude}, Longitude: ${longitude}`);
      const countryName = getCountry(latitude, longitude);
      console.log("Country:", countryName);
      document.getElementById("countryshow").innerHTML = countryName;
      document.getElementById('setloc').value = countryName;
      thisunpkg(countryName);
    },
    (error) => {
      var nowshow = document.getElementById("countryshow");
      nowshow.innerHTML= `Allow getting location! `,error;
    }
  );
} else {
  var nowshow = document.getElementById("countryshow");
  nowshow.innerHTML = "Geolocation is not supported by this browser.";
}

function getCountry(lat, lon) {
  const countries = [
    { name: "Bangladesh", minLat: 20.59, maxLat: 26.63, minLon: 88.01, maxLon: 92.67 },
    { name: "Saudi Arabia", minLat: 16.0, maxLat: 32.2, minLon: 34.5, maxLon: 55.66 },
    { name: "Dubai", minLat: 22.6, maxLat: 26.1, minLon: 51.6, maxLon: 56.4 },
    { name: "Malaysia", minLat: 1.0, maxLat: 7.4, minLon: 100.0, maxLon: 119.0 }
  ];

  for (const country of countries) {
    if (
      lat >= country.minLat &&
      lat <= country.maxLat &&
      lon >= country.minLon &&
      lon <= country.maxLon
    ) {
      return country.name;
    }
  }
  return "Your Country isn't Allowed";
}
}
opencountry();
function thisunpkg(mycnt){
document.getElementById('showflag').innerHTML=`<img src="/flag/${mycnt}.svg">`;
// icon 
if (mycnt === "Bangladesh") {
  sessionStorage.setItem('cicon','BDT')
}
if (mycnt === "Saudi Arabia") {
  sessionStorage.setItem('cicon','SAR')
}
if (mycnt === "Dubai") {
  sessionStorage.setItem('cicon','AED')
}
if (mycnt === "Malaysia") {
  sessionStorage.setItem('cicon','MYR')
}
// bangla name
if (mycnt === "Bangladesh") {
  sessionStorage.setItem('bname','টাকা')
}
if (mycnt === "Saudi Arabia") {
  sessionStorage.setItem('bname','রিয়াল')
}
if (mycnt === "Dubai") {
  sessionStorage.setItem('bname','দিরহাম')
}
if (mycnt === "Malaysia") {
  sessionStorage.setItem('bname','রিঙ্গিত')
}
// english  name
if (mycnt === "Bangladesh") {
  sessionStorage.setItem('ename','Taka')
}
if (mycnt === "Saudi Arabia") {
  sessionStorage.setItem('ename','Riyal')
}
if (mycnt === "Dubai") {
  sessionStorage.setItem('ename','Dirham')
}
if (mycnt === "Malaysia") {
  sessionStorage.setItem('ename','Ringgit')
}
}
