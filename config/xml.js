// From the google maps api tutorial
// https://developers.google.com/maps/articles/phpsqlajax_v3
var customIcons = {
  restaurant: {
    icon: 'http://labs.google.com/ridefinder/images/mm_20_blue.png'
  },
  bar: {
    icon: 'http://labs.google.com/ridefinder/images/mm_20_red.png'
  }
};

function load() {
  var map = new google.maps.Map(document.getElementById("map"), {
    center: {lat: 32.995815, lng: -115.072800},
    zoom: 6
  });
  var infoWindow = new google.maps.InfoWindow;

  // Change this depending on the name of your PHP file
  downloadUrl("config/XMLGen.php", function(data) {
    var xml = data.responseXML;
    var markers = xml.documentElement.getElementsByTagName("marker");
    for (var i = 0; i < markers.length; i++) {
      var name = markers[i].getAttribute("name");
      var address = markers[i].getAttribute("address");
      var type = markers[i].getAttribute("type");
      var point = new google.maps.LatLng(
          parseFloat(markers[i].getAttribute("lat")),
          parseFloat(markers[i].getAttribute("lon")));
      var html = "<b>" + name + "</b> <br/>" + address;
      var icon = customIcons[type] || {};
      var marker = new google.maps.Marker({
        map: map,
        position: point,
        icon: icon.icon
      });
      bindInfoWindow(marker, map, infoWindow, html);
    }
  });
}

function bindInfoWindow(marker, map, infoWindow, html) {
  google.maps.event.addListener(marker, 'click', function() {
    infoWindow.setContent(html);
    infoWindow.open(map, marker);
  });
}

function downloadUrl(url, callback) {
  var request = window.ActiveXObject ?
      new ActiveXObject('Microsoft.XMLHTTP') :
      new XMLHttpRequest;

  request.onreadystatechange = function() {
    if (request.readyState == 4) {
      request.onreadystatechange = doNothing;
      callback(request, request.status);
    }
  };

  request.open('GET', url, true);
  request.send(null);
}

function doNothing() {}