<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 16/10/16
 * Time: 19:59
 */
namespace App\Domains\Sales;

interface SalesRepositoryInterface
{
    public function index();

    public function data_table();

    public function all();

    public function findRegister($id);


    public function create($status);

    public function store($request);

    public function edit($compact = []);

    public function update($request);

    public function duplicate();

    public function updateShipp($request);

    public function updatediscount($request);

    public function destroy();

    public function addItem($request);

    public function destroyItem();

    public function exportpdf($id);
}