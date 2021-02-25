@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
@include('layouts.headers.cards')

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h2 class="mb-0">Detail Surat</h2>
                        </div>

                    </div>
                </div>


                <div class="col-12">


                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
                  <span class="alert-inner--text">{{ session('success') }} </span>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif


                  @foreach ($suratKeluar as $surat)
                  @if ($surat->SuratKeluarStatus->by_atasan == 0)
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">

                    <span class="alert-inner--text">Anda belum melakukan verifikasi surat. <a>verifikasi sekarang</a> </span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @else
                  aaa
                  @endif
                  <div class="row">


                <div class="col-6">
                  <form action="{{ route('surat_keluar.update',$surat )}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group mb-2">
                    <label for="no_surat">No Surat</label>
                    <input type="text" name="no_surat" id="no_surat" value="{{old('no_surat')?? $surat->no_surat }}" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label for="no_surat">No Agenda</label>
                      <input type="text" name="no_agenda" id="no_surat" value="{{ $surat->no_agenda }}" class="form-control">
                      </div>
                      <div class="form-group mb-2">
                        <label for="no_surat">Tanggal Surat</label>
                        <input type="date" name="tanggal_surat" id="tanggal_surat" value="{{ $surat->tanggal_surat }}" class="form-control">
                      </div>
                      <div class="form-group mb-2">
                        <label for="no_surat">Sifat Surat</label>
                        <select name="sifat_surat" id="sifat_surat" class="form-control">
                          <option value="{{ $surat->sifat_surat  }}"" selected>{{ $surat->sifat_surat }}</option>
                          <option value="penting">penting</option>
                          <option value="biasa">biasa</option>
                        </select>
                      </div>
                      <div class="form-group mb-2">
                        <label for="no_surat">Jenis Surat</label>
                        <select name="jenis_surat" id="sifat_surat" class="form-control">
                          <option value="{{ $surat->jenis_surat  }}"" selected>{{ $surat->jenis_surat }}</option>
                          <option value="penting">penting</option>
                          <option value="biasa">biasa</option>
                        </select>
                      </div>
                      <div class="form-group mb-2">
                        <label for="no_surat">Perihal</label>
                        <input type="text" name="hal_surat" id="no_surat" value="{{ $surat->hal_surat }}" class="form-control">
                      </div>

                      <div class="form-group mb-2">

                        <input type="text" name="by_atasan" hidden id="no_surat" value="{{ $surat->SuratKeluarStatus->by_atasan }}" class="form-control">
                      </div>






                      {{-- {{ $surat->user_id }}
                      {{ }} --}}
                      </div>
                      <div class="col-6">
                        <div class="form-group mb-2">
                          <label for="no_surat">Tujuan Surat</label>
                          <input type="text" name="tujuan_surat" id="tujuan_surat" value="{{ $surat->tujuan_surat }}" class="form-control">
                        </div>
                          <div class="form-group mb-2">
                            <label for="no_surat">Penanda Tangan</label>
                            <input type="text" name="penandatangan_surat" id="penandatangan_surat" value="{{ $surat->penandatangan_surat }}" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                              <label for="no_surat">Diajukan kepada</label>
                              <select name="ajuan_surat" id="ajuan_surat" class="form-control">
                                <option value="{{ $surat->ajuan_surat  }}"" selected>{{ $surat->ajuan_surat }}</option>
                                <option value="penting">penting</option>
                                <option value="biasa">biasa</option>
                              </select>
                            </div>
                            <div class="form-group mb-2">
                              <label for="no_surat">Lampiran</label>
                              <input type="text" name="lampiran_surat" id="no_surat" value="{{ $surat->lampiran_surat }}" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                              <label for="no_surat">File Surat</label>
                              <input type="text" name="file_surat" id="no_surat" value="{{ $surat->file_surat }}" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                              <label for="no_surat">Keterangan Surat</label>
                              <input type="text" name="keterangan" id="tujuan_surat" value="{!! $surat->keterangan !!}" class="form-control">
                            </div>
                      </div>

                      <input type="text" value="1" hidden name="by_atasan">
                      </div>
                      @if ($surat->SuratKeluarStatus->by_atasan == 0)
                      <button class="btn btn-primary">verivikasi</button>
                      @else
                      <button class="btn btn-danger" hidden>batalkan</button>
                      @endif
                      <button type="submit" class="btn btn-info">update</button>
                    </form>
                      <a href="{{ route('surat_keluar.pdf', $surat) }}"  class="btn btn-secondary">cetak</a>

                    @endforeach
                      </div>

                    <div class="card-footer">
                    </div>
                </div>
                <div class="card shadow mt-5">
                  <div class="card-header border-0">
                      <div class="row align-items-center">
                          <div class="col-8">
                              <h2 class="mb-0">Tracking Surat</h2>
                          </div>

                      </div>
                  </div>
                  <div class="card-body border-0">
                @foreach ($suratKeluar as $surat)
                <div>
                  atasan :   {{ $surat->SuratKeluarStatus->by_atasan}}
                </div>
                <div>
                  pegawai :   {{ $surat->SuratKeluarStatus->by_pegawai}}
                </div>
                <div>
                  pengagenda :   {{ $surat->SuratKeluarStatus->by_pengagenda}}
                </div>


                @endforeach

              </div>

            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
            <div class="col-xl-6">
                <div class="copyright text-center text-xl-left text-muted">
                    © 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a> &amp;
                    <a href="https://www.updivision.com" class="font-weight-bold ml-1" target="_blank">Updivision</a>
                </div>
            </div>
            <div class="col-xl-6">
                <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.updivision.com" class="nav-link" target="_blank">Updivision</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
</div>



@endsection
