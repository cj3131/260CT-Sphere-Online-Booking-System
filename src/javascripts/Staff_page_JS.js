function change_stf_page(plink)
{
    document.getElementById('box').src = plink;
}

function getEmployeeList()
{
    $.ajax({        
        type:'GET',
        //url: 'getEmployee.php',
        url: 'Controller_test.php',
        data: {"selector" : "empList"},
        dataType: 'json',      
        success: function(data)
        {
            for(var i in data)
            {
                addTableEntry(data[i].staff_id,data[i].first_name,data[i].last_name,data[i].role,data[i].salary);
            }
        }
    });
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