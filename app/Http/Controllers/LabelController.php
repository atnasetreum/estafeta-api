<?php

namespace App\Http\Controllers;

use App\User;
use App\Label;
use App\State;
use App\Estafeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

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
                        'numero_de_etiquetas'             => 'required|integer|min:1|max:70',
                        'numero_de_oficina'               => 'required|digits_between:3,3|integer',
                        'codigo_postal_destino'           => 'required|digits_between:5,5|integer',
                        'tipo_de_envio'                   => 'required|integer|in:1,4',
                        'tipo_de_servicio'                => 'required|digits_between:2,2|numeric',
                        'peso_del_envio'                  => 'required|between:0.5,99.00',
                        'tipo_de_papel'                   => 'required|in:1,2,3',

                        'direccion_destinatario'          => 'required|min:1|max:30|alpha_dash',
                        'colonia_destinatario'            => 'required|regex:/^[\pL\s\.\-]+$/u|between:1,50',
                        'ciudad_destinatario'             => 'required|min:1|max:50|alpha_dash',
                        'codigo_postal_destinatario'      => 'required|digits_between:5,5|integer',
                        'estado_destinatario'             => 'required|regex:/^[\pL\s\.\-]+$/u',
                        'contacto_destinatario'           => 'required|regex:/^[\pL\s\.\-]+$/u|min:1|max:30',
                        'razon_social_destinatario'       => 'required|regex:/^[\pL\s\.\-]+$/u|between:1,50',
                        'numero_cliente_destinatario'     => 'required|digits_between:7,7|numeric',

                    ];

        // cuando no es una peticion por la vista, para el manejo de la API
        if(!$this->es_web($request)){
            $validaciones = Validator::make($request->all(), $reglas);
            if ($validaciones->fails()) { return response()->json(['error'=>true, 'data'=>$validaciones->errors()], 400 ); }
        }else{
            $this->validate($request, $reglas);
        }



        if (!empty($request->input('informacion_adicional_del_envio'))){
            $reglas = ['informacion_adicional_del_envio'=>'regex:/^[\pL\s\.\-]+$/u|between:1,25'];
            if(!$this->es_web($request)){
                $validaciones = Validator::make($request->all(), $reglas);
                if ($validaciones->fails()) { return response()->json(['error'=>true, 'data'=>$validaciones->errors()], 400 ); }
            }else{
                $this->validate($request, $reglas);
            }
        }

        if (!empty($request->input('descripcion_del_contenido'))){
            $reglas = ['descripcion_del_contenido'=>'regex:/^[\pL\s\.\-]+$/u|between:1,100'];
            if(!$this->es_web($request)){
                $validaciones = Validator::make($request->all(), $reglas);
                if ($validaciones->fails()) { return response()->json(['error'=>true, 'data'=>$validaciones->errors()], 400 ); }
            }else{
                $this->validate($request, $reglas);
            }
        }

        if (!empty($request->input('centro_de_costos'))){
            $reglas = ['centro_de_costos'=>'string|between:1,10'];
            if(!$this->es_web($request)){
                $validaciones = Validator::make($request->all(), $reglas);
                if ($validaciones->fails()) { return response()->json(['error'=>true, 'data'=>$validaciones->errors()], 400 ); }
            }else{
                $this->validate($request, $reglas);
            }
        }

        if (!empty($request->input('pais_de_envio'))){
            $reglas = ['pais_de_envio'=>'regex:/^[\pL\s\.\-]+$/u|between:2,2'];
            if(!$this->es_web($request)){
                $validaciones = Validator::make($request->all(), $reglas);
                if ($validaciones->fails()) { return response()->json(['error'=>true, 'data'=>$validaciones->errors()], 400 ); }
            }else{
                $this->validate($request, $reglas);
            }
        }

        if (!empty($request->input('referencia'))){
            $reglas = ['referencia'=>'regex:/^[\pL\s\.\-]+$/u|between:1,25'];
            if(!$this->es_web($request)){
                $validaciones = Validator::make($request->all(), $reglas);
                if ($validaciones->fails()) { return response()->json(['error'=>true, 'data'=>$validaciones->errors()], 400 ); }
            }else{
                $this->validate($request, $reglas);
            }
        }

        if (!empty($request->input('cuadrante_de_impresion'))){
            $reglas = ['cuadrante_de_impresion'=>'required_if:tipo_de_papel,==,3|in:1,2,3,4'];
            if(!$this->es_web($request)){
                $validaciones = Validator::make($request->all(), $reglas);
                if ($validaciones->fails()) { return response()->json(['error'=>true, 'data'=>$validaciones->errors()], 400 ); }
            }else{
                $this->validate($request, $reglas);
            }
        }

        if (!empty($request->input('direccion2_destinatario'))){
            $reglas = ['direccion2_destinatario'=>'regex:/^[\pL\s\.\-]+$/u|between:1,30'];
            if(!$this->es_web($request)){
                $validaciones = Validator::make($request->all(), $reglas);
                if ($validaciones->fails()) { return response()->json(['error'=>true, 'data'=>$validaciones->errors()], 400 ); }
            }else{
                $this->validate($request, $reglas);
            }
        }

        if (!empty($request->input('telefono_destinatario'))){
            $reglas = [ 'telefono_destinatario'           => 'string|between:1,30'];
            if(!$this->es_web($request)){
                $validaciones = Validator::make($request->all(), $reglas);
                if ($validaciones->fails()) { return response()->json(['error'=>true, 'data'=>$validaciones->errors()], 400 ); }
            }else{
                $this->validate($request, $reglas);
            }
        }

        if (!empty($request->input('celular_destinatario'))){
            $reglas = [ 'celular_destinatario'            => 'string|between:1,20'];
            if(!$this->es_web($request)){
                $validaciones = Validator::make($request->all(), $reglas);
                if ($validaciones->fails()) { return response()->json(['error'=>true, 'data'=>$validaciones->errors()], 400 ); }
            }else{
                $this->validate($request, $reglas);
            }
        }

        if(!$this->es_web($request)){
            $validaciones = Validator::make($request->all(), ['id_usuario'=>'required|integer|min:1']);
            if ($validaciones->fails()) { return response()->json(['error'=>true, 'data'=>$validaciones->errors()], 400 ); }

            $validaciones = Validator::make($request->all(), ['user'=>'required|email']);
            if ($validaciones->fails()) { return response()->json(['error'=>true, 'data'=>$validaciones->errors()], 400 ); }

            $validaciones = Validator::make($request->all(), ['password'=>'required']);
            if ($validaciones->fails()) { return response()->json(['error'=>true, 'data'=>$validaciones->errors()], 400 ); }
            $user     = User::where('email',$request->user) -> first();
            if($user->password != $request->password){
                return response()->json(['error'=>true, 'data'=>'Credenciales Incorrectas.'], 400 );
            }
        }


        $obj_info = Estafeta::crear_guia($request);

        if(!$this->es_web($request)){// respuesta API
            $api_response                 = new \stdClass();
            $api_response->numero_de_guia = $obj_info->numero_de_guia;
            $api_response->ruta_PDF       = env('APP_URL')."/guiasPDF/".$obj_info->nombre_del_PDF;
            return response()->json(['error'=>false, 'data'=> $api_response], 200);
        }// respuesta API
        else{
            session()->flash('pdf_info', $obj_info);
            $labels = $this->labels_all();
            return view('label.index', compact('labels'));
        }

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
