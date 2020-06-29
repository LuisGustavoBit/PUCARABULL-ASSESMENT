<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     }
     else{
            $assesment= new Assesment();
            $assesment->nombre_usuario =$request->nombre_usuario;
            $assesment->comentario =$request->comentario;
            $assesment->save();
      return response()->json($assesment);
   
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

     $id = $request->id;
    if($validator->fails()){
      return  Response::json(array('errors'=> $validator->getMessageBag()->toarray()));  
     }else{
        $assesment= Assesment::findOrFail($request->id);
      return response()->json($assesment);

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

     $assesment = Assesment::findOrFail($request->id);
        $assesment->comentario =$request->comentario;
        $assesment->save();
     return response()->json($assesment);
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
    $assesment=Assesment::find($request->id)->delete();

 $respuesta = array('id' => $request->id );
 return response()->json($respuesta);
}
        //
    }
}
