   

@extends('layouts.master')

@section('content')
    <!-- Main content -->
    <section class="content">
          <!-- col card-body -->
        <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Data</h3>
              </div><!-- /.card-header -->
                    <form action="/sekolah/update/{{$sekolah->id}}" method="POST">  
                    @csrf
                        <div class="card-body">     
                            <div class="row">
                                <!--<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>sekolah</label>
                                        <input class="form-control">
                                    </div>
                                </div>--> 
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama Sekolah</label>
                                        <input name="nama" class="form-control" placeholder="Sekolah" required value="{{$sekolah->nama}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Pilih Jenjang</label>
                                        <select class="form-control select2" style="width: 100%;" name="jenjang" required>
                                            <option value="tk" @if($sekolah->jenjang == 'TK') selected @endif>Tk</option>
                                            <option value="sd" @if($sekolah->jenjang == 'SD') selected @endif>SD</option>
                                            <option value="smp" @if($sekolah->jenjang == 'SMP') selected @endif>SMP</option>
                                            <option value="sma" @if($sekolah->jenjang == 'SMA') selected @endif>SMA</option>
                                            <option value="smk" @if($sekolah->jenjang == 'SMK') selected @endif>SMK</option>
                                        </select>
                                    </div>
                                </div>  
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Alamat Sekolah</label>
                                        <input name="alamat" class="form-control" placeholder="Alamat Sekolah" required value="{{$sekolah->alamat}}">
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Latitude Sekolah</label>
                                        <input name="Lat" id="lat" class="form-control" placeholder="Latitude" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Longitude Sekolah</label>
                                        <input name="Lng" id="lng" class="form-control" placeholder="Longitude" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label>Map Posisi</label>
                                    <div id="map" style="width: 100%; height: 500px;"></div>
                                </div>

                                
                            </div>
                            

                            <!-- /.card-body -->
                        </div>
                            <!--card-footer-->
                            <div class="card-footer">
                                    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
                                    <a href="/sekolah"><button type="button" class="btn btn-default float-right">Cancel</button></a>
                            </div><!-- /.card-footer -->
                    </form>
            </div>
        </div><!-- /.col -->
    </section>
    <!-- /.content -->

    <script>
        var sekolah = {!! json_encode($sekolah) !!}

        var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11'
            });

        var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/satellite-v9'
            });


        var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            });

        var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/dark-v10'
            });

            var desa = L.layerGroup();
            var map = L.map('map', {
            center: [sekolah.lat, sekolah.lng],
            zoom: 15,
            layers: [peta1, desa]
            });

            var baseMaps = {
            "Grayscale": peta1,
            "satellite": peta2,
            "Streets": peta3,
            "Dark": peta4
            };

            var overlayer = {
                        "Desa Tegal Harum" : desa,
                      };

            L.control.layers(baseMaps).addTo(map);
            L.geoJSON({
  "type": "FeatureCollection",
  "features": [
    {
      "type": "Feature",
      "properties": {},
      "geometry": {
        "type": "Polygon",
        "coordinates": [
          [
            [
              115.19765853881836,
              -8.662996648855797
            ],
            [
              115.19744396209715,
              -8.664014865211636
            ],
            [
              115.1967144012451,
              -8.663845162677136
            ],
            [
              115.19516944885254,
              -8.663675460066036
            ],
            [
              115.19555568695067,
              -8.661129911709875
            ],
            [
              115.19461154937744,
              -8.661045059801278
            ],
            [
              115.19448280334473,
              -8.661426893239213
            ],
            [
              115.19388198852539,
              -8.661299615469638
            ],
            [
              115.19340991973876,
              -8.661469319152838
            ],
            [
              115.19328117370605,
              -8.661681448649158
            ],
            [
              115.19268035888672,
              -8.662232984779642
            ],
            [
              115.1928949356079,
              -8.662869371617463
            ],
            [
              115.1928949356079,
              -8.663548183057452
            ],
            [
              115.19169330596925,
              -8.663336054614087
            ],
            [
              115.1905345916748,
              -8.663930013953946
            ],
            [
              115.18993377685547,
              -8.665033078810186
            ],
            [
              115.1905345916748,
              -8.665160355316116
            ],
            [
              115.18937587738037,
              -8.665754311774077
            ],
            [
              115.18967628479005,
              -8.666093715043008
            ],
            [
              115.18937587738037,
              -8.667663451175578
            ],
            [
              115.18993377685547,
              -8.668087703059031
            ],
            [
              115.19036293029787,
              -8.66885135524238
            ],
            [
              115.19062042236328,
              -8.669572580879542
            ],
            [
              115.19092082977294,
              -8.670590779422405
            ],
            [
              115.19104957580566,
              -8.671905948456363
            ],
            [
              115.19160747528075,
              -8.672542318916644
            ],
            [
              115.19152164459227,
              -8.674027179131285
            ],
            [
              115.19096374511717,
              -8.674536272710636
            ],
            [
              115.19147872924803,
              -8.67534233613318
            ],
            [
              115.19117832183838,
              -8.677166578542245
            ],
            [
              115.19139289855957,
              -8.677802940088016
            ],
            [
              115.1919937133789,
              -8.678142332471358
            ],
            [
              115.19272327423096,
              -8.677930212267729
            ],
            [
              115.19302368164062,
              -8.677124154400838
            ],
            [
              115.19315242767334,
              -8.67597870077087
            ],
            [
              115.19379615783691,
              -8.675512033475346
            ],
            [
              115.19431114196779,
              -8.674408999380491
            ],
            [
              115.19478321075438,
              -8.672202921471982
            ],
            [
              115.19585609436035,
              -8.672415044910833
            ],
            [
              115.19774436950684,
              -8.672160496769843
            ],
            [
              115.19710063934326,
              -8.671354426518775
            ],
            [
              115.19722938537598,
              -8.669954405656458
            ],
            [
              115.19946098327635,
              -8.670463504755446
            ],
            [
              115.19946098327635,
              -8.670081680495867
            ],
            [
              115.19980430603027,
              -8.66919075571465
            ],
            [
              115.20014762878417,
              -8.668130128221026
            ],
            [
              115.20044803619385,
              -8.667281624071018
            ],
            [
              115.20061969757079,
              -8.665881588035827
            ],
            [
              115.2011775970459,
              -8.663166351773237
            ],
            [
              115.20023345947267,
              -8.66269966856601
            ],
            [
              115.19980430603027,
              -8.663166351773237
            ],
            [
              115.19765853881836,
              -8.662996648855797
            ]
          ]
        ]
      }
    }
  ]
}).addTo(map);

            var isekolah = L.icon({
                iconUrl: '/adminlte/dist/img/university.png',

                iconSize:     [32, 32], 
                iconAnchor:   [16, 32], 
                popupAnchor:  [0, -16] 
            });

            var marker = L.marker([sekolah.lat, sekolah.lng],{
                draggable : 'true',
                icon: isekolah,
            }).addTo(map);
            $('#lat').val(marker._latlng.lat); 
            $('#lng').val(marker._latlng.lng); 

            marker.on('move', function(e){
                    $('#lat').val(e.latlng.lat);
                    $('#lng').val(e.latlng.lng);;
                });
    </script>

@endsection