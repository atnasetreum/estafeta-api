@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Guías Generadas </div>
                @php
                    $link = false;
                @endphp
                @if (session()->has('pdf_info'))
                    <div class="alert alert-success">
                        <a id="link_pdf" style="color:white;" href="guiasPDF/{{ session('pdf_info')->nombre_del_PDF }}" title="Descargar" target="_black">
                            <h3>Descargar Guía PDF (Click)</h3>
                        </a>
                        <p>Ref. {{ session('pdf_info')->numero_de_guia }}</p>
                    </div>
                    @php
                        $link = true;
                    @endphp
                @endif

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table" >
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ID USUARIO</th>
                                    <th>NÚMERO DE GUÍA</th>
                                    <th>CREACIÓN</th>
                                    <th>PDF</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($labels AS $label)
                                <tr>
                                    <td>{{ $label->id }}</td>
                                    <td>{{ $label->id_user }}</td>
                                    <td>{{ $label->guia }}</td>
                                    @php
                                        $creacion = date('d-m-Y H:m:i', strtotime($label->created_at));
                                    @endphp
                                    <td>{{ $creacion }}</td>
                                    <td><a href="guiasPDF/{{ $label->guia }}.pdf" target="_black" title="">Descargar</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $labels->render() !!}
        </div>
    </div>
</div>
@endsection

@section('content-js')
    <script>
        var $link = "<?php echo $link; ?>";
        jQuery(document).ready(function($) {
            if($link){
                setTimeout(function () {
                    window.open($('a#link_pdf').attr('href'));
                }, 1000);
            }
        });
    </script>
@endsection