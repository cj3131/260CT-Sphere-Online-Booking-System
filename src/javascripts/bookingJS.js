function makeBookingRequest()
{
    var rData = getFormData();
    alert("heel");
    $.ajax({        
        type: 'POST',
        url: 'registerPHP.php',
        data: {"data": rData},
        dataType: 'json',      
        success: function(data)
        {
           alert("It went ok");
        }
    });
}

function getFormData()
{
    var data = '{';
    var json_data;
    
 
    
    data += '"first_name": "' + document.getElementById("first_name").value + '"';
    data += ', "surname": "' + document.getElementById("Surname").value + '"';
    data += ', "phoneNum": "' + document.getElementById("phoneNum").value + '"';
    data += ', "email": "' + document.getElementById("email").value + '"';
    data += ', "password": "' + document.getElementById("password").value + '"';
    data += ', "DoB": "' + document.getElementById("DoB").value + '"';
    data += ', "addLine1": "' + document.getElementById("addLine1").value + '"';
    data += ', "addLine2": "' + document.getElementById("addLine2").value + '"';
    data += ', "city": "' + document.getElementById("city").value + '"';
    data += ', "county": "' + document.getElementById("county").value + '"';
    data += ', "postcode": "' + document.getElementById("postcode").value + '"';
    
    
    data += '}';
    
    json_data = JSON.parse(data);
    
    return json_data;
}