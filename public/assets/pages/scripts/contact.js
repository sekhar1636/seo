var map;
function initMap() {
map = new google.maps.Map(document.getElementById('gmapbg'), {
  center: {lat: -34.397, lng: 150.644},
  zoom: 8
});
}