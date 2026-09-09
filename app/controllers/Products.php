<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Products extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->model('ProductModel');
        $this->call->library('session');
        $this->call->helper('url');
    }

    public function index()
    {
        $products = $this->ProductModel->order_by('created_at', 'DESC');
        $this->call->view('products/index', ['products' => $products]);
    }

    public function create()
    {
        $error = null;
        if ($this->request->is_post()) {
            $data = $this->product_data();
            if ($data['product_name'] === '' || !is_numeric($data['price']) || !is_numeric($data['quantity'])) {
                $error = 'Product name, price, and quantity are required.';
            } else {
                $this->ProductModel->insert($data);
                return $this->response->redirect(site_url('products'));
            }
        }
        $this->call->view('products/form', ['product' => null, 'error' => $error, 'heading' => 'Add product']);
    }

    public function edit($id)
    {
        $product = $this->ProductModel->find((int) $id);
        if (!$product) {
            return $this->response->redirect(site_url('products'));
        }

        $error = null;
        if ($this->request->is_post()) {
            $data = $this->product_data();
            if ($data['product_name'] === '' || !is_numeric($data['price']) || !is_numeric($data['quantity'])) {
                $error = 'Product name, price, and quantity are required.';
            } else {
                $this->ProductModel->update((int) $id, $data);
                return $this->response->redirect(site_url('products'));
            }
        }
        $this->call->view('products/form', ['product' => $product, 'error' => $error, 'heading' => 'Edit product']);
    }

    public function delete($id)
    {
        $this->ProductModel->delete((int) $id);
        return $this->response->redirect(site_url('products'));
    }

    private function product_data()
    {
        return [
            'product_name' => trim((string) $this->request->post('product_name')),
            'description' => trim((string) $this->request->post('description')),
            'price' => (float) $this->request->post('price'),
            'quantity' => (int) $this->request->post('quantity'),
        ];
    }
}