<?php
namespace App\Http\Controllers\Surat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Surat;

class SuratController extends Controller
{
     public function index()
    {
				$surat= Surat::get();
        return view('surat.index', compact('surat'));
		}
		public function edit()
    {

        return view('surat.surat_masuk');
    }
    public function store()
    {
    	request()->validate([
					'jenis_surat'=>'required',
					'tgl_terima'=>'required',
					'no_agenda'=>'required',
					'tujuan'=>'required',
					'no_surat'=>'required',
					'tgl_surat'=>'required',
					'asal_surat'=>'required',
					'perihal'=>'required',
					'deskripsi'=>'required',
    	]);

    	$surat=Surat::create([
				'user_id' =>auth()->user()->id,
    		'jenis_surat' => request('jenis_surat'),
    		'tgl_terima' => request('tgl_terima'),
				'no_agenda'=> request('no_agenda'),
				'no_surat'=>request('no_surat'),
    		'tujuan' => request('tujuan'),
    		'tgl_surat' => request('tgl_surat'),
    		'asal_surat' => request('asal_surat'),
    		'perihal' => request('perihal'),
    		'deskripsi' => request('deskripsi')

			]);
			return back()->with('success','berhasil..!');

}
}
