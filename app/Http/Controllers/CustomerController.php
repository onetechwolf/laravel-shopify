<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPShopify;
use App\Post;

class CustomerController extends Controller
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

        $customers = $shopify->Customer->get();

        return view('customer.index', array('customers'=>$customers) );
    }

    public function view(Request $request) {

        $customerId = $request->route('id');

        PHPShopify\ShopifySDK::config($this->config);
        PHPShopify\AuthHelper::createAuthRequest($this->scopes, $this->redirectUrl, null, null, true);

        $shopify = new PHPShopify\ShopifySDK($this->config);
        $customer = $shopify->Customer($customerId)->get();
        
        //echo '<pre>';
        //print_r($customer);
        //echo '</pre>';

        return view('customer.view', array('customer'=>$customer) );

    }

    public function edit(Request $request) {

        $customerId = $request->route('id');

        PHPShopify\ShopifySDK::config($this->config);
        PHPShopify\AuthHelper::createAuthRequest($this->scopes, $this->redirectUrl, null, null, true);

        $shopify = new PHPShopify\ShopifySDK($this->config);
        $customer = $shopify->Customer($customerId)->get();
        
        return view('customer.edit', array('customer'=>$customer) );

    }

    public function create()
    {
        return view('customer.create');
    }

    public function post(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        PHPShopify\ShopifySDK::config($this->config);
        PHPShopify\AuthHelper::createAuthRequest($this->scopes, $this->redirectUrl, null, null, true);


        $shopify = new PHPShopify\ShopifySDK($this->config);

        try {           

        
        $arrCustomer = array("first_name" => $request->get('first_name'),
                    "last_name" => $request->get('last_name'),
                    "email" => $request->get('email'),
                    "phone" => $request->get('phone'),
                    "addresses" => array
                    (
                        array
                        (
                            "address1" => $request->get('address1'),
                            "city" => $request->get('city'),
                            "province" => $request->get('province'),
                            "zip" => $request->get('zip'),
                            "country" => $request->get('country'),
                            "last_name" => $request->get('address_first_name'),
                            "first_name" => $request->get('address_last_name')
                        )
                    ));    
            $response = $shopify->Customer->post($arrCustomer); 

        } catch (Exception $e) {
            return $e;

        }
               
        
        //var_dump($response);
        header_remove();

        return redirect()->route('customers')
                            ->with('status','Customer created successfully.');  

    }

 	public function put(Request $request)
    {
        // Process Edit
         $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        PHPShopify\ShopifySDK::config($this->config);
        PHPShopify\AuthHelper::createAuthRequest($this->scopes, $this->redirectUrl, null, null, true);

        $shopify = new PHPShopify\ShopifySDK($this->config);
        
        $arrCustomer = array("first_name" => $request->get('first_name'),
                    "last_name" => $request->get('last_name'),
                    "email" => $request->get('email'),
                    "phone" => $request->get('phone'),
                    "addresses" => array
                    (
                        array
                        (
                            "address1" => $request->get('address1'),
                            "city" => $request->get('city'),
                            "province" => $request->get('province'),
                            "zip" => $request->get('zip'),
                            "country" => $request->get('country'),
                            "last_name" => $request->get('address_first_name'),
                            "first_name" => $request->get('address_last_name')
                        )
                    ));

        $response = $shopify->Customer($request->get('id'))->put($arrCustomer);        
        
        //var_dump($response);
        header_remove();

        return redirect()->route('customerview', [$request->get('id')])
                            ->with('status','Customer updated successfully.');  
    }

    public function delete(Request $request)
    {
        $customerId = $request->route('id');

        PHPShopify\ShopifySDK::config($this->config);
        PHPShopify\AuthHelper::createAuthRequest($this->scopes, $this->redirectUrl, null, null, true);

        $shopify = new PHPShopify\ShopifySDK($this->config);
        $customer = $shopify->Customer($customerId)->delete();
        
        header_remove();

        return redirect()->route('customers')
                            ->with('status','Customer has been removed.');  
    }

}
