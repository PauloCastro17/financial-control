<?php

namespace App\Models;

use Database\Factories\TransactionFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use \Carbon\Carbon;

#[Fillable(['type', 'amount', 'category_id', 'description', 'transaction_date', 'user_id', 'status'])]
class Transaction extends Model
{
    /** @use HasFactory<TransactionFactory> */
    use HasFactory;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'transaction_date' => 'datetime',
        ];
    }

    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category() :BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getInitialDateAttribute(): ?string
    {
        if (!$this->transaction_date) {
            return null;
        }

        return $this->transaction_date
            ->locale('pt_BR')
            ->translatedFormat('d M Y');
    }

    public function getFinalDateAttribute(): ?string
    {
        if (!$this->transaction_date) {
            return null;
        }

        return $this->transaction_date
            ->locale('pt_BR')
            ->translatedFormat('H:i');
    }

    public function getTypeTransactionAttribute(): string
    {
        return match ($this->type) {
            'INCOME' => 'Entrada',
            'EXPENSE' => 'Saída',
            default => 'Desconecido',
        };
    }

    public function getStatusTransactionAttribute(): string
    {
        return match ($this->status) {
            'COMPLETED', 'PAID' => 'Pago',
            'PENDING' => 'Pendente',
            'UNPAID' => 'Não Pago',
            default => 'Erro',
        };
    }

    public function getStatusColorTransactionAttribute(): string
    {
        return match ($this->status) {
            'COMPLETED', 'PAID' => "bg-[#1A3131] text-[#29A073]",
            'PENDING' => "bg-[#30292F] text-[#F2994A]",
            default => "bg-[#442121] text-[#E5363D]"
        };
    }

    public function getTypeColorTransactionAttribute(): string
    {
        return match ($this->type) {
            'INCOME' => 'text-[#29A073]',
            'EXPENSE' => 'text-[#E5363D]',
            default => 'Desconecido',
        };
    }
}
