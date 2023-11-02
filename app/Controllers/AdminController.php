<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class AdminController extends BaseController
{
    private $furnitures;

    function __construct()
    {
        $this->furnitures = new AdminModel();
    }

    public function index()
    {
        $data = [
            'activePage' => 'Dashboard',
            'products' => $this->furnitures->findAll()
        ]; 
        return view('Admin/index', $data);
    }

    public function viewProducts()
    {
        $data = [
            'activePage' => 'Products',
            'products' => $this->furnitures->findAll()
        ]; 
        return view('Admin/index', $data);
        
    }

    public function addProduct(){
        $file = $this->request->getFile('image');
        
        $newFileName = $file->getRandomName();

        $data = [
            'furnitureName' => $this->request->getVar('furnitureName'),
            'furnitureDescription' => $this->request->getVar('furnitureDescription'),
            'furniturePrice' => $this->request->getVar('furniturePrice'),
            'stockQuantity' => $this->request->getVar('stockQuantity'),
            'image' => $newFileName
        ];

        $rules = [
            'image' => [
                'uploaded[image]',
                'max_size[image,10240]', // Maximum file size in kilobytes (adjust as needed)
                'ext_in[image,png,jpg,gif]' // Allow only files with the .mp3 extension
            ]
        ];
        
        if($this->validate($rules)){
            if($file->isValid() && !$file->hasMoved()){
                if($file->move(FCPATH.'uploads/', $newFileName)){
                    $this->furnitures->save($data);
                }else{
                    echo $file->getErrorString().' '.$file->getError();
                }
            }
        }else{
            $data['validation'] = $this->validator;
        }

        return redirect()->to('/products');
    }

    public function deleteProd($id = null){
        $this->furnitures->delete($id);
        return redirect()->to('/products');
    }

    public function editProd($id = null){
        $data = [
            'activePage' => 'Products',
            'selectedProduct' => $this->furnitures->where('furnitureID', $id)->first()
        ];
        return view('Admin/editProd',$data);
    }

    public function updateProd(){

        $data = [
            'furnitureID' => $this->request->getVar('furnitureID'),
            'furnitureName' => $this->request->getVar('furnitureName'),
            'furnitureDescription' => $this->request->getVar('furnitureDescription'),
            'furniturePrice' => $this->request->getVar('furniturePrice'),
            'stockQuantity' => $this->request->getVar('stockQuantity')
        ];
        var_dump($data);
        $this->furnitures->set($data)->where('furnitureID',$data['furnitureID'])->update();
        return redirect()->to('/products');
    }
}
