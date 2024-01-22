<?php 

        // require('function.php');
        // $personList = [
        //     [
        //         'name' => 'Maung Maung',
        //         'age' => 23
        //     ],
        //     [
        //         'name' => 'Maung Kyaw',
        //         'age' => 32
        //     ],
        //     [
        //         'name' => 'Zaw Ko',
        //         'age' => 33
        //     ]
        // ];

        $header = 'This is home page';

        
        // $filterList = array_filter($personList,function($personList){
        //     return $personList['name'] = 'Maung Maung';
        // }); 

        require view('index.view.php',[
            'header' => $header
        ]);