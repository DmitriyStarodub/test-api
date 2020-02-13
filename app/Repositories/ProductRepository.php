<?php
/**
 * Created by PhpStorm.
 * User: Sopot
 * Date: 13.02.2020
 * Time: 01:26
 */

namespace App\Repositories;

use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Support\Collection;
use App\Models\Product;
use App\Models\User;
use App\Models\Currency;
use App\Models\Category;

class ProductRepository implements ProductRepositoryInterface
{

    /**
     * @return array
     */
    public function options(): array
    {
       $categories = Category::where('accepted', 1)->get();

       $currencies = Currency::where('accepted', 1)->get();

        return compact('categories', 'currencies');
    }

    /**
     * @param array $data
     * @return Product
     */
    public function create(array $data, User $current_user): Product
    {
        $product = new Product();

        $product->title = $data['title'];
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->currency_id = $data['currency_id'];
        $product->category_id = $data['category_id'];
        $product->user_id = $current_user->id;

        $product->save();

        return $product;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        try{
            $this->getById($id)->delete();
        }catch(\Exception $e){
            return false;
        }

        return true;
    }

    /**
     * @param array $data
     * @param int $id
     * @return Product
     */
    public function update($id, array $data): Product
    {
        $product = $this->getById($id);

        if($product) {
            $product->update($data);
        }

        return $product;
    }

    /**
     * @param array $params
     * @return Collection|null
     */
    public function get(array $params, array $with = []): ?Collection
    {
       return  $this->applyFilters($params)->with($with)->get();
    }

    /**
     * @param array $params
     * @return Product|null
     */
    public function getById(int $id, array $with = []): ?Product
    {
        return Product::where('id', $id)->with($with)->first();
    }

    /**
     * @param array $params
     * @return Builder
     */
    public function applyFilters(array $params)
    {
        $query = Product::query();

        return $query;
    }
}