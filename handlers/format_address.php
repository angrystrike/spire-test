<?php

require_once '../models/USPS.php';

echo USPS::formatAddress($_POST);
// require_once '../core/Input.php';
// require_once '../core/Input.php';

// if (Input::exists()) {
//     $validate = new Validation();

//     $validation = $validate->check($_POST, array(
//         'address1'  => array(
//             'required'  => true,
//             'min'       => 2,
//             'max'       => 100
//         ),
//         'address2'  => array(
//             'required'  => true,
//             'min'       => 2,
//             'max'       => 100
//         ),
//         'city'      => array(
//             'required'  => true,
//             'min'       => 2,
//             'max'       => 100
//         ),
//         'state'  => array(
//             'required'  => true,
//             'min'       => 2,
//             'max'       => 100
//         ),
//         'zipcode' => array(
//             'required'  => true,
//             'min'       => 2,
//             'max'       => 100
//         ),
//     ));

//     if ($validation->passed()) {
//         echo USPS::formatAddress($_POST);
//     } else {
//         echo cleaner($validation->error());
//     }
// }