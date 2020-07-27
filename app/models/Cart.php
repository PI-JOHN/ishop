<?php


namespace app\models;


class Cart extends AppModel
{

    public function addToCart($product, $qty = 1, $mod = null)
    {
        $addToCart = [];
        $addToCart[$product->id] = [
            'qty' => $qty,
            'name' => $product->title,
            'price' => $product->price,
            'img' => ROOT .'/images/' . $product->img
        ];

    }
}