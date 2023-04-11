// googleMapsAPIを持ってくるときに,callback=initMapと記述しているため、initMap関数を作成
function initMap() {
    // welcome.blade.phpで描画領域を設定するときに、id=mapとしたため、その領域を取得し、mapに格納します。
    map = document.getElementById("map");
    let seattle = {lat: 47.608013, lng: -122.335167};

    // let edmonds = {lat: 47.810654, lng: 1222238};
    // オプションを設定
    opt = {
        zoom: 11, //地図の縮尺を指定
        center: seattle, //センターをシアトルに指定
    };
    // 地図のインスタンスを作成します。第一引数にはマップを描画する領域、第二引数にはオプションを指定
    mapObj = new google.maps.Map(map, opt);

    marker = new google.maps.Marker({
        // ピンを差す位置を決めます。
        position: seattle,
        // position: edmonds,
	// ピンを差すマップを決めます。
        map: mapObj,
	// ホバーしたときに「tokyotower」と表示されるようにします。
        title: 'Seattle',
        // title: 'Edmonds',
    });
}