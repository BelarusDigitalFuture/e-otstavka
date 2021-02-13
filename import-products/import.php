<?php
require __DIR__ . '/vendor/autoload.php';

use Automattic\WooCommerce\Client;
use Automattic\WooCommerce\HttpClient\HttpClientException;
// TODO: Add Badges Spicy
// TODO: Add Warehouse tag
// Script start
$rustart = getrusage();

function getWoocommerceConfig()
{
    $woocommerce = new Client(
        'https://mobile.leadergroup.by',
	    'ck_6e13eec6b7683d37d81cc7ba21cbc48873d261f9', 
	    'cs_c31847d4a1328de09c4e2ae0e23d41008d2501ec',
        [
            'wp_api' => true,
            'version' => 'wc/v3',
            'query_string_auth' => false,
        ]
    );

    return $woocommerce;
}


/**
 * Check if image exist on server
 *
 * @param  string $image
 * @return true
 */
 
function checkImageExists($image){
	if (@getimagesize($image)) {
		return true;
	} else {
		return false;
	}			
}

function writeToLog($data){
	$fp = fopen(dirname(__FILE__) . '/data.txt', 'a');//opens file in append mode  
    fwrite($fp, print_r($data, true));            
	fclose($fp);	
}

/**
 * Find category in full list
 *
 * @param  string $category, $allCategories
 * @return category name
 */
 
function findRealCategory($category, $allCategories){
	foreach ($allCategories as $allCategory){
        if ($allCategory["id"] == $category){
	        $category = $allCategory["name"];
	        return $allCategory["name"];
        }
    }
}

/**
 * Parse JSON file.
 *
 * @param  string $file
 * @return array
 */
function getJsonFromFile()
{
    $file = dirname(__FILE__) . '/products.json';
    $json = json_decode(file_get_contents($file), true);
    return $json;
}

function checkProductBySku($skuCode)
{
    $woocommerce = getWoocommerceConfig(); 
    $products = $woocommerce->get('products', ['sku'=> $skuCode]);
    foreach ($products as $product) {
        $currentSku = strtolower($product->sku);
        $skuCode = strtolower($skuCode);
        if ($currentSku === $skuCode) {
            return ['exist' => true, 'idProduct' => $product->id];
        }
    }
    return ['exist' => false, 'idProduct' => null];
}


function createProducts()
{
    $woocommerce = getWoocommerceConfig();
    $products = getJsonFromFile()["products"];
    $allCategories = getJsonFromFile()["categories"];
    $imgCounter = 0;
    $prodCount = 0;
    foreach ($products as $product) {
        /*Chec sku before create the product */
        $productExist = checkProductBySku($product['id']);
        $imagesFormated = array();
        /*Main information */
        $name = $product['name'];
        $slug = $product['url'];
        $sku = $product['id'];
        $description = $product['desc'];
        $images = $product['picture'];
        $attributes = $product['params'];
        array_splice($attributes, 0, 0, $product['size'] );
        $categories = $product['category'];        
        $categoriesIds = array();
        if (is_array($images)){
	        foreach ($images as $image){
		        if (checkImageExists($image) == true){
			        $imagesFormated[] = [
		                'src' => $image,
		                'position' => 0
		            ];
		            $imgCounter++;
		        }
	        }
        }else {
	        if (checkImageExists($images) == true){
		        $imagesFormated[] = [
	                'src' => $images,
	                'position' => 0
	            ];
	            $imgCounter++;
		    }	        
        } 
        
		if (is_array($categories)){
	        /* Prepare categories */
	        foreach ($categories as $category) {	
		        $categoryName = findRealCategory($category, $allCategories);
		        if ($categoryName)	{
		            $categoriesIds[] = ['id' => getCategoryIdByName($categoryName)];			        
		        }        
	        }			
		}else {
			$categoryName = findRealCategory($categories, $allCategories);
	        if ($categoryName)	{
	            $categoriesIds[] = ['id' => getCategoryIdByName($categoryName)];			        
	        }else {
		        $categoriesIds = "";
	        }			
		}
        $finalProduct = [
            'name' => $name,
            'slug' => $slug,
            'sku' => $sku,
            'description' => $description,
            'regular_price' => $product['price']['value'],            
            'categories' => $categoriesIds,
            'attributes' => getproductAtributesNames($attributes)

        ];
        if ($imagesFormated[0]['src'] != ''){
	        $finalProduct['images'] = $imagesFormated;
        }
        else {
	        $finalProduct['images'] = '';
        }
        $fp = fopen(dirname(__FILE__) . '/data.txt', 'a');//opens file in append mode  
        print_r($finalProduct);
        fwrite($fp, print_r($finalProduct, true));  
        if (!$productExist['exist']) {
             $productResult = $woocommerce->post('products', $finalProduct);
             echo "created product #" . $prodCount . " " . $finalProduct["name"] . " sku: " . $finalProduct["sku"] . "<br> \n \r\n";
             fwrite($fp, "created product #" . $prodCount . " " . $finalProduct["name"] . " sku: " . $finalProduct["sku"] . "<br> \n \r\n");
        } else {
            /*Update product information */
            $idProduct = $productExist['idProduct'];
            $woocommerce->put('products/' . $idProduct, $finalProduct);
            echo "updated product #" . $prodCount . " " . $finalProduct["name"] . " sku: " . $finalProduct["sku"] . "<br> \n \r\n";
            fwrite($fp, "updated product #" . $prodCount . " " . $finalProduct["name"] . " sku: " . $finalProduct["sku"] . "<br> \n \r\n");            
        }
          
		fclose($fp);  
		$prodCount++;
       unset($name);
       unset($slug);
       unset($sku);
       unset($description);
       unset($imagesFormated);
       unset($image);
       unset($images);       
       unset($categoriesIds);
       unset($attributes); 
       unset($finalProduct);                                                 
    }
}


function createCategory($value)
{
	$woocommerce = getWoocommerceConfig();
	$categoryId = checkCategoryByname($value["name"]);
	$data = [
        'name' => $value["name"],
        'parent'=> $value["parent"]
    ];
    print_r($categoryId);
    print_r($data);

    writeToLog($data);
    
    if (!$categoryId) {        
        $woocommerce->post('products/categories', $data);
    }else {
	    $woocommerce->put('products/categories/'.$categoryId, $data);
    }

}

function createCategories()
{
    $products = getJsonFromFile()["products"];
    $allCategories = getJsonFromFile()["categories"]; 
    $allWithParent = array();   
    // loop throught all categories and find parent
    foreach ($allCategories as $allCategory){
	    // if we have parent lets bind them together	   
	    if ($allCategory["parent"] !== 0){
		    // loop throught all categories
		    foreach ($allCategories as $findCategory){
			    // find id of parent and get its name			    
			    if($findCategory["id"] == $allCategory["parent"]){				    
				    // get its id in woocommerce from name				    
				   $parentId = getCategoryIdByName($findCategory["name"]); 
				   $category = array("name"=>$allCategory["name"], "parent"=>$parentId);
				   createCategory($category);
			    }
		    }
		    
	    }
	    // if does not have parent create right away
	    else {		    
		    $category = array("name"=>$allCategory["name"], "parent"=>"0");
		    createCategory($category);
	    }
	    
    }
    return " Done importing categories";
}

function checkCategoryByName($categoryName)
{
	$categoryName = str_replace("  ", " ", $categoryName);
    $woocommerce = getWoocommerceConfig();
    $categories = $woocommerce->get('products/categories', ['posts_per_page' => 100, 'number'=> 100, 'per_page'=>100, 'search'=>$categoryName]);
    $lastResponse = $woocommerce->http->getResponse();
	$headers = $lastResponse->getHeaders();
	$totalPages = $headers['X-WP-TotalPages'];
	$i = 0;
	$page = 1;
	while ($i++ < $totalPages)
	{
		$categories = $woocommerce->get('products/categories', ['posts_per_page' => 100, 'number'=> 100, 'per_page'=>100, 'page'=> $page, 'search'=>$categoryName]);
		foreach ($categories as $category) {
	        if ($category->name === $categoryName) {
	            return $category->id;
	        }
	    }
	    $page++;   
	}
    
    return false;
}

/** CATEGORIES  **/


function getCategoryIdByName($categoryName)
{
	$woocommerce = getWoocommerceConfig();
    $categories = $woocommerce->get('products/categories', ['posts_per_page' => 100, 'number'=> 100, 'per_page'=>100, 'search'=>$categoryName]);
    $lastResponse = $woocommerce->http->getResponse();
	$headers = $lastResponse->getHeaders();
	$totalPages = $headers['X-WP-TotalPages'];
	$i = 0;
	$page = 1;
	while ($i++ < $totalPages)
	{
		$categories = $woocommerce->get('products/categories', ['posts_per_page' => 100, 'number'=> 100, 'per_page'=>100, 'page'=> $page, 'search'=>$categoryName]);
		foreach ($categories as $category) {;
	        if ($category->name == $categoryName) {
	            return $category->id;
	        }
	    }
	    $page++;   
	}		        
}

function getproductAtributesNames($attributes)
{
    $keys = array();
    foreach ($attributes as $attribute) {        
        $attr[] = 
            array(
                'name' => (isset($attribute['unit']) ? $attribute['unit'] : $attribute['id']),
                'slug' => 'attr_' . (isset($attribute['unit']) ? $attribute['unit'] : $attribute['id']),
                'visible' => true,
                'variation' => true,
                'options' => $attribute['value']
            );
    }   
    return $attr;
}


function prepareInitialConfig()
{
    echo ('Importing data, wait...')."\n";
    writeToLog( date("Y.m.d") . " " . date("h:i:sa") . "Importing data");
    createCategories();
    createProducts();
    writeToLog("Done" . date("Y.m.d") . " " . date("h:i:sa") );
    echo ('Done!')."\n";
}

prepareInitialConfig();


function rutime($ru, $rus, $index) {
    return ($ru["ru_$index.tv_sec"]*1000 + intval($ru["ru_$index.tv_usec"]/1000))
     -  ($rus["ru_$index.tv_sec"]*1000 + intval($rus["ru_$index.tv_usec"]/1000));
}

$ru = getrusage();
echo "This process used " . rutime($ru, $rustart, "utime") .
    " ms for its computations\n";
echo "It spent " . rutime($ru, $rustart, "stime") .
    " ms in system calls\n";

?>