'use strict';

function saveAddress() {
    console.log('saveAddress');
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange=function(){
        console.log(xmlhttp.readyState);
        console.log(xmlhttp.status);
        if(xmlhttp.readyState==4 && xmlhttp.status==200){
            console.log(xmlhttp.responseText);
            if(xmlhttp.responseText == 'false'){ alert(xmlhttp.responseText); }
        }
    }
    xmlhttp.onerror = function () { console.error(xmlhttp.statusText); }

    xmlhttp.open("POST", 'handlers/save_address.php', true);
    xmlhttp.send({ test: '123' });
}


function addressSubmit() {
    // const data = {
    //   address1: document.getElementById('address_line_1').value,
    //   address2: document.getElementById('address_line_2').value,
    //   city: document.getElementById('city').value,
    //   state: document.getElementById('state').value,
    //   zipcode: document.getElementById('zipcode').value,
    // }
    // var data = new FormData();
    // data.append('address1', document.getElementById('address_line_1').value);
    // data.append('address2', document.getElementById('address_line_2').value);
    // data.append('city', document.getElementById('city').value);
    // data.append('state', document.getElementById('state').value);
    // data.append('zipcode', document.getElementById('zipcode').value);
    const address1 = document.getElementById('address_line_1').value;
    const address2 = document.getElementById('address_line_2').value;
    const city = document.getElementById('city').value;
    const state = document.getElementById('state').value;
    const zipcode = document.getElementById('zipcode').value;
    var formData = new FormData();
    formData.append('API', 'Verify');
    let xml = '<AddressValidateRequest USERID="955GOLDE1085"><Address ID="0"><Address1>Suite 6100</Address1><Address2>185 Berry St</Address2><City>San Francisco</City><State>CA</State><Zip5>94556</Zip5><Zip4></Zip4></Address></AddressValidateRequest>';
    formData.append('XML', xml);
    var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onreadystatechange=function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            console.log('xmlhttp.responseText', xmlhttp.responseText);
            let response = JSON.parse(xmlhttp.responseText)
            console.log('response', response);
            let errorBlock = document.getElementById('error-message');
            let data = response.data;
            if (response.success) {
                $('#checkAddressModal').modal('show');
                const originalAddress = `Address Line 1: ${address1} \nAddress Line 2: ${address2}\nCity: ${city}\nState: ${state}\nZipcode: ${zipcode}`;
                const modifiedAddress = `Address Line 1: ${data.address1} \nAddress Line 2: ${data.address2}\nCity: ${data.city}\nState: ${data.state}\nZipcode: ${data.zip5}`;
                document.getElementById('originalAddress').value = originalAddress;
                document.getElementById('modifiedAddress').value = modifiedAddress;
                console.log('response', response);
                errorBlock.classList.add('d-none');
            } else {
                console.log('xmlhttp.responseText', response.data);
                errorBlock.innerHTML = response.data;
                errorBlock.classList.remove('d-none');
            }
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

    var data = new FormData();
    data.append('address1', address1);
    data.append('address2', address2);
    data.append('city', city);
    data.append('state', state);
    data.append('zipcode', zipcode);
    xmlhttp.send(data);

    // var xhr = new XMLHttpRequest();
    // // let xml = '<AddressValidateRequest USERID="955GOLDE1085"><AddressID="0"><Address1></Address1><Address2>6406 Ivy Lane</Address2><City>Greenbelt</City><State>MD</State><Zip5></Zip5><Zip4></Zip4></AddressID=></AddressValidateRequest>'
    // xmlhttp.open("GET", 'http://production.shippingapis.com/ShippingAPI.dll');
    // xmlhttp.send(formData);
}