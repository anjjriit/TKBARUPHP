<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

/**
 * App\Model\Giro
 *
 * @property integer $id
 * @property integer $bank_id
 * @property string $serial_number
 * @property string $effective_date
 * @property float $amount
 * @property string $printed_name
 * @property string $remarks
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $deleted_by
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Giro whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Giro whereBankId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Giro whereSerialNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Giro whereEffectiveDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Giro whereAmount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Giro wherePrintedName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Giro whereRemarks($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Giro whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Giro whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Giro whereDeletedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Giro whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Giro whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Giro whereDeletedAt($value)
 * @mixin \Eloquent
 */
class Giro extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $user = Auth::user();
            if ($user) {
                $model->created_by = $user->id;
                $model->updated_by = $user->id;
            }
        });

        static::updating(function ($model) {
            $user = Auth::user();
            if ($user) {
                $model->updated_by = $user->id;
            }
        });

        static::deleting(function ($model) {
            $user = Auth::user();
            if ($user) {
                $model->deleted_by = $user->id;
                $model->save();
            }
        });
    }
}
