<?php

namespace MyApp\Controllers;

use Phalcon\Mvc\Controller;
use MyApp\Component\Product;

class ProductController extends Controller
{
    public function indexAction()
    {
        //redirect to view
    }

    public function productaddAction()
    {
        $data = [
            'name' => $this->request->get('name'),
            'id' => $this->request->get('id'),
            'qty' => $this->request->get('qty'),
            'price' => $this->request->get('price'),
            'desc' => $this->request->get('desc'),
        ];
        $product = new Product();
        $res = $product->add($data);
        if ($res) {
            echo "Product Added Succesfullly....";
            echo "<br><a href='../product' class='btn btn-outline-warning'>Back</a>";
        } else {
            echo "Something Went Wrong....";
            echo "<br><a href='../product' class='btn btn-outline-warning'>Back</a>";
        }
    }

    public function productviewAction()
    {
        $product = new Product();
        $res = $product->view();
        $this->view->data = $res;
    }
    public function deleteAction()
    {
        $product = new Product();
        $product->delete($this->request->get('id'));
        $this->response->redirect('../product/productview');
    }

    public function updateAction()
    {
        $product = new Product();
        $res = $product->searchById($this->request->get('id'));
        $this->view->data = $res;
    }

    public function productupdateAction()
    {
        $data = [
            'name' => $this->request->get('name'),
            'id' => $this->request->get('id'),
            'qty' => $this->request->get('qty'),
            'price' => $this->request->get('price'),
            'desc' => $this->request->get('desc'),
        ];
        $product = new Product();
        $product->update($data);
        $this->response->redirect('../product/productview');
    }
}
