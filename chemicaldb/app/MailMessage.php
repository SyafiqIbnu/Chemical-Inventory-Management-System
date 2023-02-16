<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailMessage extends Model {

    protected $table = 'mail_messages';
    protected $guarded = [];
    protected $fillable = ['id', 'module', 'name', 'mail_subject', 'mail_text', 'mail_variable', 'description', 'created_at', 'created_by', 'updated_at', 'updated_by'];

    public function setStatusIdAttribute($value) {
        if ($value == '') {
            $this->attributes['status_id'] = null;
        } else {
            $this->attributes['status_id'] = $value;
        }
    }

    public function setCreatedByAttribute($value) {
        if ($value == '') {
            $this->attributes['created_by'] = null;
        } else {
            $this->attributes['created_by'] = $value;
        }
    }

    public function setUpdatedByAttribute($value) {
        if ($value == '') {
            $this->attributes['updated_by'] = null;
        } else {
            $this->attributes['updated_by'] = $value;
        }
    }

}
