<?php
session_start();
?>

<head>
    <title>Purchases Web Service | Air Pollution</title>
</head>

    <script src="../js/jquery-3.4.1.js"></script>
    <script>
         function createTable (XML){
            var table;
            var elements = XML.documentElement.getElementsByTagName("purchase");

            table = "<table border =\"1\">";
            table += "<tr>";
            table += "<th>Purchase ID</th>";
            table += "<th>Item ID</th>";
            table += "<th>Quantity</th>";
            table += "<th>Total Price</th>";
            table += "<th>Purhased At</th>";            


            table += "</tr>";

            var purID;
            var itemID;
            var quantity;
            var totalPrice;
            var purchasedAt;
            
            for(i = 0; i < elements.length; i++){
                purID = elements[i].getElementsByTagName("purchase_id");
                itemID = elements[i].getElementsByTagName("item_id");
                quantity = elements[i].getElementsByTagName("quantity");
                totalPrice = elements[i].getElementsByTagName("totalPrice");
                purchasedAt = elements[i].getElementsByTagName("purchasedAt");
                table += "<tr>";
                table += "<td>" + purID[0].firstChild.nodeValue + "</td>"; 
                table += "<td>" + itemID[0].firstChild.nodeValue + "</td>";
                table += "<td>" + quantity[0].firstChild.nodeValue + "</td>";
                table += "<td>" + totalPrice[0].firstChild.nodeValue + "</td>";
                table += "<td>" + purchasedAt[0].firstChild.nodeValue + "</td>";
                table += "</tr>";
            }
            table += "</table>"; 
            return table;
        }

            var request;
            if(window.XMLHttpRequest){
                request = new XMLHttpRequest();
            }else{
                request = new ActiveXObject("Microsoft.XMLHTTP");
            }
            request.onreadystatechange = function() {
                if(request.readyState == 4 && request.status == 200){
                   document.getElementById("listpurchases").innerHTML = createTable(request.responseXML);
                }
            }
            request.open("GET", "consume.php", true);
            request.send();
        
    </script>
            <div class="container">
                <h1>Purchases</h1>
                <div id="listpurchases"></div>
                <br>
                <?php
                $xml_file_name = 'purchases.xml';
                echo "<a href='".$xml_file_name."'> View as XML</a>";
                ?>
            </div>