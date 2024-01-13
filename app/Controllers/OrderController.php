<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\DP_Orders_item;



class OrderController extends BaseController
{

    //Fungsi Crud Data Pelanggan//
    public function index()
    {
        $pelangganModel = new DP_Orders_item();
        $data = $pelangganModel->getOrderedData();

        $summary = [];

        foreach ($data as $order) {
            $key = $order['id_pelanggan'] . '-' . $order['item_name'];
            if (!isset($summary[$key])) {

                $summary[$key] = [
                    'id' => $order['id'],
                    'id_pelanggan' => $order['id_pelanggan'],
                    'nama_pelanggan' => $order['nama_pelanggan'],
                    'created_at' => $order['created_at'],
                    'item_name' => $order['item_name'],
                    'jenis_item' => $order['jenis_item'],
                    'size' => $order['size'],
                    'no_tlpn' => $order['jenis_item'],

                    'jumlah' => 0,
                    'harga_satuan' => $order['price'],
                    'total_harga' => 0
                ];
            }

            $summary[$key]['jumlah'] += $order['quantity'];
            $summary[$key]['total_harga'] += $order['quantity'] * $order['price'];
        }

        foreach ($data as $key => $row) {
            $data[$key]['created_at'] = date('d-m-Y', strtotime($row['created_at']));
        }
        // Kirim data dan totalHarga ke view
        return view('laporan/index', ['posts' => $data, 'posts' => $summary]);
    }


    public function store()
    {
        $randomId = uniqid('TAP-');
        $data = [
            'id_pelanggan' => $randomId,
            'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
            'jenis_item' => $this->request->getPost('jenis_item'),
            'item_name' => $this->request->getPost('item_name'),
            'size' => $this->request->getPost('size'),
            'quantity' => $this->request->getPost('quantity'),
            'no_tlpn' => $this->request->getPost('no_tlpn'),
            'price' => $this->request->getPost('price'),
        ];

        $pelangganModel = new DP_Orders_item();
        $pelangganModel->save($data);

        return redirect()->to('laporan')->with('success', 'Data pelanggan berhasil disimpan.');
    }


    public function create()
    {
        return view('data_pelanggan/note');
    }

    public function delete($id)
    {
        $pelangganModel = new DP_Orders_item();

        $data = $pelangganModel->find($id);
        if (!$data) {
            return redirect()->to('/pelanggan')->with('error', 'Data Pelanggan tidak ditemukan.');
        }

        $pelangganModel->delete($id);
        return redirect()->to('laporan')->with('success', 'Data Pelanggan berhasil dihapus.');
    }



    public function printTransaction($id)
    {
        $model = new DP_Orders_item();
        $order = $model->where('id', $id)->first();

        if (!$order) {
            return redirect()->back()->with('error', 'Data Pelanggan tidak ditemukan.');
        }

        $totalHarga = $order['quantity'] * $order['price'];

        return view('data_pelanggan/printPerID', ['order' => $order, 'totalHarga' => $totalHarga]);
    }

    public function printAll()
    {
        $pelangganModel = new DP_Orders_item();
        $orders = $pelangganModel->findAll();

        $itemSummary = [];

        foreach ($orders as $order) {
            $itemName = $order['item_name'];

            if (!isset($itemSummary[$itemName])) {
                $itemSummary[$itemName] = [
                    'jumlah' => 0,
                    'harga_total' => 0
                ];
            }

            $itemSummary[$itemName]['jumlah'] += $order['quantity'];
            $itemSummary[$itemName]['harga_total'] += $order['quantity'] * $order['price'];
        }


        // Kirim data dan totalHarga ke view
        return  view('data_pelanggan/print_all', ['itemSummary' => $itemSummary]);
    }

    //View Menu data
    public function data()
    {

        return view('data_pelanggan/data');
    }
}
