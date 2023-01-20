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
            let response = JSON.parse(xmlhttp.responseText);
            if (response.success) {
                let successBlock = document.getElementById('success-message');
                successBlock.classList.remove('d-none');
                successBlock.innerText = response.data;
            }
            if (xmlhttp.responseText == 'false') { alert(xmlhttp.responseText); }
        }
    }
    xmlhttp.onerror = function () { console.error(xmlhttp.statusText); }

    xmlhttp.open("POST", 'save_address.php', true);
    if (activeTab === 'original') {
        xmlhttp.send(orginalData);
    } else {
        xmlhttp.send(modifiedData);
    }
}

function addressSubmit() {
    const address1 = document.getElementById('address_line_1').value || 'Suite 6100';
    const address2 = document.getElementById('address_line_2').value || '185 Berry St';
    const city = document.getElementById('city').value ||  'San Francisco';
    const state = document.getElementById('state').value ||  'CA';
    const zipcode = document.getElementById('zipcode').value ||  '94556';

    var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            console.log('xmlhttp.responseText', xmlhttp.responseText);
            let response = JSON.parse(xmlhttp.responseText)
            console.log('response', response);
            let errorBlock = document.getElementById('error-message');
            let data = response.data;
            if (response.success) {
                $('#checkAddressModal').modal('show');
                const originalAddress = `Address Line 1: ${address1} \nAddress Line 2: ${address2}\nCity: ${city}\nState: ${state}\nZipcode: ${zipcode}`;
                const modifiedAddress = `Address Line 1: ${data.address1} \nAddress Line 2: ${data.address2}\nCity: ${data.city}\nState: ${data.state}\nZipcode: ${data.zip5}`;
                
                console.log('DATA', data);
                modifiedData.append('address1', data.address1);
                modifiedData.append('address2', data.address2);
                modifiedData.append('city', data.city);
                modifiedData.append('state', data.state);
                modifiedData.append('zipcode', data.zip5);
                
                document.getElementById('originalAddress').value = originalAddress;
                document.getElementById('modifiedAddress').value = modifiedAddress;
                console.log('response', response);
                errorBlock.classList.add('d-none');
            } else {
                console.log('xmlhttp.responseText', response.data);
                errorBlock.innerHTML = response.data;
                errorBlock.classList.remove('d-none');
            }
        }
    }
    xmlhttp.onerror = function () { console.error(xmlhttp.statusText); }
    xmlhttp.open('POST', 'format_address.php', true);

    orginalData.append('address1', address1);
    orginalData.append('address2', address2);
    orginalData.append('city', city);
    orginalData.append('state', state);
    orginalData.append('zipcode', zipcode);

    xmlhttp.send(orginalData);
}