<?php

namespace App\Http\Controllers;

use App\Mail\email_confirm_message;
use App\Mail\email_read_message;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class Main extends Controller
{
    public function index(){
        return view('message-form');
    }

    public function init(Request $request){
        // verifica se a submissão foi um post
        if(!$request->isMethod('post')){
            return redirect()->route('home');
        }

        //validações
        $request->validate([
            'from' =>['required', 'email', 'max:50'],
            'to' =>['required', 'email', 'max:50'],
            'message' =>['required', 'max:250']
        ],[
            'from.required' =>'Email do destinatário é obrigatório',
            'to.required' =>'Email do remetente é obrigatório',
            'from.email' =>'Insira um email válido',
            'to.email' =>'Insira um email válido',
            'from.max' =>'O email deve conter no máximo 50 caracteres',
            'to.max' =>'O email deve conter no máximo 50 caracteres',
            'message.required' => 'Mensagem é obrigatória',
            'message.max' => 'Mensagem tem que ter no máximo 250 caracteres',
        ]);

        // Cria o hash (purl code)
        $purl = Str::random(32);
        
        // Manda as informações para o banco de dados
        $message = new Message();
        $message->send_from = $request->from;
        $message->send_to = $request->to;
        $message->message = $request->message;
        $message->purl_confirmation = $purl;
        $message->save();
        
        // Envia o email de confirmação para o usuário
        Mail::to($request->from)->send(new email_confirm_message($purl));

        // atualiza o banco com a data e hora do envio do email
        $message = Message::where('purl_confirmation', $purl)->first();
        $message->purl_confirmation_send = now();
        $message->save();

        // Mostrar a view que indica que a mensagem foi enviada
        $data = [
            'email_address' => $request->from
        ];
        return view('email-confirm-sent', $data);

    }

    public function confirm($purl){
        // Verifica se o purl existe
        if(!isset($purl)){
            return redirect()->route('home');
        }

        // verifica se o purl existe no banco de dados
        $message = Message::where('purl_confirmation', $purl)->first();
        
        // Verificar se há uma Mensagem e mostra uma view caso não
        if($message === null){
            return view('no-email');
        }

        $purl = Str::random(32);

        // remove o purl do banco de dados e adiciona o purl de confirmação
        $message->purl_read = $purl;
        $message->purl_read_send = now();
        $message->purl_confirmation = null;
        $message->save();

        // envia a mensagem para o destinatário
        Mail::to($message->send_to)->send(new email_read_message($purl));

        // retorna a view de confirmação de envio

    }

    public function read($purl){
        // Verifica se o purl existe
        if(!isset($purl)){
            return redirect()->route('home');
        }

        // verifica se o purl existe no banco de dados
        $message = Message::where('purl_read', $purl)->first();

        if($message === null){
            return view('no-email');
        }

        // remove o purl_read e salva a data de leitura da mensagem
        $read_at = now();
        $read_by = $message->to;
        $sender = $message->from;

        $message->purl_read = null;
        $message->message_readed = $read_at;
        $message->save();

        // envia email ao remetente confirmando a leitura do email
        Mail::to($sender)->send(new email_read_message($read_at, $read_by));

        // mostra a mensagem uma única vez
        return view('message', [
            'message' => $message->message,
            'email_from' => $message->send_from
        ]);

    }

}
