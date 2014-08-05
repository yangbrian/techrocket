<?php
/*
    Meta box content for the post edit page
 */
?>

<div class="tech_rev_control">

    <div class="aboutbox">
        <p>If you're reviewing a product, please fill out all fields in this box. This will show up in the review at a glance box on the sidebar. Leave all fields blank if this is not a review.</p>
   
    </div>
    <div class="aboutprod">
        <label>Product Type</label>
         <p>
            <select name="_tech_rev[type]">
                <option value="<?php if(!empty($meta['type'])) echo $meta['type']; ?>"><?php if(!empty($meta['type'])) echo $meta['type']; ?></option>
                <option value="Software">Software</option>
                <option value="Device">Device</option>
                <option value="Accessory">Accessory</option>
            </select>
            <span>Choose the best category for the type of product.</span>
        </p>
    
        <label>Product Name</label>
         <p>
            <input style="width:25%;" type="text" name="_tech_rev[name]" value="<?php if(!empty($meta['name'])) echo $meta['name']; ?>"/>
            <span>Name of Product. Include the version number. <em>Example: Safari 5.0.1</em></span>
        </p>
     
        <label>Publisher Name</label>
         <p>
            <input style="width:25%;" type="text" name="_tech_rev[pub]" value="<?php if(!empty($meta['pub'])) echo $meta['pub']; ?>"/>
            <span>Name of Publisher. <em>Example: Microsoft Corp.</em></span>
        </p>
        
        <label>Price</label>
         <p>
            <input style="width:25%;" type="text" name="_tech_rev[price]" value="<?php if(!empty($meta['price'])) echo $meta['price']; ?>"/>
            <span>Price of the product in US Dollars. Do <em>not</em> include the dollar sign.</em></span>
        </p>
    </div>
    
    <div class="revprod">
        <label>Rating</label>
         <p>
            <select name="_tech_rev[rate]">

                <?php
                    $ratings = array(
                            "1 - Absolute trash.",
                            "2 - Close to zero redeeming qualities.",
                            "3 - Very few redeeming qualities.",
                            "4 - All right, but not recommended.",
                            "5 - Just okay.",
                            "6 - Decent. Could be better.",
                            "7 - Solid product with some minor flaws..",
                            "8 - Great product with very few flaws.",
                            "9 - Almost perfect, but not quite there yet.",
                            "10 - Absolutely perfect (or very close to it)."
                        );
                ?>

                <option value="<?php if(!empty($meta['rate'])) echo $meta['rate']; ?>"><?php if(!empty($meta['rate'])) echo $ratings[$meta['rate'] - 1]; ?></option>
                <?php

                    echo '
                        <option value="1">'. $ratings[0] .'</option>
                        <option value="2">'. $ratings[1] .'</option>
                        <option value="3">'. $ratings[2] .'</option>
                        <option value="4">'. $ratings[3] .'</option>
                        <option value="5">'. $ratings[4] .'</option>
                        <option value="6">'. $ratings[5] .'</option>
                        <option value="7">'. $ratings[6] .'</option>
                        <option value="8">'. $ratings[7] .'</option>
                        <option value="9">'. $ratings[8] .'</option>
                        <option value="10">'. $ratings[9] .'</option>
                    ';
                ?>
            </select>
            <span>Give this product a rating on a scale of 1 to 10, with 10 being the best. Please take into account all aspects of the product, including features, ease of use, performance, value, and design. Be critical but do not be bias in any way.</span>
        </p>
        
        <p style="font-size:16px;">The Good</p>
        <p>There has to be <em>something</em> you like about this product. List the top 3.</p>
        <label>Best Thing About the Product</label>
         <p>
            <input type="text" name="_tech_rev[pro1]" value="<?php if(!empty($meta['pro1'])) echo $meta['pro1']; ?>"/>
            <span>What is the absolute best thing about this product?</em></span>
        </p>
        
        <label>2nd Best Thing About the Product</label>
         <p>
            <input type="text" name="_tech_rev[pro2]" value="<?php if(!empty($meta['pro2'])) echo $meta['pro2']; ?>"/>
            <span>What is the second best thing about this product?</em></span>
        </p>
        
        <label>3rd Best Thing About the Product</label>
         <p>
            <input type="text" name="_tech_rev[pro3]" value="<?php if(!empty($meta['pro3'])) echo $meta['pro3']; ?>"/>
            <span>What is the third best thing about this product?</em></span>
        </p>
        
        <p style="font-size:16px;">The Bad</p>
        <p>There has to be <em>something</em> you dislike about this product. List the top 3.</p>
        <label>Worst Thing About the Product</label>
         <p>
            <input type="text" name="_tech_rev[con1]" value="<?php if(!empty($meta['con1'])) echo $meta['con1']; ?>"/>
            <span>What is the absolute worst thing about this product?</em></span>
        </p>
        
        <label>2nd Worst Thing About the Product</label>
         <p>
            <input type="text" name="_tech_rev[con2]" value="<?php if(!empty($meta['con2'])) echo $meta['con2']; ?>"/>
            <span>What is the second worst thing about this product?</em></span>
        </p>
        
        <label>3rd Worst Thing About the Product</label>
         <p>
            <input type="text" name="_tech_rev[con3]" value="<?php if(!empty($meta['con3'])) echo $meta['con3']; ?>"/>
            <span>What is the third worst thing about this product?</em></span>
        </p>
        
        <p style="font-size:16px;">Bottom Line</p>
        
        <label>Sum up your review</label>
         <p>
            <input type="text" name="_tech_rev[revfin]" value="<?php if(!empty($meta['revfin'])) echo $meta['revfin']; ?>"/>
            <span>In one sentence, summarize your final verdict. You can elaborate in the final verdict section of the review.</span>
        </p>
    </div>
    
    <div class="prodimg">
    <p style="font-size:16px;">Thumbnail</p>
        <label>URL to Thumbnail (Optional)</label>
         <p>
            <input type="text" name="_tech_rev[img]" value="<?php if(!empty($meta['img'])) echo $meta['img']; ?>"/>
            <span>URL to thumbnail image. Please upload the image using the media uploader in the post editor and copy the file URL from there. The image size must be exactly 270 by 140 pixels or it will look ugly.</em></span>
        </p>
    </div>
</div>
