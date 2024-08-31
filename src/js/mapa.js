(function () {
  const mapa = document.querySelector("#mapa");
  if (mapa) {

    const lat = -11.9810596;
    const lng = -77.0013451;
    const zoom = 16;

    const map = L.map("mapa").setView([lat, lng], zoom);

    L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
      attribution:
        '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    }).addTo(map);

    L.marker([lat, lng])
      .addTo(map)
      .bindPopup(`
            <h2 >UCV</h2>
            <p >Grupo 10</p>
        `)
      .openPopup();
  }
})();
