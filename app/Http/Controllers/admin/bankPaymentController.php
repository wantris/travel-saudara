<?php

namespace App\Http\Controllers\admin;

use App\BankPayment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class bankPaymentController extends Controller
{
    public function index()
    {
        $banks = BankPayment::all();
        return view('admin.bank.index', compact('banks'));
    }

    public function create()
    {
        return view('admin.bank.create');
    }

    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'bank_name' => 'required',
            'behalf_of' => 'required',
            'account_number' => 'required',
        ]);

        try {
            if ($request->file('photo')) {
                $resorcePhoto = $request->file('photo');
                $namePhoto  = "bank_" . rand(00000, 99999) . "." . $resorcePhoto->getClientOriginalExtension();
                $resorcePhoto->move(\base_path() . "/public/assets/bank-logo/", $namePhoto);
            }

            $bank = new BankPayment();
            $bank->bank_name = $request->bank_name;
            $bank->behalf_of = $request->behalf_of;
            $bank->account_number = $request->account_number;
            $bank->photo = $namePhoto;
            if ($request->status) {
                $bank->status = 1;
            }
            $bank->save();

            return redirect()->route('admin.bankPayment.index')->with('success', 'Tambah data akun bank berhasil');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', 'Tambah data akun bank berhasil');
        }
    }

    public function edit($id)
    {
        $bank = BankPayment::find($id);
        if ($bank) {
            return view('admin.bank.edit', compact('bank'));
        }

        return redirect()->route('admin.bankPayment.index')->with('failed', 'Data akun bank tidak tersedia');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'bank_name' => 'required',
            'behalf_of' => 'required',
            'account_number' => 'required',
        ]);

        try {
            $namePhoto = $request->oldPhoto;

            if ($request->file('photo')) {
                $resorcePhoto = $request->file('photo');
                $namePhoto  = "bank_" . rand(00000, 99999) . "." . $resorcePhoto->getClientOriginalExtension();
                $resorcePhoto->move(\base_path() . "/public/assets/bank-logo/", $namePhoto);
            }

            $bank = BankPayment::find($request->id);
            if ($bank) {
                $bank->bank_name = $request->bank_name;
                $bank->behalf_of = $request->behalf_of;
                $bank->account_number = $request->account_number;
                $bank->photo = $namePhoto;
                if ($request->status) {
                    $bank->status = 1;
                } else {
                    $bank->status = 0;
                }
                $bank->save();

                return redirect()->route('admin.bankPayment.index')->with('success', 'Tambah data akun bank berhasil');
            }
            return redirect()->route('admin.bankPayment.index')->with('failed', 'Data akun bank tidak tersedia');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', 'Tambah data akun bank berhasil');
        }
    }

    public function delete(Request $request)
    {

        try {

            BankPayment::where('id', $request->id)->delete();

            return response()->json([
                "status" => 1,
                "message" => 'Data akun bank berhasil dihapus',
            ]);
        } catch (\Throwable $err) {
            return response()->json([
                "status" => 0,
                "message" => 'Data akun bank gagal dihapus',
            ]);
        }
    }
}
