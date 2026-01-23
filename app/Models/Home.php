<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'phone',
        'endereco',
        'whatsapp_business',
        'title',
        'sub_title',
        'horario_atendimento',
        'video_capa',
        'card_title',
        'card_text',
        'contato_text',
        'contato_phone',
        'contato_email',
        'contato_address',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'integer',
        ];
    }
}
