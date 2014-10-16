<?php

return array(
    'guest' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Guest',
        'bizRule' => null,
        'data' => null
    ),
    'viewer' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Viewer',
        'children' => array(
            'guest', // унаследуемся от гостя
        ),
        'bizRule' => null,
        'data' => null
    ),
    'operator' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Operator',
        'children' => array(
            'viewer',          // позволим модератору всё, что позволено пользователю
        ),
        'bizRule' => null,
        'data' => null
    ),
    'administrator' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Administrator',
        'children' => array(
            'operator',         // позволим админу всё, что позволено оператору
        ),
        'bizRule' => null,
        'data' => null
    ),
);