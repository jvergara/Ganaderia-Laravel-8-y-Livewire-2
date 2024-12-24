<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use App\Models\OrdenesPaypal;



class PaypalController extends Controller
{
    public function paypal_inicio()
    {
        $monto = 50;
        //primero tenemos que pedir el token
       

        $responseToken=Http::withBasicAuth(env('PAYPAL_CLIENT_ID'), env('PAYPAL_CLIENT_SECRET'))
        ->asForm()
        ->post(
            env('PAYPAL_BASE_URI')."/v1/oauth2/token", 
            [
            'grant_type' => 'client_credentials'
            ]
            );

        //echo $responseToken->json()['access_token'] ;exit;
        $token=  $responseToken->json()['access_token'] ;
        $orden=OrdenesPaypal::create(
            [
                'token'=>$token,
                'orden'=>'' ,
                'nombre'=>'',
                'correo'=>'',
                'id_captura'=>'',
                'monto'=>$monto,
                'country_code'=>'',
                'estado'=>0,//0 iniciada 1 pagada 2 cancelada
                'fecha'=>date('Y-m-d H:i:s'),
                'paypal_request'=>''
            ]);
        $response = Http::withHeaders(
            [
                'Authorization' => "Bearer ".$token,
                'PayPal-Request-Id'=>"order_".$orden->id
            ]
        )->post(env('PAYPAL_BASE_URI')."/v2/checkout/orders",
        [
            'intent' => 'CAPTURE',
                'purchase_units' => [
                    0 => [
                        "reference_id"=> "reference_".$orden->id,
                        'amount' => [
                            'currency_code' => 'USD',
                            'value' => $monto,
                        ]
                    ]
                ],
                'payment_source' => [
                    'paypal'=>[
                        'experience_context'=>[
                            "payment_method_preference"=>"IMMEDIATE_PAYMENT_REQUIRED",
                            "payment_method_selected"=> "PAYPAL",
                            "brand_name"=> "Ideas_Chile",
                            "locale"=> "en-US",
                            "landing_page"=> "LOGIN",
                            "shipping_preference"=> "NO_SHIPPING",
                            "user_action"=> "PAY_NOW",
                            "return_url"=> "http://localhost/ganaderia/public/paypal/respuesta",
                            "cancel_url"=> "http://localhost/ganaderia/public/paypal/cancelado"
                        ]
                        
                    ]
                    
                ]
        ]);
        if($response->status()!=200)
        {
            /* die("error ".$response->status()); */

        }
        $ordenBd=OrdenesPaypal::find($orden->id);
        /* dd($response->json()); */

        $ordenBd->orden=$response->json()['id'];
        $ordenBd->save();
        return view('paypal.home', compact('orden', 'response'));
    }

    public function paypal_respuesta()
    {
        $id= $_GET['token'];
        $orden=OrdenesPaypal::where(['orden'=>$id ])->firstOrFail();
        $headers = [
            "Content-Type"  => "application/json",
        ];
        //Bearer arewrh9weh98
        $response = Http::withToken($orden->token)
                    ->withHeaders($headers)
                    ->send("POST", env('PAYPAL_BASE_URI')."/v2/checkout/orders/".$orden->orden."/capture");
        if(isset($response->json()['id']))
        {
            $orden->nombre=$response->json()['payment_source']['paypal']['name']['given_name']." ".$response->json()['payment_source']['paypal']['name']['surname'];
            $orden->correo=$response->json()['payment_source']['paypal']['email_address'];
            $orden->id_captura=$response->json()['purchase_units'][0]['payments']['captures'][0]['id'];
            $orden->country_code=$response->json()['payment_source']['paypal']['address']['country_code'];
            $orden->estado=1;
            
            $orden->save();
            $estado="ok";
        }else
        {
            $estado="error";
        }
        return view('paypal.respuesta', compact(  'estado', 'id'));
    }

    public function paypal_cancelado(Request $request){

        $id=$request->input('token');
        $orden=OrdenesPaypal::where(['orden'=>$id])->firstOrFail();
        $orden->estado=2;
        $orden->save();
        return view('paypal.cancelado', compact(  'id'));

    }

    //mostrar el listado de transacciones paypal
    public function index(){
        $transactions = OrdenesPaypal::all();
        return view('admin.transactions.index');
    }

    //abrir el form editar
    public function edit($id)
    {
        /* $this->authorize('author', $post); */
        $transaction = OrdenesPaypal::find($id);
        $estados     = OrdenesPaypal::orderBy('estado', 'ASC')->pluck('estado', 'id');
        /* dd($estados); */
        return view('admin.transactions.edit', compact('transaction', 'estados'));
    }


    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('author', $post);

        $post->update($request->all());

       /*  dd($post->category_id); */
        //si hay un req de una imagen la guarda en la carpeta
        if($request->file('file')){
            $url = Storage::put('img-posts', $request->file('file'));
            if($post->image){
                Storage::delete($post->image->url);
                $post->image->update([
                    'url' => $url,
                    'category_id' => $post->category_id
                ]);
            }else{
                $post->image()->create([
                    'url' => $url,
                    'category_id' => $post->category_id
                ]);
            }
        }
        //actualizar las etiquetas
        if($request->tags){
            $post->tags()->sync($request->tags);  /*attach*/
        }

        //elimina datos de cache
        Cache::flush();

        return redirect()->route('admin.posts.edit', $post)->with('info', 'El post ha sido actualizado');
    }

    public function destroy(){
        return 'destroy';
    }
}
