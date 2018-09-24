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
                info: '<strong>The Metal Powder Company Ltd.,</strong><br/> Thirumangalam - 625 706. <br/>Madurai Dt., Tamilnadu, <br/>India.',
                lat: 9.837002, 
                long: 78.007419,
                color: "yellow"
            };

            var loc2 = {
                info: '<strong>SALES NETWORK : DELHI DEPOT</strong><br/>5-A,GROUND FLOOR, LANE NO.14,<br/>RAILWAY ROAD, SAMAIPUR, NORTH WEST DELHI,<br/>DELHI - 110 042.',
                lat: 28.710658, 
                long: 77.314418,
                color: "red"
                
            };

            var loc3 = {
                info: '<strong>SALES NETWORK : MUMBAI DEPOT</strong><br/>“Nain Krupa” Fourth Floor<br/>118/122 Kazi Syed Street<br/>Madvi, Mumbai – 400 003.',
                lat: 18.951092, 
                long: 72.836996,
                color: "red"
                
            };
            
                var loc4 = {
                info: '<strong>SALES NETWORK : SIVAKASI DEPOT</strong><br/>113, Velayutham Road<br/>Sivakasi – 626 123.',
                lat: 9.525528, 
                long: 77.855151,
                color: "red"
                
            };
            
            var loc5 = {
                info: '<strong>SALES NETWORK : CHENNAI DEPOT</strong><br/>26-27 Poonamallee High Road<br/>Periamet, Chennai – 600 003.',
                lat: 13.076264, 
                long: 80.213389,
                color: "red"
                
            };

        var loc6 = {
                info: '<strong>DEALERS : NORTHERN ZONE - NEW DELHI</strong><br/>M/s. MANGALCHAND BHANWARLAL AGENCIES<br/>3rd Floor, 4-E/7 Jhandewalan Extension,<br/>NEW DELHI - 110 055',
                lat: 28.645698, 
                long: 77.202462,
                color: "blue"
                
            };
            var loc7 = {
                info: '<strong>DEALERS : NORTHERN ZONE - DELHI</strong><br/>M/s. BAWA PAINTS PVT. LTD.,<br/>202, Katra Baryan, Fatehpuri, DELHI - 110 006.',
                lat: 28.655799, 
                long: 77.222605,
                color: "blue"
            };
            
            var loc8 = {
                info: '<strong>DEALERS : NORTHERN ZONE - NEW DELHI</strong><br/>M/s. KRISHNA RESINS & PIGMENTS PVT. LTD.<br/>C-705, 1ST Floor, Palam Extn.<br/>Sec 7 Near Ramfal Chowk Dwarka, NEW DELHI - 110 075.',
                lat: 28.585275, 
                long: 77.069741,
                color: "blue"
            };
            
            var loc9 = {
                info: '<strong>DEALERS : NORTHERN ZONE - DELHI</strong><br/>M/s. CDE CHEMICAL PVT. LTD.<br/>8-D, Big Jos Tower,<br/>A-8, Netaji Subhash Palace,<br/>Pitampura, DELHI - 110 034.',
                lat: 28.692065, 
                long: 77.151972,
                color: "blue"
                
            };

            var loc10 = {
                info: '<strong>DEALERS : NORTHERN ZONE - DELHI</strong><br/>M/s. R.S.CHEMICAL SUPPLIERS<br/>No.174/6, I Floor, Gali Abdul Hakim,<br/>Tilak Bazar, DELHI - 110 006.',
                lat: 28.658991, 
                long: 77.220946,
                color: "blue"
                
            };

            var loc11 = {
                info: '<strong>DEALERS : NORTHERN ZONE - NEW DELHI</strong><br/>M/s. KALRA SALES AGENCIES<br/>Shop No.1/CSC, A-1 Super Bazar,<br/>DDA Market, Rohtak Road,<br/>3 Pachhim Vihar, NEW DELHI – 110 063.',
                lat: 28.677678, 
                long: 77.107430,
                color: "blue"
                
            };
            
            var loc12 = {
                info: '<strong>DEALERS : NORTHERN ZONE - AMRITSAR</strong><br/>M/s. SUPERTEX CHEMICALS<br/>Inside Jay Textile Mills, P.O. Khalsa College,<br/>AMRITSAR - 143 002.',
                lat: 31.775115, 
                long: 75.005260,
                color: "blue"
                
            };
            var loc13 = {
                info: '<strong>DEALERS : NORTHERN ZONE - KISHANGARH</strong><br/>M/s. SHRI GANPATI TRADERS<br/>Divya Mansion. Ajmer Road<br/>Madangani, KISHANGARH – 305 801.',
                lat: 26.817773, 
                long: 75.258813,
                color: "blue"
                
            };
            var loc14 = {
                info: '<strong>DEALERS : NORTHERN ZONE - MANSA</strong><br/>M/s. NEW LUXMI MARKETING<br/>C/O. Bansal General Store,<br/>Near Khalsa High School<br/>Cinema Road, Mansa – 151 505.',
                lat: 30.054092, 
                long: 75.413507,
                color: "blue"
                
            };
            var loc15 = {
                info: '<strong>DEALERS : NORTHERN ZONE - LUDHIANA</strong><br/>M/s. SWASTIK INDUSTRIES<br/>No.5522, Street No.5,<br/>New Shivaji Nagar<br/>Ludhiana',
                lat: 30.927541, 
                long: 75.866797,
                color: "blue"
                
            };
            var loc16 = {
                info: '<strong>DEALERS : NORTHERN ZONE - LUCKNOW</strong><br/>M/s. TARACHAND RAVIKUMAR<br/>122/11, Ramdas Hata, Forsyth Road,<br/>Lalbagh, Lucknow – 226 001.',
                lat: 26.847503, 
                long: 80.938007,
                color: "blue"
                
            };
            var loc17 = {
                info: '<strong>DEALERS : NORTHERN ZONE - U.P. </strong><br/>M/s. PADMA CHEMICALS<br/>C. 19/15-A-2-1, Badshah Bagh Colony,<br/>Maldahiya, Varanasi - 221 001.<br/>U.P.',
                lat: 25.325561, 
                long: 82.995184,
                color: "blue"
                
            };
            var loc18 = {
                info: '<strong>DEALERS : WESTERN ZONE - MUMBAI</strong><br/>M/s. R.NAGARDAS & COMPANY<br/>179, Samuel Street, 1st Floor,<br/>(Khoja Galli), MUMBAI - 400 009.',
                lat: 18.951510, 
                long: 72.836651,
                color: "blue"
                
            };
            var loc19 = {
                info: '<strong>DEALERS : WESTERN ZONE - MUMBAI</strong><br/>M/s. ASANAND SONS<br/>304, Adamji Building, 3rd Floor<br/>413, Narshi Natha Road, MUMBAI - 400 009.',
                lat: 18.952899, 
                long: 72.837466,
                color: "blue"
                
            };
            var loc20 = {
                info: '<strong>DEALERS : WESTERN ZONE - MUMBAI</strong><br/>M/s. KRISHNA SOLVECHEM LTD.<br/>B/503, Sahayog, S.V.Road<br/>Kandivali (West), MUMBAI - 400 067.',
                lat: 19.202444, 
                long: 72.848912,
                color: "blue"
                
            };
            var loc21 = {
                info: '<strong>DEALERS : WESTERN ZONE - SURAT</strong><br/>M/s.ARYAN SALES<br/>129-130, Multi Story Building, Singapuri Wadi<br/>Rustampura, Ring Road, SURAT – 395 002.',
                lat: 21.185511, 
                long: 72.834189,
                color: "blue"
                
            };
            var loc22 = {
                info: '<strong>DEALERS : WESTERN ZONE - AHMEDABAD</strong><br/>M/s.JASH MARKETING<br/>49/3, Jagabhai Park, Near L.G. Hospitali<br/>Maninagar, Ahmedabad – 380 008.',
                lat: 23.000087, 
                long: 72.602206,
                color: "blue"
                
            };
            var loc23 = {
                info: '<strong>DEALERS : EASTERN ZONE - KOLKATA</strong><br/>M/s. NOBLE DYES<br/>11-A, Armenian Street, Room No. 8,<br/>KOLKATA - 700 001.',
                lat: 22.571570, 
                long: 88.347998,
                color: "blue"
                
            };
            var loc24 = {
                info: '<strong>DEALERS : EASTERN ZONE - KOLKATA</strong><br/>M/s. CHEMICAL TRADERS<br/>167, Netaji Subhas Road, Rajakatra,<br/>KOLKATA - 700 007.',
                lat: 22.582370, 
                long: 88.351262,
                color: "blue"
                
            };
            var loc25 = {
                info: '<strong>DEALERS : EASTERN ZONE - KOLKATA</strong><br/>M/s. PUNAM ENTERPRISES<br/>8 Sambhu Mullick Lane,<br/>Sinchania House, KOLKATA – 700 07.',
                lat: 22.572705, 
                long: 88.363877,
                color: "blue"
                
            };
            var loc26 = {
                info: '<strong>DEALERS : EASTERN ZONE - KOLKATA</strong><br/>M/s. SITALA CHEMICAL STORES<br/>15/13/36, Ghosh Para Road,<br/>Bagmore, P.O. Kanchrapara – 743 145<br/>Dist. North 24 Parganas<br/>West Bengal',
                lat: 22.961651, 
                long: 88.423396,
                color: "blue"
                
            };
            var loc27 = {
                info: '<strong>DEALERS : EASTERN ZONE - KOLKATA</strong><br/>M/s. AKSHAY KUMAR DUTT & SON<br/>2, Sir Hariram Goenka Street,<br/>Kolkata – 700 007.<br/>West Bengal',
                lat: 22.584341, 
                long: 88.352953,
                color: "blue"
                
            };
            var loc28 = {
                info: '<strong>DEALERS : EASTERN ZONE - RANCHI</strong><br/>M/s. BODHI SALES AGENCY<br/>Lalpur Super Market,<br/>1st Floor, Room No. – 6<br/>Lalpur, Ranchi – 834 001.<br/>Jharkhand',
                lat: 23.372980, 
                long: 85.340869,
                color: "blue"
                
            };
            var loc29 = {
                info: '<strong>DEALERS : SOUTHERN ZONE - BANGALORE</strong><br/>M/s.SHREYAS HI-TEK ASSOCIATES<br/>103, 2nd Floor, New I.T.Layout,<br/>II Block, 3rd Street, Nagarabhavi P.O.<br/>Bangalore – 560 072.',
                lat: 12.960362, 
                long: 77.508319,
                color: "blue"
                
            };
            var loc30 = {
                info: '<strong>DEALERS : SOUTHERN ZONE - SATTUR</strong><br/>M/s. MACS AGENCIES,<br/>55, North Car Street, Post Box No.1,<br/>Sattur – 626 203.',
                lat: 9.364808, 
                long: 77.910962,
                color: "blue"
                
            };
            var loc31 = {
                info: '<strong>DEALERS : SOUTHERN ZONE - SECUNDERABAD</strong><br/>M/s.NATIONAL CHEM<br/>Shop No.4-5-201 & 221/2 Pan Bazar<br/>Secunderabad – 500 003.',
                lat: 17.434817, 
                long: 78.489362,
                color: "blue"
                
            };
            var loc32 = {
                info: '<strong>DEALERS : SOUTHERN ZONE - KERALA</strong><br/>M/s.SREE LAKSHMI CHEMICALS,<br/>K.A.K.Complex, VADAKKENCHERRY P.O. - 678 683.<br/>Palakkad Dist. Kerala.',
                lat: 10.593791, 
                long: 76.482160,
                color: "blue"
                
            };
            var loc33 = {
                info: '<strong>DEALERS : SOUTHERN ZONE - BANGALORE</strong><br/>M/s. SUMMIT CORPORATION<br/># 41, 1st Cross, Post Box No.7123,<br/>Domlur 2nd Stage, Indira Nagar, Bangalore – 560 071.',
                lat: 12.957756, 
                long: 77.636016,
                color: "blue"
                
            };
            var loc34 = {
                info: '<strong>DEALERS : SOUTHERN ZONE - KERALA</strong><br/>M/s. P.R.KARUNAKARAN & CO.<br/>Near KSRTC Bus Station <br/>Tholikode P.O., Punalur – 691 333<br/>Kollam Dist. Kerala.',
                lat: 9.082077, 
                long: 76.915478,
                color: "blue"
                
            };
            var loc35 = {
                info: '<strong>DEALERS : SOUTHERN ZONE - ANDRA PRADESH</strong><br/>M/s. POOSARLA AGENCIES <br/>31-33-67/1, Neelamma Vepachettu, <br/>Assam Gardens<br/>Visakhapatnam – 530 020. <br/>Andra Pradesh.',
                lat: 17.718956, 
                long: 83.298825,
                color: "blue"
                
            };
            var loc36 = {
                info: '<strong>DEALERS : SOUTHERN ZONE - SIVAKASI</strong><br/>M/s. SHRI VAHINI DISTRIBUTORS<br/>62, New road street,<br/>Sivakasi – 626123',
                lat: 9.449794, 
                long: 77.802936,
                color: "blue"
                
            };
            
        

            var locations = [
              [loc1.info, loc1.lat, loc1.long, loc1.color, 0],
              [loc2.info, loc2.lat, loc2.long, loc2.color, 1],
              [loc3.info, loc3.lat, loc3.long, loc3.color, 2],
              [loc4.info, loc4.lat, loc4.long, loc4.color, 3],
              [loc5.info, loc5.lat, loc5.long, loc5.color, 4],
              [loc6.info, loc6.lat, loc6.long, loc6.color, 5],
              [loc7.info, loc7.lat, loc7.long, loc7.color, 6],
              [loc8.info, loc8.lat, loc8.long, loc8.color, 7],
              [loc9.info, loc9.lat, loc9.long, loc9.color, 8],
              [loc10.info, loc10.lat, loc10.long, loc10.color, 9],
              [loc11.info, loc11.lat, loc11.long, loc11.color, 10],
              [loc12.info, loc12.lat, loc12.long, loc12.color, 11],
              [loc13.info, loc13.lat, loc13.long, loc13.color, 12],
              [loc14.info, loc14.lat, loc14.long, loc14.color, 13],
              [loc15.info, loc15.lat, loc15.long, loc15.color, 14],
              [loc16.info, loc16.lat, loc16.long, loc16.color, 15],
              [loc17.info, loc17.lat, loc17.long, loc17.color, 16],
              [loc18.info, loc18.lat, loc18.long, loc18.color, 17],
              [loc19.info, loc19.lat, loc19.long, loc19.color, 18],
              [loc20.info, loc20.lat, loc20.long, loc20.color, 19],
              [loc21.info, loc21.lat, loc21.long, loc21.color, 20],
              [loc22.info, loc22.lat, loc22.long, loc22.color, 21],
              [loc23.info, loc23.lat, loc23.long, loc23.color, 22],
              [loc24.info, loc24.lat, loc24.long, loc24.color, 23],
              [loc25.info, loc25.lat, loc25.long, loc25.color, 24],
              [loc26.info, loc26.lat, loc26.long, loc26.color, 25],
              [loc27.info, loc27.lat, loc27.long, loc27.color, 26],
              [loc28.info, loc28.lat, loc28.long, loc28.color, 27],
              [loc29.info, loc29.lat, loc29.long, loc29.color, 28],
              [loc30.info, loc30.lat, loc30.long, loc30.color, 29],
              [loc31.info, loc31.lat, loc31.long, loc31.color, 30],
              [loc32.info, loc32.lat, loc32.long, loc32.color, 31],
              [loc33.info, loc33.lat, loc33.long, loc33.color, 32],
              [loc34.info, loc34.lat, loc34.long, loc34.color, 33],
              [loc35.info, loc35.lat, loc35.long, loc35.color, 34],
              [loc36.info, loc36.lat, loc36.long, loc36.color, 35],
              
              
              
            ];

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 5.1,
                center: new google.maps.LatLng(21.653146, 79.286068),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var infowindow = new google.maps.InfoWindow({});



            var marker, i;

            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map,
                    // icon: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png'
                    // icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|f9bc51'
                    icon: 'http://maps.google.com/mapfiles/ms/icons/'+locations[i][3]+'.png'
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