<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = "barang";
    

    protected $fillable = [
        'nama', 'merk', 'spesifikasi', 'lokasi', 'kategori_id'
    ];


    public function kategori(){
    	return $this->belongsTo(Kategori::class);
    }
}
