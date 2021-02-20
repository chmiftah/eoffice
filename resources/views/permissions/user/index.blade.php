@extends('layouts.app', ['title' => __('User Profile')])
@section('content')
@include('layouts.headers.cards')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
@push('js')
        <script>
            $(document).ready(function () {
                $(".yo").select2({
                    placeholder: "Silahkan Pilih"
                });
            });
        </script>
@endpush
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                </div>
                <div class="row p-4">
                  <div class="col-lg-5 col-sm-12">
                        <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <h3 class="mb-0">Create Permission</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('assign.user.create') }}" autocomplete="off">
                                @csrf
                                <div class="">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-name">Roles</label>
                                        <select name="email" id="user" class="form-control">
                                          @foreach ($users as $user)
                                          <option value="{{ $user->email }}">{{ $user->email }}</option>
                                          @endforeach
                                        </select>
                                          @error('role')
                                          <div class="text-danger">{{ $message }}</div>
                                          @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Permission</label>
                                        <select name="roles[]" id="roles" class="form-control yo select2multiple" multiple>
                                          @foreach ($roles as $role)
                                          <option value="{{ $role->id }}">{{ $role->name }}</option>
                                          @endforeach
                                        </select>
                                      @error('permissions')
                                      <div class="text-danger">{{ $message }}</div>
                                      @enderror
                                    </div>
                                    <div class="">
                                        <button type="submit" class="btn btn-success mt-4">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                  </div>
                    <div class="col-lg-7 col-sm-12 mt-lg-12">
                        <div class="card bg-secondary shadow">
                            <div class="card-header bg-white border-0">
                                <div class="row align-items-center">
                                    <h3 class="mb-0">Data Role</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">User</th>
                                                <th scope="col">Roles</th>
                                                <th scope="col">action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                            <td>{{ $user->email }}</td>
                                            <td>{{ implode(',',$user->getRoleNames()->toArray()) }}</td>
                                            <td>{{ $user->created_at->format("d F Y") }}</td>
                                            <td>
                                                    {{-- <a href="{{ route('assign-user-edit', $user) }}" class="btn btn-primary btn-sm">edit</a> --}}
                                            </td>
                                        </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>


                <div class="card-footer py-4">
                </div>
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
