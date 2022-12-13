<?php

namespace App\Http\Controllers;

use App\Jobs\EmailJob;
use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmailController extends Controller
{
    public function index(){
        $getall = DB::table('email')->orderByDesc('updated_at')->get()->take(6);
        return view ('index', ['titulo' => 'Sistema de Email', 'emails' => $getall]);
    }

    public function enviar(Request $request){

        $request->validate([
            'titulo' => 'required',
            'email_remetente' => 'required|email',
            'email_destinatario' => 'required|email',
            'assunto' => 'required'
        ]);

        $getenvio = $request->all();
        Email::create($getenvio);
        EmailJob::dispatch($getenvio);

        return redirect()->route('email.index');
    }
}
