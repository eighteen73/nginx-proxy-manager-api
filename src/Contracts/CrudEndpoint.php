<?php

namespace Eighteen73\NginxProxyManager\Contracts;

interface CrudEndpoint
{
    public function create(array $data): Model;

    public function read(int $id): Model;

    public function update(int $id, array $data): Model;

    public function delete(int $id): bool;

    public function list(): array;
}