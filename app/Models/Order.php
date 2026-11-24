<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    public const STATUSES = [
        'pending' => 'Pending',
        'paid' => 'Paid',
        'shipped' => 'Shipped',
        'completed' => 'Completed',
        'cancelled' => 'Cancelled',
    ];

    public const STATUS_COLORS = [
        'pending' => 'warning',
        'paid' => 'info',
        'shipped' => 'primary',
        'completed' => 'success',
        'cancelled' => 'danger',
    ];

    public const PAYMENT_METHODS = [
        'cod' => 'Cash on delivery',
        'bank_transfer' => 'Bank transfer',
    ];

    protected $fillable = [
        'number', 'status', 'payment_method',
        'first_name', 'last_name', 'email', 'phone',
        'country', 'city', 'address', 'postcode', 'notes',
        'subtotal', 'shipping', 'total',
    ];

    protected function casts(): array
    {
        return [
            'subtotal' => 'decimal:2',
            'shipping' => 'decimal:2',
            'total' => 'decimal:2',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (Order $order) {
            $order->number ??= static::generateNumber();
        });

        // Отмена заказа возвращает товары на склад. Из «cancelled» обратно не переводим:
        // повторное списание могло бы увести остаток в минус.
        static::updating(function (Order $order) {
            if (! $order->isDirty('status')) {
                return;
            }

            if ($order->getOriginal('status') === 'cancelled') {
                throw new \DomainException('A cancelled order cannot be reopened.');
            }

            if ($order->status === 'cancelled') {
                foreach ($order->items()->whereNotNull('product_id')->get() as $item) {
                    Product::whereKey($item->product_id)->increment('stock', $item->qty);
                }
            }
        });
    }

    public static function generateNumber(): string
    {
        do {
            $number = 'GB-' . strtoupper(Str::random(6));
        } while (static::where('number', $number)->exists());

        return $number;
    }

    public function getRouteKeyName(): string
    {
        return 'number';
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function paymentMethodLabel(): string
    {
        return self::PAYMENT_METHODS[$this->payment_method] ?? $this->payment_method;
    }
}
