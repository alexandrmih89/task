<?php

namespace Index;

use Phalcon\Http\Response;

class ErrorsController extends BaseController
{
    public function initialize()
    {
        $this->view->setLayout('index');
    }
    public function show404Action()
    {
        $this->page_title = 'Page not found';
        $this->meta_descr = 'Page not found';
        $this->meta_kw =    'Page not found';
        $this->meta_title = 'Page not found';

        $page = $this->router->getRewriteUri();
        $this->logger->error('Page ' . $page . ' not found' . "\r\n file: " . __FILE__ . ' line: ' . __LINE__);
        $this->response->setStatusCode(404, 'Not Found');
    }

    public function show500Action()
    {
        $this->view->setVars([
            'page_title' => T(ERR_INTERNAL_SERVER_ERROR),
        ]);
        $this->response->setStatusCode(500, 'Internal Server Error');
    }

}
