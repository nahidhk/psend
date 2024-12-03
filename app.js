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
 

fetch('https://cors-anywhere.herokuapp.com/https://ipapi.co/json/')
  .then(response => response.json())
  .then(data => {
    console.log('Country:', data.country_name);
  })
  .catch(error => console.error('Error:', error));
