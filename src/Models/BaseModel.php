<?php

namespace Eighteen73\NginxProxyManager\Models;

abstract class BaseModel {

    public static function fromArray(array $data): static
    {
        $host = new static;

        foreach ($data as $k => $v) {
            if (property_exists($host, $k)) {
                $host->{$k} = $v;
            }
        }
    }
}