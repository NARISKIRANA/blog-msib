<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Uuids;

class Kategori extends Model
{
    use HasFactory, softDeletes, Uuids;

    protected $table ="kategori";
    protected $fillable =['deskripsi'];
}
