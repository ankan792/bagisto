<?php

namespace Webkul\Customer\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Webkul\Customer\Database\Factories\CustomerGroupFactory;
use Webkul\Customer\Contracts\CustomerGroup as CustomerGroupContract;

class CustomerGroup extends Model implements CustomerGroupContract
{

    use HasFactory;

    protected $table = 'customer_groups';

    protected $fillable = [
        'name',
        'code',
        'is_user_defined',
    ];

    /**
     * Get the customers for this group.
     */
    public function customers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CustomerProxy::modelClass());
    }

    /**
     * Create a new factory instance for the model
     *
     * @return CustomerGroupFactory
     */
    protected static function newFactory(): CustomerGroupFactory
    {
        return CustomerGroupFactory::new();
    }

}
