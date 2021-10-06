   

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
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-graduation-cap"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">TK</span>
                <span class="info-box-number">{{$jumlah_tk}}<!--<small>%</small>--></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-graduation-cap"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">SD</span>
                <span class="info-box-number">{{$jumlah_sd}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-graduation-cap"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">SMP</span>
                <span class="info-box-number">{{$jumlah_smp}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-graduation-cap"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">SMA</span>
                <span class="info-box-number">{{$jumlah_sma}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-graduation-cap"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">SMK</span>
                <span class="info-box-number">{{$jumlah_smk}}</span>
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
                        <h3 class="card-title">Data Sekolah</h3>

                        <div class="card-tools">
                        <a href="/sekolah/create" type="button" class="btn btn-primary btn-sm btn-flat"><i class="fas fa-plus"></i> Tambah</a>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">            
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th width="40px" class="text-center">No.</th>
                            <th>Nama Sekolah</th>
                            <th>Jenjang</th>
                            <th>Alamat</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th width="100px" class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tempat_sekolah as $ts)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td>{{$ts->nama}}</td>
                            <td>{{$ts->jenjang}}</td>
                            <td> {{$ts->alamat}}</td>
                            <td> {{$ts->lat}}</td>
                            <td> {{$ts->lng}}</td>
                            <td class="text-center">
                              <a href="/sekolah/edit/{{$ts->id}}" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-edit"></i></a>
                              <button class="btn btn-sm btn-flat btn-danger" onclick="deletesekolah({{$ts->id, $ts->nama }})"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th width="40px" class="text-center">No.</th>
                            <th>Nama Sekolah</th>
                            <th>Jenjang</th>
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
                      <p id = 'hapus' > <br>Data sekolah akan dihapus&hellip;</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <a href="/sekolah/delete/id" id="bdelete" type="button" class="btn btn-danger">Yes</a>
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
  function deletesekolah(id,nama) {
    $("#bdelete").attr("href", "/sekolah/delete/"+id);
        $('#hapus').text(nama);
        $('#modal-delete').modal('show');
  }
 </script>

@endsection