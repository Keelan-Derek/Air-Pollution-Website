<?php
   require_once('../includes/database-connect.php');
   $connection = db_connect2();

    $query = "SELECT * FROM purchases ORDER BY purchase_id";
       $ret = mysqli_query($connection, $query);
       $num_rows = mysqli_num_rows($ret);
       if($ret){
            $dom = new DOMDocument();
            $dom->encoding = 'utf-8';
            $dom->xmlVersion = '1.0';
            $dom->formatOutput = true;
            $xml_file_name = 'purchases.xml';
            $root = $dom->createElement('Purchases');
            for($i =0; $i < $num_rows; $i++){
                $row = mysqli_fetch_array($ret);
                $node = $dom->createElement('purchase');
                $id = $dom->createElement('purchase_id');
                $id->appendChild($dom->createTextNode($row['purchase_id']));
                $node->appendChild($id);
                $item = $dom->createElement('item_id');
                $item->appendChild($dom->createTextNode($row['item_id']));
                $node->appendChild($item);
                $quantity = $dom->createElement('quantity');
                $quantity->appendChild($dom->createTextNode($row['quantity']));
                $node->appendChild($quantity);
                $price = $dom->createElement('totalPrice');
                $price->appendChild($dom->createTextNode($row['totalPrice']));
                $node->appendChild($price);
                $date = $dom->createElement('purchasedAt');
                $date->appendChild($dom->createTextNode($row['purchased_at']));
                $node->appendChild($date);
                $root->appendChild($node);
                $dom->appendChild($root);
            }
            $dom->save($xml_file_name);
            echo "<a href='".$xml_file_name."' . $xml_file_name . '</a> has been created successfully";
            $dom->load($xml_file_name);
        }       
?>