<?php

namespace App\Models;

use App\Events\InvoiceCreatedEvent;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    const STATUS_NEW = 0;
    const STATUS_SUCCESS = 1;
    const STATUS_FAIL = 2;

    protected $table = 'invoices';

    protected $fillable = [
        'amount',
        'status',
        'transaction_code',
        'payment_code',
    ];

    public function invoicable()
    {
        return $this->morphTo();
    }

    public function markAsStatus($status)
    {
        $this->forceFill(['status' => $status])->save();

        return $this;
    }

    public function scopeByStatus($query, $status)
    {
        return $query->where('status', '=', $status);
    }

    public function hasSuccessFullyPaid()
    {
        return $this->status == self::STATUS_SUCCESS;
    }

    public function hasFailed()
    {
        return $this->status == self::STATUS_FAIL;
    }

    public function setTransactionCode($code)
    {
        $this->forceFill(['transaction_code' => $code])->save();

        return $this;
    }

    public function setPaymentCode($code)
    {
        $this->forceFill(['payment_code' => $code])->save();

        return $this;
    }
}
