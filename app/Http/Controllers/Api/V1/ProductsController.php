<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Http\Requests\Api\CreateProductRequest;
use App\Http\Requests\Api\UpdateProductRequest;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;


    /**
     * ProductsController constructor.
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function options()
    {
        $options = $this->productRepository->options();

        return response()->success($options);
    }

    public function create(CreateProductRequest $request)
    {
        $data = $request->all();

        $product = $this->productRepository->create($data, $request->user());

        return response()->success(['product' => $product]);
    }

    public function delete(int $id)
    {
        $result = $this->productRepository->delete($id);

        if (!$result) {
            return response()->error(500, ['deleted' => false]);
        }

        return response()->success(['deleted' => true]);
    }

    public function update($id, UpdateProductRequest $request)
    {

        $data = $request->all();

        $product = $this->productRepository->update($id, $data);

        if($product){
            return response()->success(['product' => $product]);
        }

        return response()->error(500, ['updated' => false]);
    }

    public function get(Request $request)
    {
        $params = $request->all();

        $products = $this->productRepository->get($params);

        if($products && count($products) > 0){
            return response()->success(['products' => $products]);
        }

        return response()->error(404, ['No results']);
    }

    public function getById($id)
    {
        $product = $this->productRepository->getById($id);

        if($product){
            return response()->success(['product' => $product]);
        }

        return response()->error(404, ['Product not found']);
    }
}
