<?php

namespace App\Http\Controllers\Surat;

use App\Helpers\LogActivity;
use App\Http\Controllers\Controller;
use App\Models\SuratKeluar;
use App\Models\SuratKeluarStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PDF;

class SuratKeluarController extends Controller
{
    //

    public function index()
    {
				$surat= SuratKeluar::get();
        return view('surat.index_keluar', compact('surat'));
		}
		public function create()
    {

        return view('surat.surat_keluar');
    }
    public function store()
    {
        LogActivity::addToLog('create surat keluar');
    	request()->validate([
            'no_agenda'=> 'required',
            'no_surat'=>'required',
            'tanggal_surat' => 'required',
            'hal_surat' => 'required',
            'sifat_surat' => 'required',
            'jenis_surat' => 'required',
            'tujuan_surat' => 'required',
            'lampiran_surat' => 'required',
            'file_surat' => 'required',
            'penandatangan_surat' =>'required',
            'keterangan' => 'required',
            'ajuan_surat' => 'required',
        ]);
      //  $id= rand(5, 15);


                $surat = new SuratKeluar();
                $surat->user_id = auth()->user()->id;
                $surat-> no_agenda= request('no_agenda');
                $surat->  no_surat=request('no_surat');
                $surat-> tanggal_surat = request('tanggal_surat');
                $surat-> hal_surat = request('hal_surat');
                $surat-> sifat_surat= request('sifat_surat');
                $surat-> jenis_surat = request('jenis_surat');
                $surat->tujuan_surat = request('tujuan_surat');
                $surat->lampiran_surat = request('lampiran_surat');
                $surat->file_surat = request('hal_surat');
                $surat->penandatangan_surat = request('penandatangan_surat');
                $surat->keterangan = request('keterangan');
                $surat->ajuan_surat = request('ajuan_surat');
                $surat->save();
                $suratKeluarStatus = new SuratKeluarStatus();
            $surat->suratKeluarStatus()->save($suratKeluarStatus);
			return back()->with('success','berhasil..!');


}
    public function detail(SuratKeluar $suratKeluar){
       $suratKeluar= SuratKeluar::where('id',$suratKeluar->id)->get();
      // dd($suratKeluar);
        return view('surat.surat_keluar_detail', compact('suratKeluar'));
    }

    public function update(SuratKeluar $suratKeluar){

 //       dd($suratKeluar->id);
        $surat =  SuratKeluar::find($suratKeluar->id);
                $surat->no_agenda= request('no_agenda');
                $surat->no_surat=request('no_surat');
                $surat->tanggal_surat = request('tanggal_surat');
                $surat->hal_surat = request('hal_surat');
                $surat->sifat_surat= request('sifat_surat');
                $surat->jenis_surat = request('jenis_surat');
                $surat->tujuan_surat = request('tujuan_surat');
                $surat->lampiran_surat = request('lampiran_surat');
                $surat->file_surat = request('hal_surat');
                $surat->penandatangan_surat = request('penandatangan_surat');
                $surat->keterangan = request('keterangan');
                $surat->ajuan_surat = request('ajuan_surat');
                $surat->save();

                $surat->suratKeluarStatus->by_atasan = request('by_atasan');

            $surat->suratKeluarStatus->save();
			return back()->with('success','berhasil..!');
    }

    public function pdf(SuratKeluar $suratKeluar){
        $suratKeluar= SuratKeluar::where('id',$suratKeluar->id)->get();
        view()->share('suratKeluar',$suratKeluar);
        $pdf = PDF::loadView('surat.surat_keluar_pdf', $suratKeluar);

        // download PDF file with download method
        return $pdf->stream('pdf_file.pdf');

        //  return view('surat.surat_keluar_pdf', compact('suratKeluar'));

    }

    public function undangan(){
        return view('surat.undangan');
    }
    public function undangan_post(){
      //  return view('');
      dd('ok');
    }

}
