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
                            <h2 class="mb-0">Surat Keluar</h2>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('surat_keluar.edit') }}" class="btn btn-sm btn-primary">add surat</a>
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
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                      <thead class="thead-light">
                          <tr>
                              <th scope="col">No Surat/Agenda</th>
                              <th scope="col">Tanggal Surat</th>
                              <th scope="col">Tujuan Surat</th>
                              <th scope="col">Status</th>
                              <th scope="col">file</th>
                              <th scope="col"></th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($surat as $surat)
                          <tr>
                                <td>
                                    <div>
                                        {{ $surat->no_surat }} /

                                    </div>
                                    <div>
                                        {{ $surat->no_agenda }}
                                    </div>

                                </td>

                                <td>{{ $surat->tanggal_surat }}</td>
                                <td>{{ $surat->tujuan_surat }}</td>
                                @if ($surat->SuratKeluarStatus->by_atasan == 0)
                                <td>belum diverivikasi</td>
                                @else
                                <td>sudah diverivikasi</td>
                                @endif
                                <td>{{ $surat->file_surat }}</td>


                              <td class="text-right">
                                  <a href="{{ route('surat_keluar.detail', $surat) }}" class="btn btn-info btn-sm">Detail</a>
                                  {{-- <div class="dropdown">
                                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <i class="fas fa-ellipsis-v"></i>
                                      </a>
                                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                          <a class="dropdown-item" href="">Edit</a>
                                      </div>
                                  </div> --}}
                              </td>
                            </tr>
                            @endforeach
                      </tbody>
                  </table>
              </div>


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



@endsection
