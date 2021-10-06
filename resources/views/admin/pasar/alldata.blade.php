   

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
      <div class="row">
          <!-- col card-body -->
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Data Pasar</h3>

                        <div class="card-tools">
                        <a href="/pasar/create" type="button" class="btn btn-primary btn-sm btn-flat"><i class="fas fa-plus"></i> Tambah</a>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">            
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th width="40px" class="text-center">No.</th>
                            <th>Nama Pasar</th>
                            <th>Alamat</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th width="100px" class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tempat_pasar as $ts)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td>{{$ts->nama}}</td>
                            <td> {{$ts->alamat}}</td>
                            <td> {{$ts->lat}}</td>
                            <td> {{$ts->lng}}</td>
                            <td class="text-center">
                              <a href="/pasar/edit/{{$ts->id}}" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-edit"></i></a>
                              <button class="btn btn-sm btn-flat btn-danger" onclick="deletepasar({{$ts->id, $ts->nama }})"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th width="40px" class="text-center">No.</th>
                            <th>Nama Pasar</th>
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
                      <p id = 'hapus' > <br>Data Pasar akan dihapus&hellip;</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <a href="/pasar/delete/id" id="bdelete" type="button" class="btn btn-danger">Yes</a>
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
  function deletepasar(id,nama) {
    $("#bdelete").attr("href", "/pasar/delete/"+id);
        $('#hapus').text(nama);
        $('#modal-delete').modal('show');
  }
 </script>

@endsection