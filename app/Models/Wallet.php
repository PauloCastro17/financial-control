<?php

namespace App\Models;

use Database\Factories\WalletFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['user_id', 'name', 'balance', 'type'])]
class Wallet extends Model
{
    /** @use HasFactory<WalletFactory>> */
    use HasFactory;

    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function transactions() : HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function getTypeDifferentAttribute() : string
    {
        return match ($this->type) {
            'INVESTMENT' => 'Investimentos',
            'CASH' => 'Dinheiro',
            'BANK' => 'Banco',
            default => 'Desconecido',
        };
    }

    public function getInitialDateAttribute(): ?string
    {
        if (!$this->created_at) {
            return null;
        }

        return $this->created_at
            ->locale('pt_BR')
            ->translatedFormat('d M Y');
    }

    public function getFinalDateAttribute(): ?string
    {
        if (!$this->created_at) {
            return null;
        }

        return $this->created_at
            ->locale('pt_BR')
            ->translatedFormat('H:i');
    }
}
