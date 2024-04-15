@extends('template.app')
@section('content')
@section('title', 'Kejuruan')

<div class="col-lg-12 margin-tb">
    <div class="pull-left">
        <h2>Data Kejuruan</h2>
    </div>
    <div class="pull-right mb-2">
        <a class="btn btn-success" href="javascript:void(0)" id="createNewKejuruan"> Tambah Kejuruan</a>
    </div>
</div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
    <div class="card-body">
        <table class="table table-bordered data-table-kejuruan">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Kejuruan</th>
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
                        <form id="kejuruanForm" name="kejuruanForm" class="form-horizontal">
                            <input type="hidden" name="kejuruan_id" id="kejuruan_id">
                            <div class="form-group">
                                <label for="kejuruan" class="col-sm-2 control-label">Kejuruan</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="kejuruan" name="kejuruan" placeholder="Masukkan Kejuruan" value="" maxlength="50" required="">
                                </div>
                            </div>
                            <br>
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary" id="saveBtnKejuruan" value="create">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection
