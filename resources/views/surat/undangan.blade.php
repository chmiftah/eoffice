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
                            <h2 class="mb-0">Buat Surat Undangan</h2>
                        </div>
                        {{-- <div class="col-4 text-right">
                            <a href="" class="btn btn-sm btn-primary">Add user</a>
                        </div> --}}
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

                    <form action="{{ route('surat_undangan_post')}}" method="post">
                      @csrf
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Jenis Surat</label>
                                <input type="text"  class="form-control" name="jenis_Surat" />

                                @error('jenis_surat')
                                <div class="mt-2 text-danger text-sm">{{ $message }}</div>
                                @enderror
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Tanggal Terima</label>
                                <input type="date"  class="form-control" name="tgl_terima" />
                                @error('tgl_terima')
                                <div class="mt-2 text-danger text-sm">{{ $message }}</div>
                                @enderror
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>perihal</label>
                                <input type="text"  class="form-control" name="perihal" />
                                @error('perihal')
                                <div class="mt-2 text-danger text-sm">{{ $message }}</div>
                                @enderror
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>No. Agenda</label>
                                <input type="text"  class="form-control" name="no_agenda" />
                                @error('no_agenda')
                                <div class="mt-2 text-danger text-sm">{{ $message }}</div>
                                @enderror
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Tgl. Surat</label>
                                <input type="date"  class="form-control" name="tgl_surat" />
                                @error('tgl_surat')
                                <div class="mt-2 text-danger text-sm">{{ $message }}</div>
                                @enderror
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>No. Surat</label>
                                <input type="text"  class="form-control" name="no_surat" />
                                @error('no_surat')
                                <div class="mt-2 text-danger text-sm">{{ $message }}</div>
                                @enderror
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Tujuan</label>
                                <input type="text"  class="form-control" name="tujuan" />
                                @error('tujuan')
                                <div class="mt-2 text-danger text-sm">{{ $message }}</div>
                                @enderror
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Asal Surat</label>
                                <input type="text"  class="form-control" name="asal_surat" />
                                @error('asal_surat')
                                <div class="mt-2 text-danger text-sm">{{ $message }}</div>
                                @enderror
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>File Lampiran</label>
                                <input type="file"  class="form-control" name="file_lampiran" />

                              </div>
                            </div>


                          </div>
                          <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                     <label>Isi Surat</label>
                                    <textarea class="form-control ckeditor form-control" name="deskripsi"></textarea>
                                    @error('deskripsi')
                                    <div class="mt-2 text-danger text-sm">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                          </div>
                            <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>File Surat</label>
                                <input type="file"  class="form-control" name="file_surat" />
                              </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                          </div>
                          <button class="btn btn-primary" type="submit">Simpan Data</button>
                    </form>

                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">

                    </nav>
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

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>

@endsection
