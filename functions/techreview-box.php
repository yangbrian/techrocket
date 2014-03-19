<?php 
/*
	Front end review at a glance box
 */

/**
 * Displays the front end box content.
 * 
 * @param int $post_id The ID of the current post
 */
function techrev_review_box($post_id) {
    $tech_rev = get_post_meta( $post_id, '_tech_rev', true);

    if (!empty($tech_rev)) {

	    echo '
		    <div class="revsc">    <!-- Start Scorecard Content Div -->
		        <div class="revsc-content">    <!--Scorecard Header -->
		            <h2>Review at a Glance</h2>    <!-- Product Information -->
		            <div id="prodinfo">
		                <ul>
		                    <li><strong>' . $tech_rev['type'] . ' Name:</strong> ' . $tech_rev['name'] . '</li>
		                    <li><strong>Company:</strong> ' . $tech_rev['pub'] . '</li>
		                    <li><strong>Price:</strong> ' . $tech_rev['price'] . '</li>
		                </ul>
		            </div>
		            <div id="prodpro">    <!-- Product Pros and Cons -->
		                <h3>The Good</h3>
		                <ul>';

	    		if ($tech_rev['pro1'])
	            		echo '<li>' . $tech_rev['pro1'] . '</li>';

	                if ($tech_rev['pro2'])
	            		echo '<li>' . $tech_rev['pro2'] . '</li>';

	                if ($tech_rev['pro3'])
	            		echo '<li>' . $tech_rev['pro3'] . '</li>';

	                echo '</ul>
	            </div>

	            <div id="prodcon">
		            <h3>The Bad</h3>

		            <ul>';
		            
		        if ($tech_rev['con1'])
		            	echo '<li>' . $tech_rev['con1'] . '</li>';
	             
	                if ($tech_rev['con2'])
	            		echo '<li>' . $tech_rev['con2'] . '</li>';

	                if ($tech_rev['con3']) 
	                    echo '<li>' . $tech_rev['con3'] . '</li>';

	                echo '</ul>
	            </div>';
	            
	                if ($tech_rev['revfin']) {

                        	echo '
        		            <div id="prodcon">    <!-- Product Final Verdict -->
        		                <h3>Bottom Line</h3>
        		                <p>' . $tech_rev['revfin'] . '</p>
        		            </div>';
			            
	                }

	                echo '
        	            <div id="rating">    <!-- Product Rating -->
        	                <span class="rate">Rating:</span>
        	                <div class="review-stars rate' . $tech_rev['rate'] . '">
        	                    <span class="rating">' . $tech_rev['rate'] . '</span>
        	                </div>
        	            </div>';
	            
	                if ($tech_rev['img']) {
		            echo '
		            <div id="prodimg">    <!-- Product Image -->
		                <img src="' . $tech_rev['img'] . '" alt="Review of ' . $tech_rev['name'] . '" title="Review of ' . $tech_rev['name'] . '" width="270" height="140" />
		            </div>';

	                }
	         echo '   
	        </div>
	    </div>';    

    }
}
