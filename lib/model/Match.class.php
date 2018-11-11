<?php
class model_Match extends _Model
{
    protected $sql = array(
        'getItems' => 'SELECT * FROM matches',
        'getItem' => 'SELECT * FROM matches WHERE id = :id'
    );
}
?>