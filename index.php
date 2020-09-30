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
 $collpath = $_POST['collpath'];
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

 $str_arrs_1 = explode(",",str_replace("_", ",",$string2));
 $count_values = array();
foreach ($str_arrs_1 as $a) {

     @$count_values[$a]++;

}
 
 $color_counts1 = $count_values['color'];
 $size_counts1 = $count_values['size'];
 $material_counts1 = $count_values['material'];
 

$unique_colors = array_unique($str_arrs_1);
$duplicates = count($str_arrs_1) - count($unique_colors);
 
 //echo $color_counts1;


//$tagnames = $_REQUEST['tagnames'];

//if(!empty($tagnames)) {
//$word3 = "Dairy Free";
//$word4 = "Meat Dishes";
//$mystring3 = "Dairy Free, gluten free, Meat Dishes, No Added Sugar";
//if(strpos($mystring3, $word3) !== false && strpos($mystring3, $word4) !== false) {
    //echo "yes";
//}




//echo "<br><br>";





     
     
$productss = getorder("https://".$SHOPIFY_SHOP."/admin/api/2020-07/products.json?collection_id=".$name."&published_status=published&limit=250");
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
      
      $word3 = "RankGood";
      $word4 = "RankBetter";
      $word5 = "RankBest";
      
      $word6 = "Free Freight";
      $word7 = "Discounted Freight";
      
      $mystring3 = $product_line_items[$keys3]['tags'];
if(strpos($mystring3, $word3) !== false) {
    $labeltype = '<span style="text-indent:5px; line-height:20px; text-align: center;"class="variation"><p style="line-height: 18px;font-size: 13px; font-weight: bold;">Good</p></span>';
} else if(strpos($mystring3, $word4) !== false) {
    $labeltype = '<span style="text-indent:6px; line-height:20px; text-align: center;"class="variationBetter"><p style="line-height: 18px;font-size: 13px; font-weight: bold;">Better</p></span>';
} else if(strpos($mystring3, $word5) !== false) {
    $labeltype = '<span style="text-indent:7px; line-height:20px; text-align: center;"class="variationBest"><p style="line-height: 18px;font-size: 13px; font-weight: bold;">Best</p></span>';
}
      
if(strpos($mystring3, $word6) !== false) {
 $labeltype2 = '<button class="button-free"><span class="badge-free-freight">Free Shipping!</span></button>';
} else if(strpos($mystring3, $word7) !== false) {
  $labeltype2 = '<button style="text-indent:5px;"class="button-discounted"><span class="badge-discounted-freight">Discounted Freight!</span></button>';
}
      
         
          //$result2 = $handle1. " - $".$price1." - ".$proimgs1;
      
      $result2 = '<style>
  .Retail {
    color: #950c0c;
    font-size: 14px;
    font-weight: bold;
  }
  .normal-money {
    color: #950c0c;
    font-size: 18px;
    font-weight: bold;
  }
  .money {
  color: #950c0c;
    font-size: 16px;
    font-weight: bold;
  }
  .email {
  color: #FFFFF;
    font-size: 16px;
    font-weight: bold;  
  }
  .button-free {
   background-color: #950c0c;
    opacity: 0.8;
    padding: -32px 16px;
    position: absolute;
    top: -7%;
    left: -3%;
    width: 97px;
    height: 28px;
    
  }
  
   .button-free:hover {
   background-color: #950c0c;
    
  }
  
   .button-free:active {
   background-color: #950c0c;
    
  }
  .badge-free-freight {
     color: #FFFFF;
    font-size: 9px;
    font-weight: bold;
    line-height: 10px;
    margin-left: -14px;
    vertical-align: text-top;
  }
  
  .button-discounted {
   background-color: ##136FF3;
    opacity: 0.8;
    padding: -32px 16px;
    position: absolute;
    top: -7%;
    left: -3%;
    width: 145px;
    height: 28px;
    
  }
  
  .button-discounted: hover {
   background: #136FF3;
    opacity: 0.8;
    padding: -32px 16px;
    position: absolute;
    top: -7%;
    left: -3%;
    width: 145px;
    height: 28px;
    
  }
  
  .badge-discounted-freight {
     color: #FFFFF;
    font-size: 10px;
    font-weight: bold;
    line-height: 10px;
    margin-left: -14px;
    vertical-align: text-top;
  }
  .prod-border {
    border: 5px solid #ccc;
  }
   .variation {
   position: absolute;
    width: 50px;
    height: 20px;
    border: 2px solid #00000000;
    border-radius: 2px;
    bottom: -40px;
    left: 10px;
    background: #c46e39;
    font-size: 10px;
    z-index: 1;
    display: flex;
    top: 160px;
    color: #EEEEEE;
    font-weight: bold;
    padding-bottom: 10px;
    margin-left:-7px;
       box-shadow: 2px 4px #888888;

  }
.variationBetter {
   position: absolute;
    width: 60px;
    height: 20px;
    border: 2px solid #00000000;
    border-radius: 2px;
    bottom: -40px;
    left: 10px;
    background: #136FF3;
    font-size: 10px;
    z-index: 1;
    display: flex;
    top: 160px;
    color: #EEEEEE;
    font-weight: bold;
    padding-bottom: 10px;
    margin-left:-7px;
    box-shadow: 2px 4px #888888;


  }
 .variationBest {
   position: absolute;
    width: 50px;
    height: 20px;
    border: 2px solid #00000000;
    border-radius: 2px;
    bottom: -40px;
    left: 10px;
    background: #09B63B;
    font-size: 10px;
    z-index: 1;
    display: flex;
    top: 160px;
    color: #EEEEEE;
    font-weight: bold;
    padding-bottom: 10px;
    margin-left:-7px;
     box-shadow: 2px 4px #888888;


  }
    
  @media screen and (min-width: 980px) {
    .prod-border {
      min-height: 375px;
    }
  }
</style>

<div data-tag="'.$product_line_items[$keys3]['tags'].'" class="'.$product_line_items[$keys3]['tags'].' product-index desktop-3 tablet-2 mobile-half" data-alpha="" data-price="'.$price1.'" style="height:375px;">     
<div class="prod-border"><div class="prod-container">
<div class="prod-image"> '.$labeltype2.' <a href="'.$collpath.'/products/'.$handle1.'" title="'.$protitle2.'"><div class="reveal"><img src="'.$proimgs1.'" alt="'.$protitle2.'">

'.$labeltype.'
        
</div></a></div>

</div>
<div class="product-info"><a href="'.$collpath.'/products/'.$handle1.'"><h3>'.$protitle2.'</h3></a><div class="price"><div class="prod-price"><span class="normal-money">$'.$price1.'</span></div></div></div>
</div>

</div>';
         
      if(empty($varientss)) {
        print_r($result2);
      }
       else if(!empty($str_arr)) {
             
         
         $result=array_intersect($str_arr2,$str_arr);
        
         if(empty($result))
         {
         // echo "<p>Product Not Found</p>";
         }
        
        else if(!empty($result))
         {
          
          
         
          
          
             
         if(count($str_arr) >= 6) {
             if(count($result) >= count($str_arr)-3) {   print_r($result2);  }
         }    
         else if(count($str_arr) == 5) {
             if(count($result) >= count($str_arr)-2) {   print_r($result2);  }
         }
         else if(count($str_arr) == 3 || count($str_arr) == 4)
         {
             if(count($result) >= count($str_arr)-1) {   print_r($result2);  } 
             else if($color_counts1 >= 3 && count($result) >= 2) { print_r($result2); }
             else if($size_counts1 >= 3 && count($result) >= 2) { print_r($result2); }
             else if($material_counts1 >= 3 && count($result) >= 2) { print_r($result2); }
             else if($duplicates >= 1) { print_r($result2); }
         } else if(count($str_arr) == count($result)) {
             print_r($result2); 
         } else if(count($result) == 1 && count($str_arr) == 2 && $duplicates >= 1) {
             print_r($result2);      
         } else if(count($result) == 2 && count($str_arr) == 2) { print_r($result2); }
          
         
          
          
          
          
          
         }
         
         } else {
             print_r($result2);
             
         }
         
          
     }     
 
 
 
 
 
 
 
    
}

?>
