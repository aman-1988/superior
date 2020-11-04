<?php
  // $json_data10 = getorder9("https://".$SHOPIFY_SHOP."/admin/api/2020-07/products.json?collection_id=".$name."&published_status=published&limit=250");
 $json_data10 = getorder9("https://".$SHOPIFY_SHOP."/admin/api/unstable/collections/".$name."/products.json?sort_order=price-asc&limit=250");
   $next_prvious = parsePaginationLinkHeader($json_data10);
   
   $next_info = $next_prvious['next'];
  // echo $next_info;
    //$json_data = getorder("https://".$SHOPIFY_SHOP."/admin/api/2020-07/products.json?page_info=".$next_info."&limit=250");
      $json_data = getorder("https://".$SHOPIFY_SHOP."/admin/api/unstable/collections/".$name."/products.json?page_info=".$next_info."&limit=250");
    //print_r($json_data);
    $product_line_items5 = $json_data['products'];  

     foreach ($product_line_items5 as $keys3 => $values3)
     {
         $productid2 = $product_line_items5[$keys3]['id'];
         //$variant_id2 = $product_line_items[$keys3]['variant_id'];
         $protitle2 = $product_line_items5[$keys3]['title'];
         $proname2 = $product_line_items5[$keys3]['name'];
         $handle1 = $product_line_items5[$keys3]['handle'];
         $proimgs1 = $product_line_items5[$keys3]['image']['src'];
      $product_type1 = $product_line_items5[$keys3]['product_type'];
       $admin_graphql_api_id = $product_line_items5[$keys3]['admin_graphql_api_id'];
                       
        // $productss2 = getorder("https://".$SHOPIFY_SHOP."/admin/api/unstable/products/".$productid2.".json");
         //$product_line_items3 = $productss2['product'];  
        // $price_varient1 = $product_line_items3['variants'][0]['price'];
         //$price_compare_at_price = $product_line_items3['variants'][0]['compare_at_price'];
        
       // $queries = array('query' => 'query { product(id: "'.$admin_graphql_api_id.'") { variants(first:1) { edges { node { compareAtPrice  price  title  }  } }    } }');
      // $productss2 = httpPost9("https://".$SHOPIFY_SHOP."/admin/api/2020-10/graphql.json",$queries); 
       // $price_varient1 = $productss2['data']['product']['variants']['edges'][0]['node']['price'];
      //  $price_compare_at_price = $productss2['data']['product']['variants']['edges'][0]['node']['compareAtPrice'];
        
      
      
      
        // $first_varientid = $product_line_items[$keys3]['variants'][0]['id'];
         
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
      $vp_string = strtolower(str_replace(", ", ",",$product_line_items5[$keys3]['tags']));
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
      
      $word31 = "RankGood";
      $word41 = "RankBetter";
      $word51 = "RankBest";
      
      $word61 = "Free Freight";
      $word71 = "Discounted Freight";
      $word81 = "QuickShip";
      $word91 = "LocalDelivery";
      
      
      $mystring3 = $product_line_items5[$keys3]['tags'];
if(strpos($mystring3, $word31) !== false) {
    $labeltype = '<span style="text-indent:5px; line-height:20px; text-align: center;"class="variation"><p style="line-height: 18px;font-size: 13px; font-weight: bold;">Good</p></span>';
} else if(strpos($mystring3, $word41) !== false) {
    $labeltype = '<span style="text-indent:6px; line-height:20px; text-align: center;"class="variationBetter"><p style="line-height: 18px;font-size: 13px; font-weight: bold;">Better</p></span>';
} else if(strpos($mystring3, $word51) !== false) {
    $labeltype = '<span style="text-indent:7px; line-height:20px; text-align: center;"class="variationBest"><p style="line-height: 18px;font-size: 13px; font-weight: bold;">Best</p></span>';
}
      
if(strpos($mystring3, $word61) !== false) {
 $labeltype2 = '<div style="margin-bottom:0px;"><div style="font-weight:bold; font-size:18px; color:#6e9674; text-align:left; margin-left:10px;"> Ships Free </div> <img style="width: 70px;height: 40px; position:absolute; margin-top:-40px; margin-left:106px;"src="https://cdn.shopify.com/s/files/1/2304/9095/files/free.png?v=1587666400"></div>';
}  if(strpos($mystring3, $word81) !== false) {
 $labeltype2 = '<div style="margin-bottom:0px;"><div style="font-weight: bold;font-size: 18px;color:#950c0c"> Quick Ship</div> <img style="width: 70px;height: 40px; position: absolute;margin-top: -40px;margin-left: 100px;"src="https://cdn.shopify.com/s/files/1/2304/9095/files/free.png?v=1587666400"><br></div>';
}  if(strpos($mystring3, $word91) !== false) {
 $labeltype2 = '<div style="margin-top:-8px; height:54px;"><div class="pickup-mobile"> Pickup In Store</div> <img style="position:absolute;margin-top:-70px;width: 120px;height:110px;"  class="pickup-icon-mobile"src="https://marketplace.magento.com/media/catalog/product/cache/7230773f37a543ef738e324844b23ad1/s/t/store-pickup_1.png"><br></div>';
}  if(strpos($mystring3, $word71) !== false) {
  $labeltype3 = '<div style="font-weight:bold; font-size:18px; color:#136FF3; text-align:left; margin-left:10px;"> Ships Free </div> <img style="width:70px;height:40px; position: absolute; margin-top:-40px; margin-left:100px;"src="https://cdn.shopify.com/s/files/1/2304/9095/files/free.png?v=1587666400"><br>';
} else {
  $labeltype3 = '<div style="visibility:hidden;"><span style="font-weight: bold;font-size: 18px;color:#6e9674"> Ships Free </span> <img style="width: 70px;height: 40px; position: absolute;margin-top: -40px;margin-left: 100px;"src="https://cdn.shopify.com/s/files/1/2304/9095/files/free.png?v=1587666400"><br></div>';
}
      
      

         include('condition_for_loop.php');
        $product_line_items3 = $productss2['product'];  
        $price_varient1 = $product_line_items3['variants'][0]['price'];
        $price_compare_at_price = $product_line_items3['variants'][0]['compare_at_price'];
        $first_varientid = $product_line_items3['variants'][0]['id'];
       //$first_varientid = $product_line_items[$keys3]['variants'][0]['id'];
        
       // $price_varient1 = $product_line_items[$keys3]['variants'][0]['price'];
        //$price_compare_at_price = $product_line_items[$keys3]['variants'][0]['compare_at_price'];
      
      if($price_varient1 < $price_compare_at_price) {
       $price1 = '<div class="onsale">$'.$price1.'</div><div class="was">$'.$price_compare_at_price.'</div>';
      } else {
       $price1 = '<div class="prod-price"><span class="normal-money">Price $'.$price_varient1.'</span></div>';
      }
      
      if( $price_varient1 > 1000 && $product_type1 == 'Equipment') {       
       $price1 = '<span class="Retail">Retail Price</span><span class="money"> $'.$price_varient1.'</span><br><button style="text-color: #FFFFFF;"><span class="email"><a style="color: #FFFFFF;" href="'.$collpath.'/products/'.$handle1.'">Email Me My Price</span></a></button>';
      }
      
         
          //$result2 = $handle1. " - $".$price1." - ".$proimgs1;
   if(!empty($first_varientid))
   {
      $result2 = '
<div data-tag="'.htmlspecialchars($product_line_items5[$keys3]['tags']).'" class="'.htmlspecialchars($product_line_items5[$keys3]['tags']).' product-index desktop-3 tablet-2 mobile-half" data-alpha="" data-price="'.$price_varient1.'" style="height:620px;">     
<div class="prod-border"><div class="prod-container">
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
       //echo "<br>";
        
      //print_r($str_arr);
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
         
        unset($mystring3);
       unset($result);  
     }     





?>
