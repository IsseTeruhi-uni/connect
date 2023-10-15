<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assist extends Model
{
  use HasFactory;

  // アプリケーション側でcreateなどできない値を記述する
  // 🔽 以下の処理を記述

  protected $guarded = [
    'id',
    'created_at',
  ];
  public static function getAllOrderByCreated_at()
  {
    return self::orderBy('created_at', 'desc')->get();
  }
}