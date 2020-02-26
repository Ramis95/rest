<?

return
    [
        '/login' =>
            [
                'controller' => 'UserController',
                'action' => 'login'
            ],
        '/logout' =>
            [
                'controller' => 'UserController',
                'action' => 'logout'
            ],
        '/' =>
            [
                'controller' => 'UserController',
                'action' => 'main'
            ],
//        '/parse_courses' =>
//        [
//            'controller' => 'Parser',
//            'action' => 'parse_course'
//        ]


    ];