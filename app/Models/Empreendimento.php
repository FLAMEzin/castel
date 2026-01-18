<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Empreendimento extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'descricao',
        'tipo',
        'area',
        'quartos',
        'cidade',
        'local_lat',
        'local_long',
        'valor',
        'destaque_home',
        'tags',
        'foto_capa',
        'foto_planta',
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
            'local_lat' => 'float',
            'local_long' => 'float',
            'valor' => 'float',
            'tags' => 'array',
        ];
    }

    public function fotos(): HasMany
    {
        return $this->hasMany(Foto::class);
    }
}
