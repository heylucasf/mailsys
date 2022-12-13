<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    protected $table = 'email';
    protected $fillable = [
        'titulo',
        'email_destinatario',
        'email_remetente',
        'assunto',
    ];

    public $timestamps = true;
}
