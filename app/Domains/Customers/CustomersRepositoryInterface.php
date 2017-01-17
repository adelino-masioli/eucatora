<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 16/10/16
 * Time: 19:59
 */
namespace App\Domains\Customers;

interface CustomersRepositoryInterface
{
    public function index();
    public function data_table();
    public function all();
    public function selectCustomers();
    public function findRegister($id);
    public function auto_complete();
    public function combo();
    public function create($status);
    public function store($request);
    public function edit($compact=[]);
    public function update($request);
    public function destroy();
}