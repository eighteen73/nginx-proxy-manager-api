<?php

namespace Eighteen73\NginxProxyManager\Models;

abstract class BaseModel {

    public ?int $id = null;

    public static function fromArray(array $data): static
    {
        $model = new static;

        foreach ($data as $k => $v) {
            if (property_exists($model, $k)) {
                $model->{$k} = $v;
            }
        }

        return $model;
    }
}