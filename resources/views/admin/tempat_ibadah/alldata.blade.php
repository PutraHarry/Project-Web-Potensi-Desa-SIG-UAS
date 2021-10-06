   

@extends('layouts.master')

@section('content')
        @if (session()->has('statusInput'))
            <div class="row">
              <div class="col-sm-12 alert alert-success alert-dismissible fade show" role="alert">
                  {{session()->get('statusInput')}}
                  <button type="button" class="close" data-dismiss="alert"
                      aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
            </div>
          @endif
    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-place-of-worship"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pura</span>
                <span class="info-box-number">{{$agama_hindu}}<!--<small>%</small>--></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-place-of-worship"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Masjid</span>
                <span class="info-box-number">{{$agama_islam}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-place-of-worship"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Gereja Katolik</span>
                <span class="info-box-number">{{$agama_kristen_katolik}}<!--<small>%</small>--></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-place-of-worship"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Gereja Protestan</span>
                <span class="info-box-number">{{$agama_kristen_protestan}}<!--<small>%</small>--></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->


          <!-- col card-body -->
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Data Tempat Ibadah</h3>

                        <div class="card-tools">
                        <a href="/tempat-ibadah/create" type="button" class="btn btn-primary btn-sm btn-flat"><i class="fas fa-plus"></i> Tambah</a>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">            
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th width="40px" class="text-center">No.</th>
                            <th>Nama Tempat Ibadah</th>
                            <th>Agama</th>
                            <th>Alamat</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th width="100px" class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Tagama as $data)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td>{{$data->nama}}</td>
                            <td>{{$data->agama}}</td>
                            <td> {{$data->alamat}}</td>
                            <td> {{$data->lat}}</td>
                            <td> {{$data->lng}}</td>
                            <td class="text-center">
                              <a href="/tempat-ibadah/edit/{{$data->id}}" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-edit"></i></a>
                              <button class="btn btn-sm btn-flat btn-danger" onclick="deleteagama({{$data->id}})"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th width="40px" class="text-center">No.</th>
                            <th>Nama Tempat Ibadah</th>
                            <th>Agama</th>
                            <th>Alamat</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th width="100px" class="text-center">Actions</th>
                        </tr>
                        </tfoot>
                        </table>  
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div> <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- /.card-footer-->
              <div class="modal fade" id="modal-delete">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Delete Data</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p><br>Data Tempat Ibadah akan dihapus&hellip;</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <a href="/tempat-ibadah/delete/id" id="bdelete" type="button" class="btn btn-danger">Yes</a>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->

    </section>
    <!-- /.content -->

    <script>
      function deleteagama(id) {
        $("#bdelete").attr("href", "/tempat-ibadah/delete/"+id);
            $('#modal-delete').modal('show');
      }
    </script>

@endsection