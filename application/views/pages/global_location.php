<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh" lang="zh">
    <title>Google Maps APIs</title>

    <link href="style.css" rel="stylesheet">
    <style type="text/css">
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        #map {
            height: 100%;
        }

        /*img[src="https://maps.gstatic.com/mapfiles/api-3/images/mapcnt6.png"] {
            display: none;
        }*/
    </style>
    <!-- Include jQuery library -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        
        <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script type="text/javascript">
        function initMap() {
    
            var loc1 = {
                info: 'Canada',
                lat: 55.212949, 
                long: -108.048653
            };

            var loc2 = {
                info: 'USA',
                lat: 39.744136, 
                long: -103.538215
                
            };

            var loc3 = {
                info: 'Mexico',
                lat: 23.501631, 
                long: -102.827603
                
            };
            
                var loc4 = {
                info: 'Colombia',
                lat: 3.796393, 
                long: -72.593228
                
            };
            
            var loc5 = {
                info: 'Brazil',
                lat: -8.521974, 
                long: -56.193184
                
            };

        var loc6 = {
                info: 'Argentina',
                lat: -35.412019, 
                long: -66.036935
                
            };
            var loc7 = {
                info: 'UK',
                lat: 54.402530, 
                long: -2.579903
            };
            
            var loc8 = {
                info: 'Portugal',
                lat: 38.181508, 
                long: -8.029122
            };
            
            var loc9 = {
                info: 'Spain',
                lat: 41.421599, 
                long: -2.755685
                
            };

            var loc10 = {
                info: 'France',
                lat: 46.599903, 
                long: 2.341972
                
            };

            var loc11 = {
                info: 'Belgium',
                lat: 50.607193, 
                long: 4.890800
                
            };
            
            var loc12 = {
                info: 'Denmark',
                lat: 55.661692, 
                long: 9.109550
                
            };
            var loc13 = {
                info: 'Germany',
                lat: 51.216760, 
                long: 9.636894
                
            };
            var loc14 = {
                info: 'Italy',
                lat: 43.176621, 
                long: 12.273612
                
            };
            var loc15 = {
                info: 'Malta',
                lat: 35.884944, 
                long: 14.451411
                
            };
            var loc16 = {
                info: 'Greece',
                lat: 39.438012, 
                long: 22.340974
                
            };
            var loc17 = {
                info: 'Bulgaria',
                lat: 42.560655, 
                long: 25.112484
                
            };
            var loc18 = {
                info: 'Turkey',
                lat: 38.951151, 
                long: 35.126870
                
            };
            var loc19 = {
                info: 'Lebanon',
                lat: 34.236541, 
                long: 35.976799
                
            };
            var loc20 = {
                info: 'Israel',
                lat: 30.968630, 
                long: 34.905149
                
            };
            var loc21 = {
                info: 'Egypt',
                lat: 26.664051, 
                long: 29.805572
                
            };
            var loc22 = {
                info: 'Syria',
                lat: 35.027086, 
                long: 38.415727
                
            };
            var loc23 = {
                info: 'Iraq',
                lat: 33.036698, 
                long: 42.924049
                
            };
            var loc24 = {
                info: 'Jordan',
                lat: 31.757471, 
                long: 36.974543
                
            };
            var loc25 = {
                info: 'Kuwait',
                lat: 29.339125, 
                long: 47.469324
                
            };
            var loc26 = {
                info: 'Saudi Arabia',
                lat: 23.688102, 
                long: 44.956489
                
            };
            var loc27 = {
                info: 'Yemen',
                lat: 15.836231, 
                long: 47.543231
                
            };
            var loc28 = {
                info: 'UAE',
                lat: 24.059809, 
                long: 54.379620
                
            };
            var loc29 = {
                info: 'Iran',
                lat: 32.008496, 
                long: 54.231806
                
            };
            var loc30 = {
                info: 'Kenya',
                lat: 0.410486, 
                long: 37.824472
                
            };
            var loc31 = {
                info: 'South Africa',
                lat: -30.886770, 
                long: 23.473075
                
            };
            var loc32 = {
                info: 'Madagaskar',
                lat: -21.278327, 
                long: 46.088590
                
            };
            var loc33 = {
                info: 'Mauritius',
                lat: -20.266238, 
                long: 57.552665
                
            };
            var loc34 = {
                info: 'Pakistan',
                lat: 29.894071, 
                long: 69.220145
                
            };
            var loc35 = {
                info: 'India',
                lat: 22.893715, 
                long: 79.063896
                
            };
            var loc36 = {
                info: 'Srilanka',
                lat: 7.510711, 
                long: 80.601982
                
            };
            var loc37 = {
                info: 'Nepal',
                lat: 28.281240, 
                long: 83.941825
                
            };
            var loc38 = {
                info: 'Bangaladesh',
                lat: 24.102715, 
                long: 89.434989
                
            };
            var loc39 = {
                info: 'Burma',
                lat: 20.936897, 
                long: 96.334403
                
            };
            var loc40 = {
                info: 'China',
                lat: 34.720015, 
                long: 103.585380
                
            };
            var loc41 = {
                info: 'Russia',
                lat: 62.153229, 
                long: 99.146903
                
            };
            var loc42 = {
                info: 'Thailand',
                lat: 15.724668, 
                long: 100.904716
                
            };
            var loc43 = {
                info: 'Vietnam',
                lat: 14.409228, 
                long: 108.111747
                
            };
            var loc44 = {
                info: 'Hongkong',
                lat: 22.244442, 
                long: 114.143241
                
            };
            var loc45 = {
                info: 'Malaysia',
                lat: 3.753081, 
                long: 101.846717
                
            };
            var loc46 = {
                info: 'Singapore',
                lat: 1.351679, 
                long: 103.832600
                
            };
            var loc47 = {
                info: 'Indonesia',
                lat: -4.340387, 
                long: 122.097497
                
            };
            var loc48 = {
                info: 'Philippines',
                lat: 12.462151, 
                long: 123.142699
                
            };
            var loc49 = {
                info: 'Taiwan',
                lat: 24.242047, 
                long: 121.000036
                
            };
            var loc50 = {
                info: 'Korea',
                lat: 38.357183, 
                long: 127.297375
                
            };
            var loc51 = {
                info: 'Japan',
                lat: 36.510724, 
                long: 138.245862
                
            };
            var loc52 = {
                info: 'Australia',
                lat: -25.029644, 
                long: 133.935300
                
            };
        

            var locations = [
              [loc1.info, loc1.lat, loc1.long, 0],
              [loc2.info, loc2.lat, loc2.long, 1],
              [loc3.info, loc3.lat, loc3.long, 2],
              [loc4.info, loc4.lat, loc4.long, 3],
              [loc5.info, loc5.lat, loc5.long, 4],
              [loc6.info, loc6.lat, loc6.long, 5],
              [loc7.info, loc7.lat, loc7.long, 6],
              [loc8.info, loc8.lat, loc8.long, 7],
              [loc9.info, loc9.lat, loc9.long, 8],
              [loc10.info, loc10.lat, loc10.long, 9],
              [loc11.info, loc11.lat, loc11.long, 10],
              [loc12.info, loc12.lat, loc12.long, 11],
              [loc13.info, loc13.lat, loc13.long, 12],
              [loc14.info, loc14.lat, loc14.long, 13],
              [loc15.info, loc15.lat, loc15.long, 14],
              [loc16.info, loc16.lat, loc16.long, 15],
              [loc17.info, loc17.lat, loc17.long, 16],
              [loc18.info, loc18.lat, loc18.long, 17],
              [loc19.info, loc19.lat, loc19.long, 18],
              [loc20.info, loc20.lat, loc20.long, 19],
              [loc21.info, loc21.lat, loc21.long, 20],
              [loc22.info, loc22.lat, loc22.long, 21],
              [loc23.info, loc23.lat, loc23.long, 22],
              [loc24.info, loc24.lat, loc24.long, 23],
              [loc25.info, loc25.lat, loc25.long, 24],
              [loc26.info, loc26.lat, loc26.long, 25],
              [loc27.info, loc27.lat, loc27.long, 26],
              [loc28.info, loc28.lat, loc28.long, 27],
              [loc29.info, loc29.lat, loc29.long, 28],
              [loc30.info, loc30.lat, loc30.long, 29],
              [loc31.info, loc31.lat, loc31.long, 30],
              [loc32.info, loc32.lat, loc32.long, 31],
              [loc33.info, loc33.lat, loc33.long, 32],
              [loc34.info, loc34.lat, loc34.long, 33],
              [loc35.info, loc35.lat, loc35.long, 34],
              [loc36.info, loc36.lat, loc36.long, 35],
              [loc37.info, loc37.lat, loc37.long, 36],
              [loc38.info, loc38.lat, loc38.long, 37],
              [loc39.info, loc39.lat, loc39.long, 38],
              [loc40.info, loc40.lat, loc40.long, 39],
              [loc41.info, loc41.lat, loc41.long, 40],
              [loc42.info, loc42.lat, loc42.long, 41],
              [loc43.info, loc43.lat, loc43.long, 42],
              [loc44.info, loc44.lat, loc44.long, 43],
              [loc45.info, loc45.lat, loc45.long, 44],
              [loc46.info, loc46.lat, loc46.long, 45],
              [loc47.info, loc47.lat, loc47.long, 46],
              [loc48.info, loc48.lat, loc48.long, 47],
              [loc49.info, loc49.lat, loc49.long, 48],
              [loc50.info, loc50.lat, loc50.long, 49],
              [loc51.info, loc51.lat, loc51.long, 50],
              [loc52.info, loc52.lat, loc52.long, 51],
              
              
            ];

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 2.1,
                center: new google.maps.LatLng(35.884944, 14.451411),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var infowindow = new google.maps.InfoWindow({});

            var marker, i;

            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map,
                    // icon: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png'
                    icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|f9bc51'
                });

                google.maps.event.addListener(marker, 'mouseover', (function (marker, i) {
                    return function () {
                        infowindow.setContent(locations[i][0]);
                        infowindow.open(map, marker);

                    }
                })(marker, i));
                google.maps.event.addListener(marker, 'mouseout', function(){
                  infowindow.close();
               });
            }
        }
    </script>
</head>

<body>

    <div id="map"></div>

    <script src="script.js"></script>
    <!-- <script async defer 
                    src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script> -->
    <script async defer 
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyArwVXvkU7BfAybwkZ8NxzIwJdkAqQhe70&callback=initMap"></script>
                    

</body>

</html>