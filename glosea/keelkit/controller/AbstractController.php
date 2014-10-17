<?php
namespace keelkit\controller;
abstract class AbstractController{
	protected $app;
	protected $req;
	protected $res;
	protected $rest;
	protected $params;
	protected $view;
	protected $beforeFilter;
	protected $afterFilter;
}