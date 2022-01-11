var ShowUsers = () => {
    $.ajax({
      type: "GET",
      url: "query/showUsers.php",
      data: {},
      success: function (data) {
        var new_data = JSON.parse(data).usersObj;
        if(new_data != null){
        console.log(new_data);
        new_data.forEach((element, index) => {
          $("#tbody").append(`
          <tr>
            <th scope="row">${++index}</th>
              <td>${element.userName}</td>
              <td>${element.firstName} ${element.lastName}</td>
              <td>${element.role}</td>
          </tr>
          `);
        });
        }
        table =$("#tableUsers").DataTable();
      },
    });
  };
  $(document).ready(function(){
    
   ShowUsers();
  
  });