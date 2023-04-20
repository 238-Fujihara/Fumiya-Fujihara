let map;
let marker = [];
let infoWindow = [];
const center = {
	lat:  39.099724,
	lng: -94.578331,
}

const markers = [
	{ lat: 47.608013, lng: -122.335167, url:"http://127.0.0.1:8000/public/seattle", name:"Seattle"},
	{ lat: 47.810654, lng: -122.37736, url: "http://127.0.0.1:8000/public/edmonds", name:"Edmonds"},
    { lat: 34.052235, lng:  -118.243683, url: "http://127.0.0.1:8000/public/la", name:"Los Angeles"},
	{ lat: 38.895, lng:  -77.0366, url: "http://127.0.0.1:8000/public/washington", name:"Washington DC"},
	{ lat: 31.000000, lng:  -100.000000, url: "http://127.0.0.1:8000/public/texas", name:"Texas"},
    { lat: 39.113014, lng:  -105.358887, url: "http://127.0.0.1:8000/public/colorado", name:"Colorado"},
 
 
];

function initMap()
{
	map = new google.maps.Map(document.getElementById("map"), {
		center: center,
		zoom: 4,
	});
	makeMarker();
}
function makeMarker() {
	for (let i = 0; i < markers.length; i++) {
		markerLatLng = new google.maps.LatLng({ lat: markers[i]['lat'], lng: markers[i]['lng'] });
        markerURL = markers[i]['url'];
        markerNAME = markers[i]['name'];
		marker[i] = new google.maps.Marker({
			position: markerLatLng,
			map: map
		});

		const content =  '<div id="content">' +
		'<div id="siteNotice">' +
		"</div>" +
		'<a href='+markerURL+' class="firstHeading">'+markerNAME+'</a>' +
		'<div id="bodyContent">' +
		"</div>" +
		"</div>";
        
	
		infoWindow[i] = new google.maps.InfoWindow({
			content: content
		});
	
		markerEvent(i);
	}
}

function markerEvent(i)
{
	marker[i].addListener('click', function ()
	{
		infoWindow.forEach( function (val,index,ar)
		{
			val.close();
		});
		infoWindow[i].open(map, marker[i]);
	});
}
