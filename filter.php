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
 
 echo '<script type="text/javascript">
 $("#onclickss").click(function() {  
    //event.preventDefault();   
  //alert( "Handler for .submit() called." );
 
});

$("form").submit(function(event) {

event.preventDefault();
  //alert( "Handler for .submit() called." );
  //var qtyss = $( "input" ).val();
  var data = $(this).serializeArray();
  
 var idvalus = $(this).find("input[name=id]").val();
 var qtyss = $(this).find("input[name=quantity]").val();
  //alert(idvalus + " " + qtyss);
  
  $.ajax({
      type: "POST", 
      url: "/cart/add.js",
      data: "quantity=" + qtyss + "&id=" + idvalus,
      dataType: "json",
      success: function() { 
      $("#ajaxified" + idvalus).css({"display":"inline-block", "margin":"0px"}); 
      }
   });
   
  
  
  
  //alert(data);
  
});

 </script>
';
 
 
 
 
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
    'Authorization: Basic M2U5M2I5ZDBlMWQxMjk3MjI1YTU4MzI4ZTJiMjczZDY6c2hwcGFfODk0MTQ1ZTg0ODcwOTg1Y2MyOTRlNzMzODk5YjUwOWU=')                                                                     
);                                                                                                                   
$output = curl_exec($ch);
curl_close($ch); 
$json_data_shopify = json_decode($output,true);   
return $json_data_shopify;
}

 
function httppost($url,$params)
{
$postData = $params;
$data_string = json_encode($postData);                                                                                   
$ch = curl_init($url);      
//curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Authorization: Basic M2U5M2I5ZDBlMWQxMjk3MjI1YTU4MzI4ZTJiMjczZDY6c2hwcGFfODk0MTQ1ZTg0ODcwOTg1Y2MyOTRlNzMzODk5YjUwOWU=')                                                                     
);                                                                                                                   
$output = curl_exec($ch);
curl_close($ch); 
$json_data_auspost = json_decode($output,true);   
return $json_data_auspost;
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


function parsePaginationLinkHeader($headerLink) 
{
    $available_links = [];
    $links = explode(',', $headerLink);
    foreach ($links as $link){

        if (preg_match('/<(.*)>;\srel=\\"(.*)\\"/', $link, $matches)) {

            $query_str = parse_url($matches[1], PHP_URL_QUERY);
            parse_str($query_str, $query_params);
            $available_links[$matches[2]] = $query_params['page_info'];
        }
    }
    return $available_links;
}

function getorder9($url)
{
$ch = curl_init($url);      
//curl_setopt($ch, CURLOPT_URL,$url);
//curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',  'Authorization: Basic M2U5M2I5ZDBlMWQxMjk3MjI1YTU4MzI4ZTJiMjczZDY6c2hwcGFfODk0MTQ1ZTg0ODcwOTg1Y2MyOTRlNzMzODk5YjUwOWU=')                                                                     
);                                                                                                                   
$output = curl_exec($ch);
$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$header = substr($output, 0, $header_size);
$body = substr($output, $header_size);

curl_close($ch); 
$json_data_shopify = json_decode($output,true);   
return $header;
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


 
 
 
 
 function getproductss($SHOPIFY_SHOP, $productid2, $protitle2, $proname2, $handle1, $proimgs1, $product_type1, $admin_graphql_api_id, $allproductatgs, $price_varient1, $price_compare_at_price, $first_varientid)
 {
   //$queries3 = array('query' => 'query { product(id: "'.$admin_graphql_api_id.'") { variants(first:1) { edges { node { compareAtPrice  price } } }    } }');
  // $productss2 = httppost("https://".$SHOPIFY_SHOP."/admin/api/unstable/graphql.json",$queries3);

   //$price_varient1 = $productss2['data']['product']['variants']['edges'][0]['node']['price'];
   //$price_compare_at_price = $productss2['data']['product']['variants']['edges'][0]['node']['compareAtPrice']; 
  
  //$productss2 = getorder("https://".$SHOPIFY_SHOP."/admin/api/2020-07/products/".$productid2.".json");
  //$product_line_items3 = $productss2['product'];  
  
  //$price_varient1_1 = $product_line_items3['variants'][0]['price'];
  //$price_compare_at_price_1 = $product_line_items3['variants'][0]['compare_at_price'];
  
  if($price_varient1 < $price_compare_at_price) {
       $price1 = '<div class="onsale">$'.$price1.'</div><div class="was">$'.$price_compare_at_price.'</div>';
      } else {
       $price1 = '<div class="prod-price"><span class="normal-money">Price $'.$price_varient1.'</span></div>';
      }
      
      if( $price_varient1 > 1000 && $product_type1 == 'Equipment') {       
       $price1 = '<span class="Retail">Retail Price</span><span class="money"> $'.$price_varient1.'</span><br><button style="text-color: #FFFFFF;"><span class="email"><a style="color: #FFFFFF;" href="'.$collpath.'/products/'.$handle1.'">Email Me My Price</span></a></button>';
      }
 return $price1;
 // print_r($productss2);
  
 }
 
 
 
 
 
 
echo '<style>
  .Retail { color:#950c0c; font-size:14px; font-weight:bold;
  }
  .normal-money {  color: #950c0c;   font-size: 18px;  font-weight: bold;  }
  .money { color: #950c0c;   font-size: 16px;   font-weight: bold;  }
  .email {  color: #FFFFF;   font-size: 16px;   font-weight: bold;   }
  .button-free {  background-color: #950c0c;   opacity: 0.8;  padding: -32px 16px;   position: absolute;   top:-7%;   left:-3%;   width:97px;  height: 28px;  }
  
   .button-free:hover {  background-color: #950c0c;    }
  
   .button-free:active {   background-color: #950c0c;    }
  .badge-free-freight {  color: #FFFFF;  font-size: 9px;   font-weight: bold;   line-height: 10px;   margin-left: -14px;   vertical-align: text-top;  }
  
  .button-discounted {   background-color: ##136FF3;   opacity: 0.8;   padding: -32px 16px;   position: absolute;   top: -7%;   left: -3%;   width: 145px;   height: 28px;  }
  
  .button-discounted: hover {   background: #136FF3;   opacity: 0.8;   padding: -32px 16px;   position: absolute;  top: -7%;  left: -3%;  width: 145px;  height: 28px;    }
  
  .badge-discounted-freight {   color: #FFFFF;  font-size: 10px;  font-weight: bold;  line-height: 10px;   margin-left: -14px;   vertical-align: text-top;  }
  .prod-border {   border: 5px solid #ccc;   height:620px;  }
   .variation {   position:absolute;    width:50px;   height:20px;   border:2px solid #00000000;   border-radius:2px;   bottom:-40px;  left:15px;   background:#c46e39;  font-size:10px;   z-index:1;
    display: flex;   top: 7px;   color: #EEEEEE;   font-weight: bold;   padding-bottom: 10px;   margin-left:-7px;   box-shadow: 2px 4px #888888;  }
.variationBetter {  position: absolute;   width: 60px;   height: 20px;   border: 2px solid #00000000;  border-radius: 2px;   bottom: -40px;   left: 15px;   background: #136FF3;
    font-size: 10px;   z-index: 1;   display: flex;   top: 7px;   color: #EEEEEE;   font-weight: bold;   padding-bottom: 10px;   margin-left:-7px;   box-shadow: 2px 4px #888888;  }
 .variationBest {  position: absolute;   width: 50px;   height: 20px;   border: 2px solid #00000000;   border-radius: 2px;   bottom: -40px;  left: 15px;  background: #09B63B;
    font-size: 10px;  z-index: 1;  display: flex;  top: 7px;  color: #EEEEEE;  font-weight: bold;  padding-bottom: 10px;  margin-left:-7px;  box-shadow: 2px 4px #888888;  }
  
  .carter { background: #950c0c;   }
  @media screen and (min-width: 600px) {
  .pickup-mobile {  font-weight: bold;font-size: 18px;color:#6e9674  }
  .pickup-img-mobile {  width: 120px !important;  height: 110px !important;  margin-left:100px !important;  }  
  }
@media screen and (max-width: 500px) {
.pickup-mobile { font-weight:bold; font-size:14px; color:#6e9674; }
.pickup-icon-mobile {  margin-left:80px !important; width:100px;  height:110px; }
}
    
</style>'; 
 
 
 



     
     
//$productss = getorder("https://".$SHOPIFY_SHOP."/admin/api/2020-07/products.json?collection_id=".$name."&published_status=published&limit=250");
 $productss = getorder("https://".$SHOPIFY_SHOP."/admin/api/unstable/collections/".$name."/products.json?sort_order=price-asc&published_scope=global&limit=250");
//echo "<pre>";
//print_r($productss);
   $product_line_items = $productss['products'];  
$counter = 0;
     foreach ($product_line_items as $keys3 => $values3)
     {
         $productid2 = $product_line_items[$keys3]['id'];
         //$variant_id2 = $product_line_items[$keys3]['variant_id'];
         $protitle2 = $product_line_items[$keys3]['title'];
         $proname2 = $product_line_items[$keys3]['name'];
         $handle1 = $product_line_items[$keys3]['handle'];
         $proimgs1 = $product_line_items[$keys3]['image']['src'];
      $product_type1 = $product_line_items[$keys3]['product_type'];
      $admin_graphql_api_id = $product_line_items[$keys3]['admin_graphql_api_id'];
      $allproductatgs = $product_line_items[$keys3]['tags'];
      
     // $productss2 = getorder2("https://".$SHOPIFY_SHOP."/admin/api/unstable/products/".$productid2.".json");
      // $product_line_items3 = $productss2['product'];  
        // $price_varient1 = $product_line_items3['variants'][0]['price'];
         //$price_compare_at_price = $product_line_items3['variants'][0]['compare_at_price'];
        
     // $queries3 = array('query' => 'query { product(id: "'.$admin_graphql_api_id.'") { variants(first:1) { edges { node { compareAtPrice  price } } }    } }');
   // $productss2 = httppost("https://".$SHOPIFY_SHOP."/admin/api/unstable/graphql.json",$queries3);
      
       //$price_varient1_1 = $productss2['data']['product']['variants']['edges'][0]['node']['price'];
       //$price_compare_at_price_1 = $productss2['data']['product']['variants']['edges'][0]['node']['compareAtPrice'];
      //echo $price_varient1_1." - ".$price_compare_at_price_1;
      
      // $price_varient1 = $product_line_items[$keys3]['variants'][0]['price'];
      // $price_compare_at_price = $product_line_items[$keys3]['variants'][0]['compare_at_price'];
      
       
      
         
         
         //$tagss1 = str_replace(" ", "-",strtolower(str_replace(", ", ",",$product_line_items[$keys3]['tags'])));
         
         //$tagss1 = str_replace("/", "-",$tagss1);      
        // $tagsss2 = str_replace('?_', '-_', str_replace('.', '', $tagss1));
      
       // $tagsss2_1 = str_replace('(', '',$tagsss2);
       // $tagsss2_2 = str_replace(')', '',$tagsss2_1);
       // $tagsss2_3 = str_replace('/', '',$tagsss2_2);
      //  $tagsss2_4 = str_replace('-&', '',$tagsss2_3);
       // $tagsss2_5 = str_replace('"', '',$tagsss2_4);
       //  $str_arr2 = explode (",", $tagsss2_5);  
      
      //echo $product_line_items[$keys3]['tags']."<br>";
      $vp_string = strtolower(str_replace(", ", ",",$allproductatgs));
$strs11 = str_replace(" ", "-", $vp_string);
$strs22 = str_replace(".", "-", $strs11);

 $tagss1 = str_replace("/", "-",$strs22);      
         $tagsss2 = str_replace('?_', '-_', $tagss1);
      
        $tagsss2_1 = str_replace('(', '',$tagsss2);
        $tagsss2_2 = str_replace(')', '',$tagsss2_1);
        $tagsss2_3 = str_replace('/', '',$tagsss2_2);
        $tagsss2_4 = str_replace('-&', '',$tagsss2_3);
        $tagsss2_5 = str_replace('"', '',$tagsss2_4);
        // $str_arr2 = explode (",", $tagsss2_5);  

     $tagsss2_6 = ltrim(str_replace("--", "-", $tagsss2_5),"-");
      
     //$tagsss2_62 = trim($tagsss2_6,'-');
      $tagsss2_62 = str_replace('-,', ',',$tagsss2_6);
      $tagsss2_7 = rtrim($tagsss2_62,"-");
      
      $tagsss2_8 = str_replace("'", "",$tagsss2_7);
      $str_arr2 = explode (",", $tagsss2_8);  

      
      
      
      
      
      
      
      
      
      
      
         //print_r($str_arr2);
      
      $word32 = "RankGood";
      $word42 = "RankBetter";
      $word52 = "RankBest";
      
      $word62 = "Free Freight";
      $word72 = "Discounted Freight";
      $word82 = "QuickShip";
      $word92 = "LocalDelivery";
      
      
      //$mystring3 = $product_line_items[$keys3]['tags'];
      $mystring3 = $allproductatgs;
if(strpos($mystring3, $word32) !== false) {
    $labeltype = '<span style="text-indent:5px; line-height:20px; text-align: center;"class="variation"><p style="line-height: 18px;font-size: 13px; font-weight: bold;">Good</p></span>';
} else if(strpos($mystring3, $word42) !== false) {
    $labeltype = '<span style="text-indent:6px; line-height:20px; text-align: center;"class="variationBetter"><p style="line-height: 18px;font-size: 13px; font-weight: bold;">Better</p></span>';
} else if(strpos($mystring3, $word52) !== false) {
    $labeltype = '<span style="text-indent:7px; line-height:20px; text-align: center;"class="variationBest"><p style="line-height: 18px;font-size: 13px; font-weight: bold;">Best</p></span>';
}
      
if(strpos($mystring3, $word62) !== false) {
 $labeltype2 = '<div style="margin-bottom:0px;"><div style="font-weight:bold; font-size:18px; color:#6e9674; text-align:left; margin-left:10px;"> Ships Free </div> <img style="width: 70px;height: 40px; position:absolute; margin-top:-40px; margin-left:106px;"src="https://cdn.shopify.com/s/files/1/2304/9095/files/free.png?v=1587666400"></div>';
}  if(strpos($mystring3, $word82) !== false) {
 $labeltype2 = '<div style="margin-bottom:0px;"><div style="font-weight: bold;font-size: 18px;color:#950c0c"> Quick Ship</div> <img style="width: 70px;height: 40px; position: absolute;margin-top: -40px;margin-left: 100px;"src="https://cdn.shopify.com/s/files/1/2304/9095/files/free.png?v=1587666400"><br></div>';
}  if(strpos($mystring3, $word92) !== false) {
 $labeltype2 = '<div style="margin-top:-8px; height:54px;"><div class="pickup-mobile"> Pickup In Store</div> <img style="position:absolute;margin-top:-70px;width: 120px;height:110px;"  class="pickup-icon-mobile"src="https://marketplace.magento.com/media/catalog/product/cache/7230773f37a543ef738e324844b23ad1/s/t/store-pickup_1.png"><br></div>';
}  if(strpos($mystring3, $word72) !== false) {
  $labeltype3 = '<div style="font-weight:bold; font-size:18px; color:#136FF3; text-align:left; margin-left:10px;"> Ships Free </div> <img style="width:70px;height:40px; position: absolute; margin-top:-40px; margin-left:100px;"src="https://cdn.shopify.com/s/files/1/2304/9095/files/free.png?v=1587666400"><br>';
} else {
  $labeltype3 = '<div style="visibility:hidden;"><span style="font-weight: bold;font-size: 18px;color:#6e9674"> Ships Free </span> <img style="width: 70px;height: 40px; position: absolute;margin-top: -40px;margin-left: 100px;"src="https://cdn.shopify.com/s/files/1/2304/9095/files/free.png?v=1587666400"><br></div>';
}
      
      

     include('condition_for_loop.php');
        $product_line_items3 = $productss2['product'];  
      
       $pro_published_at = $product_line_items3['published_at'];
       $price_varient1 = $product_line_items3['variants'][0]['price'];
       $price_compare_at_price = $product_line_items3['variants'][0]['compare_at_price'];
        $first_varientid = $product_line_items3['variants'][0]['id'];
        $var_inventory_policy = $product_line_items3['variants'][0]['inventory_policy'];
        $var_inventory_quantity = $product_line_items3['variants'][0]['inventory_quantity'];
       //$first_varientid = $product_line_items[$keys3]['variants'][0]['id'];
      
      
     // $queries3 = array('query' => 'query { product(id: "'.$admin_graphql_api_id.'") { variants(first:1) { edges { node { compareAtPrice  price } } }    } }');
    //$productss2 = httppost("https://".$SHOPIFY_SHOP."/admin/api/unstable/graphql.json",$queries3);
      
     
      
      // $price_varient1 = $productss2['data']['product']['variants']['edges'][0]['node']['price'];
      // $price_compare_at_price = $productss2['data']['product']['variants']['edges'][0]['node']['compareAtPrice'];
      
      
        if($price_varient1 < $price_compare_at_price) {
       $price1 = '<div class="onsale">$'.$price1.'</div><div class="was">$'.$price_compare_at_price.'</div>';
      } else {
       $price1 = '<div class="prod-price"><span class="normal-money">Price $'.$price_varient1.'</span></div>';
      }
      
      if( $price_varient1 > 1000 && $product_type1 == 'Equipment') {       
       $price1 = '<span class="Retail">Retail Price</span><span class="money"> $'.$price_varient1.'</span><br><button style="text-color: #FFFFFF;"><span class="email"><a style="color: #FFFFFF;" href="'.$collpath.'/products/'.$handle1.'">Email Me My Price</span></a></button>';
      }
        
      
         
          //$result2 = $handle1. " - $".$price1." - ".$proimgs1;
// if(!empty($first_varientid) && $var_inventory_policy != 'continue' && $var_inventory_quantity >= '0' || !empty($first_varientid) && $var_inventory_policy == 'continue')
      if(!empty($pro_published_at)) {
        
      $result2 = '
<div data-tag="'.htmlspecialchars($allproductatgs).'" class="'.htmlspecialchars($allproductatgs).' product-index desktop-3 tablet-2 mobile-half" data-alpha="" data-price="'.$price_varient1.'" style="height:620px;">     
<div class="prod-border"><div class="prod-container" id="iddd-'.$var_inventory_policy.'">
<div class="prod-image"> 
<a href="'.$collpath.'/products/'.$handle1.'" title="'.htmlspecialchars($protitle2).'"><div class="reveal"><img src="'.$proimgs1.'" alt="'.htmlspecialchars($protitle2).'">
'.$labeltype.'
        
</div></a></div>
</div>
<div class="product-info">
 <form method="post" id="targetforms" action="/cart/add">
      <input type="hidden" name="id" value="'.$first_varientid.'" />
      <input min="1" type="number" style="margin-bottom:8px;" id="quantity" name="quantity" value="1"/>
      <input style="background:#950c0c; margin-bottom:8px;" type="submit" value="Add to cart" class="btn" />
       </form>
   <p class="ajaxified-cart-feedback success" id="ajaxified'.$first_varientid.'" style="display:none;"><i class="fa fa-check"></i> Added to cart! <a href="/cart">View cart</a>.</p> 

<div style="margin-bottom:10px;" id="onclickss" class="price">'.$price1.' '.$price2.'</div>
<br>
'.$labeltype2.' 
'.$labeltype3.'

<a style="text-align:center;color:#003870; font-weight:bold; font-size:16px;" href="'.$collpath.'/products/'.$handle1.'"><p>'.htmlspecialchars($protitle2).'</p></a></div>
</div>
</div>';
     }  

         
      if(empty($varientss)) {
        print_r($result2);
      }
       else if(!empty($str_arr)) {
             
        
      // print_r($str_arr2);
      // echo "<br>";
        
    //  print_r($str_arr);
     // echo "<br><br>";
        
        
         $result=array_intersect($str_arr2,$str_arr);
        
         if(empty($result))
         {
         // echo "<p>Product Not Found</p>";
         }
        
        else if(!empty($result))
         {
          
          
         
          
          
             
         if(count($str_arr) >= 6) {
             if(count($result) >= count($str_arr)-2) {   print_r($result2);  }
            else if($duplicates >= 1 && count($result) >= 4) { print_r($result2); }
            else if($duplicates >= 2 && count($result) >= 3) { print_r($result2);   }
         }    
         else if(count($str_arr) == 5) {
            //echo $color_counts1."-";
            //echo $duplicates;
            if(count($result) >= count($str_arr)-1) {   print_r($result2);  }
            else if($duplicates >= 3) { if(count($result) >= 2) { print_r($result2); } }
            else if($color_counts1 >= 2  && $duplicates >= 2) { if(count($result) >= 3) { print_r($result2); } }
            else if($duplicates >= 2) { if(count($result) >= 3) { print_r($result2); } }  
            else if($duplicates >= 2 && count($result) >= 2) { print_r($result2);   }
            else if($duplicates >= 1 && count($result) >= 3) { print_r($result2); }   
           else if($duplicates >= 4) { print_r($result2); }
            
         }
         else if(count($str_arr) == 4)
         {
          //echo $duplicates;      
             if(count($result) == count($str_arr)) {   print_r($result2);  } 
            // else if($color_counts1 >= 3 && count($result) >= 2) { print_r($result2); }
           //  else if($size_counts1 >= 3 && count($result) >= 2) { print_r($result2); }
            // else if($material_counts1 >= 3 && count($result) >= 2) { print_r($result2); }
            // else if($color_counts1 >= 1 && $material_counts1 >= 1 && count($result) >= 3) { print_r($result2); }  
            else if($duplicates >= 2 && count($result) >= 2) { print_r($result2);   }
            else if($duplicates >= 1 && count($result) >= 3) { print_r($result2);   }
           else if($duplicates >= 3) { print_r($result2); }
                  
         } 
         else if(count($str_arr) == 3)
         {
          //echo $duplicates;      
             if(count($result) == count($str_arr)) {   print_r($result2);  } 
            // else if($color_counts1 >= 3 && count($result) >= 2) { print_r($result2); }
           //  else if($size_counts1 >= 3 && count($result) >= 2) { print_r($result2); }
            // else if($material_counts1 >= 3 && count($result) >= 2) { print_r($result2); }
            // else if($color_counts1 >= 1 && $material_counts1 >= 1 && count($result) >= 3) { print_r($result2); }         
             else if($duplicates >= 1 && count($result) >= 2) { print_r($result2);   }   
            else if($duplicates >= 2) { print_r($result2);   }  
          
         } else if(count($str_arr) == count($result)) {
             print_r($result2); 
         } else if(count($result) == 1 && count($str_arr) == 2 && $duplicates >= 1) {
             print_r($result2);   
         } else if(count($result) == 2 && count($str_arr) == 2) { print_r($result2); }
          
         
          
          
          
          
          
         }
         
         } else {
             print_r($result2);
             
         }
         
       unset($first_varientid); 
       unset($mystring3);
       unset($labeltype2);
       unset($labeltype3);
       unset($labeltype);
      unset($var_inventory_policy);
      unset($var_inventory_quantity);
       unset($pro_published_at);
      unset($result2);
       unset($result);
       $counter++;
     }     
 
 
 
 $total_count=$counter-1;
 if($total_count >= 250)
 {
include('inc_filter.php'); 
 }
 
    
}

?>
