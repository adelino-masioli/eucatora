<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 16/10/16
 * Time: 19:59
 */
namespace App\Domains\Users;

interface UsersRepositoryInterface
{
    public function combo();
    public function store($request);
    public function update($request);
    public function destroy($id);
}