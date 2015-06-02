var currentLocName;
var map={};
var markers = [];

var initialize = function (location) {
    getLocNameByLatLng(location);  

    }
   
var createMapMarker = function (locationArray) {
    if($.isEmptyObject(map)){
        map = new google.maps.Map(document.getElementById("map_canvas"));
    }
    removeAllMarker();
    if (typeof locationArray != undefined) {
        for (var a = 0; a < locationArray.length; a++) {
            var locationTemp = new google.maps.LatLng(locationArray[a].locationLat, locationArray[a].locationLog);
            if (a == 0) {
                 mapOptions = {
                    center: locationTemp,
                    zoom: 12,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                console.log(mapOptions);
                map.setOptions(mapOptions);
            }
            createMarkerWithLabel(locationTemp, map, locationArray[a].tag);
        }
    }
}

var createMarkerWithLabel = function (position, map, labelContent) {
    var marker = new MarkerWithLabel({
        position: position,
        map: map,
        labelContent: labelContent,
        labelAnchor: new google.maps.Point(4, 37),
        labelClass: "labels"
    });
    markers.push(marker);
};

var removeAllMarker = function () {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(null);
    }
}

var getLocNameByLatLng = function(location) {
    var geocoder = new google.maps.Geocoder();
    if (!isUndefine(location)) {
        var latlng = new google.maps.LatLng(location.coords.latitude, location.coords.longitude);
        geocoder.geocode({
            'latLng': latlng
        }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                currentLocName = results[0].formatted_address;
                updateMyLocationDom();
            } else {
                alert("Geocoder failed due to: " + status);
            }
        });
    }
};

var updateMyLocationDom = function() {
    if (isUndefine(currentLocName)) {
        updateMyLocationDom();
    } else {
        $("#my_location").html(currentLocName);
    }
}

var isUndefine = function(obj) {
    return (obj === undefined || obj === null)
}

$(function() {
    navigator.geolocation.getCurrentPosition(function(position) {
        initialize(position);
    }, function() {
        initialize(null);
    });
});

