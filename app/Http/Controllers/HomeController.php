<?php

namespace App\Http\Controllers;

use App\Aouthurl;
use Illuminate\Http\Request;
use PHPShopify;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->config = array(
            'ShopUrl' => $_ENV['SHOPIFY_URL'],
            'ApiKey' => $_ENV['SHOPIFY_API_KEY'],
            'Password' => $_ENV['SHOPIFY_PASSWORD'],
        ); 

        $this->redirectUrl = $_ENV['SHOPIFY_REDIRECT_URI'];
        $this->scopes = 'read_products,write_products,read_script_tags,write_script_tags';       
    }

    public function redirect() {

        $config = array(
            'ShopUrl' => $_ENV['SHOPIFY_URL'],
            'ApiKey' => $_ENV['SHOPIFY_PARTNER_API_KEY'],
            'SharedSecret' => $_ENV['SHOPIFY_PARTNER_API_SECRET'],
        );

        PHPShopify\ShopifySDK::config($this->config);
        $accessToken = PHPShopify\AuthHelper::getAccessToken();
        //var_dump($accessToken);
        session(['accesstoken' => $accessToken]);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        PHPShopify\ShopifySDK::config($this->config);
        PHPShopify\AuthHelper::createAuthRequest($this->scopes, $this->redirectUrl, null, null, true);

        $shopify = new PHPShopify\ShopifySDK($this->config);

        //$productID = 4473178357892;
        //$product = $shopify->Product($productID)->get();

        $products = $shopify->Product->get();

        return view('home', array('products'=>$products) );
    }

    public function view(Request $request) {

        $productId = $request->route('id');

        PHPShopify\ShopifySDK::config($this->config);
        PHPShopify\AuthHelper::createAuthRequest($this->scopes, $this->redirectUrl, null, null, true);

        $shopify = new PHPShopify\ShopifySDK($this->config);
        $product = $shopify->Product($productId)->get();
        
        return view('view', array('product'=>$product) );

    }

    public function edit(Request $request) {

        $productId = $request->route('id');

        PHPShopify\ShopifySDK::config($this->config);
        PHPShopify\AuthHelper::createAuthRequest($this->scopes, $this->redirectUrl, null, null, true);

        $shopify = new PHPShopify\ShopifySDK($this->config);
        $product = $shopify->Product($productId)->get();
        
        return view('edit', array('product'=>$product) );

    }

    public function create()
    {
        return view('create');
    }

    public function post(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'product_type' => 'required',
        ]);

        PHPShopify\ShopifySDK::config($this->config);
        PHPShopify\AuthHelper::createAuthRequest($this->scopes, $this->redirectUrl, null, null, true);

        $shopify = new PHPShopify\ShopifySDK($this->config);
        
        $arrProducts = array("title" => $request->get('title'),
                    "body_html" => $request->get('body_html'),
                    "vendor" => $request->get('vendor'),
                    "product_type" => $request->get('product_type'),
                    "variants" => array
                    (
                        array
                        (
                            "option1" => $request->get('color'),
                            "price" => $request->get('price'),
                            "sku" => $request->get('sku'),
                        )
                    ));

        $response = $shopify->Product->post($arrProducts);        
        
        //var_dump($response);
        header_remove();

        return redirect()->route('home')
                            ->with('status','Product created successfully.');  

    }

    public function put(Request $request)
    {
        // Process Edit
        $request->validate([
            'title' => 'required',
            'product_type' => 'required',
        ]);

        PHPShopify\ShopifySDK::config($this->config);
        PHPShopify\AuthHelper::createAuthRequest($this->scopes, $this->redirectUrl, null, null, true);

        $shopify = new PHPShopify\ShopifySDK($this->config);
        
        $arrProducts = array("title" => $request->get('title'),
                    "body_html" => $request->get('body_html'),
                    "vendor" => $request->get('vendor'),
                    "product_type" => $request->get('product_type'),
                    "variants" => array
                    (
                        array
                        (
                            "option1" => $request->get('color'),
                            "price" => $request->get('price'),
                            "sku" => $request->get('sku'),
                        )
                    ));

        $response = $shopify->Product($request->get('id'))->put($arrProducts);        
        
        //var_dump($response);
        header_remove();

        return redirect()->route('productview', [$request->get('id')])
                            ->with('status','Product updated successfully.');  
    }

    public function delete(Request $request)
    {
        $productId = $request->route('id');

        PHPShopify\ShopifySDK::config($this->config);
        PHPShopify\AuthHelper::createAuthRequest($this->scopes, $this->redirectUrl, null, null, true);

        $shopify = new PHPShopify\ShopifySDK($this->config);
        $product = $shopify->Product($productId)->delete();
        
        header_remove();

        return redirect()->route('home')
                            ->with('status','Product has been removed.');  
    }

    

}
