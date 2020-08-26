<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LabelSebumi extends Model
{
    protected $table = 'tabel_label_sebumi';
    protected $primaryKey = 'id_label_sebumi';
    protected $fillable = ['label', 'sub_label', 'deskripsi', 'banner_label', 'gambar_label', 'icon_label', 'author', 'updater', 'status', 'slug'];
}
