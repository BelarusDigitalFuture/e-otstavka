<?php
require __DIR__ . '/vendor/autoload.php';

use Automattic\WooCommerce\Client;
use Automattic\WooCommerce\HttpClient\HttpClientException;

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
	$file_headers = @get_headers($image);
	if($file_headers || $file_headers[0] != 'HTTP/1.1 404 Not Found')
		return true;
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
    $products = $woocommerce->get('products');
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
		        if (checkImageExists($image)){
			        $imagesFormated[] = [
		                'src' => $image,
		                'position' => 0
		            ];
		            $imgCounter++;
		        }
	        }
        }else {
	        $imagesFormated[] = [
                'src' => $images,
                'position' => 0
            ];
            $imgCounter++;
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
	        }			
		}
        $finalProduct = [
            'name' => $name,
            'slug' => $slug,
            'sku' => $sku,
            'description' => $description,
            'regular_price' => $product['price']['value'],
            'images' => $imagesFormated,
            'categories' => $categoriesIds,
            'attributes' => getproductAtributesNames($attributes)

        ];

        if (!$productExist['exist']) {
             $productResult = $woocommerce->post('products', $finalProduct);
        } else {
            /*Update product information */
            $idProduct = $productExist['idProduct'];
            $woocommerce->put('products/' . $idProduct, $finalProduct);
        }
       unset($name);
       unset($slug);
       unset($sku);
       unset($description);
       unset($imagesFormated);
       unset($image);
       unset($categoriesIds);
       unset($attributes);                                                  
    }
}


function createCategory($value)
{
	$woocommerce = getWoocommerceConfig();
    if (!checkCategoryByname($value["name"])) {
        $data = [
            'name' => $value["name"],
            'parent'=> $value["parent"]
        ];
        $woocommerce->post('products/categories', $data);
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
    $woocommerce = getWoocommerceConfig();
    $categories = $woocommerce->get('products/categories');
    foreach ($categories as $category) {
        if ($category->name === $categoryName) {
            return true;
        }
    }
    return false;
}

/** CATEGORIES  **/


function getCategoryIdByName($categoryName)
{
    $woocommerce = getWoocommerceConfig();
    $categories = $woocommerce->get('products/categories');
    foreach ($categories as $category) {;
        if ($category->name == $categoryName) {
            return $category->id;
        }
    }
}

function getproductAtributesNames($attributes)
{
    $keys = array();
    foreach ($attributes as $attribute) {        
        $attributes[] = 
            array(
                'name' => $attribute['unit'],
                'slug' => 'attr_' . $attribute['unit'],
                'visible' => true,
                'variation' => true,
                'options' => $attribute['value']
            );
    }   
    return $attributes;
}


function prepareInitialConfig()
{
    echo ('Importing data, wait...')."\n";
    createCategories();
    createProducts();
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