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
        "createdAt" => '',
    ];

    public function __construct($id, $createdAt, $obj){
        $this->guarded = [
            "id" => $id,
            "createdAt" => $createdAt,
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
            "createdAt" => $this->guarded['createdAt'],
            "nom" => $this->fillable['nom'],
            "email" => $this->fillable['email'],
            "subject" => $this->fillable['subject'],
            "message" => $this->fillable['message'],
        ];
    }
}
