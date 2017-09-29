@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Generación de Guía Estafeta</div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="panel-body">


                    <form class="form-horizontal" action="{{ route('label.store') }}" method="POST" >
                        {{ csrf_field() }}

                    <p style="color:red;font-size: 12px;">Campos Requeridos *</p>

                      <div class="form-group @if(count($errors->get('contenido_del_envio')) > 0) {{ 'has-error' }} @endif">
                        <label class="col-sm-2 control-label">Contenido del Envío <z style="color:red;">*</z></label>
                        <div class="col-sm-10">
                          <input
                                type      ="text"
                                class     ="form-control"
                                name      ="contenido_del_envio"
                                minlength ="1"
                                maxlength ="25"
                                title     ="Contenido del envío, maximo 25 caracteres."
                                value     ="{{old('contenido_del_envio', '') }}"
                                required >
                        </div>
                      </div>

                      <div class="form-group @if(count($errors->get('forma_de_entrega')) > 0) {{ 'has-error' }} @endif">
                        <label class="col-sm-2 control-label">Forma de entrega <z style="color:red;">*</z></label>
                        <div class="col-sm-10">
                          <select name="forma_de_entrega" class="form-control" required>
                              <option value="true">Se entregará la oficina de Estafeta</option>
                              <option value="false" selected="">Se entrega en domicilio del destinatario</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group @if(count($errors->get('numero_de_etiquetas')) > 0) {{ 'has-error' }} @endif">
                        <label class="col-sm-2 control-label">No. de Etiquetas <z style="color:red;">*</z></label>
                        <div class="col-sm-10">
                          <input
                                type       ="number"
                                class      ="form-control"
                                name       ="numero_de_etiquetas"
                                min        = "1"
                                onkeypress ='return event.charCode >= 48 && event.charCode <= 57'
                                max        ="70"
                                value      ="{{ old('numero_de_etiquetas', '') }}"
                                title      ="Número de etiquetas que se desean imprimir con el tipo de servicio."
                                required >
                        </div>
                      </div>

                      <div class="form-group @if(count($errors->get('numero_de_oficina')) > 0) {{ 'has-error' }} @endif">
                        <label class="col-sm-2 control-label">No. de Oficina Estafeta <z style="color:red;">*</z></label>
                        <div class="col-sm-10">
                          <input
                                type      ="text"
                                class     ="form-control"
                                name      ="numero_de_oficina"
                                minlength ="3"
                                maxlength ="3"
                                value     ="130"
                                title     ="Número de etiquetas que se desean imprimir con el tipo de servicio."
                                readonly
                                required >
                        </div>
                      </div>

                      <div class="form-group @if(count($errors->get('codigo_postal_destino')) > 0) {{ 'has-error' }} @endif">
                        <label class="col-sm-2 control-label">Código Postal Destino <z style="color:red;">*</z></label>
                        <div class="col-sm-10">
                          <input
                                type       ="text"
                                class      ="form-control"
                                name       ="codigo_postal_destino"
                                onkeypress ='return event.charCode >= 48 && event.charCode <= 57'
                                minlength  ="5"
                                maxlength  ="5"
                                value      ="{{ old('codigo_postal_destino', '') }}"
                                title      = "Código postal del domicilio destino del envío."
                                required >
                        </div>
                      </div>

                      <div class="form-group @if(count($errors->get('tipo_de_envio')) > 0) {{ 'has-error' }} @endif">
                        <label class="col-sm-2 control-label">Tipo de envío <z style="color:red;">*</z></label>
                        <div class="col-sm-10">
                          <select name="tipo_de_envio" class="form-control" required>
                              <option value="1" selected="" >Sobre</option>
                              <option value="4">Paquete</option>
                          </select>
                        </div>
                      </div>


                      <div class="form-group @if(count($errors->get('tipo_de_servicio')) > 0) {{ 'has-error' }} @endif">
                        <label class="col-sm-2 control-label">Tipo de Servicio <z style="color:red;">*</z></label>
                        <div class="col-sm-10">
                          <input
                                type      ="number"
                                onkeypress ='return event.charCode >= 48 && event.charCode <= 57'
                                class     ="form-control"
                                name      ="tipo_de_servicio"
                                minlength ="2"
                                maxlength ="2"
                                value     ="70"
                                title     ="Número de etiquetas que se desean imprimir con el tipo de servicio."
                                readonly
                                required >
                        </div>
                      </div>

                      <div class="form-group @if(count($errors->get('peso_del_envio')) > 0) {{ 'has-error' }} @endif">
                        <label class="col-sm-2 control-label">Peso del envío <z style="color:red;">*</z></label>
                        <div class="col-sm-10">
                          <input
                                type      ="number"
                                class     ="form-control"
                                name      ="peso_del_envio"
                                value     ="{{ old('peso_del_envio','') }}"
                                title     ="Peso del envío  (0.5 a 99.00)"
                                required >
                        </div>
                      </div>

                      <div class="form-group @if(count($errors->get('tipo_de_papel')) > 0) {{ 'has-error' }} @endif">
                        <label class="col-sm-2 control-label">Tipo de papel para impresión de la guía <z style="color:red;">*</z></label>
                        <label class="radio-inline">
                          <input type="radio" name="tipo_de_papel" title="En esta modalidad la cara de la hoja es dividida en 2 secciones, en una de ellas se imprime la guía y en la otra se imprime el contrato de la guía. Requiere impresora Láser." checked value="1" @if(old('tipo_de_papel')) checked @endif> Papel Bond Tamaño Carta
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="tipo_de_papel" title="Papel Etiqueta Térmica de 6 x 4 pulgadas En esta modalidad la guía se imprime en la Etiqueta térmica (no se imprime contrato de la guía) Requiere impresora Térmica." value="2" @if(old('tipo_de_papel')) checked @endif> Papel Etiqueta Térmica de 6 x 4 pulgadas
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="tipo_de_papel" title="Plantilla Tamaño Oficio de 4 Etiquetas En esta modalidad la plantilla está dividida en 4 cuadrantes donde cada uno es una" value="3" @if(old('tipo_de_papel')) checked @endif> Plantilla Tamaño Oficio de 4 Etiquetas
                        </label>
                      </div>

                      <hr>
                        <p>Información Adicional</p>
                      <hr>

                      <div class="form-group @if(count($errors->get('cuadrante_de_impresion')) > 0) {{ 'has-error' }} @endif">
                        <label class="col-sm-2 control-label">Cuadrante de inicio de impresión de guías</label>
                        <label style="color:#FF6400">Solo aplica cuando Tipo de papel para impresión de la guía sea "Plantilla Tamaño Oficio de 4 Etiquetas"</label><br>
                        <label class="radio-inline">
                          <input type="radio" name="cuadrante_de_impresion" value="1" @if(old('cuadrante_de_impresion')) checked @endif> Primer Cuadrante
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="cuadrante_de_impresion" value="2" @if(old('cuadrante_de_impresion')) checked @endif> Segundo Cuadrante
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="cuadrante_de_impresion" value="3" @if(old('cuadrante_de_impresion')) checked @endif> Tercer Cuadrante
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="cuadrante_de_impresion" value="4" @if(old('cuadrante_de_impresion')) checked @endif> Cuarto Cuadrante
                        </label>
                      </div>

                      <div class="form-group @if(count($errors->get('informacion_adicional_del_envio')) > 0) {{ 'has-error' }} @endif">
                        <label class="col-sm-2 control-label">Información adicional del Envío</label>
                        <div class="col-sm-10">
                          <input
                                type      ="text"
                                class     ="form-control"
                                name      ="informacion_adicional_del_envio"
                                minlength ="1"
                                maxlength ="25"
                                title     ="Información adicional del Envío, maximo 25 caracteres."
                                value     ="{{ old('informacion_adicional_del_envio', '') }}"  >
                        </div>
                      </div>

                      <div class="form-group @if(count($errors->get('descripcion_del_contenido')) > 0) {{ 'has-error' }} @endif">
                        <label class="col-sm-2 control-label">Descripcion del contenido</label>
                        <div class="col-sm-10">
                          <input
                                type      ="text"
                                class     ="form-control"
                                name      ="descripcion_del_contenido"
                                minlength ="1"
                                maxlength ="100"
                                title     ="Descripcion del contenido, maximo 100 caracteres."
                                value     ="{{ old('descripcion_del_contenido', '') }}"  >
                        </div>
                      </div>

                      <div class="form-group @if(count($errors->get('centro_de_costos')) > 0) {{ 'has-error' }} @endif">
                        <label class="col-sm-2 control-label">Centro de Costos</label>
                        <div class="col-sm-10">
                          <input
                                type      ="text"
                                class     ="form-control"
                                name      ="centro_de_costos"
                                minlength ="1"
                                maxlength ="10"
                                title     ="Centro de Costos del cliente al que pertenece el envío, maximo 10 caracteres."
                                value     ="{{ old('centro_de_costos', '') }}"  >
                        </div>
                      </div>

                      <div class="form-group @if(count($errors->get('pais_de_envio')) > 0) {{ 'has-error' }} @endif">
                        <label class="col-sm-2 control-label">Pais de Envío</label>
                        <div class="col-sm-10">
                          <select name="pais_de_envio" class="form-control">
                              <option value="MX" selected="" >México</option>
                              {{-- <option value="EU">Estados Unidos</option> --}}
                          </select>
                        </div>
                      </div>

                      <div class="form-group @if(count($errors->get('referencia')) > 0) {{ 'has-error' }} @endif">
                        <label class="col-sm-2 control-label">Referencia</label>
                        <div class="col-sm-10">
                          <input
                                type      ="text"
                                class     ="form-control"
                                name      ="referencia"
                                minlength ="1"
                                maxlength ="25"
                                title     ="Texto que sirve como referencia adicional para que Estafeta ubique mas fácilmente el domicilio destino."
                                value     ="{{ old('referencia', '') }}"  >
                        </div>
                      </div>

                      <hr>
                        <p>Destinatario</p> <p style="color:red;font-size: 12px;">Campos Requeridos *</p>
                      <hr>

                      <div class="form-group @if(count($errors->get('direccion_destinatario')) > 0) {{ 'has-error' }} @endif">
                        <label class="col-sm-2 control-label">Linea 1 de Dirección <z style="color:red;">*</z></label>
                        <div class="col-sm-10">
                          <input
                                type      ="text"
                                class     ="form-control"
                                name      ="direccion_destinatario"
                                minlength ="1"
                                maxlength ="30"
                                value     ="{{ old('direccion_destinatario', '') }}"
                                required >
                        </div>
                      </div>

                      <div class="form-group @if(count($errors->get('colonia_destinatario')) > 0) {{ 'has-error' }} @endif">
                        <label class="col-sm-2 control-label">Colonia <z style="color:red;">*</z></label>
                        <div class="col-sm-10">
                          <input
                                type      ="text"
                                class     ="form-control"
                                name      ="colonia_destinatario"
                                minlength ="1"
                                maxlength ="50"
                                value     ="{{ old('colonia_destinatario', '') }}"
                                required >
                        </div>
                      </div>

                      <div class="form-group @if(count($errors->get('ciudad_destinatario')) > 0) {{ 'has-error' }} @endif">
                        <label class="col-sm-2 control-label">Ciudad <z style="color:red;">*</z></label>
                        <div class="col-sm-10">
                          <input
                                type      ="text"
                                class     ="form-control"
                                name      ="ciudad_destinatario"
                                minlength ="1"
                                maxlength ="50"
                                value     ="{{ old('ciudad_destinatario', '') }}"
                                required >
                        </div>
                      </div>


                      <div class="form-group @if(count($errors->get('codigo_postal_destinatario')) > 0) {{ 'has-error' }} @endif">
                        <label class="col-sm-2 control-label">Código Postal Destino <z style="color:red;">*</z></label>
                        <div class="col-sm-10">
                          <input
                                type       ="text"
                                class      ="form-control"
                                name       ="codigo_postal_destinatario"
                                onkeypress ='return event.charCode >= 48 && event.charCode <= 57'
                                minlength  ="5"
                                maxlength  ="5"
                                value      ="{{ old('codigo_postal_destinatario', '') }}"
                                required >
                        </div>
                      </div>

                      <div class="form-group @if(count($errors->get('estado_destinatario')) > 0) {{ 'has-error' }} @endif">
                        <label class="col-sm-2 control-label">Estado <z style="color:red;">*</z></label>
                        <div class="col-sm-10">
                          <select name="estado_destinatario" class="form-control" required>
                                <option value="">Seleccione ...</option>
                              @foreach($states AS $state)
                                <option value="{{ $state->description }}" {{ (old("estado_destinatario") == $state->description ? "selected":"") }}>{{ $state->description }}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="form-group @if(count($errors->get('contacto_destinatario')) > 0) {{ 'has-error' }} @endif">
                        <label class="col-sm-2 control-label">Nombre del Contacto <z style="color:red;">*</z></label>
                        <div class="col-sm-10">
                          <input
                                type      ="text"
                                class     ="form-control"
                                name      ="contacto_destinatario"
                                minlength ="1"
                                maxlength ="30"
                                value     ="{{ old('contacto_destinatario', '') }}"
                                required >
                        </div>
                      </div>

                      <div class="form-group @if(count($errors->get('razon_social_destinatario')) > 0) {{ 'has-error' }} @endif">
                        <label class="col-sm-2 control-label">Razón Social <z style="color:red;">*</z></label>
                        <div class="col-sm-10">
                          <input
                                type      ="text"
                                class     ="form-control"
                                name      ="razon_social_destinatario"
                                minlength ="1"
                                maxlength ="50"
                                value     ="{{ old('razon_social_destinatario', '') }}"
                                required >
                        </div>
                      </div>

                      <div class="form-group @if(count($errors->get('numero_cliente_destinatario')) > 0) {{ 'has-error' }} @endif">
                        <label class="col-sm-2 control-label">No. de Cliente Estafeta <z style="color:red;">*</z></label>
                        <div class="col-sm-10">
                          <input
                                type      ="text"
                                class     ="form-control"
                                name      ="numero_cliente_destinatario"
                                minlength ="7"
                                maxlength ="7"
                                title     ="Número de Cliente Estafeta. Puede tratarse del Número de Cliente origen o destino."
                                value     ="0000000"
                                readonly
                                required >
                        </div>
                      </div>


                      <div class="form-group @if(count($errors->get('direccion2_destinatario')) > 0) {{ 'has-error' }} @endif">
                        <label class="col-sm-2 control-label">Linea 2 de Dirección</label>
                        <div class="col-sm-10">
                          <input
                                type      ="text"
                                class     ="form-control"
                                name      ="direccion2_destinatario"
                                minlength ="1"
                                maxlength ="30"
                                value     ="{{ old('direccion2_destinatario', '') }}">
                        </div>
                      </div>


                      <div class="form-group @if(count($errors->get('telefono_destinatario')) > 0) {{ 'has-error' }} @endif">
                        <label class="col-sm-2 control-label">Teléfono de Contacto</label>
                        <div class="col-sm-10">
                          <input
                                type      ="text"
                                class     ="form-control"
                                name      ="telefono_destinatario"
                                minlength ="1"
                                maxlength ="30"
                                value     ="{{ old('telefono_destinatario', '') }}">
                        </div>
                      </div>

                      <div class="form-group @if(count($errors->get('celular_destinatario')) > 0) {{ 'has-error' }} @endif">
                        <label class="col-sm-2 control-label">Celular de Contacto</label>
                        <div class="col-sm-10">
                          <input
                                type      ="text"
                                class     ="form-control"
                                name      ="celular_destinatario"
                                minlength ="1"
                                maxlength ="20"
                                value     ="{{ old('celular_destinatario', '') }}">
                        </div>
                      </div>







                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-primary btn-block">Generar Guía</button>
                        </div>
                      </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
