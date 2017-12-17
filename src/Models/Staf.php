<?php namespace Bantenprov\Staf\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * The StafModel class.
 *
 * @package Bantenprov\Staf
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class Staf extends Model
{
    use SoftDeletes;

    protected $table = 'staf';

    public $timestamps = true;

    protected $dates = ['deleted_at'];

    protected $fillable = ['user_id', 'opd_id','full_name'];

    protected $visible = ['user_id','opd_id','full_name'];

    protected $hidden = ['deteled_at'];


    /* relation table */

    public function getUser()
    {
        return $this->hasOne('App\User','id','user_id');
    }

    public function getOpd()
    {
        return $this->hasOne('App\Opd','id','opd_id');
    }

    public function getProject()
    {
        return $this->belongsTo(config('staf.models.project'),'id','opd_id');
    }

    public function getMember()
    {
        return $this->belongsTo(config('staf.models.member'),'member_id','id');
    }
}
