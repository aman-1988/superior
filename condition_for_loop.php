<?php
      if(empty($varientss)) {
         $productss2 = getorder2("https://".$SHOPIFY_SHOP."/admin/api/unstable/products/".$productid2.".json");
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
             if(count($result) >= count($str_arr)-2) {   $productss2 = getorder2("https://".$SHOPIFY_SHOP."/admin/api/unstable/products/".$productid2.".json");  }
            else if($duplicates >= 1 && count($result) >= 4) {  $productss2 = getorder2("https://".$SHOPIFY_SHOP."/admin/api/unstable/products/".$productid2.".json"); }
            else if($duplicates >= 2 && count($result) >= 3) {  $productss2 = getorder2("https://".$SHOPIFY_SHOP."/admin/api/unstable/products/".$productid2.".json");   }
         }    
         else if(count($str_arr) == 5) {
            //echo $color_counts1."-";
            //echo $duplicates;
            if(count($result) >= count($str_arr)-1) {  $productss2 = getorder2("https://".$SHOPIFY_SHOP."/admin/api/unstable/products/".$productid2.".json");  }
            else if($duplicates >= 3) { if(count($result) >= 2) {  $productss2 = getorder2("https://".$SHOPIFY_SHOP."/admin/api/unstable/products/".$productid2.".json");  } }
            else if($color_counts1 >= 2  && $duplicates >= 2) { if(count($result) >= 3) {  $productss2 = getorder2("https://".$SHOPIFY_SHOP."/admin/api/unstable/products/".$productid2.".json");  } }
            else if($duplicates >= 2) { if(count($result) >= 3) {  $productss2 = getorder2("https://".$SHOPIFY_SHOP."/admin/api/unstable/products/".$productid2.".json");  } }  
            else if($duplicates >= 2 && count($result) >= 2) {  $productss2 = getorder2("https://".$SHOPIFY_SHOP."/admin/api/unstable/products/".$productid2.".json");   }
            else if($duplicates >= 1 && count($result) >= 3) {  $productss2 = getorder2("https://".$SHOPIFY_SHOP."/admin/api/unstable/products/".$productid2.".json"); }   
           else if($duplicates >= 4) {  $productss2 = getorder2("https://".$SHOPIFY_SHOP."/admin/api/unstable/products/".$productid2.".json"); }
            
         }
         else if(count($str_arr) == 4)
         {
          //echo $duplicates;      
             if(count($result) == count($str_arr)) {    $productss2 = getorder2("https://".$SHOPIFY_SHOP."/admin/api/unstable/products/".$productid2.".json");  } 
            // else if($color_counts1 >= 3 && count($result) >= 2) { print_r($result2); }
           //  else if($size_counts1 >= 3 && count($result) >= 2) { print_r($result2); }
            // else if($material_counts1 >= 3 && count($result) >= 2) { print_r($result2); }
            // else if($color_counts1 >= 1 && $material_counts1 >= 1 && count($result) >= 3) { print_r($result2); }  
            else if($duplicates >= 2 && count($result) >= 2) {  $productss2 = getorder2("https://".$SHOPIFY_SHOP."/admin/api/unstable/products/".$productid2.".json");   }
            else if($duplicates >= 1 && count($result) >= 3) {  $productss2 = getorder2("https://".$SHOPIFY_SHOP."/admin/api/unstable/products/".$productid2.".json");   }
           else if($duplicates >= 3) {  $productss2 = getorder2("https://".$SHOPIFY_SHOP."/admin/api/unstable/products/".$productid2.".json"); }
                  
         } 
         else if(count($str_arr) == 3)
         {
          //echo $duplicates;      
             if(count($result) == count($str_arr)) {    $productss2 = getorder2("https://".$SHOPIFY_SHOP."/admin/api/unstable/products/".$productid2.".json");  } 
            // else if($color_counts1 >= 3 && count($result) >= 2) { print_r($result2); }
           //  else if($size_counts1 >= 3 && count($result) >= 2) { print_r($result2); }
            // else if($material_counts1 >= 3 && count($result) >= 2) { print_r($result2); }
            // else if($color_counts1 >= 1 && $material_counts1 >= 1 && count($result) >= 3) {  $productss2 = httppost("https://".$SHOPIFY_SHOP."/admin/api/unstable/graphql.json",$queries3); }         
             else if($duplicates >= 1 && count($result) >= 2) {  $productss2 = getorder2("https://".$SHOPIFY_SHOP."/admin/api/unstable/products/".$productid2.".json");   }   
            else if($duplicates >= 2) {  $productss2 = getorder2("https://".$SHOPIFY_SHOP."/admin/api/unstable/products/".$productid2.".json");   }  
          
         } else if(count($str_arr) == count($result)) {
              $productss2 = getorder2("https://".$SHOPIFY_SHOP."/admin/api/unstable/products/".$productid2.".json");
         } else if(count($result) == 1 && count($str_arr) == 2 && $duplicates >= 1) {
             $productss2 = getorder2("https://".$SHOPIFY_SHOP."/admin/api/unstable/products/".$productid2.".json"); 
         } else if(count($result) == 2 && count($str_arr) == 2) {  $productss2 = getorder2("https://".$SHOPIFY_SHOP."/admin/api/unstable/products/".$productid2.".json"); }
          
         
          
          
          
          
          
         }
         
         } else {
            $productss2 = getorder2("https://".$SHOPIFY_SHOP."/admin/api/unstable/products/".$productid2.".json");
             
         }


?>
