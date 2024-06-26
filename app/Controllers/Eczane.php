<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EczaneModel;
use CodeIgniter\Database\Query;

$session = \Config\Services::session();
class Eczane extends BaseController
{
    public $admin = "8fqJY6B2lmkhzbg55W66VZ3iaOAY4cchsTMMFMWAi2XMOJ2HVoHvDk4MrBUkGhHP4PpUkHaKEq87SWRpOZi5k2cIdX0w9Tou9hwzUrIdtq701EO399LbGSYJUspPsyOq0U5lXvkYP8GBpUZC1M8c0ICaCGxQwYZkgm7LrSg04tMpt7Ck3KjwQsKoAwrsoKDvAwXjiWzIvaP3P0rlUHfBDQHhMjPKfAAmsVgZEjdVlVSdUV4xJQWktLwJtFR9mIQ";
    public function index()
    {
        return view("homePage");
    }
    public function WhoIsAdmin()
    {
        return $this->admin;
    }
    public function Home()
    {
        $db = db_connect();
        $model = new EczaneModel($db); 
        $data['categorys'] = $model->getCategories();
        $data['medicines'] = $model->getMedicines();
        $data['patient'] = $model->getPatients();
        return view("homePage", $data);
    }
    public function Giris()
    {
        try {
            $session = session();
            $session->destroy();
        } catch (\Throwable $th) {
        }
        return view("login");
    }
    public function PersonelGiris()
    {
        try {
            $session = session();
            $session->destroy();
        } catch (\Throwable $th) {
        }
        return view("personelLogin");
    }
    public function Ilaclar()
    {
        $db = db_connect();
        $model = new EczaneModel($db);
        $data['medicines'] = $model->getMedicines();
        $data['categories'] = $model->getCategories();
        return view("medicines", $data);
    }
    public function Hastalar()
    {
        $db = db_connect();
        $model = new EczaneModel($db);
        $data['patients'] = $model->getPatients();
        return view("patient", $data);
    }
    public function Receteler()
    {
        $db = db_connect();
        $model = new EczaneModel($db);
        $data['prescs'] = $model->getPres();
        $data['medicines'] = $model->getMedicines();
        $patients = $model->getPatients();

        // Anahtar-değer çiftleri olarak patients dizisini oluştur
        $data['patients'] = [];
        foreach ($patients as $patient) {
            $data['patients'][$patient->patient_id] = [
                'p_name' => $patient->p_name,
                'p_surname' => $patient->p_surname
            ];
        }

        return view("prescriptions", $data);
    }

    public function Stok()
    {
        $db = db_connect();
        $model = new EczaneModel($db);
        $data['stock'] = $model->getStock();
        $data['medicines'] = $model->getMedicines();
        $data['categories'] = $model->getCategories();
        return view("stock", $data);
    }
    public function Personel()
    {
        $db = db_connect();
        $model = new EczaneModel($db);
        $data['employees'] = $model->getEmployees();
        return view('employee', $data);
    }
    public function Faturalar()
    {
        $db = db_connect();
        $model = new EczaneModel($db);
        $data['prescs'] = $model->getPres();
        $data['medicines'] = $model->getMedicines();
        $data['bills'] = $model->GetBill();
        return view("invoice", $data);
    }
    public function Sepet()
    {
        $db = db_connect();
        $model = new EczaneModel($db);
        $data['medicines'] = $model->getMedicines();
        try {
            $session = session();
        } catch (\Throwable $th) {
        }
        try {
            $items = $session->get('items');
            $pres_id = $session->get('pres_id_for_cart');
            $pat_id = explode('-', $items)[count(explode('-', $items)) - 1];
            $pat_id = str_replace('=id', "", $pat_id);
            $items = str_replace($pat_id . "=id", "", $items);
            $pairs = explode("-", rtrim($items, "-"));
            $result = [];
            foreach ($pairs as $pair) {
                list($ilacID, $ilacSayisi) = explode("=", $pair);
                $result[$ilacID] = $ilacSayisi;
            }
            $data['items'] = $result;
            $data['pres_id'] = $pres_id;
            $data['pat'] = $pat_id . "-" . $model->getPatientByID($pat_id);
        } catch (\Throwable $th) {
            $data['items'] = "-1";
            $data['pres_id'] = "-1";
            $data['pat_id'] = "-1";
        }

        return view("myCart", $data);
    }
    public function Logout()
    {
        try {
            $session = session();
            $session->destroy();
            return redirect()->to("Giris");
        } catch (\Throwable $th) {
        }
    }

    // GİRİŞ İŞLEMLERİ+
    public function Login()
    {
        try {
            $session = session();
        } catch (\Throwable $th) {
        }
        $db = db_connect();
        $model = new EczaneModel($db);
        $query = $model->login($_POST["user"], md5($_POST["pass"]));

        if ($query !== null && $query->user_id == $this->admin) {
            $sessionData = ['user_id' => $this->admin];
            $session->set($sessionData);
            return redirect()->to("Home");
        } else {
            return redirect()->to("Giris");
        }
    }
    public function PersonelLogin()
    {
        try {
            $session = session();
        } catch (\Throwable $th) {
        }
        $db = db_connect();
        $model = new EczaneModel($db);
        $query = $model->login($_POST["user"], md5($_POST["pass"]));

        if ($query !== null) {
            $sessionData = ['user_id' => $query->user_id];
            $session->set($sessionData);
            return redirect()->to("Home");
        } else {
            return redirect()->to("Giris");
        }
    }

    // ADMİN PANELİ HASTA EKLEME+
    public function PatientAdd()
    {
        $db = db_connect();
        $model = new EczaneModel($db);
        $name = $_POST['Ad'];
        $surname = $_POST['Soyad'];
        $gender = $_POST['Cinsiyet'];
        $dob = $_POST['DogumTarihi'];
        $address = $_POST['Adres'];
        $tckno = $_POST['TC'];
        if ($model->addPatient($name, $surname, $gender, $dob, $address, $tckno))
            echo json_encode(200);
        else
            echo json_encode(400);
    }
    // ADMİN PANELİ ÇALIŞAN EKLEME+
    public function EmployeeAdd()
    {
        $db = db_connect();
        $model = new EczaneModel($db);
        $name = $_POST['Ad'];
        $surname = $_POST['Soyad'];
        $gender = $_POST['Cinsiyet'];
        $user_id = $_POST['user_id'];
        if ($model->addEmployee($user_id,$name, $surname, $gender))
            echo json_encode(200);
        else
            echo json_encode(400);
    }
    // ADMİN PANELİ KATEGORİ EKLEME+
    public function CategoryAdd()
    {
        $db = db_connect();
        $model = new EczaneModel($db);
        $category = $_POST['Kategori'];
        if ($model->addCategory($category))
            echo json_encode(200);
        else
            echo json_encode(400);
    }

    // ADMİN PANELİ İLAÇ EKLEME+
    public function MedicineAdd()
    {
        $db = db_connect();
        $model = new EczaneModel($db);
        $name = $_POST['IlaçAdı'];
        $price = $_POST['Fiyatı'];
        $company = $_POST['Firması'];
        $pres_color = $_POST['receteRengi'];
        $cat_id = $_POST['kategori'];
        if ($model->addMedicines($name, $price, $company, $pres_color, $cat_id))
            echo json_encode(200);
        else
            echo json_encode(400);
    }
    // ADMİN PANELİ REÇETE EKLEME
    public function PresAdd()
    {
        $db = db_connect();
        $model = new EczaneModel($db);
        $tarih = $_POST['verilmetarih'];
        $sure = $_POST['kullanımsüre'];
        $receteRengi = $_POST['receteRengi'];
        $ilaclar = $_POST['ilaclar'];
        $hasta_id = $_POST['pat_id'];
        $id = $model->getLastPresID();
        $id++;
        $veri_dizisi = json_decode($ilaclar, true);
        foreach ($veri_dizisi as $veri) {
            $ilacID = $veri['id'];
            $adet = $veri['adet'];
            $model->addPress($id, $tarih, $sure, $receteRengi, $adet, $ilacID, $hasta_id);
        }
        echo json_encode(200);
    }
    // ADMİN PANELİ İLAÇ EDİT+
    public function MedicineEdit()
    {
        $db = db_connect();
        $model = new EczaneModel($db);
        $data = array(
            'name' => $_POST['IlaçAdı'],
            'price' => $_POST['Fiyatı'],
            'company' => $_POST['Firması'],
            'pres_color' => $_POST['receteRengi'],
            'category_id' => $_POST['kategori']
        );

        if ($model->editMedicines($data, $_POST['med_id']))
            echo json_encode(200);
        else
            echo json_encode(400);
    }
    // ADMİN PANELİ İLAÇ SİL+
    public function MedicineDel()
    {
        $db = db_connect();
        $model = new EczaneModel($db);
        if ($model->delMedicines($_POST['id']))
            echo json_encode(200);
        else
            echo json_encode(400);
    }
    public function PresDel()
    {
        $db = db_connect();
        $model = new EczaneModel($db);
        if ($model->delPres($_POST['id']))
            echo json_encode(200);
        else
            echo json_encode(400);
    }
    public function AddCart()
    {
        try {
            $session = session();
        } catch (\Throwable $th) {
        }
        try {
            $items = $_POST['items'];
            $pres_id = $_POST['pres_id'];
            $sessionData = ['items' => $items, 'pres_id_for_cart' => $pres_id];
            $session->set($sessionData);
            echo json_encode(200);
        } catch (\Throwable $th) {
            echo json_encode(400);
        }
    }
    public function SaveCart()
    {
        $db = db_connect();
        $model = new EczaneModel($db);
        $pat_id = $_POST['pat_id'];
        $pres_id = $_POST['pres_id'];
        $total_price = $_POST['total_price'];
        if ($model->SaveCart($pat_id, $pres_id, $total_price)) {
            echo json_encode(200);
            try {
                $session = session();
            } catch (\Throwable $th) {
            }
            $items = "-1";
            $pres_id = "-1";
            $sessionData = ['items' => $items, 'pres_id_for_cart' => $pres_id];
            $session->set($sessionData);
        } else {
            echo json_encode(400);
        }
    }
    // ADMİN PANELİ STOK EKLEME+
    public function StockAdd()
    {
        $db = db_connect();
        $model = new EczaneModel($db);
        $piece = $_POST['Stok'];
        $med_id = $_POST['ilac'];
        $cat_id = $model->getCategoryByMedicineId($med_id);
        if ($model->addStock($med_id, $piece, $cat_id)) {
            echo json_encode(200);
        } else {
            echo json_encode(400);
        }
    }
    // ADMİN PANELİ PERSONEL SİL+
    public function EmployeeDel()
    {
        $db = db_connect();
        $model = new EczaneModel($db);
        if ($model->delEmployees($_POST['id']))
            echo json_encode(200);
        else
            echo json_encode(400);
    }
    // ADMİN PANELİ PERSONEL EDİT+
    public function EmployeeEdit()
    {
        $db = db_connect();
        $model = new EczaneModel($db);
        $data = array(
            'name' => $_POST['adi'],
            'surname' => $_POST['soyadi'],
            'gender' => $_POST['cinsiyeti'],
        );

        if ($model->editEmployees($data, $_POST['emp_id']))
            echo json_encode(200);
        else
            echo json_encode(400);
    }
    // ADMİN PANELİ STOK EDİT+
    public function StockEdit()
    {
        $db = db_connect();
        $model = new EczaneModel($db);
        $data = array(
            'stock_id' => $_POST['stock_id'],
            'piece' => $_POST['piece'],
        );
        if ($model->editStock($data, $_POST['stock_id']))
            echo json_encode(200);
        else
            echo json_encode(400);
    }
    // ADMİN PANELİ STOK SİL+
    public function StockDel()
    {
        $db = db_connect();
        $model = new EczaneModel($db);
        if ($model->delStock($_POST['id']))
            echo json_encode(200);
        else
            echo json_encode(400);
    }
    //ADMİN PANELİ HASTA EDİT+
    public function PatientEdit()
    {
        $db = db_connect();
        $model = new EczaneModel($db);
        $data = array(
            "patient_id" => $_POST['pat_id'],
            "p_name" => $_POST['name'],
            "p_surname" => $_POST['surname'],
            "gender" => $_POST['gender'],
            "dob" => $_POST['dob'],
            "address" => $_POST['address'],
            "tckno" => $_POST['tckno'],
        );
        if ($model->editPatients($data, $_POST['pat_id']))
            echo json_encode(200);
        else
            echo json_encode(400);
    }
    //ADMİN PANELİ HASTA SİL+
    public function PatientDel()
    {
        $db = db_connect();
        $model = new EczaneModel($db);
        if ($model->delPatient($_POST['patient_id']))
            echo json_encode(200);
        else
            echo json_encode(400);
    }
}



