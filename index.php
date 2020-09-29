<?php
header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
 
if(isset($HTTP_RAW_POST_DATA)) {
  parse_str($HTTP_RAW_POST_DATA,$arr); 
  $arr['extra']='1.POST Request from demo.com';
  echo json_encode($arr);
}
else
{
    $_POST['extra']='2.POST Request from demo.com';
  //  echo json_encode($_POST);
 $name = $_POST['name'];
 $varientss = $_POST['tags'];
    
   // echo $name." - ".$varientss; 
 
 
 
 
 
 
 //$SHOPIFY_SHOP = 'goodnessforu.myshopify.com'; //For eg: storedenavin.myshopify.com
$SHOPIFY_SHOP = 'superior-equipment-supply.myshopify.com'; //For eg: storedenavin.myshopify.com

function getorder2($url)
{
$ch = curl_init($url);      
//curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',  
    'Authorization: Basic NmM1ZjE2OWRhOGRkMGI4MjdmNzk4OGM0MjQ5NGVhYzE6c2hwcGFfMDQ1YTA0ODdiNDlmODYyNTcxMjFiYmQzYTYxZjcxOWM=')                                                                     
);                                                                                                                   
$output = curl_exec($ch);
curl_close($ch); 
$json_data_shopify = json_decode($output,true);   
return $json_data_shopify;
}



function getorder($url)
{
$ch = curl_init($url);      
//curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',  
    'Authorization: Basic M2U5M2I5ZDBlMWQxMjk3MjI1YTU4MzI4ZTJiMjczZDY6c2hwcGFfODk0MTQ1ZTg0ODcwOTg1Y2MyOTRlNzMzODk5YjUwOWU=')                                                                     
);                                                                                                                   
$output = curl_exec($ch);
curl_close($ch); 
$json_data_shopify = json_decode($output,true);   
return $json_data_shopify;
}






//$string2 = "color_black,size_l,size_m,material_65-35-poly-cotton-blend"; 
 // $string2 = "color_black,size_l,size_m,material_65-35-poly-cotton-blend,size_xl,size_xxl";
 $string2 = $varientss;
$str_arr = explode (",", $string2);  
//print_r($str_arr); 
foreach($str_arr as $key1 => $value1)
{
 //  echo $str_arr[$key1]."<br>";
}



//$tagnames = $_REQUEST['tagnames'];

//if(!empty($tagnames)) {
$word3 = "Dairy Free";
$word4 = "Meat Dishes";
$mystring3 = "Dairy Free, gluten free, Meat Dishes, No Added Sugar";
if(strpos($mystring3, $word3) !== false && strpos($mystring3, $word4) !== false) {
    //echo "yes";
}




//echo "<br><br>";





     
     
$productss = getorder("https://".$SHOPIFY_SHOP."/admin/api/2020-07/products.json?collection_id=10643603479&published_status=published&limit=250");
//echo "<pre>";
//print_r($productss);
   $product_line_items = $productss['products'];  

     foreach ($product_line_items as $keys3 => $values3)
     {
         $productid2 = $product_line_items[$keys3]['id'];
         //$variant_id2 = $product_line_items[$keys3]['variant_id'];
         $protitle2 = $product_line_items[$keys3]['title'];
         $proname2 = $product_line_items[$keys3]['name'];
         $handle1 = $product_line_items[$keys3]['handle'];
         $proimgs1 = $product_line_items[$keys3]['image']['src'];
         $price1 = $product_line_items[$keys3]['variants'][0]['price'];
         
         $tagss1 = str_replace(" ", "-",strtolower(str_replace(", ", ",",$product_line_items[$keys3]['tags'])));
         
         $tagss1 = str_replace("/", "-",$tagss1);
         $str_arr2 = explode (",", $tagss1);  
         //print_r($str_arr2);
         
          $result2 = $handle1. " - $".$price1." - ".$proimgs1;
         
         if(!empty($str_arr)) {
             
         
         $result=array_intersect($str_arr2,$str_arr);
         if(!empty($result))
         {
          
          
         
          
          
             
         if(count($str_arr) >= 6) {
             if(count($result) >= count($str_arr)-3) {   print_r($result2); echo "<br>"; }
         }    
         else if(count($str_arr) == 5) {
             if(count($result) >= count($str_arr)-2) {   print_r($result2); echo "<br>"; }
         }
         else if(count($str_arr) == 3 || count($str_arr) == 4)
         {
             if(count($result) >= count($str_arr)-1) {   print_r($result2); echo "<br>"; }
         } else if(count($str_arr) == count($result)) {
             print_r($result2); echo "<br>";
         } else if(empty(count($result) && count($str_arr) == 2) {
             print_r($result2); echo "<br>";       
         }
          
          
          
          
          
          
          
         }
         
         } else {
             echo $result2;
             
         }
         
          
     }     
 
 
 
 
 
 
 
    
}

?>
