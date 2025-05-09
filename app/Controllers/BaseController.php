<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use Config\ConfigConfig;
use App\Libraries\LibraryBreadcrumbs;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = ['html','form'];

    /**
     * @return void
     */
    var $breadcrumbs;
    var $config;
    var $session;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        $this->session = \Config\Services::session();
        $this->breadcrumbs = new LibraryBreadcrumbs();
        $this->addBreadcrumb('Home', base_url());
        $this->config = new ConfigConfig();
    }

    public function addBreadcrumb($label, $url = '#')
    {
        $this->breadcrumbs->push($label, $url);
    }

    public function renderView(string $view, array $data = [])
    {
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        return view($view, $data);
    }
}