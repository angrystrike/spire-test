<?php
require_once 'core/init.php';


// if (Input::exists()) {
//     $validate = new Validation();
   
//     $validation = $validate->check($_POST, array(
//         'name'  => array(
//             'required'  => true,
//             'min'       => 2,
//             'max'       => 50
//             ),
//         'username'  => array(
//             'required'  => true,
//             'min'       => 2,
//             'max'       => 20
//             ),
//         'current_password'  => array(
//             'required'  => true,
//             'min'       => 6,
//             'verify'     => 'password'
//             ),
//         'new_password'  => array(
//             'optional'  => true,
//             'min'       => 6,
//             'bind'      => 'confirm_new_password'
//             ),

//         'confirm_new_password' => array(
//             'optional'  => true,
//             'min'       => 6,
//             'match'   => 'new_password',
//             'bind' => 'new_password',
//             ),
//         ));

//     if ($validation->passed())
//     {

//         $addressId = Input::get('id');
//         $address = new Address($addressId);

//          try
//             {
//                 $address->update(array(
//                     'name'  => Input::get('name'),
//                     'username'  => Input::get('username'),
//                 ));
//             }
//          catch(Exception $e)
//             {
//                 die($e->getMessage());
//             }
//         }
//         echo(json_encode({
//             "data" =>  'Success!!!',
//         }))
//     else
//     {
//         echo(json_encode({
//             "html" =>  '<div class="alert alert-danger"><strong></strong>' . cleaner($validation->error()) . '</div>',
//         }))
//     }


   
// }