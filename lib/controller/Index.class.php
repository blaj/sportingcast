<?php
class controller_Index extends _Controller
{
    protected $layout;
    protected $model;

    function __construct()
    {
        $this->layout = new _View('default/layout/index.phtml');
        $this->model = new model_Match();
    }

    function index()
    {
        $view = new _View('default/index.phtml');
        $view->data = $this->model->getItems();
        $this->layout->main = $view;
        return $this->layout;
    }

    function match() {
        if (empty($_GET['id'])) self::http404();
        $data = $this->model->getItem(array('id' => $_GET['id']));

        if (empty($data[0])) self::http404();
        self::$config['title'][] = $data[0]->title;

        $view = new _View('default/match.phtml');
        $view->data = $data;
        $this->layout->main = $view;

        return $this->layout;
    }

    function contact()
    {
        self::$config['title'][] = 'Kontakt';

        $view = new _View('default/contact.phtml');
        $this->layout->main = $view;

        return $this->layout;
    }

    function terms()
    {
        self::$config['title'][] = 'Regulamin';

        $view = new _View('default/terms.phtml');
        $this->layout->main = $view;

        return $this->layout;
    }
}
