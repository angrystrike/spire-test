<?php require_once 'start.php'; ?>

<?php
$address = new Address();

try {
    $address->create(
        array(
            'address_line_1' => $_POST['address1'],
            'address_line_2' => $_POST['address2'],
            'city' => $_POST['city'],
            'state' => $_POST['state'],
            'zipcode' => $_POST['zipcode']
        )
    );

    echo json_encode(array(
        'success' => true,
        'data' => 'Address saved successfully!'
    ));
} 
catch (Exception $ex) {
    echo json_encode(array(
        'success' => false,
        'data' => 'Error: ' . $ex
    ));
}