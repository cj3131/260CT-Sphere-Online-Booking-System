function change_stf_page(plink)
{
    document.getElementById('box').src = plink;
}

function disableIN()
{
    document.getElementById('inputID').style.display = "none";
    document.getElementById('staff_table2').style.display = "block";
    document.getElementById('delButton').style.display = "inline";
    document.getElementById('cancelButton').style.display = "inline";
}

function makeRequest(rType,rSelect)
{
    var rData = getFormData(rSelect);
    
    $.ajax({        
        type: rType,
        url: 'Staff_Controller.php',
        data: {"selector": rSelect,"data": rData},
        dataType: 'json',      
        success: function(data)
        {
            if(rSelect == "empList")
            {
                for(var i in data)
                {
                    addTableEntry(data[i].staff_id,data[i].first_name,data[i].last_name,data[i].role,data[i].salary,"staff_table");
                }
            }
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

function getFormData(rSelect)
{
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
    
    json_data = JSON.parse(data);
    
    return json_data;
}

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