<?php

namespace App\Http\Controllers;

use App\Label;
use App\State;
use App\Estafeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class LabelController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        return view('label.create', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $reglas =   [
                        'contenido_del_envio'             => 'required|min:1|max:25|alpha_dash',
                        'forma_de_entrega'                => 'required',
                        'numero_de_etiquetas'             => 'required|numeric|min:1|max:70',
                        'numero_de_oficina'               => 'required|digits_between:3,3|numeric',
                        'codigo_postal_destino'           => 'required|digits_between:5,5|numeric',
                        'tipo_de_envio'                   => 'required|digits_between:1,4|numeric',
                        'tipo_de_servicio'                => 'required|digits_between:2,2|numeric',
                        'peso_del_envio'                  => 'required|between:0.5,99.00',
                        'tipo_de_papel'                   => 'required|numeric|min:1|max:3',

                        'direccion_destinatario'          => 'required|min:1|max:30|alpha_dash',
                        'colonia_destinatario'            => 'required|regex:/^[\pL\s\.\-]+$/u|between:1,50',
                        'ciudad_destinatario'             => 'required|min:1|max:50|alpha_dash',
                        'codigo_postal_destinatario'      => 'required|digits_between:5,5|numeric',
                        'estado_destinatario'             => 'required|regex:/^[\pL\s\.\-]+$/u',
                        'contacto_destinatario'           => 'required|regex:/^[\pL\s\.\-]+$/u|min:1|max:30',
                        'razon_social_destinatario'       => 'required|regex:/^[\pL\s\.\-]+$/u|between:1,50',
                        'numero_cliente_destinatario'     => 'required|digits_between:7,7|numeric',

                    ];

        $this->validate($request, $reglas);

        if (!empty($request->input('informacion_adicional_del_envio'))){
             $this->validate($request, [ 'informacion_adicional_del_envio' => 'regex:/^[\pL\s\.\-]+$/u|between:1,25' ]);
        }

        if (!empty($request->input('descripcion_del_contenido'))){
             $this->validate($request, [ 'descripcion_del_contenido'       => 'regex:/^[\pL\s\.\-]+$/u|between:1,100']);
        }

        if (!empty($request->input('centro_de_costos'))){
             $this->validate($request, [ 'centro_de_costos'                => 'string|between:1,10']);
        }

        if (!empty($request->input('pais_de_envio'))){
             $this->validate($request, [ 'pais_de_envio'                   => 'regex:/^[\pL\s\.\-]+$/u|between:2,2']);
        }

        if (!empty($request->input('referencia'))){
             $this->validate($request, [ 'referencia'                      => 'regex:/^[\pL\s\.\-]+$/u|between:1,25']);
        }

        if (!empty($request->input('cuadrante_de_impresion'))){
             $this->validate($request, [ 'cuadrante_de_impresion'          => 'required_if:tipo_de_papel,==,3']);
        }

        if (!empty($request->input('direccion2_destinatario'))){
             $this->validate($request, [ 'direccion2_destinatario'         => 'regex:/^[\pL\s\.\-]+$/u|between:1,30']);
        }

        if (!empty($request->input('telefono_destinatario'))){
             $this->validate($request, [ 'telefono_destinatario'           => 'string|between:1,30']);
        }

        if (!empty($request->input('celular_destinatario'))){
             $this->validate($request, [ 'celular_destinatario'            => 'string|between:1,20']);
        }

        $obj_info = Estafeta::crear_guia($request);
        session()->flash('pdf_info', $obj_info);
        return view('label.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function show(Label $label)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function edit(Label $label)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Label $label)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function destroy(Label $label)
    {
        //
    }
}
