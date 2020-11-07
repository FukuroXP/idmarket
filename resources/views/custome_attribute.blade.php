@extends('layouts.app')

@section('content')

    <div class="top2">
        <div class="col-4">
            <h3><i class="fas fa-edit"></i> Custome</h3>
        </div>
    </div>

    <div class="row justify-content-center col-12 pb-5">

        <div class="col-7 p-5 mt-3 mb-5 bg-dark" style="border-radius: 10px">

            @foreach($customes as $custome)

                <style>
                    .input_idcard{
                        padding-left: 5px;
                        border-radius: 2px;
                        background: none;
                        border: 1px dashed grey;
                        color: {{ $custome->font_color }};
                        font-weight: bold;
                        font-family: {{ $custome->font_family }};
                        width: 180px;
                    }

                    {{--.textarea_idcard{--}}
                    {{--    border: 0;--}}
                    {{--    background: none;--}}
                    {{--    color: {{ $custome->font_color }};--}}
                    {{--    overflow: hidden;--}}
                    {{--    font-weight: bold;--}}
                    {{--    font-family: 'Montserrat', sans-serif;--}}
                    {{--    width: 180px;--}}
                    {{--}--}}

                    {{--.label_idcard{--}}
                    {{--    align-items: baseline;--}}
                    {{--    width: 250px--}}
                    {{--}--}}

                    {{--.label_textarea{--}}
                    {{--    align-items: first;--}}
                    {{--    width: 250px--}}
                    {{--}--}}

                    .photo{
                        width: 3cm;
                        height: 3cm;
                        transition: 0.3s;
                        @if(empty($custome->photo))
                        background: #ffffff;
                        border: #000000 solid 1px;
                        @else
                        background-image: url('{{ asset('photo/'.$custome->photo) }}');
                        background-size: cover;
                        background-position: center;
                        background-repeat: no-repeat;
                        border: 0;
                    @endif
                    }

                    .photo:hover{
                        opacity: 0.7;
                    }

                </style>

                <form class="col-12 row justify-content-center" method="post" enctype="multipart/form-data" action="{{route('text.edit', $custome->attribute_id)}}">
                    @csrf
                    <div id="html-content-holder1" class="mr-2"
                         style="
                             height: {{ $custome->l }}cm;
                             width: {{ $custome->w }}cm;
                         @if(empty($custome->background_front))
                             background: #ffffff;
                         @elseif($custome->bgf_image == '1')
                             background-image: url('{{ asset('background_front/'.$custome->background_front) }}');
                             background-size: cover;
                             background-position: center;
                             background-repeat: no-repeat;
                         @elseif($custome->bgf_image == '0')
                             background: {{ $custome->background_front }};
                         @endif
                             ">
                        <a id="att1" href=#bgdepan" title="Ubah Background" data-toggle="modal" data-target="#bgdepan" class="float-right mr-1" style="font-size: 20px; margin-bottom: -10px;"><b class="fas fa-edit"></b></a>
                        <div class="col-12 d-flex">
                            <div class="mr-1">
                                <div class="photo">
                                    <a id="att2" href="#pp" title="Ubah Foto" data-toggle="modal" data-target="#pp" class="float-right mt-1 mr-1"><h3><i class="fas fa-edit"></i></h3></a>
                                </div>
                            </div>

                            <div id="sortItems" class="target col-8 ml-2 p-0" style="font-size: {{ $custome->font_size }}px; color: {{ $custome->font_color }}; font-family: 'Montserrat', sans-serif; margin-top: -3px;">

                            </div>
                        </div>

                    </div>

                    <div id="html-content-holder2" class="ml-2"
                         style="
                             height: {{ $custome->l }}cm;
                             width: {{ $custome->w }}cm;
                         @if(empty($custome->background_back))
                             background: #ffffff;
                         @elseif($custome->bgb_image == '1')
                             background-image: url('{{ asset('background_back/'.$custome->background_back) }}');
                             background-size: cover;
                             background-position: center;
                             background-repeat: no-repeat;
                         @elseif($custome->bgb_image == '0')
                             background: {{ $custome->background_back }};
                         @endif
                             ">
                        <a id="att3" href=#bgbelakang" title="Ubah Background" data-toggle="modal" data-target="#bgbelakang" class="float-right mr-1" style="font-size: 20px; margin-bottom: -10px;"><b class="fas fa-edit"></b></a>

                    </div>

                    <hr class="w-100 mt-5" style="border: dimgrey solid 1px">


                    <div class="col-12 row justify-content-start">
                        <fieldset class="col-3 row justify-content-start mr-2" style="border: 1px grey solid; border-radius: 5px;">
                            <legend class="text-secondary col-5" style="font-size: 19px"><b>Teks :</b></legend>
                            <div class="form-group col-12">
                                <label class="text-light mb-0">Warna :</label>
                                <input name="font_color" class="form-control form-control-sm" value="{{ $custome->font_color }}" type="color">
                            </div>

                            <div class="form-group col-12">
                                <label class="text-light mb-0">Ukuran :</label>
                                <div class="input-group input-group-sm mb-0">
                                    <input type="text" class="form-control" aria-describedby="basic-addon2" name="font_size" value="{{ $custome->font_size }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">PX</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-12">
                                <label class="text-light mb-0">Font family :</label>
                                <select name="font_family" class="form-control form-control-sm mb-2">
                                    <option value="{{ $custome->font_family }}">{{ $custome->font_family }}</option>
                                    <option value="'Montserrat', sans-serif">Montserrat</option>
                                    <option value="'Times New Roman', Times, serif">Times New Roman</option>
                                    <option value="Arial, Helvetica, sans-serif">Arial</option>
                                </select>
                            </div>
                        </fieldset>
                        <fieldset id="dragItems" class="col-3 row justify-content-start ml-2" style="border: 1px grey solid; border-radius: 5px;">
                            <legend class="text-secondary col-6" style="font-size: 19px"><b>Form :</b></legend>
                            <div class="item w-100">
                                <input class="input_idcard" name="txt1" value="{{ $custome->txt1 }}" placeholder="Ketik disini..." type="text" id="input1">
                            </div>
                            <div class="item w-100">
                                <input class="input_idcard" name="txt2" value="{{ $custome->txt2 }}" placeholder="Ketik disini..." type="text" id="input2">
                            </div>
                            <div class="item w-100">
                                <input class="input_idcard" name="txt3" value="{{ $custome->txt3 }}" placeholder="Ketik disini..." type="text" id="input3">
                            </div>
                            <div class="item w-100">
                                <input class="input_idcard" name="txt4" value="{{ $custome->txt4 }}" placeholder="Ketik disini..." type="text" id="input4">
                            </div>
                            <div class="item w-100">
                                <input class="input_idcard" name="txt5" value="{{ $custome->txt5 }}" placeholder="Ketik disini..." type="text" id="input5">
                            </div>
                        </fieldset>
                        <div class="col-3 ml-4 mt-3" style="font-size: 14px">
                            <div class="row justify-content-start">
                                <input type="checkbox" class="form-control-sm col-3" id="myCheck" onclick="clickFunction()">
                                <label class="text-light" style="margin-top: -5px" for="myCheck">Sembunyikan<br>tombol ubah</label>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 row justify-content-end">
                        <button type="submit" class="btn btn-primary mr-2"><i class="fas fa-check"></i> Simpan</button>
                        <button id="btn-Preview-Image" type="button" class="btn btn-outline-success mr-2"><i class="fas fa-eye"></i> Preview</button>
                    </div>
                </form>
                <hr id="hrpreview" class="w-100 mt-5" style="border: dimgrey solid 1px; display: none;">
                <h3 id="preview" class="text-light" style="display: none;">Preview :</h3>
                <div class="row justify-content-center">
                    <div class="text-center">
                        <div id="previewImage1" class="mr-3"></div>
                        <a style="visibility: hidden" id="btn-Convert-Html2Image1" class="btn btn-outline-primary" href="#"><i class="fas fa-download"></i> Unduh</a>
                    </div>
                    <div class="text-center">
                        <div id="previewImage2"></div>
                        <a style="visibility: hidden" id="btn-Convert-Html2Image2" class="btn btn-outline-primary" href="#"><i class="fas fa-download"></i> Unduh</a>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="bgdepan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <form method="post" enctype="multipart/form-data" action="{{route('bgfgo.edit', $custome->attribute_id)}}">
                            @csrf
                            <div class="modal-content bg-dark">
                                <div class="modal-header">
                                    <h5 class="modal-title text-light" id="exampleModalLabel">Background Depan</h5>
                                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <label class="text-light">Warna solid</label>
                                    <input class="form-control mb-4 bg-dark col-5" type="color" name="background_front">

                                    <h4 class="text-secondary">Atau</h4>

                                    <label class="mt-3 text-light">Unggah gambar</label>
                                    <input class="form-control-file bg-dark text-light" type="file" name="background_front">

                                </div>
                                <div class="modal-footer mb-3">
                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Simpan</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

                <div class="modal fade" id="bgbelakang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <form method="post" enctype="multipart/form-data" action="{{route('bgbgo.edit', $custome->attribute_id)}}">
                            @csrf
                            <div class="modal-content bg-dark">
                                <div class="modal-header">
                                    <h5 class="modal-title text-light" id="exampleModalLabel">Background Belakang</h5>
                                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <label class="text-light">Warna solid</label>
                                    <input class="form-control mb-4 bg-dark col-5" type="color" name="background_back">

                                    <h4 class="text-secondary">Atau</h4>

                                    <label class="mt-3 text-light">Unggah gambar</label>
                                    <input class="form-control-file bg-dark text-light" type="file" name="background_back">

                                </div>
                                <div class="modal-footer mb-3">
                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Simpan</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

                <div class="modal fade" id="pp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <form method="post" enctype="multipart/form-data" action="{{route('ppgo.edit', $custome->attribute_id)}}">
                            @csrf
                            <div class="modal-content bg-dark">
                                <div class="modal-header">
                                    <h5 class="modal-title text-light" id="exampleModalLabel">Foto</h5>
                                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <label class="text-light">Unggah gambar</label>
                                    <input class="form-control-file bg-dark text-light" type="file" name="photo">

                                </div>
                                <div class="modal-footer mb-3">
                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Simpan</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            @endforeach

        </div>
        <div class="col-2 alert alert-primary alert-dismissible fade show" style="margin-right : -1500px; position : absolute; z-index: 999;" role="alert">
            <strong>Form</strong> cukup ditarik dan masukan kedalam layout idcard <br> <br>
            arahkan cursor disamping kanan salah satu form hingga cursor menjadi bentuk <i class="fas fa-arrows-alt"></i>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="col-2 alert alert-primary alert-dismissible fade show" style="margin-right : -1500px; margin-top: 200px; position : absolute; z-index: 999;" role="alert">
            <strong>Klik checkbox</strong> <i class="fas fa-check-square"></i> sembunyikan tombol ubah sebelum melakukan preview dan download
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>

    <div class="footer3">
        <div class="col-9 pt-4 pr-5">
            <div class="float-right">
                <h4>
                    Idmarket 2020
                </h4>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha512-U6K1YLIFUWcvuw5ucmMtT9HH4t0uz3M366qrF5y4vnyH6dgDzndlcGvH/Lz5k8NFh80SN95aJ5rqGZEdaQZ7ZQ==" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#sortItems").sortable({
                axis: "y",
                items: "> div",
                placeholder: "empty",
                dropOnEmpty: true,
                stop: function(e, ui) {
                    var $it = ui.item;
                    if ($it.find(".closer").length === 0) {

                        document.getElementById("input1").style.cssText = "background : none; padding : 0px; border : none;";
                        document.getElementById("input2").style.cssText = "background : none; padding : 0px; border : none;";
                        document.getElementById("input3").style.cssText = "background : none; padding : 0px; border : none;";
                        document.getElementById("input4").style.cssText = "background : none; padding : 0px; border : none;";
                        document.getElementById("input5").style.cssText = "background : none; padding : 0px; border : none;";
                        document.getElementById("input6").style.cssText = "background : none; padding : 0px; border : none;";

                        var closeBtn = $("<span>", {
                            class: "closer"
                        });
                        $it.append(closeBtn);
                        closeBtn.button({
                            icon: "ui-icon-close",
                            label: "Close",
                            showLabel: false
                        }).click(function(ev) {
                            console.log("[INFO]: Closing ", $it);
                            $it.fadeTo(200, 0.0, function() {
                                $it.remove();
                                $("#sortItems").sortable("refresh");
                            });
                        });
                    }
                }
            });

            $("#dragItems .item").draggable({
                connectToSortable: "#sortItems",
                revert: "invalid"
            });

            $("#sortItems").disableSelection();
        });
    </script>

    <script>
        function clickFunction() {
            // Get the checkbox
            var checkBox = document.getElementById("myCheck");
            // Get the output text
            // var att = document.getElementById("att1");
            // var att = document.getElementById("att2");
            // var att = document.getElementById("att3");
            // var att = document.getElementById("sortItems");

            // If the checkbox is checked, display the output text
            if (checkBox.checked == true){
                att1.style.visibility = "hidden";
                att2.style.visibility = "hidden";
                att3.style.visibility = "hidden";
                sortItems.style.border = "none";
            }
            else {
                att1.style.visibility = "visible";
                att2.style.visibility = "visible";
                att3.style.visibility = "visible";
                sortItems.style.border = "1px solid blue";
            }
        }
    </script>

    <script>
        $('#btn-Preview-Image').click(function() {
            $('#btn-Convert-Html2Image1').css({
                'visibility' : 'visible'
            });
            $('#btn-Convert-Html2Image2').css({
                'visibility' : 'visible'
            });
            $('#hrpreview').css({
                'display' : 'block'
            });
            $('#preview').css({
                'display' : 'block'
            });
            $('#btn-Preview-Image').css({
                'cursor' : 'not-allowed',
                'pointer-events' : 'none'
            });

        });
    </script>

    {{--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>--}}
    <script src="https://files.codepedia.info/files/uploads/iScripts/html2canvas.js"></script>
    <script>
        $(document).ready(function(){


            var element1 = $("#html-content-holder1"); // global variable
            var element2 = $("#html-content-holder2"); // global variable
            var getCanvas; // global variable

            $("#btn-Preview-Image").on('click', function () {
                html2canvas(element1, {
                    onrendered: function (canvas) {
                        $("#previewImage1").append(canvas);
                        getCanvas1 = canvas;
                    }
                })
                html2canvas(element2, {
                    onrendered: function (canvas) {
                        $("#previewImage2").append(canvas);
                        getCanvas2 = canvas;
                    }
                });
            });

            $("#btn-Convert-Html2Image1").on('click', function () {
                var imgageData1 = getCanvas1.toDataURL("image/png");
                // Now browser starts downloading it instead of just showing it
                var newData1 = imgageData1.replace(/^data:image\/png/, "data:application/octet-stream");
                $("#btn-Convert-Html2Image1").attr("download", "idcard_front.png").attr("href", newData1);
            });

            $("#btn-Convert-Html2Image2").on('click', function () {
                var imgageData2 = getCanvas2.toDataURL("image/png");
                // Now browser starts downloading it instead of just showing it
                var newData2 = imgageData2.replace(/^data:image\/png/, "data:application/octet-stream");
                $("#btn-Convert-Html2Image2").attr("download", "idcard_back.png").attr("href", newData2);
            });

        });

    </script>


@endsection
