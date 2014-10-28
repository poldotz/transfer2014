
var map 	= '';
var mapOptions	= '';
var geocoder	= '';
var latitude	= 39.20961309028289;
var longitude	= 9.1216537832031;
var styles 	= [
    {
        featureType: "poi",
        elementType: "labels",
        stylers: [
            { visibility: "off" }
        ]
    }
];
function initialize() {
    mapOptions = {
        zoom: 15,
        center: new google.maps.LatLng(latitude, longitude) ,
        panControl: false,
        overviewMapControl: false,
        streetViewControl: false,
        zoomControl: true,
        zoomControlOptions: {
            style: google.maps.ZoomControlStyle.SMALL,
            position: google.maps.ControlPosition.RIGHT_CENTER
        },
        mapTypeControl: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles: styles
    }

    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    geocoder = new google.maps.Geocoder();

    var mapLatlng = new google.maps.LatLng(latitude, longitude);
    var marker = new google.maps.Marker({
        position: mapLatlng,
        map: map,
        icon: 'http://dev.mess.marinanow.com/assets/img/marker-red.png',
        animation: google.maps.Animation.DROP,
        draggable: true
    });

    google.maps.event.addListener(marker, "dragend", function (event) {
        if (this.position.lat() != '' && this.position.lng() != '' ) {
            jQuery("#boat_latitude").val(this.position.lat());
            jQuery("#boat_longitude").val(this.position.lng());
        }
        var latlng = new google.maps.LatLng(this.position.lat(), this.position.lng());
        geocoder.geocode({'latLng': latlng}, function(results, status) {
            setAddress(results, status);
            jQuery("#address_accuracy").val('5');
        });
    });
}
function setAddress (results, status) {
    if (status == google.maps.GeocoderStatus.OK){
        jQuery("#location-error").css('display', 'none');
        jQuery("#formatted-addr").html(results[2].formatted_address);
        var component = results[0].address_components;
        var street,route,sublocality,address='';

        for(i=0;i<component.length;i++){
            if(component[i].types[0] == 'street_number' || component[i].types[0] == ''){
                street 	= component[i].long_name.trim();
            }else if(component[i].types[0] == 'locality'){
                if (component[i].long_name != '') {
                    jQuery("#city").val(component[i].long_name);
                }else{
                    jQuery("#city").val('');
                }
            }else if(component[i].types[0] == 'administrative_area_level_1'){
                if (component[i].long_name != '') {
                    jQuery("#state").val(component[i].long_name);
                    jQuery("#boat_state_en").val(component[i].long_name);
                }else{
                    jQuery("#state").val('');
                }
            }else if(component[i].types[0] == 'route'){
                route = component[i].long_name.trim();
            }else if(component[i].types[0] == 'sublocality'){
                if(sublocality.trim() != '' && sublocality.trim() != undefined && sublocality != 'Undefined'){
                    sublocality += ',' + component[i].long_name;
                }else{
                    sublocality = component[i].long_name.trim();
                }
            }else if (component[i].types[0] == 'postal_code'){
                if (component[i].long_name != '') {
                    jQuery("#zip").val(component[i].long_name);
                }else{
                    jQuery("#zip").val('');
                }
            }else if (component[i].types[0] == 'country') {
                var countryCode	= component[i].short_name;
                jQuery("#countryList option").each(function(){
                    if (jQuery(this).attr('value') == countryCode ) {
                        jQuery(this).attr('selected', 'selected');
                    }
                });
            }
            //}
            if (street != '' && street != undefined) {
                jQuery("#street_addr").val(street);
            }else{
                jQuery("#street_addr").val('');
            }
            if (route != '' && route != undefined) {
                if ( jQuery("#street_addr").val().trim() != '' )
                    jQuery("#street_addr").val(jQuery("#street_addr").val()+", "+route);
                else
                    jQuery("#street_addr").val(route);
            }
            if (sublocality != '' && sublocality != undefined) {
                if ( jQuery("#street_addr").val().trim() != '' )
                    jQuery("#street_addr").val(jQuery("#street_addr").val()+", "+sublocality);
                else
                    jQuery("#street_addr").val(sublocality);
            }

            if (street == '' && route == '' && sublocality == '' ) {
                jQuery("#street_addr").val('');
            }

            var combAddress		= jQuery("#street_addr").val()+", "+jQuery('#zip').val()+", "+jQuery('#city').val()+", "+jQuery('#state').val();

            jQuery("#formatted-addr").html(results[2].formatted_address);
            //jQuery("#formatted-addr").html(results[2].formatted_address);
            jQuery("#address_is_set").val('1');
        }
    }
}
function slideMap() {
    jQuery('#map-data').fadeToggle();
    google.maps.event.trigger(map, 'resize');
    map.panTo(new google.maps.LatLng(latitude, longitude));
}
google.maps.event.addDomListener(window, 'load', initialize);
