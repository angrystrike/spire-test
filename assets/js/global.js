'use strict';


let orginalData = new FormData();
let modifiedData = new FormData();

function saveAddress() {
    const activeTab = document.querySelector('#pills-tab .active').getAttribute('data-tab');

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        console.log(xmlhttp.readyState);
        console.log(xmlhttp.status);
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            console.log(xmlhttp.responseText);
            if (xmlhttp.responseText == 'false'){ alert(xmlhttp.responseText); }
        }
    }
    xmlhttp.onerror = function () { console.error(xmlhttp.statusText); }

    xmlhttp.open("POST", 'handlers/save_address.php', true);
    if (activeTab === 'original') {
        xmlhttp.send(orginalData);
    } else {
        xmlhttp.send(modifiedData);
    }
}


function addressSubmit() {
    const address1 = 'Suite 6100';
    const address2 = '185 Berry St';
    const city = 'San Francisco';
    const state = 'CA';
    const zipcode = '94556';

    var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            console.log('xmlhttp.responseText', xmlhttp.responseText);
            let response = JSON.parse(xmlhttp.responseText)
            console.log('response', response);
            let errorBlock = document.getElementById('error-message');
            let data = response.data;
            $('#checkAddressModal').modal('show');
            // if (response.success) {
            //     $('#checkAddressModal').modal('show');
            //     const originalAddress = `Address Line 1: ${address1} \nAddress Line 2: ${address2}\nCity: ${city}\nState: ${state}\nZipcode: ${zipcode}`;
            //     const modifiedAddress = `Address Line 1: ${data.address1} \nAddress Line 2: ${data.address2}\nCity: ${data.city}\nState: ${data.state}\nZipcode: ${data.zip5}`;
            //     modifiedData.append('address1', data.address1);
            //     modifiedData.append('address2', data.address2);
            //     modifiedData.append('city', data.city);
            //     modifiedData.append('state', data.state);
            //     modifiedData.append('zipcode', data.zipcode);
                
            //     document.getElementById('originalAddress').value = originalAddress;
            //     document.getElementById('modifiedAddress').value = modifiedAddress;
            //     console.log('response', response);
            //     errorBlock.classList.add('d-none');
            // } else {
            //     console.log('xmlhttp.responseText', response.data);
            //     errorBlock.innerHTML = response.data;
            //     errorBlock.classList.remove('d-none');
            // }
            //console.log('123', $('#checkAddressModal'));

        }
    }
    xmlhttp.onerror = function () { console.error(xmlhttp.statusText); }
    //xmlhttp.open("GET", 'http://production.shippingapis.com/ShippingAPI.dll?API=Verify&XML='+xml, true);
    //xmlhttp.send();
    xmlhttp.open('POST', '/handlers/format_address.php', true);
    // xmlhttp.send({
    //     address1, address2, city, state, zipcode
    // });

    orginalData.append('address1', address1);
    orginalData.append('address2', address2);
    orginalData.append('city', city);
    orginalData.append('state', state);
    orginalData.append('zipcode', zipcode);
    xmlhttp.send(orginalData);

    // var xhr = new XMLHttpRequest();
    // // let xml = '<AddressValidateRequest USERID="955GOLDE1085"><AddressID="0"><Address1></Address1><Address2>6406 Ivy Lane</Address2><City>Greenbelt</City><State>MD</State><Zip5></Zip5><Zip4></Zip4></AddressID=></AddressValidateRequest>'
    // xmlhttp.open("GET", 'http://production.shippingapis.com/ShippingAPI.dll');
    // xmlhttp.send(orginalData);
}