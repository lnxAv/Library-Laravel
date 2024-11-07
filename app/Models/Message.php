<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    public $fillable = [
        "nom" => '',
        "email" => '',
        "subject" => '',
        "message" => '',
    ];
    protected $guarded = [
        "id" => '',
    ];

    public function __construct($id, $obj){
        info($id);
        $this->guarded = [
            "id" => $id,
        ];
        $this->fillable = [
            "nom" => $obj['nom'],
            "email" => $obj['email'],
            "subject" => $obj['subject'],
            "message" => $obj['message'],
        ];
    }

    public function toArray()
    {
        return [
            "id" => $this->guarded['id'],
            "nom" => $this->fillable['nom'],
            "email" => $this->fillable['email'],
            "subject" => $this->fillable['subject'],
            "message" => $this->fillable['message'],
        ];
    }
}
