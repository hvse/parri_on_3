<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class CardsController extends Controller
{
    //
    /**
     * Method AddCard
     */
    function addCard(){

        $ENDPOINT = env('STAGING_URL')."/vpos/api/0.3/cards/new";
     
        $card_id = rand(99,9999);
        $user_id = 55553;//usuario para recuperar tarjetas

        $token = md5(env('PRIVATE_KEY') . $card_id . $user_id . "request_new_card") ;
        

        $data = array(
            'public_key' => env('PUBLIC_KEY'),
            'operation' => array(
                'token' => $token,
                'card_id' => $card_id,
                'user_id' => $user_id,
                'user_cell_phone' => '0981211030',
                'user_mail' => 'higiniosamaniego@gmail.com',
                'return_url' => 'http://micomercio.com/resultado/catastro', 
            )

        );

        try {

            $ch = curl_init($ENDPOINT);

            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
         
            if ($result === false) {
                throw new Exception(curl_error($ch));
            }

            curl_close($ch);

            $resultado = json_decode($result);

            if($resultado->status == 'success'){
                $codigo = $resultado->process_id;
                return view('cards/add_card',['codigo'=>$codigo]);    
            }else{
                return view('cards/add_card',['codigo'=>'error']);
            }         

        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    //
    /**
     * Method ListCard
     */
    function listCard(){

        $card_id = rand(99,9999);
        $user_id = 55553;//usuario para recuperar tarjetas

        $ENDPOINT = env('STAGING_URL')."/vpos/api/0.3/users/".$user_id."/cards";

        $token = md5(env('PRIVATE_KEY') . $user_id . "request_user_cards") ;
        
        $data = array(
            'public_key' => env('PUBLIC_KEY'),
            'operation' => array(
                'token' => $token,
                'extra_response_attribute' => ["cards.bancard_proccesed"], 
            )

        );

        try {

            $ch = curl_init($ENDPOINT);

            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
         
            if ($result === false) {
                throw new Exception(curl_error($ch));
            }

            curl_close($ch);

            $resultado = json_decode($result);

            if($resultado->status == 'success'){
                $cards = $resultado->cards;
                return view('cards/list_card',['cards'=>$cards]);    
            }else{
                return view('cards/list_card',['cards'=>'error']);
            }         

        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


        //
    /**
     * Method DeleteCard
     */
    function deleteCard($delete){

        $card_token = $delete;
        
        $user_id = 55553;//usuario para recuperar tarjetas

        $ENDPOINT = env('STAGING_URL')."/vpos/api/0.3/users/".$user_id."/cards";

        $token = md5(env('PRIVATE_KEY') . "delete_card" . $user_id . $card_token);
        
        $data = array(
            'public_key' => env('PUBLIC_KEY'),
            'operation' => array(
                'token' => $token,
                'alias_token' => $card_token, 
            )

        );

        try {

            $ch = curl_init($ENDPOINT);

            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
         
            if ($result === false) {
                throw new Exception(curl_error($ch));
            }

            curl_close($ch);

            $resultado = json_decode($result);
         
            if($resultado->status == 'success'){
                
                view('menu');  
            }else{
                return view('menu',['cards'=>'error']);
            }         

        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    /**
     * Method BuyTokenCard
     */
    function buyTokenCard($token){

        $token_alias = $token;

        $shop_process_id = rand(9999,99999);
        

        $ENDPOINT = env('STAGING_URL')."/vpos/api/0.3/charge";

        $amount = rand(999,9999);

        $monto_iva = $amount ;

        $monto_iva = (string)$monto_iva;

        $monto = (string)$amount;

        $token = md5(env('PRIVATE_KEY') . $shop_process_id . "charge" . $monto . '.00' . 'PYG' . $token_alias);
        
        $data = array(
            'public_key' => env('PUBLIC_KEY'),
            'operation' => array(
                'token' => $token,
                'shop_process_id' => $shop_process_id,
                'amount' => $amount.'.00',
                 'number_of_payments' => 1,
                'currency' => 'PYG',
                'additional_data' => '',
                'description' => 'pago con token alias',
                'alias_token' => $token_alias
            )

        );

        try {

            $ch = curl_init($ENDPOINT);

            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
         
            if ($result === false) {
                throw new Exception(curl_error($ch));
            }

            curl_close($ch);

            $resultado = json_decode($result);
            
            echo "<br>";
                print_r($resultado);
            echo "</br>";

            if($resultado->status == 'success'){
                
                view('menu');  
            }else{
                return view('menu',['cards'=>'error']);
            }         

        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
