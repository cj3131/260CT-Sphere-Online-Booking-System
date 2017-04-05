// Change Iframe sources to change to different pages
function change_stf_page(plink)
{
    document.getElementById('box').src = plink;
}

// Disable/Enable certain elements when user imputs employee ID for deletion
function disableIN()
{
    document.getElementById('inputID').style.display = "none";
    document.getElementById('staff_table2').style.display = "block";
    document.getElementById('delButton').style.display = "inline";
    document.getElementById('cancelButton').style.display = "inline";
}

// Make request to controller
function makeRequest(rType,rSelect)
{
    var rData = getFormData(rSelect);
    
    $.ajax({        
        type: rType, // what type of request POST or GET
        url: 'Staff_Controller.php', 
        data: {"selector": rSelect,"data": rData}, // Data to pass to the php file
        dataType: 'json', // what kind of data to expect to get back 
        success: function(data)
        {
            // To Display employeeList it adds table entry to html page
            if(rSelect == "empList")
            {
                for(var i in data)
                {
                    addTableEntry(data[i].staff_id,data[i].first_name,data[i].last_name,data[i].role,data[i].salary,"staff_table");
                }
            }
            // Add single entry for Deletion form
            else if(rSelect == "selEmp")
            {
                for(var i in data)
                {
                    addTableEntry(data[i].staff_id,data[i].first_name,data[i].last_name,data[i].role,data[i].salary,"staff_table2");
                }
            }
        }
    });
}

// Data formating, preparation to send it to PHP file, encodes it to JSON format
function getFormData(rSelect)
{
    // Constructing it as a String
    var data = '{';
    var json_data;
    
    if(rSelect == "delEmp" || rSelect == "selEmp")
    {
        data += '"ID": "' + document.getElementById("ID").value + '"';
    }
    else if(rSelect == "addEmp")
    {
        data += '"Fname": "' + document.getElementById("Fname").value + '"';
        data += ', "Lname": "' + document.getElementById("Lname").value + '"';
        data += ', "Role": "' + document.getElementById("Role").value + '"';
        data += ', "Salary": "' + document.getElementById("Salary").value + '"';
    }
    
    data += '}';
    
    // Parse it to make JSON
    json_data = JSON.parse(data);
    
    return json_data;
}

// Javascript function to add entrys to HTML table
function addTableEntry(id,fname,lname,role,salary,tableID)
{
    var table = document.getElementById(tableID);
    var row = table.insertRow(table.rows.length);
    
    for(i = 0; i < 5; i++)
    {
        var tmpCell = row.insertCell(i)
        switch(i)
        {
            case 0:
                tmpCell.innerHTML = id;
                break;
            case 1:
                tmpCell.innerHTML = fname;
                break;
            case 2:
                tmpCell.innerHTML = lname;
                break;
            case 3:
                tmpCell.innerHTML = role;
                break;
            case 4:
                tmpCell.innerHTML = salary;
                break;
        } 
    }
}