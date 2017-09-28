<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        /*if($exception instanceof ValidationException){// validacion de los campos requridos en este caso url
            return $this->convertValidationExceptionToResponse($exception, $request);
        }// validacion de los campos requridos en este caso url

        if($exception instanceof ModelNotFoundException){// modelo no encontrado, o recurso no encontrado.
            $modelo = strtolower(class_basename($exception->getModel()));
            return response()->json(['error'=>"No existe ningun {$modelo} con el id especificado."], 404);
        }// modelo no encontrado, o recurso no encontrado.

        if($exception instanceof AuthenticationException){// controlar erro de token
            return response()->json(['error'=>"No autenticado."], 401);
        }// controlar erro de token

        if($exception instanceof AuthorizationException){// permiso denegado por permisos
            return response()->json(['error'=>"No posee permisos para ejecutar esta accion."], 403);
        }// permiso denegado por permisos

        if($exception instanceof NotFoundHttpException){// error 404 recurso no encontrado
            return response()->json(['error'=>"No se encontró la url especificada."], 404);
        }// error 404 recurso no encontrado

        if($exception instanceof MethodNotAllowedHttpException){// metodo de ruta no permitido
            return response()->json(['error'=>"El método especificado en la petición no es válido."], 405);
        }// metodo de ruta no permitido
        */
        if($exception instanceof HttpException){// controlar errores de modo general tipo http
            return response()->json(['error'=>$exception->getMessage()], $exception->getStatusCode());
        }// controlar errores de modo general tipo http

        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
    }

    /**
     * Create a response object from the given validation exception.
     *
     * @param  \Illuminate\Validation\ValidationException  $e
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    /*protected function convertValidationExceptionToResponse(ValidationException $e, $request)
    {
        $erros = $e->validator->errors()->getMessages();
        return response()->json(['error'=>$erros], 422);
    }*/
}
