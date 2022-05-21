<?php
//в качестве примера используется массив не противоречащий образцу из задания
$array = [
    'SKLAD1' => [
        'EDA' => [
            'TOVAR1' => [
                'NAME' => 'Chipsi',
                'PRICE' => 100
            ],
            'TOVAR2' => [
                'NAME' => 'Ryba',
                'PRICE' => 300
            ],
            'TOVAR3' => [
                'NAME' => 'Tomati',
                'PRICE' => 213
            ]
        ],
        'NAPITKI' => [
            'TOVAR35' => [
                'NAME' => 'Cola',
                'PRICE' => 75
            ],
            'TOVAR36' => [
                'NAME' => 'Voda',
                'PRICE' => 21
            ],
            'TOVAR37' => [
                'NAME' => 'Sok',
                'PRICE' => 45
            ]
        ],
        'DESERTI' => [
            'TOVAR45' => [
                'NAME' => 'Morozhennoe',
                'PRICE' => 120
            ],
            'TOVAR46' => [
                'NAME' => 'Tort',
                'PRICE' => 300
            ],
            'TOVAR47' => [
                'NAME' => 'Tiramisu',
                'PRICE' => 253
            ],
            'TOVAR48' => [
                'NAME' => 'Marzipan',
                'PRICE' => 410
            ]
        ]
    ],
    'SKLAD2' => [
        'EDA' => [
            'TOVAR66' => [
                'NAME' => 'MyasoGovyadia',
                'PRICE' => 500
            ],
            'TOVAR67' => [
                'NAME' => 'Apple',
                'PRICE' => 230
            ],
        ]
    ],
    'SKLAD3' => [
        'EDA' => [
            'TOVAR95' => [
                'NAME' => 'MyasoKurica',
                'PRICE' => 431
            ],
            'TOVAR96' => [
                'NAME' => 'MorskayaRyba',
                'PRICE' => 420
            ],
            'TOVAR97' => [
                'NAME' => 'Yaica',
                'PRICE' => 412
            ]
        ]
    ]
];

//определяется функция сортировки данного массива по цене 'PRICE'
function sort_my_array(&$arr, $order = SORT_DESC)
{
    if (!($order === SORT_DESC || $order === SORT_ASC))
        throw new Exception('некорректный аргумент порядка сортировки');
    foreach ($arr as $sKey => $sklad) {
        foreach ($sklad as $dKey => $division) {
            $array = array();
            foreach ($division as $item)
                $array[] = $item['PRICE'];
            array_multisort($array, $order, $arr[$sKey][$dKey]);
        }
    }
}

//вызывается выше определенная функция, в качестве первого аргумента используется вышеопределенный массив, в качестве второго - способ сортировки (по возрастанию)
sort_my_array($array, SORT_ASC);
//выводится отсортированный массив
print_r($array);
/*
Вывод массива

Array
(
    [SKLAD1] => Array
        (
            [EDA] => Array
                (
                    [TOVAR1] => Array
                        (
                            [NAME] => Chipsi
                            [PRICE] => 100
                        )

                    [TOVAR3] => Array
                        (
                            [NAME] => Tomati
                            [PRICE] => 213
                        )

                    [TOVAR2] => Array
                        (
                            [NAME] => Ryba
                            [PRICE] => 300
                        )

                )

            [NAPITKI] => Array
                (
                    [TOVAR36] => Array
                        (
                            [NAME] => Voda
                            [PRICE] => 21
                        )

                    [TOVAR37] => Array
                        (
                            [NAME] => Sok
                            [PRICE] => 45
                        )

                    [TOVAR35] => Array
                        (
                            [NAME] => Cola
                            [PRICE] => 75
                        )

                )

            [DESERTI] => Array
                (
                    [TOVAR45] => Array
                        (
                            [NAME] => Morozhennoe
                            [PRICE] => 120
                        )

                    [TOVAR47] => Array
                        (
                            [NAME] => Tiramisu
                            [PRICE] => 253
                        )

                    [TOVAR46] => Array
                        (
                            [NAME] => Tort
                            [PRICE] => 300
                        )

                    [TOVAR48] => Array
                        (
                            [NAME] => Marcipan
                            [PRICE] => 410
                        )

                )

        )

    [SKLAD2] => Array
        (
            [EDA] => Array
                (
                    [TOVAR67] => Array
                        (
                            [NAME] => Apple
                            [PRICE] => 230
                        )

                    [TOVAR66] => Array
                        (
                            [NAME] => Meat
                            [PRICE] => 500
                        )

                )

        )

    [SKLAD3] => Array
        (
            [EDA] => Array
                (
                    [TOVAR97] => Array
                        (
                            [NAME] => Yaica
                            [PRICE] => 412
                        )

                    [TOVAR96] => Array
                        (
                            [NAME] => MorskayaRyba
                            [PRICE] => 420
                        )

                    [TOVAR95] => Array
                        (
                            [NAME] => Myaso
                            [PRICE] => 431
                        )

                )

        )

)
*/