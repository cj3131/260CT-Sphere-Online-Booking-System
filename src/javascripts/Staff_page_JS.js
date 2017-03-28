function change_stf_page(plink)
{
    document.getElementById('box').src = plink;
}

function makeRequest(rType,rSelect)
{
    var data = getFormData(rSelect);
    
    $.ajax({        
        type: rType,
        url: 'Controller_test.php',
        data: {"selector": rSelect,"data": data},
        dataType: 'json',      
        success: function(data)
        {
            if(rSelect == "empList")
            {
                for(var i in data)
                {
                    addTableEntry(data[i].staff_id,data[i].first_name,data[i].last_name,data[i].role,data[i].salary);
                }
            }
            
        }
    });
}

function getFormData(rSelect)
{
    var data = [];
    
    if(rSelect == "delEmp")
    {
        data.push(document.getElementById("ID").value);
    }
    else if(rSelect == "addEmp")
    {
        data.push(document.getElementById("Fname").value);
        data.push(document.getElementById("Lname").value);
        data.push(document.getElementById("Role").value);
        data.push(document.getElementById("Salary").value);
    }
    
    return data;
}

function addTableEntry(id,fname,lname,role,salary)
{
    var table = document.getElementById("staff_table");
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