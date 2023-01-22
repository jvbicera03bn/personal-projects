<?php
defined('BASEPATH') or exit('No direct script access allowed');

class act_controllers extends CI_Controller
{
    /* Shopping Spree */
    public function view_shop()
    {
        $this->load->model('shoppingspree');
        $items = $this->shoppingspree->get_items();
        $cart_items_count = $this->shoppingspree->get_cart_quantity();
        $view_data['vdata'] = array('items' => $items, 'count' => $cart_items_count[0]['cart_quantity']);
        $this->load->view('Shopping Spree/mystore', $view_data);
    }
    public function buy_item()
    {
        $this->output->enable_profiler(TRUE);
        $buy_id = $this->input->post('item_id');
        $buy_quantity = intval($this->input->post('count'));
        $this->load->model('shoppingspree');
        $cart_items = $this->shoppingspree->get_cart_items();
        $oncart = NULL;
        foreach ($cart_items as $cart_item) {
            if ($cart_item['item_id'] == $buy_id) {
                $oncart = TRUE;
                $buy_quantity = intval($cart_item['quantity']) + $buy_quantity;
                $this->shoppingspree->item_add_quantity($buy_id, $buy_quantity);
            }
        }
        if (empty($oncart)) {
            $this->shoppingspree->buy_item($buy_id, $buy_quantity);
        }
        redirect('shop');
    }
    public function view_cart()
    {
        $this->load->model('shoppingspree');
        $cart_items = $this->shoppingspree->get_cart_items();
        $view_data['vdata'] = array('cart_items' => $cart_items);
        $this->load->view('Shopping Spree/cart', $view_data);
    }
    public function del_item_oncart()
    {
        $this->load->model('shoppingspree');
        $del_id = $this->input->post('id');
        $this->shoppingspree->remove_item_oncart($del_id);
        redirect('mycart');
    }
    /* Stripe API */
    public function __construct() {
       parent::__construct();
       $this->load->library("session");
       $this->load->helper('url');
    }
    
    public function index()
    {
        $this->load->view('checkout');
    }
    
    public function handlePayment()
    {
        require_once('application/libraries/stripe-php/init.php');
    
        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
     
        \Stripe\Charge::create ([
                "amount" => 100 * 120,
                "currency" => "inr",
                "source" => $this->input->post('stripeToken'),
                "description" => "Dummy stripe payment." 
        ]);
            
        $this->session->set_flashdata('success', 'Payment has been successful.');
             
        redirect('/make-stripe-payment','refresh');
    }
    /* Exam Products */
    /* public function view_product()
    {
        $this->view->load('products/view_products');
    }
    public function get_records()
    {
        $this->load->model('products');
        $this->model->get_records();
    }
    public function get_category()
    {
        $this->load->model('products');
        $this->view->load('products/view_products');
    }
    public function http_records()
    {
        $this->load->model('products');

    }
    public function http_searched_records()
    {
        $this->load->model('products');

    } */
    public function products()
    {
        $this->load->view('products/view_products');
    }
    public function view_product()
    {
        $this->load->model('products');
        $records = $this->products->getProduct();
        $view_data['vdata'] = array('records' => $records, 'row_count' => count($records));
        $this->load->view('products/partial_all', $view_data);
    }
    public function search_products_name($keyword)
    {
        $this->load->model('products');
        $records = $this->products->searchItem_byname($keyword);
        $view_data['vdata'] = array('records' => $records, 'row_count' => count($records));
        $this->load->view('products/partial_all', $view_data);
    }
    public function search_products_category($category)
    {
        $category = str_replace("%20", " ", $category);
        $this->load->model('products');
        $records = $this->products->searchItem_bycategory($category);
        $view_data['vdata'] = array('records' => $records, 'row_count' => count($records));
        $this->load->view('products/partial_all', $view_data);
    }
    /* public function view_search_products()
    {
        $this->load->model('products');
        $categories = $this->products->getCategories();
        $records = $this->session->userdata('products');
        $view_data['vdata'] = array('records' => $records, 'row_count' => count($records), 'categories' => $categories);
        $this->load->view('products/view_products', $view_data);
    } */

    /* public function view_product_spec1()
    {
        $curcount = $this->session->userdata('count');
        $curcount = $curcount + 5;
        $this->session->set_userdata('count', $curcount);
        $count = $this -> session->userdata('count');
        redirect("products/". $count);
    }
    public function view_product_spec($i)
    {
        $this->session->set_userdata('showing', true);
        $showing = $this->session->userdata('showing');
        $this->load->model('products');
        $records = $this->products->getProduct();
        $view_data['vdata'] = array('records' => $records, 'row_count' => $i, 'showing' => $showing);
        $this->load->view('products/view_products', $view_data);
    } */
    /* Sql Attack */
    function open_sql_attack()
    {
        $this->load->view('sqlattack/sqlinjection');
    }
    function attack_sql()
    {
        $post = $_POST['email'];
        $this->db->query("SELECT * FROM sql_attack WHERE email = '{$post}'");
        redirect('sql-injection');
    }
    /* Client Billing */
    function view_client_billing()
    {
        $this->load->model('clientBilling');
        $default_records = $this->clientBilling->get_def_records();
        $view_data['vdata'] = array('records' => $default_records);
        $this->load->view('Client Billing/clientbillings',$view_data);
    }
}
