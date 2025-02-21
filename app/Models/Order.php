<?php

namespace App\Models;

use App\Enums\Order\StatusEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getTotalPrice(): string
    {
        return number_format($this->total_price, 2, '.', '');
    }

    public function getProductPrice(): string
    {
        return number_format($this->product_price, 2, '.', '');
    }

    protected $guarded = false;

    protected $casts = [
      'status' => StatusEnum::class,
    ];

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => \Illuminate\Support\Carbon::create($value)->format('d.m.Y'),
        );
    }
}
