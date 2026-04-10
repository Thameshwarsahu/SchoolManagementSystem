// MAIN MAP
var mymap = L.map("leaflet-map").setView([51.505, -0.09], 13);

L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution: '&copy; OpenStreetMap contributors'
}).addTo(mymap);


// MARKER MAP
var markermap = L.map("leaflet-map-marker").setView([51.505, -0.09], 13);

L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution: '&copy; OpenStreetMap contributors'
}).addTo(markermap);

L.marker([51.5, -0.09]).addTo(markermap);
L.circle([51.508, -0.11], {
    color: "#34c38f",
    fillColor: "#34c38f",
    fillOpacity: 0.5,
    radius: 500
}).addTo(markermap);

L.polygon([[51.509, -0.08], [51.503, -0.06], [51.51, -0.047]], {
    color: "#5b73e8",
    fillColor: "#5b73e8"
}).addTo(markermap);


// POPUP MAP
var popupmap = L.map("leaflet-map-popup").setView([51.505, -0.09], 13);

L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution: '&copy; OpenStreetMap contributors'
}).addTo(popupmap);

L.marker([51.5, -0.09])
    .addTo(popupmap)
    .bindPopup("<b>Hello world!</b><br />I am a popup.")
    .openPopup();

L.circle([51.508, -0.11], {
    color: "#f46a6a",
    fillColor: "#f46a6a",
    fillOpacity: 0.5,
    radius: 500
}).addTo(popupmap).bindPopup("I am a circle.");

L.polygon([[51.509, -0.08], [51.503, -0.06], [51.51, -0.047]], {
    color: "#5b73e8",
    fillColor: "#5b73e8"
}).addTo(popupmap).bindPopup("I am a polygon.");


// CUSTOM ICON MAP
var customiconsmap = L.map("leaflet-map-custom-icons").setView([51.5, -0.09], 13);

L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution: '&copy; OpenStreetMap contributors'
}).addTo(customiconsmap);

var LeafIcon = L.Icon.extend({
    options: {
        iconSize: [45, 95],
        iconAnchor: [22, 94],
        popupAnchor: [-3, -76]
    }
});

var greenIcon = new LeafIcon({
    iconUrl: "assets/images/logo.svg"
});

L.marker([51.5, -0.09], { icon: greenIcon }).addTo(customiconsmap);


// INTERACTIVE MAP
var interactivemap = L.map("leaflet-map-interactive-map").setView([37.8, -96], 4);

function getColor(d) {
    return d > 1000 ? "#497fe5" :
        d > 500 ? "#5b73e8" :
            d > 200 ? "#6d99eb" :
                d > 100 ? "#7fa5ed" :
                    d > 50 ? "#91b2f0" :
                        d > 20 ? "#a3bef2" :
                            d > 10 ? "#b4cbf5" :
                                "#bdd1f6";
}

function style(feature) {
    return {
        weight: 2,
        opacity: 1,
        color: "white",
        dashArray: "3",
        fillOpacity: 0.7,
        fillColor: getColor(feature.properties.density)
    };
}

L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution: '&copy; OpenStreetMap contributors'
}).addTo(interactivemap);


// LAYER CONTROL MAP
var cities = L.layerGroup();

L.marker([39.61, -105.02]).bindPopup("Littleton").addTo(cities);
L.marker([39.74, -104.99]).bindPopup("Denver").addTo(cities);
L.marker([39.73, -104.8]).bindPopup("Aurora").addTo(cities);
L.marker([39.77, -105.23]).bindPopup("Golden").addTo(cities);

var streetLayer = L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png");

var layergroupcontrolmap = L.map("leaflet-map-group-control", {
    center: [39.73, -104.99],
    zoom: 10,
    layers: [streetLayer, cities]
});

var baseLayers = {
    "Street": streetLayer
};

var overlays = {
    "Cities": cities
};

L.control.layers(baseLayers, overlays).addTo(layergroupcontrolmap);