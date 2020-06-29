<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assesment;
use Response;
use Validator;
use Illuminate\Support\Facades\DB;

class AssesmentController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
     $validator= Validator::make ($request->all(),[
     'nombre_usuario'=>'required',
     'comentario'=>'required',
      ]);
    if($validator->fails()){
      return  Response::json(array('errors'=> $validator->getMessageBag()->toarray()));  
     }else{
         
    

         $res= Assesment::where('assesment.nombre_usuario','=',$request->nombre_usuario)->get();
      

              if(sizeof($res)==0){
                 $assesment= new Assesment();
            $assesment->nombre_usuario =$request->nombre_usuario;
            $assesment->comentario =$request->comentario;
            $assesment->save();
      return response()->json($assesment);

              }else{
               return response()->json(['errors'=>'nombre de usuario ya   esta registrado']);
              }





                 
            






    
   
  }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
      
  $validator= Validator::make ($request->all(),[
    'id'=>'required',
   
      ]);

    
    if($validator->fails()){
      return  Response::json(array('errors'=> $validator->getMessageBag()->toarray()));  
     }else{
            $data = Assesment::find($request->id);
            if($data==null){
                return response()->json(['errors'=>' no exite ningun registro con el id']);
            }else{    
     $assesment = Assesment::select('nombre_usuario','comentario','created_at','updated_at')->where('assesment.id','=',$request->id)->get();
             return response()->json(['assesment' => $assesment]);

        }            
      

     
     }
       

    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
     $validator= Validator::make ($request->all(),[
      'comentario'=>'required',
      'id'=>'required',
       
    ]);
if($validator->fails()){
      return  Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
      
  }
  else{

    $data = Assesment::find($request->id);
            if($data==null){
                return response()->json(['errors'=>' no exite ningun registro con el id, imposible actualizar']);
            }else{

     $assesment = Assesment::findOrFail($request->id);
        $assesment->comentario =$request->comentario;
        $assesment->save();
     return response()->json($assesment);
            }

  }

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       
 $validator= Validator::make ($request->all(),[
     'id'=>'required',
   
      ]);

   
    if($validator->fails()){
      return  Response::json(array('errors'=> $validator->getMessageBag()->toarray()));  
     }


else{

    $data = Assesment::find($request->id);
            if($data==null){
                return response()->json(['errors'=>' no exite ningun registro con el id, imposible eliminar']);
            }else{
 $assesment=Assesment::find($request->id)->delete();

 $respuesta = array('id' => $request->id );
 return response()->json(['errors'=>' eliminado con exito']);;
            }

   
}
        //
    }
}
