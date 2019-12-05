<?php

namespace App\Filters\Property;

use Illuminate\Database\Eloquent\Model;

class PropertyFilter extends Model
{
    /**
     * Set the Property's name
     *
     * @param  string $value
     * @return string
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = sanitizeString($value)[0];
    }

    /**
     * Set the Property's name
     *
     * @param  string $value
     * @return string
     */
    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = in_array($value, ['for_rent', 'for_sale']) ? $value : 'for_sale';
    }

    /**
     * Set the Property's Place Id
     *
     * @param  int $value
     * @return int
     */
    public function setPlaceIdAttribute($value)
    {
        $this->attributes['place_id'] = sanitizeInteger($value)[0];
    }

    /**
     * Set the Property's Type Id
     *
     * @param  int $value
     * @return int
     */
    public function setTypeIdAttribute($value)
    {
        $this->attributes['type_id'] = sanitizeInteger($value)[0];
    }

    /**
     * Set the Property's address
     *
     * @param  string $value
     * @return string
     */
    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = sanitizeString($value)[0];
    }

    /**
     * Set the Property's payment_way
     *
     * @param  string $value
     * @return string
     */
    public function setPaymentWayAttribute($value)
    {
        $this->attributes['payment_way'] = in_array($value, ['cach', 'installment']) ? $value : 'cach';
    }

    /**
     * Set the Property's measure Id
     *
     * @param  int $value
     * @return int
     */
    public function setMeasureIdAttribute($value)
    {
        $this->attributes['measure_id'] = sanitizeInteger($value)[0];
    }

    /**
     * Set the Property's area
     *
     * @param  int $value
     * @return int
     */
    public function setAreaAttribute($value)
    {
        $this->attributes['area'] = sanitizeInteger($value)[0];
    }

    /**
     * Set the Property's phone
     *
     * @param  string $value
     * @return string
     */
    public function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = sanitizeString($value)[0];
    }

    /**
     * Set the Property's discription
     *
     * @param  string $value
     * @return string
     */
    public function setDiscriptionAttribute($value)
    {
        $this->attributes['discription'] = sanitizeString($value)[0];
    }

    /**
     * Set the Property's services
     *
     * @param  string $value
     * @return string
     */
    public function setServicesAttribute($value)
    {
        $this->attributes['services'] = sanitizeString($value)[0];
    }

    /**
     * Set the Property's attaches
     *
     * @param  string $value
     * @return string
     */
    public function setAttachesAttribute($value)
    {
        $this->attributes['attaches'] = sanitizeString($value)[0];
    }

    /**
     * Set the Property's notes
     *
     * @param  string $value
     * @return string
     */
    public function setNotesAttribute($value)
    {
        $this->attributes['notes'] = sanitizeString($value)[0];
    }
}