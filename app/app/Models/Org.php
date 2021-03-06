<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Uuids;

class Org extends Model
{
    use Uuids;
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    protected $guarded = [];

    protected $fillable = [
        'name',
        'business_name',
        'business_reg_no',
        'logo_url',
        'description',
        'business_reg_no',
        'industry_id',
        'address_line_1',
        'address_line_2',
        'city_town',
        'country',
        'state_region',
        'postal_zip',
        'phone',
        'email',
        'website'
    ];

    public function industry()
    {
      return $this->belongsTo('App\Models\Industry');
    }

    public function users()
    {
      return $this->belongsToMany('App\Models\User', 'org_users')->withPivot('status')->withTimestamps();
    }

    public function employees()
    {
      return $this->hasMany('App\Models\Employee', 'org_id');
    }

    public function bankAccounts()
    {
        return $this->hasMany('App\Models\OrgBankAccount', 'org_id');
    }

    public function contacts()
    {
      return $this->hasMany('App\Models\Contact');
    }

    public function inventory()
    {
        return $this->hasMany('App\Models\SalePurchaseItem');
    }

    public function invoiceSettings()
    {
        return $this->hasOne('App\Models\OrgInvoiceSetting');
    }

    /**
     * @return Model|mixed|null|static
     */
    public function getAdmin()
    {
        return $this->users()->whereHas('roles', function ($query) {
            $query->where('name', '=', 'org_admin');
        })->first();
    }

    /**
     * @param string $name
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getUsersByRole(string $name)
    {
        return $this->users()->whereHas('orgRoles', function ($query) use ($name) {
            $query->where('name', '=', $name);
        })->get();
    }
}
