<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="https://code.jquery.com/jquery-3.6.4.slim.js" integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>
   <style>
       #fancy_table{
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
             width: 75%;
            margin: auto;
            margin-bottom: 75px;
       }
       #fancy_table td, #fancy_table th{
            border: 1px solid #ddd;
            padding: 8px;
       }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}
       #fancy_table th{
            text-align: center;
            padding-top: 12px;
            padding-bottom: 12px;
            background-color: #04AA6D;
            color: white;
       }
       #fancy_table_2, #fancy_table_3{
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
             width: 75%;
            margin: auto;
            margin-bottom: 75px;
       }
       #fancy_table_2 td, #fancy_table_2 th, #fancy_table_3 td, #fancy_table_3 th{
            border: 1px solid #ddd;
            padding: 8px;
       }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}
       #fancy_table_2 th, #fancy_table_3 th{
            text-align: center;
            padding-top: 12px;
            padding-bottom: 12px;
            background-color: #04AA6D;
            color: white;
       }
       #file_selection, #generate_report{
           width: 100%;
           text-align: center;
            margin: 25px;
        }
        .modal_bg {
            display: none;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.75);
            position: fixed;
            z-index: 10000;
            top: 0;
            left: 0;
            }
            .modal {
            position: absolute;
            z-index: 100000;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: whitesmoke;
            padding: 25px;
            border-radius: 6px;
            display: flex;
            flex-direction:column;
            }
            .modal_button{
                margin: auto;
                margin-top: 25px;
                margin-bottom: 25px;
                width: 100px;
                height: 25px;
            }

            .map_heading{
                text-align: center;
                margin: auto;
                margin-bottom: 20px;
                font-size: 20px;
            }
            .person_name{
                font-weight: bold;
            }
            .special_table{
                width: 100% !important;
            }
   </style>
</head>
<body>

<div class="modal_bg" id="report_modal">
    <div class="modal">

        <h3 class="section_heading">Membership Breakdown By Municipality - based on 5 year census</h3>

            <table id="fancy_table_2" class="special_table">
                <tr class="table_header">
                    <th class="table_col">Municipality</th>
                    <th class="table_col">Members</th>
                    <th class="table_col">Contribution</th>
                    <th class="table_col">Contribution Per Member</th>
                </tr>
                <tr class="table_row">
                    <td class="table_col">City of South Lyon</td>
                    <td class="table_col" id="south_lyon_members">123</td>
                    <td class="table_col">2022-2023 Contribution $43,000</td>
                    <td class="table_col" id="south_lyon_contribution"></td>
                </tr>
                <tr class="table_row">
                    <td class="table_col">Green Oak Township</td>
                    <td class="table_col" id="green_oak_members">123</td>
                    <td class="table_col">2022-2023 Contribution $20,603</td>
                    <td class="table_col" id="green_oak_contribution"></td>
                </tr>
                <tr class="table_row">
                    <td class="table_col">Lyon Township</td>
                    <td class="table_col" id="lyon_township_members">123</td>
                    <td class="table_col">2022-2023 Contribution $30,000</td>
                    <td class="table_col" id="lyon_township_contribution"></td>
                </tr>
                <tr class="table_row">
                    <td class="table_col">Other</td>
                    <td class="table_col" id="other_members">123</td>
                    <td class="table_col"></td>
                    <td class="table_col" id="">$37.00 - Self Paid</td>
                </tr>
                <tr class="table_row">
                    <td class="table_col">Total Registered Members</td>
                    <td class="table_col" id="total_reg_members">456</td>
                    <td class="table_col">$93,603.00</td>
                    <td class="table_col"></td>
                </tr>
            </table>

        <h3 class="section_heading">Proposed Contribution Breakdown By Municipality 2023 - 2024</h3>

        <table id="fancy_table_2" class="special_table">
            <tr class="table_header">
                <th class="table_col">Municipality</th>
                <th class="table_col">2023-2024 Proposed Contribution</th>
                <th class="table_col">Contribution Per Member</th>
                <th class="table_col">Increased Contribution</th>
            </tr>
            <tr class="table_row">
                <td class="table_col">City of South Lyon</td>
                <td class="table_col">$65,275.00</td>
                <td class="table_col">$26.11</td>
                <td class="table_col" id="">$22,275.00</td>
            </tr>
            <tr class="table_row">
                <td class="table_col">Green Oak Township</td>
                <td class="table_col">$21,541.00</td>
                <td class="table_col">$26.11</td>
                <td class="table_col" id="">$938.00</td>
            </tr>
            <tr class="table_row">
                <td class="table_col">Lyon Township</td>
                <td class="table_col">$30,000.00</td>
                <td class="table_col">$26.11</td>
                <td class="table_col" id="">$0</td>
            </tr>
            <tr class="table_row">
                <td class="table_col">Other</td>
                <td class="table_col"></td>
                <td class="table_col">$37.00 - Self Paid</td>
                <td class="table_col" id=""></td>
            </tr>
            <tr class="table_row">
                <td class="table_col">Total Contribution</td>
                <td class="table_col">$116,816.00</td>
                <td class="table_col"></td>
                <td class="table_col" id="">$23,213.00</td>
            </tr>
        </table>

            <button class="modal_button" onclick="close_modal()">Close</button>
    </div>
</div>
<div class="modal_bg" id="map_modal">
    <div class="modal">
            <div class="map_heading">Map For: <div class="person_name" id="map_person">Jordan Halaby</div></div>
             <iframe id="database_map" width="600" height="450" frameborder="0" src="" allowfullscreen="">
                </iframe>
            <button class="modal_button" onclick="close_modal()">Close</button>
    </div>
</div>
<div id="file_selection">
    Select a file:
    <input type="file" id="myFile">
    <button onclick='processFile()'>Process</button>
</div>
<div id="generate_report">
    <button onclick='generateReport()'>Generate Report</button>
</div>
   <script>
       const formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD',
    });

       function close_modal(){
           $("#map_modal").css("display", "none");
           $("#report_modal").css("display", "none");
       }

        var southLyon = [];
        var lyonTWP = [];
        var greenOak = [];
        var other = [];
        var error = [];

        var southLyon_data = [];
        var lyonTWP_data = [];
        var greenOak_data = [];
        var other_data = [];
        var error_data = [];

        var grand_total = 0;
    function generate_munic(data, munic){

        var total_first_name = 0;
        var total_spouse = 0;


        for(var d = 0; d<data.length; d++){
            var record = data[d];

            var last_name = record[0];
            var first_name = record[1];
            var spouse = record[2];

            if(first_name != ""){
                total_first_name++;
            }
            if(spouse != ""){
                total_spouse++;
            }
        }

        console.log(munic, total_first_name, total_spouse);
        var total = total_first_name + total_spouse;


        var sl_contribution = 43000;
        var green_contribution = 20603;
        var lyon_contribution = 30000;


        if(munic == "City of South Lyon"){
            $("#south_lyon_members").text(total);
            grand_total = grand_total + total;

            var per = sl_contribution / total;

            per = formatter.format(per);
            $("#south_lyon_contribution").text(per);
        }
        else if(munic == "Green Oak Township"){
            $("#green_oak_members").text(total);
            grand_total = grand_total + total;

            var per = green_contribution / total;

            per = formatter.format(per);
            $("#green_oak_contribution").text(per);
        }
        else if(munic == "Lyon Township"){
            $("#lyon_township_members").text(total);
            grand_total = grand_total + total;

            var per = lyon_contribution / total;

            per = formatter.format(per);
            $("#lyon_township_contribution").text(per);
        }
        else if(munic == "Other"){
            $("#other_members").text(total);
            grand_total = grand_total + total;
        }


    }
    function generateReport(){

        $("#report_modal").css("display", "block");
        generate_munic(southLyon_data, "City of South Lyon");
        generate_munic(greenOak_data, "Green Oak Township");
        generate_munic(lyonTWP_data, "Lyon Township");
        generate_munic(other_data, "Other");

        $("#total_reg_members").text(grand_total);
    }
    $( "body" ).on( "dblclick", "tr.map_grabber", function() {
        var data = $(this).html().toString();
        var comps = data.split("</td>");



        var first_name = comps[2].replace(/(\r\n|\n|\r)/gm, "").replace("<td>", "").trim();
        var last_name = comps[1].replace(/(\r\n|\n|\r)/gm, "").replace("<td>", "").trim();
        var address = comps[4].replace(/(\r\n|\n|\r)/gm, "").replace("<td>", "").trim();
        var city = comps[5].replace(/(\r\n|\n|\r)/gm, "").replace("<td>", "").trim();
        var state = comps[6].replace(/(\r\n|\n|\r)/gm, "").replace("<td>", "").trim();
        var zipcode = comps[7].replace(/(\r\n|\n|\r)/gm, "").replace("<td>", "").trim();

        var add_out = "https://www.google.com/maps/embed/v1/place?key=AIzaSyAcc17FcMQWYboFujZkLZ5TNA59CAqrBjs&q=" + address + ", " + city + ", " + state + ", " + zipcode;

        var full_name = first_name + " " + last_name;

        $("#map_person").text(full_name);
        $("#database_map").attr("src", add_out);
        $("#map_modal").css("display", "block");
    } );
      function processFile(){
            var file = document.querySelector('#myFile').files[0];
            var reader = new FileReader();
            reader.readAsText(file);

            //if you need to read a csv file with a 'ISO-8859-1' encoding
            /*reader.readAsText(file,'ISO-8859-1');*/

            //When the file finish load
            reader.onload = function(event) {

                //get the file.
                var csv = event.target.result;

                //split and get the rows in an array
                var rows = csv.split('\n');

                //move line by line
                for (var i = 2; i < rows.length; i++) {
                    //split by separator (,) and get the columns
                    cols = rows[i].split(',');


                    var record_number = i - 1;
                    var last_name = cols[0];
                    var first_name = cols[1];
                    var spouse = cols[2];
                    var address = cols[3];
                    var city = cols[4];
                    var state = cols[5];
                    var zip = cols[6];
                    var municipality = cols[7];

                    if(municipality){
                        municipality = municipality.replace(/(\r\n|\n|\r)/gm, "");
                    }

                    var trow = `
                        <tr class="table_row map_grabber">
                            <td>${record_number}</td>
                            <td>${last_name}</td>
                            <td>${first_name}</td>
                            <td>${spouse}</td>
                            <td>${address}</td>
                            <td>${city}</td>
                            <td>${state}</td>
                            <td>${zip}</td>
                            <td>${municipality}</td>
                        </tr>
                    `;

                    // console.log(municipality);
                    if(municipality == 'City of South Lyon'){
                        southLyon.push(trow);
                        southLyon_data.push(cols);
                    }
                    else if(municipality == "Green Oak Township"){
                        greenOak.push(trow);
                        greenOak_data.push(cols);
                    }
                    else if(municipality == 'Lyon Township'){
                        lyonTWP.push(trow);
                        lyonTWP_data.push(cols);
                    }
                    else if(municipality == 'Other'){
                        other.push(trow);
                        other_data.push(cols);
                    }
                    else{
                        error.push(trow);
                        error_data.push(cols);
                    }

                }


                append_row(southLyon, southLyon_data);
                append_row(greenOak, greenOak_data);
                append_row(lyonTWP, lyonTWP_data);
                append_row(other, other_data);
                append_row(error, error_data);
            }
        }

        function sort_munic(munic_data){
            var out = munic_data.sort((a, b) => a[0].localeCompare(b[0]));

            return out;
        }

        function append_row(munic, data){

            var sorted = sort_munic(data);

            for(var i = 0; i<sorted.length; i++){
                var cols = sorted[i];
                        var record_number = i + 1;
                        var last_name = cols[0];
                        var first_name = cols[1];
                        var spouse = cols[2];
                        var address = cols[3];
                        var city = cols[4];
                        var state = cols[5];
                        var zip = cols[6];
                        var municipality = cols[7];

                        if(municipality){
                            municipality = municipality.replace(/(\r\n|\n|\r)/gm, "");
                        }

                        var trow = `
                            <tr class="table_row map_grabber">
                                <td>${record_number}</td>
                                <td>${last_name}</td>
                                <td>${first_name}</td>
                                <td>${spouse}</td>
                                <td>${address}</td>
                                <td>${city}</td>
                                <td>${state}</td>
                                <td>${zip}</td>
                                <td>${municipality}</td>
                            </tr>
                        `;


                $("#fancy_table").append(trow);
            }
        }
   </script>

   <table id="fancy_table">
       <tr class="table_header">
           <th class="table_col">Record #</th>
           <th class="table_col">Last Name</th>
           <th class="table_col">First Name</th>
           <th class="table_col">Spouse</th>
           <th class="table_col">Address</th>
           <th class="table_col">City</th>
           <th class="table_col">State</th>
           <th class="table_col">ZipCode</th>
           <th class="table_col">Municipality</th>
       </tr>
   </table>


</body>
</html>
