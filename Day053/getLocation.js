function initMap() {

    // マップの初期化
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: {lat: 35.37863914389595, lng: 139.78923633794594}
    });

    // クリックイベントを追加
    map.addListener('click', function(e) {
        getClickLatLng(e.latLng, map);
    });

    console.log('init!');
  }

let marker =[];
let count = 0;

function getClickLatLng(lat_lng, map) {

    // 座標を表示
    document.getElementById('lat').textContent = lat_lng.lat();
    document.getElementById('lng').textContent = lat_lng.lng();

    const option = {
    position: lat_lng,
    map: map
    }

    // マーカーを設置
    if(count == 0){
        marker[count] = new google.maps.Marker(option);
    }else{
        marker[count-1].visible = false;
        marker[count] = new google.maps.Marker(option);
    }
    count++;

    // 座標の中心をずらす
    // http://syncer.jp/google-maps-javascript-api-matome/map/method/panTo/
    map.panTo(lat_lng);

    $(".lat_input").val(lat_lng.lat());
    $(".lng_input").val(lat_lng.lng());
}

function setLocation(pos) {

    // 緯度・経度を取得
    const lat = pos.coords.latitude;
    const lng = pos.coords.longitude;

    // 座標を表示
    document.getElementById('lat').textContent = lat;
    document.getElementById('lng').textContent = lng;

    $(".lat_input").val(lat);
    $(".lng_input").val(lng);

    // マップの初期化
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: {lat: lat, lng: lng}
      });

      const option = {
        position: {lat: lat, lng: lng},
        map: map
        }

        // マーカーを設置
        if(count == 0){
            marker[count] = new google.maps.Marker(option);
        }else{
            marker[count-1].visible = false;
            marker[count] = new google.maps.Marker(option);
        }
        count++;

      // クリックイベントを追加
      map.addListener('click', function(e) {
          getClickLatLng(e.latLng, map);
      });

      console.log('init!');
}


  // エラー時に呼び出される関数
function showErr(err) {
    switch (err.code) {
        case 1 :
            alert("位置情報の利用が許可されていません");
            break;
        case 2 :
            alert("デバイスの位置が判定できません");
            break;
        case 3 :
            alert("タイムアウトしました");
            break;
        default :
            alert(err.message);
    }
}

function getCurrentLocation(){
    // geolocation に対応しているか否かを確認
    if ("geolocation" in navigator) {
        var opt = {
            "enableHighAccuracy": true,
            "timeout": 10000,
            "maximumAge": 0,
        };
        navigator.geolocation.getCurrentPosition(setLocation, showErr, opt);
    } else {
        alert("ブラウザが位置情報取得に対応していません");
    }
    $('.currentBtn').prop('disabled', false)
}


