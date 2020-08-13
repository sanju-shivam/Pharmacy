<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Nicolaslopezj\Searchable\SearchableTrait;
use App\State;
class Product extends Model
{
    use SearchableTrait;

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        // 'columns' => [
        //     'products.title' => 10,
        //     'products.text' => 10,
        //     'products.molecules' => 10,
        //     'products.brand_id' => 10,
        // ],
        // 'joins' => [
        //     'brands' => ['brands_id', 'brand.id'],
        // ],
    ];

    protected $fillable = [
        'image',
        'title',
        'link',
        'text',
        'brand_id',
        'category_id',
        'location'
    ];

    //Table Names
    protected $table = 'products';

    // // User relation
    // public function user(){
    //     return $this->belongsTo(User::class);
    // }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function state()
    {
        return $this->belongsTo('App\State');
    }

    public function statees($id)
    {
        return(State::where('id','=',$id)->first()->name);
    }
}
