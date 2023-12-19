<?php 
require_once 'BaseModel.php';
abstract class BaseController extends BaseModel{
    abstract static public function index();
}
