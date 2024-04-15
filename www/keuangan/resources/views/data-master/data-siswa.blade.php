@extends('template.app')
@section('content')
@section('title', 'Siswa')

<div class="col-lg-12 margin-tb">
    <div class="pull-left">
        <h2>Data Siswa</h2>
    </div>
    <div class="pull-right mb-2">
        <a class="btn btn-success" href="javascript:void(0)" id="createNewProduct">Tambah Siswa</a>
    </div>
</div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
    <div class="card-body">
        <table class="table table-bordered data-table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">NIS</th>
                <th scope="col">Nama</th>
                <th scope="col">Kelas</th>
                <th scope="col">Kejuruan</th>
                <th scope="col">Tahun Ajaran</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>

        {{-- Modal --}}
        <div class="modal fade" id="ajaxModel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelHeadingSiswa"></h4>
                        <h4 class="modal-title" id="modelHeadingKelas"></h4>
                    </div>
                    <div class="modal-body">
                        <form id="productForm" name="productForm" class="form-horizontal">
                            <input type="hidden" name="product_id" id="product_id">
                            <div class="form-group">
                                <label for="nis" class="col-sm-2 control-label">NIS</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="nis" name="nis" placeholder="Enter NIS" value="" maxlength="50" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama</label>
                                <div class="col-sm-12">
                                    <input type="text" id="nama" name="nama" required="" placeholder="Enter Nama" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kelas_id" class="col-sm-2 control-label">Kelas</label>
                                <div class="col-sm-12">
                                    <select class="form-control" id="kelas_id" name="kelas_id">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kejuruan_id" class="col-sm-2 control-label">Kejuruan</label>
                                <div class="col-sm-12">
                                    <select class="form-control" id="kejuruan_id" name="kejuruan_id">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tahun_ajaran_id" class="col-sm-2 control-label">Tahun Ajaran</label>
                                <div class="col-sm-12">
                                    <select class="form-control" id="tahun_ajaran_id" name="tahun_ajaran_id">
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


@endsection
