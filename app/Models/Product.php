<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sku',
        'price',
        'is_archived',
        'category_id',
    ];

    // Приведение типов: в Symfony за это отвечали Doctrine-типы
    protected $casts = [
        'price'       => 'decimal:2',
        'is_archived' => 'boolean',
    ];

    // Владеющая сторона: #[ORM\ManyToOne(inversedBy: 'products')]
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}