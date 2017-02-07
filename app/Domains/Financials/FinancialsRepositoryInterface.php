<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 16/10/16
 * Time: 19:59
 */
namespace App\Domains\Financials;

interface FinancialsRepositoryInterface
{
    public function index();
    public function datatable();
    public function all();
    public function autocomplete();
    public function create();
    public function store($request);
    public function edit($compact=[]);
    public function update($request);
    public function destroy();
    public function duplicate();
    public function report();
    public function reportFilter();
    public function reportXls();
    public function reportPdf();
}