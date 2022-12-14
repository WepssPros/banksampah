<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PengajuanSosialisasiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             'users_id' => 'required|integer',
            'nama_organisasi' => 'required|max:255',
            'alamat' => 'required|max:255',
             'jumlahwarga' => 'required|max:255',
             'alasan' => 'required',
             'tgl_pelaksana' => 'required',
            'no_hp' => 'required|max:255',
            'status' => 'in:Diproses,Ditolak,Disetujui',

        ];
    }
}
