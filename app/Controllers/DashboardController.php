<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NasabahModel;
use Config\Database;

use function PHPUnit\Framework\isEmpty;

class DashboardController extends BaseController
{
    protected $nasabahModel;

    public function __construct()
    {   
        $this->nasabahModel = new NasabahModel();
    }
    public function dashboardView()
    {
        $nasabahModel = new NasabahModel();
        $data['nasabah'] = $nasabahModel->where('nasabah_id', session()->get('nasabah_id'))->findAll();
        return view('/dashboard/view_dashboard', $data);
    }

    public function transferView()
    {
        $nasabahModel = new NasabahModel();
        $nasabah = $nasabahModel->find(session()->get('nasabah_id'));
        
        $nomorRekening = $nasabahModel->getDataRekening();

        $data = [
            'nasabah' => $nasabah,
            'nomorRekening' => $nomorRekening
        ];

        return view('/dashboard/view_transfer', $data);
    }

    public function transferSend($id){

        $nasabahModel = new NasabahModel();
        $nasabah = $nasabahModel->find($id);

        $nasabahId = $nasabah['nasabah_id'];
        $currentSaldo = $nasabah['saldo'];

        $nasabahTujuanId = $this->request->getVar('nasabahTujuan');
        $saldo = $this->request->getVar('amount');

        if ($saldo <= 10000) {
            return redirect()->back()->with('error', 'Minimum transfer adalah Rp. 10.000');
        } else if ($saldo > $currentSaldo) {
            return redirect()->back()->with('error', 'Saldo tidak mencukupi');
        }

        $nasabahModel = new NasabahModel();
        $nasabahTertuju = $nasabahModel->find($nasabahTujuanId);
        
        $db = Database::connect();
        $db->transBegin();

        if (empty($nasabahTertuju['nasabah_id'])){
            return redirect()->back()->with('error', 'Transaksi gagal, nasabah tertuju tidak ditemukan.');
        }

        if ($nasabahTertuju['nasabah_id'] == $nasabahId){
            return redirect()->back()->with('error', 'Tidak bisa transfer ke rekening sendiri.');
        }

        $dataTambah = ['saldo' => $nasabahTertuju['saldo'] + $saldo];
        $nasabahModel->update($nasabahTertuju['nasabah_id'], $dataTambah);

        $dataKurang = ['saldo' => $nasabah['saldo'] - $saldo];
        $nasabahModel->update($nasabahId, $dataKurang);

        // Transaksi berhasil, commit
        $db->transCommit();
        return redirect()->to(base_url('/transfer'))->with('success', 'Transfer berhasil.');
    }

    public function profileView()
    {
        $nasabahModel = new NasabahModel();
        $nasabah = $nasabahModel->find(session()->get('nasabah_id'));

        $data = ['nasabah' => $nasabah];

        return view('/dashboard/view_profile', $data);
    }

    public function profileUpdate($id)
    {
        $nasabahModel = new NasabahModel();
        $nasabah = $nasabahModel->find($id);

        $data = [
            'jenis_kelamin'     => $this->request->getPost('jenisKelamin'),
            'tempat_tgl_lahir'  => $this->request->getVar('tempatTglLahir'),
            'agama'             => $this->request->getVar('agama'),
            'alamat_lengkap'    => $this->request->getVar('alamatLengkap'),
            'nomor_telepon'     => $this->request->getVar('nomorTelp'),
        ];
        
        $nasabahModel->update($nasabah, $data);
        return redirect()->to(base_url('/profile'))->with('success', 'Profile berhasil diupdate.');
    }
}
