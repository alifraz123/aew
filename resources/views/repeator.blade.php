<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repeator Form Design</title>
  
    
</head>
<body>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Birth</th>
      <th scope="col">Age</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><input type="text" name="name[]" class="form-control" placeholder="enter name"></td>
      <td><input type="text" name="birth[]" class="form-control" placeholder="enter birth"></td>
      <td><input type="text" name="age[]" class="form-control" placeholder="enter age"></td>
      <td><button class="btn btn-info addRow">+</button></td>
    </tr>
   
  </tbody>
</table>

<input type="submit" onclick="sendMultipleData()">



<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $('tbody').on('click','.addRow',function(){
        var tr = "<tr>"+
      "<td><input type='text'  name='name[]' class='form-control' placeholder='enter name'></td>"+
      "<td><input type='text' name='birth[]' class='form-control' placeholder='enter birth'></td>"+
      "<td><input type='text' name='age[]' class='form-control' placeholder='enter age'></td>"+
      "<th> <a href='javascript:void(0)' class='btn btn-danger deleteRow'>delete</a> </th>"+
    "</tr>";
    $('tbody').append(tr);
    });
    $('tbody').on('click','.deleteRow',function(){
       
    $(this).parent().parent().remove();
    });

function sendMultipleData(){

    var name = document.getElementsByName('name[]');
    var birth = document.getElementsByName('birth[]');
    var age = document.getElementsByName('age[]');
var obj;
obj=[];
for(var a = 0;a<name.length;a++){
    var name1 = name[a].value;
    var birth1 = birth[a].value;
    var age1 = age[a].value;
    // console.log(name1 +'-'+birth1+'-'+age1);
    var obje ;
    obje = {name:"",birth: "",age: ""};
        obje.name = name1;
        obje.birth = birth1;
        obje.age = age1;
        obj.push(obje);

}
        var token = '{{csrf_token()}}';
    $.ajax({
                type: "post",
                url: "sendMultipleData",
                data: {
                    
                    obj: obj,
                    _token: token
                },
                dataType: "text",
                success: function(data) {
                    console.log(data);

                },
                error: function(req, status, error) {
                    console.log(error);
                }
            });



}
    

</script>
</body>
</html>