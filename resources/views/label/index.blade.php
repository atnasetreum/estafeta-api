@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Información API </div>
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
                    <p class="text-justify">Estafeta Mexicana cuenta con una filosofía de mejora continua. Como parte de dicha filosofía,
                    se busca proporcionar las herramientas adecuadas para facilitar la logística de envíos de los Clientes
                    dentro de la red Estafeta.</p>
                    <p class="text-justify">Actualmente, existen muchos Clientes que, con la finalidad de agilizar sus envíos dentro de la
                    red logística Estafeta, se han dado a la tarea de implementar sistemas propietarios para imprimir
                    documentos guía Estafeta. El propósito de dichos sistemas, era agilizar los envíos evitando el tiempo de
                    espera que requiere recibir sus guías pre-impresas. El único pre-requisito con el que contaban, era
                    contar con rangos de guías vigentes.</p>
                </div>
            </div>
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