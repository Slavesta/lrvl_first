<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; // helper для образования SLAGa ниже

class Category extends Model
{
  // Mass assigned
  protected $fillable = ['title', 'slug', 'parent_id', 'published', 'created_by', 'modified_by'];
  // Mutators = преобразователи SLAGa + дата + дефис вместо пробелов
  public function setSlugAttribute($value) {
    $this->attributes['slug'] = Str::slug( mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
  }
  // Get children category
  public function children() {
    return $this->hasMany(self::class, 'parent_id');
  }
  // Polymorphic relation with articles
  public function articles()
  {
    return $this->morphedByMany('App\Article', 'categoryable');
  }
  // Отображаем в панель состояния
  public function scopelastCategories($query, $count)
  {
    return $query->orderBy('created_at', 'desc')->take($count)->get();
  }
}
